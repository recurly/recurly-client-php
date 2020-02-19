<?php

namespace Recurly;

class Response
{
    private $_response;
    private $_status_code;
    private $_headers = [];
    private const BINARY_TYPES = [
        'application/pdf'
    ];

    /**
     * Constructor
     * 
     * @param string $response The raw HTTP response string
     */
    public function __construct(string $response)
    {
        $this->_response = $response;
    }

    /**
     * The raw string response from the API server.
     * 
     * @return string
     */
    public function getRawResponse(): string
    {
        return $this->_response;
    }

    /**
     * Decodes and returns the raw response as JSON
     * 
     * @return object Parsed JSON body
     */
    public function getJsonResponse(): ?object
    {
        return json_decode($this->_response);
    }

    /**
     * Converts the Response into a \Recurly\RecurlyResource
     * 
     * @return \Recurly\RecurlyResource
     */
    public function toResource(): \Recurly\RecurlyResource
    {
        if ($this->_status_code >= 200 && $this->_status_code < 300) {
            if (empty($this->_response)) {
                return \Recurly\RecurlyResource::fromEmpty($this);
            } elseif (in_array($this->getContentType(), static::BINARY_TYPES)) {
                return \Recurly\RecurlyResource::fromBinary($this->_response, $this);
            } else {
                return \Recurly\RecurlyResource::fromResponse($this);
            }
        } else {
            throw \Recurly\RecurlyError::fromResponse($this);
        }
    }

    /**
     * Parses the HTTP response headers. If the $headers param is null
     * then a 400 Bad Request is assumed.
     * 
     * @param array $headers An array of HTTP response headers
     * 
     * @return void
     */
    public function setHeaders(?array $headers): void
    {
        if (empty($headers)) {
            $headers = array('HTTP/1.1 400 Bad request');
        }

        foreach ($headers as $header) {
            if (preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $header, $out)) {
                $this->_status_code = intval($out[1]);
            } else {
                $parts = explode(':', $header, 2);
                if (count($parts) == 2) {
                    $this->_headers[$parts[0]] = trim($parts[1]);
                }
            }
        }
    }

    /**
     * Getter method for the HTTP status code
     * 
     * @return int The HTTP status code
     */
    public function getStatusCode(): int
    {
        return $this->_status_code;
    }

    /**
     * Getter method for the X-Request-Id HTTP response header
     * 
     * @return string The X-Request-Id header value
     */
    public function getRequestId(): string
    {
        return $this->_getHeaderValue('X-Request-Id');
    }

    /**
     * Getter method for the X-RateLimit-Limit HTTP response header
     * 
     * @return string The X-RateLimit-Limit header value
     */
    public function getRateLimit(): string
    {
        return $this->_getHeaderValue('X-RateLimit-Limit');
    }

    /**
     * Getter method for the X-RateLimit-Remaining HTTP response header
     * 
     * @return string The X-RateLimit-Remaining header value
     */
    public function getRateLimitRemaining(): string
    {
        return $this->_getHeaderValue('X-RateLimit-Remaining');
    }

    /**
     * Getter method for the X-RateLimit-Reset HTTP response header
     * 
     * @return string The X-RateLimit-Reset header value
     */
    public function getRateLimitReset(): string
    {
        return $this->_getHeaderValue('X-RateLimit-Reset');
    }

    /**
     * Getter method for the Content-Type HTTP response header
     * 
     * @return string The Content-Type header value
     */
    public function getContentType(): string
    {
        $raw = $this->_getHeaderValue('Content-Type');
        $parts = explode('; ', $raw);
        return $parts[0];
    }

    /**
     * Getter method for the Recurly-Total-Records HTTP response header
     * 
     * @return string The Recurly-Total-Records header value
     */
    public function getRecordCount(): string
    {
        return $this->_getHeaderValue('Recurly-Total-Records');
    }

    /**
     * Generic getter method for the HTTP response headers
     * 
     * @param string $key     The header name to lookup
     * @param string $default (optional) The value to return if the header is not set
     * 
     * @return string The header value or an empty string if the header is not set
     */
    private function _getHeaderValue(string $key, $default = '')
    {
        return key_exists($key, $this->_headers) ? $this->_headers[$key] : $default;
    }
}
