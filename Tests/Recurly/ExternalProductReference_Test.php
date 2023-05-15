<?php


class Recurly_ExternalProductReferenceTest extends Recurly_TestCase
{
  public function testGetExternalProduct() {
    $this->client->addResponse('GET', '/external_products/swifdu8c9om9/external_product_references/swifdua3cvtp', 'external_product_references/show-200.xml');

    $external_product = new Recurly_ExternalProduct();
    $external_product->uuid = 'swifdu8c9om9';
    $external_product_reference = $external_product->getExternalProductReference('swifdua3cvtp', $this->client);
    $this->assertInstanceOf('Recurly_ExternalProductReference', $external_product_reference);
    $this->assertEquals($external_product_reference->id, 'swifdua3cvtp');
    $this->assertEquals($external_product_reference->reference_code, 'reference_code');
    $this->assertEquals($external_product_reference->external_connection_type, 'google_play_store');
    $this->assertInstanceOf('DateTime', $external_product_reference->created_at);
    $this->assertInstanceOf('DateTime', $external_product_reference->updated_at);
  }

  public function testCreateXml() {
    $external_product_reference = new Recurly_ExternalProductReference();
    $external_product_reference->reference_code = 'reference_code';
    $external_product_reference->external_connection_type = 'google_play_store';
  
    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<external_product_reference><reference_code>reference_code</reference_code><external_connection_type>google_play_store</external_connection_type></external_product_reference>\n",
      $external_product_reference->xml()
    );
  }
}
