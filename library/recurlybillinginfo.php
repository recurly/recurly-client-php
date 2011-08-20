<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyBillingInfo
{
	var $account_code;
	
	var $first_name;
	var $last_name;
	var $address1;
	var $address2;
	var $city;
	var $state;
	var $country;
	var $zip;
	var $credit_card;
	var $ip_address;
	var $vat_number;
	var $phone;
	
	function RecurlyBillingInfo($accountCode = null)
	{
		$this->account_code = $accountCode;
		$this->ip_address = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
		$this->credit_card = new RecurlyCreditCard();
	}
	
	public static function getBillingInfo($accountCode)
	{
    $uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_BILLING_INFO;
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'billing_info');
		} else if ($result->code == '404') {
			return null;
		} else {
			throw new RecurlyException("Could not get billing info for {$accountCode}: {$result->response} -- ({$result->code})");
		}
	}
	
	public function update()
	{
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($this->account_code) . RecurlyClient::PATH_BILLING_INFO;
		$data = $this->getXml();
		$result = RecurlyClient::__sendRequest($uri, 'PUT', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'billing_info');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not update the billing information for {$this->account_code}: {$result->response} ({$result->code})");
		}
	}
	
	/* Clear the stored billing information for this account. */
	public function clear()
	{
  	$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($this->account_code) . RecurlyClient::PATH_BILLING_INFO;
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not clear the billing info for {$this->accountCode}: {$result->response} ({$result->code})");
		}
	}
	
	public function getXml()
	{
		$doc = new DOMDocument("1.0");
		$account = $doc->appendChild($doc->createElement("account"));
		$billing = $this->populateXmlDoc($doc, $account);
		
		return $doc->saveXML();
	}
	
	public function populateXmlDoc(&$doc, &$root)
	{
		$billing = $root->appendChild($doc->createElement("billing_info"));
		$billing->appendChild($doc->createElement("first_name", $this->first_name));
		$billing->appendChild($doc->createElement("last_name", $this->last_name));
		$billing->appendChild($doc->createElement("address1", $this->address1));
		$billing->appendChild($doc->createElement("address2", $this->address2));
		$billing->appendChild($doc->createElement("city", $this->city));
		$billing->appendChild($doc->createElement("state", $this->state));
		$billing->appendChild($doc->createElement("zip", $this->zip));
		$billing->appendChild($doc->createElement("country", $this->country));
		$billing->appendChild($doc->createElement("phone", $this->phone));
		$billing->appendChild($doc->createElement("vat_number", $this->vat_number));
		
		if (isset($this->ip_address) && !empty($this->ip_address))
			$billing->appendChild($doc->createElement("ip_address", $this->ip_address));
		
		if (isset($this->credit_card) && $this->credit_card != null)
			$this->credit_card->populateXmlDoc($doc, $billing);
		
		return $billing;
	}
}
