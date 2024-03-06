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
        curl_setopt($curl, CURLOPT_ENCODING , "gzip");

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

        // Cram errors into curl_info to make it a complete diagnostic box
        $curl_info['_errno'] = $curl_errno;
        $curl_info['_error'] = $curl_error;

        if (defined("RECURLY_CURL_DEBUG_2")) {
            echo "\nHeaders:\n"; print_r($req_headers);
            echo "\nResponse h:\n"; print_r($response_header);
            echo "\nCurlinfo:\n"; print_r($curl_info);
            echo "\nBody:\n"; print_r($result);
        }

        if ($curl_errno>0) {
            throw new \Recurly\Errors\ConnectionError("Curl error: ".$curl_error, $curl_errno, $curl_info);
        }

        // Cram curl_info into the response header, for when the request is valid.
        $response_header[]='_curl_info: '.serialize($curl_info);
        return [$result, $response_header];
    }
}
