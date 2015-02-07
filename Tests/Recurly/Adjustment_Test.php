<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_AdjustmentTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/adjustments/abcdef1234567890', 'adjustments/show-200.xml')
    );
  }

  public function testGetAdjustment() {
    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_Adjustment', $adjustment);
    $this->assertInstanceOf('Recurly_Stub', $adjustment->account);
    $this->assertInstanceOf('Recurly_Stub', $adjustment->invoice);
    $this->assertInstanceOf('Recurly_Stub', $adjustment->subscription);
    $this->assertEquals('abcdef1234567890', $adjustment->uuid);
    $this->assertEquals('invoiced', $adjustment->state);
    $this->assertEquals('$12 Annual Subscription', $adjustment->description);
    $this->assertEquals('', $adjustment->accounting_code);
    $this->assertEquals('', $adjustment->product_code);
    $this->assertEquals('plan', $adjustment->origin);
    $this->assertEquals(1200, $adjustment->unit_amount_in_cents);
    $this->assertEquals(1, $adjustment->quantity);
    $this->assertEquals(0, $adjustment->discount_in_cents);
    $this->assertEquals(5000, $adjustment->tax_in_cents);
    $this->assertEquals(1200, $adjustment->total_in_cents);
    $this->assertEquals('USD', $adjustment->currency);
    $this->assertEquals(false, $adjustment->taxable);
    $this->assertEquals('2011-04-30T07:00:00+00:00', $adjustment->start_date->format('c'));
    $this->assertEquals('2011-04-30T07:00:00+00:00', $adjustment->end_date->format('c'));
    $this->assertEquals('2011-08-31T03:30:00+00:00', $adjustment->created_at->format('c'));
    $this->assertEquals($adjustment->tax_exempt, false);

    $taxDetails = $adjustment->tax_details;
    $this->assertEquals(2, count($taxDetails));
    $this->assertInstanceOf('Recurly_Tax_Detail', $taxDetails[0]);
    $this->assertInstanceOf('Recurly_Tax_Detail', $taxDetails[1]);
    $state = $taxDetails[0];
    $county = $taxDetails[1];
    $this->assertEquals('california', $state->name);
    $this->assertEquals('state', $state->type);
    $this->assertEquals(0.065, $state->tax_rate);
    $this->assertEquals(3000, $state->tax_in_cents);

    $this->assertEquals('san francisco', $county->name);
    $this->assertEquals('county', $county->type);
    $this->assertEquals(0.02, $county->tax_rate);
    $this->assertEquals(2000, $county->tax_in_cents);
  }

  public function testDelete() {
    $this->client->addResponse('GET', '/adjustments/abcdef1234567890', 'adjustments/show-200.xml');
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/adjustments/abcdef1234567890', 'adjustments/destroy-204.xml');

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $this->client);
    $adjustment->delete();
  }

  public function testToRefundAttributes() {
    $this->client->addResponse('GET', '/adjustments/abcdef1234567890', 'adjustments/show-200.xml');

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $this->client);

    $attributes = $adjustment->toRefundAttributes();
    $this->assertEquals($attributes['uuid'], $adjustment->uuid);
    $this->assertEquals($attributes['prorate'], false);
    $this->assertEquals($attributes['quantity'], $adjustment->quantity);
  }

  public function testAdjustmentRefund() {
    $this->client->addResponse('GET', '/adjustments/abcdef1234567890', 'adjustments/show-200.xml');
    $this->client->addResponse('GET', 'https://api.recurly.com/v2/invoices/1234', 'invoices/show-200.xml');
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/invoices/1001/refund', 'invoices/refund-201.xml');

    $adjustment = Recurly_Adjustment::get('abcdef1234567890', $this->client);

    $refund_invoice = $adjustment->refund();
    $this->assertEquals($refund_invoice->subtotal_in_cents, -1000);
  }

  public function testXml() {
    $charge = new Recurly_Adjustment();
    $charge->account_code = '1';
    $charge->description = 'Charge for extra bandwidth';
    $charge->unit_amount_in_cents = 5000; // $50.00
    $charge->currency = 'USD';
    $charge->quantity = 1;
    $charge->accounting_code = 'bandwidth';
    $charge->tax_exempt = false;
    $charge->tax_code = 'fake-tax-code';

    // This deprecated parameter should be ignored:
    $charge->taxable = 0;

    $expected = "<?xml version=\"1.0\"?>\n<adjustment><currency>USD</currency><unit_amount_in_cents>5000</unit_amount_in_cents><quantity>1</quantity><description>Charge for extra bandwidth</description><accounting_code>bandwidth</accounting_code><tax_exempt>false</tax_exempt><tax_code>fake-tax-code</tax_code></adjustment>\n";
    $this->assertEquals($expected, $charge->xml());
  }
}
