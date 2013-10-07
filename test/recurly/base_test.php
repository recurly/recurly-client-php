
<?php

class Recurly_BaseTest extends UnitTestCase {

  function setUp() {
    $this->client = new MockRecurly_Client();
    mockRequest($this->client, 'accounts/empty.xml', array('GET', '/accounts/abcdef1234567890'));
  }

  public function testParsingXMLToNewObject() {
    try {
      $account = Recurly_Account::get('abcdef1234567890', $this->client);
    }
    catch (Exception $e) {
      $this->fail("Could not parse empty XML string");
    }

    $this->assertEqual($account, null);
  }
}
