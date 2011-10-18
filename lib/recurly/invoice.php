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
   * @param string Invoice ID
   * @return Recurly_Invoice invoice
   */
  public static function get($uuid, $client = null) {
    $uri = Recurly_Client::PATH_INVOICES . '/' . urlencode($uuid);
    return self::_get($uri, $client);
  }

  /**
   * Creates an invoice for an account using its pending charges
   * @param string Unique account code
   * @return Recurly_Invoice invoice on success
   */
  public static function invoicePendingCharges($accountCode, $client = null) {
    $uri = Recurly_Client::PATH_ACCOUNTS . '/' . urlencode($accountCode) . Recurly_Client::PATH_INVOICES;
    return self::_post($uri, null, $client);
  }

  protected function getNodeName() {
    return 'invoice';
  }
  protected function getWriteableAttributes() {
    return Recurly_Account::$__writeableAttributes;
  }
}

Recurly_Invoice::init();
