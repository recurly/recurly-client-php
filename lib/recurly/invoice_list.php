<?php

class Recurly_InvoiceList extends Recurly_Pager
{
  public static function getPending($params = null, $client = null) {
    return Recurly_InvoiceList::get(Recurly_Pager::_setState($params, 'pending'), $client);
  }

  public static function getPaid($params = null, $client = null) {
    return Recurly_InvoiceList::get(Recurly_Pager::_setState($params, 'paid'), $client);
  }

  public static function getFailed($params = null, $client = null) {
    return Recurly_InvoiceList::get(Recurly_Pager::_setState($params, 'failed'), $client);
  }

  public static function getPastDue($params = null, $client = null) {
    return Recurly_InvoiceList::get(Recurly_Pager::_setState($params, 'past_due'), $client);
  }

  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_INVOICES, $params);
    return new self($uri, $client);
  }

  public static function getForAccount($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_INVOICES), $params);
    return new self($uri, $client);
  }

  public static function getForBusinessEntity($businessEntityUUID, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_BUSINESS_ENTITIES, $businessEntityUUID, Recurly_Client::PATH_INVOICES), $params);
    return new self($uri, $client);
  }

  /**
   * Performs a request with the `per_page` set to `n` and only returns
   * the first `n` results in the response.
   */
  public static function take($n, $params = null, $client = null) {
    $params['per_page'] = $n;
    $pager = self::get($params, $client);
    return $pager->get_first_page();
  }

  protected function getNodeName() {
    return 'invoices';
  }
}
