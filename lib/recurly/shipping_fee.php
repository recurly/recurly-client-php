<?php

/**
 * Class Recurly_ShippingFee
 * @property string $shipping_method_code Unique code to identify the shipping method.
 * @property integer $shipping_amount_in_cents The amount of this shipping fee.
 * @property Recurly_ShippingAddress $shipping_address Optional address this shipping fee is associated with.
 * @property string $shipping_address_id Optional id of the existing shipping address this fee is associated with.
 */
class Recurly_ShippingFee extends Recurly_Resource
{
  protected function getNodeName() {
    return 'shipping_fee';
  }

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'shipping_fees')) {
      $feeNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $feeNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes() {
    return array(
      'shipping_method_code', 'shipping_amount_in_cents', 'shipping_address',
      'shipping_address_id'
    );
  }
}
