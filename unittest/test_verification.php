<?php
require_once('../library/recurly.php');

class RecurlyVerificationTest extends RecurlyVerification {
  // Overload time so we can mock
  function time_difference($timestamp)
  {
    return 1024;
  }
}

class VerificationTestCase extends UnitTestCase {

  function setUp() {
    RecurlyClient::$private_key = "0123456789abcdef0123456789abcdef";
  }

  function tearDown() {
  }

  function testVerifySubscriptionResult() {
    RecurlyClient::$private_key = "c8b27bb177534f8da94e707356fe5013";
    $verification = new RecurlyVerificationTest(array(
      'signature' => '42f18ee561113ed06c806889b4f2f9ee19f813ff-1313727371',
      'account_code' => '123',
      'plan_code' => 'gold',
      'add_ons' => array(
        array('add_on_code'=>'extra','quantity'=>5),
        array('add_on_code'=>'bonus','quantity'=>2)
      ),
      'quantity' => 1
    ));
    $verification->verifySubscription();
    $this->pass();
  }
  
  function testVerifyTransactionResult() {
    RecurlyClient::$private_key = "c8b27bb177534f8da94e707356fe5013";
    $verification = new RecurlyVerificationTest(array(
      'signature' => '2eda29820cf6dd8276f492b2eba3d7c831fad1a4-1313727371',
      'account_code' => '123',
      'currency' => 'USD',
      'amount_in_cents' => 5000,
      'uuid' => '922ee630daa240da983bdac150d001a1'
      ));
      $verification->verifyTransaction();
      $this->pass();
  }

  // Timestamp too old
  function testVerifyTransactionException() {
    $this->expectException();
    RecurlyClient::$private_key = "c8b27bb177534f8da94e707356fe5013";
    $verification = new RecurlyVerification(array(
      'signature' => '2eda29820cf6dd8276f492b2eba3d7c831fad1a4-1313727371',
      'account_code' => '123',
      'currency' => 'USD',
      'amount_in_cents' => 5000,
      'uuid' => '922ee630daa240da983bdac150d001a1'
      ));
      $verification->verifyTransaction();
  }

  function testGenerateSignatureTransaction() {
    $signature = RecurlyVerificationTest::_generateSignature('transactioncreate', 
      array(
        'account_code' => '123',
        'amount_in_cents' => 5000,
        'currency' => 'USD'), 
      1313727561);
    $this->assertEqual($signature, "ccedb6a88e15cbec07187d6d21ff0041bc1fbc94-1313727561");
  }

  function testGenerateSignatureBillingInfo() {
    $signature = RecurlyVerificationTest::_generateSignature('billinginfoupdate', array('account_code' => '123'), 1313727561);
    $this->assertEqual($signature, "824c2ac45c66236c76bd746998a0e050836c1c3e-1313727561");
  }
}
