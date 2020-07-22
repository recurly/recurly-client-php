<?php

namespace Recurly;

abstract class BaseClient
{
    use RecurlyTraits;

    protected $baseUrl = 'https://v3.recurly.com';
    private $_api_key;
    protected $http;
    private const ALLOWED_OPTIONS = [
        'body',
        'params',
        'headers'
    ];

    /**
     * Constructor
     * 
     * @param string $api_key The API key to use when making requests
     */
    public function __construct(string $api_key)
    {
        $this->_api_key = $api_key;
        $this->http = new HttpAdapter;
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
        $response = $this->_getResponse($method, $path, $body, $options);
        $resource = $response->toResource();
        return $resource;
    }


    /**
     * Performs the HTTP request to the Recurly API
     * 
     * @param string $method  HTTP method to use
     * @param string $path    Tokenized path to request
     * @param array  $body    The request body
     * @param array  $options Additional request parameters (including query parameters)
     * 
     * @return \Recurly\Response A Recurly Response object
     */
    private function _getResponse(string $method, string $path, array $body = [], array $options = []): \Recurly\Response
    {
        $params = array_key_exists('params', $options) ? $options['params'] : [];
        $request = new \Recurly\Request($method, $path, $body, $params);

        $url = $this->_buildPath($path, $params);
        $formattedBody = $this->_formatDateTimes($body);
        list($result, $response_header) = $this->http->execute($method, $url, $formattedBody, $this->_headers());

        // TODO: The $request should be added to the $response
        $response = new \Recurly\Response($result);
        $response->setHeaders($response_header);

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
        return $this->_getResponse('HEAD', $path, [], $options);
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
            $mappedParams = $this->_mapArrayParams($params);
            return $this->baseUrl . $path . '?' . http_build_query($this->_formatDateTimes($mappedParams));
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
     * Generates headers to be sent with the HTTP request
     * 
     * @return array Array representation of the HTTP headers
     */
    private function _headers(): array
    {
        $auth_token = self::encodeApiKey($this->_api_key);
        $agent = self::getUserAgent();
        return array(
            "User-Agent" => $agent,
            "Authorization" => "Basic {$auth_token}",
            "Accept" => "application/vnd.recurly.{$this->apiVersion()}",
            "Content-Type" => "application/json",
            "Accept-Encoding" => "gzip",
        );
    }
}
