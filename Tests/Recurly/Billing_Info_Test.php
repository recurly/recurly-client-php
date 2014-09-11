<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_BillingInfoTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890/billing_info', 'billing_info/show-200.xml'),
      array('GET', '/accounts/paypal1234567890/billing_info', 'billing_info/show-paypal-200.xml'),
      array('GET', '/accounts/amazon1234567890/billing_info', 'billing_info/show-amazon-200.xml'),
      array('PUT', '/accounts/abcdef1234567890/billing_info', 'billing_info/show-200.xml'),
      array('DELETE', '/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
      array('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
    );
  }

  public function testGetBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->first_name, 'Larry');
    $this->assertEquals($billing_info->address1, '123 Pretty Pretty Good St.');
    $this->assertEquals($billing_info->country, 'US');
    $this->assertEquals($billing_info->card_type, 'Visa');
    $this->assertEquals($billing_info->year, 2015);
    $this->assertEquals($billing_info->month, 1);
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info');
  }

  public function testGetPayPalBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('paypal1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->card_type, null);
    $this->assertEquals($billing_info->year, null);
    $this->assertEquals($billing_info->month, null);
    $this->assertEquals($billing_info->amazon_billing_agreement_id, null);
    $this->assertEquals($billing_info->paypal_billing_agreement_id, 'abc123');
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/paypal1234567890/billing_info');
  }

  public function testGetAmazonBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('amazon1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->card_type, null);
    $this->assertEquals($billing_info->year, null);
    $this->assertEquals($billing_info->month, null);
    $this->assertEquals($billing_info->paypal_billing_agreement_id, null);
    $this->assertEquals($billing_info->amazon_billing_agreement_id, 'C01-1234567-8901234');
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/amazon1234567890/billing_info');
  }

  public function testDelete() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $billing_info->delete();
  }

  public function testDeleteForAccount() {
    Recurly_BillingInfo::deleteForAccount('abcdef1234567890', $this->client);
  }

  public function testCreateForAccount() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->account_code = 'abcdef1234567890';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $billing_info->create();
  }

  public function testCreateForAccountWithToken() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->account_code = 'abcdef1234567890';
    $billing_info->token_id = 'abc123';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><token_id>abc123</token_id></billing_info>\n"
    );
    $billing_info->create();
  }

}
