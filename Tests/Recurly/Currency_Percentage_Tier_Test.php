<?php


class Recurly_CurrencyPercentageTierTest extends Recurly_TestCase
{
  public function testCreateXml() {
    $percentageTierByCurrency = new Recurly_CurrencyPercentageTier();
    $percentageTierByCurrency->ending_amount_in_cents = 100;
    $percentageTierByCurrency->usage_percentage = '10.0';

    $doc = new DOMDocument("1.0");
    $doc->encoding = 'utf-8';
    $root = $doc->appendChild($doc->createElement('tiers'));
    $percentageTierByCurrency->populateXmlDoc($doc, $root, $percentageTierByCurrency);

    $this->assertXmlStringEqualsXmlString(
      "<tiers>
        <tier>
          <ending_amount_in_cents>100</ending_amount_in_cents>
          <usage_percentage>10.0</usage_percentage>
        </tier>
      </tiers>", $doc->saveXml());
  }

  public function testCreateXml_EmptyCreatesNoElement() {
    $percentageTierByCurrency = new Recurly_CurrencyPercentageTier();

    $doc = new DOMDocument("1.0");
    $doc->encoding = 'utf-8';
    $root = $doc->appendChild($doc->createElement('wrapper'));
    $percentageTierByCurrency->populateXmlDoc($doc, $root, $percentageTierByCurrency);

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<wrapper/>\n",
      $doc->saveXml()
    );
  }
}
