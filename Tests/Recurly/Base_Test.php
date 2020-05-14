<?php


// Do a song and dance to gain access to private/protected properties.
function getProtectedProperty($obj, $property) {
  $reflection = new ReflectionClass($obj);
  $property = $reflection->getProperty($property);
  $property->setAccessible(true);
  return $property->getValue($obj);
}

function setProtectedProperty($obj, $property, $value) {
  $reflection = new ReflectionClass($obj);
  $property = $reflection->getProperty($property);
  $property->setAccessible(true);
  return $property->setValue($obj, $value);
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

  public function testCheckIfResponseContainGetHeadersFunction() {
    $this->client->addResponse('GET', 'accounts', 'accounts/index-200.xml');
    $accounts = Recurly_Base::_get('accounts', $this->client);
    $this->assertTrue(method_exists($accounts, 'getHeaders'),"Accounts Class does not have method getHeaders");
    $this->assertInternalType('array', $accounts->getHeaders());

    $this->client->addResponse('GET', 'subscriptions', 'subscriptions/index-200.xml');
    $subscriptions = Recurly_Base::_get('subscriptions', $this->client);
    $this->assertTrue(method_exists($subscriptions, 'getHeaders'),'Subscriptions Class does not have method getHeaders');
    $this->assertInternalType('array', $subscriptions->getHeaders());

    $this->client->addResponse('GET', 'abcdef1234567890', 'adjustments/show-200.xml');
    $adjustment = Recurly_Base::_get('abcdef1234567890', $this->client);
    $this->assertTrue(method_exists($adjustment, 'getHeaders'),'Adjustments Class does not have method getHeaders');
    $this->assertInternalType('array', $adjustment->getHeaders());
  }

  public function testPassingEmptyResourceCode() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml');
    try {
      $uri = Recurly_Base::_safeUri(Recurly_Client::PATH_ACCOUNTS, "");
      Recurly_Base::_get($uri, $this->client);
      $this->fail("Expected Recurly_Error");  
    } catch (Recurly_Error $e) {
      $this->assertEquals('Resource code cannot be an empty value', $e->getMessage());
    }

    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab/add_ons/marketing_emails/usage/123456', 'usage/show-200.xml');
    try {
      $uri = Recurly_Base::_safeUri(
        Recurly_Client::PATH_SUBSCRIPTIONS, "", 
        Recurly_Client::PATH_ADDONS, "marketing_emails",
        Recurly_Client::PATH_USAGE, 123456
      );
        $this->fail("Expected Recurly_Error");  
    } catch (Recurly_Error $e) {
      $this->assertEquals('Resource code cannot be an empty value', $e->getMessage());
    }
  }
}
