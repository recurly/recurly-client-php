<?php

class Recurly_AddonList extends Recurly_Pager
{
  public static function get($planCode, $params = null, $client = null)
  {
    $planPath = self::_uriForResource(Recurly_Client::PATH_PLANS, rawurlencode($planCode));
    $uri = self::_uriWithParams($planPath . Recurly_Client::PATH_ADDONS, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'add_ons';
  }
}
