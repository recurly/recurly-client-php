<?php

class Recurly_ExternalPaymentPhaseList extends Recurly_Pager
{
  public static function get($uuid, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS, $uuid, Recurly_Client::PATH_EXTERNAL_PAYMENT_PHASES), $params);
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
    return 'external_payment_phases';
  }
}
