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
        $this->options = [
            'params' => [
                'param-1' => 1,
                'param-2' => 'Param 2',
            ],
            'headers' => [
                'header-1' => 'Header 1',
                'header-2' => 'Header 2',
            ]
        ];
        $this->request = new Request(
            $this->method,
            $this->path,
            $this->body,
            $this->options
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
            $this->options['params'],
            $this->request->getParams()
        );
    }

    public function testGetCustomHeaders()
    {
        $this->assertEquals(
            $this->options['headers'],
            $this->request->getCustomHeaders()
        );
    }

    public function testGetOptions()
    {
        $this->assertEquals(
            $this->options,
            $this->request->getOptions()
        );
    }

}