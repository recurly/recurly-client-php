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
class PaymentMethod extends RecurlyResource
{
        private $_account_type;
        private $_billing_agreement_id;
        private $_card_type;
        private $_exp_month;
        private $_exp_year;
        private $_first_six;
        private $_last_four;
        private $_object;
        private $_routing_number;
        private $_routing_number_bank;
    
    
    /**
    * Getter method for the account_type attribute.
    *
    * @return string The bank account type. Only present for ACH payment methods.
    */
    public function getAccountType(): string
    {
        return $this->_account_type;
    }

    /**
    * Setter method for the account_type attribute.
    *
    * @param string $account_type
    *
    * @return void
    */
    public function setAccountType(string $value): void
    {
        $this->_account_type = $value;
    }

    /**
    * Getter method for the billing_agreement_id attribute.
    *
    * @return string Billing Agreement identifier. Only present for Amazon or Paypal payment methods.
    */
    public function getBillingAgreementId(): string
    {
        return $this->_billing_agreement_id;
    }

    /**
    * Setter method for the billing_agreement_id attribute.
    *
    * @param string $billing_agreement_id
    *
    * @return void
    */
    public function setBillingAgreementId(string $value): void
    {
        $this->_billing_agreement_id = $value;
    }

    /**
    * Getter method for the card_type attribute.
    *
    * @return string Visa, MasterCard, American Express, Discover, JCB, etc.
    */
    public function getCardType(): string
    {
        return $this->_card_type;
    }

    /**
    * Setter method for the card_type attribute.
    *
    * @param string $card_type
    *
    * @return void
    */
    public function setCardType(string $value): void
    {
        $this->_card_type = $value;
    }

    /**
    * Getter method for the exp_month attribute.
    *
    * @return int Expiration month.
    */
    public function getExpMonth(): int
    {
        return $this->_exp_month;
    }

    /**
    * Setter method for the exp_month attribute.
    *
    * @param int $exp_month
    *
    * @return void
    */
    public function setExpMonth(int $value): void
    {
        $this->_exp_month = $value;
    }

    /**
    * Getter method for the exp_year attribute.
    *
    * @return int Expiration year.
    */
    public function getExpYear(): int
    {
        return $this->_exp_year;
    }

    /**
    * Setter method for the exp_year attribute.
    *
    * @param int $exp_year
    *
    * @return void
    */
    public function setExpYear(int $value): void
    {
        $this->_exp_year = $value;
    }

    /**
    * Getter method for the first_six attribute.
    *
    * @return string Credit card number's first six digits.
    */
    public function getFirstSix(): string
    {
        return $this->_first_six;
    }

    /**
    * Setter method for the first_six attribute.
    *
    * @param string $first_six
    *
    * @return void
    */
    public function setFirstSix(string $value): void
    {
        $this->_first_six = $value;
    }

    /**
    * Getter method for the last_four attribute.
    *
    * @return string Credit card number's last four digits. Will refer to bank account if payment method is ACH.
    */
    public function getLastFour(): string
    {
        return $this->_last_four;
    }

    /**
    * Setter method for the last_four attribute.
    *
    * @param string $last_four
    *
    * @return void
    */
    public function setLastFour(string $value): void
    {
        $this->_last_four = $value;
    }

    /**
    * Getter method for the object attribute.
    *
    * @return string 
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
    * Getter method for the routing_number attribute.
    *
    * @return string The bank account's routing number. Only present for ACH payment methods.
    */
    public function getRoutingNumber(): string
    {
        return $this->_routing_number;
    }

    /**
    * Setter method for the routing_number attribute.
    *
    * @param string $routing_number
    *
    * @return void
    */
    public function setRoutingNumber(string $value): void
    {
        $this->_routing_number = $value;
    }

    /**
    * Getter method for the routing_number_bank attribute.
    *
    * @return string The bank name of this routing number.
    */
    public function getRoutingNumberBank(): string
    {
        return $this->_routing_number_bank;
    }

    /**
    * Setter method for the routing_number_bank attribute.
    *
    * @param string $routing_number_bank
    *
    * @return void
    */
    public function setRoutingNumberBank(string $value): void
    {
        $this->_routing_number_bank = $value;
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