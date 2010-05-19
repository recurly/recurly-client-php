<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2010 {@link http://recurly.com Recurly, Inc.}
 */

	if (!defined('CC_VISA')) { define('CC_VISA', 'Visa'); }
	if (!defined('CC_MC')) { define('CC_MC', 'MasterCard'); }
	if (!defined('CC_AMEX')) { define('CC_AMEX', 'Amex'); }
	if (!defined('CC_DS')) { define('CC_DS', 'Discover'); }
	if (!defined('CC_BOGUS')) { define('CC_BOGUS', 'Bogus'); }
	if (!defined('CC_MAXLEN')) { define('CC_MAXLEN', 19); }

class RecurlyCreditCard
{
	var $number;             /* Not returned by Recurly */
	var $verification_value; /* Not returned by Recurly */
	var $month;              /* Card expiration month */
	var $year;               /* Card expiration year */

	var $type;               /* Populated when returned from Recurly */
	var $last_four;          /* Populated when returned from Recurly */

	function RecurlyCreditCard() {
	}

	public function populateXmlDoc(&$doc, &$root)
	{
		$cc = $root->appendChild($doc->createElement('credit_card'));
		$cc->appendChild($doc->createElement('number', $this->number));
		$cc->appendChild($doc->createElement('verification_value', $this->verification_value));
		$cc->appendChild($doc->createElement('year', $this->year));
		$cc->appendChild($doc->createElement('month', $this->month));

		return $cc;
	}

	public static $types = array('visa'=> CC_VISA, 'master'=> CC_MC, 'american_express'=> CC_AMEX, 'discover'=> CC_DS, 'bogus'=> CC_BOGUS);

	public function isValid() {
		require_once('creditcard.php');
		$type = array_key_exists($this->type, self::$types) ? self::$types[strtolower($this->type)] : CC_BOGUS;
		$cc = new CreditCard($type, $this->number, $this->verification_value, $this->month, $this->year, true);
		return strlen($this->last_four) > 0 && strtolower($this->type) !== 'unknown' && $cc->isValid();
	}
}
