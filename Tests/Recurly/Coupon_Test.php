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
    $this->assertEquals('Invoice description', $coupon->invoice_description);
    $this->assertTrue($coupon->applies_to_all_plans);
    $this->assertTrue($coupon->applies_to_non_plan_charges);
    $this->assertEquals($coupon->redemption_resource, 'account');
    $this->assertEquals(array(), $coupon->plan_codes);
    $this->assertEquals(1000, $coupon->max_redemptions_per_account);
  }

  public function testRedeemCoupon() {
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/coupons/special/redeem', 'coupons/redeem-201.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);
    $this->assertEquals('redeemable', $coupon->state);

    $redemption = $coupon->redeemCoupon('abcdef1234567890', 'USD', '012345678901234567890123456789ab');
    $this->assertInstanceOf('Recurly_CouponRedemption', $redemption);
  }

  public function testGetCouponRedemptions() {
    $this->client->addResponse('GET', 'https://api.recurly.com/v2/coupons/special/redemptions', 'coupons/show-redemptions-200.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);
    $redemptions = $coupon->redemptions->get();

    $this->assertInstanceOf('Recurly_CouponRedemptionList', $redemptions);
    $this->assertEquals(2, $redemptions->count());
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

  public function testUpdateCoupon() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/coupons/special', 'coupons/update-201.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);

    $this->assertEquals($coupon->name, 'Special 50% Discount');
    $coupon->name = 'My New Name';
    $coupon->update();
    $this->assertEquals($coupon->name, 'My New Name', 'It loads values from the returned XML');
  }

  public function testRestoreCoupon() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/coupons/special/restore', 'coupons/update-201.xml');

    $coupon = Recurly_Coupon::get('special', $this->client);

    $this->assertEquals($coupon->name, 'Special 50% Discount');
    $coupon->name = 'My New Name';
    $coupon->restore();
    $this->assertEquals($coupon->name, 'My New Name', 'It loads values from the returned XML');
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
    $coupon->invoice_description = 'Invoice description';

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents><invoice_description>Invoice description</invoice_description></coupon>\n",
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
    $coupon->invoice_description = 'Invoice description';

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<coupon><coupon_code>fifteen-off</coupon_code><name>$15 Off</name><discount_type>dollar</discount_type><discount_in_cents><USD>1500</USD></discount_in_cents><plan_codes><plan_code>gold</plan_code><plan_code>monthly</plan_code></plan_codes><invoice_description>Invoice description</invoice_description></coupon>\n",
      $coupon->xml()
    );
  }

  public function testCreateUpdateXML() {
    $coupon = new Recurly_Coupon();

    // should ignore these values
    $coupon->coupon_code = 'fifteen-off';
    $coupon->discount_type = 'dollar';
    $coupon->discount_in_cents->addCurrency('USD', 1500);
    $coupon->plan_codes = array('gold', 'monthly');

    // should serialize these values
    $coupon->name = '$15 Off';
    $coupon->invoice_description = 'Invoice description';
    $coupon->redeem_by_date = '2017-12-01';
    $coupon->max_redemptions = 100;
    $coupon->max_redemptions_per_account = 3;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<coupon><name>$15 Off</name><max_redemptions>100</max_redemptions><max_redemptions_per_account>3</max_redemptions_per_account><hosted_description></hosted_description><invoice_description>Invoice description</invoice_description><redeem_by_date>2017-12-01</redeem_by_date></coupon>\n",
      $coupon->createUpdateXML()
    );
  }

  public function testGenerate() {
    $this->client->addResponse('POST', '/coupons/fifteen-off/generate', 'unique_coupons/generate-201.xml');
    $this->client->addResponse('GET', 'https://api.recurly.com/v2/coupons/fifteen-off/unique_coupon_codes?cursor=1234566890&per_page=20', 'unique_coupons/index-200.xml');

    $coupon = new Recurly_Coupon(null, $this->client);
    $coupon->coupon_code = 'fifteen-off';

    $coupons = $coupon->generate(10);
    $this->assertEquals(count($coupons), 10);
  }
}
