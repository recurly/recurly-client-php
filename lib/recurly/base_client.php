<?php

namespace Recurly;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

abstract class BaseClient
{
    use RecurlyTraits;

    private const API_HOSTS = [
        'us' => 'https://v3.recurly.com',
        'eu' => 'https://v3.eu.recurly.com'
    ];
    protected $baseUrl = BaseClient::API_HOSTS['us'];
    private $_api_key;
    protected $http;
    private const ALLOWED_OPTIONS = [
        'params',
        'headers'
    ];
    private $_logger;

    /**
     * Constructor
     *
     * @param string $api_key The API key to use when making requests
     * @param string $options initialize options
     *
     * In addition to the options managed by BaseClient, it accepts the following options:
     *  - "region" to define the Data Center connection - defaults to "us";
     */
    public function __construct(string $api_key, LoggerInterface $logger = null, array $options = [], HttpAdapterInterface $http_adapter = null)
    {
        $this->_api_key = $api_key;
        if (isset($options['region'])) {
            if (!array_key_exists($options['region'], BaseClient::API_HOSTS)) {
                throw new RecurlyError('Invalid region type. Expected one of: ' . join(', ', array_keys(BaseClient::API_HOSTS)));
            }
            $this->baseUrl = BaseClient::API_HOSTS[$options['region']];
        }

        if (is_null($http_adapter)) {
            $http_adapter = new HttpAdapter;
        }
        $this->http = $http_adapter;

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
     * @param string $method  HTTP method to use
     * @param string $path    Tokenized path to request
     * @param array  $body    The request body
     * @param array  $options Additional request parameters (including query parameters)
     *
     * @return \Recurly\RecurlyResource A Recurly Resource
     */
    protected function makeRequest(string $method, string $path, array $body = [], array $options = []): \Recurly\RecurlyResource
    {
        $this->_validateOptions($options);
        $path = $this->_buildPath($path, $options);
        $formattedBody = $this->_formatDateTimes($body);
        $options['core_headers'] = $this->_coreHeaders();

        $request = new \Recurly\Request($method, $path, $formattedBody, $options);

        $response = $this->_getResponse($request);
        $resource = $response->toResource();
        return $resource;
    }


    /**
     * Performs the HTTP request to the Recurly API
     *
     * @param \Recurly\Request $request The \Recurly\Request object
     *
     * @return \Recurly\Response A Recurly Response object
     */
    private function _getResponse(\Recurly\Request $request): \Recurly\Response
    {
        $this->_logger->info(
            'Request', [
            'method' => $request->getMethod(),
            'path' => $request->getPath()
            ]
        );
        $this->_logger->debug(
            'Request', [
            'request_body' => $request->getBodyAsJson(),
            'request_headers' => $request->getHeaders()
            ]
        );
        $start = microtime(true);
        list($result, $response_header) = $this->http->execute($request->getMethod(), $request->getPath(), $request->getBodyAsJson(), $request->getHeaders());
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
     * @param string $path    The URL to make the pager request to
     * @param array  $options An associative array optional parameters
     *
     * @return \Recurly\Page
     */
    public function nextPage(string $path, array $options = []): \Recurly\Page
    {
        return $this->makeRequest('GET', $path, [], $options);
    }

    /**
     * Used by the \Recurly\Pager to obtain total counts from the API.
     *
     * @param string $path    The URL to make the pager request to
     * @param array  $options An associative array optional parameters
     *
     * @return \Recurly\Response
     */
    public function pagerCount(string $path, ?array $options = []): \Recurly\Response
    {
        $path = $this->_buildPath($path, $options);
        $options['core_headers'] = $this->_coreHeaders();
        $request = new \Recurly\Request('HEAD', $path, [], $options);
        return $this->_getResponse($request);
    }

    /**
     * Build the URL that the API request will be sent to
     *
     * @param string $path    The path to be requested
     * @param array  $options Additional request parameters (including query parameters)
     *
     * @return string The combined URL
     */
    private function _buildPath(string $path, array $options): string
    {
        if (array_key_exists('params', $options) && !empty($options['params'])) {
            $mappedParams = $this->_mapArrayParams($options['params']);
            $mappedWithBooleans = $this->_mapBooleanParams($mappedParams);
            return $this->baseUrl . $path . '?' . http_build_query($this->_formatDateTimes($mappedWithBooleans));
        } else {
            return $this->baseUrl . $path;
        }

    }

    /**
     * Maps parameters with array values into csv strings. The API expects these
     * values to be csv strings, but an array is a nicer interface for developers.
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    private function _mapArrayParams(?array $params = []): ?array
    {
        if (!is_null($params)) {
            array_walk(
                $params, function (&$param, $key) {
                    if (is_array($param)) {
                        $param = join(',', $param);
                    }
                }
            );
        }
        return $params;
    }

    /**
     * Maps parameters with boolean value into strings. The API expects these
     * values to be booleans, but http_build_query transforms actual php booleans
     * into integers. So the workaround is to provide them as strings instead.
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    private function _mapBooleanParams(?array $params = []): ?array
    {
        if (!is_null($params)) {
            array_walk_recursive(
                $params, function (&$param, $key) {
                    if (is_bool($param)) {
                        $param = var_export($param, true);
                    }
                }
            );
        }
        return $params;
    }

    /**
     * Converts any DateTime values in $arr to ISO8601 strings
     *
     * @param array $arr The Associative array to format
     *
     * @return array The formatted array
     */
    private function _formatDateTimes(array $arr): ?array
    {
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
     * Checks that $options keys are valid
     *
     * @param array $options An associative array optional parameters
     */
    private function _validateOptions(array $options = []): void
    {
        // Check to make sure that parameters are not empty values
        $invalidKeys = array_filter(
            $options, function ($value, $key) {
                return !\in_array($key, BaseClient::ALLOWED_OPTIONS);
            }, ARRAY_FILTER_USE_BOTH
        );
        if (!empty($invalidKeys)) {
            $joinedKeys = join(', ', array_keys($invalidKeys));
            $joinedOptions = join(', ', BaseClient::ALLOWED_OPTIONS);
            throw new RecurlyError("Invalid options: '{$joinedKeys}'. Allowed options: '{$joinedOptions}'");
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
     * Generates core headers to be sent with the HTTP request
     *
     * @return array Array representation of the core request HTTP headers
     */
    private function _coreHeaders(): array
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
