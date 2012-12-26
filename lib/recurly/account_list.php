<?php

class Recurly_AccountList extends Recurly_Pager
{
  public static function getActive($params = null, $client = null) {
    return Recurly_AccountList::get(Recurly_Pager::_setState($params, 'active'), $client);
  }

  public static function getClosed($params = null, $client = null) {
    return Recurly_AccountList::get(Recurly_Pager::_setState($params, 'closed'), $client);
  }

  public static function getPastDue($params = null, $client = null) {
    return Recurly_AccountList::get(Recurly_Pager::_setState($params, 'past_due'), $client);
  }

  public static function get($params = null, $client = null)
  {
    $list = new Recurly_AccountList(Recurly_Client::PATH_ACCOUNTS, $client);
    $list->_loadFrom(Recurly_Client::PATH_ACCOUNTS, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'accounts';
  }
}
