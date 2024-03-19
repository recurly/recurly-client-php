<?php

class Recurly_AccountAcquisitionTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/accounts/abcdef1234567890/acquisition', 'account_acquisition/show-200.xml'),
      array('PUT', '/accounts/abcdef1234567890/acquisition', 'account_acquisition/create-201.xml'),
      array('DELETE', '/accounts/abcdef1234567890/acquisition', 'account_acquisition/destroy-204.xml'),
      array('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/acquisition', 'account_acquisition/destroy-204.xml'),
    );
  }

  public function testGetAccountAcquisition() {
    $account_acquisition = Recurly_AccountAcquisition::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_AccountAcquisition', $account_acquisition);
    $this->assertEquals($account_acquisition->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890/acquisition');

    $this->assertInstanceOf('Recurly_Stub', $account_acquisition->account);
    $this->assertEquals($account_acquisition->account->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890');

    $this->assertEquals($account_acquisition->cost_in_cents, 599);
    $this->assertEquals($account_acquisition->currency, 'USD');
    $this->assertEquals($account_acquisition->channel, 'marketing_content');
    $this->assertEquals($account_acquisition->subchannel, 'pickle sticks blog post');
    $this->assertEquals($account_acquisition->campaign, 'mailchimp67a904de95.0914d8f4b4');
  }

  public function testDelete() {
    $account_acquisition = Recurly_AccountAcquisition::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_AccountAcquisition', $account_acquisition);
    $account_acquisition->delete();
  }

  public function testDeleteForAccount() {
    Recurly_AccountAcquisition::deleteForAccount('abcdef1234567890', $this->client);
  }

  public function testCreateForAccount() {
    $account_acquisition = new Recurly_AccountAcquisition(null, $this->client);
    $account_acquisition->account_code = 'abcdef1234567890';

    $this->assertInstanceOf('Recurly_AccountAcquisition', $account_acquisition);
    $account_acquisition->create();
  }
}
