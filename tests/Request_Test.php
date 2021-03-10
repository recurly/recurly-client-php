<?php

use Recurly\Request;

final class RequestTest extends RecurlyTestCase
{
    protected function setUp(): void
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

    public function testGetHeaders()
    {
        $headers = $this->request->getHeaders();
        // All core headers are present
        foreach ($this->options['core_headers'] as $key => $value) {
            $this->assertArrayHasKey($key, $headers);
            $this->assertEquals($value, $headers[$key], 'core header overwritten');
        }
        // All custom headers, excluding core headers, are present
        foreach ($this->options['headers'] as $key => $value) {
            if (!array_key_exists($key, $this->options['core_headers'])) {
                $this->assertArrayHasKey($key, $headers);
                $this->assertEquals($value, $headers[$key]);
            }
        }
    }

}