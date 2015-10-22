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
   * This is used to reload the object
   */
  function get() {
    $this->_requestObject = self::_get($this->_href, $this->_client);
    return $this->_requestObject;
  }

  /**
   * Ensures the resource has been fetched then tries to return it's property of the same name.
   * 
   * You can replace: 
   * $transaction->account->get()->account_id
   * With:
   * $transaction->account->account_id
   * 
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
