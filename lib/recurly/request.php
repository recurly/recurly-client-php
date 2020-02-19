<?php

namespace Recurly;

class Request
{
    private $_method;
    private $_path;
    private $_body;
    private $_params;

    /**
     * Constructor
     * 
     * @param string $method HTTP method to use
     * @param string $path   Tokenized path to request
     * @param array  $body   The request body
     * @param array  $params Query string parameters
     */
    public function __construct(string $method, string $path, ?array $body, ?array $params)
    {
        $this->_method = $method;
        $this->_path = $path;
        $this->_body = $body;
        $this->_params = $params;
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
     * Returns the path that the HTTP request was made to
     * 
     * @return string The path
     */
    public function getPath(): string
    {
        return $this->_path;
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
     * Returns the request query string parameters
     * 
     * @return array The query string parameters
     */
    public function getParams(): ?array
    {
        return $this->_params;
    }
}