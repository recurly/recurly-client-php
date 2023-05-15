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

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'external_product_references')) {
      $external_product_reference_node = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $external_product_reference_node, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes() {
    return array('reference_code', 'external_connection_type');
   }
}
