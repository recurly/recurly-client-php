<?php

use Recurly\Page;
use Recurly\Resources\TestResource;
use Recurly\BaseClient;
use Recurly\Utils;

class MockClient extends BaseClient
{
    protected function apiVersion(): string
    {
        return "v2999-01-01";
    }

    public function getResource(string $resource_id): TestResource
    {
        $path = $this->interpolatePath("/resources/{resource_id}", ['resource_id' => $resource_id]);
        return $this->makeRequest('GET', $path, null, null);
    }

    public static function create()
    {
        $client = new MockClient("apikey"); 
        $http = Mockery::mock();

        // mock getResource 200 OK
        $url = "https://v3.recurly.com/resources/iexist";
        $result = '{"id": "iexist", "object": "test_resource"}';
        $resp_header = self::_generateRespHeader("200 OK");
        $http->allows()->execute(
            "GET", $url, NULL, self::_expectedHeaders())->andReturns(array($result, $resp_header));

        // mock getResource 404 Not Found
        $url = "https://v3.recurly.com/resources/idontexist";
        $result = "{\"error\":{\"type\":\"not_found\",\"message\":\"Couldn't find Resource with id = idontexist\",\"params\":[{\"param\":\"resource_id\"}]}}";
        $resp_header = self::_generateRespHeader("404 Not Found");
        $http->allows()->execute(
            "GET", $url, NULL, self::_expectedHeaders())->andReturns(array($result, $resp_header));

        $client->_http = $http;
        return $client;
    }

    private static function _generateRespHeader($status): array
    {
        return [
            "HTTP/1.1 $status",
            "Date: Wed, 19 Feb 2020 17:52:05 GMT",
            "Content-Type: application/json; charset=utf-8",
            "Recurly-Version: recurly.v2019-10-10",
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
        $auth_token = Utils::encodeApiKey("apikey");
        $agent = Utils::getUserAgent();
        return [
            "User-Agent" => $agent,
            "Authorization" => "Basic {$auth_token}",
            "Accept" => "application/vnd.recurly.v2999-01-01",
            "Content-Type" => "application/json",
        ];
    }
}
