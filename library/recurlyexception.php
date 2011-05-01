<?php

/**
 * Exception class used by the RecurlyClient package.
 *
 * @category   Recurly
 * @package    RecurlyClient
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyException extends Exception {}

class RecurlyUnauthorizedException extends RecurlyException {}

class RecurlyConfigurationException extends RecurlyException {}

class RecurlyConnectionException extends RecurlyException {}

class RecurlyForgedQueryStringException extends RecurlyException {}

class RecurlyValidationException extends RecurlyException {
	var $errors;
	var $xml;
	var $model;
	
	public function RecurlyValidationException($http_code, $xml, $model = null) {
		$errors = RecurlyClient::__parse_xml($xml, 'error', true);
		$this->errors = (is_array($errors) ? $errors : array($errors));
  	$this->xml = $xml;
  	$this->model = $model;
		
		$messages = array();
		foreach ($this->errors as $err)
		    if ($err != null) {
		      $msg = ($err->message[strlen($err->message)-1] != '.' ? $err->message : substr($err->message, 0, strlen($err->message) - 1));
		      if ($err->field != null) {
		        $field_name = ucfirst(str_replace('_', ' ', $err->field));
		        $msg = $field_name . ' ' . $msg;
		      }
			    $messages[] = $msg;
			  }
		$message = implode('. ', $messages) . '.';
		
		parent::__construct($message, intval($http_code));
	}
}

class RecurlyError
{
	var $field;
	var $code;
	var $message;
}