<?php

class Recurly_ClientTest extends UnitTestCase
{
  public function testUnauthorizedError()
  {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/client/unauthorized-401.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    try
    {
      $account = Recurly_Account::get('abcdef1234567890', $client);
      $this->fail("Expected Recurly_UnauthorizedError");
    }
    catch (Recurly_UnauthorizedError $e)
    {
      $this->pass("Received Recurly_UnauthorizedError");
    }
  }

  public function testServerError()
  {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/client/server-error-500.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    try
    {
      $account = Recurly_Account::get('abcdef1234567890', $client);
      $this->fail("Expected Recurly_ServerError");
    }
    catch (Recurly_ServerError $e)
    {
      $this->pass("Received Recurly_ServerError");
    }
  }

  public function testGatweayError()
  {
    $responseFixture = loadFixture(__DIR__ . '/../fixtures/client/gateway-unavailable-502.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture);

    try
    {
      $account = Recurly_Account::get('abcdef1234567890', $client);
      $this->fail("Expected Recurly_ConnectionError");
    }
    catch (Recurly_ConnectionError $e)
    {
      $this->pass("Received Recurly_ConnectionError");
    }
  }
}
