<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2010 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyTransaction
{
  var $id;
  var $amount_in_cents;
  var $description;
  var $date;
  var $message;
  var $success;
  var $voidable;
  var $refundable;

  public function RecurlyTransaction($amount = 0, $description = null, RecurlyAccount $acct = null)
	{
		if (isset($acct)) { $this->account = $acct; }
		$this->amount_in_cents = intval($amount * 100);
		$this->description = $description;
	}

	public function create()
	{
		$uri = RecurlyClient::PATH_TRANSACTIONS;
		$data = $this->getXml();
		$result = RecurlyClient::__sendRequest($uri, 'POST', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'subscription');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not create a subscription for {$this->account->account_code}: {$result->response} -- ({$result->code})");
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
		if (isset($this->account)) { $this->account->populateXmlDoc($doc, $root); }
		return $doc->saveXML();
	}
}
