<?php

use Recurly\Page;
use Recurly\Resources\TestResource;
use Recurly\BaseClient;
use Recurly\Utils;

final class BaseClientTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->client = MockClient::create();
    }

    public function testGetResource200(): void
    {
        $resource = $this->client->getResource("iexist");
        $this->assertEquals($resource->getId(), "iexist");
    }

    public function testGetResource404(): void
    {
        $this->expectException(\Recurly\Errors\NotFound::class);
        $this->client->getResource("idontexist");
    }
}