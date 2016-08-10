<?php


// Do a song and dance to gain access to private/protected properties.
function getProtectedProperty($obj, $property) {
  $reflection = new ReflectionClass($obj);
  $property = $reflection->getProperty($property);
  $property->setAccessible(true);
  return $property->getValue($obj);
}

class Recurly_BaseTest extends Recurly_TestCase {
  public function testParsingEmptyXML() {
    $this->client->addResponse('GET', 'abcdef1234567890', 'accounts/empty.xml');

    $account = Recurly_Base::_get('abcdef1234567890', $this->client);
    $this->assertNull($account);
  }

  public function testPassingClientToPagerItems() {
    $this->client->addResponse('GET', 'subscriptions', 'subscriptions/index-200.xml');

    $subscriptions = Recurly_Base::_get('subscriptions', $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals(getProtectedProperty($subscriptions, '_client'), $this->client);

    $subscription = $subscriptions->current();
    $this->assertInstanceOf('Recurly_Subscription', $subscription);
    $this->assertEquals(getProtectedProperty($subscription, '_client'), $this->client);
  }

  public function testPassingClientToStub() {
    $this->client->addResponse('GET', 'abcdef1234567890', 'adjustments/show-200.xml');

    $adjustment = Recurly_Base::_get('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_Adjustment', $adjustment);

    $invoice = $adjustment->invoice;
    $this->assertInstanceOf('Recurly_Stub', $invoice);
    $this->assertEquals(getProtectedProperty($invoice, '_client'), $this->client);
  }
}
