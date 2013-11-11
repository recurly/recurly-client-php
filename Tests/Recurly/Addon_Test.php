<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_AddonTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/plans/gold/add_ons/ipaddresses', 'addons/show-200.xml')
    );
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