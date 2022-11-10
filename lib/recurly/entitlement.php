<?php

/**
 * Class Recurly_Entitlement
 * @property Recurly_Stub $account
 * @property Recurly_CustomerPermission $customer_permission
 * @property array $granted_by
 * @property DateTime $created_at
 * @property DateTime $updated_at
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
