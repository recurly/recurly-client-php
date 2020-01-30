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
class BillingInfoUpdatedBy extends RecurlyResource
{
        private $_country;
        private $_ip;
    
    
    /**
    * Getter method for the country attribute.
    *
    * @return string Country of IP address, if known by Recurly.
    */
    public function getCountry(): string
    {
        return $this->_country;
    }

    /**
    * Setter method for the country attribute.
    *
    * @param string $country
    *
    * @return void
    */
    public function setCountry(string $value): void
    {
        $this->_country = $value;
    }

    /**
    * Getter method for the ip attribute.
    *
    * @return string Customer's IP address when updating their billing information.
    */
    public function getIp(): string
    {
        return $this->_ip;
    }

    /**
    * Setter method for the ip attribute.
    *
    * @param string $ip
    *
    * @return void
    */
    public function setIp(string $value): void
    {
        $this->_ip = $value;
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