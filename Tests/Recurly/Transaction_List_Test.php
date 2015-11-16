<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_TransactionListTest extends Recurly_TestCase
{
  public function testGetSuccessful() {
    $params = array('other' => 'pickles');
    $url = '/transactions?other=pickles&state=successful';
    $this->client->addResponse('GET', $url, 'transactions/index-200.xml');

    $transactions = Recurly_TransactionList::getSuccessful($params, $this->client);
    $this->assertInstanceOf('Recurly_TransactionList', $transactions);
    $this->assertEquals($url, $transactions->getHref());
  }

  public function testGetVoided() {
    $params = array('other' => 'pickles');
    $url = '/transactions?other=pickles&state=voided';
    $this->client->addResponse('GET', $url, 'transactions/index-200.xml');

    $transactions = Recurly_TransactionList::getVoided($params, $this->client);
    $this->assertInstanceOf('Recurly_TransactionList', $transactions);
    $this->assertEquals($url, $transactions->getHref());
  }
}
