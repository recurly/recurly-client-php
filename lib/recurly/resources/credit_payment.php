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
class CreditPayment extends RecurlyResource
{
    private $_account;
    private $_action;
    private $_amount;
    private $_applied_to_invoice;
    private $_created_at;
    private $_currency;
    private $_id;
    private $_object;
    private $_original_credit_payment_id;
    private $_original_invoice;
    private $_refund_transaction;
    private $_updated_at;
    private $_uuid;
    private $_voided_at;

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
    * Getter method for the action attribute.
    * The action for which the credit was created.
    *
    * @return ?string
    */
    public function getAction(): ?string
    {
        return $this->_action;
    }

    /**
    * Setter method for the action attribute.
    *
    * @param string $action
    *
    * @return void
    */
    public function setAction(string $action): void
    {
        $this->_action = $action;
    }

    /**
    * Getter method for the amount attribute.
    * Total credit payment amount applied to the charge invoice.
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
    * Getter method for the applied_to_invoice attribute.
    * Invoice mini details
    *
    * @return ?\Recurly\Resources\InvoiceMini
    */
    public function getAppliedToInvoice(): ?\Recurly\Resources\InvoiceMini
    {
        return $this->_applied_to_invoice;
    }

    /**
    * Setter method for the applied_to_invoice attribute.
    *
    * @param \Recurly\Resources\InvoiceMini $applied_to_invoice
    *
    * @return void
    */
    public function setAppliedToInvoice(\Recurly\Resources\InvoiceMini $applied_to_invoice): void
    {
        $this->_applied_to_invoice = $applied_to_invoice;
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
    * Getter method for the id attribute.
    * Credit Payment ID
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
    * Getter method for the original_credit_payment_id attribute.
    * For credit payments with action `refund`, this is the credit payment that was refunded.
    *
    * @return ?string
    */
    public function getOriginalCreditPaymentId(): ?string
    {
        return $this->_original_credit_payment_id;
    }

    /**
    * Setter method for the original_credit_payment_id attribute.
    *
    * @param string $original_credit_payment_id
    *
    * @return void
    */
    public function setOriginalCreditPaymentId(string $original_credit_payment_id): void
    {
        $this->_original_credit_payment_id = $original_credit_payment_id;
    }

    /**
    * Getter method for the original_invoice attribute.
    * Invoice mini details
    *
    * @return ?\Recurly\Resources\InvoiceMini
    */
    public function getOriginalInvoice(): ?\Recurly\Resources\InvoiceMini
    {
        return $this->_original_invoice;
    }

    /**
    * Setter method for the original_invoice attribute.
    *
    * @param \Recurly\Resources\InvoiceMini $original_invoice
    *
    * @return void
    */
    public function setOriginalInvoice(\Recurly\Resources\InvoiceMini $original_invoice): void
    {
        $this->_original_invoice = $original_invoice;
    }

    /**
    * Getter method for the refund_transaction attribute.
    * 
    *
    * @return ?\Recurly\Resources\Transaction
    */
    public function getRefundTransaction(): ?\Recurly\Resources\Transaction
    {
        return $this->_refund_transaction;
    }

    /**
    * Setter method for the refund_transaction attribute.
    *
    * @param \Recurly\Resources\Transaction $refund_transaction
    *
    * @return void
    */
    public function setRefundTransaction(\Recurly\Resources\Transaction $refund_transaction): void
    {
        $this->_refund_transaction = $refund_transaction;
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

    /**
    * Getter method for the voided_at attribute.
    * Voided at
    *
    * @return ?string
    */
    public function getVoidedAt(): ?string
    {
        return $this->_voided_at;
    }

    /**
    * Setter method for the voided_at attribute.
    *
    * @param string $voided_at
    *
    * @return void
    */
    public function setVoidedAt(string $voided_at): void
    {
        $this->_voided_at = $voided_at;
    }
}