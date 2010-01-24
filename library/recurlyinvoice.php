<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2010 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyInvoice
{
	var $id;
	var $account_code;
	var $date;
	var $invoice_number;
	
	
	function RecurlyInvoice($accountCode = null)
	{
		$this->account_code = $accountCode;
	}
	
	public static function getInvoice($invoiceId)
	{
    $uri = RecurlyClient::PATH_INVOICES . urlencode($invoiceId);
		$result = RecurlyClient::__sendRequest($uri, 'GET');
		if (preg_match("/^2..$/", $result->code)) {
			return RecurlyClient::__parse_xml($result->response, 'invoice');
		} else if ($result->code == '404') {
			return null;
		} else {
			throw new RecurlyException("Could not get invoice for {$invoiceId}: {$result->response} -- ({$result->code})");
		}
	}
}

class RecurlyLineItem
{
  var $id;
  var $type;
  var $amount_in_cents;
  var $start_date;
  var $end_date;
  var $description;
  var $created_at;
}