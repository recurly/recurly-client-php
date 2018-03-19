<?php


class Recurly_InvoiceListTest extends Recurly_TestCase
{
  public function testGetPending() {
    $params = array('other' => 'pickles');
    $url = '/invoices?other=pickles&state=pending';
    $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

    $invoices = Recurly_InvoiceList::getPending($params, $this->client);
    $this->assertInstanceOf('Recurly_InvoiceList', $invoices);
    $this->assertEquals($url, $invoices->getHref());
  }

  public function testGetPaid() {
    $params = array('other' => 'pickles');
    $url = '/invoices?other=pickles&state=paid';
    $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

    $invoices = Recurly_InvoiceList::getPaid($params, $this->client);
    $this->assertInstanceOf('Recurly_InvoiceList', $invoices);
    $this->assertEquals($url, $invoices->getHref());
  }

  public function testGetFailed() {
    $params = array('other' => 'pickles');
    $url = '/invoices?other=pickles&state=failed';
    $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

    $invoices = Recurly_InvoiceList::getFailed($params, $this->client);
    $this->assertInstanceOf('Recurly_InvoiceList', $invoices);
    $this->assertEquals($url, $invoices->getHref());
  }

  public function testGetPastDue() {
    $params = array('other' => 'pickles');
    $url = '/invoices?other=pickles&state=past_due';
    $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

    $invoices = Recurly_InvoiceList::getPastDue($params, $this->client);
    $this->assertInstanceOf('Recurly_InvoiceList', $invoices);
    $this->assertEquals($url, $invoices->getHref());
  }
}
