<?php

use PHPUnit\Framework\TestCase;
use Recurly\Response;

final class AdapterCurlTest extends TestCase
{
    public $logger;

    protected function setUp(): void
    {
        // Tests using actual API requests are no longer "pure", so let's run them only when specifically requested.
        if (!getenv("PERFORM_ACTUAL_REQUESTS_WITH_CURL")) {
            $this->markTestSkipped("Tests performing actual (read-only!) API requests need to be enabled with env var PERFORM_ACTUAL_REQUESTS_WITH_CURL=1. Please consider VALID_RECURLY_API_KEY=11223344..., too.");
        }
        parent::setUp();
        //$this->logger = new Recurly\Logger('Recurly');
    }

    /**
     * Test an invalid API key used in a real HEAD request. Expected result: Errors\Unauthorized exception.
     */
    function testHeadRequestUnauthorized(): void
    {
        $this->client = new Recurly\Client("invalid-api-key", $this->logger, ['http_adapter'=>new Recurly\HttpAdapterCurl()]);
        $sites = $this->client->listSites();
        $this->expectException(\Recurly\Errors\Unauthorized::class);
        $sites->getCount();
    }

    /**
     * Test a valid API key used in a HEAD request. Expected result: numeric.
     */
    function testHeadRequestValid(): void
    {
        if (!getenv("VALID_RECURLY_API_KEY")) {
            $this->markTestSkipped("Tests performing actual (read-only!) requests on an actual test site need an env var VALID_RECURLY_API_KEY=11223344... .");
            return;
        }
        $this->client = new Recurly\Client(getenv("VALID_RECURLY_API_KEY"), $this->logger, ['http_adapter'=>new Recurly\HttpAdapterCurl()]);
        $sites = $this->client->listSites();
        $this->assertIsNumeric($sites->getCount());
    }

    /**
     * Test a valid API key used in a GET request. Expected result: JSON object converted to a Recurly\Resource.
     */
    function testGetRequestValid(): void
    {
        if (!getenv("VALID_RECURLY_API_KEY")) {
            $this->markTestSkipped("Tests performing actual (read-only!) requests on an actual test site need an env var VALID_RECURLY_API_KEY=11223344... .");
            return;
        }
        $this->client = new Recurly\Client(getenv("VALID_RECURLY_API_KEY"), $this->logger, ['http_adapter'=>new Recurly\HttpAdapterCurl()]);
        $sites = $this->client->listSites();
        $site = $sites->getFirst();
        $this->assertIsObject($site);
        $this->assertIsString($site->getObject());
        $this->assertEquals("site",$site->getObject());
    }
}
