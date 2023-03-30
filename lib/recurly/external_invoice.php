<?php
/**
 * class Recurly_ExternalInvoice
 * @property Recurly_Stub $account
 * @property Recurly_Stub $external_subscription
 * @property Recurly_ExternalCharge[] $line_items
 * @property string $external_id
 * @property boolean $state
 * @property integer $total
 * @property string $currency
 * @property DateTime $purchased_at
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalInvoice extends Recurly_Resource
{
/**
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalInvoice|null
 * @throws Recurly_Error
 */
  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_ExternalInvoice::uriForExternalInvoice($uuid), $client);
  }

  protected static function uriForExternalInvoice($uuid) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_INVOICES, $uuid);
  }

  protected function getNodeName() {
    return 'external_invoice';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
