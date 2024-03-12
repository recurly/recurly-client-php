<?php


class Recurly_BusinessEntityListTest extends Recurly_TestCase
{
  public function testGetAll() {
    $this->client->addResponse('GET', '/business_entities', 'business_entities/index-200.xml');

    $business_entities = Recurly_BusinessEntityList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_BusinessEntityList', $business_entities);
    $business_entity = $business_entities->current();
    $this->assertInstanceOf('Recurly_BusinessEntity', $business_entity);
    $this->assertEquals($business_entity->getHref(), 'https://api.recurly.com/v2/business_entities/su3n18oalr9m');
    $this->assertInstanceOf('Recurly_Stub', $business_entity->invoices);
    $this->assertEquals($business_entity->invoices->getHref(), 'https://api.recurly.com/v2/business_entities/su3n18oalr9m/invoices');
    $this->assertEquals($business_entity->id, 'su3n18oalr9m');
    $this->assertEquals($business_entity->code, 'legacy_usa');
    $this->assertEquals($business_entity->name, 'Legacy USA');
    $this->assertInstanceOf('Recurly_Address', $business_entity->invoice_display_address);
    $this->assertEquals($business_entity->invoice_display_address->address1, '94250 Sadye Ramp');
    $this->assertEquals($business_entity->invoice_display_address->address2, 'Apt. 771');
    $this->assertEquals($business_entity->invoice_display_address->state, 'CA');
    $this->assertEquals($business_entity->invoice_display_address->zip, '94605');
    $this->assertEquals($business_entity->invoice_display_address->city, 'Oakland');
    $this->assertEquals($business_entity->invoice_display_address->country, 'US');
    $this->assertEquals($business_entity->invoice_display_address->phone, '718-555-1234');
    $this->assertInstanceOf('Recurly_Address', $business_entity->tax_address);
    $this->assertEquals($business_entity->tax_address->address1, '94250 Sadye Ramp');
    $this->assertEquals($business_entity->tax_address->address2, 'Apt. 771');
    $this->assertEquals($business_entity->tax_address->state, 'CA');
    $this->assertEquals($business_entity->tax_address->zip, '94605');
    $this->assertEquals($business_entity->tax_address->city, 'Oakland');
    $this->assertEquals($business_entity->tax_address->country, 'US');
    $this->assertEquals($business_entity->tax_address->phone, '718-555-1234');
    $this->assertEquals($business_entity->default_vat_number, '1234');
    $this->assertEquals($business_entity->default_registration_number, '5678');
    $this->assertInstanceOf('DateTime', $business_entity->created_at);
    $this->assertInstanceOf('DateTime', $business_entity->updated_at);
    $subscriber_location_countries = $business_entity->subscriber_location_countries;
    $this->assertEquals(2, count($subscriber_location_countries));
    $this->assertInstanceOf('Recurly_SubscriberLocationCountry', $subscriber_location_countries[0]);
    $this->assertInstanceOf('Recurly_SubscriberLocationCountry', $subscriber_location_countries[1]);
    $this->assertEquals($business_entity->default_liability_gl_account_id, '12345');
    $this->assertEquals($business_entity->default_revenue_gl_account_id, '56789');
  }
}
