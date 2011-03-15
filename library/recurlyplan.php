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
}