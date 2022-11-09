<?php
/**
 * class Recurly_ExternalResource
 * @property string $external_object_reference
 */
class Recurly_ExternalResource extends Recurly_Resource
{
  protected function getNodeName() {
    return 'external_resource';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
