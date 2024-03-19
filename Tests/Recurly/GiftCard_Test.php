<?php

class Recurly_GiftCardTest extends Recurly_TestCase
{
  function defaultResponses(): array {
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
}
