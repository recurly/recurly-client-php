<?php

/**
 * class Recurly_Adjustment
 * @property string $type The type of adjustment to return: charge or credit.
 * @property Recurly_Stub $account The URL of the account for the specified adjustment.
 * @property Recurly_Stub $bill_for_account The URL of the bill_for_account for the specified adjustment.
 * @property Recurly_Stub $invoice The URL of the invoice for the specified adjustment.
 * @property Recurly_Stub $item The URL of the item for the specified adjustment.
 * @property string $item_code The item_code for the item associated with the adjustment, if there is one. Associates the adjustment with an item and sets related attributes on the adjustment from the default values on the item. <description>, <product_code>, <accounting_code>, <tax_exempt> and <tax_code> are not accepted when <item_code> is present.
 * @property string $external_sku Only shows if adjustment is created with an item_code with an external_sku.
 * @property string $uuid The unique identifier of the adjustment.
 * @property string $state The state of the adjustments to return: pending or invoiced.
 * @property string $description Description of the adjustment for the adjustment. Max 255 characters.
 * @property string $accounting_code Accounting code. Max of 20 characters.
 * @property string $origin The origin of the adjustment to return: plan, plan_trial, setup_fee, add_on, add_on_trial, one_time, debit, credit, coupon, or carryforward.
 * @property integer $unit_amount_in_cents Positive amount for a charge, negative amount for a credit. Max 10000000.
 * @property integer $quantity Quantity.
 * @property string $quantity_decimal Quantity if usage amounts are logged with decimal values.
 * @property integer $quantity_remaining Remaining quantity available to be refunded.
 * @property string $quantity_decimal_remaining Remaining quantity available to be refunded, with decimal precision (up to 9 decimal places).
 * @property string $original_adjustment_uuid Only shows if adjustment is a credit created from another credit.
 * @property integer $discount_in_cents The discount on the adjustment, in cents.
 * @property integer $tax_in_cents The tax on the adjustment, in cents.
 * @property integer $total_in_cents The total amount of the adjustment, in cents.
 * @property string $currency Currency, 3-letter ISO code.
 * @property boolean $taxable true if the current adjustment is taxable, false if it is not.
 * @property string $tax_type The tax type of the adjustment.
 * @property string $tax_region The tax region of the adjustment.
 * @property float $tax_rate The tax rate of the adjustment.
 * @property boolean $tax_exempt true exempts tax on the charge, false applies tax on the charge. If not defined, then defaults to the Plan and Site settings. This attribute does not work for credits (negative adjustments). Credits are always post-tax. Pre-tax discounts should use the Coupons feature.
 * @property mixed[] $tax_details The nested address information of the adjustment: name, type, tax_rate, tax_in_cents.
 * @property string $tax_code Optional field for EU VAT merchants and Avalara AvaTax Pro merchants. If you are using Recurly's EU VAT feature, you can use values of unknown, physical, or digital. If you have your own AvaTax account configured, you can use Avalara tax codes to assign custom tax rules.
 * @property string $product_code Merchant defined product code
 * @property string $credit_reason_code Can be set if adjustment is a credit (unit_amount_in_cents < 0). Allowed values: [general, service, promotional, refund, gift_card, write_off]. Defaults to "general".
 * @property Recurly_ShippingAddress $shipping_address The Recurly_ShippingAddress object associated with this adjustment.
 * @property string $shipping_address_id The id of Recurly_ShippingAddress object associated with this adjustment.
 * @property string (SET) $liability_gl_account_id The ID of the liability general ledger account associated with the adjustment to be created. Its associated code will be stored on the adjustment.
 * @property string (SET) $revenue_gl_account_id The ID of the revenue general ledger account associated with the adjustment to be created. Its associated code will be stored on the adjustment.
 * @property string $performance_obligation_id The ID of the performance obligation associated with the adjustment.
 * @property string (GET) $liability_gl_account_code The code of the liability general ledger account associated with the adjustment. Once it is determined from the general ledger account specified in the request, it cannot be changed.
 * @property string (GET) $revenue_gl_account_code The code of the revenue general ledger account associated with the adjustment. Once it is determined from the general ledger account specified in the request, it cannot be changed.
 * @property DateTime $start_date A timestamp associated with when the adjustment began.
 * @property DateTime $end_date A timestamp associated with when the adjustment ended.
 * @property DateTime $created_at A timestamp associated with when the adjustment was created.
 * @property Recurly_CustomFieldList $custom_fields Optional custom fields for the adjustment.
 */
