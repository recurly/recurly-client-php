<?php

class Recurly_BusinessEntityList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_BUSINESS_ENTITIES, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'business_entities';
  }
}
