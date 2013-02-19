<?php

class Recurly_AddonTest extends UnitTestCase
{
  public function testDelete() {
    $client = new MockRecurly_Client();
    mockRequest($client, 'addons/show-200.xml', array('GET', '/plans/gold/add_ons/ipaddresses'));
    mockRequest($client, 'addons/destroy-204.xml', array('DELETE', '/plans/gold/add_ons/ipaddresses'));

    $addon = Recurly_Addon::get('gold', 'ipaddresses', $client);
    $this->assertIsA($addon, 'Recurly_Addon');
    $addon->delete();
  }
}