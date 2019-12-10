<?php

use PHPUnit\Framework\TestCase;

/**
 * Base class for our tests that sets up a mock client.
 *
 * @property Recurly_MockClient $client
 */
abstract class Recurly_TestCase extends TestCase {
  function setUp(): void {
    $this->client = new Recurly_MockClient();
    foreach ($this->defaultResponses() as $request) {
      call_user_func_array(array($this->client, 'addResponse'), $request);
    }
  }

  /**
   * Return an array of responses that will be added to the mock client.
   */
  function defaultResponses() {
    return array();
  }
}

/**
 * Return canned client responses.
 */
class Recurly_MockClient {
  public function __construct() {
    $this->_responses = array();
  }

  public function addResponse($method, $uri, $fixture_filename) {
    if (!isset($this->_responses[$method])) {
      $this->_responses[$method] = array();
    }
    $this->_responses[$method][$uri] = $fixture_filename;
  }

  public function request($method, $uri, $data = null) {
    if (isset($this->_responses[$method][$uri])) {
      $fixture_filename = $this->_responses[$method][$uri];
    }
    else {
      throw new Exception("Don't know how to $method '$uri'");
    }

    return $this->responseFromFixture($fixture_filename);
  }

  public function getPdf($uri, $locale = null) {
    return array($uri, $locale);
  }

  protected function responseFromFixture($filename) {
    $statusCode = 200;
    $headers = array();
    $body = null;

    $fixture = file(__DIR__ . '/fixtures/' . $filename, FILE_IGNORE_NEW_LINES);

    $matches = null;
    preg_match('/HTTP\/1\.1 ([0-9]{3})/', $fixture[0], $matches);
    $statusCode = intval($matches[1]);

    $bodyLineNumber = 0;
    for ($i = 1; $i < sizeof($fixture); $i++) {
      if (strlen($fixture[$i]) < 5) {
        $bodyLineNumber = $i + 1;
        break;
      }
      preg_match('/([^:]+): (.*)/', $fixture[$i], $matches);
      if (sizeof($matches) > 2) {
        $headerKey = strtolower($matches[1]);
        $headers[$headerKey] = $matches[2];
      }
    }

    if ($bodyLineNumber < sizeof($fixture))
      $body = implode("\n", array_slice($fixture, $bodyLineNumber));

    return new Recurly_ClientResponse($statusCode, $headers, $body);
  }

}
