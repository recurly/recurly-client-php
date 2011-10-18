<?php

class Recurly_Link
{
  var $href;
  var $name;
  var $method;
  
  function __construct($name, $href, $method) {
    $this->href = $href;
    $this->name = $name;
    $this->method = $method;
  }
  
  public function __toString()
  {
    return "<Recurly_Link[{$name}] href=\"$href\" method=\"$method\">";
  }
}
