<?php

class Recurly_AccountListTest extends UnitTestCase
{
  public function testLoad()
  {  
    $responseFixture = loadFixture('./fixtures/accounts/index-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/accounts'));

    $accounts = Recurly_AccountList::get(null, $client);

    $this->assertIsA($accounts, 'Recurly_AccountList');
    $this->assertEqual($accounts->getHref(),'/accounts');
    $this->assertEqual($accounts->count(),42);
  }
}
