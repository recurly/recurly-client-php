<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_CurrecyListTest extends Recurly_TestCase
{
  public function testCreateXml() {
    $currencyList = new Recurly_CurrencyList('element_name');
    $currencyList->addCurrency('USD', 1500);
    $currencyList->addCurrency('EUR', 1200);

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('wrapper'));
    $currencyList->populateXmlDoc($doc, $root);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<wrapper><element_name><USD>1500</USD><EUR>1200</EUR></element_name></wrapper>\n",
      $doc->saveXML()
    );
  }

  public function testCreateXml_EmptyCreatesNoElement() {
    $currencyList = new Recurly_CurrencyList('setup_fee_in_cents');

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('wrapper'));
    $currencyList->populateXmlDoc($doc, $root);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<wrapper/>\n",
      $doc->saveXML()
    );
  }
}