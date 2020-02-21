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
        $this->client = new MockClient();
    }

    public function tearDown(): void
    {
        $this->client->clearScenarios();
    }

    public function testGetResource200(): void
    {
        $url = "https://v3.recurly.com/resources/iexist";
        $result = '{"id": "iexist", "object": "test_resource"}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $resource = $this->client->getResource("iexist");
        $this->assertEquals($resource->getId(), "iexist");
    }

    public function testGetResource404(): void
    {
        $url = "https://v3.recurly.com/resources/idontexist";
        $result = "{\"error\":{\"type\":\"not_found\",\"message\":\"Couldn't find Resource with id = idontexist\",\"params\":[{\"param\":\"resource_id\"}]}}";
        $this->client->addScenario("GET", $url, NULL, $result, "404 Not Found");

        $this->expectException(\Recurly\Errors\NotFound::class);
        $this->client->getResource("idontexist");
    }

    public function testCreateResource201(): void
    {
        $url = "https://v3.recurly.com/resources/";
        $result = '{"id": "created", "object": "test_resource", "name": "valid"}';
        $body = [ "name" => "valid" ];
        $this->client->addScenario("POST", $url, $body, $result, "201 Created");
        $resource = $this->client->createResource([ "name" => "valid" ]);
        $this->assertEquals($resource->getId(), "created");
    }

    public function testCreateResource422(): void
    {
        $url = "https://v3.recurly.com/resources/";
        $result = "{\"error\":{\"type\":\"validation\",\"message\":\"Name is invalid\",\"params\":[{\"param\":\"name\",\"message\":\"is invalid\"}]}}";
        $body = [ "name" => "invalid" ];
        $this->client->addScenario("POST", $url, $body, $result, "422 Unprocessable Entity");

        $this->expectException(\Recurly\Errors\Validation::class);
        $resource = $this->client->createResource([ "name" => "invalid" ]);
    }

    public function testDeleteResource(): void
    {
        $url = "https://v3.recurly.com/resources/iexist";
        $result = "";
        $this->client->addScenario("DELETE", $url, NULL, $result, "204 No Content");
        $empty = $this->client->deleteResource("iexist");
    }
}