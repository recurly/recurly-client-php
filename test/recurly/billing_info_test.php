<?php

class Recurly_BillingInfoTest extends UnitTestCase
{
  public function testGetAccount()
  {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/billing_info/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/accounts/abcdef1234567890/billing_info'));

    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $client);

    $this->assertIsA($billing_info, 'Recurly_BillingInfo');
    $this->assertEqual($billing_info->first_name, 'Larry');
    $this->assertEqual($billing_info->address1, '123 Pretty Pretty Good St.');
    $this->assertEqual($billing_info->country, 'US');
    $this->assertEqual($billing_info->card_type, 'Visa');
    $this->assertEqual($billing_info->year, 2015);
    $this->assertEqual($billing_info->month, 1);
    $this->assertEqual($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info');
  }

  public function testDelete() {
    $getFixture = loadFixture(__DIR__ . '/../fixtures/billing_info/show-200.xml');
    $deleteFixture = loadFixture(__DIR__ . '/../fixtures/billing_info/destroy-204.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $getFixture, array('GET', '/accounts/abcdef1234567890/billing_info'));
    $client->returns('request', $deleteFixture, array('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info'));

    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $client);
    $this->assertIsA($billing_info, 'Recurly_BillingInfo');
    $billing_info->delete();
  }

  public function testDeleteForAccount() {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/billing_info/destroy-204.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('DELETE', '/accounts/abcdef1234567890/billing_info'));

    Recurly_BillingInfo::deleteForAccount('abcdef1234567890', $client);
  }

}
