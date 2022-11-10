<?php

/**
 * Class Recurly_CustomerPermission
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $description
 */
class Recurly_CustomerPermission extends Recurly_Resource
{
  protected function getNodeName() {
    return 'customer_permission';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
