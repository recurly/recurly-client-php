<?php


class Recurly_CurrecyPercentageTierTest extends Recurly_TestCase
{
  public function testCreateXml() {
    $currencyPercentageTier = new Recurly_CurrencyPercentageTier();
    $currencyPercentageTier->ending_amount_in_cents = 100;
    $currencyPercentageTier->usage_percentage = '10.0';

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('tiers'));
    $currencyPercentageTier->populateXmlDoc($doc, $root, $currencyPercentageTier);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<tiers><tier><ending_amount_in_cents>100</ending_amount_in_cents><usage_percentage>10.0</usage_percentage></tier></tiers>\n",
      $doc->saveXml()
    );
  }

  public function testCreateXml_EmptyCreatesNoElement() {
    $currencyPercentageTier = new Recurly_CurrencyPercentageTier();

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('wrapper'));
    $currencyPercentageTier->populateXmlDoc($doc, $root, $currencyPercentageTier);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<wrapper/>\n",
      $doc->saveXml()
    );
  }
}