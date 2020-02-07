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
class AccountMini extends RecurlyResource
{
    private $_bill_to;
    private $_code;
    private $_company;
    private $_email;
    private $_first_name;
    private $_id;
    private $_last_name;
    private $_object;
    private $_parent_account_id;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the bill_to attribute.
    *
    * @return string 
    */
    public function getBillTo(): string
    {
        return $this->_bill_to;
    }

    /**
    * Setter method for the bill_to attribute.
    *
    * @param string $bill_to
    *
    * @return void
    */
    public function setBillTo(string $value): void
    {
        $this->_bill_to = $value;
    }

    /**
    * Getter method for the code attribute.
    *
    * @return string The unique identifier of the account.
    */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
    * Setter method for the code attribute.
    *
    * @param string $code
    *
    * @return void
    */
    public function setCode(string $value): void
    {
        $this->_code = $value;
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
    * Getter method for the email attribute.
    *
    * @return string The email address used for communicating with this customer.
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
    * @return string 
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
    * Getter method for the parent_account_id attribute.
    *
    * @return string 
    */
    public function getParentAccountId(): string
    {
        return $this->_parent_account_id;
    }

    /**
    * Setter method for the parent_account_id attribute.
    *
    * @param string $parent_account_id
    *
    * @return void
    */
    public function setParentAccountId(string $value): void
    {
        $this->_parent_account_id = $value;
    }
}