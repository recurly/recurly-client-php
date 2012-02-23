<?php

class Recurly_jsMock extends Recurly_js {
  // Overload time so we can mock
  function utc_timestamp() {
    return 1330452000;
  }
}

class Recurly_RecurlyjsTestCase extends UnitTestCase {

  function setUp() {
    Recurly_js::$privateKey = "0123456789abcdef0123456789abcdef";
  }

  function tearDown() {
  }

  function testSignSimple() {
    $recurly_js = new Recurly_jsMock(array(
      'account' => array('account_code' => '123')
    ));
    $signature = $recurly_js->sign();

    $this->assertEqual($signature, "de21d9ef754772de103be467f58ddb0cb5ebb8f6|account%5Baccount_code%5D=123&timestamp=1330452000");
  }

  function testSignComplex() {
    $recurly_js = new Recurly_jsMock(array(
      'account' => array('account_code' => '123'),
      'plan_code' => 'gold',
      'add_ons' => array(
        array('add_on_code'=>'extra','quantity'=>5),
        array('add_on_code'=>'bonus','quantity'=>2)
      ),
      'quantity' => 1
    ));
    $signature = $recurly_js->sign();

    $this->assertEqual($signature, "e31ed714b041968c1685f3427d4d2b247c8ff3e9|account%5Baccount_code%5D=123&add_ons%5B0%5D%5Badd_on_code%5D=extra&" .
                                   "add_ons%5B0%5D%5Bquantity%5D=5&add_ons%5B1%5D%5Badd_on_code%5D=bonus&add_ons%5B1%5D%5Bquantity%5D=2&" .
                                   "plan_code=gold&quantity=1&timestamp=1330452000");
  }
}
