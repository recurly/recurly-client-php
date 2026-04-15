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
class UniqueCouponCodeGenerationResponse extends RecurlyResource
{
    private $_object;
    private $_unique_coupon_codes;

    protected static $array_hints = [
        'setUniqueCouponCodes' => '\Recurly\Resources\UniqueCouponCode',
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
    * Getter method for the unique_coupon_codes attribute.
    * An array containing the newly generated unique coupon codes.
    *
    * @return array
    */
    public function getUniqueCouponCodes(): array
    {
        return $this->_unique_coupon_codes ?? [] ;
    }

    /**
    * Setter method for the unique_coupon_codes attribute.
    *
    * @param array $unique_coupon_codes
    *
    * @return void
    */
    public function setUniqueCouponCodes(array $unique_coupon_codes): void
    {
        $this->_unique_coupon_codes = $unique_coupon_codes;
    }
}