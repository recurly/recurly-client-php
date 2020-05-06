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
class Invoice extends RecurlyResource
{
    private $_account;
    private $_address;
    private $_balance;
    private $_closed_at;
    private $_collection_method;
    private $_created_at;
    private $_credit_payments;
    private $_currency;
    private $_customer_notes;
    private $_discount;
    private $_due_at;
    private $_id;
    private $_line_items;
    private $_net_terms;
    private $_number;
    private $_object;
    private $_origin;
    private $_paid;
    private $_po_number;
    private $_previous_invoice_id;
    private $_refundable_amount;
    private $_shipping_address;
    private $_state;
    private $_subscription_ids;
    private $_subtotal;
    private $_tax;
    private $_tax_info;
    private $_terms_and_conditions;
    private $_total;
    private $_transactions;
    private $_type;
    private $_updated_at;
    private $_vat_number;
    private $_vat_reverse_charge_notes;

    protected static $array_hints = array(
        'setCreditPayments' => '\Recurly\Resources\CreditPayment',
        'setSubscriptionIds' => 'string',
        'setTransactions' => '\Recurly\Resources\Transaction',
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
    * Getter method for the address attribute.
    * 
    *
    * @return ?\Recurly\Resources\InvoiceAddress
    */
    public function getAddress(): ?\Recurly\Resources\InvoiceAddress
    {
        return $this->_address;
    }

    /**
    * Setter method for the address attribute.
    *
    * @param \Recurly\Resources\InvoiceAddress $address
    *
    * @return void
    */
    public function setAddress(\Recurly\Resources\InvoiceAddress $address): void
    {
        $this->_address = $address;
    }

    /**
    * Getter method for the balance attribute.
    * The outstanding balance remaining on this invoice.
    *
    * @return ?float
    */
    public function getBalance(): ?float
    {
        return $this->_balance;
    }

    /**
    * Setter method for the balance attribute.
    *
    * @param float $balance
    *
    * @return void
    */
    public function setBalance(float $balance): void
    {
        $this->_balance = $balance;
    }

    /**
    * Getter method for the closed_at attribute.
    * Date invoice was marked paid or failed.
    *
    * @return ?string
    */
    public function getClosedAt(): ?string
    {
        return $this->_closed_at;
    }

    /**
    * Setter method for the closed_at attribute.
    *
    * @param string $closed_at
    *
    * @return void
    */
    public function setClosedAt(string $closed_at): void
    {
        $this->_closed_at = $closed_at;
    }

    /**
    * Getter method for the collection_method attribute.
    * An automatic invoice means a corresponding transaction is run using the account's billing information at the same time the invoice is created. Manual invoices are created without a corresponding transaction. The merchant must enter a manual payment transaction or have the customer pay the invoice with an automatic method, like credit card, PayPal, Amazon, or ACH bank payment.
    *
    * @return ?string
    */
    public function getCollectionMethod(): ?string
    {
        return $this->_collection_method;
    }

    /**
    * Setter method for the collection_method attribute.
    *
    * @param string $collection_method
    *
    * @return void
    */
    public function setCollectionMethod(string $collection_method): void
    {
        $this->_collection_method = $collection_method;
    }

    /**
    * Getter method for the created_at attribute.
    * Created at
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
    * Getter method for the credit_payments attribute.
    * Credit payments
    *
    * @return array
    */
    public function getCreditPayments(): array
    {
        return $this->_credit_payments ?? [] ;
    }

    /**
    * Setter method for the credit_payments attribute.
    *
    * @param array $credit_payments
    *
    * @return void
    */
    public function setCreditPayments(array $credit_payments): void
    {
        $this->_credit_payments = $credit_payments;
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
    * Getter method for the customer_notes attribute.
    * This will default to the Customer Notes text specified on the Invoice Settings. Specify custom notes to add or override Customer Notes.
    *
    * @return ?string
    */
    public function getCustomerNotes(): ?string
    {
        return $this->_customer_notes;
    }

    /**
    * Setter method for the customer_notes attribute.
    *
    * @param string $customer_notes
    *
    * @return void
    */
    public function setCustomerNotes(string $customer_notes): void
    {
        $this->_customer_notes = $customer_notes;
    }

    /**
    * Getter method for the discount attribute.
    * Total discounts applied to this invoice.
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
    * Getter method for the due_at attribute.
    * Date invoice is due. This is the date the net terms are reached.
    *
    * @return ?string
    */
    public function getDueAt(): ?string
    {
        return $this->_due_at;
    }

    /**
    * Setter method for the due_at attribute.
    *
    * @param string $due_at
    *
    * @return void
    */
    public function setDueAt(string $due_at): void
    {
        $this->_due_at = $due_at;
    }

    /**
    * Getter method for the id attribute.
    * Invoice ID
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
    * Getter method for the line_items attribute.
    * 
    *
    * @return ?\Recurly\Resources\LineItemList
    */
    public function getLineItems(): ?\Recurly\Resources\LineItemList
    {
        return $this->_line_items;
    }

    /**
    * Setter method for the line_items attribute.
    *
    * @param \Recurly\Resources\LineItemList $line_items
    *
    * @return void
    */
    public function setLineItems(\Recurly\Resources\LineItemList $line_items): void
    {
        $this->_line_items = $line_items;
    }

    /**
    * Getter method for the net_terms attribute.
    * Integer representing the number of days after an invoice's creation that the invoice will become past due. If an invoice's net terms are set to '0', it is due 'On Receipt' and will become past due 24 hours after it’s created. If an invoice is due net 30, it will become past due at 31 days exactly.
    *
    * @return ?int
    */
    public function getNetTerms(): ?int
    {
        return $this->_net_terms;
    }

    /**
    * Setter method for the net_terms attribute.
    *
    * @param int $net_terms
    *
    * @return void
    */
    public function setNetTerms(int $net_terms): void
    {
        $this->_net_terms = $net_terms;
    }

    /**
    * Getter method for the number attribute.
    * If VAT taxation and the Country Invoice Sequencing feature are enabled, invoices will have country-specific invoice numbers for invoices billed to EU countries (ex: FR1001). Non-EU invoices will continue to use the site-level invoice number sequence.
    *
    * @return ?string
    */
    public function getNumber(): ?string
    {
        return $this->_number;
    }

    /**
    * Setter method for the number attribute.
    *
    * @param string $number
    *
    * @return void
    */
    public function setNumber(string $number): void
    {
        $this->_number = $number;
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
    * The event that created the invoice.
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
    * Getter method for the paid attribute.
    * The total amount of successful payments transaction on this invoice.
    *
    * @return ?float
    */
    public function getPaid(): ?float
    {
        return $this->_paid;
    }

    /**
    * Setter method for the paid attribute.
    *
    * @param float $paid
    *
    * @return void
    */
    public function setPaid(float $paid): void
    {
        $this->_paid = $paid;
    }

    /**
    * Getter method for the po_number attribute.
    * For manual invoicing, this identifies the PO number associated with the subscription.
    *
    * @return ?string
    */
    public function getPoNumber(): ?string
    {
        return $this->_po_number;
    }

    /**
    * Setter method for the po_number attribute.
    *
    * @param string $po_number
    *
    * @return void
    */
    public function setPoNumber(string $po_number): void
    {
        $this->_po_number = $po_number;
    }

    /**
    * Getter method for the previous_invoice_id attribute.
    * On refund invoices, this value will exist and show the invoice ID of the purchase invoice the refund was created from.
    *
    * @return ?string
    */
    public function getPreviousInvoiceId(): ?string
    {
        return $this->_previous_invoice_id;
    }

    /**
    * Setter method for the previous_invoice_id attribute.
    *
    * @param string $previous_invoice_id
    *
    * @return void
    */
    public function setPreviousInvoiceId(string $previous_invoice_id): void
    {
        $this->_previous_invoice_id = $previous_invoice_id;
    }

    /**
    * Getter method for the refundable_amount attribute.
    * The refundable amount on a charge invoice. It will be null for all other invoices.
    *
    * @return ?float
    */
    public function getRefundableAmount(): ?float
    {
        return $this->_refundable_amount;
    }

    /**
    * Setter method for the refundable_amount attribute.
    *
    * @param float $refundable_amount
    *
    * @return void
    */
    public function setRefundableAmount(float $refundable_amount): void
    {
        $this->_refundable_amount = $refundable_amount;
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
    * Getter method for the state attribute.
    * Invoice state
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
    * Getter method for the subscription_ids attribute.
    * If the invoice is charging or refunding for one or more subscriptions, these are their IDs.
    *
    * @return array
    */
    public function getSubscriptionIds(): array
    {
        return $this->_subscription_ids ?? [] ;
    }

    /**
    * Setter method for the subscription_ids attribute.
    *
    * @param array $subscription_ids
    *
    * @return void
    */
    public function setSubscriptionIds(array $subscription_ids): void
    {
        $this->_subscription_ids = $subscription_ids;
    }

    /**
    * Getter method for the subtotal attribute.
    * The summation of charges, discounts, and credits, before tax.
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
    * The total tax on this invoice.
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
    * Getter method for the terms_and_conditions attribute.
    * This will default to the Terms and Conditions text specified on the Invoice Settings page in your Recurly admin. Specify custom notes to add or override Terms and Conditions.
    *
    * @return ?string
    */
    public function getTermsAndConditions(): ?string
    {
        return $this->_terms_and_conditions;
    }

    /**
    * Setter method for the terms_and_conditions attribute.
    *
    * @param string $terms_and_conditions
    *
    * @return void
    */
    public function setTermsAndConditions(string $terms_and_conditions): void
    {
        $this->_terms_and_conditions = $terms_and_conditions;
    }

    /**
    * Getter method for the total attribute.
    * The final total on this invoice. The summation of invoice charges, discounts, credits, and tax.
    *
    * @return ?float
    */
    public function getTotal(): ?float
    {
        return $this->_total;
    }

    /**
    * Setter method for the total attribute.
    *
    * @param float $total
    *
    * @return void
    */
    public function setTotal(float $total): void
    {
        $this->_total = $total;
    }

    /**
    * Getter method for the transactions attribute.
    * Transactions
    *
    * @return array
    */
    public function getTransactions(): array
    {
        return $this->_transactions ?? [] ;
    }

    /**
    * Setter method for the transactions attribute.
    *
    * @param array $transactions
    *
    * @return void
    */
    public function setTransactions(array $transactions): void
    {
        $this->_transactions = $transactions;
    }

    /**
    * Getter method for the type attribute.
    * Invoices are either charge, credit, or legacy invoices.
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
    * Getter method for the updated_at attribute.
    * Last updated at
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
    * Getter method for the vat_number attribute.
    * VAT registration number for the customer on this invoice. This will come from the VAT Number field in the Billing Info or the Account Info depending on your tax settings and the invoice collection method.
    *
    * @return ?string
    */
    public function getVatNumber(): ?string
    {
        return $this->_vat_number;
    }

    /**
    * Setter method for the vat_number attribute.
    *
    * @param string $vat_number
    *
    * @return void
    */
    public function setVatNumber(string $vat_number): void
    {
        $this->_vat_number = $vat_number;
    }

    /**
    * Getter method for the vat_reverse_charge_notes attribute.
    * VAT Reverse Charge Notes only appear if you have EU VAT enabled or are using your own Avalara AvaTax account and the customer is in the EU, has a VAT number, and is in a different country than your own. This will default to the VAT Reverse Charge Notes text specified on the Tax Settings page in your Recurly admin, unless custom notes were created with the original subscription.
    *
    * @return ?string
    */
    public function getVatReverseChargeNotes(): ?string
    {
        return $this->_vat_reverse_charge_notes;
    }

    /**
    * Setter method for the vat_reverse_charge_notes attribute.
    *
    * @param string $vat_reverse_charge_notes
    *
    * @return void
    */
    public function setVatReverseChargeNotes(string $vat_reverse_charge_notes): void
    {
        $this->_vat_reverse_charge_notes = $vat_reverse_charge_notes;
    }
}