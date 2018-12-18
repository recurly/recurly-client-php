<?php

class Recurly_PurchaseTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('POST', '/purchases', 'purchases/create-201.xml'),
      array('POST', '/purchases/preview', 'purchases/preview-200.xml'),
      array('POST', '/purchases/authorize', 'purchases/authorize-200.xml'),
      array('POST', '/purchases/pending', 'purchases/pending-200.xml'),
      /* Transaction IDs here come from the /fixtures/purchases/authorize-200.xml */
      array('POST', '/purchases/transaction-uuid-a1b2c3d4e5f6g7h8i9j/cancel', 'purchases/cancel-200.xml'),
      array('POST', '/purchases/transaction-uuid-a1b2c3d4e5f6g7h8i9j/capture', 'purchases/capture-200.xml'),
    );
  }

  public function mockPurchase() {
    $purchase = new Recurly_Purchase();
    $purchase->currency = 'USD';
    $purchase->gateway_code = 'aBcD1234';
    $purchase->collection_method = 'automatic';
    $purchase->customer_notes = 'Customer Notes';
    $purchase->terms_and_conditions = 'Terms and Conditions';
    $purchase->vat_reverse_charge_notes = 'VAT Reverse Charge Notes';
    $purchase->account = new Recurly_Account();
    $purchase->account->account_code = 'aba9209a-aa61-4790-8e61-0a2692435fee';
    $purchase->account->address->phone = "555-555-5555";
    $purchase->account->address->email = "verena@example.com";
    $purchase->account->address->address1 = "123 Main St.";
    $purchase->account->address->city = "San Francisco";
    $purchase->account->address->state = "CA";
    $purchase->account->address->zip = "94110";
    $purchase->account->address->country = "US";
    $purchase->account->billing_info = new Recurly_BillingInfo();
    $purchase->account->billing_info->token_id = '7z6furn4jvb9';

    $shipping_address = new Recurly_ShippingAddress();
    $shipping_address->first_name = 'Dolores';
    $shipping_address->last_name = 'Du Monde';
    $shipping_address->address1 = '400 Dolores St';
    $shipping_address->city = 'San Francisco';
    $shipping_address->state = 'CA';
    $shipping_address->country = 'US';
    $shipping_address->zip = '94110';
    $shipping_address->nickname = 'Home';
    $purchase->account->shipping_addresses = array($shipping_address);

    $adjustment = new Recurly_Adjustment();
    $adjustment->product_code = "abcd123";
    $adjustment->unit_amount_in_cents = 1000;
    $adjustment->currency = 'USD';
    $adjustment->quantity = 1;
    $adjustment->revenue_schedule_type = 'at_invoice';

    $purchase->adjustments[] = $adjustment;

    return $purchase;
  }

  public function testXml() {
    $purchase = $this->mockPurchase();

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<purchase><account><account_code>aba9209a-aa61-4790-8e61-0a2692435fee</account_code><billing_info><token_id>7z6furn4jvb9</token_id></billing_info><address><address1>123 Main St.</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><phone>555-555-5555</phone></address><shipping_addresses><shipping_address><address1>400 Dolores St</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><nickname>Home</nickname><first_name>Dolores</first_name><last_name>Du Monde</last_name></shipping_address></shipping_addresses></account><adjustments><adjustment><currency>USD</currency><unit_amount_in_cents>1000</unit_amount_in_cents><quantity>1</quantity><revenue_schedule_type>at_invoice</revenue_schedule_type><product_code>abcd123</product_code></adjustment></adjustments><collection_method>automatic</collection_method><currency>USD</currency><customer_notes>Customer Notes</customer_notes><terms_and_conditions>Terms and Conditions</terms_and_conditions><vat_reverse_charge_notes>VAT Reverse Charge Notes</vat_reverse_charge_notes><gateway_code>aBcD1234</gateway_code></purchase>\n",
      $purchase->xml()
    );
  }

  public function testInvoicePurchase() {
    $purchase = $this->mockPurchase();
    $collection = Recurly_Purchase::invoice($purchase, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $collection);
    $this->assertInstanceOf('Recurly_Invoice', $collection->charge_invoice);
    $this->assertEquals('3d8648fcf2be67ed304ff242d6bbb9d4', $collection->charge_invoice->uuid);
    $this->assertInstanceOf('Recurly_ShippingAddress', $collection->charge_invoice->line_items[0]->shipping_address);
  }

  public function testPreviewPurchase() {
    $purchase = $this->mockPurchase();
    $collection = Recurly_Purchase::preview($purchase, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $collection);
    $this->assertInstanceOf('Recurly_Invoice', $collection->charge_invoice);
    $this->assertNull($collection->charge_invoice->uuid);
  }

  public function testAuthorizePurchase() {
    $purchase = $this->mockPurchase();
    $purchase->account->email = 'benjamin.dumonde@example.com';
    $purchase->account->billing_info->external_hpp_type = 'adyen';
    $collection = Recurly_Purchase::authorize($purchase, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $collection);
    $this->assertInstanceOf('Recurly_Invoice', $collection->charge_invoice);
    $this->assertNull($collection->charge_invoice->uuid);
  }

  public function testAuthorizeAndCapturePurchase() {
    $purchase = $this->mockPurchase();
    $purchase->account->email = 'benjamin.dumonde@example.com';
    $purchase->account->billing_info->external_hpp_type = 'adyen';
    $authorizeCollection = Recurly_Purchase::authorize($purchase, $this->client);

    $transactionUUID = $authorizeCollection->charge_invoice->transactions->current()->uuid;

    $captureCollection = Recurly_Purchase::capture($transactionUUID, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $captureCollection);
    $this->assertInstanceOf('Recurly_Invoice', $captureCollection->charge_invoice);
  }

  public function testAuthorizeAndCancelPurchase() {
    $purchase = $this->mockPurchase();
    $purchase->account->email = 'benjamin.dumonde@example.com';
    $purchase->account->billing_info->external_hpp_type = 'adyen';
    $authorizeCollection = Recurly_Purchase::authorize($purchase, $this->client);

    $transactionUUID = $authorizeCollection->charge_invoice->transactions->current()->uuid;

    $cancelCollection = Recurly_Purchase::cancel($transactionUUID, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $cancelCollection);
    $this->assertInstanceOf('Recurly_Invoice', $cancelCollection->charge_invoice);
  }

  public function testPendingPurchase() {
    $purchase = $this->mockPurchase();
    $purchase->account->email = 'benjamin.dumonde@example.com';
    $purchase->account->billing_info->external_hpp_type = 'adyen';
    $collection = Recurly_Purchase::pending($purchase, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceCollection', $collection);
    $this->assertInstanceOf('Recurly_Invoice', $collection->charge_invoice);
    $this->assertNull($collection->charge_invoice->uuid);
  }

  public function testTransactionError() {
    $this->client->addResponse('POST', '/purchases', 'purchases/create-422.xml');
    $purchase = $this->mockPurchase();

    try {
      $invoice = Recurly_Purchase::invoice($purchase, $this->client);
      $this->fail('Purchase should throw transaction exception but it threw no exception');
    } catch (Recurly_ValidationError $e) {
      $this->assertEquals($e->getMessage(), 'Credit card number is not valid.');
      $this->assertInstanceOf('Recurly_TransactionError', $e->errors->transaction_error);
      $this->assertInstanceOf('Recurly_Transaction', $e->errors->transaction);
    } catch (Exception $e) {
      print $e->getMessage();
      $this->fail('Purchase should have thrown transaction exception');
    }
  }
}

