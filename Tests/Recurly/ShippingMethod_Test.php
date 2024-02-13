<?php

class Recurly_ShippingMethodTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/shipping_methods/fedex_ground', 'shipping_methods/show-200.xml'),
    );
  }

  public function testShippingMethod() {
    $shipping_method = Recurly_ShippingMethod::get('fedex_ground', $this->client);

    $this->assertInstanceOf('Recurly_ShippingMethod', $shipping_method);
    $this->assertEquals('fedex_ground', $shipping_method->code);
    $this->assertEquals('FedEx Ground', $shipping_method->name);
    $this->assertEquals('acc1', $shipping_method->accounting_code);
    $this->assertEquals('r101', $shipping_method->tax_code);
    $this->assertEquals('twywqfr48v9l', $shipping_method->liability_gl_account_id);
    $this->assertEquals('thproqnpcuwp', $shipping_method->revenue_gl_account_id);
    $this->assertEquals('4', $shipping_method->performance_obligation_id);
    $this->assertInstanceOf('DateTime', $shipping_method->created_at);
    $this->assertInstanceOf('DateTime', $shipping_method->updated_at);
  }
}
