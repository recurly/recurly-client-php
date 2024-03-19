<?php

class Recurly_CreditPaymentListTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/credit_payments', 'credit_payments/index-200.xml')
    );
  }

  function testCreditPaymentIndex() {
    $credit_payments = Recurly_CreditPaymentList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_CreditPaymentList', $credit_payments);
  }
}
