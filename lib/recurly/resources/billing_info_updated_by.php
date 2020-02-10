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

    protected static $array_hints = array(
    );

    
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
    public function setCountry(string $country): void
    {
        $this->_country = $country;
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
    public function setIp(string $ip): void
    {
        $this->_ip = $ip;
    }
}