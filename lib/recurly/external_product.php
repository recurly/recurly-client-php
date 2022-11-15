<?php
/**
 * class Recurly_ExternalProduct
 * @property Recurly_Plan $plan
 * @property array $external_product_references
 * @property string $name
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalProduct extends Recurly_Resource
{
/**
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalProduct|null
 * @throws Recurly_Error
 */
  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_ExternalProduct::uriForExternalProduct($uuid), $client);
  }

  protected static function uriForExternalProduct($uuid) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_PRODUCTS, $uuid);
  }

  protected function getNodeName() {
    return 'external_product';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
