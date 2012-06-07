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

  public function testCreateTransactionFailed()
  {
    $responseFixture = loadFixture('./fixtures/transactions/create-422.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    $transaction = new Recurly_Transaction(null, $client);

    try {
      $transaction->create();
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->pass("Received Recurly_ValidationError");
      $this->assertEqual($e->getMessage(), 'Your card number is not valid. Please update your card number.');
      $this->assertIsA($e->errors[0], 'Recurly_TransactionError');
      $this->assertIsA($e->object, 'Recurly_Transaction');
    }
  }

  public function testRefundTransaction()
  {
    $responseFixture = loadFixture('./fixtures/transactions/refund-202.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('DELETE', '/transactions/012345678901234567890123456789ab'));

    $transaction = new Recurly_Transaction(null, $client);
    $transaction->uuid = '012345678901234567890123456789ab';
    $transaction->refund();
    $this->assertEqual($transaction->status, 'voided');
  }

  public function testGetFailedTransaction()
  {
    // GET response is "200 OK", yet transaction had an error
    $responseFixture = loadFixture('./fixtures/transactions/show-200-error.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/transactions/012345678901234567890123456789ab'));

    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $client);

    $this->assertIsA($transaction, 'Recurly_Transaction');
    $this->assertIsA($transaction->transaction_error, 'Recurly_TransactionError');
  }
}
