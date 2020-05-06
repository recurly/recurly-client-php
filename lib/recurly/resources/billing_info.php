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
class BillingInfo extends RecurlyResource
{
    private $_account_id;
    private $_address;
    private $_company;
    private $_created_at;
    private $_first_name;
    private $_fraud;
    private $_id;
    private $_last_name;
    private $_object;
    private $_payment_method;
    private $_updated_at;
    private $_updated_by;
    private $_valid;
    private $_vat_number;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the account_id attribute.
    * 
    *
    * @return ?string
    */
    public function getAccountId(): ?string
    {
        return $this->_account_id;
    }

    /**
    * Setter method for the account_id attribute.
    *
    * @param string $account_id
    *
    * @return void
    */
    public function setAccountId(string $account_id): void
    {
        $this->_account_id = $account_id;
    }

    /**
    * Getter method for the address attribute.
    * 
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getAddress(): ?\Recurly\Resources\Address
    {
        return $this->_address;
    }

    /**
    * Setter method for the address attribute.
    *
    * @param \Recurly\Resources\Address $address
    *
    * @return void
    */
    public function setAddress(\Recurly\Resources\Address $address): void
    {
        $this->_address = $address;
    }

    /**
    * Getter method for the company attribute.
    * 
    *
    * @return ?string
    */
    public function getCompany(): ?string
    {
        return $this->_company;
    }

    /**
    * Setter method for the company attribute.
    *
    * @param string $company
    *
    * @return void
    */
    public function setCompany(string $company): void
    {
        $this->_company = $company;
    }

    /**
    * Getter method for the created_at attribute.
    * When the billing information was created.
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
    * Getter method for the first_name attribute.
    * 
    *
    * @return ?string
    */
    public function getFirstName(): ?string
    {
        return $this->_first_name;
    }

    /**
    * Setter method for the first_name attribute.
    *
    * @param string $first_name
    *
    * @return void
    */
    public function setFirstName(string $first_name): void
    {
        $this->_first_name = $first_name;
    }

    /**
    * Getter method for the fraud attribute.
    * Most recent fraud result.
    *
    * @return ?\Recurly\Resources\FraudInfo
    */
    public function getFraud(): ?\Recurly\Resources\FraudInfo
    {
        return $this->_fraud;
    }

    /**
    * Setter method for the fraud attribute.
    *
    * @param \Recurly\Resources\FraudInfo $fraud
    *
    * @return void
    */
    public function setFraud(\Recurly\Resources\FraudInfo $fraud): void
    {
        $this->_fraud = $fraud;
    }

    /**
    * Getter method for the id attribute.
    * 
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
    * Getter method for the last_name attribute.
    * 
    *
    * @return ?string
    */
    public function getLastName(): ?string
    {
        return $this->_last_name;
    }

    /**
    * Setter method for the last_name attribute.
    *
    * @param string $last_name
    *
    * @return void
    */
    public function setLastName(string $last_name): void
    {
        $this->_last_name = $last_name;
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
    * Getter method for the payment_method attribute.
    * 
    *
    * @return ?\Recurly\Resources\PaymentMethod
    */
    public function getPaymentMethod(): ?\Recurly\Resources\PaymentMethod
    {
        return $this->_payment_method;
    }

    /**
    * Setter method for the payment_method attribute.
    *
    * @param \Recurly\Resources\PaymentMethod $payment_method
    *
    * @return void
    */
    public function setPaymentMethod(\Recurly\Resources\PaymentMethod $payment_method): void
    {
        $this->_payment_method = $payment_method;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the billing information was last changed.
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
    * Getter method for the updated_by attribute.
    * 
    *
    * @return ?\Recurly\Resources\BillingInfoUpdatedBy
    */
    public function getUpdatedBy(): ?\Recurly\Resources\BillingInfoUpdatedBy
    {
        return $this->_updated_by;
    }

    /**
    * Setter method for the updated_by attribute.
    *
    * @param \Recurly\Resources\BillingInfoUpdatedBy $updated_by
    *
    * @return void
    */
    public function setUpdatedBy(\Recurly\Resources\BillingInfoUpdatedBy $updated_by): void
    {
        $this->_updated_by = $updated_by;
    }

    /**
    * Getter method for the valid attribute.
    * 
    *
    * @return ?bool
    */
    public function getValid(): ?bool
    {
        return $this->_valid;
    }

    /**
    * Setter method for the valid attribute.
    *
    * @param bool $valid
    *
    * @return void
    */
    public function setValid(bool $valid): void
    {
        $this->_valid = $valid;
    }

    /**
    * Getter method for the vat_number attribute.
    * Customer's VAT number (to avoid having the VAT applied). This is only used for automatically collected invoices.
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
}