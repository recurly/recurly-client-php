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
    * Getter method for the action attribute.
    *
    * @return string The action for which the credit was created.
    */
    public function getAction(): string
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
    public function setAction(string $value): void
    {
        $this->_action = $value;
    }

    /**
    * Getter method for the amount attribute.
    *
    * @return float Total credit payment amount applied to the charge invoice.
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
    * Getter method for the applied_to_invoice attribute.
    *
    * @return \Recurly\Resources\InvoiceMini Invoice mini details
    */
    public function getAppliedToInvoice(): \Recurly\Resources\InvoiceMini
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
    public function setAppliedToInvoice(\Recurly\Resources\InvoiceMini $value): void
    {
        $this->_applied_to_invoice = $value;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string Created at
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
    * Getter method for the id attribute.
    *
    * @return string Credit Payment ID
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
    * Getter method for the original_credit_payment_id attribute.
    *
    * @return string For credit payments with action `refund`, this is the credit payment that was refunded.
    */
    public function getOriginalCreditPaymentId(): string
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
    public function setOriginalCreditPaymentId(string $value): void
    {
        $this->_original_credit_payment_id = $value;
    }

    /**
    * Getter method for the original_invoice attribute.
    *
    * @return \Recurly\Resources\InvoiceMini Invoice mini details
    */
    public function getOriginalInvoice(): \Recurly\Resources\InvoiceMini
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
    public function setOriginalInvoice(\Recurly\Resources\InvoiceMini $value): void
    {
        $this->_original_invoice = $value;
    }

    /**
    * Getter method for the refund_transaction attribute.
    *
    * @return \Recurly\Resources\Transaction 
    */
    public function getRefundTransaction(): \Recurly\Resources\Transaction
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
    public function setRefundTransaction(\Recurly\Resources\Transaction $value): void
    {
        $this->_refund_transaction = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string Last updated at
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

    /**
    * Getter method for the voided_at attribute.
    *
    * @return string Voided at
    */
    public function getVoidedAt(): string
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
    public function setVoidedAt(string $value): void
    {
        $this->_voided_at = $value;
    }

    /**
     * The hintArrayType method will provide type hinting for setter methods that
     * have array parameters.
     * 
     * @param string $key The property to get teh type hint for.
     * 
     * @return string The class name of the expected array type.
     */
    public static function hintArrayType($key): string
    {
        $array_hints = array(
        );
        return $array_hints[$key];
    }

}