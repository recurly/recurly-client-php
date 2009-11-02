<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2009 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyCreditCard
{
	var $number;             /* Not returned by Recurly */
	var $verification_value; /* Not returned by Recurly */
	var $month;              /* Card expiration year */
	var $year;               /* Card expiration month */
	
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
}