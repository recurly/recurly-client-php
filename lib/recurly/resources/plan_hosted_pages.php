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

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the bypass_confirmation attribute.
    * If `true`, the customer will be sent directly to your `success_url` after a successful signup, bypassing Recurly's hosted confirmation page.
    *
    * @return ?bool
    */
    public function getBypassConfirmation(): ?bool
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
    public function setBypassConfirmation(bool $bypass_confirmation): void
    {
        $this->_bypass_confirmation = $bypass_confirmation;
    }

    /**
    * Getter method for the cancel_url attribute.
    * URL to redirect to on canceled signup on the hosted payment pages.
    *
    * @return ?string
    */
    public function getCancelUrl(): ?string
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
    public function setCancelUrl(string $cancel_url): void
    {
        $this->_cancel_url = $cancel_url;
    }

    /**
    * Getter method for the display_quantity attribute.
    * Determines if the quantity field is displayed on the hosted pages for the plan.
    *
    * @return ?bool
    */
    public function getDisplayQuantity(): ?bool
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
    public function setDisplayQuantity(bool $display_quantity): void
    {
        $this->_display_quantity = $display_quantity;
    }

    /**
    * Getter method for the success_url attribute.
    * URL to redirect to after signup on the hosted payment pages.
    *
    * @return ?string
    */
    public function getSuccessUrl(): ?string
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
    public function setSuccessUrl(string $success_url): void
    {
        $this->_success_url = $success_url;
    }
}