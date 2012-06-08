<?php

class Recurly_Invoice extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Invoice::$_writeableAttributes = array();
    Recurly_Invoice::$_nestedAttributes = array('account','line_items','transactions');
  }

  /**
   * Lookup an invoice by its ID
   * @param string Invoice number or UUID
   * @return Recurly_Invoice invoice
   */
  public static function get($invoiceNumber, $client = null) {
    $uri = Recurly_Client::PATH_INVOICES . '/' . rawurlencode($invoiceNumber);
    return self::_get($uri, $client);
  }

  /**
   * Retrieve the PDF version of this invoice
   */
  public function getPdf($locale = null) {
    return Recurly_Invoice::getInvoicePdf($this->invoice_number, $locale, $this->_client);
  }

  /**
   * Retrieve the PDF version of an invoice
   */
  public static function getInvoicePdf($invoiceNumber, $locale = null, $client = null) {
    $uri = Recurly_Client::PATH_INVOICES . '/' . rawurlencode($invoiceNumber);

    if (is_null($client))
      $client = new Recurly_Client();

    return $client->getPdf($uri, $locale);
  }

  /**
   * Creates an invoice for an account using its pending charges
   * @param string Unique account code
   * @return Recurly_Invoice invoice on success
   */
  public static function invoicePendingCharges($accountCode, $client = null) {
    $uri = Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_INVOICES;
    return self::_post($uri, null, $client);
  }

  public function markSuccessful() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/mark_successful');
  }
  public function markFailed() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/mark_failed');
  }

  protected function getNodeName() {
    return 'invoice';
  }
  protected function getWriteableAttributes() {
    return Recurly_Invoice::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_Invoice::init();
