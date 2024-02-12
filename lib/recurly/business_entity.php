<?php

/**
 * Class Recurly_BusinessEntity
 * @property Recurly_Stub $invoices The URL of invoices for the specified business entity.
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $default_revenue_gl_account_id
 * @property string $default_liability_gl_account_id
 * @property Recurly_Address $invoice_display_address The nested invoice address information of the business entity: address1, address2, city, state, zip, country, phone.
 * @property Recurly_Address $tax_address The nested tax address information of the business entity: address1, address2, city, state, zip, country, phone.
 * @property Recurly_SubscriberLocationCountry[] $subscriber_location_countries
 * @property string $default_vat_number
 * @property string $default_registration_number
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_BusinessEntity extends Recurly_Resource
{
/**
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_BusinessEntity|null
 * @throws Recurly_Error
 */
public static function get($uuid, $client = null) {
  return Recurly_Base::_get(Recurly_BusinessEntity::uriForBusinessEntity($uuid), $client);
}

protected static function uriForBusinessEntity($uuid) {
  return self::_safeUri(Recurly_Client::PATH_BUSINESS_ENTITIES, $uuid);
}
  protected function getNodeName() {
    return 'business_entity';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
