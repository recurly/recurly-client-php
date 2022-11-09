<?php

class Recurly_ExternalSubscriptionList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS, $params);
    return new self($uri, $client);
  }

  public static function getForAccount($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS), $params);
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
    return 'external_subscriptions';
  }
}
