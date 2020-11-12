<?php

class Recurly_ShippingAddressList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, 'shipping_addresses'), $params);
    return new self($uri, $client);
  }

  /**
   * Performs a request with the `per_page` set to `n` and only returns
   * the first `n` results in the response.
   */
  public static function take($n, $accountCode, $params = null, $client = null) {
    $params['per_page'] = $n;
    $pager = self::get($accountCode, $params, $client);
    return $pager->get_first_page();
  }

  protected function getNodeName() {
    return 'shipping_addresses';
  }
}
