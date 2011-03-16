<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyTransparent
{
  function RecurlyTransparent($data)
  {
    $this->data = $data;
  }

  public function hidden_field()
  {
    return "<input type=\"hidden\" name=\"data\" value=\"" . htmlspecialchars($this->encoded_data(), ENT_QUOTES) . "\" />";
  }

  public function encoded_data()
  {
    self::_verify_required_fields($this->data);
    return self::_data($this->data);
  }

  // URL for Updating Billing Info
  public static function billingInfoUrl()
  {
    return self::_transparentPostBaseUrl() . RecurlyClient::PATH_TRANSPARENT_BILLING_INFO;
  }

  // URL for Creating a Subscription
  public static function subscribeUrl()
  {
    return self::_transparentPostBaseUrl() . RecurlyClient::PATH_TRANSPARENT_SUBSCRIPTION;
  }

  // URL for Creating a Transaction
  public static function transactionUrl()
  {
    return self::_transparentPostBaseUrl() . RecurlyClient::PATH_TRANSPARENT_TRANSACTION;
  }

  private static function _transparentPostBaseUrl()
  {
    return RecurlyClient::__recurlyBaseUrl() . RecurlyClient::PATH_TRANSPARENT . RecurlyClient::$subdomain;
  }
  
  public static function resultsAvailable()
  {
    return (isset($_GET['confirm']) && isset($_GET['type']) && isset($_GET['status']) && isset($_GET['result']));
  }

  // Lookup the results of a Transparent POST
  public static function getResults()
  {
    $model_type = $_GET['type'];
    self::_validateQueryString($_GET['confirm'], $model_type, $_GET['status'], $_GET['result']);

    $uri = RecurlyClient::PATH_TRANSPARENT . RecurlyClient::PATH_TRANSPARENT_RESULTS . $_GET['result'];
		$result = RecurlyClient::__sendRequest($uri);
		if (preg_match("/^2..$/", $result->code)) {
			$model = RecurlyClient::__parse_xml($result->response, $model_type, true);
			return $model;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
		  $model = RecurlyClient::__parse_xml($result->response, $model_type, true);
			throw new RecurlyValidationException($result->code, $result->response, $model);
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 404) {
		  $model = RecurlyClient::__parse_xml($result->response, 'error', true);
			throw new RecurlyValidationException($result->code, $result->response, $model);
		} else {
			throw new RecurlyException("Could not retrieve results with result key: {$_GET['result']} (Status: {$_GET['status']})");
		}
  }

  # Verify required fields are filled out
  private static function _verify_required_fields($params)
  {
    if (!isset($params['redirect_url'])) {
      throw new InvalidArgumentException('"redirect_url" must be included');
    }
    if (!isset($params['account']) || !isset($params['account']['account_code'])) {
      throw new InvalidArgumentException('"account[account_code]" must be included');
    }
  }

  # Validate the return parameters from Recurly
  private static function _validateQueryString($confirm, $type, $status, $result_key)
  {
    $values = array('result' => $result_key, 'status' => $status, 'type' => $type);
    ksort($values);
    $query_values = http_build_query($values, null, '&');
    $hashed_values = self::_hash($query_values);
    
    if ($hashed_values != $confirm) {
      throw new RecurlyForgedQueryStringException("Forged query string");
    }
  }

  # Create the data string for Transparent Post
  private static function _data($params)
  {
    $query_string = self::_queryString($params);
    $validation_string = self::_hash($query_string);
    return $validation_string . "|" . $query_string;
  }
  
  public static function _queryString($params)
  {
    $params['time'] = gmdate("Y-m-d\TH:i:s\Z");
    ksort($params);
    return http_build_query($params, null, '&');
  }

  // Hash a message using the client's private key
  public static function _hash($message)
  {
    if (!isset(RecurlyClient::$private_key) || strlen(RecurlyClient::$private_key) != 32) {
      throw new RecurlyConfigurationException("Recurly private key is not set. The private key must be 32 characters.");
    }

    return hash_hmac('sha1', $message, sha1(RecurlyClient::$private_key, true));
  }
}
