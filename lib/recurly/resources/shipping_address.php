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
class ShippingAddress extends RecurlyResource
{
        private $_account_id;
        private $_city;
        private $_company;
        private $_country;
        private $_created_at;
        private $_email;
        private $_first_name;
        private $_id;
        private $_last_name;
        private $_nickname;
        private $_object;
        private $_phone;
        private $_postal_code;
        private $_region;
        private $_street1;
        private $_street2;
        private $_updated_at;
        private $_vat_number;
    
    
    /**
    * Getter method for the account_id attribute.
    *
    * @return string Account ID
    */
    public function getAccountId(): string
    {
        return $this->_account_id;
    }

    /**
    * Setter method for the account_id attribute.
    *
    * @param string $account_id
    *
    * @return void
    */
    public function setAccountId(string $value): void
    {
        $this->_account_id = $value;
    }

    /**
    * Getter method for the city attribute.
    *
    * @return string 
    */
    public function getCity(): string
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
    public function setCity(string $value): void
    {
        $this->_city = $value;
    }

    /**
    * Getter method for the company attribute.
    *
    * @return string 
    */
    public function getCompany(): string
    {
        return $this->_company;
    }

    /**
    * Setter method for the company attribute.
    *
    * @param string $company
    *
    * @return void
    */
    public function setCompany(string $value): void
    {
        $this->_company = $value;
    }

    /**
    * Getter method for the country attribute.
    *
    * @return string Country, 2-letter ISO code.
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
    * Getter method for the email attribute.
    *
    * @return string 
    */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
    * Setter method for the email attribute.
    *
    * @param string $email
    *
    * @return void
    */
    public function setEmail(string $value): void
    {
        $this->_email = $value;
    }

    /**
    * Getter method for the first_name attribute.
    *
    * @return string 
    */
    public function getFirstName(): string
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
    public function setFirstName(string $value): void
    {
        $this->_first_name = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Shipping Address ID
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
    * Getter method for the last_name attribute.
    *
    * @return string 
    */
    public function getLastName(): string
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
    public function setLastName(string $value): void
    {
        $this->_last_name = $value;
    }

    /**
    * Getter method for the nickname attribute.
    *
    * @return string 
    */
    public function getNickname(): string
    {
        return $this->_nickname;
    }

    /**
    * Setter method for the nickname attribute.
    *
    * @param string $nickname
    *
    * @return void
    */
    public function setNickname(string $value): void
    {
        $this->_nickname = $value;
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
    * Getter method for the phone attribute.
    *
    * @return string 
    */
    public function getPhone(): string
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
    public function setPhone(string $value): void
    {
        $this->_phone = $value;
    }

    /**
    * Getter method for the postal_code attribute.
    *
    * @return string Zip or postal code.
    */
    public function getPostalCode(): string
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
    public function setPostalCode(string $value): void
    {
        $this->_postal_code = $value;
    }

    /**
    * Getter method for the region attribute.
    *
    * @return string State or province.
    */
    public function getRegion(): string
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
    public function setRegion(string $value): void
    {
        $this->_region = $value;
    }

    /**
    * Getter method for the street1 attribute.
    *
    * @return string 
    */
    public function getStreet1(): string
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
    public function setStreet1(string $value): void
    {
        $this->_street1 = $value;
    }

    /**
    * Getter method for the street2 attribute.
    *
    * @return string 
    */
    public function getStreet2(): string
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
    public function setStreet2(string $value): void
    {
        $this->_street2 = $value;
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
    * Getter method for the vat_number attribute.
    *
    * @return string 
    */
    public function getVatNumber(): string
    {
        return $this->_vat_number;
    }

    /**
    * Setter method for the vat_number attribute.
    *
    * @param string $vat_number
    *
    * @return void
    */
    public function setVatNumber(string $value): void
    {
        $this->_vat_number = $value;
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