<?php

/**
 * Array of errors
 */
class Recurly_ErrorList implements ArrayAccess
{
  /**
   * Transaction. Set on transaction attempts
   */
  var $transaction;

  /**
   * Transaction error information. Set on transaction errors
   */
  var $transaction_error;

  /**
   * Array of field errors
   */
  private $errors;
  
  function __construct() {
    $this->errors = array();
  }

  // array access to the errors collection
  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->errors[] = $value;
    } else {
    $this->errors[$offset] = $value;
    }
  }
  public function offsetExists($offset) {
    return isset($this->errors[$offset]);
  }
  public function offsetUnset($offset) {
    unset($this->errors[$offset]);
  }
  public function offsetGet($offset) {
    return isset($this->errors[$offset]) ? $this->errors[$offset] : null;
  }
  
  public function __toString() {
    $values = array();
    foreach($this->errors as $error) {
      $values[] = strval($error);
    }
    $values = implode($values, ', ');
    return "<Recurly_ErrorList [$values] transaction=[{$this->transaction}] transaction_error=[{$this->transaction_error}]>";
  }
}
