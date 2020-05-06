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
class AccountNote extends RecurlyResource
{
    private $_account_id;
    private $_created_at;
    private $_id;
    private $_message;
    private $_object;
    private $_user;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the account_id attribute.
    * 
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
    * Getter method for the created_at attribute.
    * 
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
    * Getter method for the id attribute.
    * 
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
    * Getter method for the message attribute.
    * 
    *
    * @return ?string
    */
    public function getMessage(): ?string
    {
        return $this->_message;
    }

    /**
    * Setter method for the message attribute.
    *
    * @param string $message
    *
    * @return void
    */
    public function setMessage(string $message): void
    {
        $this->_message = $message;
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
    * Getter method for the user attribute.
    * 
    *
    * @return ?\Recurly\Resources\User
    */
    public function getUser(): ?\Recurly\Resources\User
    {
        return $this->_user;
    }

    /**
    * Setter method for the user attribute.
    *
    * @param \Recurly\Resources\User $user
    *
    * @return void
    */
    public function setUser(\Recurly\Resources\User $user): void
    {
        $this->_user = $user;
    }
}