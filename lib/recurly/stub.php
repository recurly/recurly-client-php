<?php

/**
 * Resource stub for Recurly API. 
 * Old Retreival Syntax:  $transaction->account->get()->account_id
 * New Retrieval Syntax:  $transaction->account->account_code
 */
class Recurly_Stub extends Recurly_Base
{
  /**
   * Stubbed object type. Useful for printing the current object as a string.
   */
  var $objectType;

  protected $_requestObject;

  function __construct($objectType, $href, $client = null)
  {
    parent::__construct($href, $client);
    $this->objectType = $objectType;
  }

  /**
   * Retrieve the stubbed resource.
   * Preferred usage is __get()
   */
  function get() {
    $this->_requestObject = self::_get($this->_href, $this->_client);
    return $this->_requestObject;
  }

  /**
   * More intuitive way to lazily fetch stubs
   * $transaction->account->account_code
   */
  function __get($var) {
    if (is_null($this->_requestObject)){
      $this->get();
    }
    return $this->_requestObject->$var;
  }
  
  public function __toString()
  {
    return "<Recurly_Stub[{$this->objectType}] href={$this->_href}>";
  }
}
