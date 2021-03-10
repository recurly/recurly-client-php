<?php

namespace Recurly;

class Request
{
    private $_method;
    private $_path;
    private $_body;
    private $_options;

    /**
     * Constructor
     * 
     * @param string $method  HTTP method to use
     * @param string $path    Tokenized path to request
     * @param array  $body    The request body
     * @param array  $options Additional request parameters (including query parameters)
     */
    public function __construct(string $method, string $path, array $body, array $options)
    {
        $this->_method = $method;
        $this->_path = $path;
        $this->_body = $body;
        $this->_options = $options;
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
     * Returns the JSON body included in the request
     * 
     * @return array The request body
     */
    public function getBodyAsJson(): ?string
    {
        return empty($this->_body) ? null : json_encode($this->_body);
    }

    /**
     * Returns the request query string parameters
     * 
     * @return array The query string parameters
     */
    public function getParams(): array
    {
        return array_key_exists('params', $this->_options) ? $this->_options['params'] : [];
    }

    /**
     * Returns the user supplied request headers
     * Note: These may be overridden by core library headers. The full list of headers can be obtained with getHeaders()
     * 
     * @return array The custom request headers
     */
    public function getCustomHeaders(): array
    {
        return array_key_exists('headers', $this->_options) ? $this->_options['headers'] : [];
    }

    /**
     * Returns the request options
     * 
     * @return array The options included in the request
     */
    public function getOptions(): array
    {
        return $this->_options;
    }

    /**
     * Returns the request headers.
     * Note: The `Content-Length` header is not included here as it is calculated just prior to the request being sent.
     * 
     * @return array Associative array of headers
     */
    public function getHeaders(): ?array
    {
        return array_merge(
            $this->getCustomHeaders(),
            array_key_exists('core_headers', $this->_options) ? $this->_options['core_headers'] : []
        );
    }
}
