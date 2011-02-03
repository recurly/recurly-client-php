<?php
require_once('../library/recurly.php');


class SubscriptionTestCase extends UnitTestCase {
    
    function setUp() {
    }
    
    function tearDown() {
    }

	function testCreateSubscriptionNewAccount() {
		$new_acct = new RecurlyAccount(strval(time()) . '-create-sub-new', null, 'test@test.com', 'Create New', 'Subscription'. 'Test');
		$subscription = $this->buildSubscription($new_acct);
		$sub_response = $subscription->create();
		
		$this->assertIsA($sub_response, 'RecurlySubscription');
	}

	function testGetSubscriptionNewAccount() {
		$new_acct = new RecurlyAccount(strval(time()) . '-create-sub-new', null, 'test@test.com', 'Create New', 'Subscription'. 'Test');
		$subscription = $this->buildSubscription($new_acct);
		$sub_response = $subscription->create();
		
		$get_subscription = RecurlySubscription::getSubscription($new_acct->account_code);
		$this->assertIsA($get_subscription, 'RecurlySubscription');
	}

	function testCreateSubscriptionExistingAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-create-sub-existing', null, 'test@test.com', 'Create Existing', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		
		$this->assertIsA($sub_response, 'RecurlySubscription');
	}
	
	function testUpdateSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-update-sub', null, 'test@test.com', 'Update', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		
		$this->assertIsA($sub_response, 'RecurlySubscription');
	}
    	
	function testCancelSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-cancel-sub', null, 'test@test.com', 'Cancel', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		$this->assertIsA($sub_response, 'RecurlySubscription');
		
		$response = RecurlySubscription::cancelSubscription($acct->account_code);
		$this->assertTrue($response);
	}
	
	function testRefundSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-refund-sub', null, 'test@test.com', 'Refund', 'Subscription', 'Test');
		$acct = $acct->create();
		
		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		$this->assertIsA($sub_response, 'RecurlySubscription');
		
		$response = RecurlySubscription::refundSubscription($acct->account_code, 'partial');
		$this->assertTrue($response);
	}

	function testTerminateSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-terminate-sub', null, 'test@test.com', 'Terminate', 'Subscription', 'Test');
		$new_acct = $acct->create();

		$subscription = $this->buildSubscription($new_acct);
		$sub_response = $subscription->create();
		$this->assertIsA($sub_response, 'RecurlySubscription');

		$response = RecurlySubscription::terminateSubscription($new_acct->account_code);

		$this->assertTrue($response);
	}

	function testUpgradeSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-upgrade-sub', null, 'test@test.com', 'Upgrade', 'Subscription', 'Test');
		$acct = $acct->create();

		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		$this->assertIsA($sub_response, 'RecurlySubscription');

		$response = RecurlySubscription::changeSubscription($acct->account_code, 'now', null, 2); // Change quantity to two
		$this->assertTrue($response);
	}
	
	function testDowngradeSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-downgrade-sub', null, 'test@test.com', 'Downgrade', 'Subscription', 'Test');
		$acct = $acct->create();

		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		$this->assertIsA($sub_response, 'RecurlySubscription');

		$response = RecurlySubscription::changeSubscription($acct->account_code, 'renewal', null, null, 5.25);
		$this->assertTrue($response);
	}
	
	function testPendingSubscription() {
		$acct = new RecurlyAccount(strval(time()) . '-pending-sub', null, 'test@test.com', 'Pending', 'Subscription', 'Test');
		$acct = $acct->create();

		$subscription = $this->buildSubscription($acct);
		$sub_response = $subscription->create();
		
		$response = RecurlySubscription::changeSubscription($acct->account_code, 'renewal', null, null, 5.25);
	  
		// Test pending subscription
		$get_subscription = RecurlySubscription::getSubscription($acct->account_code);
		$this->assertNotNull($get_subscription->pending_subscription);
		$this->assertIsA($get_subscription->pending_subscription, 'RecurlyPendingSubscription');
	}
	
	function testCustomTrialSubscription(){
	  $acct = new RecurlyAccount(strval(time()) . '-custom-trial-sub', null, 'test@test.com', 'Pending', 'Subscription', 'Test');
		$acct = $acct->create();

		$subscription = $this->buildSubscription($acct);
		$subscription->trial_period_ends_at = date('Y') . "-" . (intval(date('m')) + 2) . "-" . "01";
		$sub_response = $subscription->create();
		
		
		// Test pending subscription
		$get_subscription = RecurlySubscription::getSubscription($acct->account_code);
		$this->assertIsA($get_subscription, 'RecurlySubscription');
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
		$billing_info->credit_card->number = '4111-1111-1111-1111';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		return $subscription;
	}
}