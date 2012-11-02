<?php

namespace Recurly\Tests;

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//
//// Setting timezone for time() function.
//date_default_timezone_set('America/Los_Angeles');

/**
 * Base class for our tests that sets up a mock client.
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /* @var  MockClient */
    public $client;

    public function setUp()
    {
        $this->client = new MockClient();
        foreach ($this->defaultResponses() as $request) {
            call_user_func_array(array($this->client, 'addResponse'), $request);
        }
    }

    /**
     * Return an array of responses that will be added to the mock client.
     */
    public function defaultResponses()
    {
        return array();
    }
}
