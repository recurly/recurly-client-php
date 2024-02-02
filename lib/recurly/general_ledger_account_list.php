<?php

class Recurly_GeneralLedgerAccountList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_GENERAL_LEDGER_ACCOUNTS, $params);
    return new self($uri, $client);
  }

  public static function getByAccountType($account_type, $client = null) {
    $params['account_type'] = $account_type;
    return self::get($params, $client);
  }

  protected function getNodeName() {
    return 'general_ledger_accounts';
  }
}
