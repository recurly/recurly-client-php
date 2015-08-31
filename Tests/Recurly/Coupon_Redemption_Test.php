<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_CouponRedemptionTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890/redemption', 'accounts/redemption/show-200.xml')
    );
  }

  public function testGetRedemption() {
    $redemption = Recurly_CouponRedemption::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_CouponRedemption', $redemption);
    $this->assertInstanceOf('Recurly_Stub', $redemption->coupon);
    $this->assertInstanceOf('Recurly_Stub', $redemption->account);
    $this->assertEquals('https://api.recurly.com/v2/coupons/special', $redemption->coupon->getHref());
    $this->assertEquals('https://api.recurly.com/v2/accounts/abcdef1234567890', $redemption->account->getHref());
    $this->assertEquals('https://api.recurly.com/v2/subscriptions/012345678901234567890123456789ab', $redemption->subscription->getHref());
    $this->assertFalse($redemption->single_use);
    $this->assertEquals(0, $redemption->total_discounted_in_cents);
    $this->assertEquals('USD', $redemption->currency);
    $this->assertEquals('active', $redemption->state);
    $this->assertEquals(1435591848, $redemption->created_at->getTimestamp());
  }
}
