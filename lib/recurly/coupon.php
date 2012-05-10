<?php

class Recurly_Coupon extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;
  protected $_redeemUrl;

  function __construct() {
    $this->discount_in_cents = new Recurly_CurrencyList('discount_in_cents');
  }

  public static function init()
  {
    Recurly_Coupon::$_writeableAttributes = array(
      'coupon_code','name','discount_type','redeem_by_date','single_use','applies_for_months',
      'max_redemptions','applies_to_all_plans','discount_percent','discount_in_cents','plan_codes',
      'hosted_description','invoice_description'
    );
    Recurly_Coupon::$_nestedAttributes = array();
  }

  public static function get($couponCode, $client = null) {
    return Recurly_Base::_get(Recurly_Coupon::uriForCoupon($couponCode), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_COUPONS);
  }

  public function redeemCoupon($accountCode, $currency) {
    $redemption = new Recurly_CouponRedemption();
    $redemption->account_code = $accountCode;
    $redemption->currency = $currency;

    foreach ($this->_links as $link) {
      if ($link->name == 'redeem') {
        $redemption->_save(strtoupper($link->method), $link->href);
        return $redemption;
      }
    }
  }


  public function delete() {
    return Recurly_Resource::_delete($this->uri());
  }
  public static function deleteCoupon($couponCode) {
    return Recurly_Resource::_delete(Recurly_Coupon::uriForCoupon($couponCode));
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_Coupon::uriForCoupon($this->coupon_code);
  }
  protected static function uriForCoupon($couponCode) {
    return Recurly_Client::PATH_COUPONS . '/' . rawurlencode($couponCode);
  }

  protected function getNodeName() {
    return 'coupon';
  }
  protected function getWriteableAttributes() {
    return Recurly_Coupon::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_Coupon::init();
