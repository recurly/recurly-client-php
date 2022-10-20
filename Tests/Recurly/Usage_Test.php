<?php


class Recurly_UsageTest extends Recurly_TestCase
{
  public function testGetUsage() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab/add_ons/marketing_emails/usage/123456', 'usage/show-200.xml');

    $usage = Recurly_Usage::get('012345678901234567890123456789ab', 'marketing_emails', 123456, $this->client);

    $this->assertInstanceOf('Recurly_Usage', $usage);
    $this->assertInstanceOf('Recurly_Stub', $usage->measured_unit);
    $this->assertEquals(6, $usage->amount);
    $this->assertEquals(6.27934, $usage->amount_decimal);
    $this->assertEquals('Order Number: #198349243975', $usage->merchant_tag);
    $this->assertEquals('percentage', $usage->usage_type);
    $this->assertEquals(1.25, $usage->usage_percentage);
  }

  public function testCreateUsage() {
    $this->client->addResponse('POST', '/subscriptions/012345678901234567890123456789ab/add_ons/marketing_emails/usage', 'usage/create-201.xml');

    $usage = Recurly_Usage::build('012345678901234567890123456789ab', 'marketing_emails', $this->client);

    $usage->create();

    $this->assertInstanceOf('Recurly_Usage', $usage);
    $this->assertInstanceOf('Recurly_Stub', $usage->measured_unit);
  }

  public function testCreateUsageFromSubscription() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');
    $this->client->addResponse('POST', '/subscriptions/012345678901234567890123456789ab/add_ons/marketing_emails/usage', 'usage/create-201.xml');

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);
    $usage = $subscription->buildUsage('marketing_emails', $this->client);

    $usage->create();

    $this->assertInstanceOf('Recurly_Usage', $usage);
    $this->assertInstanceOf('Recurly_Stub', $usage->measured_unit);
  }

}
