<?php
require_once('../library/recurly.php');


class InvoiceTestCase extends UnitTestCase {
    
  function setUp() {
		$acct = new RecurlyAccount(strval(microtime(true)) . '-invoice', 'user', 'test@test.com', 'Verena', 'Test');
		$this->acct = $acct->create();
		$this->subscription = $this->buildSubscription($this->acct);
		$this->subscription->create();
  }
    
  function tearDown() {
  }
  
  function testListInvoices() {
    $invoice_list = $this->acct->listInvoices();
    
		$this->assertTrue(is_array($invoice_list));
		$this->assertIsA($invoice_list[0], "RecurlyInvoice");
  }
  
  function testGetInvoice() {
    $invoices = $this->acct->listInvoices();
    
    $invoice = RecurlyInvoice::getInvoice($invoices[0]->id);
    
    $this->assertNotNull($invoice);
		$this->assertIsA($invoice, "RecurlyInvoice");
  }
  
  function testCreateInvoice() {
    $invoice = RecurlyInvoice::createInvoice($this->acct->account_code);
    $this->assertNull($invoice);
    
		$charge = $this->acct->chargeAccount(9.99, 'Charging $9.99 to account from unittest');
		$invoice = RecurlyInvoice::createInvoice($this->acct->account_code);
    
    $this->assertNotNull($invoice);
		$this->assertIsA($invoice, "RecurlyInvoice");
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
		$billing_info->credit_card->number = '1';
		$billing_info->credit_card->year = intval(date('Y')) + 1;
		$billing_info->credit_card->month = date('n');
		$billing_info->credit_card->verification_value = '123';
		
		return $subscription;
	}
}