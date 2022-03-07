<?php
/**
 * This class abstracts away all the PHP-level HTTP
 * code. This allows us to easily mock out the HTTP
 * calls in BaseClient by injecting a mocked version of
 * this adapter.
 */

namespace Recurly;

/**
 * @codeCoverageIgnore
 */
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
     * @param string $body    The request body
     * @param array  $headers HTTP headers
     * 
     * @return array The API response as a string and the headers as an array
     */
    public function execute($method, $url, $body, $headers): array
    {
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
        //error_clear_last();
        $result = file_get_contents("Q".$url, false, $context);
		//$error = error_get_last();
	
        if (!empty($result)) {
            foreach($http_response_header as $h) {
                if(preg_match('/Content-Encoding:.*gzip/i', $h)) {
                    $result = gzdecode($result);
                }
            }
        } else {
            // handle connection errors that prevented any valid response
            //error_log(print_r($error,1));
            if ($error['type']==E_WARNING) { error_log(__FILE__.": ".$error['message']); throw new \Recurly\Errors\ConnectionError($error['message']); }
            
            //if (!is_resource($context)) { error_log(__FILE__.": stream not created"); throw new \Recurly\Errors\ConnectionError("stream not created"); }
	    	if (is_resource($context)) {
	    		$meta = stream_get_meta_data($context);
		    	if ($meta['timed_out']) { error_log(__FILE__.": timed out"); throw new \Recurly\Errors\ConnectionError("timed out"); }

			    error_log(print_r($meta,1));
			}
        }
        return [$result, $http_response_header];
    }
}
