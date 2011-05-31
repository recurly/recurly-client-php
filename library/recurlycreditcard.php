<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyCreditCard
{
	var $number;             /* Not returned by Recurly */
	var $verification_value; /* Not returned by Recurly */
	var $month;              /* Card expiration month */
	var $year;               /* Card expiration year */
	
	var $start_month;        /* Required for Solo cards */
	var $start_year;         /* Required for Solo cards */
	var $issue_number;       /* Required for Solo cards */

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

    if (isset($this->start_month))
      $cc->appendChild($doc->createElement('start_month', $this->start_month));
    if (isset($this->start_year))
      $cc->appendChild($doc->createElement('start_year', $this->start_year));
    if (isset($this->issue_number))
      $cc->appendChild($doc->createElement('issue_number', $this->issue_number));

		return $cc;
	}

	public function isValid() {
	  if (is_null($this->number))
	    return false;

	  # Test for Luhn validation
	  $digits = preg_replace('/[^0-9]/', '', $this->number);
	  return $this->isLuhnValid($digits);
	}

	# http://en.wikipedia.org/wiki/Luhn_algorithm
	function isLuhnValid($str)
  {
    if (strspn($str, "0123456789") != strlen($str)) {
      return false; // non-digit found
    }
    $map = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, // for even indices
                 0, 2, 4, 6, 8, 1, 3, 5, 7, 9); // for odd indices
    $sum = 0;
    $last = strlen($str) - 1;
    for ($i = 0; $i <= $last; $i++) {
      $sum += $map[$str[$last - $i] + ($i & 1) * 10];
    }
    return $sum % 10 == 0;
  }
}
