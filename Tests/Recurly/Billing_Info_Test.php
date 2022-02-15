<?php


class Recurly_BillingInfoTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890/billing_info', 'billing_info/show-200.xml'),
      array('GET', '/accounts/abcdef1234567890z/billing_infos', 'billing_info/show-200-wallet.xml'),
      array('GET', '/accounts/paypal1234567890/billing_info', 'billing_info/show-paypal-200.xml'),
      array('GET', '/accounts/amazon1234567890/billing_info', 'billing_info/show-amazon-200.xml'),
      array('GET', '/accounts/bankaccount1234567890/billing_info', 'billing_info/show-bank-account-200.xml'),
      array('GET', '/accounts/sepa1234567890/billing_info', 'billing_info/show-sepa-200.xml'),
      array('GET', '/accounts/bacs1234567890/billing_info', 'billing_info/show-bacs-200.xml'),
      array('GET', '/accounts/becs1234567890/billing_info', 'billing_info/show-becs-200.xml'),
      array('PUT', '/accounts/abcdef1234567890/billing_info', 'billing_info/show-200.xml'),
      array('DELETE', '/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
      array('DELETE', 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info', 'billing_info/destroy-204.xml'),
    );
  }

  public function testGetBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->first_name, 'Larry');
    $this->assertEquals($billing_info->company, 'Pretty Good Company');
    $this->assertEquals($billing_info->address1, '123 Pretty Pretty Good St.');
    $this->assertEquals($billing_info->country, 'US');
    $this->assertEquals($billing_info->card_type, 'Visa');
    $this->assertEquals($billing_info->year, 2049);
    $this->assertEquals($billing_info->month, 1);
    $this->assertTrue($billing_info->primary_payment_method);
    $this->assertFalse($billing_info->backup_payment_method);
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info');
    $this->assertEquals($billing_info->getType(), 'credit_card');
  }

  public function testGetBillingInfos() {
    $billing_infos = Recurly_BillingInfoList::get('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_BillingInfoList', $billing_infos);
  }

  public function testGetPayPalBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('paypal1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->card_type, null);
    $this->assertEquals($billing_info->year, null);
    $this->assertEquals($billing_info->month, null);
    $this->assertEquals($billing_info->amazon_billing_agreement_id, null);
    $this->assertEquals($billing_info->amazon_region, null);
    $this->assertEquals($billing_info->paypal_billing_agreement_id, 'abc123');
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/paypal1234567890/billing_info');
  }

  public function testGetAmazonBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('amazon1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->card_type, null);
    $this->assertEquals($billing_info->year, null);
    $this->assertEquals($billing_info->month, null);
    $this->assertEquals($billing_info->paypal_billing_agreement_id, null);
    $this->assertEquals($billing_info->amazon_billing_agreement_id, 'C01-1234567-8901234');
    $this->assertEquals($billing_info->amazon_region, 'us');
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/amazon1234567890/billing_info');
  }

  public function testGetBankAccountBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('bankaccount1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->name_on_account, 'John Doe');
    $this->assertEquals($billing_info->first_name, null);
    $this->assertEquals($billing_info->last_name, null);

    $this->assertEquals($billing_info->address1, '123 Fake St');
    $this->assertEquals($billing_info->country, 'US');

    $this->assertEquals($billing_info->account_type, 'checking');
    $this->assertEquals($billing_info->last_four, '6789');
    $this->assertEquals($billing_info->routing_number, '125200057');

    $this->assertEquals($billing_info->card_type, null);
    $this->assertEquals($billing_info->getHref(), 'https://api.recurly.com/v2/accounts/bankaccount1234567890/billing_info');
  }

  public function testGetIbanBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('sepa1234567890', $this->client);
    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->last_two, '06');
    $this->assertEquals($billing_info->name_on_account, 'Account Name');
  }

  public function testGetBacsBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('bacs1234567890', $this->client);
    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->sort_code, '200000');
    $this->assertEquals($billing_info->name_on_account, 'BACS');
  }

  public function testGetBecsBillingInfo() {
    $billing_info = Recurly_BillingInfo::get('becs1234567890', $this->client);
    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals($billing_info->bsb_code, '082-082');
    $this->assertEquals($billing_info->name_on_account, 'BECS');
  }

  public function testVerifyBillingInfoCreditCard() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/accounts/abcdef1234567890/billing_info/verify', 'billing_info/verify-200.xml');
    
    $verified = $billing_info->verify();
    $this->assertEquals($verified->origin, 'api_verify_card');

    $verified_gateway = $billing_info->verify('gateway-code');
    $this->assertEquals($verified_gateway->origin, 'api_verify_card');
  }

  public function testVerifyBillingInfoBankAccount() {
    $billing_info = Recurly_BillingInfo::get('bankaccount1234567890', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/accounts/bankaccount1234567890/billing_info/verify', 'billing_info/verify-422.xml');

    try {
      $verified = $billing_info->verify();
    } catch(Recurly_Error $e) {
      $this->assertEquals($e->getMessage(), "Only stored credit card billing information can be verified at this time.");
    }
  }

  public function testDelete() {
    $billing_info = Recurly_BillingInfo::get('abcdef1234567890', $this->client);

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $billing_info->delete();
  }

  public function testDeleteForAccount() {
    Recurly_BillingInfo::deleteForAccount('abcdef1234567890', $this->client);
  }

  public function testCreateForAccount() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->account_code = 'abcdef1234567890';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $billing_info->create();
  }

  public function testCreateForAccountWithToken() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->account_code = 'abcdef1234567890';
    $billing_info->token_id = 'abc123';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><token_id>abc123</token_id></billing_info>\n"
    );
    $billing_info->create();
  }

  public function testTransactionType() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->transaction_type = 'moto';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><transaction_type>moto</transaction_type></billing_info>\n"
    );
  }

  public function testForExternalHppType() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->token_id = 'abc123';
    $billing_info->external_hpp_type = 'adyen';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><token_id>abc123</token_id><external_hpp_type>adyen</external_hpp_type></billing_info>\n"
    );
  }

  public function testForOnlineBankingPaymentType() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->token_id = 'abc123';
    $billing_info->online_banking_payment_type = 'ideal';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><token_id>abc123</token_id><online_banking_payment_type>ideal</online_banking_payment_type></billing_info>\n"
    );
  }

  public function testForGatewayToken() {
    $billing_info = new Recurly_BillingInfo(null, $this->client);
    $billing_info->gateway_token = 'x1x2x3';
    $billing_info->gateway_code = 'abc123';
    $billing_info->month = '11';
    $billing_info->year = '2025';

    $this->assertInstanceOf('Recurly_BillingInfo', $billing_info);
    $this->assertEquals(
      $billing_info->xml(),
      "<?xml version=\"1.0\"?>\n<billing_info><month>11</month><year>2025</year><gateway_token>x1x2x3</gateway_token><gateway_code>abc123</gateway_code></billing_info>\n"
    );
  }

}
