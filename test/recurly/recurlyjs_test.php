<?php

class Recurly_jsMock extends Recurly_js {
  // Overload time so we can mock
  function utc_timestamp() {
    return 1330452000;
  }

  function get_nonce() {
    return "1234567890ABC";
  }
}

class Recurly_RecurlyjsTestCase extends UnitTestCase {

  function setUp() {
    Recurly_js::$privateKey = "0123456789abcdef0123456789abcdef";
  }

  function tearDown() {
  }

  function testSignSimple() {
    $signature = Recurly_jsMock::sign(array(
      'account' => array('account_code' => '123')
    ), "Recurly_jsMock");

    $this->assertEqual($signature, "e4bbe0671c8154f82b6a96cf2b13307d839e6ad6|" .
      "account%5Baccount_code%5D=123&nonce=1234567890ABC&timestamp=1330452000");
  }

  function testSignComplex() {
    $signature = Recurly_jsMock::sign(array(
      'account' => array('account_code' => '123'),
      'plan_code' => 'gold',
      'add_ons' => array(
        array('add_on_code'=>'extra','quantity'=>5),
        array('add_on_code'=>'bonus','quantity'=>2)
      ),
      'quantity' => 1
    ), "Recurly_jsMock");

    $this->assertEqual($signature, "af31773205811350017ed1d05e5b2f7d303417d8|" .
      "account%5Baccount_code%5D=123&add_ons%5B0%5D%5Badd_on_code%5D=extra&ad" .
      "d_ons%5B0%5D%5Bquantity%5D=5&add_ons%5B1%5D%5Badd_on_code%5D=bonus&add" .
      "_ons%5B1%5D%5Bquantity%5D=2&nonce=1234567890ABC&plan_code=gold&quantit" .
      "y=1&timestamp=1330452000");
  }
}
