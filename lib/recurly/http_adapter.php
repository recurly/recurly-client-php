<?php

namespace Recurly;

class HttpAdapter
{
    private static $_default_options = [
        'ignore_errors' => true
    ];

    public function __construct()
    {

    }

    /**
     * @param string $method   HTTP method to use
     * @param string $url      Fully qualified URL
     * @param array  $body     The request body
     * @param array  $headers  HTTP headers
     */
    public function execute($method, $url, $body, $headers)
    {
        $body = empty($body) ? NULL : json_encode($body);
        $options = array_replace(self::$_default_options, [
            'method' => $method,
            'content' => $body,
        ]);
        $headers_str = "";
        foreach ($headers as $k => $v)
        {
            $headers_str .= "$k: $v\r\n";
        }
        $options['header'] = $headers_str;
        $context = stream_context_create(['http' => $options]);
        $result = file_get_contents($url, false, $context);
        return array($result, $http_response_header);
    }
}