<?php


class Recurly_ExternalAccountListTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml')
    );
  }

  public function testGetExternalAccounts() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $url = '/accounts/abcdef1234567890/external_accounts';
    $this->client->addResponse('GET', $url, 'external_accounts/index-200.xml');

    $external_accounts = $account->getExternalAccounts($this->client);
    $this->assertInstanceOf('Recurly_ExternalAccountList', $external_accounts);
    $this->assertEquals($url, $external_accounts->getHref());

    $external_account = $external_accounts->current();
    $this->assertInstanceOf('Recurly_ExternalAccount', $external_account);
    $this->assertEquals($external_account->external_connection_type, 'GooglePlayStore');
    $this->assertEquals($external_account->external_account_code, 'abcd');
  }
}
