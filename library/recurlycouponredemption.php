<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyCouponRedemption
{
	/* These values are populated by Recurly -- they do not need to be set by you. */
	var $account_code;
	var $redeemed_at;
	var $total_discounted_in_cents;

	function RecurlyCouponRedemption($accountCode = null)
	{
	  $this->account_code = $accountCode;
	}

  public static function getCoupon($accountCode)
  {
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_ACCOUNT_COUPON;
  	$result = RecurlyClient::__sendRequest($uri, 'GET');
  	if (preg_match("/^2..$/", $result->code)) {
  		return RecurlyClient::__parse_xml($result->response, 'coupon');
  	} else if ($result->code == '404') {
  		return null;
  	} else {
  		throw new RecurlyException("Could not get the coupon for {$accountCode}: {$result->response} -- ({$result->code})");
  	}
  }

	public function create($couponCode)
	{
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($this->account_code) . RecurlyClient::PATH_ACCOUNT_COUPON;
		$data = $this->getXml($couponCode);
		$result = RecurlyClient::__sendRequest($uri, 'POST', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'coupon');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not update the coupon for {$this->account_code}: {$result->response} ({$result->code})");
		}
	}
	
	/* Clear the stored coupon for this account. */
	public function clear()
	{
  	$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($this->account_code) . RecurlyClient::PATH_ACCOUNT_COUPON;
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not clear the coupon for {$this->accountCode}: {$result->response} ({$result->code})");
		}
	}

	public function getXml($couponCode)
	{
		$doc = new DOMDocument("1.0");
		$root = $doc->appendChild($doc->createElement("coupon"));
		$root->appendChild($doc->createElement("coupon_code", $couponCode));

		return $doc->saveXML();
	}
}
