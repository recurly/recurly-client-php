<?php

use Recurly\Page;
use Recurly\Resources\TestResource;
use Recurly\BaseClient;
use Recurly\Utils;
use PHPUnit\Framework\MockObject\Generator;
use Recurly\HttpAdapter;

class MockClient extends BaseClient
{
    use Recurly\RecurlyTraits;

    public function __construct()
    {
        parent::__construct("apikey");
        $this->_http = (new Generator())->getMock(HttpAdapter::class);
    }

    protected function apiVersion(): string
    {
        return "v2999-01-01";
    }

    public function listResources(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/resources", []);
        return new \Recurly\Pager($this, $path, $options);
    }

    public function getResource(string $resource_id): TestResource
    {
        $path = $this->interpolatePath("/resources/{resource_id}", ['resource_id' => $resource_id]);
        return $this->makeRequest('GET', $path, null, null);
    }

    public function createResource(array $body): TestResource
    {
        $path = $this->interpolatePath("/resources/", []);
        return $this->makeRequest('POST', $path, $body, null);
    }

    public function updateResource(string $resource_id, array $body): TestResource
    {
        $path = $this->interpolatePath("/resources/{resource_id}", ['resource_id' => $resource_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }

    public function deleteResource(string $resource_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/resources/{resource_id}", ['resource_id' => $resource_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }

    public function addScenario($method, $url, $body, $result, $status): void
    {
        $resp_header = self::_generateRespHeader($status);
        $this->_http->method('execute')->with(
            $method,
            $url,
            $body,
            self::_expectedHeaders()
            )->willReturn(array($result, $resp_header));
    }

    public function clearScenarios(): void
    {
        $this->_http = (new Generator())->getMock(HttpAdapter::class);
    }

    private static function _generateRespHeader($status): array
    {
        return [
            "HTTP/1.1 $status",
            "Date: Wed, 19 Feb 2020 17:52:05 GMT",
            "Content-Type: application/json; charset=utf-8",
            "Recurly-Version: recurly.v2999-01-01",
            "X-RateLimit-Limit: 2000",
            "X-RateLimit-Remaining: 1996",
            "X-RateLimit-Reset: 1582135020",
            //"ETag: W/"9fa8e3452e9d6369c2c88004b3de81b4""
            //"Cache-Control: max-age=0, private, must-revalidate"
            "X-Request-Id: 567a17af7875e3ba-ATL",
            //"CF-Cache-Status: DYNAMIC",
            //"Expect-CT: max-age=604800, report-uri="https://report-uri.cloudflare.com/cdn-cgi/beacon/expect-ct""
            //"Strict-Transport-Security: max-age=15552000; includeSubDomains; preload"
            "Server: cloudflare",
            "CF-RAY: 567a17af7875e3ba-ATL"
        ];
    }

    private static function _expectedHeaders(): array
    {
        $auth_token = self::encodeApiKey("apikey");
        $agent = self::getUserAgent();
        return [
            "User-Agent" => $agent,
            "Authorization" => "Basic {$auth_token}",
            "Accept" => "application/vnd.recurly.v2999-01-01",
            "Content-Type" => "application/json",
        ];
    }
}
