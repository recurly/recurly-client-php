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
class Address extends RecurlyResource
{
    private $_city;
    private $_country;
    private $_first_name;
    private $_last_name;
    private $_phone;
    private $_postal_code;
    private $_region;
    private $_street1;
    private $_street2;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the city attribute.
    * City
    *
    * @return ?string
    */
    public function getCity(): ?string
    {
        return $this->_city;
    }

    /**
    * Setter method for the city attribute.
    *
    * @param string $city
    *
    * @return void
    */
    public function setCity(string $city): void
    {
        $this->_city = $city;
    }

    /**
    * Getter method for the country attribute.
    * Country, 2-letter ISO code.
    *
    * @return ?string
    */
    public function getCountry(): ?string
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
    * Getter method for the first_name attribute.
    * First name
    *
    * @return ?string
    */
    public function getFirstName(): ?string
    {
        return $this->_first_name;
    }

    /**
    * Setter method for the first_name attribute.
    *
    * @param string $first_name
    *
    * @return void
    */
    public function setFirstName(string $first_name): void
    {
        $this->_first_name = $first_name;
    }

    /**
    * Getter method for the last_name attribute.
    * Last name
    *
    * @return ?string
    */
    public function getLastName(): ?string
    {
        return $this->_last_name;
    }

    /**
    * Setter method for the last_name attribute.
    *
    * @param string $last_name
    *
    * @return void
    */
    public function setLastName(string $last_name): void
    {
        $this->_last_name = $last_name;
    }

    /**
    * Getter method for the phone attribute.
    * Phone number
    *
    * @return ?string
    */
    public function getPhone(): ?string
    {
        return $this->_phone;
    }

    /**
    * Setter method for the phone attribute.
    *
    * @param string $phone
    *
    * @return void
    */
    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    /**
    * Getter method for the postal_code attribute.
    * Zip or postal code.
    *
    * @return ?string
    */
    public function getPostalCode(): ?string
    {
        return $this->_postal_code;
    }

    /**
    * Setter method for the postal_code attribute.
    *
    * @param string $postal_code
    *
    * @return void
    */
    public function setPostalCode(string $postal_code): void
    {
        $this->_postal_code = $postal_code;
    }

    /**
    * Getter method for the region attribute.
    * State or province.
    *
    * @return ?string
    */
    public function getRegion(): ?string
    {
        return $this->_region;
    }

    /**
    * Setter method for the region attribute.
    *
    * @param string $region
    *
    * @return void
    */
    public function setRegion(string $region): void
    {
        $this->_region = $region;
    }

    /**
    * Getter method for the street1 attribute.
    * Street 1
    *
    * @return ?string
    */
    public function getStreet1(): ?string
    {
        return $this->_street1;
    }

    /**
    * Setter method for the street1 attribute.
    *
    * @param string $street1
    *
    * @return void
    */
    public function setStreet1(string $street1): void
    {
        $this->_street1 = $street1;
    }

    /**
    * Getter method for the street2 attribute.
    * Street 2
    *
    * @return ?string
    */
    public function getStreet2(): ?string
    {
        return $this->_street2;
    }

    /**
    * Setter method for the street2 attribute.
    *
    * @param string $street2
    *
    * @return void
    */
    public function setStreet2(string $street2): void
    {
        $this->_street2 = $street2;
    }
}