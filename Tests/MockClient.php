<?php

namespace Recurly\Tests;

use Recurly\ClientResponse;

/**
 * Return canned client responses.
 */
class MockClient
{
    public function __construct()
    {
        $this->_responses = array();
    }

    public function addResponse($method, $uri, $fixture_filename)
    {
        if (!isset($this->_responses[$method])) {
            $this->_responses[$method] = array();
        }
        $this->_responses[$method][$uri] = $fixture_filename;
    }

    public function request($method, $uri, $data = null)
    {
        if (isset($this->_responses[$method][$uri])) {
            $fixture_filename = $this->_responses[$method][$uri];
        } else {
            throw new \Exception("Don't know how to $method '$uri'");
        }

        return $this->responseFromFixture($fixture_filename);
    }

    public function getPdf($uri, $locale = null)
    {
        return array($uri, $locale);
    }

    protected function responseFromFixture($filename)
    {
        $statusCode = 200;
        $headers = array();
        $body = null;

        $fixture = file(__DIR__.'/fixtures/'.$filename, FILE_IGNORE_NEW_LINES);

        $matches = null;
        preg_match('/HTTP\/1\.1 ([0-9]{3})/', $fixture[0], $matches);
        $statusCode = intval($matches[1]);

        $bodyLineNumber = 0;
        for ($i = 1; $i < sizeof($fixture); ++$i) {
            if (strlen($fixture[$i]) < 5) {
                $bodyLineNumber = $i + 1;
                break;
            }
            preg_match('/([^:]+): (.*)/', $fixture[$i], $matches);
            if (sizeof($matches) > 2) {
                $headers[$matches[1]] = $matches[2];
            }
        }

        if ($bodyLineNumber < sizeof($fixture)) {
            $body = implode(array_slice($fixture, $bodyLineNumber), "\n");
        }

        return new ClientResponse($statusCode, $headers, $body);
    }
}
