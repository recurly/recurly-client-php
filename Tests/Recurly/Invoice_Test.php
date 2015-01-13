<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_InvoiceTest extends Recurly_TestCase
{

  function defaultResponses() {
    return array(
      array('GET', '/invoices/1001', 'invoices/show-200.xml'),
      array('GET', '/invoices/1002', 'invoices/show-with-prefix-200.xml'),
    );
  }

  public function testGetInvoice() {
    $invoice = Recurly_Invoice::get('1001', $this->client);

    $this->assertInstanceOf('Recurly_Invoice', $invoice);
    $this->assertInstanceOf('Recurly_Stub', $invoice->account);
    $this->assertInstanceOf('Recurly_Stub', $invoice->subscription);
    $this->assertEquals($invoice->state, 'collected');
    $this->assertEquals($invoice->total_in_cents, 2995);
    $this->assertEquals($invoice->getHref(),'https://api.recurly.com/v2/invoices/1001');
    $this->assertInstanceOf('Recurly_TransactionList', $invoice->transactions);
    $this->assertEquals($invoice->transactions->current()->uuid, '012345678901234567890123456789ab');
    $this->assertEquals($invoice->transactions->count(), 1);
    $this->assertEquals($invoice->tax_type, 'usst');
    $this->assertEquals($invoice->terms_and_conditions, 'Some Terms and Conditions');
    $this->assertEquals($invoice->customer_notes, 'Some Customer Notes');
    $this->assertEquals($invoice->vat_reverse_charge_notes, 'Some VAT Notes');
    $this->assertEquals($invoice->invoice_number_prefix, '');
    $this->assertEquals($invoice->invoiceNumberWithPrefix(), '1001');
  }

  public function testGetInvoiceWithPrefix() {
    $invoice = Recurly_Invoice::get('1002', $this->client);
    $this->assertEquals($invoice->invoice_number, '1002');
    $this->assertEquals($invoice->invoice_number_prefix, 'GB');
    $this->assertEquals($invoice->invoiceNumberWithPrefix(), 'GB1002');
  }

  public function testInvoicePendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices', 'invoices/create-201.xml');

    $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', array(), $this->client);

    $this->assertInstanceOf('Recurly_Invoice', $invoice);
    $this->assertInstanceOf('Recurly_Stub', $invoice->account);
    $this->assertEquals($invoice->uuid, '012345678901234567890123456789ab');
    $this->assertEquals($invoice->currency, 'USD');
    $this->assertEquals($invoice->total_in_cents, 300);
    $this->assertEquals($invoice->getHref(),'https://api.recurly.com/v2/invoices/012345678901234567890123456789ab');
    $this->assertEquals($invoice->terms_and_conditions, 'Some Terms and Conditions');
    $this->assertEquals($invoice->customer_notes, 'Some Customer Notes');
    $this->assertEquals($invoice->vat_reverse_charge_notes, 'Some VAT Notes');
  }

  public function testFailedInvoicePendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices', 'invoices/create-422.xml');

    try {
      $invoice = Recurly_Invoice::invoicePendingCharges('abcdef1234567890', array(), $this->client);
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->assertEquals($e->errors[0]->symbol,'will_not_invoice');
    }
  }

  public function testPreviewPendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices/preview', 'invoices/preview-200.xml');

    $invoice = Recurly_Invoice::previewPendingCharges('abcdef1234567890', array("terms_and_conditions" => "New Terms", "customer_notes" => "New Notes"), $this->client);

    $this->assertInstanceOf('Recurly_Invoice', $invoice);
    $this->assertInstanceOf('Recurly_Stub', $invoice->account);
    $this->assertEquals($invoice->uuid, '012345678901234567890123456789ab');
    $this->assertEquals($invoice->currency, 'USD');
    $this->assertEquals($invoice->total_in_cents, 300);
    $this->assertEquals($invoice->getHref(), Null);
    $this->assertEquals($invoice->terms_and_conditions, 'New Terms');
    $this->assertEquals($invoice->customer_notes, 'New Notes');
    $this->assertEquals($invoice->vat_reverse_charge_notes, 'New VAT Notes');
  }

  public function testFailedPreviewPendingCharges() {
    $this->client->addResponse('POST', '/accounts/abcdef1234567890/invoices/preview', 'invoices/create-422.xml');

    try {
      $invoice = Recurly_Invoice::previewPendingCharges('abcdef1234567890', array(), $this->client);
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
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/mark_successful', 'invoices/mark_successful-200.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);
    $invoice->markSuccessful();
    $this->assertEquals($invoice->state, 'collected');
  }

  public function testMarkFailed() {
    // See the notes in testMarkSuccessful().
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/mark_failed', 'invoices/mark_failed-200.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);
    $invoice->markFailed();
    $this->assertEquals($invoice->state, 'failed');
  }

  public function testGetInvoicePdf() {
    $result = Recurly_Invoice::getInvoicePdf('1001', 'en-GB', $this->client);
    $this->assertEquals(array('/invoices/1001', 'en-GB'), $result);
  }

  public function testRefundAmount() {
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/invoices/1001/refund', 'invoices/refund-201.xml');
    $invoice = Recurly_Invoice::get('1001', $this->client);

    $refund_invoice = $invoice->refundAmount(1000);
    $this->assertEquals($refund_invoice->subtotal_in_cents, -1000);
  }

  public function testRefund() {
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/invoices/1001/refund', 'invoices/refund-201.xml');
    $invoice = Recurly_Invoice::get('1001', $this->client);
    $line_items = $invoice->line_items;

    $adjustment_map = function($line_item) {
      return $line_item->toRefundAttributes();
    };
    $adjustments = array_map($adjustment_map, $line_items);

    $refund_invoice = $invoice->refund($adjustments);
    $this->assertEquals($refund_invoice->subtotal_in_cents, -1000);
  }
}
