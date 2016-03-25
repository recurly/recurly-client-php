<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Transaction;
use Recurly\Errors\ValidationError;

class TransactionTest extends TestCase
{
    public function defaultResponses()
    {
        return array(
            array('GET', '/transactions/012345678901234567890123456789ab', 'transactions/show-200.xml'),
        );
    }

    public function testGetTransaction()
    {
        $transaction = Transaction::get('012345678901234567890123456789ab', $this->client);

        $this->assertInstanceOf('Recurly\Transaction', $transaction);
        $this->assertInstanceOf('Recurly\Stub', $transaction->account);
        $this->assertInstanceOf('Recurly\Stub', $transaction->invoice);
        $this->assertInstanceOf('Recurly\Stub', $transaction->subscription);

        $this->assertEquals($transaction->account->getHref(), 'https://api.recurly.com/v2/accounts/verena');
        $this->assertEquals($transaction->ip_address, '127.0.0.1');
    }

    public function testCreateTransactionFailed()
    {
        $this->client->addResponse('POST', '/transactions', 'transactions/create-422.xml');

        $transaction = new Transaction(null, $this->client);

        try {
            $transaction->create();
            $this->fail('Expected ValidationError');
        } catch (ValidationError $e) {
            $this->assertEquals($e->getMessage(), 'Your card number is not valid. Please update your card number.');
            $this->assertInstanceOf('Recurly\Errors\TransactionError', $e->errors[0]);
            $this->assertInstanceOf('Recurly\Transaction', $e->object);
        }
    }

    public function testCreateTransactionWithEmptyXMLResponse()
    {
        $this->client->addResponse('POST', '/transactions', 'transactions/empty.xml');

        $transaction = new Transaction(null, $this->client);
        $transaction->create();
    }

    public function testRefundTransactionPartial()
    {
        $this->client->addResponse('DELETE',
            'https://api.recurly.com/v2/transactions/abcdef1234567890?amount_in_cents=100',
            'transactions/refund-202.xml');

        $transaction = Transaction::get('012345678901234567890123456789ab', $this->client);
        $transaction->refund(100);
        $this->assertEquals($transaction->status, 'voided');
    }

    public function testRefundTransactionFull()
    {
        $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/transactions/abcdef1234567890',
            'transactions/refund-202.xml');

        $transaction = Transaction::get('012345678901234567890123456789ab', $this->client);
        $transaction->refund();
        $this->assertEquals($transaction->status, 'voided');
    }

    public function testGetFailedTransaction()
    {
        // GET response is "200 OK", yet transaction had an error
        $this->client->addResponse('GET', '/transactions/012345678901234567890123456789ab',
            'transactions/show-200-error.xml');

        $transaction = Transaction::get('012345678901234567890123456789ab', $this->client);
        $this->assertInstanceOf('Recurly\Transaction', $transaction);
        $this->assertInstanceOf('Recurly\Errors\TransactionError', $transaction->transaction_error);
        $this->assertEquals('invalid_card_number', $transaction->transaction_error->error_code);
        $this->assertEquals('hard', $transaction->transaction_error->error_category);
        $this->assertEquals('The credit card number is not valid. The customer needs to try a different number.',
            $transaction->transaction_error->merchant_message);
        $this->assertEquals('Your card number is not valid. Please update your card number.',
            $transaction->transaction_error->customer_message);
        $this->assertEquals('123', $transaction->transaction_error->gateway_error_code);
    }
}
