<?php


class Recurly_ExternalPaymentPhaseListTest extends Recurly_TestCase
{

  public function testGetAll() {
    $url = '/external_subscriptions/swifdu8c9om9/external_payment_phases?';
    $this->client->addResponse('GET', $url, 'external_payment_phases/index-200.xml');

    $external_payment_phases = Recurly_ExternalPaymentPhaseList::get('swifdu8c9om9', array(), $this->client);
    $this->assertInstanceOf('Recurly_ExternalPaymentPhaseList', $external_payment_phases);
    $this->assertEquals($url, $external_payment_phases->getHref());

    $external_payment_phase = $external_payment_phases->current();
    $this->assertInstanceOf('Recurly_ExternalPaymentPhase', $external_payment_phase);
    $this->assertEquals($external_payment_phase->id, 'sk0bmpw0wbby');
    $this->assertInstanceOf('DateTime', $external_payment_phase->started_at);
    $this->assertInstanceOf('DateTime', $external_payment_phase->ends_at);
    $this->assertEquals($external_payment_phase->starting_billing_period_index, '1');
    $this->assertEquals($external_payment_phase->ending_billing_period_index, '4');
    $this->assertEquals($external_payment_phase->period_count, '1');
    $this->assertEquals($external_payment_phase->period_length, '2 MONTHS');
    $this->assertEquals($external_payment_phase->amount, '0.00');
    $this->assertEquals($external_payment_phase->currency, 'USD');
    $this->assertInstanceOf('DateTime', $external_payment_phase->created_at);
    $this->assertInstanceOf('DateTime', $external_payment_phase->updated_at);
  }
}
