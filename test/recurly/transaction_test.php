<?php

class Recurly_TransactionTest extends UnitTestCase
{
  public function testGetTransaction()
  {
    $responseFixture = loadFixture('./fixtures/transactions/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/transactions/012345678901234567890123456789ab'));

    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $client);

    $this->assertIsA($transaction, 'Recurly_Transaction');
    $this->assertIsA($transaction->account, 'Recurly_Stub');
    $this->assertEqual($transaction->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');
  }
  
  public function testFailedTransaction()
  {
    $responseFixture = loadFixture('./fixtures/transactions/create-422.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/transactions/012345678901234567890123456789ab'));

    $transaction_errors = Recurly_Transaction::get('012345678901234567890123456789ab', $client);

    $this->assertIsA($transaction_errors, 'Recurly_ErrorList');
    $this->assertIsA($transaction_errors->transaction, 'Recurly_Transaction');
    $this->assertIsA($transaction_errors->transaction_error, 'Recurly_TransactionError');
    $this->assertEqual($transaction_errors->transaction->getHref(), 'https://api.recurly.com/v2/transactions/abcdef1234567890');
  }
}
