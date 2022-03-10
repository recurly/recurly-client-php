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
        // borrowed from client for API v2
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        // curl_setopt($curl, CURLOPT_CAINFO, self::$CACertPath);

        // Connection:
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 45);

        // Request:
    	if ($method == "POST") {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        } elseif ($method == "PUT") {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);            
        } elseif ($method == "HEAD") {
            curl_setopt($curl, CURLOPT_NOBODY, true);            
        } elseif ($method != "GET") {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }
    	$req_headers = ['Content-Length: '.strlen($body)];
        array_walk($headers,function($v,$k) use (&$req_headers) { $req_headers[] = "$k: $v"; });
    	curl_setopt($curl, CURLOPT_HTTPHEADER, $req_headers);

        // Response:
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, FALSE);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 1);
    	curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response_header = [];
		curl_setopt($curl, CURLOPT_HEADERFUNCTION, function($curl,$line) use (&$response_header) {
			$response_header[]=$line;
            return strlen($line);
		});

        // Debugging:
        if (defined("RECURLY_CURL_DEBUG")) {
            curl_setopt($curl, CURLOPT_VERBOSE, true);
            $streamVerboseHandle = fopen('php://stdout', 'w+');
            curl_setopt($curl, CURLOPT_STDERR, $streamVerboseHandle);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
        }

		$result = curl_exec($curl);
		
		$curl_errno = curl_errno($curl);
		$curl_error = curl_error($curl);
        $curl_info = curl_getinfo($curl);
		curl_close($curl);

        $response_header[]='_curl_errno: '.$curl_errno;
        $response_header[]='_curl_error: '.$curl_error;
        $response_header[]='_curl_info: '.serialize($curl_info);

        if (defined("RECURLY_CURL_DEBUG")) {
            print_r($req_headers);
            print_r($response_header);
            print_r($curl_info);
        }

        if ($curl_errno==0) {
            // no processing needed; curl ungzips as needed
        } else {
            // handle connection errors that prevented any valid response
            //error_log(print_r($error,1));
            throw new \Recurly\Errors\ConnectionError("Curl error: ".$curl_error);        
        }
        return [$result, $response_header];
    }
}
