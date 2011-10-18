<?php
require_once('../simpletest/autorun.php');
require_once('../lib/recurly.php');
require_once('./test_helpers.php');


error_reporting(E_ALL);
ini_set('display_errors','On');

// Setting timezone for time() function.
date_default_timezone_set('America/Los_Angeles');


Mock::generate('Recurly_Client');

class AllTests extends TestSuite {
  
  function __construct()
  {
    parent::__construct();

    $this->addFile('./recurly/client_test.php');
    $this->addFile('./recurly/recurlyjs_test.php');
    
    $this->addFile('./recurly/account_test.php');
    $this->addFile('./recurly/account_list_test.php');
    $this->addFile('./recurly/coupon_test.php');
    $this->addFile('./recurly/invoice_test.php');
    $this->addFile('./recurly/plan_test.php');
    $this->addFile('./recurly/subscription_test.php');
    $this->addFile('./recurly/transaction_test.php');
  }
}
