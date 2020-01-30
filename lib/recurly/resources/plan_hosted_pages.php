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
class PlanHostedPages extends RecurlyResource
{
        private $_bypass_confirmation;
        private $_cancel_url;
        private $_display_quantity;
        private $_success_url;
    
    
    /**
    * Getter method for the bypass_confirmation attribute.
    *
    * @return bool If `true`, the customer will be sent directly to your `success_url` after a successful signup, bypassing Recurly's hosted confirmation page.
    */
    public function getBypassConfirmation(): bool
    {
        return $this->_bypass_confirmation;
    }

    /**
    * Setter method for the bypass_confirmation attribute.
    *
    * @param bool $bypass_confirmation
    *
    * @return void
    */
    public function setBypassConfirmation(bool $value): void
    {
        $this->_bypass_confirmation = $value;
    }

    /**
    * Getter method for the cancel_url attribute.
    *
    * @return string URL to redirect to on canceled signup on the hosted payment pages.
    */
    public function getCancelUrl(): string
    {
        return $this->_cancel_url;
    }

    /**
    * Setter method for the cancel_url attribute.
    *
    * @param string $cancel_url
    *
    * @return void
    */
    public function setCancelUrl(string $value): void
    {
        $this->_cancel_url = $value;
    }

    /**
    * Getter method for the display_quantity attribute.
    *
    * @return bool Determines if the quantity field is displayed on the hosted pages for the plan.
    */
    public function getDisplayQuantity(): bool
    {
        return $this->_display_quantity;
    }

    /**
    * Setter method for the display_quantity attribute.
    *
    * @param bool $display_quantity
    *
    * @return void
    */
    public function setDisplayQuantity(bool $value): void
    {
        $this->_display_quantity = $value;
    }

    /**
    * Getter method for the success_url attribute.
    *
    * @return string URL to redirect to after signup on the hosted payment pages.
    */
    public function getSuccessUrl(): string
    {
        return $this->_success_url;
    }

    /**
    * Setter method for the success_url attribute.
    *
    * @param string $success_url
    *
    * @return void
    */
    public function setSuccessUrl(string $value): void
    {
        $this->_success_url = $value;
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