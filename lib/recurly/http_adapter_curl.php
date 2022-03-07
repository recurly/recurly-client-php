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
class HttpAdapterCurl implements HttpAdapterInterface
{
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
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    	curl_setopt($curl, CURLOPT_HEADER, 0);
    	$flat_headers = array_map($headers,function($k,$v) { return "$k: $v"; });
    	curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge($flat_headers, [
    		'Content-Length: '.strlen($body), // The Content-Length header is required by Recurly API infrastructure
    	]));
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADERFUNCTION, function($curl,$line) use (&$response_header) {
			$response_header[]=$line;
		});
		
		$result = curl_exec($curl);
		
		$curl_errno = curl_errno($curl);
		$curl_error = curl_error($curl);
		curl_close($curl);
	
        if (!empty($result)) {
            foreach($response_header as $h) {
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
        return [$result, $response_header];
    }
}
