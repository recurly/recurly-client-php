<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_AccountListTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts', 'accounts/index-200.xml')
    );
  }

  public function testLoad() {
    $accounts = Recurly_AccountList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_AccountList', $accounts);
    $this->assertEquals('/accounts', $accounts->getHref());
    $this->assertEquals(42, $accounts->count());
  }
}
