<?php
require_once('../simpletest/autorun.php');
require_once('test_account.php');
require_once('test_billinginfo.php');
require_once('test_charge.php');
require_once('test_credit.php');
require_once('test_plan.php');
require_once('test_subscription.php');

define('RECURLY_USERNAME', '');
define('RECURLY_PASSWORD', '');
define('RECURLY_SUBSCRIPTION_PLAN_CODE', '');

RecurlyClient::SetAuth(RECURLY_USERNAME, RECURLY_PASSWORD);

// Setting timezone for time() function.
date_default_timezone_set('America/Los_Angeles');

class AllTests extends TestSuite {
    function AllTests() {
        $this->TestSuite('All Recurly Tests');
        $this->addTestCase(new AccountTestCase());
        $this->addTestCase(new BillingInfoTestCase());
        $this->addTestCase(new ChargeTestCase());
        $this->addTestCase(new CreditTestCase());
        $this->addTestCase(new PlanTestCase());
        $this->addTestCase(new SubscriptionTestCase());
    }
}
