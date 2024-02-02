<?php

class Recurly_PerformanceObligationListTest extends Recurly_TestCase
{
  public function testPerformanceObligationListAll() {
    $this->client->addResponse(
      'GET',
      '/performance_obligations',
      'performance_obligations/list-200.xml'
    );

    $performance_obligations = Recurly_PerformanceObligationList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_PerformanceObligationList', $performance_obligations);

    $performance_obligation = $performance_obligations->current();
    $this->assertInstanceOf('Recurly_PerformanceObligation', $performance_obligation);

    $this->assertEquals(iterator_count($performance_obligations), 3);
  }
}
