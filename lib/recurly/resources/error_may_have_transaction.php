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
    
    
    /**
    * Getter method for the message attribute.
    *
    * @return string Message
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
    * Getter method for the params attribute.
    *
    * @return array Parameter specific errors
    */
    public function getParams(): array
    {
        return $this->_params;
    }

    /**
    * Setter method for the params attribute.
    *
    * @param array $params
    *
    * @return void
    */
    public function setParams(array $value): void
    {
        $this->_params = $value;
    }

    /**
    * Getter method for the transaction_error attribute.
    *
    * @return \Recurly\Resources\TransactionError This is only included on errors with `type=transaction`.
    */
    public function getTransactionError(): \Recurly\Resources\TransactionError
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
    public function setTransactionError(\Recurly\Resources\TransactionError $value): void
    {
        $this->_transaction_error = $value;
    }

    /**
    * Getter method for the type attribute.
    *
    * @return string Type
    */
    public function getType(): string
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
    public function setType(string $value): void
    {
        $this->_type = $value;
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
            'setParams' => 'Map',
        );
        return $array_hints[$key];
    }

}