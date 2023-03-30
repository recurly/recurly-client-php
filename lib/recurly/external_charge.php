<?php
/**
 * class Recurly_ExternalCharge
 * @property Recurly_Stub $account
 * @property Recurly_Stub $external_invoice
 * @property Recurly_Stub $external_product_reference
 * @property integer $unit_amount
 * @property integer $quantity
 * @property string $currency
 * @property string $description
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalCharge extends Recurly_Resource
{
  protected function getNodeName() {
    return 'external_charge';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
