<?php
require_once('../library/recurly.php');


class TransactionTestCase extends UnitTestCase {
    
  function setUp() {
  }

  function tearDown() {
  }
  
  function testCreateTransaction() {
    $new_acct = new RecurlyAccount(strval(time()) . '-create-transaction', null, 'test@test.com', 'Create New', 'Transaction', 'Test');
    $transaction = $this->buildTransaction($new_acct);
		$transaction_response = $transaction->create();

		$this->assertIsA($transaction_response, 'RecurlyTransaction');
  }
  
  function testGetTransaction() {
		$new_acct = new RecurlyAccount(strval(time()) . '-get-transaction', null, 'test@test.com', 'Get', 'Transaction', 'Test');
    $transaction = $this->buildTransaction($new_acct);
		$transaction_response = $transaction->create();

		$get_transaction = RecurlyTransaction::getTransaction($transaction_response->id);
		$this->assertIsA($get_transaction, 'RecurlyTransaction');
  }

  function testVoidTransaction() {
    $new_acct = new RecurlyAccount(strval(time()) . '-void-transaction', null, 'test@test.com', 'Void', 'Transaction', 'Test');
    $transaction = $this->buildTransaction($new_acct);
		$transaction_response = $transaction->create();

		$void_response = $transaction_response->void();

		$get_transaction = RecurlyTransaction::getTransaction($transaction_response->id);
		$this->assertEqual($get_transaction->status, 'void');
  }
  
	
	/* Build a subscription object for the subscription tests */
	function buildTransaction($acct) {
		$transaction = new RecurlyTransaction();
		$transaction->amount_in_cents = 1024;
		$transaction->description = "Test transaction for 2^10 cents";
		$transaction->account = $acct;
		$transaction->billing_info = new RecurlyBillingInfo($acct->account_code);
		$billing_info = $transaction->billing_info;
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

		return $transaction;
	}
}
