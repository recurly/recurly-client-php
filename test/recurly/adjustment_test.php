<?php

class Recurly_AdjustmentTest extends UnitTestCase
{
  public function testDelete() {
    $client = new MockRecurly_Client();
    mockRequest($client, 'adjustments/show-200.xml', array('GET', '/adjustments/abcdef1234567890'));
    mockRequest($client, 'adjustments/destroy-204.xml', array('DELETE', 'https://api.recurly.com/v2/adjustments/abcdef1234567890'));

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $client);
    $this->assertIsA($adjustment, 'Recurly_Adjustment');
    $adjustment->delete();
  }
}