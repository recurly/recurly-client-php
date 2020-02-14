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
    private $_gateway_code;
    private $_gateway_token;
    private $_last_four;
    private $_last_two;
    private $_object;
    private $_routing_number;
    private $_routing_number_bank;

    protected static $array_hints = array(
    );

    
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
    public function setAccountType(string $account_type): void
    {
        $this->_account_type = $account_type;
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
    public function setBillingAgreementId(string $billing_agreement_id): void
    {
        $this->_billing_agreement_id = $billing_agreement_id;
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
    public function setCardType(string $card_type): void
    {
        $this->_card_type = $card_type;
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
    public function setExpMonth(int $exp_month): void
    {
        $this->_exp_month = $exp_month;
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
    public function setExpYear(int $exp_year): void
    {
        $this->_exp_year = $exp_year;
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
    public function setFirstSix(string $first_six): void
    {
        $this->_first_six = $first_six;
    }

    /**
    * Getter method for the gateway_code attribute.
    *
    * @return string An identifier for a specific payment gateway.
    */
    public function getGatewayCode(): string
    {
        return $this->_gateway_code;
    }

    /**
    * Setter method for the gateway_code attribute.
    *
    * @param string $gateway_code
    *
    * @return void
    */
    public function setGatewayCode(string $gateway_code): void
    {
        $this->_gateway_code = $gateway_code;
    }

    /**
    * Getter method for the gateway_token attribute.
    *
    * @return string A token used in place of a credit card in order to perform transactions.
    */
    public function getGatewayToken(): string
    {
        return $this->_gateway_token;
    }

    /**
    * Setter method for the gateway_token attribute.
    *
    * @param string $gateway_token
    *
    * @return void
    */
    public function setGatewayToken(string $gateway_token): void
    {
        $this->_gateway_token = $gateway_token;
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
    public function setLastFour(string $last_four): void
    {
        $this->_last_four = $last_four;
    }

    /**
    * Getter method for the last_two attribute.
    *
    * @return string The IBAN bank account's last two digits.
    */
    public function getLastTwo(): string
    {
        return $this->_last_two;
    }

    /**
    * Setter method for the last_two attribute.
    *
    * @param string $last_two
    *
    * @return void
    */
    public function setLastTwo(string $last_two): void
    {
        $this->_last_two = $last_two;
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
    public function setObject(string $object): void
    {
        $this->_object = $object;
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
    public function setRoutingNumber(string $routing_number): void
    {
        $this->_routing_number = $routing_number;
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
    public function setRoutingNumberBank(string $routing_number_bank): void
    {
        $this->_routing_number_bank = $routing_number_bank;
    }
}