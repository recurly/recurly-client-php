<?php

use Recurly\Request;

final class RequestTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpRequest();
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