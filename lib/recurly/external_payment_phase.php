<?php
/**
 * class Recurly_ExternalPaymentPhase
 * @property string $id
 * @property DateTime $started_at
 * @property DateTime $ends_at
 * @property string $starting_billing_period_index
 * @property string $ending_billing_period_index
 * @property string $offer_type
 * @property string $offer_name
 * @property string $period_count
 * @property string $period_length
 * @property string $amount
 * @property string $currency
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalPaymentPhase extends Recurly_Resource
{
  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'external_payment_phases')) {
      $external_payment_phase_node = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $external_payment_phase_node, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_ExternalPaymentPhase::uriForExternalPaymentPhase($uuid), $client);
  }

  protected static function uriForExternalPaymentPhase($uuid) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_PAYMENT_PHASES, $uuid);
  }

  protected function getNodeName() {
    return 'external_payment_phase';
  }


  protected function getWriteableAttributes() {
   return array();
  }
}
