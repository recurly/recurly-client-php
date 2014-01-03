<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_InvoiceTest extends Recurly_TestCase
{

  function defaultResponses() {
    return array(
      array('GET', '/invoices/abcdef1234567890', 'invoices/show-200.xml'),
    );
  }

  public function testGetInvoice() {
    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_Invoice', $invoice);
    $this->assertInstanceOf('Recurly_Stub', $invoice->account);
    $this->assertInstanceOf('Recurly_Stub', $invoice->subscription);
    $this->assertEquals($invoice->state, 'collected');
    $this->assertEquals($invoice->total_in_cents, 2995);
    $this->assertEquals($invoice->getHref(),'https://api.recurly.com/v2/invoices/abcdef1234567890');
    $this->assertInstanceOf('Recurly_TransactionList', $invoice->transactions);
    $this->assertEquals($invoice->transactions->current()->uuid, '012345678901234567890123456789ab');
    $this->assertEquals($invoice->transactions->count(), 1);
  }

  public function testInvoicePendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices', 'invoices/create-201.xml');

    $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_Invoice', $invoice);
    $this->assertInstanceOf('Recurly_Stub', $invoice->account);
    $this->assertEquals($invoice->uuid, '012345678901234567890123456789ab');
    $this->assertEquals($invoice->currency, 'USD');
    $this->assertEquals($invoice->total_in_cents, 300);
    $this->assertEquals($invoice->getHref(),'https://api.recurly.com/v2/invoices/012345678901234567890123456789ab');
  }

  public function testFailedInvoicePendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices', 'invoices/create-422.xml');

    try {
      $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', $this->client);
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->assertEquals($e->errors[0]->symbol,'will_not_invoice');
    }
  }

  public function testMarkSuccessful() {
    // Two things to note:
    // - the invoice will use the full URL from the XML response
    // - Recurly_Resource::_save() passes the current XML into the PUT which
    //   doesn't seem quite right but I don't want to change it without
    //   understanding what side effects it would have.
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/abcdef1234567890/mark_successful', 'invoices/mark_successful-200.xml');

    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);
    $invoice->markSuccessful();
    $this->assertEquals($invoice->state, 'collected');
  }

  public function testMarkFailed() {
    // See the notes in testMarkSuccessful().
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/abcdef1234567890/mark_failed', 'invoices/mark_failed-200.xml');

    $invoice = Recurly_Invoice::get('abcdef1234567890', $this->client);
    $invoice->markFailed();
    $this->assertEquals($invoice->state, 'failed');
  }

  public function testGetInvoicePdf() {
    $result = Recurly_Invoice::getInvoicePdf('abcdef1234567890', 'en-GB', $this->client);
    $this->assertEquals(array('/invoices/abcdef1234567890', 'en-GB'), $result);
  }
}
