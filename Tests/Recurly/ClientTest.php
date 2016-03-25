<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Account;
use Recurly\Errors\UnauthorizedError;
use Recurly\Errors\ServerError;
use Recurly\Errors\ConnectionError;

class ClientTest extends TestCase
{
    public function testUnauthorizedError()
    {
        $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/unauthorized-401.xml');

        try {
            $account = Account::get('abcdef1234567890', $this->client);
            $this->fail('Expected UnauthorizedError');
        } catch (UnauthorizedError $e) {
        }
    }

    public function testServerError()
    {
        $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/server-error-500.xml');

        try {
            $account = Account::get('abcdef1234567890', $this->client);
            $this->fail('Expected ServerError');
        } catch (ServerError $e) {
        }
    }

    public function testGatweayError()
    {
        $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/gateway-unavailable-502.xml');

        try {
            $account = Account::get('abcdef1234567890', $this->client);
            $this->fail('Expected ConnectionError');
        } catch (ConnectionError $e) {
        }
    }
}
