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
class ExternalCharge extends RecurlyResource
{
    private $_account;
    private $_created_at;
    private $_currency;
    private $_description;
    private $_external_product_reference;
    private $_id;
    private $_object;
    private $_quantity;
    private $_unit_amount;
    private $_updated_at;

    protected static $array_hints = [
    ];

    
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
    * Getter method for the created_at attribute.
    * When the external charge was created in Recurly.
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
    * Getter method for the description attribute.
    * 
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
    * Getter method for the external_product_reference attribute.
    * External Product Reference details
    *
    * @return ?\Recurly\Resources\ExternalProductReferenceMini
    */
    public function getExternalProductReference(): ?\Recurly\Resources\ExternalProductReferenceMini
    {
        return $this->_external_product_reference;
    }

    /**
    * Setter method for the external_product_reference attribute.
    *
    * @param \Recurly\Resources\ExternalProductReferenceMini $external_product_reference
    *
    * @return void
    */
    public function setExternalProductReference(\Recurly\Resources\ExternalProductReferenceMini $external_product_reference): void
    {
        $this->_external_product_reference = $external_product_reference;
    }

    /**
    * Getter method for the id attribute.
    * System-generated unique identifier for an external charge ID, e.g. `e28zov4fw0v2`.
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
    * Getter method for the quantity attribute.
    * 
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
    * Getter method for the unit_amount attribute.
    * Unit Amount
    *
    * @return ?string
    */
    public function getUnitAmount(): ?string
    {
        return $this->_unit_amount;
    }

    /**
    * Setter method for the unit_amount attribute.
    *
    * @param string $unit_amount
    *
    * @return void
    */
    public function setUnitAmount(string $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the external charge was updated in Recurly.
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
}