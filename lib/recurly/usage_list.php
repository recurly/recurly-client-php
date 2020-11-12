<?php

class Recurly_UsageList extends Recurly_Pager {

  public static function get($subUuid, $addOnCode, $params = null, $client = null) {
    $uri = self::_safeUri(
      Recurly_Client::PATH_SUBSCRIPTIONS, $subUuid, 
      Recurly_Client::PATH_ADDONS, $addOnCode, 
      Recurly_Client::PATH_USAGE
    );
    $uri = self::_uriWithParams($uri, $params);
    return new self($uri, $client);
  }

  /**
   * Performs a request with the `per_page` set to `n` and only returns
   * the first `n` results in the response.
   */
  public static function take($n, $params = null, $client = null) {
    $params['per_page'] = $n;
    $pager = self::get($params, $client);
    return $pager->get_first_page();
  }

  protected function getNodeName() {
    return 'usages';
  }
}
