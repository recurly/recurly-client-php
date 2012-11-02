<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\TransactionList;

class TransactionListTest extends TestCase
{
    public function testGetSuccessful()
    {
        $params = array('other' => 'pickles');
        $url = '/transactions?other=pickles&state=successful';
        $this->client->addResponse('GET', $url, 'transactions/index-200.xml');

        $transactions = TransactionList::getSuccessful($params, $this->client);
        $this->assertInstanceOf('Recurly\TransactionList', $transactions);
        $this->assertEquals($url, $transactions->getHref());
    }

    public function testGetVoided()
    {
        $params = array('other' => 'pickles');
        $url = '/transactions?other=pickles&state=voided';
        $this->client->addResponse('GET', $url, 'transactions/index-200.xml');

        $transactions = TransactionList::getVoided($params, $this->client);
        $this->assertInstanceOf('Recurly\TransactionList', $transactions);
        $this->assertEquals($url, $transactions->getHref());
    }
}
