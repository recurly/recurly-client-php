<?php

class Recurly_UsageList extends Recurly_Pager {

  public static function get($subUuid, $addOnCode, $params = null, $client = null) {
    $subPath = self::_uriForResource(Recurly_Client::PATH_SUBSCRIPTIONS, rawurlencode($subUuid));
    $addOnPath = self::_uriForResource(Recurly_Client::PATH_ADDONS, rawurlencode($addOnCode));
    $uri = $subPath . $addOnPath . Recurly_Client::PATH_USAGE;
    $uri = self::_uriWithParams($uri, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'usages';
  }
}
