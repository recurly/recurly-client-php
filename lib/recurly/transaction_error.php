<?php

class Recurly_TransactionError
{
  /**
   * Error code
   */
  var $error_code;
  
  /**
   * Error category
   */
  var $error_category;
  
  /**
   * Message to display to the customer
   */
  var $customer_message;
  
  /**
   * Advice to the merchant on why the transaction failed
   */
  var $merchant_message;
  
  
  public function __toString() {
    return "<Recurly_TransactionError error_code=\"{$this->error_code}\" error_category=\"{$this->error_category}\" customer_message=\"{$this->customer_message}\" transaction_error=\"{$this->merchant_message}\">";
  }
}
