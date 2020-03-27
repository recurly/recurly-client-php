<?php

/**
 * class Recurly_Addon
 * @property Recurly_Stub $plan The URL of the associated Recurly_Plan for this add-on.
 * @property Recurly_Stub $measured_unit The URL of the associated Recurly_MeasuredUnit for this add-on.
 * @property Recurly_Stub $item The URL of the associated Recurly_Item for this add-on, if one exists.
 * @property string $add_on_code The add-on code. Max of 50 characters. If item_code is present, add_on_code must be absent. If item_code is not present, add_on_code is required.
 * @property string $name The add-on name. Max of 255 characters. If item_code is present, name must be absent. If item_code is not present, name is required.
 * @property string $item_code Item code for an existing active item to be used as an add-on on the plan.
 * @property int $default_quantity Default quantity for the hosted pages, defaults to 1.
 * @property int $default_quantity_on_hosted_page If true, displays a quantity field on the hosted pages for the add-on.
 * @property string $tax_code Optional field for EU VAT merchants and Avalara AvaTax Pro merchants. If you are using Recurly's EU VAT feature, you can use values of: [unknown, physical, digital]. If you have your own AvaTax account configured, you can use Avalara's tax codes to assign custom tax rules. If item_code is present, tax_code must be absent.
 * @property Recurly_CurrencyList $unit_amount_in_cents Array of unit amounts with their currency code. Max 10000000. Ex. $5.00 USD would be <USD>500</USD>. Optional if item_code is present and existing item has default pricing. Otherwise unit_amount_in_cents is required.
 * @property string $accounting_code Accounting code for invoice line items for the add-on, defaults to the value of add_on_code. Max of 20 characters. If item_code is present, accounting_code must be absent.
 * @property string $add_on_type Whether the add-on is Fixed-Price (fixed), or Usage-Based (usage). If item_code is present, add_on_type must be absent.
 * @property boolean $optional Whether the add-on is optional for the customer to include in their purchase on the hosted payment page.
 * @property string $usage_type string If add_on_type = usage, you must set a usage_type, which can be 'price' or 'percentage'. If 'price', the price is defined in unit_amount_in_cents. If 'percentage', the percentage is defined in usage_percentage. If 'item_code' present, usage_type must be absent.
 * @property float $usage_percentage If add_on_type = usage and usage_type = percentage, you must set a usage_percentage. Must be between 0.0000 and 100.0000. If item_code is present, usage_percentage must be absent.
 * @property string $revenue_schedule_type Optional field for setting a revenue schedule type. This will determine how revenue for the associated Plan should be recognized. When creating a Plan, if you supply an end_date and end_date available schedule types are never, evenly, at_range_start, or at_range_end. If item_code is present, revenue_schedule_type must be absent.
 * @property DateTime $created_at The date and time the add-on was created.
 * @property DateTime $updated_at The date and time the add-on was last updated.
 * @property string $plan_code Unique code to identify the plan.
 * @property string $measured_unit_id The id of the measured unit on your site associated with the add-on. If item_code is present, measured_unit_id must be absent.
 * @property string $tier_type The type of tiered pricing. Types are 'tiered,' 'volume,' and 'stairstep.'
 * @property Recurly_Tier[] $tiers The array of tiers for the add-on.
 */
class Recurly_Addon extends Recurly_Resource
{
  function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
    $this->unit_amount_in_cents = new Recurly_CurrencyList('unit_amount_in_cents');
  }

  public static function get($planCode, $addonCode, $client = null) {
    return Recurly_Base::_get(Recurly_Addon::uriForAddOn($planCode, $addonCode), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_PLANS . '/' . rawurlencode($this->plan_code) . Recurly_Client::PATH_ADDONS);
  }

  public function update() {
    return $this->_save(Recurly_Client::PUT, $this->uri());
  }

  public function delete() {
    return Recurly_Base::_delete($this->uri(), $this->_client);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_Addon::uriForAddOn($this->plan_code, $this->add_on_code);
  }
  protected static function uriForAddOn($planCode, $addonCode) {
    return (Recurly_Client::PATH_PLANS . '/' . rawurlencode($planCode) .
            Recurly_Client::PATH_ADDONS . '/' . rawurlencode($addonCode));
  }

  protected function getNodeName() {
    return 'add_on';
  }
  protected function getWriteableAttributes() {
    return array(
      'add_on_code', 'item_code', 'name', 'display_quantity', 'default_quantity',
      'unit_amount_in_cents', 'accounting_code', 'tax_code',
      'measured_unit_id', 'usage_type', 'usage_percentage', 'add_on_type', 'revenue_schedule_type',
      'optional', 'display_quantity_on_hosted_page', 'tier_type', 'tiers'
    );
  }
}
