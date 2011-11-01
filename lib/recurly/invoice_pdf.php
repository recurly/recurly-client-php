<?php

class Recurly_InvoicePDF
{
	private $account;
	private $username;
	private $password;
	private $invoiceId;
	private $pdf;

	function __construct($account, $username, $password)
	{
		$this->account = $account;
		$this->username = $username;
		$this->password = $password;
	}

	public function get($invoiceId)
	{
		$this->invoiceId = $invoiceId;

		$uri = 'https://' . $this->account . '.recurly.com/invoices/' . $invoiceId . '.pdf';
		$this->pdf = $this->_sendRequest($uri);
	}

	public function display()
	{
		header('Content-type: application/pdf');
		echo $this->pdf;
	}

	private function _sendRequest($uri)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $uri);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 45);
		curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);

		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}