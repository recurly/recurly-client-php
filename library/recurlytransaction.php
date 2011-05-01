<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyTransaction
{
  var $id;
  var $amount_in_cents;
  var $currency;
  var $description;
  var $date;
  var $message;
  var $success;
  var $voidable;
  var $refundable;
  var $account;		    // User account information
  var $billing_info;	// Account's billing information

  public function RecurlyTransaction($amount = 0, $description = null, RecurlyAccount $acct = null)
	{
		if (isset($acct)) { $this->account = $acct; }
		$this->amount_in_cents = intval($amount * 100);
		$this->description = $description;
	}

	public static function getTransaction($transactionId)
	{
    $uri = RecurlyClient::PATH_TRANSACTIONS . urlencode($transactionId);
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'transaction');
		} else if ($result->code == '404') {
			return null;
		} else {
			throw new RecurlyException("Could not get transaction for {$transactionId}: {$result->response} -- ({$result->code})");
		}
	}

	public function create()
	{
		$uri = RecurlyClient::PATH_TRANSACTIONS;
		$data = $this->getXml();
		$result = RecurlyClient::__sendRequest($uri, 'POST', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'transaction');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not create a transaction for {$this->account->account_code}: {$result->response} -- ({$result->code})");
		}
	}

  // Will attempt to void (or refund) the given transaction.
	public function void()
	{
		$uri = RecurlyClient::PATH_TRANSACTIONS . urlencode($this->id);
		$uri .= '?action=void';
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not void the transaction: {$result->response} ({$result->code})");
		}
	}

  // Will attempt to refund the given transaction.
	public function refund($amount_in_cents = null)
	{
		$uri = RecurlyClient::PATH_TRANSACTIONS . urlencode($this->id);
		if (!is_null($amount_in_cents))
		  $uri .= '?amount_in_cents=' . $amount_in_cents;
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not refund the transaction: {$result->response} ({$result->code})");
		}
	}

	/* Normalize the amount to a positive float amount */
	public function amount()
	{
		return abs($this->amount_in_cents / 100.0);
	}

	public function getXml()
	{
		$doc = new DOMDocument("1.0");
		$root = $doc->appendChild($doc->createElement("transaction"));
		$root->appendChild($doc->createElement("amount_in_cents", $this->amount_in_cents));
		$root->appendChild($doc->createElement("description", $this->description));

    if (isset($this->currency) && $this->currency != null) {
      $root->appendChild($doc->createElement("currency", $this->currency));
    }

		if (isset($this->account)) { 
		  $account_node = $this->account->populateXmlDoc($doc, $root);
		  if (isset($this->billing_info)) { $this->billing_info->populateXmlDoc($doc, $account_node); }
		}
		else {
		  throw new RecurlyException("Cannot create a transaction without specifying an account.");
    }

		return $doc->saveXML();
	}
}
