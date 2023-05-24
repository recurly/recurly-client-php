<?php


class Recurly_ExternalProductReferenceListTest extends Recurly_TestCase
{
  public function testGetAll() {
    $this->client->addResponse('GET', '/external_products/swifdu8c9om9/external_product_references', 'external_product_references/index-200.xml');

    $external_product = new Recurly_ExternalProduct();
    $external_product->uuid = 'swifdu8c9om9';
    $external_product_references = $external_product->listExternalProductReferences($this->client);
    $external_product_reference = $external_product_references[0];
    $this->assertInstanceOf('Recurly_ExternalProductReference', $external_product_reference);
    $this->assertEquals($external_product_reference->id, 'swifdua3cvtp');
    $this->assertEquals($external_product_reference->reference_code, 'reference_code');
    $this->assertEquals($external_product_reference->external_connection_type, 'google_play_store');
    $this->assertInstanceOf('DateTime', $external_product_reference->created_at);
    $this->assertInstanceOf('DateTime', $external_product_reference->updated_at);
  }
}
