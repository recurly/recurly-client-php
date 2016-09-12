<?php

class Recurly_StubTest extends Recurly_TestCase {

  public function testConstructor() {
    $href = 'http://example.com/';
    $stub = new Recurly_Stub('foo', $href, $this->client);

    $this->assertEquals($href, $stub->getHref());
  }

  public function testGet() {
    $url = 'https://api.recurly.com/v2/accounts/abcdef1234567890/invoices';
    $this->client->addResponse('GET', $url, 'invoices/index-200.xml');

    $stub = new Recurly_Stub('foo', $url, $this->client);
    $obj = $stub->get();

    $this->assertInstanceOf('Recurly_InvoiceList', $obj);
    $this->assertEquals($url, $obj->getHref());
  }

  public function testGetParams() {
    $base_url = 'https://api.recurly.com/v2/accounts/abcdef1234567890/invoices';
    $filtered_url = "{$base_url}?state=open";
    $this->client->addResponse('GET', $filtered_url, 'invoices/index-200.xml');

    $stub = new Recurly_Stub('foo', $base_url, $this->client);
    $obj = $stub->get(array('state' => 'open'));

    $this->assertInstanceOf('Recurly_InvoiceList', $obj);
    $this->assertEquals($filtered_url, $obj->getHref());
  }

}
