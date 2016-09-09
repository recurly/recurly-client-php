<?php


class Recurly_SubscriptionTest extends Recurly_TestCase
{
  public function testGetSubscription() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);
    $this->assertInstanceOf('Recurly_Subscription', $subscription);
    $this->assertInstanceOf('Recurly_Stub', $subscription->account);
    $this->assertEquals($subscription->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');

    $this->assertCount(1, $subscription->subscription_add_ons);

    $add_on = $subscription->subscription_add_ons[0];
    $this->assertInstanceOf('Recurly_SubscriptionAddOn', $add_on);
    $this->assertEquals('Marketing Emails', $add_on->name);
    $this->assertEquals('marketing_emails', $add_on->add_on_code);
    $this->assertEquals(5, $add_on->unit_amount_in_cents);
    $this->assertEquals(1, $add_on->quantity);
    $this->assertEquals('price', $add_on->usage_type);
    $this->assertEquals('usage', $add_on->add_on_type);
    $this->assertEquals('manual', $subscription->collection_method);
    $this->assertEquals('1000', $subscription->po_number);
    $this->assertEquals(10, $subscription->net_terms);
    $this->assertEquals(0, $subscription->tax_in_cents);
    $this->assertEquals('usst', $subscription->tax_type);
    $this->assertEquals('Some Terms and Conditions', $subscription->terms_and_conditions);
    $this->assertEquals('Some Customer Notes', $subscription->customer_notes);
    $this->assertEquals('Some VAT Notes', $subscription->vat_reverse_charge_notes);

    # TODO: Should test the rest of the parsing.
  }

  public function testCreateManualCollectionSubscriptionXml() {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->currency = 'USD';
    $subscription->net_terms = 10;
    $subscription->collection_method = 'manual';
    $subscription->po_number = '1000';

    $account = new Recurly_Account();
    $account->account_code = '123';

    $subscription->account = $account;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><account><account_code>123</account_code><address></address></account><plan_code>gold</plan_code><currency>USD</currency><subscription_add_ons></subscription_add_ons><net_terms>10</net_terms><po_number>1000</po_number><collection_method>manual</collection_method></subscription>\n",
      $subscription->xml()
  );
  }

  public function testCreateSubscriptionXml() {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->quantity = 1;
    $subscription->currency = 'USD';
    $subscription->bulk = true;
    $subscription->terms_and_conditions = 'Some Terms and Conditions';
    $subscription->customer_notes = 'Some Customer Notes';

    $account = new Recurly_Account();
    $account->account_code = 'account_code';
    $account->username = 'username';
    $account->first_name = 'Verena';
    $account->last_name = 'Example';
    $account->email = 'verena@example.com';
    $account->accept_language = 'en-US';

    $billing_info = new Recurly_BillingInfo();
    $billing_info->first_name = 'Verena';
    $billing_info->last_name = 'Example';
    $billing_info->number = '4111-1111-1111-1111';
    $billing_info->verification_value = '123';
    $billing_info->month = 11;
    $billing_info->year = 2015;
    $billing_info->ip_address = '192.168.0.1';

    $shad = new Recurly_ShippingAddress();
    $shad->nickname = "Work";
    $shad->first_name = "Verena";
    $shad->last_name = "Example";
    $shad->company = "Recurly Inc.";
    $shad->phone = "555-555-5555";
    $shad->email = "verena@example.com";
    $shad->address1 = "123 Main St.";
    $shad->city = "San Francisco";
    $shad->state = "CA";
    $shad->zip = "94110";
    $shad->country = "US";

    $subscription->shipping_address = $shad;
    $subscription->account = $account;
    $account->billing_info = $billing_info;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><account><account_code>account_code</account_code><username>username</username><first_name>Verena</first_name><last_name>Example</last_name><email>verena@example.com</email><accept_language>en-US</accept_language><billing_info><first_name>Verena</first_name><last_name>Example</last_name><ip_address>192.168.0.1</ip_address><number>4111-1111-1111-1111</number><month>11</month><year>2015</year><verification_value>123</verification_value></billing_info><address></address></account><plan_code>gold</plan_code><quantity>1</quantity><currency>USD</currency><subscription_add_ons></subscription_add_ons><bulk>true</bulk><terms_and_conditions>Some Terms and Conditions</terms_and_conditions><customer_notes>Some Customer Notes</customer_notes><shipping_address><address1>123 Main St.</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><phone>555-555-5555</phone><email>verena@example.com</email><nickname>Work</nickname><first_name>Verena</first_name><last_name>Example</last_name><company>Recurly Inc.</company></shipping_address></subscription>\n",
      $subscription->xml()
    );
  }

  public function testUpdateShippingAddressXml() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');
    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);

    $subscription->shipping_address_id = 1234567890;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><subscription_add_ons><subscription_add_on><add_on_code>marketing_emails</add_on_code><unit_amount_in_cents>5</unit_amount_in_cents><quantity>1</quantity></subscription_add_on></subscription_add_ons><shipping_address_id>1234567890</shipping_address_id></subscription>\n",
      $subscription->xml()
    );
  }

  public function testCreateSubscriptionWithAddonsXml() {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->quantity = 1;
    $subscription->currency = 'USD';

    $add_on = new Recurly_SubscriptionAddOn();
    $add_on->add_on_code = 'more';
    $add_on->name = 'should be ignored';
    $add_on->quantity = 1;
    $subscription->subscription_add_ons[] = $add_on;

    $account = new Recurly_Account();
    $account->account_code = 'account_code';
    $account->username = 'username';
    $account->first_name = 'Verena';
    $account->last_name = 'Example';
    $account->email = 'verena@example.com';
    $account->accept_language = 'en-US';

    $billing_info = new Recurly_BillingInfo();
    $billing_info->first_name = 'Verena';
    $billing_info->last_name = 'Example';
    $billing_info->number = '4111-1111-1111-1111';
    $billing_info->verification_value = '123';
    $billing_info->month = 11;
    $billing_info->year = 2015;
    $billing_info->ip_address = '192.168.0.1';

    $subscription->account = $account;
    $account->billing_info = $billing_info;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><account><account_code>account_code</account_code><username>username</username><first_name>Verena</first_name><last_name>Example</last_name><email>verena@example.com</email><accept_language>en-US</accept_language><billing_info><first_name>Verena</first_name><last_name>Example</last_name><ip_address>192.168.0.1</ip_address><number>4111-1111-1111-1111</number><month>11</month><year>2015</year><verification_value>123</verification_value></billing_info><address></address></account><plan_code>gold</plan_code><quantity>1</quantity><currency>USD</currency><subscription_add_ons><subscription_add_on><add_on_code>more</add_on_code><quantity>1</quantity></subscription_add_on></subscription_add_ons></subscription>\n",
      $subscription->xml()
    );
  }

  public function testCreateSubscriptionWithBillingInfoTokenXml() {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->quantity = 1;
    $subscription->currency = 'USD';

    $subscription->account = new Recurly_Account();
    $subscription->account->account_code = 'account_code';

    $subscription->account->billing_info = new Recurly_BillingInfo();
    $subscription->account->billing_info->token_id = 'abc123';

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><account><account_code>account_code</account_code><billing_info><token_id>abc123</token_id></billing_info><address></address></account><plan_code>gold</plan_code><quantity>1</quantity><currency>USD</currency><subscription_add_ons></subscription_add_ons></subscription>\n",
      $subscription->xml()
    );
  }

  public function testPreviewNewSubscription() {
    $this->client->addResponse('POST', '/subscriptions/preview', 'subscriptions/preview-200-new.xml');

    $subscription = new Recurly_Subscription(null, $this->client);
    $subscription->plan_code = 'gold';
    $subscription->currency = 'USD';
    $subscription->net_terms = 10;
    $subscription->collection_method = 'manual';
    $subscription->po_number = '1000';

    $account = new Recurly_Account();
    $account->account_code = '123';

    $subscription->account = $account;

    $subscription->preview();

    $this->assertEquals(10000, $subscription->cost_in_cents);
    $this->assertEquals('pending', $subscription->state);
  }

  public function testPreviewChangeSubscription() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');

    $this->client->addResponse('POST', 'https://api.recurly.com/v2/subscriptions/012345678901234567890123456789ab/preview', 'subscriptions/preview-200-change.xml');

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);
    $subscription->plan_code = 'gold';

    $subscription->preview();

    $this->assertEquals('5000', $subscription->cost_in_cents);
    $this->assertEquals('gold', $subscription->plan_code);
  }

  public function testUpdateNotes() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/subscriptions/012345678901234567890123456789ab/notes', 'subscriptions/show-200-changed-notes.xml');

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);

    $notes = array("customer_notes" => "New Customer Notes", "terms_and_condititions" => "New Terms", "vat_reverse_charge_notes" => "New VAT Notes");

    $subscription->updateNotes($notes);

    foreach($notes as $key => $value) {
      $this->assertEquals($subscription->$key, $value);
    }
  }

  public function testUpdateSubscriptionWithAddOns() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');
    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);

    $subscription->quantity = 2;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<subscription><quantity>2</quantity><subscription_add_ons><subscription_add_on><add_on_code>marketing_emails</add_on_code><unit_amount_in_cents>5</unit_amount_in_cents><quantity>1</quantity></subscription_add_on></subscription_add_ons></subscription>\n",
      $subscription->xml()
    );
  }

  public function testGetSubscriptionRedemptions() {
    $this->client->addResponse('GET', '/subscriptions/012345678901234567890123456789ab', 'subscriptions/show-200.xml');
    $this->client->addResponse('GET', 'https://api.recurly.com/v2/subscriptions/012345678901234567890123456789ab/redemptions', 'subscriptions/redemptions-200.xml');

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $this->client);

    $redemptions = $subscription->redemptions->get();

    $this->assertEquals(2, $redemptions->count());

    foreach($redemptions as $r) {
      $this->assertInstanceOf('Recurly_CouponRedemption', $r);
    }
  }
}
