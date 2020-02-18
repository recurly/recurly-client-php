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
        $test_resource = (object)array(
            "object" => "test_resource",
            "name" => "test-resource",
            "single_child" => (object)array(
                "name" => "child-test-resource"
            ),
            "resource_array" => [
                (object)array( "name" => "child-test-resource" )
            ],
            "string_array" => [
                "string-one",
                "string-two",
            ]
        );

        $response = new \Recurly\Response(json_encode($test_resource));
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $result = RecurlyResource::fromResponse($response);
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $result);
        $this->assertEquals($response, $result->getResponse());
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $result->getSingleChild());
    }

    public function testFromJsonUnknownKeys(): void
    {
        $test_resource = (object)array(
            "object" => "test_resource",
            "name" => "test-resource",
            "unknown_key" => "unknown-key"
        );

        $response = new \Recurly\Response(json_encode($test_resource));
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $result = RecurlyResource::fromResponse($response);
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $result);
    }

    //public function testFromJsonInvalidResource(): void
    //{
    //    $data = (object)array(
    //        'object' => 'riverboat',
    //    );

    //    $this->expectError();
    //    $this->expectErrorMessage("Could not find the Recurly class for key riverboat");
    //    $response = new \Recurly\Response('');
    //    $result = RecurlyResource::fromResponse($response);
    //}

    //public function testStrictModeErrors(): void
    //{
    //    $data = (object)array(
    //        'object' => 'test_resource',
    //        'unknown-key' => 'The Unknown Key'
    //    );

    //    $this->expectError();
    //    $this->expectErrorMessage("Recurly\Resources\TestResource encountered json attribute unknown-key but it's unknown to it's schema");
    //    $response = new \Recurly\Response('');
    //    $result = RecurlyResource::fromResponse($response);
    //}

    //public function testFromJsonErrorResponse(): void
    //{
    //    $data = (object)array(
    //        "error" => (object)array(
    //            "object" => "error",
    //            "type" => "test_error",
    //            "message" => "The error message"
    //        )
    //    );

    //    $this->expectException(\Recurly\Errors\TestError::class);
    //    $this->expectExceptionMessage("The error message");
    //    $response = new \Recurly\Response(json_encode($data));
    //    $response->setHeaders(array('HTTP/1.1 200 OK'));
    //    $response->setHeaders([]);
    //    $result = $response->toResource();
    //    //$result = RecurlyResource::fromResponse($response);
    //}

    public function testFromJsonList(): void
    {
        $data = (object)array(
            'object' => 'list'
        );

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $result = RecurlyResource::fromResponse($response);
        $this->assertInstanceOf(\Recurly\Page::class, $result);
    }

    public function testFromBinary(): void
    {
        $data = 'binary file data';

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $result = RecurlyResource::fromBinary($data, $response);
        $this->assertInstanceOf(\Recurly\Resources\BinaryFile::class, $result);
        $this->assertEquals($response, $result->getResponse());
    }

    public function testFromEmpty(): void
    {
        $response = new \Recurly\Response('');
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $result = RecurlyResource::fromEmpty($response);
        $this->assertInstanceOf(\Recurly\EmptyResource::class, $result);
        $this->assertEquals($response, $result->getResponse());
    }
}