<?php

use Recurly\Pager;

final class PagerTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->client = new MockClient();

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

    public function testMapArrayParams(): void
    {
        $ids = ['id-1', 'id-2'];
        $idsCsv = join('%2C', $ids);
        $url = "https://v3.recurly.com/resources?ids=$idsCsv";
        $result = '{"object":"list","has_more":true,"next":"page_two","data":[{"object":"test_resource","name":"resource one"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $pager = new \Recurly\Pager($this->client, '/resources', ['ids' => $ids]);
        $pager->rewind();
        $this->assertInstanceOf(\Recurly\Response::class, $pager->getResponse());
    }

    public function testGetResponse(): void
    {
        $url = "https://v3.recurly.com/resources";
        $result = '{"object":"list","has_more":false,"next":null,"data":[{"object":"test_resource","name":"resource one"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $pager = new \Recurly\Pager($this->client, '/resources');
        $pager->rewind();
        $this->assertInstanceOf(\Recurly\Response::class, $pager->getResponse());
    }

    public function testGetFirst(): void
    {
        $url = "https://v3.recurly.com/resources?limit=1";
        $result = '{"object":"list","has_more":true,"next":"page_two","data":[{"object":"test_resource","name":"resource one"}]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $pager = new \Recurly\Pager($this->client, '/resources');
        $this->assertInstanceOf(
            \Recurly\Resources\TestResource::class,
            $pager->getFirst()
        );
    }

    public function testGetFirstNoResults(): void
    {
        $url = "https://v3.recurly.com/resources?limit=1";
        $result = '{"object":"list","has_more":false,"next":null,"data":[]}';
        $this->client->addScenario("GET", $url, NULL, $result, "200 OK");

        $pager = new \Recurly\Pager($this->client, '/resources');
        $this->assertNull($pager->getFirst());
    }

    public function testGetCount(): void
    {
        $url = "https://v3.recurly.com/resources";
        $this->client->addScenario("HEAD", $url, NULL, '', "200 OK", ['Recurly-Total-Records' => 3]);

        $pager = new \Recurly\Pager($this->client, '/resources');

        $this->assertEquals($this->count, $pager->getCount());
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