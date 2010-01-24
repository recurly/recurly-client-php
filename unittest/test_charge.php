<?php
require_once('../library/recurly.php');


class ChargeTestCase extends UnitTestCase {
    
  function setUp() {
  }
  
  function tearDown() {
  }
	
	function testChargeAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-charge', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();
		$charge = $new_acct->chargeAccount(9.99, 'Charging $9.99 to account from unittest');
		
		$this->assertIsA($charge, "RecurlyAccountCharge");
		$this->assertEqual(9.99, $charge->amount());
		$this->assertEqual(999, $charge->amount_in_cents);
	}
	
	function testListCharges() {
		$acct = new RecurlyAccount(strval(time()) . '-charge-list', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();
		$credit1 = $new_acct->chargeAccount(9.99, 'Charging $9.99 to account from unittest');
		
		// Returns a single charge
		$charge_list = $new_acct->listCharges();
		$this->assertTrue(is_array($charge_list));
		$this->assertIsA($charge_list[0], "RecurlyAccountCharge");
		
		$charge2 = $new_acct->chargeAccount(12.34, 'Charging $12.34 to account from unittest');
		
		// Returns an array of charges
		$charge_list = $new_acct->listCharges();
		$this->assertEqual(count($charge_list), 2);
	}
}