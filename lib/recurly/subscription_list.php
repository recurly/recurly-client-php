<?php

class Recurly_SubscriptionList extends Recurly_Pager
{
  public static function getActive($params = null, $client = null) {
    return Recurly_SubscriptionList::get(Recurly_Pager::_setState($params, 'active'), $client);
  }
  public static function getTrials($params = null, $client = null) {
    return Recurly_SubscriptionList::get(Recurly_Pager::_setState($params, 'in_trial'), $client);
  }
  public static function getNonRenewing($params = null, $client = null) {
    return Recurly_SubscriptionList::get(Recurly_Pager::_setState($params, 'non_renewing'), $client);
  }

  public static function get($params = null, $client = null)
  {
    $list = new Recurly_SubscriptionList(Recurly_Client::PATH_SUBSCRIPTIONS, $client);
    $list->_loadFrom(Recurly_Client::PATH_SUBSCRIPTIONS, $params);
    return $list;
  }
  
  public static function getForAccount($accountCode, $params = null, $client = null)
  {
    $list = new Recurly_SubscriptionList(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_SUBSCRIPTIONS, $client);
    $list->_loadFrom(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_SUBSCRIPTIONS, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'subscriptions';
  }
}
