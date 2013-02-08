<?php

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../vendor/lastcraft/simpletest/autorun.php');
require_once(__DIR__ . '/test_helpers.php');


error_reporting(E_ALL);
ini_set('display_errors','On');

// Setting timezone for time() function.
date_default_timezone_set('America/Los_Angeles');


Mock::generate('Recurly_Client');

class AllTests extends TestSuite {

  function __construct()
  {
    parent::__construct();

    $this->addFile(__DIR__ . '/recurly/client_test.php');
    $this->addFile(__DIR__ . '/recurly/recurlyjs_test.php');

    $this->addFile(__DIR__ . '/recurly/adjustment_test.php');
    $this->addFile(__DIR__ . '/recurly/account_test.php');
    $this->addFile(__DIR__ . '/recurly/account_list_test.php');
    $this->addFile(__DIR__ . '/recurly/billing_info_test.php');
    $this->addFile(__DIR__ . '/recurly/coupon_test.php');
    $this->addFile(__DIR__ . '/recurly/currency_list_test.php');
    $this->addFile(__DIR__ . '/recurly/invoice_test.php');
    $this->addFile(__DIR__ . '/recurly/plan_test.php');
    $this->addFile(__DIR__ . '/recurly/subscription_test.php');
    $this->addFile(__DIR__ . '/recurly/transaction_test.php');
  }
}
