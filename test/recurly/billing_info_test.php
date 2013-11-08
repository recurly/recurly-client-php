<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_BillingInfoTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890/billing_info', 'billing_info/show-200.xml'),
      array('DELETE', '/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
      array('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
    );
  }

  public function testGetAccount() {
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

  public function testDelete() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $billing_info->delete();
  }

  public function testDeleteForAccount() {
    Recurly_BillingInfo::deleteForAccount('abcdef1234567890', $this->client);
  }

}
