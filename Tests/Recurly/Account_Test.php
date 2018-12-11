<?php


class Recurly_AccountTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml')
    );
  }

  public function testGetAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_Account', $account);
    $this->assertEquals($account->account_code, 'abcdef1234567890');
    $this->assertEquals($account->email, 'larry.david@example.com');
    $this->assertEquals($account->first_name, 'Larry');
    $this->assertEquals($account->vat_number, 'ST-1937');
    $this->assertInstanceOf('Recurly_Address', $account->address);
    $this->assertEquals($account->address->address1, '123 Main St.');
    $this->assertEquals($account->address->address2, 'APT #6');
    $this->assertEquals($account->address->state, 'CA');
    $this->assertEquals($account->address->zip, '94105');
    $this->assertEquals($account->address->city, 'San Francisco');
    $this->assertEquals($account->address->country, 'US');
    $this->assertEquals($account->created_at->getTimestamp(), 1304164800);
    $this->assertEquals($account->getHref(),'https://api.recurly.com/v2/accounts/abcdef1234567890');
    $this->assertTrue($account->tax_exempt);
    $this->assertEquals($account->exemption_certificate, 'Some Certificate');
    $this->assertEquals($account->entity_use_code, 'I');
    $this->assertEquals($account->vat_location_valid, true);
    $this->assertEquals($account->cc_emails, 'cheryl.hines@example.com,richard.lewis@example.com');
    $this->assertEquals($account->has_paused_subscription, false);
    $this->assertEquals($account->preferred_locale, 'en-US');

    $this->assertInstanceOf('Recurly_CustomFieldList', $account->custom_fields);
    $this->assertCount(2, $account->custom_fields);
    $this->assertEquals(array('cat_name', 'shasta'), array_keys((array)$account->custom_fields));
    $this->assertInstanceOf('Recurly_CustomField', $account->custom_fields['cat_name']);
    $this->assertEquals($account->custom_fields['cat_name']->value, 'mittens');
    $this->assertInstanceOf('Recurly_CustomField', $account->custom_fields['shasta']);
    $this->assertEquals($account->custom_fields['shasta']->value, 'ate my hamburger');
  }

  public function testCloseAccount() {
    $this->client->addResponse('DELETE', '/accounts/abcdef1234567890', 'accounts/destroy-204.xml');

    Recurly_Account::closeAccount('abcdef1234567890', $this->client);
  }

  public function testClose() {
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890', 'accounts/destroy-204.xml');

    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $account->close();
    $this->assertEquals('closed', $account->state);
  }

  public function testReopenAccount() {
    $this->client->addResponse('PUT', '/accounts/abcdef1234567890/reopen', 'accounts/reopen-200.xml');

    $account = Recurly_Account::reopenAccount('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_Account', $account);
    $this->assertEquals('active', $account->state);
  }

  public function testReopen() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890/reopen', 'accounts/reopen-200.xml');

    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $account->reopen();
    $this->assertEquals('active', $account->state);
  }

  public function testUpdateError() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890', 'accounts/update-422.xml');

    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $account->email = 'invalidemail.com';

    try {
      $account->update();
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->assertEquals('Email is not a valid email address.', $e->getMessage());
    }

    $this->assertInstanceOf('Recurly_Account', $account);
    $this->assertInstanceOf('Recurly_FieldError', $account->errors[0]);
    $this->assertEquals('email', $account->errors[0]->field);
    $this->assertEquals('invalid_email', $account->errors[0]->symbol);
    $this->assertEquals('is not a valid email address', $account->errors[0]->description);
  }

  public function testXml() {
    $account = new Recurly_Account();
    $account->account_code = 'act123';
    $account->first_name = 'Verena';
    $account->address->address1 = "123 Main St.";
    $account->tax_exempt = false;
    $account->exemption_certificate = 'Some Certificate';
    $account->entity_use_code = 'I';
    $account->preferred_locale = 'en-US';

    $account_acquisition = new Recurly_AccountAcquisition();
    $account_acquisition->cost_in_cents = 599;
    $account_acquisition->currency = 'USD';
    $account_acquisition->channel = 'marketing_content';
    $account_acquisition->subchannel = 'pickle sticks blog post';
    $account_acquisition->campaign = 'mailchimp67a904de95.0914d8f4b4';

    $account->account_acquisition = $account_acquisition;

    // work shipping address
    $shad1 = new Recurly_ShippingAddress();
    $shad1->nickname = "Work";
    $shad1->first_name = "Verena";
    $shad1->last_name = "Example";
    $shad1->company = "Recurly Inc.";
    $shad1->phone = "555-555-5555";
    $shad1->email = "verena@example.com";
    $shad1->address1 = "123 Main St.";
    $shad1->city = "San Francisco";
    $shad1->state = "CA";
    $shad1->zip = "94110";
    $shad1->country = "US";

    // home shipping address
    $shad2 = new Recurly_ShippingAddress();
    $shad2->nickname = "Home";
    $shad2->first_name = "Verena";
    $shad2->last_name = "Example";
    $shad2->phone = "555-555-5555";
    $shad2->email = "verena@example.com";
    $shad2->address1 = "123 Dolores St.";
    $shad2->city = "San Francisco";
    $shad2->state = "CA";
    $shad2->zip = "94110";
    $shad2->country = "US";

    $account->shipping_addresses = array($shad1, $shad2);

    $account->custom_fields[] = new Recurly_CustomField("serial_number", "4567-8900-1234");

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<account><account_code>act123</account_code><first_name>Verena</first_name><address><address1>123 Main St.</address1></address><tax_exempt>false</tax_exempt><entity_use_code>I</entity_use_code><shipping_addresses><shipping_address><address1>123 Main St.</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><phone>555-555-5555</phone><email>verena@example.com</email><nickname>Work</nickname><first_name>Verena</first_name><last_name>Example</last_name><company>Recurly Inc.</company></shipping_address><shipping_address><address1>123 Dolores St.</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><phone>555-555-5555</phone><email>verena@example.com</email><nickname>Home</nickname><first_name>Verena</first_name><last_name>Example</last_name></shipping_address></shipping_addresses><preferred_locale>en-US</preferred_locale><custom_fields><custom_field><name>serial_number</name><value>4567-8900-1234</value></custom_field></custom_fields><account_acquisition><cost_in_cents>599</cost_in_cents><currency>USD</currency><channel>marketing_content</channel><subchannel>pickle sticks blog post</subchannel><campaign>mailchimp67a904de95.0914d8f4b4</campaign></account_acquisition><exemption_certificate>Some Certificate</exemption_certificate></account>\n",
      $account->xml()
    );
  }

  /**
   * Test that updates to nested account addresses are detected when generating
   * XML to send.
   */
  public function testNestedAddress() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $account->address->address1 = '987 Alternate St.';
    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<account><address><address1>987 Alternate St.</address1></address></account>\n",
      $account->xml()
    );
  }

  /**
   * Test that updates to nested custom fields are detected when generating
   * XML to send.
   */
  public function testNestedCustomFields() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $account->custom_fields[] = new Recurly_CustomField('new_field', 'something');
    $account->custom_fields[] = new Recurly_CustomField('shasta', '');

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<account><custom_fields><custom_field><name>shasta</name><value></value></custom_field><custom_field><name>new_field</name><value>something</value></custom_field></custom_fields></account>\n",
      $account->xml()
    );
  }

  public function testCreate() {
    $this->client->addResponse('POST', '/accounts', 'accounts/create-201.xml');

    $account = new Recurly_Account(null, $this->client);
    $account->account_code = 'abcdef1234567890';

    $account->create();

    $this->assertInstanceOf('Recurly_Account', $account);
  }

  public function testCreateWithBillingInfoToken() {
    $this->client->addResponse('POST', '/accounts', 'accounts/create-201.xml');

    $account = new Recurly_Account(null, $this->client);
    $account->account_code = 'abcdef1234567890';
    $account->billing_info = new Recurly_BillingInfo();
    $account->billing_info->token_id = 'abc123';

    $account->create();

    $this->assertInstanceOf('Recurly_Account', $account);
  }
}
