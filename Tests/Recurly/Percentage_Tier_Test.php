<?php


class Recurly_PercentageTierTest extends Recurly_TestCase
{
  public function testCreateXml() {
    $percentageTier = new Recurly_PercentageTier();
    $percentageTier->currency = 'USD';
    $currencyPercentageTier = new Recurly_CurrencyPercentageTier();
    $currencyPercentageTier->ending_amount_in_cents = 100;
    $currencyPercentageTier->usage_percentage = '10.0';
    $currencyPercentageTier2 = new Recurly_CurrencyPercentageTier();
    $currencyPercentageTier2->ending_amount_in_cents = null;
    $currencyPercentageTier2->usage_percentage = '20.0';
    $percentageTier->tiers = array($currencyPercentageTier, $currencyPercentageTier2);

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('percentage_tiers'));
    $percentageTier->populateXmlDoc($doc, $root, $percentageTier);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<percentage_tiers><percentage_tier><currency>USD</currency><tiers><tier><ending_amount_in_cents>100</ending_amount_in_cents><usage_percentage>10.0</usage_percentage></tier><tier><ending_amount_in_cents nil=\"nil\"/><usage_percentage>20.0</usage_percentage></tier></tiers></percentage_tier></percentage_tiers>\n",
      $doc->saveXml()
    );
  }

  public function testCreateXml_EmptyCreatesNoElement() {
    $percentageTier = new Recurly_PercentageTier();

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('wrapper'));
    $percentageTier->populateXmlDoc($doc, $root, $percentageTier);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<wrapper/>\n",
      $doc->saveXml()
    );
  }
}