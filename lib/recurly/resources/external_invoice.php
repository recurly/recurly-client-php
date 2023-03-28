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
class ExternalInvoice extends RecurlyResource
{
    private $_account;
    private $_created_at;
    private $_currency;
    private $_external_id;
    private $_external_subscription;
    private $_id;
    private $_line_items;
    private $_object;
    private $_purchased_at;
    private $_state;
    private $_total;
    private $_updated_at;

    protected static $array_hints = [
        'setLineItems' => '\Recurly\Resources\ExternalCharge',
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
    * When the external invoice was created in Recurly.
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
    * Getter method for the external_id attribute.
    * An identifier which associates the external invoice to a corresponding object in an external platform.
    *
    * @return ?string
    */
    public function getExternalId(): ?string
    {
        return $this->_external_id;
    }

    /**
    * Setter method for the external_id attribute.
    *
    * @param string $external_id
    *
    * @return void
    */
    public function setExternalId(string $external_id): void
    {
        $this->_external_id = $external_id;
    }

    /**
    * Getter method for the external_subscription attribute.
    * Subscription from an external resource such as Apple App Store or Google Play Store.
    *
    * @return ?\Recurly\Resources\ExternalSubscription
    */
    public function getExternalSubscription(): ?\Recurly\Resources\ExternalSubscription
    {
        return $this->_external_subscription;
    }

    /**
    * Setter method for the external_subscription attribute.
    *
    * @param \Recurly\Resources\ExternalSubscription $external_subscription
    *
    * @return void
    */
    public function setExternalSubscription(\Recurly\Resources\ExternalSubscription $external_subscription): void
    {
        $this->_external_subscription = $external_subscription;
    }

    /**
    * Getter method for the id attribute.
    * System-generated unique identifier for an external invoice ID, e.g. `e28zov4fw0v2`.
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
    * @return array
    */
    public function getLineItems(): array
    {
        return $this->_line_items ?? [] ;
    }

    /**
    * Setter method for the line_items attribute.
    *
    * @param array $line_items
    *
    * @return void
    */
    public function setLineItems(array $line_items): void
    {
        $this->_line_items = $line_items;
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
    * Getter method for the purchased_at attribute.
    * When the invoice was created in the external platform.
    *
    * @return ?string
    */
    public function getPurchasedAt(): ?string
    {
        return $this->_purchased_at;
    }

    /**
    * Setter method for the purchased_at attribute.
    *
    * @param string $purchased_at
    *
    * @return void
    */
    public function setPurchasedAt(string $purchased_at): void
    {
        $this->_purchased_at = $purchased_at;
    }

    /**
    * Getter method for the state attribute.
    * 
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
    * Getter method for the total attribute.
    * Total
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
    * Getter method for the updated_at attribute.
    * When the external invoice was updated in Recurly.
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