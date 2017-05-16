<?php


class Recurly_MeasuredUnitListTest extends Recurly_TestCase
{
  public function testGetMeasuredUnits() {
    $this->client->addResponse('GET', '/measured_units', 'measured_units/index-200.xml');

    $measured_units = Recurly_MeasuredUnitList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_MeasuredUnitList', $measured_units);
    $this->assertEquals('/measured_units', $measured_units->getHref());
  }
}
