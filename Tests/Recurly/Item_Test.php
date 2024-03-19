<?php

class Recurly_ItemTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/items/plastic_gloves', 'items/show-200.xml'),
    );
  }

  public function testConstructor() {
    $client = new Recurly_Client;
    $item = new Recurly_Item(null, $client);

    $prop = new ReflectionProperty($item, '_client');
    $prop->setAccessible(true);

    $this->assertSame($client, $prop->getValue($item));
  }

  public function testGetItem() {
    $item = Recurly_Item::get('plastic_gloves', $this->client);

    $this->assertInstanceOf('Recurly_Item', $item);
    $this->assertEquals('plastic_gloves', $item->item_code);
    $this->assertEquals('Awesome Plastic Gloves', $item->name);
    $this->assertEquals('Sleek Plastic', $item->description);
  }

  public function testGetItemWithRevRec() {
    $this->client->addResponse('GET', '/items/plastic_gloves', 'items/show-200-revrec.xml');
    $item = Recurly_Item::get('plastic_gloves', $this->client);

    $this->assertInstanceOf('Recurly_Item', $item);
    $this->assertEquals('plastic_gloves', $item->item_code);
    $this->assertEquals('Awesome Plastic Gloves', $item->name);
    $this->assertEquals('Sleek Plastic', $item->description);
    $this->assertEquals($item->liability_gl_account_id,'t5ejtge1xw0x');
    $this->assertEquals($item->revenue_gl_account_id,'t5ejtgf1vxh1');
    $this->assertEquals($item->performance_obligation_id,'5');
  }

  public function testNestedCustomFields() {
    $item = Recurly_Item::get('plastic_gloves', $this->client);
    $item->custom_fields[] = new Recurly_CustomField('size', 'small');

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<item><custom_fields><custom_field><name>size</name><value>small</value></custom_field></custom_fields></item>\n",
      $item->xml()
    );
  }

  public function testDelete() {
    $this->client->addResponse('DELETE', 'https://api.recurly.com/v2/items/plastic_gloves', 'items/destroy-204.xml');

    $item = Recurly_Item::get('plastic_gloves', $this->client);
    $item->delete();
  }

  public function testDeleteItem() {
    $this->client->addResponse('DELETE', '/items/plastic_gloves', 'items/destroy-204.xml');

    Recurly_Item::deleteItem('plastic_gloves', $this->client);
  }

  public function testReactivate() {
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/items/plastic_gloves/reactivate', 'items/reactivate-200.xml');

    $item = Recurly_Item::get('plastic_gloves', $this->client);
    $item->reactivate();
    $this->assertEquals('active', $item->state);
  }

  public function testReactivateItem() {
    $this->client->addResponse('PUT', '/items/plastic_gloves/reactivate', 'items/reactivate-200.xml');

    $item = Recurly_Item::reactivateItem('plastic_gloves', $this->client);
    $this->assertInstanceOf('Recurly_Item', $item);
    $this->assertEquals('active', $item->state);
  }

  public function testCreateXml() {
    $item = new Recurly_Item();
    $item->item_code = 'little_llama';
    $item->name = 'Little Llama';
    $item->description = 'A description about llamas';
    $item->custom_fields[] = new Recurly_CustomField('size', 'small');
    $item->liability_gl_account_id = 't5ejtge1xw0x';
    $item->revenue_gl_account_id = 't5ejtgf1vxh1';
    $item->performance_obligation_id = '5';

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<item><item_code>little_llama</item_code><name>Little Llama</name><description>A description about llamas</description><custom_fields><custom_field><name>size</name><value>small</value></custom_field></custom_fields><liability_gl_account_id>t5ejtge1xw0x</liability_gl_account_id><revenue_gl_account_id>t5ejtgf1vxh1</revenue_gl_account_id><performance_obligation_id>5</performance_obligation_id></item>\n",
      $item->xml()
    );
  }

  public function testUpdateXml() {
    $item = Recurly_Item::get('plastic_gloves', $this->client);
    $item->description = 'A new description about gloves.';

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<item><description>A new description about gloves.</description></item>\n",
      $item->xml()
    );
  }

}
