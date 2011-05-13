<?php
require_once('../library/recurly.php');


class BillingInfoTestCase extends UnitTestCase {
    
  function setUp() {
		$acct = new RecurlyAccount(strval(microtime(true)) . '-billing', 'user', 'test@test.com', 'Verena', 'Test');
		$this->acct = $acct->create();
  }
    
  function tearDown() {
  }

	function testUpdateBillingInfo() {
		$acct = $this->acct;
		$billing_info = new RecurlyBillingInfo($acct->account_code);
		$billing_info->first_name = $acct->first_name;
		$billing_info->last_name = $acct->last_name;
		$billing_info->address1 = '123 Test St';
		$billing_info->city = 'San Francisco';
		$billing_info->state = 'CA';
		$billing_info->country = 'US';
		$billing_info->zip = '94105';
		$billing_info->credit_card->number = '4111-1111-1111-1111';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		$updated_billing = $billing_info->update();
		
		$this->assertIsA($updated_billing, 'RecurlyBillingInfo');
	}
	
	function testGetBillingInfo() {
		$acct = $this->acct;
		$billing_info = new RecurlyBillingInfo($acct->account_code);
		$billing_info->first_name = $acct->first_name;
		$billing_info->last_name = $acct->last_name;
		$billing_info->address1 = '123 Test St';
		$billing_info->city = 'San Francisco';
		$billing_info->state = 'CA';
		$billing_info->country = 'US';
		$billing_info->zip = '94105';
		$billing_info->credit_card->number = '4111-1111-1111-1111';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		$updated_billing = $billing_info->update();
		
		$get_billing = RecurlyBillingInfo::getBillingInfo($acct->account_code);
		
		$this->assertIsA($get_billing, 'RecurlyBillingInfo');
	}
	
	function testClearBillingInfo() {
		$acct = $this->acct;
		$billing_info = new RecurlyBillingInfo($acct->account_code);
		$billing_info->first_name = $acct->first_name;
		$billing_info->last_name = $acct->last_name;
		$billing_info->address1 = '123 Test St';
		$billing_info->city = 'San Francisco';
		$billing_info->state = 'CA';
		$billing_info->country = 'US';
		$billing_info->zip = '94105';
		$billing_info->credit_card->number = '4111-1111-1111-1111';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		$updated_billing = $billing_info->update();
		
		$updated_billing->clear();
		
		// Should now be empty, but still a valid object
		$get_billing = RecurlyBillingInfo::getBillingInfo($acct->account_code);
		
		$this->assertNull($get_billing);
	}
	
	function testCreditCardValidity() {
	  $acct = $this->acct;
		$billing_info = new RecurlyBillingInfo($acct->account_code);
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		$billing_info->credit_card->number = '4111-1111-1111-1111';
		$this->assertTrue($billing_info->credit_card->isValid());
		
		$billing_info->credit_card->number = '4111111111111111';
		$this->assertTrue($billing_info->credit_card->isValid());
		
		$billing_info->credit_card->number = '4000000000000002';
		$this->assertTrue($billing_info->credit_card->isValid());
		
		$billing_info->credit_card->number = '4000000000000001';
		$this->assertFalse($billing_info->credit_card->isValid());
		
		$billing_info->credit_card->number = '4111111111';
		$this->assertFalse($billing_info->credit_card->isValid());
	}
}