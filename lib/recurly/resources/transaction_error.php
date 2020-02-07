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
class TransactionError extends RecurlyResource
{
    private $_category;
    private $_code;
    private $_merchant_advice;
    private $_message;
    private $_object;
    private $_three_d_secure_action_token_id;
    private $_transaction_id;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the category attribute.
    *
    * @return string Category
    */
    public function getCategory(): string
    {
        return $this->_category;
    }

    /**
    * Setter method for the category attribute.
    *
    * @param string $category
    *
    * @return void
    */
    public function setCategory(string $value): void
    {
        $this->_category = $value;
    }

    /**
    * Getter method for the code attribute.
    *
    * @return string Code
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
    * Getter method for the merchant_advice attribute.
    *
    * @return string Merchant message
    */
    public function getMerchantAdvice(): string
    {
        return $this->_merchant_advice;
    }

    /**
    * Setter method for the merchant_advice attribute.
    *
    * @param string $merchant_advice
    *
    * @return void
    */
    public function setMerchantAdvice(string $value): void
    {
        $this->_merchant_advice = $value;
    }

    /**
    * Getter method for the message attribute.
    *
    * @return string Customer message
    */
    public function getMessage(): string
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
    public function setMessage(string $value): void
    {
        $this->_message = $value;
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
    * Getter method for the three_d_secure_action_token_id attribute.
    *
    * @return string Returned when 3-D Secure authentication is required for a transaction. Pass this value to Recurly.js so it can continue the challenge flow.
    */
    public function getThreeDSecureActionTokenId(): string
    {
        return $this->_three_d_secure_action_token_id;
    }

    /**
    * Setter method for the three_d_secure_action_token_id attribute.
    *
    * @param string $three_d_secure_action_token_id
    *
    * @return void
    */
    public function setThreeDSecureActionTokenId(string $value): void
    {
        $this->_three_d_secure_action_token_id = $value;
    }

    /**
    * Getter method for the transaction_id attribute.
    *
    * @return string Transaction ID
    */
    public function getTransactionId(): string
    {
        return $this->_transaction_id;
    }

    /**
    * Setter method for the transaction_id attribute.
    *
    * @param string $transaction_id
    *
    * @return void
    */
    public function setTransactionId(string $value): void
    {
        $this->_transaction_id = $value;
    }
}