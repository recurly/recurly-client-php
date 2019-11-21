<?php

class Recurly_ItemList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_ITEMS, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'items';
  }
}
