<?php

class Recurly_Invoice extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Invoice::$_writeableAttributes = array('terms_and_conditions', 'customer_notes', 'vat_reverse_charge_notes');
    Recurly_Invoice::$_nestedAttributes = array('account','line_items','transactions');
  }

  /**
   * Lookup an invoice by its ID
   * @param string Invoice number
   * @return Recurly_Invoice invoice
   */
  public static function get($invoiceNumber, $client = null) {
    return self::_get(Recurly_Invoice::uriForInvoice($invoiceNumber), $client);
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
    $uri = self::uriForInvoice($invoiceNumber);

    if (is_null($client))
      $client = new Recurly_Client();

    return $client->getPdf($uri, $locale);
  }

  /**
   * Creates an invoice for an account using its pending charges
   * @param string Unique account code
   * @param array additional invoice attributes (see writeableAttributes)
   * @return Recurly_Invoice invoice on success
   */
  public static function invoicePendingCharges($accountCode, $attributes = array(), $client = null) {
    $uri = Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_INVOICES;
    $invoice = new self();
    return self::_post($uri, $invoice->setValues($attributes)->xml(), $client);
  }

  /**
   * Previews an invoice for an account using its pending charges
   * @param string Unique account code
   * @param array additional invoice attributes (see writeableAttributes)
   * @return Recurly_Invoice invoice on success
   */
  public static function previewPendingCharges($accountCode, $attributes = array(), $client = null) {
    $uri = Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_INVOICES . '/preview';
    $invoice = new self();
    return self::_post($uri, $invoice->setValues($attributes)->xml(), $client);
  }

  public function markSuccessful() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/mark_successful');
  }
  public function markFailed() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/mark_failed');
  }

  public function invoiceNumberWithPrefix() {
    return $this->invoice_number_prefix . $this->invoice_number;
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
  protected function uri() {
    $invoiceNumberWithPrefix = $this->invoiceNumberWithPrefix();
    if (!empty($this->_href))
      return $this->getHref();
    else if (!empty($invoiceNumberWithPrefix))
      return Recurly_Invoice::uriForInvoice($invoiceNumberWithPrefix);
    else
      throw new Recurly_Error("Invoice number not specified");
  }
  protected static function uriForInvoice($invoiceNumber) {
    return Recurly_Client::PATH_INVOICES . '/' . rawurlencode($invoiceNumber);
  }
}

Recurly_Invoice::init();
