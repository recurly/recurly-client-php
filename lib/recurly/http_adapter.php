<?php
/**
 * This class abstracts away all the PHP-level HTTP
 * code. This allows us to easily mock out the HTTP
 * calls in BaseClient by injecting a mocked version of
 * this adapter.
 */

namespace Recurly;

class HttpAdapter
{
    private static $_default_options = [
        'ignore_errors' => true
    ];

    /**
     * Performs HTTP request
     * 
     * @param string $method  HTTP method to use
     * @param string $url     Fully qualified URL
     * @param array  $body    The request body
     * @param array  $headers HTTP headers
     * 
     * @return array The API response as a string and the headers as an array
     */
    public function execute($method, $url, $body, $headers): array
    {
        $body = empty($body) ? null : json_encode($body);
        $options = array_replace(
            self::$_default_options, [
            'method' => $method,
            'content' => $body,
            ]
        );
        // The Content-Length header is required by Recurly API infrastructure
        $headers['Content-Length'] = strlen($body);
        $headers_str = "";
        foreach ($headers as $k => $v) {
            $headers_str .= "$k: $v\r\n";
        }
        $options['header'] = $headers_str;
        $context = stream_context_create(['http' => $options]);
        $result = file_get_contents($url, false, $context);

        if (!empty($result)) {
            foreach($http_response_header as $h) {
                if(preg_match('/Content-Encoding:.*gzip/i', $h)) {
                    $result = gzdecode($result);
                }
            }
        }
        return array($result, $http_response_header);
    }
}