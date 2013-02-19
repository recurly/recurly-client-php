<?php

class Recurly_InvoiceTest extends UnitTestCase
{
  function setUp() {
    $this->client = new MockRecurly_Client();
    mockRequest($this->client, 'invoices/show-200.xml', array('GET', '/invoices/abcdef1234567890'));
  }

  public function testGetInvoice()
  {
    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);

    $this->assertIsA($invoice, 'Recurly_Invoice');
    $this->assertEqual($invoice->state, 'open');
    $this->assertEqual($invoice->total_in_cents, 2995);
    $this->assertEqual($invoice->getHref(),'https://api.recurly.com/v2/invoices/abcdef1234567890');
    $this->assertIsA($invoice->transactions, 'Recurly_TransactionList');
    $this->assertEqual($invoice->transactions->current()->uuid, '012345678901234567890123456789ab');
    $this->assertEqual($invoice->transactions->count(), 1);
  }

  public function testInvoicePendingCharges()
  {
    mockRequest($this->client, 'invoices/create-201.xml', array('POST', '/accounts/abcdef1234567890/invoices', '*'));

    $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', $this->client);

    $this->assertIsA($invoice, 'Recurly_Invoice');
    $this->assertIsA($invoice->account, 'Recurly_Stub');
    $this->assertEqual($invoice->uuid, '012345678901234567890123456789ab');
    $this->assertEqual($invoice->currency, 'USD');
    $this->assertEqual($invoice->total_in_cents, 300);
    $this->assertEqual($invoice->getHref(),'https://api.recurly.com/v2/invoices/012345678901234567890123456789ab');
  }

  public function testFailedInvoicePendingCharges()
  {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/invoices/create-422.xml');

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

  public function testMarkSuccessful()
  {
    // Two things to note:
    // - the invoice will use the full URL from the XML response
    // - Recurly_Resource::_save() passes the current XML into the PUT which
    //   doesn't seem quite right but I don't want to change it without
    //   understanding what side effects it would have.
    mockRequest($this->client, 'invoices/mark_successful-200.xml', array('PUT', 'https://api.recurly.com/v2/invoices/abcdef1234567890/mark_successful', '*'));

    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);
    $invoice->markSuccessful();
    $this->assertEqual($invoice->state, 'collected');
  }

  public function testMarkFailed()
  {
    // See the notes in testMarkSuccessful().
    mockRequest($this->client, 'invoices/mark_failed-200.xml', array('PUT', 'https://api.recurly.com/v2/invoices/abcdef1234567890/mark_failed', '*'));

    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);
    $invoice->markFailed();
    $this->assertEqual($invoice->state, 'failed');
  }

  public function testGetInvoicePdf()
  {
    $client = new MockRecurly_Client();
    $client->returns('getPdf', "Fake PDF", array('/invoices/abcdef1234567890', 'en-GB'));

    $result = Recurly_Invoice::getInvoicePdf('abcdef1234567890', 'en-GB', $client);
    $this->assertEqual($result, "Fake PDF");
  }
}
