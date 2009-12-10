<?php

/**
 * Exception class used by the RecurlyClient package.
 *
 * @category   Recurly
 * @package    RecurlyClient
 * @copyright  Copyright (c) 2009 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyException extends Exception {}

class RecurlyConnectionException extends RecurlyException {}

class RecurlyValidationException extends RecurlyException {
	var $errors;
	
	public function RecurlyValidationException($http_code, $xml) {
		$errors = RecurlyClient::__parse_xml($xml, 'error', true);
		$this->errors = (is_array($errors) ? $errors : array($errors));
		
		$messages = array();
		foreach ($this->errors as $err)
		    if ($err != null)
			    $messages[] = $err->message;
		$message = implode('. ', $messages) . '.';
		
		parent::__construct($message, intval($http_code));
	}
}

class RecurlyError
{
	var $field;
	var $message;
}