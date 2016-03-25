<?php

namespace Recurly\Errors;

class TransactionError
{
    /*
     * Error code
     */
    public $error_code;

    /*
     * Error category
     */
    public $error_category;

    /*
     * Message to display to the customer
     */
    public $customer_message;

    /*
     * Advice to the merchant on why the transaction failed
     */
    public $merchant_message;

    /*
     * The error code returned by the gateway
     */
    public $gateway_error_code;

    public function __toString()
    {
        return "<TransactionError error_code=\"{$this->error_code}\" error_category=\"{$this->error_category}\" customer_message=\"{$this->customer_message}\" transaction_error=\"{$this->merchant_message}\" gateway_error_code=\"{$this->gateway_error_code}\">";
    }
}
