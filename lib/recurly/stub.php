<?php

/**
 * Resource stub for Recurly API. Call get() to retrieve the stubbed resource.
 */
class Recurly_Stub extends Recurly_Base
{
  /**
   * Stubbed object type. Useful for printing the current object as a string.
   */
  var $objectType;
  private $_data;

  function __construct($objectType, $href, $client = null)
  {
    parent::__construct($href, $client);
    $this->objectType = $objectType;
  }

  /**
   * Retrieve the stubbed resource.
   */
  function get() {
    return self::_get($this->_href, $this->_client);
  }

/**
   * More intuitive way to lazily fetch stubs
   */
  function __get($var) {
    if ($this->_data == null){
      $this->_data = self::_get($this->_href, $this->_client);
    }
    return $this->_data->$var;
  }
  
  public function __toString()
  {
    return "<Recurly_Stub[{$this->objectType}] href={$this->_href}>";
  }
}
