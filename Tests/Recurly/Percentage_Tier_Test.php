<?php


class Recurly_PercentageTierTest extends Recurly_TestCase
{
  public function testCreateXml() {
    $percentageTier = new Recurly_PercentageTier();
    $percentageTier->currency = 'USD';
    $percentageTierByCurrency = new Recurly_CurrencyPercentageTier();
    $percentageTierByCurrency->ending_amount_in_cents = 100;
    $percentageTierByCurrency->usage_percentage = '10.0';
    $percentageTierByCurrency2 = new Recurly_CurrencyPercentageTier();
    $percentageTierByCurrency2->ending_amount_in_cents = null;
    $percentageTierByCurrency2->usage_percentage = '20.0';
    $percentageTier->tiers = array($percentageTierByCurrency, $percentageTierByCurrency2);

    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement('percentage_tiers'));
    $percentageTier->populateXmlDoc($doc, $root, $percentageTier);

    $this->assertXmlStringEqualsXmlString(
      "<percentage_tiers>
        <percentage_tier>
          <currency>USD</currency>
          <tiers>
            <tier>
              <ending_amount_in_cents>100</ending_amount_in_cents>
              <usage_percentage>10.0</usage_percentage>
            </tier>
            <tier>
              <ending_amount_in_cents nil=\"nil\"/>
              <usage_percentage>20.0</usage_percentage>
            </tier>
          </tiers>
        </percentage_tier>
      </percentage_tiers>", $doc->saveXml());
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
