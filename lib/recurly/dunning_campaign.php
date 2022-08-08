<?php

/**
 * Class Recurly_DunningCampaign
 * @property string $id The uuid of the Dunning Campaign.
 * @property string $name The name of the Dunning Campaign.
 * @property string $code The unique dunning campaign identifier code. Only numbers, lowercase letters, dashes, pluses, and underscores can be used.
 * @property string $description An internal description to identify a dunning campaign.
 * @property boolean $default True if this will be your default Dunning Campaign.
 * @property array $dunning_cycles An array of Recurly_DunningCycle hashes.
 * @property DateTime $created_at When the Dunning Campaign was created.
 * @property DateTime $updated_at When the Dunning Campaign was last updated.
 * @property DateTime $deleted_at If the Dunning Campaign was deleted, this field will show the time at which that event occurred.
 */
class Recurly_DunningCampaign extends Recurly_Resource
{
  public static function get($id, $client = null) {
    return Recurly_Base::_get(Recurly_DunningCampaign::uriForDunningCampaign($id), $client);
  }

  public function bulkUpdate($planCodes = []) {
    $doc = XmlTools::createDocument();

    $root = $doc->appendChild($doc->createElement($this->getNodeName()));
    $planCodesNode = $root->appendChild($doc->createElement('plan_codes'));

    foreach ($planCodes as $planCode) {
      $planCodeNode = $planCodesNode->appendChild($doc->createElement('plan_code', $planCode));
    }

    $response = $this->_client->request(Recurly_Client::PUT, $this->uri() . '/bulk_update', XmlTools::renderXML($doc));
    $response->assertValidResponse();

    return null;
  }

  protected static function uriForDunningCampaign($id) {
    return self::_safeUri(Recurly_Client::PATH_DUNNING_CAMPAIGNS, $id);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_DunningCampaign::uriForDunningCampaign($this->id);
  }

  protected function getNodeName() {
    return 'dunning_campaign';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
