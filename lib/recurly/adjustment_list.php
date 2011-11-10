<?php

class Recurly_AdjustmentList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null)
  {
    $list = new Recurly_AdjustmentList(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_ADJUSTMENTS, $client);
    $list->_loadFrom(Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_ADJUSTMENTS, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'adjustments';
  }
}
