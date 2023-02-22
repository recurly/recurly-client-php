<?php


class Recurly_ExternalSubscriptionTest extends Recurly_TestCase
{
  public function testGetSubscription() {
    $this->client->addResponse('GET', '/external_subscriptions/rjx71rx8gs2m', 'external_subscriptions/show-200.xml');

    $external_subscription = Recurly_ExternalSubscription::get('rjx71rx8gs2m', $this->client);
    $this->assertInstanceOf('Recurly_ExternalSubscription', $external_subscription);
    $this->assertInstanceOf('Recurly_Stub', $external_subscription->account);
    $this->assertEquals($external_subscription->account->getHref(), 'https://api.recurly.com/v2/accounts/1');
    $this->assertInstanceOf('DateTime', $external_subscription->created_at);
    $this->assertInstanceOf('DateTime', $external_subscription->updated_at);
    $this->assertEquals($external_subscription->quantity, 18);
    $this->assertEquals($external_subscription->external_id, '1_ext_id');
    $external_product_reference = $external_subscription->external_product_reference;
    $this->assertEquals($external_product_reference->id, 'rauqpcdmxc4a');
    $this->assertEquals($external_product_reference->reference_code, '1234');
    $this->assertEquals($external_product_reference->external_connection_type, 'apple_app_store');
    $this->assertEquals($external_subscription->state, 'active');
    $this->assertInstanceOf('DateTime', $external_product_reference->created_at);
    $this->assertInstanceOf('DateTime', $external_product_reference->updated_at);
  }
}
