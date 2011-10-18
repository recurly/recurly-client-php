<?php

class Recurly_PlanList extends Recurly_Pager
{
  public static function get($params = null, $client = null)
  {
    $list = new Recurly_PlanList(Recurly_Client::PATH_PLANS, $client);
    $list->_loadFrom(Recurly_Client::PATH_PLANS, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'plans';
  }
}
