<?php

class Recurly_AdjustmentList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(
      self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_ADJUSTMENTS), 
      $params
    );
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'adjustments';
  }
}
