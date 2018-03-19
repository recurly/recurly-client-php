<?php

class Recurly_InvoiceCollectionTest extends Recurly_TestCase
{
  public function testInvoiceCollectionDeserialization() {
    $this->client->addResponse('GET', '/invoices/1001', 'invoices/show-200.xml');
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/mark_failed', 'invoices/mark_failed-200.xml');
    $invoice = Recurly_Invoice::get('1001', $this->client);

    $collection = $invoice->markFailed();
    $this->assertInstanceOf('Recurly_Invoice', $collection->charge_invoice);
    $this->assertInstanceOf('Recurly_Invoice', $collection->credit_invoices[0]);
  }
}
