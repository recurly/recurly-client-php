<?php

class RecurlyGiftCardListTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/gift_cards', 'gift_cards/index-200.xml')
    );
  }

  public function testLoad() {
    $gift_cards = Recurly_GiftCardList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_GiftCardList', $gift_cards);
    $this->assertEquals('/gift_cards', $gift_cards->getHref());
    $this->assertEquals(42, $gift_cards->count());
  }
}
