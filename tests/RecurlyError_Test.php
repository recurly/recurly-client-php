<?php

final class RecurlyErrorTest extends RecurlyTestCase
{
    public function testFromResponseGenericJsonServerError(): void
    {
        $data = array(
            "error" => array(
                "object" => "error",
                "type" => "unknown_type",
                "message" => "The error message"
            )
        );

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array(
            'HTTP/1.1 500 Internal Server Error',
            'Content-Type: application/json',
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertEquals(
            \Recurly\Errors\ServerError::class,
            get_class($result)
        );
    }

    public function testFromResponseGenericJsonClientError(): void
    {
        $data = array(
            "error" => array(
                "object" => "error",
                "type" => "unknown_type",
                "message" => "The error message"
            )
        );

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array(
            'HTTP/1.1 404 Not Found',
            'Content-Type: application/json',
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertEquals(
            \Recurly\Errors\ClientError::class,
            get_class($result)
        );
    }

    public function testFromResponseGenericJsonError(): void
    {
        $data = array(
            "error" => array(
                "object" => "error",
                "type" => "unknown_type",
                "message" => "The error message"
            )
        );

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array(
            'HTTP/1.1 100 Continue',
            'Content-Type: application/json',
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertEquals(
            \Recurly\RecurlyError::class,
            get_class($result)
        );
    }

    public function testFromResponseForbiddenError(): void
    {
        $response = new \Recurly\Response('forbidden error');
        $response->setHeaders(array(
            'HTTP/1.1 403 Forbidden',
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertEquals(
            \Recurly\Errors\Forbidden::class,
            get_class($result)
        );
    }

    public function testFromResponseUnknownError(): void
    {
        $response = new \Recurly\Response('what is this???');
        $response->setHeaders(array(
            'HTTP/1.1 100 Continue',
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertEquals(
            \Recurly\RecurlyError::class,
            get_class($result)
        );
    }

    public function testApiErrorClass(): void
    {
        $data = array(
            "error" => array(
                "object" => "error",
                "type" => "test_error",
                "message" => "The error message"
            )
        );

        $response = new \Recurly\Response(json_encode($data));
        $response->setHeaders(array(
            'HTTP/1.1 500 Internal Server Error',
            'Content-Type: application/json'
        ));
        $result = \Recurly\RecurlyError::fromResponse($response);
        $this->assertInstanceOf(
            \Recurly\Resources\ErrorMayHaveTransaction::class,
            $result->getApiError()
        );
    }
}