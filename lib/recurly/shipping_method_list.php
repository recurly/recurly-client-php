<?php

class Recurly_ShippingMethodList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_SHIPPING_METHOD, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'shipping_methods';
  }
}
