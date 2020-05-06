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
class ErrorMayHaveTransaction extends RecurlyResource
{
    private $_message;
    private $_params;
    private $_transaction_error;
    private $_type;

    protected static $array_hints = array(
        'setParams' => 'object',
    );

    
    /**
    * Getter method for the message attribute.
    * Message
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
    * Getter method for the params attribute.
    * Parameter specific errors
    *
    * @return array
    */
    public function getParams(): array
    {
        return $this->_params ?? [] ;
    }

    /**
    * Setter method for the params attribute.
    *
    * @param array $params
    *
    * @return void
    */
    public function setParams(array $params): void
    {
        $this->_params = $params;
    }

    /**
    * Getter method for the transaction_error attribute.
    * This is only included on errors with `type=transaction`.
    *
    * @return ?\Recurly\Resources\TransactionError
    */
    public function getTransactionError(): ?\Recurly\Resources\TransactionError
    {
        return $this->_transaction_error;
    }

    /**
    * Setter method for the transaction_error attribute.
    *
    * @param \Recurly\Resources\TransactionError $transaction_error
    *
    * @return void
    */
    public function setTransactionError(\Recurly\Resources\TransactionError $transaction_error): void
    {
        $this->_transaction_error = $transaction_error;
    }

    /**
    * Getter method for the type attribute.
    * Type
    *
    * @return ?string
    */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $type): void
    {
        $this->_type = $type;
    }
}