<?php
require_once('../library/recurly.php');


class AccountTestCase extends UnitTestCase {
    
  function setUp() {
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en-US,en;q=0.8';
  }
  
  function tearDown() {
  }
    
  function testCreateAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-create', 'user', 'test@test.com', 'Verena', 'Test', 'Test Company');
		$new_acct = $acct->create();
		
		$this->assertIsA($new_acct, "RecurlyAccount");
		$this->assertNotNull($new_acct->created_at);
		$this->assertEqual($acct->account_code, $new_acct->account_code);
  }

	function testGetAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-get', 'user', 'test@test.com', 'Verena', 'Test', 'Test Company');
		$new_acct = $acct->create();
		
		$get_acct = RecurlyAccount::getAccount($acct->account_code);
		$this->assertIsA($get_acct, "RecurlyAccount");
		$this->assertNotNull($get_acct->created_at);
		$this->assertEqual($acct->account_code, $get_acct->account_code);
		$this->assertEqual($acct->email, $get_acct->email);
		$this->assertEqual($acct->first_name, $get_acct->first_name);
		$this->assertEqual($acct->last_name, $get_acct->last_name);
	}

	function testUpdateAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-update', 'user', 'test@test.com', 'Verena', 'Test', 'Test Company');
		$new_acct = $acct->create();
		
		$new_acct->last_name = 'Updated';
		$new_acct->username = 'username';
		$updated_acct = $new_acct->update();
		
		$this->assertIsA($updated_acct, "RecurlyAccount");
		$this->assertNotEqual($updated_acct->last_name, $acct->last_name);
		$this->assertEqual($updated_acct->last_name, 'Updated');
	}
	
	function testCloseAccount() {
		$acct = new RecurlyAccount(strval(time()) . '-close', 'user', 'test@test.com', 'Verena', 'Test', 'Test Company');
		$new_acct = $acct->create();
		
		$this->assertTrue(RecurlyAccount::closeAccount($new_acct->account_code));
	}
}