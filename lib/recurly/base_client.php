<?php

namespace Recurly;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

abstract class BaseClient
{
    use RecurlyTraits;

    protected $baseUrl = 'https://v3.recurly.com';
    private $_api_key;
    protected $http;
    private $_logger;

    /**
     * Constructor
     * 
     * @param string $api_key The API key to use when making requests
     */
    public function __construct(string $api_key, LoggerInterface $logger = null)
    {
        $this->_api_key = $api_key;
        $this->http = new HttpAdapter;
        if (is_null($logger)) {
            $logger = new \Recurly\Logger('Recurly', LogLevel::WARNING);
        }
        $this->_logger = $logger;

        // Send Security Warning to logger debug
        $msg = "The Recurly logger should not be initialized";
        $msg .= "\nbeyond the level INFO. It is currently configured to emit";
        $msg .= "\nheaders and request / response bodies. This has the potential to leak";
        $msg .= "\nPII and other sensitive information and should never be used in production.";
        $this->_logger->debug("SECURITY WARNING: {$msg}");
    }

    /**
     *  Recurly API version that the client was generated for
     * 
     * @return string Recurly API version that the client was generated for
     */
    abstract protected function apiVersion(): string;

    /**
     * Performs API requests and processes the response into a Recurly Resource
     * 
     * @param string $method HTTP method to use
     * @param string $path   Tokenized path to request
     * @param array  $body   The request body
     * @param array  $params Query string parameters
     * 
     * @return \Recurly\RecurlyResource A Recurly Resource
     */
    protected function makeRequest(string $method, string $path, ?array $body = [], ?array $params = []): \Recurly\RecurlyResource
    {
        $url = $this->_buildPath($path, $params);
        $formattedBody = $this->_formatDateTimes($body);

        $request = new \Recurly\Request($method, $url, $formattedBody, $params, $this->_headers());

        $response = $this->_getResponse($request);
        $resource = $response->toResource();
        return $resource;
    }


    /**
     * Performs the HTTP request to the Recurly API
     * 
     * @param string $method HTTP method to use
     * @param string $path   Tokenized path to request
     * @param array  $body   The request body
     * @param array  $params Query string parameters
     * 
     * @return \Recurly\Response A Recurly Response object
     */
    private function _getResponse(\Recurly\Request $request): \Recurly\Response
    {
        $this->_logger->info(
            'Request', [
            'method' => $request->getMethod(),
            'path' => $request->getUrl()
            ]
        );
        $this->_logger->debug(
            'Request', [
            'request_body' => $request->getBodyAsJson(),
            'request_headers' => $this->_headers()
            ]
        );
        $start = microtime(true);
        list($result, $response_header) = $this->http->execute($request->getMethod(), $request->getUrl(), $request->getBodyAsJson(), $this->_headers());
        $end = microtime(true);

        $response = new \Recurly\Response($result, $request);
        $response->setHeaders($response_header);
        $this->_logger->info(
            'Response', [
            'time_ms' => intval(($end - $start) * 1000),
            'status' => $response->getStatusCode()
            ]
        );
        $this->_logger->debug(
            'Response', [
            'response_body' => $response->getRawResponse(),
            'response_headers' => $response->getHeaders()
            ]
        );

        return $response;
    }

    /**
     * Used by the \Recurly\Pager to make requests to the API.
     * 
     * @param string $path   The URL to make the pager request to
     * @param ?array $params (optional) An associative array of query string
     *                       parameters
     * 
     * @return \Recurly\Page
     */
    public function nextPage(string $path, ?array $params = []): \Recurly\Page
    {
        return $this->makeRequest('GET', $path, null, $params);
    }

    /**
     * Used by the \Recurly\Pager to obtain total counts from the API.
     * 
     * @param string $path   The URL to make the pager request to
     * @param ?array $params (optional) An associative array of query string
     *                       parameters
     * 
     * @return \Recurly\Response
     */
    public function pagerCount(string $path, ?array $params = []): \Recurly\Response
    {
        $url = $this->_buildPath($path, $params);
        $request = new \Recurly\Request('HEAD', $url, null, $params, $this->_headers());
        return $this->_getResponse($request);
    }

    /**
     * Build the URL that the API request will be sent to
     * 
     * @param string $path   The path to be requested
     * @param ?array $params An associative array of query string parameters or null
     * 
     * @return string The combined URL
     */
    private function _buildPath(string $path, ?array $params): string
    {
        if (isset($params) && !empty($params)) {
            return $this->baseUrl . $path . '?' . http_build_query($this->_formatDateTimes($params));
        } else {
            return $this->baseUrl . $path;
        }

    }

    /**
     * Converts any DateTime values in $arr to ISO8601 strings
     * 
     * @param ?array $arr The Associative array to format
     * 
     * @return ?array The formatted array
     */
    private function _formatDateTimes(?array $arr): ?array
    {
        if (!isset($arr)) {
            return $arr;
        }
        return array_combine(
            array_keys($arr),
            array_map(
                function ($value) {
                    if ($value instanceof \DateTime) {
                        return $value->format(\DateTime::ISO8601);
                    }
                    // Recursively check nested arrays
                    if (is_array($value)) {
                        return $this->_formatDateTimes($value);
                    }
                    return $value;
                }, $arr
            )
        );
    }

    /**
     * Checks that path parameters are valid
     *
     * @param array $options Associatve array of tokens and their replacement values
     */
    private function _validatePathParameters(array $options = []): void
    {
        // Check to make sure that parameters are not empty values
        $emptyValues = array_filter(
            $options, function ($value, $key) {
                return empty(trim($value));
            }, ARRAY_FILTER_USE_BOTH
        );
        if (!empty($emptyValues)) {
            throw new RecurlyError(join(', ', array_keys($emptyValues)) . ' cannot be an empty value');
        }
    }

    /**
     * Replaces placeholder values with supplied values
     * 
     * @param string $path    Tokenized path to make replacements on
     * @param array  $options Associatve array of tokens and their replacement values
     * 
     * @return string The path with it's tokens replaced with the supplied values
     */
    protected function interpolatePath(string $path, array $options = []): string
    {
        $this->_validatePathParameters($options);
        return array_reduce(
            array_keys($options), function ($p, $i) use ($options) {
                return str_replace("{{$i}}", rawurlencode($options[$i]), $p);
            }, $path
        );
    }

    /**
     * Generates headers to be sent with the HTTP request
     * 
     * @return array Array representation of the HTTP headers
     */
    private function _headers(): array
    {
        $auth_token = self::encodeApiKey($this->_api_key);
        $agent = self::getUserAgent();
        return [
            "User-Agent" => $agent,
            "Authorization" => "Basic {$auth_token}",
            "Accept" => "application/vnd.recurly.{$this->apiVersion()}",
            "Content-Type" => "application/json",
            "Accept-Encoding" => "gzip",
        ];
    }
}
