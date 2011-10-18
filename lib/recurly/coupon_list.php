<?php

class Recurly_CouponList extends Recurly_Pager
{
  public static function get($params = null, $client = null)
  {
    $list = new Recurly_CouponList(Recurly_Client::PATH_COUPONS, $client);
    $list->_loadFrom(Recurly_Client::PATH_COUPONS, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'coupons';
  }
}
