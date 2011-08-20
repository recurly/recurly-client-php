<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlySubscription
{
	var $account;		// User account information
	var $plan_code;		// Subscription plan's code
	var $coupon_code; // Apply a coupon to a new subscription
	var $unit_amount;	// Defaults to plan's current price if not set
	var $currency;		// Subscription currency code (e.g. "USD")
	var $quantity;		// Defaults to 1
	var $billing_info;	// Account's billing information
	var $add_ons;		// Subscription's add ons

	/* These values are populated by Recurly -- they do not need to be set by you. */
	var $activated_at;              // Date the subscription started
	var $canceled_at;               // If set, the date the subscriber canceled their subscription
	var $expires_at;                // If set, the subscription will expire on this date
	var $current_period_started_at; // Date the current invoice period started
	var $current_period_ends_at;    // The subscription is paid until this date / Next Invoice date
	var $trial_period_started_at;   // Date the trial started, if the subscription has a trial
	var $trial_period_ends_at;      // Date the trial ends, if the subscription has/had a trial
	var $pending_subscription;      // Set if the subscription has a pending change

	var $errors; // Set by the transparent post result
	
	public function create()
	{
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($this->account->account_code) . RecurlyClient::PATH_ACCOUNT_SUBSCRIPTION;
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
	
	public static function getSubscription($accountCode)
	{
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_ACCOUNT_SUBSCRIPTION;
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'subscription');
		} else if ($result->code == '404') {
			return null;
		} else {
			throw new RecurlyException("Could not get subscription for {$accountCode}: {$result->response} -- ({$result->code})");
		}
	}
	
	public static function cancelSubscription($accountCode)
	{
		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_ACCOUNT_SUBSCRIPTION;
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not cancel the subscription for {$accountCode}: {$result->response} ({$result->code})");
		}
	}
	
	public static function refundSubscription($accountCode, $refund_type = 'partial')
	{
	  /* Support previous PHP library that accepted a boolean for refund type */
	  if (is_bool($refund_type)) { $refund_type = ($refund_type ? 'full' : 'partial'); }
	  /* Verify refund type is supported */
	  if (!in_array($refund_type, array('full', 'partial', 'none'))) { throw new RecurlyException("Invalid refund type"); }

		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_ACCOUNT_SUBSCRIPTION;
		$uri .= '?refund=' . $refund_type;
		$result = RecurlyClient::__sendRequest($uri, 'DELETE');
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
		  if ($refund_type == 'none') {
		    throw new RecurlyException("Could not terminate the subscription for {$accountCode}: {$result->response} ({$result->code})");
	    } else {
			  throw new RecurlyException("Could not refund the subscription for {$accountCode}: {$result->response} ({$result->code})");
		  }
		}
	}

  // Immediately end the subscription without a refund.
	public static function terminateSubscription($accountCode)
	{
	  return RecurlySubscription::refundSubscription($accountCode, 'none');
	}

	// Change the subscription 'now' or at 'renewal'.
	// Set a value to change it. Leave it as null otherwise.
	public static function changeSubscription($accountCode, $timeframe = 'now', $newPlanCode = null, $newQuantity = null, $newUnitAmount = null, $addOns = null)
	{
		error_log('<br>quant:' . $newQuantity);
		if (!($timeframe == 'now' || $timeframe == 'renewal'))
			throw new RecurlyException("The timeframe must be 'now' or 'renewal'.");

		$uri = RecurlyClient::PATH_ACCOUNTS . urlencode($accountCode) . RecurlyClient::PATH_ACCOUNT_SUBSCRIPTION;
		$data = RecurlySubscription::getChangeSubscriptionXml($timeframe, $newPlanCode, $newQuantity, $newUnitAmount, $addOns);
		$result = RecurlyClient::__sendRequest($uri, 'PUT', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return true;
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not change the subscription for {$accountCode}: {$result->response} ({$result->code})");
		}
	}
	
	public function getXml()
	{
		$doc = new DOMDocument("1.0");
		$this->populateXmlDoc($doc);		
		return $doc->saveXML();
	}
	
	public function populateXmlDoc(&$doc)
	{
		$root = $doc->appendChild($doc->createElement("subscription"));
		$root->appendChild($doc->createElement("plan_code", $this->plan_code));

		if (isset($this->coupon_code))
			$root->appendChild($doc->createElement("coupon_code", $this->coupon_code));

		if (isset($this->trial_period_ends_at))
		  $root->appendChild($doc->createElement("trial_ends_at", $this->trial_period_ends_at));

		if (isset($this->quantity) && is_numeric($this->quantity))
			$root->appendChild($doc->createElement("quantity", $this->quantity));

		if (isset($this->unit_amount) && is_numeric($this->unit_amount))
			$root->appendChild($doc->createElement("unit_amount", $this->unit_amount));

		if (isset($this->currency))
			$root->appendChild($doc->createElement("currency", $this->currency));

		if (isset($this->add_ons))
		  $root->appendChild(RecurlySubscription::getAddOnsXml($this->add_ons, $doc));

		if (isset($this->account))
		{
		  $account_node = $this->account->populateXmlDoc($doc, $root);

      if (isset($this->billing_info))
        $this->billing_info->populateXmlDoc($doc, $account_node);
	  }

		return $root;
	}
	
	public static function getChangeSubscriptionXml($timeframe, $newPlanCode, $newQuantity, $newUnitAmount, $add_ons)
	{
    $doc = new DOMDocument("1.0");
		$root = $doc->appendChild($doc->createElement("subscription"));
		$root->appendChild($doc->createElement("timeframe", $timeframe));
		
		if ($newPlanCode != null)
      $root->appendChild($doc->createElement("plan_code", $newPlanCode));

		if ($newQuantity != null)
      $root->appendChild($doc->createElement("quantity", $newQuantity));

		if ($newUnitAmount != null)
      $root->appendChild($doc->createElement("unit_amount", $newUnitAmount));

		if (isset($add_ons))
		  $root->appendChild(RecurlySubscription::getAddOnsXml($add_ons, $doc));

		return $doc->saveXML();
	}
	
	public static function getAddOnsXml($add_ons, $doc){
		$add_ons_elem = $doc->createElement("add_ons");
		foreach($add_ons as $add_on){
			$add_on_elem = $doc->createElement('add_on');
			$add_on_elem->appendChild($doc->createElement('add_on_code', $add_on->add_on_code));
			
			if (isset($add_on->quantity) && is_numeric($add_on->quantity))
			  $add_on_elem->appendChild($doc->createElement('quantity', $add_on->quantity));

			if (isset($add_on->unit_amount_in_cents) && is_numeric($add_on->unit_amount_in_cents))
			  $add_on_elem->appendChild($doc->createElement('unit_amount_in_cents', $add_on->unit_amount_in_cents));

			$add_ons_elem->appendChild($add_on_elem);
		}
		return $add_ons_elem;
	}
}

class RecurlyPendingSubscription
{
  var $plan_code;
  var $quantity;
  var $activates_at;
}