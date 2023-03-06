<?php

use PHPUnit\Framework\TestCase;
use Recurly\Response;

final class ResponseTest extends RecurlyTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpRequest();
    }

    public function testNullHeaders(): void
    {
        $response = new Response('', $this->request);
        $response->setHeaders(null);
        $this->assertEquals(
            400,
            $response->getStatusCode()
        );
    }

    public function testStatusCode(): void
    {
        $response = new Response('', $this->request);
        $status_code = 201;
        $status = "HTTP/1.1 {$status_code} Created";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            $status
        ]);
        $this->assertEquals(
            $status_code,
            $response->getStatusCode()
        );
    }

    public function testRequestIdHeader(): void
    {
        $response = new Response('', $this->request);
        $request_id = bin2hex(random_bytes(10));
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "X-Request-Id: {$request_id}"
        ]);
        $this->assertEquals(
            $request_id,
            $response->getRequestId()
        );
    }

    public function testRateLimitHeader(): void
    {
        $response = new Response('', $this->request);
        $rate_limit = "2000";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "X-RateLimit-Limit: {$rate_limit}"
        ]);
        $this->assertEquals(
            $rate_limit,
            $response->getRateLimit()
        );
    }

    public function testRateLimitRemainingHeader(): void
    {
        $response = new Response('', $this->request);
        $rate_limit_remaining = "300";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "X-RateLimit-Remaining: {$rate_limit_remaining}"
        ]);
        $this->assertEquals(
            $rate_limit_remaining,
            $response->getRateLimitRemaining()
        );
    }

    public function testRateLimitResetHeader(): void
    {
        $response = new Response('', $this->request);
        $rate_limit_reset = "1576791240";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "X-RateLimit-Reset: {$rate_limit_reset}"
        ]);
        $this->assertEquals(
            $rate_limit_reset,
            $response->getRateLimitReset()
        );
    }

    public function testContentTypeHeaderSimple(): void
    {
        $response = new Response('', $this->request);
        $content_type = "application/json";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "Content-Type: {$content_type}"
        ]);
        $this->assertEquals(
            $content_type,
            $response->getContentType()
        );
    }

    public function testContentTypeHeaderMultiPart(): void
    {
        $response = new Response('', $this->request);
        $content_type = "application/json";
        $charset = "charset=utf-8";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "Content-Type: {$content_type}; {$charset}"
        ]);
        $this->assertEquals(
            $content_type,
            $response->getContentType()
        );
    }

    public function testRecordCountHeader(): void
    {
        $count = 325;
        $response = new Response('', $this->request);
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "Recurly-Total-Records: $count"
        ]);
        $this->assertEquals(
            $count,
            $response->getRecordCount()
        );
    }

    public function testToResourceBinary(): void
    {
        $data = 'binary file data';

        $response = new Response($data, $this->request);
        $content_type = "application/pdf";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "Content-Type: {$content_type}"
        ]);
        $result = $response->toResource();
        $this->assertInstanceOf(\Recurly\Resources\BinaryFile::class, $result);
    }

    public function testToResourceJson(): void
    {
        $account = (object)[
            'object' => 'account',
            'first_name' => 'Douglas',
            'last_name' => 'DuMonde'
        ];

        $response = new Response(json_encode($account), $this->request);
        $content_type = "application/json";
        $response->setHeaders([
            'HTTP/1.1 200 OK',
            "Content-Type: {$content_type}"
        ]);
        $result = $response->toResource();
        $this->assertInstanceOf(\Recurly\Resources\Account::class, $result);
    }

    public function testToResourceEmpty(): void
    {
        $response = new Response('', $this->request);
        $response->setHeaders(['HTTP/1.1 200 OK']);
        $result = $response->toResource();
        $this->assertInstanceOf(\Recurly\EmptyResource::class, $result);
    }

    public function testAssertValid(): void
    {
        $this->expectException(\Recurly\RecurlyError::class);
        $response = new Response('', $this->request);
        $response->setHeaders(['HTTP/1.1 403 Forbidden']);
        $result = $response->assertValid();
    }

    public function testGetRawResponse(): void
    {
        $raw_response = 'raw-response';
        $response = new Response($raw_response, $this->request);
        $this->assertEquals(
            $raw_response,
            $response->getRawResponse()
        );
    }

    public function testGetRequest(): void
    {
        $response = new Response('', $this->request);
        $this->assertEquals(
            $this->request,
            $response->getRequest()
        );
    }
}
