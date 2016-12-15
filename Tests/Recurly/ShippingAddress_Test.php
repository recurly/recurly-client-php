<?php


class Recurly_ShippingAddressTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml')
    );
  }

  public function testGetAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/accounts/abcdef1234567890/shipping_addresses', 'shipping_addresses/create-201.xml');

    $shad = new Recurly_ShippingAddress();
    $shad->nickname = "Home";
    $shad->first_name = "Verena";
    $shad->last_name = "Example";
    $shad->phone = "555-555-5555";
    $shad->email = "verena@example.com";
    $shad->address1 = "123 Dolores St.";
    $shad->city = "San Francisco";
    $shad->state = "CA";
    $shad->zip = "94110";
    $shad->country = "US";

    $account->createShippingAddress($shad, $this->client);

    $this->assertEquals($shad->id, 1234567);
  }

}
