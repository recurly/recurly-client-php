<?php

/**
 * Class Recurly_ShippingMethod
 * @property string $code Unique code to identify the shipping method.
 * @property string $name The name of the shipping method.
 * @property string $accounting_code The accounting code of the shipping method.
 * @property string $tax_code The tax code of the shipping method.
 * @property DateTime $created_at The date and time the shipping method was created.
 * @property DateTime $updated_at The date and time the shipping method was last updated.
 */
class Recurly_ShippingMethod extends Recurly_Resource
{
  /**
   * @param string $code The shipping method code
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_Resource or null
   * @throws Recurly_Error
   */
  public static function get($code, $client = null) {
    return Recurly_Base::_get(Recurly_ShippingMethod::uriForShippingMethod($code), $client);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_ShippingMethod::uriForShippingMethod($this->code);
  }

  protected static function uriForShippingMethod($code) {
    return Recurly_Client::PATH_SHIPPING_METHOD . '/' . rawurlencode($code);
  }

  protected function getNodeName() {
    return 'shipping_method';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
