<?php


class Recurly_AddonTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/plans/gold/add_ons/ipaddresses', 'addons/show-200.xml')
    );
  }

  public function testConstructor() {
    $client = new Recurly_Client;
    $plan = new Recurly_Addon(null, $client);

    $prop = new ReflectionProperty($plan, '_client');
    $prop->setAccessible(true);

    $this->assertSame($client, $prop->getValue($plan));
  }

  public function testDelete() {
    $this->client->addResponse(
      'DELETE',
      'https://api.recurly.com/v2/plans/gold/add_ons/ipaddresses',
      'addons/destroy-204.xml'
    );

    $addon = Recurly_Addon::get('gold', 'ipaddresses', $this->client);
    $this->assertInstanceOf('Recurly_Addon', $addon);
    $addon->delete();
  }

  public function testCreateXmlItemBackedAddOn() {
    $item = new Recurly_Item();
    $item->item_code = 'little_llama';
    $addon = new Recurly_Addon();
    $addon->plan_code = 'gold';
    $addon->item_code = $item->item_code;
    $addon->unit_amount_in_cents->addCurrency('USD', 400);

    $this->assertXmlStringEqualsXmlString("
      <add_on>
        <item_code>little_llama</item_code>
        <unit_amount_in_cents>
          <USD>400</USD>
        </unit_amount_in_cents>
      </add_on>", $addon->xml());
  }

  public function testCreateXmlTieredAddOn() {
    $item = new Recurly_Item();
    $addon = new Recurly_Addon();
    $addon->plan_code = 'gold';
    $addon->add_on_code = 'little_llama';
    $addon->tier_type = 'tiered';

    $tier1 = new Recurly_Tier();
    $tier1->unit_amount_in_cents->addCurrency('USD', 400);
    $tier1->ending_quantity = 800;
    $tier2 = new Recurly_Tier();
    $tier2->unit_amount_in_cents->addCurrency('USD', 200);

    $addon->tiers = array($tier1, $tier2);

    $this->assertXmlStringEqualsXmlString("
      <add_on>
        <add_on_code>little_llama</add_on_code>
        <tier_type>tiered</tier_type>
        <tiers>
          <tier>
            <unit_amount_in_cents>
              <USD>400</USD>
            </unit_amount_in_cents>
            <ending_quantity>800</ending_quantity>
          </tier>
          <tier>
            <unit_amount_in_cents>
              <USD>200</USD>
            </unit_amount_in_cents>
          </tier>
        </tiers>
      </add_on>", $addon->xml());
  }

  public function testCreateXmlPercentageTieredAddOn() {
    $item = new Recurly_Item();
    $addon = new Recurly_Addon();
    $addon->plan_code = 'gold';
    $addon->add_on_code = 'little_llama';
    $addon->tier_type = 'tiered';

    $percentage_tier = new Recurly_PercentageTier();
    $percentage_tier->currency = 'USD';
    $tier = new Recurly_CurrencyPercentageTier();
    $tier->ending_amount_in_cents = 100;
    $tier->usage_percentage = '10.0';
    $tier2 = new Recurly_CurrencyPercentageTier();
    $tier2->ending_amount_in_cents = null;
    $tier2->usage_percentage = '20.0';
    $percentage_tier->tiers = array($tier, $tier2);

    $addon->percentage_tiers = array($percentage_tier);

    $this->assertXmlStringEqualsXmlString("
      <add_on>
        <add_on_code>little_llama</add_on_code>
        <tier_type>tiered</tier_type>
        <percentage_tiers>
          <percentage_tier>
            <currency>USD</currency>
            <tiers>
              <tier>
                <ending_amount_in_cents>100</ending_amount_in_cents>
                <usage_percentage>10.0</usage_percentage>
              </tier>
              <tier>
                <ending_amount_in_cents nil=\"nil\"></ending_amount_in_cents>
                <usage_percentage>20.0</usage_percentage>
              </tier>
            </tiers>
          </percentage_tier>
        </percentage_tiers>
      </add_on>\n", $addon->xml());
  }
}
