<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_CouponTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/coupons/special', 'coupons/show-200.xml')
    );
  }

  public function testGetCoupon() {
    $coupon = Recurly_Coupon::get('special', $this->client);

    $this->assertInstanceOf('Recurly_Coupon', $coupon);
    $this->assertEquals('special', $coupon->coupon_code);
    $this->assertEquals(1304150400, $coupon->created_at->getTimestamp());
    $this->assertEquals('https://api.recurly.com/v2/coupons/special', $coupon->getHref());
    $this->assertInstanceOf('Recurly_CurrencyList', $coupon->discount_in_cents);
    $this->assertEquals(1000, $coupon->discount_in_cents['USD']->amount_in_cents);
    $this->assertTrue($coupon->applies_to_all_plans);
    $this->assertEquals(array(), $coupon->plan_codes);
  }

  public function testRedeemCoupon() {
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/coupons/special/redeem', 'coupons/redeem-201.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);
    $this->assertEquals('redeemable', $coupon->state);

    $redemption = $coupon->redeemCoupon('abcdef1234567890', 'USD');
    $this->assertInstanceOf('Recurly_CouponRedemption', $redemption);
  }

  public function testRedeemCouponExpired() {
    $this->client->addResponse('GET', '/coupons/expired', 'coupons/show-200-expired.xml');

    $coupon = Recurly_Coupon::get('expired', $this->client);
    $this->assertEquals('expired', $coupon->state);

    $this->setExpectedException('Recurly_Error', 'Coupon is not redeemable');
    $redemption = $coupon->redeemCoupon('abcdef1234567890', 'USD');
  }

  public function testDeleteCoupon() {
    $this->client->addResponse('DELETE', '/coupons/special', 'coupons/destroy-204.xml');

    Recurly_Coupon::deleteCoupon('special', $this->client);
  }

  // Parse plan_codes array in response
  public function testPlanCodesXml() {
    $this->client->addResponse('GET', '/coupons/special', 'coupons/show-200-2.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);

    $this->assertInstanceOf('Recurly_Coupon', $coupon);
    $this->assertTrue($coupon->applies_to_all_plans);
    $this->assertEquals(array('plan_one', 'plan_two'), $coupon->plan_codes);
  }

  public function testXml() {
    $coupon = new Recurly_Coupon();
    $coupon->coupon_code = 'fifteen-off';
    $coupon->name = '$15 Off';
    $coupon->discount_type = 'dollar';
    $coupon->discount_in_cents->addCurrency('USD', 1500);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents></coupon>\n",
      $coupon->xml()
    );
  }

  public function testXmlWithPlans() {
    $coupon = new Recurly_Coupon();
    $coupon->coupon_code = 'fifteen-off';
    $coupon->name = '$15 Off';
    $coupon->discount_type = 'dollar';
    $coupon->discount_in_cents->addCurrency('USD', 1500);
    $coupon->plan_codes = array('gold', 'monthly');

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents><plan_codes><plan_code>gold</plan_code><plan_code>monthly</plan_code></plan_codes></coupon>\n",
      $coupon->xml()
    );
  }
}
