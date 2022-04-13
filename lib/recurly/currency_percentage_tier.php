<?php

/**
 * class Recurly_CurrencyPercentageTier
 * @property float $ending_amount_in_cents 3 digits currency code. Ex: USD, BRL
 * @property string $usage_percentage List of percentage tiers.
 */

class Recurly_CurrencyPercentageTier extends Recurly_Resource
{
  function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
  }

  protected function getNodeName() {
    return 'tier';
  }

  protected function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'tiers')) {
      $percentageTierNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $percentageTierNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes()
  {
    return array(
      'ending_amount_in_cents', 'usage_percentage'
    );
  }

  // Includes tier attributes in request body for subscription add-ons
  protected function getChangedAttributes($nested = false) {
    return $this->_values;
  }
}
