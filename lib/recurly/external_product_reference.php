<?php
/**
 * class Recurly_ExternalProductReference
 * @property string $id
 * @property string $reference_code
 * @property string $external_connection_type
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalProductReference extends Recurly_Resource
{
  protected function getNodeName() {
    return 'external_product_reference';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
