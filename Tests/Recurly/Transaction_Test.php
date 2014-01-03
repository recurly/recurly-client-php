<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_TransactionTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/transactions/012345678901234567890123456789ab', 'transactions/show-200.xml'),
    );
  }

  public function testGetTransaction() {
    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $this->client);

    $this->assertInstanceOf('Recurly_Transaction', $transaction);
    $this->assertInstanceOf('Recurly_Stub', $transaction->account);
    $this->assertInstanceOf('Recurly_Stub', $transaction->invoice);
    $this->assertInstanceOf('Recurly_Stub', $transaction->subscription);

    $this->assertEquals($transaction->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');
  }

  public function testCreateTransactionFailed() {
    $this->client->addResponse('POST', '/transactions', 'transactions/create-422.xml');

    $transaction = new Recurly_Transaction(null, $this->client);

    try {
      $transaction->create();
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->assertEquals($e->getMessage(), 'Your card number is not valid. Please update your card number.');
      $this->assertInstanceOf('Recurly_TransactionError', $e->errors[0]);
      $this->assertInstanceOf('Recurly_Transaction', $e->object);
    }
  }

  public function testCreateTransactionWithEmptyXMLResponse() {
    $this->client->addResponse('POST', '/transactions', 'transactions/empty.xml');

    $transaction = new Recurly_Transaction(null, $this->client);
    $transaction->create();
  }

  public function testRefundTransactionPartial() {
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/transactions/abcdef1234567890?amount_in_cents=100', 'transactions/refund-202.xml');

    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $this->client);
    $transaction->refund(100);
    $this->assertEquals($transaction->status, 'voided');
  }

  public function testRefundTransactionFull() {
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/transactions/abcdef1234567890', 'transactions/refund-202.xml');

    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $this->client);
    $transaction->refund();
    $this->assertEquals($transaction->status, 'voided');
  }

  public function testGetFailedTransaction() {
    // GET response is "200 OK", yet transaction had an error
    $this->client->addResponse('GET', '/transactions/012345678901234567890123456789ab', 'transactions/show-200-error.xml');

    $transaction = Recurly_Transaction::get('012345678901234567890123456789ab', $this->client);
    $this->assertInstanceOf('Recurly_Transaction', $transaction);
    $this->assertInstanceOf('Recurly_TransactionError', $transaction->transaction_error);
  }
}
