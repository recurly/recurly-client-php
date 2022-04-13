<?php

/**
 * class Recurly_Percentage_Tier
 * @property string $currency 3 digits currency code. Ex: USD, BRL
 * @property Recurly_CurrencyPercentageTier[] $tiers List of percentage tiers.
 */

class Recurly_PercentageTier extends Recurly_Resource
{
  function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
  }

  protected function getNodeName() {
    return 'percentage_tier';
  }

  protected function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'percentage_tiers')) {
      $percentageTierNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $percentageTierNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes()
  {
    return array(
      'currency', 'tiers'
    );
  }

  // Includes tier attributes in request body for subscription add-ons
  protected function getChangedAttributes($nested = false) {
    return $this->_values;
  }
}
