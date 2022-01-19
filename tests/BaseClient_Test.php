<?php

use Recurly\Page;
use Recurly\Resources\TestResource;
use Recurly\BaseClient;
use Recurly\Utils;
use Recurly\Logger;
use Psr\Log\LogLevel;

final class BaseClientTest extends RecurlyTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Using LogLevel::EMERGENCY to minimize output when running tests
        $logger = new Logger('Recurly', LogLevel::EMERGENCY);
        $this->client = new MockClient($logger);
    }

    public function tearDown(): void
    {
        $this->client->clearScenarios();
    }

    public function testDebugLoggerWarning(): void
    {
        $msg = "The Recurly logger should not be initialized";
        $msg .= "\nbeyond the level INFO. It is currently configured to emit";
        $msg .= "\nheaders and request \/ response bodies. This has the potential to leak";
        $msg .= "\nPII and other sensitive information and should never be used in production.";
        $this->expectOutputRegex('/SECURITY WARNING: ' . $msg . '/');
        $logger = new Logger('Recurly', LogLevel::DEBUG);
        $client = new MockClient($logger);
    }

    public function testDefaultLogger(): void
    {
        $client = new MockClient(NULL);
        $logger = ReflectionHelper::getProperty($client, 'Recurly\BaseClient', '_logger');
        $this->expectOutputRegex("/Recurly.warning: warning-log/");
        $logger->warning('warning-log');
    }

    public function testClientInUSRegion(): void
    {
        $client = new MockClient(NULL);
        $baseUrl = ReflectionHelper::getProperty($client, 'Recurly\BaseClient', 'baseUrl');
        $this->assertEquals($baseUrl, 'https://v3.recurly.com');
    }

    public function testClientInEURegion(): void
    {
        $client = new MockClient(NULL, ['region' => 'eu']);
        $baseUrl = ReflectionHelper::getProperty($client, 'Recurly\BaseClient', 'baseUrl');
        $this->assertEquals($baseUrl, 'https://v3.eu.recurly.com');
    }

    public function testClientInInvalidRegion(): void
    {
        $this->expectException(\Recurly\RecurlyError::class);
        $this->expectExceptionMessage('Invalid region type. Expected one of: us, eu');
        $client = new MockClient(NULL, ['region' => 'none']);
    }

    public function testParameterValidation(): void
    {
        $this->expectException(\Recurly\RecurlyError::class);
        $resource = $this->client->getResource("");
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
        $this->client->addScenario("POST", $url, json_encode($body), $result, "201 Created");
        $resource = $this->client->createResource([ "name" => "valid" ]);
        $this->assertEquals($resource->getId(), "created");
    }

    public function testCreateResource422(): void
    {
        $url = "https://v3.recurly.com/resources/";
        $result = "{\"error\":{\"type\":\"validation\",\"message\":\"Name is invalid\",\"params\":[{\"param\":\"name\",\"message\":\"is invalid\"}]}}";
        $body = [ "name" => "invalid" ];
        $this->client->addScenario("POST", $url, json_encode($body), $result, "422 Unprocessable Entity");

        $this->expectException(\Recurly\Errors\Validation::class);
        $resource = $this->client->createResource([ "name" => "invalid" ]);
    }

    public function testDeleteResource204(): void
    {
        $url = "https://v3.recurly.com/resources/iexist";
        $result = "";
        $this->client->addScenario("DELETE", $url, NULL, $result, "204 No Content");
        $empty = $this->client->deleteResource("iexist");
        $this->assertInstanceOf(\Recurly\EmptyResource::class, $empty);
    }

    public function testUpdateResource200(): void
    {
        $url = "https://v3.recurly.com/resources/iexist";
        $result = '{"id": "iexist", "object": "test_resource", "name": "newname"}';
        $body = [ "name" => "newname" ];
        $this->client->addScenario("PUT", $url, json_encode($body), $result, "200 OK");

        $resource = $this->client->updateResource("iexist", $body);
        $this->assertEquals($resource->getName(), "newname");
    }

    public function testListResources200(): void
    {
        $url = "https://v3.recurly.com/resources";
        $result = '{ "object": "list", "has_more": false, "next": null, "data": [{"id": "iexist", "object": "test_resource", "name": "newname"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $resources = $this->client->listResources();
        $count = 0;
        foreach($resources as $resource) {
            $count = $count + 1;
            $this->assertEquals($resource->getId(), "iexist");
        }
        $this->assertEquals($count, 1);
    }

    public function testListResourcesWithParams200(): void
    {
        $url = "https://v3.recurly.com/resources?limit=1";
        $result = '{ "object": "list", "has_more": false, "next": null, "data": [{"id": "iexist", "object": "test_resource", "name": "newname"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $resources = $this->client->listResources([ 'params' => [ 'limit' => 1 ] ]);
        $count = 0;
        foreach($resources as $resource) {
            $count = $count + 1;
            $this->assertEquals($resource->getId(), "iexist");
        }
        $this->assertEquals($count, 1);
    }

    public function testFormatsDateTimeBodyParameters(): void
    {
        $dateTime = new DateTime("2020-01-01 00:00:00");

        $url = "https://v3.recurly.com/resources/";
        $result = '{"id": "created", "object": "test_resource", "name": "valid"}';
        $body = [ "date_time" => $dateTime->format(\DateTime::ISO8601) ];
        $this->client->addScenario("POST", $url, json_encode($body), $result, "201 Created");
        $resource = $this->client->createResource([ "date_time" => $dateTime ]);
        $this->assertEquals($resource->getId(), "created");
    }

    public function testFormatsNestedDateTimeBodyParameters(): void
    {
        $dateTime = new DateTime("2020-01-01 00:00:00");

        $url = "https://v3.recurly.com/resources/";
        $result = '{"id": "created", "object": "test_resource", "name": "valid"}';
        $body = [
            "nested" => [
                "date_time" => $dateTime->format(\DateTime::ISO8601)
            ]
        ];
        $this->client->addScenario("POST", $url, json_encode($body), $result, "201 Created");
        $resource = $this->client->createResource([ "nested" => [ "date_time" => $dateTime ] ]);
        $this->assertEquals($resource->getId(), "created");
    }

    public function testFormatsDateTimeQueryParameters(): void
    {
        $beginTime = new DateTime("2020-01-01 00:00:00");
        $url = "https://v3.recurly.com/resources?begin_time=" . urlencode($beginTime->format(\DateTime::ISO8601));
        $result = '{ "object": "list", "has_more": false, "next": null, "data": [{"id": "iexist", "object": "test_resource", "name": "newname"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $resources = $this->client->listResources([ 'params' => [ 'begin_time' => $beginTime ] ]);
        $count = 0;
        foreach($resources as $resource) {
            $count = $count + 1;
            $this->assertEquals($resource->getId(), "iexist");
        }
        $this->assertEquals($count, 1);
    }

    public function testValidOptions(): void
    {
        $url = "https://v3.recurly.com/resources/iexist?param-1=Param+1";
        $result = '{"id": "iexist", "object": "test_resource"}';
        $headers = [
            'Accept-Language' => 'fr'
        ];
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK", [], $headers);

        $options = [
            'params' => [
                'param-1' => 'Param 1'
            ],
            'headers' => $headers
        ];

        $resource = $this->client->getResource("iexist", $options);
        $this->assertEquals($resource->getId(), "iexist");
    }

    public function testInvalidOptions(): void
    {
        $url = "https://v3.recurly.com/resources/iexist?param-1=Param+1";
        $result = '{"id": "iexist", "object": "test_resource"}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $options = [
            'param-1' => 'Param 1'
        ];

        $this->expectException(\Recurly\RecurlyError::class);
        $resource = $this->client->getResource("iexist", $options);
    }

    public function testBooleanParams(): void
    {
        $url = "https://v3.recurly.com/resources/booleans?param-1=true&param-2=false";
        $result = '{"id": "booleans", "object": "test_resource"}';
        $headers = [
            'Accept-Language' => 'fr'
        ];
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK", [], $headers);

        $options = [
            'params' => [
                'param-1' => true,
                'param-2' => false,
            ],
            'headers' => $headers
        ];

        $resource = $this->client->getResource("booleans", $options);
        $this->assertEquals($resource->getId(), "booleans");
    }
}
