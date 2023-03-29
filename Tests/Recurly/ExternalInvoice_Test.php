<?php


class Recurly_ExternalInvoiceTest extends Recurly_TestCase
{
  public function testGetInvoice() {
    $this->client->addResponse('GET', '/external_invoices/sd28t3zdm59r', 'external_invoices/show-200.xml');

    $external_invoice = Recurly_ExternalInvoice::get('sd28t3zdm59r', $this->client);
    $this->assertInstanceOf('Recurly_ExternalInvoice', $external_invoice);
    $this->assertInstanceOf('Recurly_Stub', $external_invoice->account);
    $this->assertEquals($external_invoice->account->getHref(), 'https://api.recurly.com/v2/accounts/1');
    $this->assertInstanceOf('Recurly_Stub', $external_invoice->external_subscription);
    $this->assertEquals($external_invoice->external_subscription->getHref(), 'https://api.recurly.com/v2/external_subscriptions/1');
    $this->assertEquals($external_invoice->external_id, 'external-id');
    $this->assertEquals($external_invoice->state, 'paid');
    $this->assertEquals($external_invoice->currency, 'USD');
    $this->assertEquals($external_invoice->total, 100);
    $external_charge = $external_invoice->line_items[0];
    $this->assertEquals($external_charge->unit_amount, 50);
    $this->assertInstanceOf('DateTime', $external_invoice->purchased_at);
    $this->assertInstanceOf('DateTime', $external_invoice->created_at);
    $this->assertInstanceOf('DateTime', $external_invoice->updated_at);
  }
}
