<?php

use Recurly\RecurlyResource;

final class RecurlyResourceTest extends RecurlyTestCase
{
    public function testUnknownPropertyError(): void
    {
        $resource = new \Recurly\Resources\TestResource();
        $this->expectError();
        $this->expectErrorMessage("Cannot set asdf on Recurly\\Resources\\TestResource");
        $resource = new \Recurly\Resources\TestResource();
        $resource->asdf = 'asdf';
    }

    public function testFromJsonValidResource(): void
    {
        $test_resource = $this->fixtures->loadJsonFixture('test_resource', ['type' => 'object']);

        $response = new \Recurly\Response('');
        $result = RecurlyResource::fromJson($test_resource, $response);
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $result);
        $this->assertEquals($response, $result->getResponse());
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $result->getSingleChild());
    }

    public function testFromJsonInvalidResource(): void
    {
        $data = (object)array(
            'object' => 'riverboat',
        );

        $this->expectError();
        $this->expectErrorMessage("Could not find the Recurly Resource for key riverboat");
        $response = new \Recurly\Response('');
        $result = RecurlyResource::fromJson($data, $response);
    }

    public function testFromJsonList(): void
    {
        $data = (object)array(
            'object' => 'list'
        );

        $response = new \Recurly\Response('');
        $result = RecurlyResource::fromJson($data, $response);
        $this->assertInstanceOf(\Recurly\Page::class, $result);
    }

    public function testFromBinary(): void
    {
        $data = 'binary file data';

        $response = new \Recurly\Response('');
        $result = RecurlyResource::fromBinary($data, $response);
        $this->assertInstanceOf(\Recurly\Resources\BinaryFile::class, $result);
        $this->assertEquals($response, $result->getResponse());
    }
}