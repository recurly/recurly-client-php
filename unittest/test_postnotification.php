<?php
require_once('../library/recurly.php');


class PushNotificationTestCase extends UnitTestCase {
    
  function setUp() {
  }
    
  function tearDown() {
  }
  
  function testAccountNotification() {
    $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<new_account_notification>
  <account>
    <account_code>test_account</account_code>
    <username>user</username>
    <email>test@test.com</email>
    <first_name>Verena</first_name>
    <last_name>Test</last_name>
    <company_name></company_name>
  </account>
</new_account_notification>
XML;

    $notification = new RecurlyPushNotification($xml);
    
    print "<!--\n";
    print_r($notification);
    print "\n-->\n";
    
    $this->assertEqual($notification->type, 'new_account_notification');
    $this->assertEqual($notification->account->account_code, 'test_account');
    $this->assertEqual($notification->account->first_name, 'Verena');
  }
  
  function testSubscriptionNotification() {
    $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<new_subscription_notification>
  <account>
    <account_code>123</account_code>
    <username>user</username>
    <email>test@test.com</email>
    <first_name>Verena</first_name>
    <last_name>Test</last_name>
    <company_name></company_name>
  </account>
  <subscription>
    <plan><plan_code>daily</plan_code>
      <name>daily</name>
      <version type="integer">2</version>
    </plan>
    <state>pending</state>
    <quantity type="integer">1</quantity>
    <total_amount_in_cents type="integer">245</total_amount_in_cents>
    <activated_at type="datetime">2010-01-23T21:37:31-08:00</activated_at>
    <canceled_at type="datetime"></canceled_at>
    <expires_at type="datetime"></expires_at>
    <current_period_started_at type="datetime">2010-01-23T21:37:31-08:00</current_period_started_at>
    <current_period_ends_at type="datetime">2010-01-24T21:37:31-08:00</current_period_ends_at>
    <trial_started_at type="datetime"></trial_started_at>
    <trial_ends_at type="datetime"></trial_ends_at>
  </subscription>
</new_subscription_notification>
XML;

    $notification = new RecurlyPushNotification($xml);
    
    print "<!--\n";
    print_r($notification);
    print "\n-->\n";
    
    $this->assertEqual($notification->type, 'new_subscription_notification');
    $this->assertEqual($notification->account->account_code, '123');
    $this->assertEqual($notification->subscription->state, 'pending');
  }

}