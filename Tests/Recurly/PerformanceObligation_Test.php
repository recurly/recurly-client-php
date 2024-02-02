<?php

class Recurly_PerformanceObligationTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/performance_obligations/6', 'performance_obligations/show-200.xml'),
    );
  }

  public function testPerformanceObligation() {
    $pob = Recurly_PerformanceObligation::get('6', $this->client);

    $this->assertInstanceOf('Recurly_PerformanceObligation', $pob);
    $this->assertEquals('Over Time (Daily)', $pob->name);
    $this->assertEquals('6', $pob->id);
    $this->assertInstanceOf('DateTime', $pob->created_at);
    $this->assertInstanceOf('DateTime', $pob->updated_at);
  }
}
