<?php

/**
 * RecurlyClient provides methods for interacting with the {@link http://support.recurly.com/faqs/api Recurly} API.
 * 
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2009 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyClient
{
    const API_CLIENT_VERSION = '0.1.1';

    const DEFAULT_ENCODING = 'UTF-8';

    const PATH_ACCOUNTS = '/accounts/';
    const PATH_BILLING_INFO = '/billing_info';
    const PATH_ACCOUNT_CHARGES = '/charges';
    const PATH_ACCOUNT_CREDITS = '/credits';
    const PATH_ACCOUNT_SUBSCRIPTION = '/subscription';

    const PATH_PLANS = '/plans/';
    const PATH_TRANSACTIONS = '/transactions/';


    /**
    * Recurly account username
    *
    * @var string
    */
    static $username = '';

    /**
    * Recurly account password
    *
    * @var string 
    */
    static $password = '';

    /**
    * Set Recurly username and password.
    *
    * @param string $username Recurly username
    * @param string $password Recurly password
    */
    public static function SetAuth($username, $password)
    {
        self::$username = $username;
        self::$password = $password;
    }
	
	
	
	
	
    /**
    * Sends an HTTP request to the Recurly API with Basic authentication.
    *
    * @param string  $uri    Target URI for this request (relative to the API root)
    * @param string  $method Specifies the HTTP method to be used for this request
    * @param mixed   $data   x-www-form-urlencoded data (or array) to be sent in a POST request body
    *
    * @return RecurlyResponse
    * @throws RecurlyException
    */
	public static function __sendRequest($uri, $method = 'GET', $data = '')
	{
        if(function_exists('mb_internal_encoding'))
        {
            mb_internal_encoding(self::DEFAULT_ENCODING);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://app.recurly.com" . $uri);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/xml',
            'Accept: application/xml',
            "User-Agent: Recurly PHP Client v" . self::API_CLIENT_VERSION
        )); 

        curl_setopt($ch, CURLOPT_USERPWD, self::$username . ':' . self::$password);

        if('POST' == ($method = strtoupper($method)))
        {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        	else if ('PUT' == $method)
        	{
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        	}
        else if('GET' != $method)
        {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $result = new StdClass();
        $result->response = curl_exec($ch);
        $result->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result->meta = curl_getinfo($ch);

        curl_close($ch);

        return $result;
	}
	
	public static function __parse_xml($xml, $node_name, $node_class, $parse_attributes = false) {
		$dom = @DOMDocument::loadXML($xml);
		if (!$dom) return null;

		$node_list = $dom->getElementsByTagName($node_name);
		$list = array();
		for ($i=0; $i < $node_list->length; $i++) {
			$node = $node_list->item($i)->firstChild;
			$obj = new $node_class();
			while ($node) {
				if ($node->nodeType == XML_TEXT_NODE) {
					$obj->message = $node->wholeText;
				} else if ($node->nodeType == XML_ELEMENT_NODE) {
					$nodeName = str_replace("-", "_", $node->nodeName);
					if (!is_numeric($node->nodeValue) && $tmp = strtotime($node->nodeValue))
						$obj->$nodeName = $tmp;
					else if ($node->nodeValue == "false")
						$obj->$nodeName = false;
					else if ($node->nodeValue == "true")
						$obj->$nodeName = true;
					else
						$obj->$nodeName = $node->nodeValue;

					if ($parse_attributes) {
						foreach ($node->attributes as $attrName => $attrNode) {
							$nodeName = str_replace("-", "_", $attrName);
							$nodeValue = $attrNode->nodeValue;
							print "NODE Attribute: " . $nodeName . " - " . $attrNode->nodeValue . "\n";
							if (!is_numeric($nodeValue) && $tmp = strtotime($nodeValue))
								$obj->$nodeName = $tmp;
							else if ($nodeValue == "false")
								$obj->$nodeName = false;
							else if ($nodeValue == "true")
								$obj->$nodeName = true;
							else
								$obj->$nodeName = $nodeValue;
						}
					}
				}
				$node = $node->nextSibling;
			}
			$list[] = $obj;
		}

		if (count($list) == 0)
			return null;
		else if (count($list) == 1)
			return $list[0];
		else
			return $list;
	}
}
