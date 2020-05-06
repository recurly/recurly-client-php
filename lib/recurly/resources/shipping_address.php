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

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the account_id attribute.
    * Account ID
    *
    * @return ?string
    */
    public function getAccountId(): ?string
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
    public function setAccountId(string $account_id): void
    {
        $this->_account_id = $account_id;
    }

    /**
    * Getter method for the city attribute.
    * 
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
    * Getter method for the company attribute.
    * 
    *
    * @return ?string
    */
    public function getCompany(): ?string
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
    public function setCompany(string $company): void
    {
        $this->_company = $company;
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
    * Getter method for the created_at attribute.
    * Created at
    *
    * @return ?string
    */
    public function getCreatedAt(): ?string
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
    public function setCreatedAt(string $created_at): void
    {
        $this->_created_at = $created_at;
    }

    /**
    * Getter method for the email attribute.
    * 
    *
    * @return ?string
    */
    public function getEmail(): ?string
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
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
    * Getter method for the first_name attribute.
    * 
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
    * Getter method for the id attribute.
    * Shipping Address ID
    *
    * @return ?string
    */
    public function getId(): ?string
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
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
    * Getter method for the last_name attribute.
    * 
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
    * Getter method for the nickname attribute.
    * 
    *
    * @return ?string
    */
    public function getNickname(): ?string
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
    public function setNickname(string $nickname): void
    {
        $this->_nickname = $nickname;
    }

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
    * Getter method for the phone attribute.
    * 
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
    * 
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
    * 
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

    /**
    * Getter method for the updated_at attribute.
    * Updated at
    *
    * @return ?string
    */
    public function getUpdatedAt(): ?string
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
    public function setUpdatedAt(string $updated_at): void
    {
        $this->_updated_at = $updated_at;
    }

    /**
    * Getter method for the vat_number attribute.
    * 
    *
    * @return ?string
    */
    public function getVatNumber(): ?string
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
    public function setVatNumber(string $vat_number): void
    {
        $this->_vat_number = $vat_number;
    }
}