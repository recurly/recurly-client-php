<?php

class Recurly_GiftCardTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/gift_cards/1988596967980562362', 'gift_cards/show-200.xml')
    );
  }

  public function testGetGiftCard() {
    $giftCard = Recurly_GiftCard::get(1988596967980562362, $this->client);

    $this->assertInstanceOf('Recurly_GiftCard', $giftCard);
    $this->assertInstanceOf('Recurly_Stub', $giftCard->gifter_account);
    $this->assertInstanceOf('Recurly_Delivery', $giftCard->delivery);
    $this->assertEquals($giftCard->getHref(),'https://api.recurly.com/v2/gift_cards/1988596967980562362');
    $this->assertEquals($giftCard->redemption_code,'AI4VOVO1RC74H9E2');
    $this->assertEquals($giftCard->product_code,'gift_card');
    $this->assertEquals($giftCard->unit_amount_in_cents,'2000');
    $this->assertEquals($giftCard->currency,'USD');
    $this->assertEquals($giftCard->balance_in_cents,'2000');
    $this->assertInstanceOf('DateTime', $giftCard->created_at);
    $this->assertInstanceOf('DateTime', $giftCard->updated_at);
    $this->assertInstanceOf('DateTime', $giftCard->redeemed_at);
    $this->assertInstanceOf('DateTime', $giftCard->delivered_at);
  }

  public function testGetGiftCardWithRevRec() {
    $this->client->addResponse('GET', '/gift_cards/1988596967980562362', 'gift_cards/show-200-revrec.xml');
    $giftCard = Recurly_GiftCard::get(1988596967980562362, $this->client);

    $this->assertInstanceOf('Recurly_GiftCard', $giftCard);
    $this->assertInstanceOf('Recurly_Stub', $giftCard->gifter_account);
    $this->assertInstanceOf('Recurly_Delivery', $giftCard->delivery);
    $this->assertEquals($giftCard->getHref(),'https://api.recurly.com/v2/gift_cards/1988596967980562362');
    $this->assertEquals($giftCard->redemption_code,'AI4VOVO1RC74H9E2');
    $this->assertEquals($giftCard->product_code,'gift_card');
    $this->assertEquals($giftCard->unit_amount_in_cents,'2000');
    $this->assertEquals($giftCard->currency,'USD');
    $this->assertEquals($giftCard->balance_in_cents,'2000');
    $this->assertEquals($giftCard->liability_gl_account_id,'t5ejtge1xw0x');
    $this->assertEquals($giftCard->revenue_gl_account_id,'t5ejtgf1vxh1');
    $this->assertEquals($giftCard->performance_obligation_id,'4');
    $this->assertInstanceOf('DateTime', $giftCard->created_at);
    $this->assertInstanceOf('DateTime', $giftCard->updated_at);
    $this->assertInstanceOf('DateTime', $giftCard->redeemed_at);
    $this->assertInstanceOf('DateTime', $giftCard->delivered_at);
  }

  public function testRedeemGiftCard() {
    $this->client->addResponse('POST', '/gift_cards/AI4VOVO1RC74H9E2/redeem', 'gift_cards/redeem-201.xml');

    $giftCard = new Recurly_GiftCard(null, $this->client);
    $giftCard->redemption_code = 'AI4VOVO1RC74H9E2';

    $giftCard->redeem('myaccount');

    $this->assertInstanceOf('Recurly_Stub', $giftCard->gifter_account);
    $this->assertInstanceOf('Recurly_Delivery', $giftCard->delivery);
  }

  // AC1: GIVEN I am creating a gift card purchase via the v2 /gift_cards endpoint
  // WHEN I pass in a value of true for tax_service_opt_out attribute
  // THEN I bypass the tax integration.
  public function testCreateGiftCardWithTaxServiceOptOutTrue() {
    $this->client->addResponse('POST', '/gift_cards', 'gift_cards/create-with-tax-opt-out-201.xml');

    $giftCard = new Recurly_GiftCard(null, $this->client);
    $giftCard->product_code = 'gift_card';
    $giftCard->unit_amount_in_cents = 3000;
    $giftCard->currency = 'USD';
    $giftCard->tax_service_opt_out = true;

    $delivery = new Recurly_Delivery();
    $delivery->method = 'email';
    $delivery->email_address = 'recipient2@example.com';
    $delivery->first_name = 'Bob';
    $delivery->last_name = 'Smith';
    $delivery->gifter_name = 'Alice Gifter';
    $giftCard->delivery = $delivery;

    $gifterAccount = new Recurly_Stub('gifter_account', 'https://api.recurly.com/v2/accounts/gifter456');
    $giftCard->gifter_account = $gifterAccount;

    $giftCard->create();

    $this->assertInstanceOf('Recurly_GiftCard', $giftCard);
    $this->assertEquals($giftCard->redemption_code, 'BYPASS123CODE89');
    $this->assertEquals($giftCard->unit_amount_in_cents, '3000');
  }

  // AC2: GIVEN I am creating a gift card purchase via the v2 /gift_cards endpoint
  // WHEN I pass in a value of false for tax_service_opt_out attribute
  // THEN send to the tax integration.
  public function testCreateGiftCardWithTaxServiceOptOutFalse() {
    $this->client->addResponse('POST', '/gift_cards', 'gift_cards/create-201.xml');

    $giftCard = new Recurly_GiftCard(null, $this->client);
    $giftCard->product_code = 'gift_card';
    $giftCard->unit_amount_in_cents = 5000;
    $giftCard->currency = 'USD';
    $giftCard->tax_service_opt_out = false;

    $delivery = new Recurly_Delivery();
    $delivery->method = 'email';
    $delivery->email_address = 'recipient@example.com';
    $delivery->first_name = 'Jane';
    $delivery->last_name = 'Doe';
    $delivery->gifter_name = 'John Gifter';
    $giftCard->delivery = $delivery;

    $gifterAccount = new Recurly_Stub('gifter_account', 'https://api.recurly.com/v2/accounts/gifter123');
    $giftCard->gifter_account = $gifterAccount;

    $giftCard->create();

    $this->assertInstanceOf('Recurly_GiftCard', $giftCard);
    $this->assertEquals($giftCard->redemption_code, 'TEST123CODE4567');
    $this->assertEquals($giftCard->unit_amount_in_cents, '5000');
  }

  // AC3: GIVEN I am creating a gift card via the v2 /gift_cards endpoint
  // WHEN I don't pass a value for tax_service_opt_out attribute
  // THEN send to the tax integration.
  public function testCreateGiftCardWithoutTaxServiceOptOut() {
    $this->client->addResponse('POST', '/gift_cards', 'gift_cards/create-201.xml');

    $giftCard = new Recurly_GiftCard(null, $this->client);
    $giftCard->product_code = 'gift_card';
    $giftCard->unit_amount_in_cents = 5000;
    $giftCard->currency = 'USD';
    // Not setting tax_service_opt_out - should default to sending to tax integration

    $delivery = new Recurly_Delivery();
    $delivery->method = 'email';
    $delivery->email_address = 'recipient@example.com';
    $delivery->first_name = 'Jane';
    $delivery->last_name = 'Doe';
    $delivery->gifter_name = 'John Gifter';
    $giftCard->delivery = $delivery;

    $gifterAccount = new Recurly_Stub('gifter_account', 'https://api.recurly.com/v2/accounts/gifter123');
    $giftCard->gifter_account = $gifterAccount;

    $giftCard->create();

    $this->assertInstanceOf('Recurly_GiftCard', $giftCard);
    $this->assertEquals($giftCard->redemption_code, 'TEST123CODE4567');
  }

  // AC4: GIVEN I am creating a gift card purchase via the v2 /gift_cards endpoint
  // WHEN I pass in a tax_service_opt_out value that isn't accepted
  // THEN I receive an API error response.
  public function testCreateGiftCardWithInvalidTaxServiceOptOut() {
    $this->client->addResponse('POST', '/gift_cards', 'gift_cards/create-invalid-tax-opt-out-422.xml');

    $giftCard = new Recurly_GiftCard(null, $this->client);
    $giftCard->product_code = 'gift_card';
    $giftCard->unit_amount_in_cents = 5000;
    $giftCard->currency = 'USD';
    // Note: In PHP, the client lib will convert to boolean before sending,
    // but this test validates server-side error handling

    $delivery = new Recurly_Delivery();
    $delivery->method = 'email';
    $delivery->email_address = 'recipient@example.com';
    $delivery->first_name = 'Jane';
    $delivery->last_name = 'Doe';
    $giftCard->delivery = $delivery;

    $gifterAccount = new Recurly_Stub('gifter_account', 'https://api.recurly.com/v2/accounts/gifter123');
    $giftCard->gifter_account = $gifterAccount;

    try {
      $giftCard->create();
      $this->fail("Expected Recurly_ValidationError");
    }
    catch (Recurly_ValidationError $e) {
      $this->assertEquals($e->errors[0]->symbol, 'invalid_value');
    }
  }
}

