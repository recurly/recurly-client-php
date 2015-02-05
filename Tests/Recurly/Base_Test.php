<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_BaseTest extends Recurly_TestCase {

  public function testParsingEmptyXML() {
    $this->client->addResponse('GET', 'abcdef1234567890', 'accounts/empty.xml');

    $account = Recurly_Base::_get('abcdef1234567890', $this->client);
    $this->assertNull($account);
  }

  public function testPassingClientToStub() {
    $this->client->addResponse('GET', 'abcdef1234567890', 'adjustments/show-200.xml');

    $adjustment = Recurly_Base::_get('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_Adjustment', $adjustment);
    $this->assertInstanceOf('Recurly_Stub', $adjustment->invoice);

    // The client is protected so we do a little song and dance to access it:
    $reflection = new \ReflectionClass($adjustment->invoice);
    $property = $reflection->getProperty('_client');
    $property->setAccessible(true);
    $this->assertEquals($property->getValue($adjustment->invoice), $this->client);
  }
}
