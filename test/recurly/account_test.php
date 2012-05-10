<?php

class Recurly_AccountTest extends UnitTestCase
{
  public function testGetAccount()
  {
    $responseFixture = loadFixture('./fixtures/accounts/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/accounts/abcdef1234567890'));

    $account = Recurly_Account::get('abcdef1234567890', $client);

    $this->assertIsA($account, 'Recurly_Account');
    $this->assertEqual($account->account_code, 'abcdef1234567890');
    $this->assertEqual($account->email, 'larry.david@example.com');
    $this->assertEqual($account->first_name, 'Larry');
    $this->assertEqual($account->created_at->getTimestamp(), 1304164800);
    $this->assertEqual($account->getHref(),'https://api.recurly.com/v2/accounts/abcdef1234567890');
  }

  public function testUpdateError()
  {
    $responseFixture = loadFixture('./fixtures/accounts/show-200.xml');
    $updateErrFixture = loadFixture('./fixtures/accounts/update-422.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/accounts/abcdef1234567890'));
    $client->returns('request', $updateErrFixture, array('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890', "<?xml version=\"1.0\"?>\n<account><email>invalidemail.com</email></account>\n"));

    $account = Recurly_Account::get('abcdef1234567890', $client);
    $account->email = 'invalidemail.com';

    try {
      $account->update();
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->pass("Received Recurly_ValidationError");
    }

    $this->assertIsA($account, 'Recurly_Account');
    $this->assertIsA($account->errors[0], 'Recurly_FieldError');
    $this->assertEqual($account->errors[0]->field, 'email');
    $this->assertEqual($account->errors[0]->symbol, 'invalid_email');
    $this->assertEqual($account->errors[0]->description, 'is not a valid email address');
  }

  public function testXml()
  {
    $account = new Recurly_Account();
    $account->account_code = 'act123';
    $account->first_name = 'Verena';

    $xml = $account->xml();
    $this->assertEqual($xml,
      "<?xml version=\"1.0\"?>\n<account><account_code>act123</account_code><first_name>Verena</first_name></account>\n");
  }
}
