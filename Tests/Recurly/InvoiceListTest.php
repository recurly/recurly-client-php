<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\InvoiceList;

class InvoiceListTest extends TestCase
{
    public function testGetOpen()
    {
        $params = array('other' => 'pickles');
        $url = '/invoices?other=pickles&state=open';
        $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

        $invoices = InvoiceList::getOpen($params, $this->client);
        $this->assertInstanceOf('Recurly\InvoiceList', $invoices);
        $this->assertEquals($url, $invoices->getHref());
    }

    public function testGetCollected()
    {
        $params = array('other' => 'pickles');
        $url = '/invoices?other=pickles&state=collected';
        $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

        $invoices = InvoiceList::getCollected($params, $this->client);
        $this->assertInstanceOf('Recurly\InvoiceList', $invoices);
        $this->assertEquals($url, $invoices->getHref());
    }

    public function testGetFailed()
    {
        $params = array('other' => 'pickles');
        $url = '/invoices?other=pickles&state=failed';
        $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

        $invoices = InvoiceList::getFailed($params, $this->client);
        $this->assertInstanceOf('Recurly\InvoiceList', $invoices);
        $this->assertEquals($url, $invoices->getHref());
    }

    public function testGetPastDue()
    {
        $params = array('other' => 'pickles');
        $url = '/invoices?other=pickles&state=past_due';
        $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

        $invoices = InvoiceList::getPastDue($params, $this->client);
        $this->assertInstanceOf('Recurly\InvoiceList', $invoices);
        $this->assertEquals($url, $invoices->getHref());
    }
}
