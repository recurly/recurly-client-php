<?php

/**
 * class Recurly_CurrencyPercentageTier
 * @property float $ending_amount_in_cents Ending amount for the tier. Must be left empty if it is the final tier.
 * @property string $usage_percentage The percentage taken of the monetary amount of usage tracked. This can be up to 4 decimal places represented as a string.
 */

class Recurly_CurrencyPercentageTier extends Recurly_Resource
{
  function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
  }

  protected function getNodeName() {
    return 'tier';
  }

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if(!empty($this->usage_percentage)) {
      if ($this->isEmbedded($node, 'tiers')) {
        $percentageTierNode = $node->appendChild($doc->createElement($this->getNodeName()));
        parent::populateXmlDoc($doc, $percentageTierNode, $obj, $nested);
      } else {
        parent::populateXmlDoc($doc, $node, $obj, $nested);
      }
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
