<?php
require_once('../simpletest/autorun.php');
require_once('test_account.php');
require_once('test_billinginfo.php');
require_once('test_charge.php');
require_once('test_coupon.php');
require_once('test_credit.php');
require_once('test_invoice.php');
require_once('test_plan.php');
require_once('test_pushnotification.php');
require_once('test_subscription.php');
require_once('test_transaction.php');
require_once('test_transparent.php');
require_once('test_verification.php');

define('RECURLY_API_USERNAME', '');
define('RECURLY_API_PASSWORD', '');
define('RECURLY_SUBDOMAIN', '');
define('RECURLY_ENVIRONMENT', 'sandbox');
define('RECURLY_PRIVATE_KEY', '');
define('RECURLY_SUBSCRIPTION_PLAN_CODE', 'gold');
define('RECURLY_COUPON_CODE', 'coupon');

error_reporting(E_ALL);
ini_set('display_errors','On');

RecurlyClient::SetAuth(RECURLY_API_USERNAME, RECURLY_API_PASSWORD, RECURLY_SUBDOMAIN, RECURLY_ENVIRONMENT, RECURLY_PRIVATE_KEY);

// Setting timezone for time() function.
date_default_timezone_set('America/Los_Angeles');

class AllTests extends TestSuite {
  
  function AllTests() {
    $this->TestSuite('All Recurly Tests');
    $this->addTestCase(new AccountTestCase());
    $this->addTestCase(new BillingInfoTestCase());
    $this->addTestCase(new ChargeTestCase());
    $this->addTestCase(new CouponTestCase());
    $this->addTestCase(new CreditTestCase());
    $this->addTestCase(new InvoiceTestCase());
    $this->addTestCase(new PlanTestCase());
    $this->addTestCase(new PushNotificationTestCase());
    $this->addTestCase(new SubscriptionTestCase());
    $this->addTestCase(new TransactionTestCase());
    $this->addTestCase(new TransparentTestCase());
    $this->addTestCase(new VerificationTestCase());
  }
}
