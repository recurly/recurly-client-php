<?php

class Recurly_CurrencyList implements ArrayAccess, Countable, IteratorAggregate
{
  private $currencies;
  private $nodeName;

  function __construct($nodeName) {
    $this->nodeName = $nodeName;
    $this->currencies = array();
  }

  public function addCurrency($currencyCode, $amountInCents): void {
    if (is_string($currencyCode) && strlen($currencyCode) == 3) {
      $this->currencies[$currencyCode] = new Recurly_Currency($currencyCode, $amountInCents);
    }
  }

  public function getCurrency($currencyCode) {
    return isset($this->currencies[$currencyCode]) ? $this->currencies[$currencyCode] : null;
  }

  public function offsetSet($offset, $value): void {
    $this->addCurrency($offset, $value);
  }

  public function offsetExists($offset): bool {
    return isset($this->currencies[$offset]);
  }

  public function offsetUnset($offset): void {
    unset($this->currencies[$offset]);
  }

  #[ReturnTypeWillChange]
  public function offsetGet($offset) {
    return $this->getCurrency($offset);
  }

  public function __set($k, $v) {
    return $this->offsetSet($k, $v);
  }

  public function __get($k) {
    return $this->offsetGet($k);
  }

  public function count(): int {
    return count($this->currencies);
  }

  public function getIterator(): Traversable {
    return new ArrayIterator($this->currencies);
  }

  public function populateXmlDoc(&$doc, &$node) {
    // Don't emit an element if there are no currencies.
    if ($this->currencies) {
      $currencyNode = $node->appendChild($doc->createElement($this->nodeName));
      foreach($this->currencies as $currency) {
        $currencyNode->appendChild($doc->createElement($currency->currencyCode, $currency->amount_in_cents));
      }
    }
  }

  public function __toString() {
    $values = array();
    foreach($this->currencies as $currencyCode => $currency) {
      $amount = isset($currency->amount_in_cents) ? number_format($currency->amount(), 2) : 'null';
      $values[] = "{$currency->currencyCode}={$amount}";
    }
    $values = implode(', ', $values);
    return "<Recurly_CurrencyList [$values]>";
  }
}
