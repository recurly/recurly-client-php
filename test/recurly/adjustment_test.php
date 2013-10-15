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

  public function testXml() {
    $charge = new Recurly_Adjustment();
    $charge->account_code = '1';
    $charge->description = 'Charge for extra bandwidth';
    $charge->unit_amount_in_cents = 5000; // $50.00
    $charge->currency = 'USD';
    $charge->quantity = 1;
    $charge->accounting_code = 'bandwidth';

    // This deprecated parameter should be ignored:
    $charge->taxable = 0;

    $expected = '<?xml version="1.0"?>' + "\n";
    $expected += '<adjustment><currency>USD</currency><unit_amount_in_cents>5000</unit_amount_in_cents><quantity>1</quantity><description>Charge for extra bandwidth</description><accounting_code>bandwidth</accounting_code></adjustment>';
    $this->assertEqual($charge->xml(), $expected);
  }
}