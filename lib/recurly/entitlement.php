<?php

/**
 * Class Recurly_Entitlement
 * @property Recurly_CustomerPermission $customer_permission
 * @property array $granted_by
 */
class Recurly_Entitlement extends Recurly_Resource
{
  protected function getNodeName() {
    return 'entitlement';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
