<?php

class Recurly_AccountListTest extends UnitTestCase
{
  public function testLoad()
  {
    $client = new MockRecurly_Client();
    mockRequest($client, 'accounts/index-200.xml', array('GET', '/accounts'));

    $accounts = Recurly_AccountList::get(null, $client);

    $this->assertIsA($accounts, 'Recurly_AccountList');
    $this->assertEqual($accounts->getHref(),'/accounts');
    $this->assertEqual($accounts->count(),42);
  }
}
