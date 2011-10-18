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
  
  public function __toString()
  {
    return "<Recurly_Stub[{$this->objectType}] href={$this->_href}>";
  }
}
