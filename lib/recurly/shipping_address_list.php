<?php

class Recurly_ShippingAddressList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $accountPath = self::_uriForResource(Recurly_Client::PATH_ACCOUNTS, rawurlencode($accountCode));
    $uri = self::_uriWithParams($accountPath . '/shipping_addresses', $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'shipping_addresses';
  }
}
