<?php
require_once('../library/recurly.php');


class CreditTestCase extends UnitTestCase {
    
  function setUp() {
  }
  
  function tearDown() {
  }
    	
	function testCreditAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-credit', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();
		$credit = $new_acct->creditAccount(9.99, 'Crediting $9.99 to account from unittest');
		
		$this->assertIsA($credit, "RecurlyAccountCredit");
		$this->assertEqual(9.99, $credit->amount());
		$this->assertEqual(999, abs($credit->amount_in_cents));
	}
	
	function testListCredits() {
		$acct = new RecurlyAccount(strval(time()) . '-credit-list', 'user', 'test@test.com', 'Verena', 'Test');
		$new_acct = $acct->create();
		$credit1 = $new_acct->creditAccount(9.99, 'Crediting $9.99 to account from unittest');
		
		// Returns a single credit
		$credit_list = $new_acct->listCredits();
		$this->assertTrue(is_array($credit_list));
		$this->assertIsA($credit_list[0], "RecurlyAccountCredit");
		
		$credit2 = $new_acct->creditAccount(12.34, 'Crediting $12.34 to account from unittest');
		
		// Returns an array of credits
		$credit_list = $new_acct->listCredits();
		$this->assertEqual(count($credit_list), 2);
	}
}