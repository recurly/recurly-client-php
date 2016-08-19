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
