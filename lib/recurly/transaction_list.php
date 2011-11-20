<?php

class Recurly_TransactionList extends Recurly_Pager
{
  public static function getSuccessful($params = null, $client = null) {
    return Recurly_TransactionList::get(Recurly_Pager::_setState($params, 'successful'), $client);
  }

  public static function getVoided($params = null, $client = null) {
    return Recurly_TransactionList::get(Recurly_Pager::_setState($params, 'voided'), $client);
  }

  public static function get($params = null, $client = null)
  {
    $list = new Recurly_TransactionList(Recurly_Client::PATH_TRANSACTIONS, $client);
    $list->_loadFrom(Recurly_Client::PATH_TRANSACTIONS, $params);
    return $list;
  }
  
  public static function getForAccount($accountCode, $params = null, $client = null)
  {
    $list = new Recurly_TransactionList(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_TRANSACTIONS, $client);
    $list->_loadFrom(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_TRANSACTIONS, $params);
    return $list;
  }
  
  protected function getNodeName() {
    return 'transactions';
  }
}
