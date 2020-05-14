<?php

class Recurly_ShippingAddressList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, '/shipping_addresses'), $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'shipping_addresses';
  }
}
