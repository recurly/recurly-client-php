<?php

use Recurly\Pager;

final class PagerTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->count = 3;
        $client_stub = $this->createMock(\Recurly\BaseClient::class);
        $client_stub->method('nextPage')->will($this->returnCallback(function($name, $params) {
            if (is_array($params) && array_key_exists('limit', $params) && $params['limit'] == 1) {
                $name = 'page_limit_1';
            }
            $json_string = $this->fixtures->loadJsonFixture($name, ['type' => 'string']);
            $response = new \Recurly\Response($json_string);
            $response->setHeaders(array(
                'HTTP/1.1 200 OK',
                "Recurly-Total-Records: {$this->count}"
            ));
            return $response->toResource();
        }));
        $client_stub->method('pagerCount')->will($this->returnCallback(function($name, $params) {
            $response = new \Recurly\Response('');
            $response->setHeaders(array(
                'HTTP/1.1 200 OK',
                "Recurly-Total-Records: {$this->count}"
            ));
            return $response;
        }));

        $this->pager = new \Recurly\Pager($client_stub, 'page_one');
    }

    public function testGetResponse(): void
    {
        $this->pager->rewind();
        $this->assertInstanceOf(\Recurly\Response::class, $this->pager->getResponse());
    }

    public function testGetFirst(): void
    {
        $this->assertInstanceOf(
            \Recurly\Resources\TestResource::class,
            $this->pager->getFirst()
        );
    }

    public function testGetFirstNoResults(): void
    {
        $json_string = $this->fixtures->loadJsonFixture('page_limit_1_empty', ['type' => 'string']);
        $response = new \Recurly\Response($json_string);
        $response->setHeaders(array('HTTP/1.1 200 OK'));
        $client_stub = $this->createMock(\Recurly\BaseClient::class);
        $client_stub->method('nextPage')->willReturn($response->toResource());
        $pager = new \Recurly\Pager($client_stub, 'page_one');

        $this->assertNull($pager->getFirst());
    }

    public function testGetCount(): void
    {
        $this->assertEquals($this->count, $this->pager->getCount());
    }

    public function testGetResponseChanges(): void
    {
        $this->pager->rewind(); // Loads first page (2 items)
        $response_one = $this->pager->getResponse();
        $this->pager->current(); // Steps page cursor
        $this->assertSame($response_one, $this->pager->getResponse());
        $this->pager->current(); // Steps page cursor
        $this->pager->valid(); // Page one complete so page two is requested
        $response_two = $this->pager->getResponse();
        $this->assertNotSame($response_one, $response_two);
    }

    public function testIteration(): void
    {
        $count = 0;
        foreach($this->pager as $resource) {
            $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $resource);
            $count++;
        }
        $this->assertEquals(3, $count);
    }

    public function testMultipleIterations(): void
    {
        $count = 0;
        foreach($this->pager as $resource) {
            $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $resource);
            $count++;
        }
        foreach($this->pager as $resource) {
            $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $resource);
            $count++;
        }
        $this->assertEquals(6, $count);
    }
}