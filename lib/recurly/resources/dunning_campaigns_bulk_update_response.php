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
class DunningCampaignsBulkUpdateResponse extends RecurlyResource
{
    private $_object;
    private $_plans;

    protected static $array_hints = [
        'setPlans' => '\Recurly\Resources\Plan',
    ];

    
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
    * Getter method for the plans attribute.
    * An array containing all of the `Plan` resources that have been updated.
    *
    * @return array
    */
    public function getPlans(): array
    {
        return $this->_plans ?? [] ;
    }

    /**
    * Setter method for the plans attribute.
    *
    * @param array $plans
    *
    * @return void
    */
    public function setPlans(array $plans): void
    {
        $this->_plans = $plans;
    }
}