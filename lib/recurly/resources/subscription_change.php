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
class SubscriptionChange extends RecurlyResource
{
        private $_activate_at;
        private $_activated;
        private $_add_ons;
        private $_created_at;
        private $_deleted_at;
        private $_id;
        private $_object;
        private $_plan;
        private $_quantity;
        private $_shipping;
        private $_subscription_id;
        private $_unit_amount;
        private $_updated_at;
    
    
    /**
    * Getter method for the activate_at attribute.
    *
    * @return string Activated at
    */
    public function getActivateAt(): string
    {
        return $this->_activate_at;
    }

    /**
    * Setter method for the activate_at attribute.
    *
    * @param string $activate_at
    *
    * @return void
    */
    public function setActivateAt(string $value): void
    {
        $this->_activate_at = $value;
    }

    /**
    * Getter method for the activated attribute.
    *
    * @return bool Returns `true` if the subscription change is activated.
    */
    public function getActivated(): bool
    {
        return $this->_activated;
    }

    /**
    * Setter method for the activated attribute.
    *
    * @param bool $activated
    *
    * @return void
    */
    public function setActivated(bool $value): void
    {
        $this->_activated = $value;
    }

    /**
    * Getter method for the add_ons attribute.
    *
    * @return array These add-ons will be used when the subscription renews.
    */
    public function getAddOns(): array
    {
        return $this->_add_ons;
    }

    /**
    * Setter method for the add_ons attribute.
    *
    * @param array $add_ons
    *
    * @return void
    */
    public function setAddOns(array $value): void
    {
        $this->_add_ons = $value;
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
    * Getter method for the deleted_at attribute.
    *
    * @return string Deleted at
    */
    public function getDeletedAt(): string
    {
        return $this->_deleted_at;
    }

    /**
    * Setter method for the deleted_at attribute.
    *
    * @param string $deleted_at
    *
    * @return void
    */
    public function setDeletedAt(string $value): void
    {
        $this->_deleted_at = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string The ID of the Subscription Change.
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
    * Getter method for the plan attribute.
    *
    * @return \Recurly\Resources\PlanMini Just the important parts.
    */
    public function getPlan(): \Recurly\Resources\PlanMini
    {
        return $this->_plan;
    }

    /**
    * Setter method for the plan attribute.
    *
    * @param \Recurly\Resources\PlanMini $plan
    *
    * @return void
    */
    public function setPlan(\Recurly\Resources\PlanMini $value): void
    {
        $this->_plan = $value;
    }

    /**
    * Getter method for the quantity attribute.
    *
    * @return int Subscription quantity
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
    * Getter method for the shipping attribute.
    *
    * @return \Recurly\Resources\SubscriptionShipping Subscription shipping details
    */
    public function getShipping(): \Recurly\Resources\SubscriptionShipping
    {
        return $this->_shipping;
    }

    /**
    * Setter method for the shipping attribute.
    *
    * @param \Recurly\Resources\SubscriptionShipping $shipping
    *
    * @return void
    */
    public function setShipping(\Recurly\Resources\SubscriptionShipping $value): void
    {
        $this->_shipping = $value;
    }

    /**
    * Getter method for the subscription_id attribute.
    *
    * @return string The ID of the subscription that is going to be changed.
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
    * Getter method for the unit_amount attribute.
    *
    * @return float Unit amount
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
    * @return string Updated at
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
            'setAddOns' => '\Recurly\Resources\SubscriptionAddOn',
        );
        return $array_hints[$key];
    }

}