<?php


class Recurly_ExternalProductTest extends Recurly_TestCase
{
  public function testGetExternalProduct() {
    $this->client->addResponse('GET', '/external_products/rjx71rx8gs2m', 'external_products/show-200.xml');

    $external_product = Recurly_ExternalProduct::get('rjx71rx8gs2m', $this->client);
    $this->assertInstanceOf('Recurly_ExternalProduct', $external_product);
    $this->assertInstanceOf('Recurly_Plan', $external_product->plan);
    $plan = $external_product->plan;
    $this->assertEquals($plan->plan_code, 'plan-code');
    $this->assertEquals($plan->name, 'Plan Code');
    $this->assertEquals($external_product->name, 'name');
    $this->assertInstanceOf('DateTime', $external_product->created_at);
    $this->assertInstanceOf('DateTime', $external_product->updated_at);
    $external_product_reference = $external_product->external_product_references[0];
    $this->assertInstanceOf('Recurly_ExternalProductReference', $external_product_reference);
    $this->assertEquals($external_product_reference->id, 'rj3vo231wzb4');
    $this->assertEquals($external_product_reference->reference_code, '12345');
    $this->assertEquals($external_product_reference->external_connection_type, 'apple_app_store');
    $this->assertInstanceOf('DateTime', $external_product_reference->created_at);
    $this->assertInstanceOf('DateTime', $external_product_reference->updated_at);
  }

  public function testCreateXml() {
    $external_product = new Recurly_ExternalProduct();
    $external_product->plan_code = 'p1';
    $external_product->name = 'Cool Plan Name';
    $external_product_reference = new Recurly_ExternalProductReference();
    $external_product_reference->reference_code = 'reference_code';
    $external_product_reference->external_connection_type = 'google_play_store';
    $external_product->external_product_references = [$external_product_reference];
  
    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<external_product><plan_code>p1</plan_code><name>Cool Plan Name</name><external_product_references><external_product_reference><reference_code>reference_code</reference_code><external_connection_type>google_play_store</external_connection_type></external_product_reference></external_product_references></external_product>\n",
      $external_product->xml()
    );
  }
}
