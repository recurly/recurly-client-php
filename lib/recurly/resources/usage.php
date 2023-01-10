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
class Usage extends RecurlyResource
{
    private $_amount;
    private $_billed_at;
    private $_created_at;
    private $_id;
    private $_measured_unit_id;
    private $_merchant_tag;
    private $_object;
    private $_percentage_tiers;
    private $_recording_timestamp;
    private $_tier_type;
    private $_tiers;
    private $_unit_amount;
    private $_unit_amount_decimal;
    private $_updated_at;
    private $_usage_percentage;
    private $_usage_timestamp;
    private $_usage_type;

    protected static $array_hints = [
        'setPercentageTiers' => '\Recurly\Resources\SubscriptionAddOnPercentageTier',
        'setTiers' => '\Recurly\Resources\SubscriptionAddOnTier',
    ];

    
    /**
    * Getter method for the amount attribute.
    * The amount of usage. Can be positive, negative, or 0. If the Decimal Quantity feature is enabled, this value will be rounded to nine decimal places.  Otherwise, all digits after the decimal will be stripped. If the usage-based add-on is billed with a percentage, your usage should be a monetary amount formatted in cents (e.g., $5.00 is "500").
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
    * Getter method for the billed_at attribute.
    * When the usage record was billed on an invoice.
    *
    * @return ?string
    */
    public function getBilledAt(): ?string
    {
        return $this->_billed_at;
    }

    /**
    * Setter method for the billed_at attribute.
    *
    * @param string $billed_at
    *
    * @return void
    */
    public function setBilledAt(string $billed_at): void
    {
        $this->_billed_at = $billed_at;
    }

    /**
    * Getter method for the created_at attribute.
    * When the usage record was created in Recurly.
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
    * Getter method for the measured_unit_id attribute.
    * The ID of the measured unit associated with the add-on the usage record is for.
    *
    * @return ?string
    */
    public function getMeasuredUnitId(): ?string
    {
        return $this->_measured_unit_id;
    }

    /**
    * Setter method for the measured_unit_id attribute.
    *
    * @param string $measured_unit_id
    *
    * @return void
    */
    public function setMeasuredUnitId(string $measured_unit_id): void
    {
        $this->_measured_unit_id = $measured_unit_id;
    }

    /**
    * Getter method for the merchant_tag attribute.
    * Custom field for recording the id in your own system associated with the usage, so you can provide auditable usage displays to your customers using a GET on this endpoint.
    *
    * @return ?string
    */
    public function getMerchantTag(): ?string
    {
        return $this->_merchant_tag;
    }

    /**
    * Setter method for the merchant_tag attribute.
    *
    * @param string $merchant_tag
    *
    * @return void
    */
    public function setMerchantTag(string $merchant_tag): void
    {
        $this->_merchant_tag = $merchant_tag;
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
    * Getter method for the percentage_tiers attribute.
    * The percentage tiers of the subscription based on the usage_timestamp. If tier_type = flat, percentage_tiers = []. This feature is currently in development and requires approval and enablement, please contact support.
    *
    * @return array
    */
    public function getPercentageTiers(): array
    {
        return $this->_percentage_tiers ?? [] ;
    }

    /**
    * Setter method for the percentage_tiers attribute.
    *
    * @param array $percentage_tiers
    *
    * @return void
    */
    public function setPercentageTiers(array $percentage_tiers): void
    {
        $this->_percentage_tiers = $percentage_tiers;
    }

    /**
    * Getter method for the recording_timestamp attribute.
    * When the usage was recorded in your system.
    *
    * @return ?string
    */
    public function getRecordingTimestamp(): ?string
    {
        return $this->_recording_timestamp;
    }

    /**
    * Setter method for the recording_timestamp attribute.
    *
    * @param string $recording_timestamp
    *
    * @return void
    */
    public function setRecordingTimestamp(string $recording_timestamp): void
    {
        $this->_recording_timestamp = $recording_timestamp;
    }

    /**
    * Getter method for the tier_type attribute.
    * The pricing model for the add-on.  For more information,
[click here](https://docs.recurly.com/docs/billing-models#section-quantity-based). See our
[Guide](https://recurly.com/developers/guides/item-addon-guide.html) for an overview of how
to configure quantity-based pricing models.

    *
    * @return ?string
    */
    public function getTierType(): ?string
    {
        return $this->_tier_type;
    }

    /**
    * Setter method for the tier_type attribute.
    *
    * @param string $tier_type
    *
    * @return void
    */
    public function setTierType(string $tier_type): void
    {
        $this->_tier_type = $tier_type;
    }

    /**
    * Getter method for the tiers attribute.
    * The tiers and prices of the subscription based on the usage_timestamp. If tier_type = flat, tiers = []
    *
    * @return array
    */
    public function getTiers(): array
    {
        return $this->_tiers ?? [] ;
    }

    /**
    * Setter method for the tiers attribute.
    *
    * @param array $tiers
    *
    * @return void
    */
    public function setTiers(array $tiers): void
    {
        $this->_tiers = $tiers;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Unit price
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
    * Getter method for the unit_amount_decimal attribute.
    * Unit price that can optionally support a sub-cent value.
    *
    * @return ?string
    */
    public function getUnitAmountDecimal(): ?string
    {
        return $this->_unit_amount_decimal;
    }

    /**
    * Setter method for the unit_amount_decimal attribute.
    *
    * @param string $unit_amount_decimal
    *
    * @return void
    */
    public function setUnitAmountDecimal(string $unit_amount_decimal): void
    {
        $this->_unit_amount_decimal = $unit_amount_decimal;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the usage record was billed on an invoice.
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
    * Getter method for the usage_percentage attribute.
    * The percentage taken of the monetary amount of usage tracked. This can be up to 4 decimal places. A value between 0.0 and 100.0.
    *
    * @return ?float
    */
    public function getUsagePercentage(): ?float
    {
        return $this->_usage_percentage;
    }

    /**
    * Setter method for the usage_percentage attribute.
    *
    * @param float $usage_percentage
    *
    * @return void
    */
    public function setUsagePercentage(float $usage_percentage): void
    {
        $this->_usage_percentage = $usage_percentage;
    }

    /**
    * Getter method for the usage_timestamp attribute.
    * When the usage actually happened. This will define the line item dates this usage is billed under and is important for revenue recognition.
    *
    * @return ?string
    */
    public function getUsageTimestamp(): ?string
    {
        return $this->_usage_timestamp;
    }

    /**
    * Setter method for the usage_timestamp attribute.
    *
    * @param string $usage_timestamp
    *
    * @return void
    */
    public function setUsageTimestamp(string $usage_timestamp): void
    {
        $this->_usage_timestamp = $usage_timestamp;
    }

    /**
    * Getter method for the usage_type attribute.
    * Type of usage, returns usage type if `add_on_type` is `usage`.
    *
    * @return ?string
    */
    public function getUsageType(): ?string
    {
        return $this->_usage_type;
    }

    /**
    * Setter method for the usage_type attribute.
    *
    * @param string $usage_type
    *
    * @return void
    */
    public function setUsageType(string $usage_type): void
    {
        $this->_usage_type = $usage_type;
    }
}