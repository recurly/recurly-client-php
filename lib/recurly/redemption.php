<?php

class Recurly_CouponRedemption extends Recurly_Resource
{
  protected static $_redeemUrl;

  public static function get($accountCode, $client = null) {
    return Recurly_Base::_get(Recurly_CouponRedemption::uriForAccount($accountCode), $client);
  }

  public static function getRedemptions($accountCode, $client = null) {
    return Recurly_Base::_get(Recurly_CouponRedemption::uriForAccountRedemptions($accountCode), $client);
  }

  public static function getRedemptionByUuid($accountCode, $uuid, $client = null) {
    return Recurly_Base::_get(Recurly_CouponRedemption::uriForAccountRedemptions($accountCode, $uuid), $client);
  }

  public function delete($accountCode = null) {
    return Recurly_Base::_delete($this->uri($accountCode), $this->_client);
  }

  protected function uri($accountCode = null) {
    if (!empty($this->_href))
      return $this->getHref();
    else if(!empty($accountCode))
      return Recurly_CouponRedemption::uriForAccount($accountCode);
    else
      return false;
  }

  protected static function uriForAccount($accountCode) {
    return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_COUPON_REDEMPTION;
  }

  protected static function uriForAccountRedemptions($accountCode, $uuid = null) {
    if ($uuid == null) {
      return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_COUPON_REDEMPTIONS;
    } else {
      return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_COUPON_REDEMPTIONS . '/' . $uuid;
    }
  }

  protected function getNodeName() {
    return 'redemption';
  }
  protected function getWriteableAttributes() {
    return array('account_code', 'currency', 'subscription_uuid');
  }
}
