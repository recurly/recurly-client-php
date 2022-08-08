<?php

/**
 * A single ramp interval specification that identifies the billing cycle
 * that should be the first to apply the prices specified in the accompanied
 * currency list.
 *
 * @property number $startingBillingCycle Optional in the constructor.
 * @property Recurly_CurrencyList $currencyList Optional in the constructor.
 */
class Recurly_RampInterval
{
  use XmlDoc {
    populateXmlDoc as public traitPopulateXmlDoc;
  }


  public static function nodeToObject($node)
  {
    // get grandparent node (since parent will be the ramp_intervals array node)
    $grandParentNode = $node->parentNode->parentNode;
    $obj = null;

    switch ($grandParentNode->nodeName) {
      case 'plan':
        $obj = new Recurly_PlanRampInterval();
        break;
      case 'subscription':
        $obj = new Recurly_SubscriptionRampInterval();
        break;
    }

    return $obj;
  }


  protected function getNodeName()
  {
    return 'ramp_interval';
  }

  protected function getRequiredAttributes() {
    return array('starting_billing_cycle', 'unit_amount_in_cents');
  }

  protected function getWriteableAttributes() {
    return array('starting_billing_cycle', 'unit_amount_in_cents');
  }

  // this is needed to go from obj -> xml, but not the other way around
  public function populateXmlDoc(&$doc, &$parentNode, &$xmlDoc) {
    // just need the <ramp_interval> wrapper...
    $rampNode = $doc->createElement($this->getNodeName());
    $parentNode->appendChild($rampNode);

    // kind of like calling the parent's version..
    $this->traitPopulateXmlDoc($doc, $rampNode, $xmlDoc);
  }


  public function __toString() {
    $class = get_class($this);
    $values = $this->getValuesString(); // should be in resource?
    return "<$class $values>";
  }
}
