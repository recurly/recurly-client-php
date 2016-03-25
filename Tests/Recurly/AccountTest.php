<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Account;
use Recurly\Errors\ValidationError;
use Recurly\BillingInfo;

class AccountTest extends TestCase
{
    public function defaultResponses()
    {
        return array(
            array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml'),
        );
    }

    public function testGetAccount()
    {
        $account = Account::get('abcdef1234567890', $this->client);

        $this->assertInstanceOf('Recurly\Account', $account);
        $this->assertEquals($account->account_code, 'abcdef1234567890');
        $this->assertEquals($account->email, 'larry.david@example.com');
        $this->assertEquals($account->first_name, 'Larry');
        $this->assertEquals($account->vat_number, 'ST-1937');
        $this->assertInstanceOf('Recurly\Address', $account->address);
        $this->assertEquals($account->address->address1, '123 Main St.');
        $this->assertEquals($account->address->address2, 'APT #6');
        $this->assertEquals($account->address->state, 'CA');
        $this->assertEquals($account->address->zip, '94105');
        $this->assertEquals($account->address->city, 'San Francisco');
        $this->assertEquals($account->address->country, 'US');
        $this->assertEquals($account->created_at->getTimestamp(), 1304164800);
        $this->assertEquals($account->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890');
        $this->assertTrue($account->tax_exempt);
        $this->assertEquals($account->entity_use_code, 'I');
        $this->assertEquals($account->vat_location_valid, true);
        $this->assertEquals($account->cc_emails, 'cheryl.hines@example.com,richard.lewis@example.com');
    }

    public function testCloseAccount()
    {
        $this->client->addResponse('DELETE', '/accounts/abcdef1234567890', 'accounts/destroy-204.xml');

        Account::closeAccount('abcdef1234567890', $this->client);
    }

    public function testClose()
    {
        $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890',
            'accounts/destroy-204.xml');

        $account = Account::get('abcdef1234567890', $this->client);
        $account->close();
        $this->assertEquals('closed', $account->state);
    }

    public function testReopenAccount()
    {
        $this->client->addResponse('PUT', '/accounts/abcdef1234567890/reopen', 'accounts/reopen-200.xml');

        $account = Account::reopenAccount('abcdef1234567890', $this->client);
        $this->assertInstanceOf('Recurly\Account', $account);
        $this->assertEquals('active', $account->state);
    }

    public function testReopen()
    {
        $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890/reopen',
            'accounts/reopen-200.xml');

        $account = Account::get('abcdef1234567890', $this->client);
        $account->reopen();
        $this->assertEquals('active', $account->state);
    }

    public function testUpdateError()
    {
        $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890',
            'accounts/update-422.xml');

        $account = Account::get('abcdef1234567890', $this->client);
        $account->email = 'invalidemail.com';

        try {
            $account->update();
            $this->fail('Expected ValidationError');
        } catch (ValidationError $e) {
            $this->assertEquals('Email is not a valid email address.', $e->getMessage());
        }

        $this->assertInstanceOf('Recurly\Account', $account);
        $this->assertInstanceOf('Recurly\Errors\FieldError', $account->errors[0]);
        $this->assertEquals('email', $account->errors[0]->field);
        $this->assertEquals('invalid_email', $account->errors[0]->symbol);
        $this->assertEquals('is not a valid email address', $account->errors[0]->description);
    }

    public function testXml()
    {
        $account = new Account();
        $account->account_code = 'act123';
        $account->first_name = 'Verena';
        $account->address->address1 = '123 Main St.';
        $account->tax_exempt = false;
        $account->entity_use_code = 'I';

        $this->assertEquals(
            "<?xml version=\"1.0\"?>\n<account><account_code>act123</account_code><first_name>Verena</first_name><address><address1>123 Main St.</address1></address><tax_exempt>false</tax_exempt><entity_use_code>I</entity_use_code></account>\n",
            $account->xml()
        );
    }

    /**
     * Test that updates to nested objects like account addresses are detected
     * when generating XML to send.
     */
    public function testNestedAddress()
    {
        $account = Account::get('abcdef1234567890', $this->client);
        $account->address->address1 = '987 Alternate St.';
        $this->assertEquals(
            "<?xml version=\"1.0\"?>\n<account><address><address1>987 Alternate St.</address1></address></account>\n",
            $account->xml()
        );
    }

    public function testCreate()
    {
        $this->client->addResponse('POST', '/accounts', 'accounts/create-201.xml');

        $account = new Account(null, $this->client);
        $account->account_code = 'abcdef1234567890';

        $account->create();

        $this->assertInstanceOf('Recurly\Account', $account);
    }

    public function testCreateWithBillingInfoToken()
    {
        $this->client->addResponse('POST', '/accounts', 'accounts/create-201.xml');

        $account = new Account(null, $this->client);
        $account->account_code = 'abcdef1234567890';
        $account->billing_info = new BillingInfo();
        $account->billing_info->token_id = 'abc123';

        $account->create();

        $this->assertInstanceOf('Recurly\Account', $account);
    }
}
