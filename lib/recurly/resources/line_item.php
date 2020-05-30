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
    * Account mini details
    *
    * @return ?\Recurly\Resources\AccountMini
    */
    public function getAccount(): ?\Recurly\Resources\AccountMini
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
    public function setAccount(\Recurly\Resources\AccountMini $account): void
    {
        $this->_account = $account;
    }

    /**
    * Getter method for the accounting_code attribute.
    * Internal accounting code to help you reconcile your revenue to the correct ledger. Line items created as part of a subscription invoice will use the plan or add-on's accounting code, otherwise the value will only be present if you define an accounting code when creating the line item.
    *
    * @return ?string
    */
    public function getAccountingCode(): ?string
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
    public function setAccountingCode(string $accounting_code): void
    {
        $this->_accounting_code = $accounting_code;
    }

    /**
    * Getter method for the add_on_code attribute.
    * If the line item is a charge or credit for an add-on, this is its code.
    *
    * @return ?string
    */
    public function getAddOnCode(): ?string
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
    public function setAddOnCode(string $add_on_code): void
    {
        $this->_add_on_code = $add_on_code;
    }

    /**
    * Getter method for the add_on_id attribute.
    * If the line item is a charge or credit for an add-on this is its ID.
    *
    * @return ?string
    */
    public function getAddOnId(): ?string
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
    public function setAddOnId(string $add_on_id): void
    {
        $this->_add_on_id = $add_on_id;
    }

    /**
    * Getter method for the amount attribute.
    * `(quantity * unit_amount) - (discount + tax)`
    *
    * @return ?float
    */
    public function getAmount(): ?float
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
    public function setAmount(float $amount): void
    {
        $this->_amount = $amount;
    }

    /**
    * Getter method for the created_at attribute.
    * When the line item was created.
    *
    * @return ?string
    */
    public function getCreatedAt(): ?string
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
    public function setCreatedAt(string $created_at): void
    {
        $this->_created_at = $created_at;
    }

    /**
    * Getter method for the credit_applied attribute.
    * The amount of credit from this line item that was applied to the invoice.
    *
    * @return ?float
    */
    public function getCreditApplied(): ?float
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
    public function setCreditApplied(float $credit_applied): void
    {
        $this->_credit_applied = $credit_applied;
    }

    /**
    * Getter method for the credit_reason_code attribute.
    * The reason the credit was given when line item is `type=credit`.
    *
    * @return ?string
    */
    public function getCreditReasonCode(): ?string
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
    public function setCreditReasonCode(string $credit_reason_code): void
    {
        $this->_credit_reason_code = $credit_reason_code;
    }

    /**
    * Getter method for the currency attribute.
    * 3-letter ISO 4217 currency code.
    *
    * @return ?string
    */
    public function getCurrency(): ?string
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
    public function setCurrency(string $currency): void
    {
        $this->_currency = $currency;
    }

    /**
    * Getter method for the description attribute.
    * Description that appears on the invoice. For subscription related items this will be filled in automatically.
    *
    * @return ?string
    */
    public function getDescription(): ?string
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
    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }

    /**
    * Getter method for the discount attribute.
    * The discount applied to the line item.
    *
    * @return ?float
    */
    public function getDiscount(): ?float
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
    public function setDiscount(float $discount): void
    {
        $this->_discount = $discount;
    }

    /**
    * Getter method for the end_date attribute.
    * If this date is provided, it indicates the end of a time range.
    *
    * @return ?string
    */
    public function getEndDate(): ?string
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
    public function setEndDate(string $end_date): void
    {
        $this->_end_date = $end_date;
    }

    /**
    * Getter method for the external_sku attribute.
    * Optional Stock Keeping Unit assigned to an item. Available when the Credit Invoices and Subscription Billing Terms features are enabled.
    *
    * @return ?string
    */
    public function getExternalSku(): ?string
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
    public function setExternalSku(string $external_sku): void
    {
        $this->_external_sku = $external_sku;
    }

    /**
    * Getter method for the id attribute.
    * Line item ID
    *
    * @return ?string
    */
    public function getId(): ?string
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
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
    * Getter method for the invoice_id attribute.
    * Once the line item has been invoiced this will be the invoice's ID.
    *
    * @return ?string
    */
    public function getInvoiceId(): ?string
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
    public function setInvoiceId(string $invoice_id): void
    {
        $this->_invoice_id = $invoice_id;
    }

    /**
    * Getter method for the invoice_number attribute.
    * Once the line item has been invoiced this will be the invoice's number. If VAT taxation and the Country Invoice Sequencing feature are enabled, invoices will have country-specific invoice numbers for invoices billed to EU countries (ex: FR1001). Non-EU invoices will continue to use the site-level invoice number sequence.
    *
    * @return ?string
    */
    public function getInvoiceNumber(): ?string
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
    public function setInvoiceNumber(string $invoice_number): void
    {
        $this->_invoice_number = $invoice_number;
    }

    /**
    * Getter method for the item_code attribute.
    * Unique code to identify an item. Available when the Credit Invoices and Subscription Billing Terms features are enabled.
    *
    * @return ?string
    */
    public function getItemCode(): ?string
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
    public function setItemCode(string $item_code): void
    {
        $this->_item_code = $item_code;
    }

    /**
    * Getter method for the item_id attribute.
    * System-generated unique identifier for an item. Available when the Credit Invoices and Subscription Billing Terms features are enabled.
    *
    * @return ?string
    */
    public function getItemId(): ?string
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
    public function setItemId(string $item_id): void
    {
        $this->_item_id = $item_id;
    }

    /**
    * Getter method for the legacy_category attribute.
    * Category to describe the role of a line item on a legacy invoice:
- "charges" refers to charges being billed for on this invoice.
- "credits" refers to refund or proration credits. This portion of the invoice can be considered a credit memo.
- "applied_credits" refers to previous credits applied to this invoice. See their original_line_item_id to determine where the credit first originated.
- "carryforwards" can be ignored. They exist to consume any remaining credit balance. A new credit with the same amount will be created and placed back on the account.

    *
    * @return ?string
    */
    public function getLegacyCategory(): ?string
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
    public function setLegacyCategory(string $legacy_category): void
    {
        $this->_legacy_category = $legacy_category;
    }

    /**
    * Getter method for the object attribute.
    * Object type
    *
    * @return ?string
    */
    public function getObject(): ?string
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
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }

    /**
    * Getter method for the origin attribute.
    * A credit created from an original charge will have the value of the charge's origin.
    *
    * @return ?string
    */
    public function getOrigin(): ?string
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
    public function setOrigin(string $origin): void
    {
        $this->_origin = $origin;
    }

    /**
    * Getter method for the original_line_item_invoice_id attribute.
    * The invoice where the credit originated. Will only have a value if the line item is a credit created from a previous credit, or if the credit was created from a charge refund.
    *
    * @return ?string
    */
    public function getOriginalLineItemInvoiceId(): ?string
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
    public function setOriginalLineItemInvoiceId(string $original_line_item_invoice_id): void
    {
        $this->_original_line_item_invoice_id = $original_line_item_invoice_id;
    }

    /**
    * Getter method for the plan_code attribute.
    * If the line item is a charge or credit for a plan or add-on, this is the plan's code.
    *
    * @return ?string
    */
    public function getPlanCode(): ?string
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
    public function setPlanCode(string $plan_code): void
    {
        $this->_plan_code = $plan_code;
    }

    /**
    * Getter method for the plan_id attribute.
    * If the line item is a charge or credit for a plan or add-on, this is the plan's ID.
    *
    * @return ?string
    */
    public function getPlanId(): ?string
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
    public function setPlanId(string $plan_id): void
    {
        $this->_plan_id = $plan_id;
    }

    /**
    * Getter method for the previous_line_item_id attribute.
    * Will only have a value if the line item is a credit created from a previous credit, or if the credit was created from a charge refund.
    *
    * @return ?string
    */
    public function getPreviousLineItemId(): ?string
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
    public function setPreviousLineItemId(string $previous_line_item_id): void
    {
        $this->_previous_line_item_id = $previous_line_item_id;
    }

    /**
    * Getter method for the product_code attribute.
    * For plan-related line items this will be the plan's code, for add-on related line items it will be the add-on's code. For item-related line items it will be the item's `external_sku`.
    *
    * @return ?string
    */
    public function getProductCode(): ?string
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
    public function setProductCode(string $product_code): void
    {
        $this->_product_code = $product_code;
    }

    /**
    * Getter method for the proration_rate attribute.
    * When a line item has been prorated, this is the rate of the proration. Proration rates were made available for line items created after March 30, 2017. For line items created prior to that date, the proration rate will be `null`, even if the line item was prorated.
    *
    * @return ?float
    */
    public function getProrationRate(): ?float
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
    public function setProrationRate(float $proration_rate): void
    {
        $this->_proration_rate = $proration_rate;
    }

    /**
    * Getter method for the quantity attribute.
    * This number will be multiplied by the unit amount to compute the subtotal before any discounts or taxes.
    *
    * @return ?int
    */
    public function getQuantity(): ?int
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
    public function setQuantity(int $quantity): void
    {
        $this->_quantity = $quantity;
    }

    /**
    * Getter method for the refund attribute.
    * Refund?
    *
    * @return ?bool
    */
    public function getRefund(): ?bool
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
    public function setRefund(bool $refund): void
    {
        $this->_refund = $refund;
    }

    /**
    * Getter method for the refunded_quantity attribute.
    * For refund charges, the quantity being refunded. For non-refund charges, the total quantity refunded (possibly over multiple refunds).
    *
    * @return ?int
    */
    public function getRefundedQuantity(): ?int
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
    public function setRefundedQuantity(int $refunded_quantity): void
    {
        $this->_refunded_quantity = $refunded_quantity;
    }

    /**
    * Getter method for the revenue_schedule_type attribute.
    * Revenue schedule type
    *
    * @return ?string
    */
    public function getRevenueScheduleType(): ?string
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
    public function setRevenueScheduleType(string $revenue_schedule_type): void
    {
        $this->_revenue_schedule_type = $revenue_schedule_type;
    }

    /**
    * Getter method for the shipping_address attribute.
    * 
    *
    * @return ?\Recurly\Resources\ShippingAddress
    */
    public function getShippingAddress(): ?\Recurly\Resources\ShippingAddress
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
    public function setShippingAddress(\Recurly\Resources\ShippingAddress $shipping_address): void
    {
        $this->_shipping_address = $shipping_address;
    }

    /**
    * Getter method for the start_date attribute.
    * If an end date is present, this is value indicates the beginning of a billing time range. If no end date is present it indicates billing for a specific date.
    *
    * @return ?string
    */
    public function getStartDate(): ?string
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
    public function setStartDate(string $start_date): void
    {
        $this->_start_date = $start_date;
    }

    /**
    * Getter method for the state attribute.
    * Pending line items are charges or credits on an account that have not been applied to an invoice yet. Invoiced line items will always have an `invoice_id` value.
    *
    * @return ?string
    */
    public function getState(): ?string
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
    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    /**
    * Getter method for the subscription_id attribute.
    * If the line item is a charge or credit for a subscription, this is its ID.
    *
    * @return ?string
    */
    public function getSubscriptionId(): ?string
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
    public function setSubscriptionId(string $subscription_id): void
    {
        $this->_subscription_id = $subscription_id;
    }

    /**
    * Getter method for the subtotal attribute.
    * `quantity * unit_amount`
    *
    * @return ?float
    */
    public function getSubtotal(): ?float
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
    public function setSubtotal(float $subtotal): void
    {
        $this->_subtotal = $subtotal;
    }

    /**
    * Getter method for the tax attribute.
    * The tax amount for the line item.
    *
    * @return ?float
    */
    public function getTax(): ?float
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
    public function setTax(float $tax): void
    {
        $this->_tax = $tax;
    }

    /**
    * Getter method for the tax_code attribute.
    * Used by Avalara, Vertex, and Recurly’s EU VAT tax feature. The tax code values are specific to each tax system. If you are using Recurly’s EU VAT feature you can use `unknown`, `physical`, or `digital`.
    *
    * @return ?string
    */
    public function getTaxCode(): ?string
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
    public function setTaxCode(string $tax_code): void
    {
        $this->_tax_code = $tax_code;
    }

    /**
    * Getter method for the tax_exempt attribute.
    * `true` exempts tax on charges, `false` applies tax on charges. If not defined, then defaults to the Plan and Site settings. This attribute does not work for credits (negative line items). Credits are always applied post-tax. Pre-tax discounts should use the Coupons feature.
    *
    * @return ?bool
    */
    public function getTaxExempt(): ?bool
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
    public function setTaxExempt(bool $tax_exempt): void
    {
        $this->_tax_exempt = $tax_exempt;
    }

    /**
    * Getter method for the tax_info attribute.
    * Tax info
    *
    * @return ?\Recurly\Resources\TaxInfo
    */
    public function getTaxInfo(): ?\Recurly\Resources\TaxInfo
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
    public function setTaxInfo(\Recurly\Resources\TaxInfo $tax_info): void
    {
        $this->_tax_info = $tax_info;
    }

    /**
    * Getter method for the taxable attribute.
    * `true` if the line item is taxable, `false` if it is not.
    *
    * @return ?bool
    */
    public function getTaxable(): ?bool
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
    public function setTaxable(bool $taxable): void
    {
        $this->_taxable = $taxable;
    }

    /**
    * Getter method for the type attribute.
    * Charges are positive line items that debit the account. Credits are negative line items that credit the account.
    *
    * @return ?string
    */
    public function getType(): ?string
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
    public function setType(string $type): void
    {
        $this->_type = $type;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Positive amount for a charge, negative amount for a credit.
    *
    * @return ?float
    */
    public function getUnitAmount(): ?float
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
    public function setUnitAmount(float $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the line item was last changed.
    *
    * @return ?string
    */
    public function getUpdatedAt(): ?string
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
    public function setUpdatedAt(string $updated_at): void
    {
        $this->_updated_at = $updated_at;
    }

    /**
    * Getter method for the uuid attribute.
    * The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    *
    * @return ?string
    */
    public function getUuid(): ?string
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
    public function setUuid(string $uuid): void
    {
        $this->_uuid = $uuid;
    }
}