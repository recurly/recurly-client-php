<?php

class Recurly_AccountBalanceTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/accounts/abcdef1234567890/balance', 'balance/show-200.xml'),
    );
  }

  public function testConstructor() {
    $client = new Recurly_Client;
    $plan = new Recurly_AccountBalance(null, $client);

    $prop = new ReflectionProperty($plan, '_client');
    $prop->setAccessible(true);

    $this->assertSame($client, $prop->getValue($plan));
  }

  public function testGet() {
    $balance = Recurly_AccountBalance::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_AccountBalance', $balance);
    $this->assertEquals($balance->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890/balance');
    $this->assertInstanceOf('Recurly_Stub', $balance->account);
    $this->assertEquals(true, $balance->past_due);

    $this->assertInstanceOf('Recurly_CurrencyList', $balance->balance_in_cents);
    $this->assertEquals(2910, $balance->balance_in_cents['USD']->amount_in_cents);
    $this->assertEquals(-520, $balance->balance_in_cents['EUR']->amount_in_cents);

    $this->assertInstanceOf('Recurly_CurrencyList', $balance->processing_prepayment_balance_in_cents);
    $this->assertEquals(-3000, $balance->processing_prepayment_balance_in_cents['USD']->amount_in_cents);
    $this->assertEquals(0, $balance->processing_prepayment_balance_in_cents['EUR']->amount_in_cents);

    $this->assertInstanceOf('Recurly_CurrencyList', $balance->available_credit_balance_in_cents);
    $this->assertEquals(-3000, $balance->available_credit_balance_in_cents['USD']->amount_in_cents);
    $this->assertEquals(0, $balance->available_credit_balance_in_cents['EUR']->amount_in_cents);
  }
}
