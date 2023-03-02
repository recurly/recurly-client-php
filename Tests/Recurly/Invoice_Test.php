<?php


class Recurly_InvoiceTest extends Recurly_TestCase
{

  function defaultResponses(): array {
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
    $this->assertInstanceOf('Recurly_Stub', $invoice->all_transactions);
    $this->assertInstanceOf('Recurly_Stub', $invoice->business_entity);
    $this->assertEquals($invoice->business_entity->getHref(), 'https://api.recurly.com/v2/business_entities/sg2e75h5bdr4');
    $this->assertEquals($invoice->state, 'paid');
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
    $this->assertEquals($invoice->dunning_campaign_id, '1234abcd');
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
    $this->assertEquals($invoice->state, 'paid');
  }

  public function testForceCollect() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/collect', 'invoices/force_collect-200.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);
    $invoice->forceCollect('moto');
    $this->assertEquals($invoice->state, 'paid');
  }

  public function testApplyCreditBalance() {
    // See the notes in testMarkSuccessful().
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/apply_credit_balance', 'invoices/apply_credit_balance-200.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);
    $invoice->applyCreditBalance();
    $this->assertEquals($invoice->state, 'paid');
  }

  public function testMarkFailed() {
    // See the notes in testMarkSuccessful().
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001/mark_failed', 'invoices/mark_failed-200.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);
    $collection = $invoice->markFailed();
    $this->assertEquals($collection->charge_invoice->state, 'failed');
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

  public function testEnterOfflinePayment() {
    $invoice = Recurly_Invoice::get('1001', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/invoices/1001/transactions', 'transactions/create-200.xml');
    $transactionAttrs = new Recurly_Transaction();
    $transactionAttrs->payment_method = 'check';
    $transactionAttrs->collected_at = date('c', strtotime('2012-12-31Z'));
    $transactionAttrs->amount_in_cents = 1000;
    $transactionAttrs->description = "check #12345";
    $transaction = $invoice->enterOfflinePayment($transactionAttrs, $this->client);

    $this->assertInstanceOf('Recurly_Transaction', $transaction);
    $this->assertEquals($transaction->status, 'success');
  }

  public function testUpdateInvoice() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/invoices/1001', 'invoices/show-200-updated-invoice.xml');

    $invoice = Recurly_Invoice::get('1001', $this->client);

    $invoice->address = new Recurly_Address();
    $invoice->address->first_name = "Spongebob";
    $invoice->address->last_name = "Squarepants";
    $invoice->address->name_on_account = 'Patrick Star';
    $invoice->address->company = 'Krusty Krab';
    $invoice->address->address1 = '124 Conch Street';
    $invoice->address->address2 = 'Pineapple';
    $invoice->address->city = 'Bikini Bottom';
    $invoice->address->state = 'Dead Eye Gulch';
    $invoice->address->zip = '96970';
    $invoice->address->country = 'Pacific Ocean';
    $invoice->address->phone = '509-990-3551';

    $invoice->po_number = '3699';
    $invoice->customer_notes = 'Is this the Krusty Krab?';
    $invoice->terms_and_conditions = 'Never disclose the location of the Krabby Patty secret formula.';
    $invoice->vat_reverse_charge_notes = "can't be changed when invoice was not a reverse charge";
    $invoice->net_terms = '60';
    $invoice->gateway_code = 'A new gateway code';

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<invoice><address><first_name>Spongebob</first_name><last_name>Squarepants</last_name><name_on_account>Patrick Star</name_on_account><company>Krusty Krab</company><address1>124 Conch Street</address1><address2>Pineapple</address2><city>Bikini Bottom</city><state>Dead Eye Gulch</state><zip>96970</zip><country>Pacific Ocean</country><phone>509-990-3551</phone></address><terms_and_conditions>Never disclose the location of the Krabby Patty secret formula.</terms_and_conditions><customer_notes>Is this the Krusty Krab?</customer_notes><vat_reverse_charge_notes>can't be changed when invoice was not a reverse charge</vat_reverse_charge_notes><net_terms>60</net_terms><po_number>3699</po_number><gateway_code>A new gateway code</gateway_code></invoice>\n",
      $invoice->xml()
    );
    $invoice->update();
  }

  public function testGetInvoiceWithCustomFields() {
    $invoice = Recurly_Invoice::get('1001', $this->client);
    $this->client->addResponse('GET', 'https://api.recurly.com/v2/invoices/1001', 'invoices/show-200-updated-invoice.xml');
    $line_items = $invoice->line_items;

    foreach($line_items as $line_item) {
      $this->assertEquals(sizeof($line_item->custom_fields), 1);
    }
  }
}
