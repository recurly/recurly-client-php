<?php


class Recurly_ExternalAccountTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml')
    );
  }

  protected function mockExternalAccount() {
    $ea = new Recurly_ExternalAccount();
    $ea->external_account_code = "code";
    $ea->external_connection_type = "GooglePlayStore";

    return $ea;
  }

  public function testGetExternalAccount() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890/external_accounts/sd28t3zdm59p', 'external_accounts/show-200.xml');
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $external_account = $account->getExternalAccount('sd28t3zdm59p', $this->client);
    $this->assertInstanceOf('Recurly_ExternalAccount', $external_account);
    $this->assertEquals($external_account->external_account_code, '69c46a20-a9f6-4116-ad11-760fdf58d26a');
    $this->assertEquals($external_account->external_connection_type, 'AppleAppStore');
    $this->assertInstanceOf('DateTime', $external_account->created_at);
    $this->assertInstanceOf('DateTime', $external_account->updated_at);
  }

  public function testCreateExternalAccountOnAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/accounts/abcdef1234567890/external_accounts', 'external_accounts/create-201.xml');

    $ea = $this->mockExternalAccount();

    $account->createExternalAccount($ea, $this->client);

    $this->assertEquals($ea->external_account_code, '69c46a20-a9f6-4116-ad11-760fdf58d26a');
  }

  public function testUpdateExternalAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->client->addResponse('GET', '/accounts/abcdef1234567890/external_accounts', 'external_accounts/index-200.xml');
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890/external_accounts/sd28t3zdm59r', 'external_accounts/update-200.xml');

    $external_accounts = $account->getExternalAccounts($this->client);

    foreach ($external_accounts as $external_account)  {
      if ($external_account->external_connection_type == 'GooglePlayStore') {
        $external_account->external_account_code = 'efgh';
        $external_account->update();
        $this->assertEquals($external_account->external_account_code, 'efgh');
      }
    }
  }

  public function testDeleteExternalAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->client->addResponse('GET', '/accounts/abcdef1234567890/external_accounts/sd28t3zdm59p', 'external_accounts/show-200.xml');
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/external_accounts/sd28t3zdm59p', 'external_accounts/destroy-204.xml');

    $external_account = $account->getExternalAccount('sd28t3zdm59p', $this->client);
    $response = $external_account->delete();
    $this->assertNull($response);
  }
}
