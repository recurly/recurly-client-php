<?php

class Recurly_AddonTest extends UnitTestCase
{
  public function testDelete() {
    $getFixture = loadFixture(__DIR__ . '/../fixtures/addons/show-200.xml');
    $deleteFixture = loadFixture(__DIR__ . '/../fixtures/addons/destroy-204.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $getFixture, array('GET', '/plans/gold/add_ons/ipaddresses'));
    $client->returns('request', $deleteFixture, array('DELETE', '/plans/gold/add_ons/ipaddresses'));

    $addon = Recurly_Addon::get('gold', 'ipaddresses', $client);
    $this->assertIsA($addon, 'Recurly_Addon');
    $addon->delete();
  }
}