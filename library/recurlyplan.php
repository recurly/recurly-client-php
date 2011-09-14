<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyPlan
{
	var $plan_code;
	var $name;
	var $description;
	var $unit_amount_in_cents;
	var $plan_interval_length;
	var $plan_interval_unit;
	var $trial_interval_length;
	var $trial_interval_unit;
	
	function RecurlyPlan($plan_code = null)
	{
		$this->plan_code = $plan_code;
	}
	
	public static function getPlans()
	{
		$uri = RecurlyClient::PATH_PLANS;
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			$plans = RecurlyClient::__parse_xml($result->response, 'plan');
			return ($plans != null && !is_array($plans)) ? array($plans) : $plans;
		} else {
			throw new RecurlyException("Could not get subscription plans: {$result->response} -- ({$result->code})");
		}
	}

	public static function getPlan($planCode)
	{
		$uri = RecurlyClient::PATH_PLANS . urlencode($planCode);
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'plan');
		} else if ($result->code == '404') {
			return null;
		} else {
			throw new RecurlyException("Could not get subscription plan {$planCode}: {$result->response} -- ({$result->code})");
		}
	}
	
	public function create()
	{
		$uri = RecurlyClient::PATH_PLANS;
		$data = $this->getXml();
		$result = RecurlyClient::__sendRequest($uri, 'POST', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'plan');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not create an account for {$this->plan_code}: {$result->response} -- ({$result->code}) ");
		}
	}
	
	public function update()
	{
		$uri = RecurlyClient::PATH_PLANS . urlencode($this->plan_code);
		$data = $this->getXml();
		$result = RecurlyClient::__sendRequest($uri, 'PUT', $data);
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'plan');
		} else if (strpos($result->response, '<errors>') > 0 && $result->code == 422) {
			throw new RecurlyValidationException($result->code, $result->response);
		} else {
			throw new RecurlyException("Could not update the plan for {$this->plan_code}: {$result->response} ({$result->code})");
		}
	
	}
	
	public function getXml()
	{
		$doc = new DOMDocument("1.0");
		$this->populateXmlDoc($doc, $doc);
		return $doc->saveXML();
	}
	
	public function populateXmlDoc(&$doc, &$root)
	{
		$plan = $root->appendChild($doc->createElement("plan"));
		$plan->appendChild($doc->createElement("plan_code", $this->plan_code));
		$plan->appendChild($doc->createElement("name", $this->name));
		$plan->appendChild($doc->createElement("description", $this->description));
		$plan->appendChild($doc->createElement("unit_amount_in_cents", $this->unit_amount_in_cents));
		$plan->appendChild($doc->createElement("plan_interval_length", $this->plan_interval_length));
		$plan->appendChild($doc->createElement("plan_interval_unit", $this->plan_interval_unit));
		$plan->appendChild($doc->createElement("trial_interval_length", $this->trial_interval_length));
		$plan->appendChild($doc->createElement("trial_interval_unit", $this->trial_interval_unit));
		$plan->appendChild($doc->createElement("setup_fee_in_cents", $this->setup_fee_in_cents));
		return $plan;
	}	
}