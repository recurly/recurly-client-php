<?php

class Recurly_AddonList extends Recurly_Pager
{
  public static function get($planCode, $client = null)
  {
    $list = new Recurly_AddonList();
    $list->_loadFrom(Recurly_Client::PATH_PLANS . '/' . rawurlencode($planCode) . Recurly_Client::PATH_ADDONS, $client);
    return $list;
  }

  protected function getNodeName() {
    return 'add_ons';
  }
}
