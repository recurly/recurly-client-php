<?php

class Recurly_AdjustmentTest extends UnitTestCase
{
  public function testDelete() {
    $getFixture = loadFixture(__DIR__ . '/../fixtures/adjustments/show-200.xml');
    $deleteFixture = loadFixture(__DIR__ . '/../fixtures/adjustments/destroy-204.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $getFixture, array('GET', '/adjustments/abcdef1234567890'));
    $client->returns('request', $deleteFixture, array('DELETE', 'https://api.recurly.com/v2/adjustments/abcdef1234567890'));

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $client);
    $this->assertIsA($adjustment, 'Recurly_Adjustment');
    $adjustment->delete();
  }
}