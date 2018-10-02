<?php


class Recurly_ClientTest extends Recurly_TestCase
{

  public function testDeprecationError() {
    $this->client->addResponse('GET', '/accounts', 'client/deprecated-200.xml');

    // This should print an error but not raise.
    $accounts = Recurly_AccountList::get(null, $this->client)->get();
  }

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

  // Test that the <details> tag from a 400 response is appended to the message
  public function testBadRequestError() {
    $this->client->addResponse('POST', '/purchases', 'client/bad-request-400.xml');

    try {
      $purchase = new Recurly_Purchase();
      $purchase->address = 'something unacceptable';

      $collection = Recurly_Purchase::invoice($purchase, $this->client);
    }
    catch(Recurly_Error $e) {
      $this->assertEquals($e->getMessage(), "The provided XML was invalid. Details: Unacceptable tags <address>");
    }
  }
}
