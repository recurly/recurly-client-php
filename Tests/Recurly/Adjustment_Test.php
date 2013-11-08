<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_AdjustmentTest extends Recurly_TestCase
{
  public function testDelete() {
    $this->client->addResponse('GET', '/adjustments/abcdef1234567890', 'adjustments/show-200.xml');
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/adjustments/abcdef1234567890', 'adjustments/destroy-204.xml');

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_Adjustment', $adjustment);
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

    $expected = "<?xml version=\"1.0\"?>\n<adjustment><currency>USD</currency><unit_amount_in_cents>5000</unit_amount_in_cents><quantity>1</quantity><description>Charge for extra bandwidth</description><accounting_code>bandwidth</accounting_code></adjustment>\n";
    $this->assertEquals($expected, $charge->xml());
  }
}