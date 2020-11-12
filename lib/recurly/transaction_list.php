<?php

class Recurly_TransactionList extends Recurly_Pager
{
  public static function getSuccessful($params = null, $client = null) {
    return Recurly_TransactionList::get(Recurly_Pager::_setState($params, 'successful'), $client);
  }

  public static function getVoided($params = null, $client = null) {
    return Recurly_TransactionList::get(Recurly_Pager::_setState($params, 'voided'), $client);
  }

  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_TRANSACTIONS, $params);
    return new self($uri, $client);
  }

  public static function getForAccount($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(
      self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_TRANSACTIONS), 
      $params
    );
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
    return 'transactions';
  }
}
