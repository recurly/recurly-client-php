<?php


class Recurly_AddonTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/plans/gold/add_ons/ipaddresses', 'addons/show-200.xml')
    );
  }

  public function testConstructor() {
    $client = new Recurly_Client;
    $plan = new Recurly_Addon(null, $client);

    $prop = new ReflectionProperty($plan, '_client');
    $prop->setAccessible(true);

    $this->assertSame($client, $prop->getValue($plan));
  }

  public function testDelete() {
    $this->client->addResponse(
      'DELETE',
      'https://api.recurly.com/v2/plans/gold/add_ons/ipaddresses',
      'addons/destroy-204.xml'
    );

    $addon = Recurly_Addon::get('gold', 'ipaddresses', $this->client);
    $this->assertInstanceOf('Recurly_Addon', $addon);
    $addon->delete();
  }
}
