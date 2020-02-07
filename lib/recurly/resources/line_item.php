<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly\Resources;

use Recurly\RecurlyResource;

// phpcs:disable
class LineItem extends RecurlyResource
{
    private $_account;
    private $_accounting_code;
    private $_add_on_code;
    private $_add_on_id;
    private $_amount;
    private $_created_at;
    private $_credit_applied;
    private $_credit_reason_code;
    private $_currency;
    private $_description;
    private $_discount;
    private $_end_date;
    private $_external_sku;
    private $_id;
    private $_invoice_id;
    private $_invoice_number;
    private $_item_code;
    private $_item_id;
    private $_legacy_category;
    private $_object;
    private $_origin;
    private $_original_line_item_invoice_id;
    private $_plan_code;
    private $_plan_id;
    private $_previous_line_item_id;
    private $_product_code;
    private $_proration_rate;
    private $_quantity;
    private $_refund;
    private $_refunded_quantity;
    private $_revenue_schedule_type;
    private $_shipping_address;
    private $_start_date;
    private $_state;
    private $_subscription_id;
    private $_subtotal;
    private $_tax;
    private $_tax_code;
    private $_tax_exempt;
    private $_tax_info;
    private $_taxable;
    private $_type;
    private $_unit_amount;
    private $_updated_at;
    private $_uuid;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the account attribute.
    *
    * @return \Recurly\Resources\AccountMini Account mini details
    */
    public function getAccount(): \Recurly\Resources\AccountMini
    {
        return $this->_account;
    }

    /**
    * Setter method for the account attribute.
    *
    * @param \Recurly\Resources\AccountMini $account
    *
    * @return void
    */
    public function setAccount(\Recurly\Resources\AccountMini $value): void
    {
        $this->_account = $value;
    }

    /**
    * Getter method for the accounting_code attribute.
    *
    * @return string Internal accounting code to help you reconcile your revenue to the correct ledger. Line items created as part of a subscription invoice will use the plan or add-on's accounting code, otherwise the value will only be present if you define an accounting code when creating the line item.
    */
    public function getAccountingCode(): string
    {
        return $this->_accounting_code;
    }

    /**
    * Setter method for the accounting_code attribute.
    *
    * @param string $accounting_code
    *
    * @return void
    */
    public function setAccountingCode(string $value): void
    {
        $this->_accounting_code = $value;
    }

    /**
    * Getter method for the add_on_code attribute.
    *
    * @return string If the line item is a charge or credit for an add-on, this is its code.
    */
    public function getAddOnCode(): string
    {
        return $this->_add_on_code;
    }

    /**
    * Setter method for the add_on_code attribute.
    *
    * @param string $add_on_code
    *
    * @return void
    */
    public function setAddOnCode(string $value): void
    {
        $this->_add_on_code = $value;
    }

    /**
    * Getter method for the add_on_id attribute.
    *
    * @return string If the line item is a charge or credit for an add-on this is its ID.
    */
    public function getAddOnId(): string
    {
        return $this->_add_on_id;
    }

    /**
    * Setter method for the add_on_id attribute.
    *
    * @param string $add_on_id
    *
    * @return void
    */
    public function setAddOnId(string $value): void
    {
        $this->_add_on_id = $value;
    }

    /**
    * Getter method for the amount attribute.
    *
    * @return float `(quantity * unit_amount) - (discount + tax)`
    */
    public function getAmount(): float
    {
        return $this->_amount;
    }

