<?php


class Recurly_ExternalProductListTest extends Recurly_TestCase
{

  public function testGetAll() {
    $url = '/external_products';
    $this->client->addResponse('GET', $url, 'external_products/index-200.xml');

    $external_products = Recurly_ExternalProductList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_ExternalProductList', $external_products);
    $this->assertEquals($url, $external_products->getHref());
    $external_product = $external_products->current();
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
}
