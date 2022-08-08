<?php
/**
 * class Recurly_DunningInterval
 * @property int $days
 * @property string $email_template
 */
class Recurly_DunningInterval extends Recurly_Resource
{
  protected function getNodeName() {
    return 'interval';
  }

  protected function getWriteableAttributes() {
   return array();
  }

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'intervals')) {
      $intervalNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $intervalNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }
}
