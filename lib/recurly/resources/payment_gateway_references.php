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
class PaymentGatewayReferences extends RecurlyResource
{
    private $_reference_type;
    private $_token;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the reference_type attribute.
    * The type of reference token. Required if token is passed in for Stripe Gateway.
    *
    * @return ?string
    */
    public function getReferenceType(): ?string
    {
        return $this->_reference_type;
    }

    /**
    * Setter method for the reference_type attribute.
    *
    * @param string $reference_type
    *
    * @return void
    */
    public function setReferenceType(string $reference_type): void
    {
        $this->_reference_type = $reference_type;
    }

    /**
    * Getter method for the token attribute.
    * Reference value used when the external token was created. If Stripe gateway is used, this value will need to be accompanied by its reference_type.
    *
    * @return ?string
    */
    public function getToken(): ?string
    {
        return $this->_token;
    }

    /**
    * Setter method for the token attribute.
    *
    * @param string $token
    *
    * @return void
    */
    public function setToken(string $token): void
    {
        $this->_token = $token;
    }
}