<?php


class Recurly_AccountListTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/accounts', 'accounts/index-200.xml')
    );
  }

  public function testLoad() {
    $accounts = Recurly_AccountList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_AccountList', $accounts);
    $this->assertEquals('/accounts', $accounts->getHref());
  }

  public function testGetActive() {
    $params = array('other' => 'pickles');
    $url = '/accounts?other=pickles&state=active';
    $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

    $accounts = Recurly_AccountList::getActive($params, $this->client);
    $this->assertInstanceOf('Recurly_AccountList', $accounts);
    $this->assertEquals($url, $accounts->getHref());
  }

  public function testGetClosed() {
    $params = array('other' => 'pickles');
    $url = '/accounts?other=pickles&state=closed';
    $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

    $accounts = Recurly_AccountList::getClosed($params, $this->client);
    $this->assertInstanceOf('Recurly_AccountList', $accounts);
    $this->assertEquals($url, $accounts->getHref());
  }

  public function testGetPastDue() {
    $params = array('other' => 'pickles');
    $url = '/accounts?other=pickles&state=past_due';
    $this->client->addResponse('GET', $url, 'accounts/index-200.xml');

    $accounts = Recurly_AccountList::getPastDue($params, $this->client);
    $this->assertInstanceOf('Recurly_AccountList', $accounts);
    $this->assertEquals($url, $accounts->getHref());
  }

  public function testTake() {
    $params = array('order' => 'asc', 'per_page' => '5');
    $url = '/accounts?order=asc&per_page=3';
    $this->client->addResponse('GET', $url, 'accounts/index-200-take.xml');

    $accounts = Recurly_AccountList::take(3, $params, $this->client);
    $this->assertIsArray($accounts);
    $this->assertEquals(sizeof($accounts), 3);
  }
}
