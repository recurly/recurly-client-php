<?php

use Recurly\Request;

final class RequestTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $account_create = $this->fixtures->loadJsonFixture('account_create', ['type' => 'array']);
        $this->method = 'GET';
        $this->path = '/accounts';
        $this->body = $account_create;
        $this->params = [];
        $this->request = new Request(
            $this->method,
            $this->path,
            $this->body,
            $this->params
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
            $this->path,
            $this->request->getPath()
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

}