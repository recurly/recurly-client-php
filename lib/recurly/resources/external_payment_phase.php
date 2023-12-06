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
class ExternalPaymentPhase extends RecurlyResource
{
    private $_amount;
    private $_created_at;
    private $_currency;
    private $_ending_billing_period_index;
    private $_ends_at;
    private $_external_subscription;
    private $_id;
    private $_object;
    private $_offer_name;
    private $_offer_type;
    private $_period_count;
    private $_period_length;
    private $_started_at;
    private $_starting_billing_period_index;
    private $_updated_at;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the amount attribute.
    * Allows up to 9 decimal places
    *
    * @return ?string
    */
    public function getAmount(): ?string
    {
        return $this->_amount;
    }

    /**
    * Setter method for the amount attribute.
    *
    * @param string $amount
    *
    * @return void
    */
    public function setAmount(string $amount): void
    {
        $this->_amount = $amount;
    }

    /**
    * Getter method for the created_at attribute.
    * When the external subscription was created in Recurly.
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
    * Getter method for the ending_billing_period_index attribute.
    * Ending Billing Period Index
    *
    * @return ?int
    */
    public function getEndingBillingPeriodIndex(): ?int
    {
        return $this->_ending_billing_period_index;
    }

    /**
    * Setter method for the ending_billing_period_index attribute.
    *
    * @param int $ending_billing_period_index
    *
    * @return void
    */
    public function setEndingBillingPeriodIndex(int $ending_billing_period_index): void
    {
        $this->_ending_billing_period_index = $ending_billing_period_index;
    }

    /**
    * Getter method for the ends_at attribute.
    * Ends At
    *
    * @return ?string
    */
    public function getEndsAt(): ?string
    {
        return $this->_ends_at;
    }

    /**
    * Setter method for the ends_at attribute.
    *
    * @param string $ends_at
    *
    * @return void
    */
    public function setEndsAt(string $ends_at): void
    {
        $this->_ends_at = $ends_at;
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
    * System-generated unique identifier for an external payment phase ID, e.g. `e28zov4fw0v2`.
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
    * Getter method for the offer_name attribute.
    * Name of the discount offer given, e.g. "introductory"
    *
    * @return ?string
    */
    public function getOfferName(): ?string
    {
        return $this->_offer_name;
    }

    /**
    * Setter method for the offer_name attribute.
    *
    * @param string $offer_name
    *
    * @return void
    */
    public function setOfferName(string $offer_name): void
    {
        $this->_offer_name = $offer_name;
    }

    /**
    * Getter method for the offer_type attribute.
    * Type of discount offer given, e.g. "FREE_TRIAL"
    *
    * @return ?string
    */
    public function getOfferType(): ?string
    {
        return $this->_offer_type;
    }

    /**
    * Setter method for the offer_type attribute.
    *
    * @param string $offer_type
    *
    * @return void
    */
    public function setOfferType(string $offer_type): void
    {
        $this->_offer_type = $offer_type;
    }

    /**
    * Getter method for the period_count attribute.
    * Number of billing periods
    *
    * @return ?int
    */
    public function getPeriodCount(): ?int
    {
        return $this->_period_count;
    }

    /**
    * Setter method for the period_count attribute.
    *
    * @param int $period_count
    *
    * @return void
    */
    public function setPeriodCount(int $period_count): void
    {
        $this->_period_count = $period_count;
    }

    /**
    * Getter method for the period_length attribute.
    * Billing cycle length
    *
    * @return ?string
    */
    public function getPeriodLength(): ?string
    {
        return $this->_period_length;
    }

    /**
    * Setter method for the period_length attribute.
    *
    * @param string $period_length
    *
    * @return void
    */
    public function setPeriodLength(string $period_length): void
    {
        $this->_period_length = $period_length;
    }

    /**
    * Getter method for the started_at attribute.
    * Started At
    *
    * @return ?string
    */
    public function getStartedAt(): ?string
    {
        return $this->_started_at;
    }

    /**
    * Setter method for the started_at attribute.
    *
    * @param string $started_at
    *
    * @return void
    */
    public function setStartedAt(string $started_at): void
    {
        $this->_started_at = $started_at;
    }

    /**
    * Getter method for the starting_billing_period_index attribute.
    * Starting Billing Period Index
    *
    * @return ?int
    */
    public function getStartingBillingPeriodIndex(): ?int
    {
        return $this->_starting_billing_period_index;
    }

    /**
    * Setter method for the starting_billing_period_index attribute.
    *
    * @param int $starting_billing_period_index
    *
    * @return void
    */
    public function setStartingBillingPeriodIndex(int $starting_billing_period_index): void
    {
        $this->_starting_billing_period_index = $starting_billing_period_index;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the external subscription was updated in Recurly.
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