<?php


class Recurly_ExternalPaymentPhaseTest extends Recurly_TestCase
{
  public function testGetPaymentPhase() {
    $this->client->addResponse('GET', '/external_payment_phases/sk0bmpw0wbby', 'external_payment_phases/show-200.xml');

    $external_payment_phase = Recurly_ExternalPaymentPhase::get('sk0bmpw0wbby', $this->client);
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
