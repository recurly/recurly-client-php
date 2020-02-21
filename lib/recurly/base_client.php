<?php

namespace Recurly;

abstract class BaseClient
{
    use RecurlyTraits;

    private $_baseUrl = 'https://v3.recurly.com';
    private $_api_key;
    protected $http;

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
     * @param string $method HTTP method to use
     * @param string $path   Tokenized path to request
     * @param array  $body   The request body
     * @param array  $params Query string parameters
     * 
     * @return \Recurly\RecurlyResource A Recurly Resource
     */
    protected function makeRequest(string $method, string $path, ?array $body = [], ?array $params = []): \Recurly\RecurlyResource
    {
        $response = $this->_getResponse($method, $path, $body, $params);
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
    private function _getResponse(string $method, string $path, ?array $body = [], ?array $params = []): \Recurly\Response
    {
        $request = new \Recurly\Request($method, $path, $body, $params);

        $url = $this->_buildPath($path, $params);
        list($result, $response_header) = $this->http->execute($method, $url, $body, $this->_headers());

        // TODO: The $request should be added to the $response
        $response = new \Recurly\Response($result);
        $response->setHeaders($response_header);

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
        return $this->_getResponse('HEAD', $path, null, $params);
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
            return $this->_baseUrl . $path . '?' . http_build_query($params);
        } else {
            return $this->_baseUrl . $path;
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
        return array_reduce(
            array_keys($options), function ($p, $i) use ($options) {
                return str_replace("{{$i}}", $options[$i], $p);
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
        );
    }
}
