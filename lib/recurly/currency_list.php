<?php

class Recurly_CurrencyList implements ArrayAccess
{
  private $currencies;
  private $nodeName;
  
  function __construct($nodeName) {
    $this->nodeName = $nodeName;
    $this->currencies = array();
  }

  public function addCurrency($currencyCode, $amountInCents) {
    $this->currencies[$currencyCode] = new Recurly_Currency($currencyCode, $amountInCents);
  }
  public function __set($k, $v) {
    if (is_string($k) && strlen($k) == 3) {
      $this->addCurrency($k, $v);
    }
  }

  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->currencies[] = $value;
    } else {
      $this->currencies[$offset] = $value;
    }
  }
  public function offsetExists($offset) {
    return isset($this->currencies[$offset]);
  }
  public function offsetUnset($offset) {
    unset($this->currencies[$offset]);
  }
  public function offsetGet($offset) {
    return isset($this->currencies[$offset]) ? $this->currencies[$offset] : null;
  }


  public function populateXmlDoc(&$doc, &$node)
  {
    $currencyNode = $node->appendChild($doc->createElement($this->nodeName));

    foreach($this->currencies as $currency) {
      $currencyNode->appendChild($doc->createElement($currency->currencyCode, $currency->amount_in_cents));
    }
  }

  public function __toString() {
    $values = array();
    foreach($this->currencies as $currencyCode => $currency) {
      $amount = isset($currency->amount_in_cents) ? number_format($currency->amount(), 2) : 'null';
      $values[] = "{$currency->currencyCode}={$amount}";
    }
    $values = implode($values, ', ');
    return "<Recurly_CurrencyList [$values]>";
  }
}