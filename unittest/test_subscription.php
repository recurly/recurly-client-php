<?php
//require_once('../simpletest/autorun.php');
require_once('../library/recurly.php');


class SubscriptionTestCase extends UnitTestCase {
    
    function setUp() {
    }
    
    function tearDown() {
    }

	function testCreateSubscriptionNewAccount() {
		$new_acct = new RecurlyAccount(strval(time()) . '-create-sub-new', null, 'test@test.com', 'Create New', 'Subscription'. 'Test');
		$subscription = $this->buildSubscription($new_acct);
		$account_info = $subscription->create();
		
		$this->assertIsA($account_info, 'RecurlyAccount');
	}
	
	function testCreateSubscriptionExistingAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-create-sub-existing', null, 'test@test.com', 'Create Existing', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$account_info = $subscription->create();
		
		print_r($account_info);
		$this->assertIsA($account_info, 'RecurlyAccount');
	}
	
	function testUpdateSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-update-sub', null, 'test@test.com', 'Update', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$account_info = $subscription->create();
		
		print_r($account_info);
		$this->assertIsA($account_info, 'RecurlyAccount');
	}
    	
	function testCancelSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-cancel-sub', null, 'test@test.com', 'Cancel', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$account_info = $subscription->create();
		$this->assertIsA($account_info, 'RecurlyAccount');
		
		$response = RecurlySubscription::cancelSubscription($acct->account_code);
		$this->assertTrue($response);
	}
	
	function testRefundSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-refund-sub', null, 'test@test.com', 'Refund', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$account_info = $subscription->create();
		$this->assertIsA($account_info, 'RecurlyAccount');
		
		$response = RecurlySubscription::refundSubscription($acct->account_code, false);
		$this->assertTrue($response);
	}
	
	/* Build a subscription object for the subscription tests */
	function buildSubscription($acct) {
		$subscription = new RecurlySubscription();
		$subscription->plan_code = RECURLY_SUBSCRIPTION_PLAN_CODE;
		$subscription->account = $acct;
		$subscription->billing_info = new RecurlyBillingInfo($subscription->account->account_code);
		$billing_info = $subscription->billing_info;
		$billing_info->first_name = $subscription->account->first_name;
		$billing_info->last_name = $subscription->account->last_name;
		$billing_info->address1 = '123 Test St';
		$billing_info->city = 'San Francisco';
		$billing_info->state = 'CA';
		$billing_info->country = 'US';
		$billing_info->zip = '94105';
		$billing_info->credit_card->number = '4111111111111111';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		return $subscription;
	}
}