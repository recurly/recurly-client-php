<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\AccountList;

class AccountListTest extends TestCase
{
    public function defaultResponses()
    {
        return array(
            array('GET', '/accounts', 'accounts/index-200.xml'),
        );
    }

    public function testLoad()
    {
        $accounts = AccountList::get(null, $this->client);

        $this->assertInstanceOf('Recurly\AccountList', $accounts);
        $this->assertEquals('/accounts', $accounts->getHref());
        $this->assertEquals(42, $accounts->count());
    }

    public function testGetActive()
    {
        $params = array('other' => 'pickles');
        $url = '/accounts?other=pickles&state=active';
        $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

        $accounts = AccountList::getActive($params, $this->client);
        $this->assertInstanceOf('Recurly\AccountList', $accounts);
        $this->assertEquals($url, $accounts->getHref());
    }

    public function testGetClosed()
    {
        $params = array('other' => 'pickles');
        $url = '/accounts?other=pickles&state=closed';
        $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

        $accounts = AccountList::getClosed($params, $this->client);
        $this->assertInstanceOf('Recurly\AccountList', $accounts);
        $this->assertEquals($url, $accounts->getHref());
    }

    public function testGetPastDue()
    {
        $params = array('other' => 'pickles');
        $url = '/accounts?other=pickles&state=past_due';
        $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

        $accounts = AccountList::getPastDue($params, $this->client);
        $this->assertInstanceOf('Recurly\AccountList', $accounts);
        $this->assertEquals($url, $accounts->getHref());
    }
}
