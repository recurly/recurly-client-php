<?php


class Recurly_ExternalInvoiceListTest extends Recurly_TestCase
{

  public function testGetAll() {
    $url = '/external_invoices';
    $this->client->addResponse('GET', $url, 'external_invoices/index-200.xml');

    $external_invoices = Recurly_ExternalInvoiceList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_ExternalInvoiceList', $external_invoices);
    $this->assertEquals($url, $external_invoices->getHref());

    $external_invoice = $external_invoices->current();
    $this->assertInstanceOf('Recurly_ExternalInvoice', $external_invoice);
    $this->assertInstanceOf('Recurly_Stub', $external_invoice->account);
    $this->assertInstanceOf('Recurly_Stub', $external_invoice->external_subscription);
    $this->assertInstanceOf('Recurly_Stub', $external_invoice->external_payment_phase);
    $this->assertEquals($external_invoice->external_id, 'external-id');
    $this->assertEquals($external_invoice->state, 'paid');
    $this->assertEquals($external_invoice->currency, 'USD');
    $this->assertEquals($external_invoice->total, '100');
    $external_charge = $external_invoice->line_items[0];
    $this->assertEquals($external_charge->unit_amount, '50');
    $this->assertInstanceOf('DateTime', $external_invoice->purchased_at);
    $this->assertInstanceOf('DateTime', $external_invoice->created_at);
    $this->assertInstanceOf('DateTime', $external_invoice->updated_at);
  }
}
