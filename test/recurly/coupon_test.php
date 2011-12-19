<?php

class Recurly_CouponTest extends UnitTestCase
{
  public function testGetCoupon()
  {
    $responseFixture = loadFixture('./fixtures/coupons/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/coupons/special'));

    $coupon = Recurly_Coupon::get('special', $client);

    $this->assertIsA($coupon, 'Recurly_Coupon');
    $this->assertEqual($coupon->coupon_code, 'special');
    $this->assertEqual($coupon->created_at->getTimestamp(), 1304150400);
    $this->assertEqual($coupon->getHref(),'https://api.recurly.com/v2/coupons/special');
    $this->assertIsA($coupon->discount_in_cents, 'Recurly_CurrencyList');
    $this->assertEqual($coupon->discount_in_cents['USD']->amount_in_cents, 1000);
  }

  // Parse plan_codes array in response
  public function testPlanCodesXml()
  {
    $responseFixture = loadFixture('./fixtures/coupons/show-200-2.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/coupons/special'));

    $coupon = Recurly_Coupon::get('special', $client);

    $this->assertIsA($coupon, 'Recurly_Coupon');
    $this->assertIsA($coupon->plan_codes, 'array');
    $this->assertEqual($coupon->plan_codes[0], 'plan_one');
    $this->assertEqual($coupon->plan_codes[1], 'plan_two');
  }

  public function testXml()
  {
    $coupon = new Recurly_Coupon();
    $coupon->coupon_code = 'fifteen-off';
    $coupon->name = '$15 Off';
    $coupon->discount_type = 'dollar';
    $coupon->discount_in_cents->addCurrency('USD', 1500);

    $xml = $coupon->xml();
    $this->assertEqual($xml,
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents></coupon>\n");
  }

  public function testXmlWithPlans()
  {
    $coupon = new Recurly_Coupon();
    $coupon->coupon_code = 'fifteen-off';
    $coupon->name = '$15 Off';
    $coupon->discount_type = 'dollar';
    $coupon->discount_in_cents->addCurrency('USD', 1500);
    $coupon->plan_codes = array('gold', 'monthly');

    $xml = $coupon->xml();
    $this->assertEqual($xml,
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents><plan_codes><plan_code>gold</plan_code><plan_code>monthly</plan_code></plan_codes></coupon>\n");
  }
}
