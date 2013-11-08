<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_BaseTest extends Recurly_TestCase {

  public function testParsingXMLToNewObject() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890', 'accounts/empty.xml');

    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->assertNull($account);
  }
}