    /**
    * Setter method for the amount attribute.
    *
    * @param float $amount
    *
    * @return void
    */
    public function setAmount(float $value): void
    {
        $this->_amount = $value;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string When the line item was created.
    */
    public function getCreatedAt(): string
    {
        return $this->_created_at;
    }

    /**
    * Setter method for the created_at attribute.
    *
    * @param string $created_at
    *
    * @return void
    */
    public function setCreatedAt(string $value): void
    {
        $this->_created_at = $value;
    }

    /**
    * Getter method for the credit_applied attribute.
    *
    * @return float The amount of credit from this line item that was applied to the invoice.
    */
    public function getCreditApplied(): float
    {
        return $this->_credit_applied;
    }

    /**
    * Setter method for the credit_applied attribute.
    *
    * @param float $credit_applied
    *
    * @return void
    */
    public function setCreditApplied(float $value): void
    {
        $this->_credit_applied = $value;
    }

    /**
    * Getter method for the credit_reason_code attribute.
    *
    * @return string The reason the credit was given when line item is `type=credit`.
    */
    public function getCreditReasonCode(): string
    {
        return $this->_credit_reason_code;
    }

    /**
    * Setter method for the credit_reason_code attribute.
    *
    * @param string $credit_reason_code
    *
    * @return void
    */
    public function setCreditReasonCode(string $value): void
    {
        $this->_credit_reason_code = $value;
    }

    /**
    * Getter method for the currency attribute.
    *
    * @return string 3-letter ISO 4217 currency code.
    */
    public function getCurrency(): string
    {
        return $this->_currency;
    }

    /**
    * Setter method for the currency attribute.
    *
    * @param string $currency
    *
    * @return void
    */
    public function setCurrency(string $value): void
    {
        $this->_currency = $value;
    }

    /**
    * Getter method for the description attribute.
    *
    * @return string Description that appears on the invoice. For subscription related items this will be filled in automatically.
    */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
    * Setter method for the description attribute.
    *
    * @param string $description
    *
    * @return void
    */
    public function setDescription(string $value): void
    {
        $this->_description = $value;
    }

    /**
    * Getter method for the discount attribute.
    *
    * @return float The discount applied to the line item.
    */
    public function getDiscount(): float
    {
        return $this->_discount;
    }

    /**
    * Setter method for the discount attribute.
    *
    * @param float $discount
    *
    * @return void
    */
    public function setDiscount(float $value): void
    {
        $this->_discount = $value;
    }

    /**
    * Getter method for the end_date attribute.
    *
    * @return string If this date is provided, it indicates the end of a time range.
    */
    public function getEndDate(): string
    {
        return $this->_end_date;
    }

    /**
    * Setter method for the end_date attribute.
    *
    * @param string $end_date
    *
    * @return void
    */
    public function setEndDate(string $value): void
    {
        $this->_end_date = $value;
    }

    /**
    * Getter method for the external_sku attribute.
    *
    * @return string Optional Stock Keeping Unit assigned to an item, when the Catalog feature is enabled.
    */
    public function getExternalSku(): string
    {
        return $this->_external_sku;
    }

    /**
    * Setter method for the external_sku attribute.
    *
    * @param string $external_sku
    *
    * @return void
    */
    public function setExternalSku(string $value): void
    {
        $this->_external_sku = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Line item ID
    */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
    * Setter method for the id attribute.
    *
    * @param string $id
    *
    * @return void
    */
    public function setId(string $value): void
    {
        $this->_id = $value;
    }

    /**
    * Getter method for the invoice_id attribute.
    *
    * @return string Once the line item has been invoiced this will be the invoice's ID.
    */
    public function getInvoiceId(): string
    {
        return $this->_invoice_id;
    }

    /**
    * Setter method for the invoice_id attribute.
    *
    * @param string $invoice_id
    *
    * @return void
    */
    public function setInvoiceId(string $value): void
    {
        $this->_invoice_id = $value;
    }

    /**
    * Getter method for the invoice_number attribute.
    *
    * @return string Once the line item has been invoiced this will be the invoice's number. If VAT taxation and the Country Invoice Sequencing feature are enabled, invoices will have country-specific invoice numbers for invoices billed to EU countries (ex: FR1001). Non-EU invoices will continue to use the site-level invoice number sequence.
    */
    public function getInvoiceNumber(): string
    {
        return $this->_invoice_number;
    }

    /**
    * Setter method for the invoice_number attribute.
    *
    * @param string $invoice_number
    *
    * @return void
    */
    public function setInvoiceNumber(string $value): void
    {
        $this->_invoice_number = $value;
    }

    /**
    * Getter method for the item_code attribute.
    *
    * @return string Unique code to identify an item, when the Catalog feature is enabled.
    */
    public function getItemCode(): string
    {
        return $this->_item_code;
    }

    /**
    * Setter method for the item_code attribute.
    *
    * @param string $item_code
    *
    * @return void
    */
    public function setItemCode(string $value): void
    {
        $this->_item_code = $value;
    }

    /**
    * Getter method for the item_id attribute.
    *
    * @return string Available when the Catalog feature is enabled.
    */
    public function getItemId(): string
    {
        return $this->_item_id;
    }

    /**
    * Setter method for the item_id attribute.
    *
    * @param string $item_id
    *
    * @return void
    */
    public function setItemId(string $value): void
    {
        $this->_item_id = $value;
    }

    /**
    * Getter method for the legacy_category attribute.
    *
    * @return string Category to describe the role of a line item on a legacy invoice:
- "charges" refers to charges being billed for on this invoice.
- "credits" refers to refund or proration credits. This portion of the invoice can be considered a credit memo.
- "applied_credits" refers to previous credits applied to this invoice. See their original_line_item_id to determine where the credit first originated.
- "carryforwards" can be ignored. They exist to consume any remaining credit balance. A new credit with the same amount will be created and placed back on the account.

    */
    public function getLegacyCategory(): string
    {
        return $this->_legacy_category;
    }

    /**
    * Setter method for the legacy_category attribute.
    *
    * @param string $legacy_category
    *
    * @return void
    */
    public function setLegacyCategory(string $value): void
    {
        $this->_legacy_category = $value;
    }

    /**
    * Getter method for the object attribute.
    *
    * @return string Object type
    */
    public function getObject(): string
    {
        return $this->_object;
    }

    /**
    * Setter method for the object attribute.
    *
    * @param string $object
    *
    * @return void
    */
    public function setObject(string $value): void
    {
        $this->_object = $value;
    }

    /**
    * Getter method for the origin attribute.
    *
    * @return string A credit created from an original charge will have the value of the charge's origin.
    */
    public function getOrigin(): string
    {
        return $this->_origin;
    }

    /**
    * Setter method for the origin attribute.
    *
    * @param string $origin
    *
    * @return void
    */
    public function setOrigin(string $value): void
    {
        $this->_origin = $value;
    }

    /**
    * Getter method for the original_line_item_invoice_id attribute.
    *
    * @return string The invoice where the credit originated. Will only have a value if the line item is a credit created from a previous credit, or if the credit was created from a charge refund.
    */
    public function getOriginalLineItemInvoiceId(): string
    {
        return $this->_original_line_item_invoice_id;
    }

    /**
    * Setter method for the original_line_item_invoice_id attribute.
    *
    * @param string $original_line_item_invoice_id
    *
    * @return void
    */
    public function setOriginalLineItemInvoiceId(string $value): void
    {
        $this->_original_line_item_invoice_id = $value;
    }

    /**
    * Getter method for the plan_code attribute.
    *
    * @return string If the line item is a charge or credit for a plan or add-on, this is the plan's code.
    */
    public function getPlanCode(): string
    {
        return $this->_plan_code;
    }

    /**
    * Setter method for the plan_code attribute.
    *
    * @param string $plan_code
    *
    * @return void
    */
    public function setPlanCode(string $value): void
    {
        $this->_plan_code = $value;
    }

    /**
    * Getter method for the plan_id attribute.
    *
    * @return string If the line item is a charge or credit for a plan or add-on, this is the plan's ID.
    */
    public function getPlanId(): string
    {
        return $this->_plan_id;
    }

    /**
    * Setter method for the plan_id attribute.
    *
    * @param string $plan_id
    *
    * @return void
    */
    public function setPlanId(string $value): void
    {
        $this->_plan_id = $value;
    }

    /**
    * Getter method for the previous_line_item_id attribute.
    *
    * @return string Will only have a value if the line item is a credit created from a previous credit, or if the credit was created from a charge refund.
    */
    public function getPreviousLineItemId(): string
    {
        return $this->_previous_line_item_id;
    }

    /**
    * Setter method for the previous_line_item_id attribute.
    *
    * @param string $previous_line_item_id
    *
    * @return void
    */
    public function setPreviousLineItemId(string $value): void
    {
        $this->_previous_line_item_id = $value;
    }

    /**
    * Getter method for the product_code attribute.
    *
    * @return string For plan-related line items this will be the plan's code, for add-on related line items it will be the add-on's code. For item-related line itmes it will be the item's `external_sku`.
    */
    public function getProductCode(): string
    {
        return $this->_product_code;
    }

    /**
    * Setter method for the product_code attribute.
    *
    * @param string $product_code
    *
    * @return void
    */
    public function setProductCode(string $value): void
    {
        $this->_product_code = $value;
    }

    /**
    * Getter method for the proration_rate attribute.
    *
    * @return float When a line item has been prorated, this is the rate of the proration. Proration rates were made available for line items created after March 30, 2017. For line items created prior to that date, the proration rate will be `null`, even if the line item was prorated.
    */
    public function getProrationRate(): float
    {
        return $this->_proration_rate;
    }

    /**
    * Setter method for the proration_rate attribute.
    *
    * @param float $proration_rate
    *
    * @return void
    */
    public function setProrationRate(float $value): void
    {
        $this->_proration_rate = $value;
    }

    /**
    * Getter method for the quantity attribute.
    *
    * @return int This number will be multiplied by the unit amount to compute the subtotal before any discounts or taxes.
    */
    public function getQuantity(): int
    {
        return $this->_quantity;
    }

    /**
    * Setter method for the quantity attribute.
    *
    * @param int $quantity
    *
    * @return void
    */
    public function setQuantity(int $value): void
    {
        $this->_quantity = $value;
    }

    /**
    * Getter method for the refund attribute.
    *
    * @return bool Refund?
    */
    public function getRefund(): bool
    {
        return $this->_refund;
    }

    /**
    * Setter method for the refund attribute.
    *
    * @param bool $refund
    *
    * @return void
    */
    public function setRefund(bool $value): void
    {
        $this->_refund = $value;
    }

    /**
    * Getter method for the refunded_quantity attribute.
    *
    * @return int For refund charges, the quantity being refunded. For non-refund charges, the total quantity refunded (possibly over multiple refunds).
    */
    public function getRefundedQuantity(): int
    {
        return $this->_refunded_quantity;
    }

    /**
    * Setter method for the refunded_quantity attribute.
    *
    * @param int $refunded_quantity
    *
    * @return void
    */
    public function setRefundedQuantity(int $value): void
    {
        $this->_refunded_quantity = $value;
    }

    /**
    * Getter method for the revenue_schedule_type attribute.
    *
    * @return string Revenue schedule type
    */
    public function getRevenueScheduleType(): string
    {
        return $this->_revenue_schedule_type;
    }

    /**
    * Setter method for the revenue_schedule_type attribute.
    *
    * @param string $revenue_schedule_type
    *
    * @return void
    */
    public function setRevenueScheduleType(string $value): void
    {
        $this->_revenue_schedule_type = $value;
    }

    /**
    * Getter method for the shipping_address attribute.
    *
    * @return \Recurly\Resources\ShippingAddress 
    */
    public function getShippingAddress(): \Recurly\Resources\ShippingAddress
    {
        return $this->_shipping_address;
    }

    /**
    * Setter method for the shipping_address attribute.
    *
    * @param \Recurly\Resources\ShippingAddress $shipping_address
    *
    * @return void
    */
    public function setShippingAddress(\Recurly\Resources\ShippingAddress $value): void
    {
        $this->_shipping_address = $value;
    }

    /**
    * Getter method for the start_date attribute.
    *
    * @return string If an end date is present, this is value indicates the beginning of a billing time range. If no end date is present it indicates billing for a specific date.
    */
    public function getStartDate(): string
    {
        return $this->_start_date;
    }

    /**
    * Setter method for the start_date attribute.
    *
    * @param string $start_date
    *
    * @return void
    */
    public function setStartDate(string $value): void
    {
        $this->_start_date = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string Pending line items are charges or credits on an account that have not been applied to an invoice yet. Invoiced line items will always have an `invoice_id` value.
    */
    public function getState(): string
    {
        return $this->_state;
    }

    /**
    * Setter method for the state attribute.
    *
    * @param string $state
    *
    * @return void
    */
    public function setState(string $value): void
    {
        $this->_state = $value;
    }

    /**
    * Getter method for the subscription_id attribute.
    *
    * @return string If the line item is a charge or credit for a subscription, this is its ID.
    */
    public function getSubscriptionId(): string
    {
        return $this->_subscription_id;
    }

    /**
    * Setter method for the subscription_id attribute.
    *
    * @param string $subscription_id
    *
    * @return void
    */
    public function setSubscriptionId(string $value): void
    {
        $this->_subscription_id = $value;
    }

    /**
    * Getter method for the subtotal attribute.
    *
    * @return float `quantity * unit_amount`
    */
    public function getSubtotal(): float
    {
        return $this->_subtotal;
    }

    /**
    * Setter method for the subtotal attribute.
    *
    * @param float $subtotal
    *
    * @return void
    */
    public function setSubtotal(float $value): void
    {
        $this->_subtotal = $value;
    }

    /**
    * Getter method for the tax attribute.
    *
    * @return float The tax amount for the line item.
    */
    public function getTax(): float
    {
        return $this->_tax;
    }

    /**
    * Setter method for the tax attribute.
    *
    * @param float $tax
    *
    * @return void
    */
    public function setTax(float $value): void
    {
        $this->_tax = $value;
    }

    /**
    * Getter method for the tax_code attribute.
    *
    * @return string Used by Avalara, Vertex, and Recurly’s EU VAT tax feature. The tax code values are specific to each tax system. If you are using Recurly’s EU VAT feature you can use `unknown`, `physical`, or `digital`.
    */
    public function getTaxCode(): string
    {
        return $this->_tax_code;
    }

    /**
    * Setter method for the tax_code attribute.
    *
    * @param string $tax_code
    *
    * @return void
    */
    public function setTaxCode(string $value): void
    {
        $this->_tax_code = $value;
    }

    /**
    * Getter method for the tax_exempt attribute.
    *
    * @return bool `true` exempts tax on charges, `false` applies tax on charges. If not defined, then defaults to the Plan and Site settings. This attribute does not work for credits (negative line items). Credits are always applied post-tax. Pre-tax discounts should use the Coupons feature.
    */
    public function getTaxExempt(): bool
    {
        return $this->_tax_exempt;
    }

    /**
    * Setter method for the tax_exempt attribute.
    *
    * @param bool $tax_exempt
    *
    * @return void
    */
    public function setTaxExempt(bool $value): void
    {
        $this->_tax_exempt = $value;
    }

    /**
    * Getter method for the tax_info attribute.
    *
    * @return \Recurly\Resources\TaxInfo Tax info
    */
    public function getTaxInfo(): \Recurly\Resources\TaxInfo
    {
        return $this->_tax_info;
    }

    /**
    * Setter method for the tax_info attribute.
    *
    * @param \Recurly\Resources\TaxInfo $tax_info
    *
    * @return void
    */
    public function setTaxInfo(\Recurly\Resources\TaxInfo $value): void
    {
        $this->_tax_info = $value;
    }

    /**
    * Getter method for the taxable attribute.
    *
    * @return bool `true` if the line item is taxable, `false` if it is not.
    */
    public function getTaxable(): bool
    {
        return $this->_taxable;
    }

    /**
    * Setter method for the taxable attribute.
    *
    * @param bool $taxable
    *
    * @return void
    */
    public function setTaxable(bool $value): void
    {
        $this->_taxable = $value;
    }

    /**
    * Getter method for the type attribute.
    *
    * @return string Charges are positive line items that debit the account. Credits are negative line items that credit the account.
    */
    public function getType(): string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $value): void
    {
        $this->_type = $value;
    }

    /**
    * Getter method for the unit_amount attribute.
    *
    * @return float Positive amount for a charge, negative amount for a credit.
    */
    public function getUnitAmount(): float
    {
        return $this->_unit_amount;
    }

    /**
    * Setter method for the unit_amount attribute.
    *
    * @param float $unit_amount
    *
    * @return void
    */
    public function setUnitAmount(float $value): void
    {
        $this->_unit_amount = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string When the line item was last changed.
    */
    public function getUpdatedAt(): string
    {
        return $this->_updated_at;
    }

    /**
    * Setter method for the updated_at attribute.
    *
    * @param string $updated_at
    *
    * @return void
    */
    public function setUpdatedAt(string $value): void
    {
        $this->_updated_at = $value;
    }

    /**
    * Getter method for the uuid attribute.
    *
    * @return string The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    */
    public function getUuid(): string
    {
        return $this->_uuid;
    }

    /**
    * Setter method for the uuid attribute.
    *
    * @param string $uuid
    *
    * @return void
    */
    public function setUuid(string $value): void
    {
        $this->_uuid = $value;
    }
}