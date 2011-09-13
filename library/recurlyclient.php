<?php

/**
 * RecurlyClient provides methods for interacting with the {@link http://support.recurly.com/faqs/api Recurly} API.
 * 
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyClient
{
    const API_CLIENT_VERSION = '0.2.3';
    const API_PRODUCTION_URL = 'https://api-production.recurly.com';
    const API_SANDBOX_URL = 'https://api-sandbox.recurly.com';
    const API_DEVELOPMENT_URL = 'http://api-sandbox.lvh.me:3000';
    const DEFAULT_ENCODING = 'UTF-8';

    const PATH_ACCOUNTS = '/accounts/';
    const PATH_BILLING_INFO = '/billing_info';
    const PATH_ACCOUNT_COUPON = '/coupon';
    const PATH_ACCOUNT_CHARGES = '/charges';
    const PATH_ACCOUNT_CREDITS = '/credits';
    const PATH_ACCOUNT_INVOICES = '/invoices';
    const PATH_ACCOUNT_SUBSCRIPTION = '/subscription';
    const PATH_TRANSACTIONS = '/transactions/';

    const PATH_INVOICES = '/invoices/';
    const PATH_PLANS = '/site/plans/';

    const PATH_TRANSPARENT = '/transparent/';
    const PATH_TRANSPARENT_SUBSCRIPTION = '/subscription';
    const PATH_TRANSPARENT_TRANSACTION = '/transaction';
    const PATH_TRANSPARENT_BILLING_INFO = '/billing_info';
    const PATH_TRANSPARENT_RESULTS = 'results/';

	static $class_map = array(
		'account' => 'RecurlyAccount',
		'billing_info' => 'RecurlyBillingInfo',
		'charge' => 'RecurlyAccountCharge',
		'coupon' => 'RecurlyCoupon',
		'credit' => 'RecurlyAccountCredit',
		'credit_card' => 'RecurlyCreditCard',
		'currency' => 'RecurlyObject',
		'currencies' => 'array',
		'error' => 'RecurlyError',
		'errors' => 'array',
		'invoice' => 'RecurlyInvoice',
		'latest_version' => '', // Depreciated -- ignore
		'line_item' => 'RecurlyLineItem',
		'line_items' => 'array',
		'plan' => 'RecurlyPlan',
		'plan_version' => '', // Depreciated -- ignore
		'payment' => 'RecurlyTransaction',
		'payments' => 'array',
		'pending_subscription' => 'RecurlyPendingSubscription',
		'redemption' => 'RecurlyCouponRedemption',
		'subscription' => 'RecurlySubscription',
		'transaction' => 'RecurlyTransaction',
		'add_ons' => 'array',
		'add_on' => 'RecurlyAddOn');


    /**
    * Recurly API username
    *
    * @var string
    */
    static $username = '';

    /**
    * Recurly API password
    *
    * @var string
    */
    static $password = '';

    /**
    * Recurly API private key
    *
    * @var string
    */
    static $private_key = '';

    /**
    * Recurly account subdomain
    *
    * @var string
    */
    static $subdomain = '';
    
    /**
    * Recurly environment: 'production' or 'sandbox'
    *
    * @var string 
    */
    static $environment = '';

    /**
    * Set Recurly username and password.
    *
    * @param string $username Recurly username
    * @param string $password Recurly password
    */
    public static function SetAuth($username, $password, $subdomain, $environment = 'production', $private_key = null)
    {
      if (!in_array($environment, array('production','sandbox','development'))) {
        throw new RecurlyException("Environment must be production or sandbox.");
      }

      self::$username = $username;
      self::$password = $password;
      self::$subdomain = $subdomain;
      self::$environment = $environment;
      self::$private_key = $private_key;
    }


  	public static function __recurlyBaseUrl() {
  	  if (self::$environment == 'production') {
  	    return RecurlyClient::API_PRODUCTION_URL;
  	  } elseif (self::$environment == 'development') {
    	    return RecurlyClient::API_DEVELOPMENT_URL;
    	} else {
  	    return RecurlyClient::API_SANDBOX_URL;
  	  }
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

        curl_setopt($ch, CURLOPT_URL, self::__recurlyBaseUrl() . $uri);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/xml; charset=utf-8',
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

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);

        $result = new StdClass();
        $result->response = curl_exec($ch);
        $result->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result->meta = curl_getinfo($ch);
        
        $curl_error = ($result->code > 0 ? null : curl_error($ch) . ' (' . curl_errno($ch) . ')');

        curl_close($ch);
        
        if ($result->code == 0)
            throw new RecurlyConnectionException('An error occurred while connecting to Recurly: ' . $curl_error);
        if ($result->code == 401)
            throw new RecurlyUnauthorizedException('Your API user is not authorized to connect to Recurly.');

        return $result;
	}
	
	

	public static function __parse_xml($xml, $node_name, $parse_attributes = false) {
		$dom = @DOMDocument::loadXML($xml);
		if (!$dom) return null;

		$childNodes = $dom->getElementsByTagName($node_name);
		$list = array();
		for ($i=0; $i < $childNodes->length; $i++) {
			$node = $childNodes->item($i)->firstChild;
      $node_class = RecurlyClient::$class_map[$node_name];
      $newObj = RecurlyClient::__parseXmlToObject($node, $node_class, $parse_attributes);

      if ($parse_attributes) {
        foreach ($childNodes->item($i)->attributes as $attrName => $attrNode) {
          $nodeName = str_replace("-", "_", $attrName);
          $nodeValue = $attrNode->nodeValue;
          if (!is_numeric($nodeValue) && $tmp = strtotime($nodeValue))
            $newObj->$nodeName = $tmp;
          else if ($nodeValue == "false")
            $newObj->$nodeName = false;
          else if ($nodeValue == "true")
            $newObj->$nodeName = true;
          else
            $newObj->$nodeName = $nodeValue;
        }
      }

      $list[] = $newObj;
		}
		
		if (count($list) == 0)
			return null;
		else if (count($list) == 1)
			return $list[0];
		else
			return $list;
	}

	protected static function __parseXmlToObject($node, $node_class, $parse_attributes) {
		if ($node_class != null)
		{
		  if ($node_class == 'array')
		    $obj = array();
		  else
		    $obj = new $node_class();
		}
		else
			$obj = new RecurlyObject();
		
		while ($node) {
			if ($node->nodeType == XML_TEXT_NODE) {
				if ($node->wholeText != null) {
					$text = trim($node->wholeText);
					if (strlen($text) > 0)
						$obj->message = $text;
				}
			} else if ($node->nodeType == XML_ELEMENT_NODE) {
				$nodeName = str_replace("-", "_", $node->nodeName);
				if (is_array($obj)) {
				  $child_node_class = RecurlyClient::$class_map[$nodeName];
					$new_obj = RecurlyClient::__parseXmlToObject($node->childNodes->item(0), $child_node_class, $parse_attributes);

					if ($parse_attributes) {
  					foreach ($node->attributes as $attrName => $attrNode) {
  						$nodeName = str_replace("-", "_", $attrName);
  						$nodeValue = $attrNode->nodeValue;
  						if (!is_numeric($nodeValue) && $tmp = strtotime($nodeValue))
  							$new_obj->$nodeName = $tmp;
  						else if ($nodeValue == "false")
  							$new_obj->$nodeName = false;
  						else if ($nodeValue == "true")
  							$new_obj->$nodeName = true;
  						else
  							$new_obj->$nodeName = $nodeValue;
  					}
  				}
				  
				  $obj[] = $new_obj;
				  $node = $node->nextSibling;
				  continue;
				}

				if ($node->getAttribute('nil')) {
					$obj->$nodeName = null;
				} else {
					switch ($node->getAttribute('type')) {
						case 'boolean':
							$obj->$nodeName = $node->nodeValue == 'true';
							break;
						case 'date':
							$obj->$nodeName = strtodate($node->nodeValue);
							break;
						case 'datetime':
							$obj->$nodeName = strtotime($node->nodeValue);
							break;
						case 'float':
							$obj->$nodeName = (float)$node->nodeValue;
							break;
						case 'integer':
							$obj->$nodeName = (int)$node->nodeValue;
							break;
						default:
							$obj->$nodeName = $node->nodeValue;
					}
				}

				if ($node->childNodes->length > 1) {
					$child_node_class = RecurlyClient::$class_map[$nodeName];
					
					if ($child_node_class != '') {
					  $obj->$nodeName = RecurlyClient::__parseXmlToObject($node->childNodes->item(0), $child_node_class, $parse_attributes);
				  }
				}

				if ($parse_attributes) {
					foreach ($node->attributes as $attrName => $attrNode) {
						$nodeName = str_replace("-", "_", $attrName);
						$nodeValue = $attrNode->nodeValue;
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
		return $obj;
	}
}

// In case node_class is not specified.
class RecurlyObject {}
