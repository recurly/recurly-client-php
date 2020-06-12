<?php

/**
 * class Recurly_Tier
 * @property int $unit_amount_in_cents Price of 1 unit of the add-on in cents.
 * @property int $ending_quantity The maximum number of units per tier. The final tier is always to infinity. This means the last tier should have a `ending_quantity` of `NULL` or `999999999`.
 */

class Recurly_Tier extends Recurly_Resource
{
  function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
    $this->unit_amount_in_cents = new Recurly_CurrencyList('unit_amount_in_cents');
  }

  protected function getNodeName() {
    return 'tier';
  }

  protected function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'tiers')) {
      $tierNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $tierNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes()
  {
    return array(
      'unit_amount_in_cents', 'ending_quantity'
    );
  }

  // Includes tier attributes in request body for subscription add-ons
  protected function getChangedAttributes($nested = false) {
    return $this->_values;
  }
}
