<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_ClientTest extends Recurly_TestCase
{

  public function testUnauthorizedError() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/unauthorized-401.xml');

    try {
      $account = Recurly_Account::get('abcdef1234567890', $this->client);
      $this->fail("Expected Recurly_UnauthorizedError");
    }
    catch (Recurly_UnauthorizedError $e) {}
  }

  public function testServerError() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/server-error-500.xml');

    try {
      $account = Recurly_Account::get('abcdef1234567890', $this->client);
      $this->fail("Expected Recurly_ServerError");
    }
    catch (Recurly_ServerError $e) {}
  }

  public function testGatweayError() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'client/gateway-unavailable-502.xml');

    try {
      $account = Recurly_Account::get('abcdef1234567890', $this->client);
      $this->fail("Expected Recurly_ConnectionError");
    }
    catch (Recurly_ConnectionError $e) {}
  }
}
