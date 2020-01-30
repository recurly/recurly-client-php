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
class AccountBalance extends RecurlyResource
{
        private $_account;
        private $_balances;
        private $_object;
        private $_past_due;
    
    
    /**
    * Getter method for the account attribute.
    *
    * @return \Recurly\Resources\AccountMini Account mini details
    */
    public function getAccount(): \Recurly\Resources\AccountMini
    {
        return $this->_account;
    }

    /**
    * Setter method for the account attribute.
    *
    * @param \Recurly\Resources\AccountMini $account
    *
    * @return void
    */
    public function setAccount(\Recurly\Resources\AccountMini $value): void
    {
        $this->_account = $value;
    }

    /**
    * Getter method for the balances attribute.
    *
    * @return array 
    */
    public function getBalances(): array
    {
        return $this->_balances;
    }

    /**
    * Setter method for the balances attribute.
    *
    * @param array $balances
    *
    * @return void
    */
    public function setBalances(array $value): void
    {
        $this->_balances = $value;
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
    * Getter method for the past_due attribute.
    *
    * @return bool 
    */
    public function getPastDue(): bool
    {
        return $this->_past_due;
    }

    /**
    * Setter method for the past_due attribute.
    *
    * @param bool $past_due
    *
    * @return void
    */
    public function setPastDue(bool $value): void
    {
        $this->_past_due = $value;
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
            'setBalances' => '\Recurly\Resources\AccountBalanceAmount',
        );
        return $array_hints[$key];
    }

}