<?php

class Recurly_SubscriptionTest extends UnitTestCase
{
  public function testGetSubscription()
  {
    $client = new MockRecurly_Client();
    mockRequest($client, 'subscriptions/show-200.xml', array('GET', '/subscriptions/012345678901234567890123456789ab'));

    $subscription = Recurly_Subscription::get('012345678901234567890123456789ab', $client);
    $this->assertIsA($subscription, 'Recurly_Subscription');
    $this->assertIsA($subscription->account, 'Recurly_Stub');
    $this->assertEqual($subscription->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');

    $this->assertIsA($subscription->subscription_add_ons, 'Array');
    $this->assertEqual(count($subscription->subscription_add_ons), 1);
    $add_on = $subscription->subscription_add_ons[0];
    $this->assertIsA($add_on, 'Recurly_SubscriptionAddOn');
    $this->assertEqual($add_on->name, 'IP Addresses');
    $this->assertEqual($add_on->add_on_code, 'ipaddresses');
    $this->assertEqual($add_on->unit_amount_in_cents, 200);
    $this->assertEqual($add_on->quantity, 2);
    $this->assertEqual($subscription->collection_method, 'manual');
    $this->assertEqual($subscription->po_number, '1000');
    $this->assertEqual($subscription->net_terms, 10);

    # TODO: Should test the rest of the parsing.
  }

  public function testCreateManualCollectionSubscriptionXml()
  {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->currency = 'USD';
    $subscription->net_terms = 10;
    $subscription->collection_method = 'manual';
    $subscription->po_number = '1000';

    $account = new Recurly_Account();
    $account->account_code = '123';

    $subscription->account = $account;

    $xml = $subscription->xml();
    $this->assertEqual($xml, "<?xml version=\"1.0\"?>\n<subscription><account><account_code>123</account_code><address/></account><plan_code>gold</plan_code><currency>USD</currency><subscription_add_ons/><net_terms>10</net_terms><po_number>1000</po_number><collection_method>manual</collection_method></subscription>\n");
  }

  public function testCreateSubscriptionXml()
  {
    $subscription = new Recurly_Subscription();
    $subscription->plan_code = 'gold';
    $subscription->quantity = 1;
    $subscription->currency = 'USD';

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

    $xml = $subscription->xml();
    $this->assertEqual($xml, "<?xml version=\"1.0\"?>\n<subscription><account><account_code>account_code</account_code><username>username</username><first_name>Verena</first_name><last_name>Example</last_name><email>verena@example.com</email><accept_language>en-US</accept_language><billing_info><first_name>Verena</first_name><last_name>Example</last_name><ip_address>192.168.0.1</ip_address><number>4111-1111-1111-1111</number><month>11</month><year>2015</year><verification_value>123</verification_value></billing_info><address/></account><plan_code>gold</plan_code><quantity>1</quantity><currency>USD</currency><subscription_add_ons/></subscription>\n");
  }

  public function testCreateSubscriptionWithAddonsXml()
  {
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

    $xml = $subscription->xml();
    $this->assertEqual($xml, "<?xml version=\"1.0\"?>\n<subscription><account><account_code>account_code</account_code><username>username</username><first_name>Verena</first_name><last_name>Example</last_name><email>verena@example.com</email><accept_language>en-US</accept_language><billing_info><first_name>Verena</first_name><last_name>Example</last_name><ip_address>192.168.0.1</ip_address><number>4111-1111-1111-1111</number><month>11</month><year>2015</year><verification_value>123</verification_value></billing_info><address/></account><plan_code>gold</plan_code><quantity>1</quantity><currency>USD</currency><subscription_add_ons><subscription_add_on><add_on_code>more</add_on_code><quantity>1</quantity></subscription_add_on></subscription_add_ons></subscription>\n");
  }
}
