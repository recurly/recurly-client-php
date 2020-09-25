<?php

namespace Recurly;

class Request
{
    private $_method;
    private $_url;
    private $_body;
    private $_params;
    private $_headers;

    /**
     * Constructor
     * 
     * @param string $method HTTP method to use
     * @param string $url    URL for the request.
     * @param array  $body   The request body
     * @param array  $params Query string parameters
     */
    public function __construct(string $method, string $url, ?array $body, ?array $params, array $headers)
    {
        $this->_method = $method;
        $this->_url = $url;
        $this->_body = $body;
        $this->_params = $params;
        $this->_headers = $headers;
    }

    /**
     * Returns the HTTP method that was used
     * 
     * @return string The HTTP method
     */
    public function getMethod(): string
    {
        return $this->_method;
    }

    /**
     * Returns the URL that the HTTP request was made to
     * 
     * @return string The URL
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * Returns the request body
     * 
     * @return array The request body
     */
    public function getBody(): ?array
    {
        return $this->_body;
    }

    /**
     * Returns the JSON body included in the request
     * 
     * @return array The request body
     */
    public function getJson(): ?string
    {
        return empty($this->_body) ? null : json_encode($this->_body);
    }

    /**
     * Returns the request query string parameters
     * 
     * @return array The query string parameters
     */
    public function getParams(): ?array
    {
        return $this->_params;
    }

    /**
     * Returns the request headers.
     * Note: The `Content-Length` header is not included here as it is calculated just prior to the request being sent.
     * 
     * @return array Associative array of headers
     */
    public function getHeaders(): ?array
    {
        return $this->_headers;
    }
}