class Recurly_Adjustment extends Recurly_Resource
{
  public function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
    $this->custom_fields = new Recurly_CustomFieldList();
  }

  public static function get($adjustment_uuid, $client = null) {
    return Recurly_Base::_get(self::_safeUri(Recurly_Client::PATH_ADJUSTMENTS, $adjustment_uuid), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, $this->createUriForAccount());
  }

  public function delete() {
    return Recurly_Base::_delete($this->getHref(), $this->_client);
  }

  /**
   * Allows you to refund this particular item if it's a part of
   * an invoice. It does this by calling the invoice's refund()
   * Only 'invoiced' adjustments can be refunded.
   *
   * @param Integer the quantity you wish to refund, defaults to refunding the entire quantity
   * @param String the quantity you wish to refund with decimal precision (up to 9 decimal places), defaults to refunding the entire quantity_decimal
   * @param Boolean indicates whether you want this adjustment refund prorated
   * @param String indicates the refund order to apply, valid options: {'credit_first', 'transaction_first'}, defaults to 'credit_first'
   * @return Recurly_Invoice the new refund invoice
   * @throws Recurly_Error if the adjustment cannot be refunded.
   */
  public function refund($quantity = null, $prorate = false, $refund_apply_order = 'credit_first') {
    if ($this->state == 'pending') {
      throw new Recurly_Error("Only invoiced adjustments can be refunded");
    }
    $invoice = $this->invoice->get();
    return $invoice->refund($this->toRefundAttributes($quantity, $prorate), $refund_apply_order);
  }

  public function refundWithDecimal($quantity_decimal = null, $prorate = false, $refund_apply_order = 'credit_first') {
    if ($this->state == 'pending') {
      throw new Recurly_Error("Only invoiced adjustments can be refunded");
    }
    $invoice = $this->invoice->get();
    return $invoice->refund($this->toRefundAttributesWithDecimal($quantity_decimal, $prorate), $refund_apply_order);
  }
  /**
   * Converts this adjustment into the attributes needed for a refund.
   *
   * @param Integer the quantity you wish to refund, defaults to refunding the entire quantity
   * @param String the quantity you wish to refund with decimal precision, defaults to refunding the entire quantity_decimal
   * @param Boolean indicates whether you want this adjustment refund prorated
   * @return Array an array of refund attributes to be fed into invoice->refund()
   */
  public function toRefundAttributes($quantity = null, $prorate = false) {
    if (is_null($quantity)) $quantity = $this->quantity;

    return array('uuid' => $this->uuid, 'quantity' => $quantity, 'prorate' => $prorate);
  }

  public function toRefundAttributesWithDecimal($quantity_decimal = null, $prorate = false) {
    if (is_null($quantity_decimal)) $quantity_decimal = $this->quantity_decimal;

    return array('uuid' => $this->uuid, 'quantity_decimal' => $quantity_decimal, 'prorate' => $prorate);
  }

  protected function createUriForAccount() {
    return self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $this->account_code, Recurly_Client::PATH_ADJUSTMENTS);
  }

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'adjustments')) {
      $adjustmentNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $adjustmentNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getNodeName() {
    return 'adjustment';
  }

  protected function getWriteableAttributes() {
    return array(
      'currency', 'unit_amount_in_cents', 'quantity', 'quantity_decimal', 'description',
      'accounting_code', 'tax_exempt', 'tax_inclusive', 'tax_code', 'start_date', 'end_date',
      'revenue_schedule_type', 'origin', 'product_code', 'credit_reason_code',
      'shipping_address', 'shipping_address_id', 'item_code', 'external_sku', 'custom_fields',
      'revenue_gl_account_id', 'liability_gl_account_id', 'performance_obligation_id'
    );
  }
}
