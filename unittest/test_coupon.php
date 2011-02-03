<?php
require_once('../library/recurly.php');


class CouponTestCase extends UnitTestCase {
    
  function setUp() {
  }
  
  function tearDown() {
  }
	
	function testApplyCoupon() {
		$acct = new RecurlyAccount(strval(time()) . '-redeem-coupon', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();

		$coupon = $new_acct->redeemCoupon(RECURLY_COUPON_CODE);

		$this->assertIsA($coupon, "RecurlyCoupon");
		$this->assertEqual(RECURLY_COUPON_CODE, $coupon->coupon_code);
	}

	function testLookupCoupon() {
	  $acct = new RecurlyAccount(strval(time()) . '-lookup-coupon', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();
		$coupon = $new_acct->redeemCoupon(RECURLY_COUPON_CODE);

		$lookup_coupon = $new_acct->getCoupon();

		$this->assertIsA($lookup_coupon, "RecurlyCoupon");
		$this->assertEqual(RECURLY_COUPON_CODE, $lookup_coupon->coupon_code);
		$this->assertEqual($acct->account_code, $lookup_coupon->redemption->account_code);
	}

	function testClearCoupon() {
	  $acct = new RecurlyAccount(strval(time()) . '-clear-coupon', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();

		$coupon = $new_acct->redeemCoupon(RECURLY_COUPON_CODE);

		$response = $coupon->redemption->clear();
		$this->assertTrue($response);

		$lookup_coupon = RecurlyCouponRedemption::getCoupon($new_acct->account_code);
		$this->assertNull($lookup_coupon);
	}
}
