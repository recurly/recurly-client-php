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

    protected static $array_hints = array(
        'setBalances' => '\Recurly\Resources\AccountBalanceAmount',
    );

    
    /**
    * Getter method for the account attribute.
    * Account mini details
    *
    * @return ?\Recurly\Resources\AccountMini
    */
    public function getAccount(): ?\Recurly\Resources\AccountMini
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
    public function setAccount(\Recurly\Resources\AccountMini $account): void
    {
        $this->_account = $account;
    }

    /**
    * Getter method for the balances attribute.
    * 
    *
    * @return array
    */
    public function getBalances(): array
    {
        return $this->_balances ?? [] ;
    }

    /**
    * Setter method for the balances attribute.
    *
    * @param array $balances
    *
    * @return void
    */
    public function setBalances(array $balances): void
    {
        $this->_balances = $balances;
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
    * Getter method for the past_due attribute.
    * 
    *
    * @return ?bool
    */
    public function getPastDue(): ?bool
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
    public function setPastDue(bool $past_due): void
    {
        $this->_past_due = $past_due;
    }
}