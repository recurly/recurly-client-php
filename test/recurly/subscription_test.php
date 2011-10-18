<?php

class Recurly_SubscriptionTest extends UnitTestCase
{
  public function testGetSubscription()
  {
    $responseFixture = loadFixture('./fixtures/subscriptions/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/subscriptions/012345678901234567890123456789ab'));

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $client);

    $this->assertIsA($subscription, 'Recurly_Subscription');
    $this->assertIsA($subscription->account, 'Recurly_Stub');
    $this->assertEqual($subscription->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');
  }
}
