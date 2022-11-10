<?php

class Recurly_EntitlementList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_ENTITLEMENTS), $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'entitlements';
  }
}
