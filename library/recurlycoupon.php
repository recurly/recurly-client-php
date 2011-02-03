<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyCoupon
{  
	var $account_code;
	var $coupon_code;

	/* These values are populated by Recurly -- they do not need to be set by you. */
	var $name;
	var $discount_in_cents;
	var $discount_percent;

	var $redemption; /* Information on the coupon being redeemed */

	function RecurlyCoupon($accountCode = null, $couponCode = null)
	{
	  $this->account_code = $accountCode;
		$this->coupon_code = $couponCode;
	}
}
