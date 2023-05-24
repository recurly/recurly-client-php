<?php
/**
 * class Recurly_ExternalProduct
 * @property Recurly_Plan $plan
 * @property string $plan_code
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

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_ExternalProduct::uriForExternalProduct($this->uuid);
  }

  protected function getWriteableAttributes() {
   return array('plan_code', 'name', 'external_product_references');
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_EXTERNAL_PRODUCTS);
  }

  public function update() {
    $this->_save(Recurly_Client::PUT, $this->uri());
  }
 
  public function delete() {
    return Recurly_Base::_delete($this->uri(), $this->_client);
  }

  protected function uriForExternalProductReference() {
    return $this->uri() . '/' . Recurly_Client::PATH_EXTERNAL_PRODUCT_REFERENCES;
  }

  public function createExternalProductReference($external_product_reference, $client = null) {
    if ($client) {
      $external_product_reference->_client = $client;
    }
    $external_product_reference->_save(Recurly_Client::POST, $this->uri() . '/' . Recurly_Client::PATH_EXTERNAL_PRODUCT_REFERENCES);
  }

  public function listExternalProductReferences($client = null) {
    return Recurly_Base::_get($this->uriForExternalProductReference(), $client);
  }

  public function getExternalProductReference($external_product_reference_uuid, $client = null) {
    return Recurly_Base::_get($this->uriForExternalProductReference() . '/' . $external_product_reference_uuid, $client);
  }

  public function deleteExternalProductReference($external_product_reference_uuid, $client = null) {
    return Recurly_Base::_delete($this->uriForExternalProductReference() . '/' . $external_product_reference_uuid, $client);
  }
}
