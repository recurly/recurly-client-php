<?php
require_once('../library/recurly.php');


class TransparentTestCase extends UnitTestCase {
    
  function setUp() {
  }

  function tearDown() {
  }
  
  function testBillingInfoUrl() {
    $url = RecurlyClient::__recurlyBaseUrl() . '/transparent/' . RecurlyClient::$subdomain . '/billing_info';
    $this->assertEqual(RecurlyTransparent::billingInfoUrl(), $url);
  }
  
  function testSubscribeUrl() {
    $url = RecurlyClient::__recurlyBaseUrl() . '/transparent/' . RecurlyClient::$subdomain . '/subscription';
    $this->assertEqual(RecurlyTransparent::subscribeUrl(), $url);
  }
  
  function testTransactionUrl() {
    $url = RecurlyClient::__recurlyBaseUrl() . '/transparent/' . RecurlyClient::$subdomain . '/transaction';
    $this->assertEqual(RecurlyTransparent::transactionUrl(), $url);
  }
  
  function testEncryptString()
  {
    $string = "d00d";

    $encrypted = RecurlyTransparent::_hash($string);
    $this->assertEqual("938f381f79192f536cbe29a79db5c595b7a09379", $encrypted);

    $this->assertNotEqual($encrypted, RecurlyTransparent::_hash("d00d2"));
  }
  
  function testEncodeData()
  {    
    $query_string = RecurlyTransparent::_queryString(array(
      'redirect_url' => 'http://example.com/',
      'account' => array('account_code' => 'howdy'),
      'value' => 'hello'
    ));
    
    $time = urlencode(gmdate("Y-m-d\TH:i:s\Z"));
    $this->assertEqual($query_string, 'account%5Baccount_code%5D=howdy&redirect_url=http%3A%2F%2Fexample.com%2F&time=' .$time . '&value=hello');
  }
}
