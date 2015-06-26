<?php

class Recurly_CouponRedemptionList extends Recurly_Pager
{
  public static function get($params = null, $client = null)
  {
    $list = new Recurly_CouponRedemptionList(Recurly_Client::PATH_COUPON_REDEMPTION, $client);
    $list->_loadFrom(Recurly_Client::PATH_COUPON_REDEMPTION, $params);
    return $list;
  }

  protected function getNodeName() {
    return 'redemptions';
  }
}
