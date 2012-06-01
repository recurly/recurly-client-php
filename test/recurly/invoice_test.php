<?php

class Recurly_InvoiceTest extends UnitTestCase
{

  public function testGetInvoice()
  {
    $responseFixture = loadFixture('./fixtures/invoices/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/invoices/abcdef1234567890'));

    $invoice = Recurly_Invoice::get('abcdef1234567890', $client);

    $this->assertIsA($invoice, 'Recurly_Invoice');
    $this->assertEqual($invoice->state, 'collected');
    $this->assertEqual($invoice->total_in_cents, 2995);
    $this->assertEqual($invoice->getHref(),'https://api.recurly.com/v2/invoices/abcdef1234567890');
    $this->assertIsA($invoice->transactions, 'Recurly_TransactionList');
    $this->assertEqual($invoice->transactions->current()->uuid, '012345678901234567890123456789ab');
    $this->assertEqual($invoice->transactions->count(), 1);
  }

  public function testInvoicePendingCharges()
  {
    $responseFixture = loadFixture('./fixtures/invoices/create-201.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', $client);

    $this->assertIsA($invoice, 'Recurly_Invoice');
    $this->assertIsA($invoice->account, 'Recurly_Stub');
    $this->assertEqual($invoice->uuid, '012345678901234567890123456789ab');
    $this->assertEqual($invoice->currency, 'USD');
    $this->assertEqual($invoice->total_in_cents, 300);
    $this->assertEqual($invoice->getHref(),'https://api.recurly.com/v2/invoices/012345678901234567890123456789ab');
  }
  
  public function testFailedInvoicePendingCharges()
  {  
    $responseFixture = loadFixture('./fixtures/invoices/create-422.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    try
    {
      $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', $client);
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e)
    {
      $this->pass("Received Recurly_ValidationError");
      
      $this->assertEqual($e->errors[0]->symbol,'will_not_invoice');
    }
  }
}
