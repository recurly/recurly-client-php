<?php

use Recurly\Request;

final class RequestTest extends RecurlyTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $account_create = $this->fixtures->loadJsonFixture('account_create', ['type' => 'array']);
        $this->method = 'GET';
        $this->url = 'https://v3.recurly.com/accounts';
        $this->body = $account_create;
        $this->params = [
            'param-1' => 'param-1-value'
        ];
        $this->headers = [
            'header-1' => 'header-1-value'
        ];
        $this->request = new Request(
            $this->method,
            $this->url,
            $this->body,
            $this->params,
            $this->headers
        );
    }

    public function testGetMethod()
    {
        $this->assertEquals(
            $this->method,
            $this->request->getMethod()
        );
    }

    public function testGetPath()
    {
        $this->assertEquals(
            $this->url,
            $this->request->getUrl()
        );
    }

    public function testGetBody()
    {
        $this->assertEquals(
            $this->body,
            $this->request->getBody()
        );
    }

    public function testGetParams()
    {
        $this->assertEquals(
            $this->params,
            $this->request->getParams()
        );
    }

    public function testGetHeaders()
    {
        $this->assertEquals(
            $this->headers,
            $this->request->getHeaders()
        );
    }

}