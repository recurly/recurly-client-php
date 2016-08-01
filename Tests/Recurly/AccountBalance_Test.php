<?php

class Recurly_AccountBalanceTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890/balance', 'balance/show-200.xml'),
    );
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
  }
}
