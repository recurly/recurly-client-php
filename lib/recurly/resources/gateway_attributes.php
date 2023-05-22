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
class GatewayAttributes extends RecurlyResource
{
    private $_account_reference;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the account_reference attribute.
    * Used by Adyen gateways. The Shopper Reference value used when the external token was created.
    *
    * @return ?string
    */
    public function getAccountReference(): ?string
    {
        return $this->_account_reference;
    }

    /**
    * Setter method for the account_reference attribute.
    *
    * @param string $account_reference
    *
    * @return void
    */
    public function setAccountReference(string $account_reference): void
    {
        $this->_account_reference = $account_reference;
    }
}