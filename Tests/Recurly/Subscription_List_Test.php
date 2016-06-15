<?php


class Recurly_SubscriptionListTest extends Recurly_TestCase
{

  public function testGetActive() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=active';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getActive($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetCanceled() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=canceled';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getCanceled($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetExpired() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=expired';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getExpired($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetFuture() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=future';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getFuture($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetLive() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=live';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getLive($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetPastDue() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=past_due';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getPastDue($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }

  public function testGetTrials() {
    $params = array('other' => 'pickles');
    $url = '/subscriptions?other=pickles&state=in_trial';
    $this->client->addResponse('GET', $url, 'subscriptions/index-200.xml');

    $subscriptions = Recurly_SubscriptionList::getTrials($params, $this->client);
    $this->assertInstanceOf('Recurly_SubscriptionList', $subscriptions);
    $this->assertEquals($url, $subscriptions->getHref());
  }
}
