<?php

class Recurly_ShippingAddressTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/accounts/abcdef1234567890', 'accounts/show-200.xml')
    );
  }

  protected function mockShippingAddress() {
    $shad = new Recurly_ShippingAddress();
    $shad->nickname = "Work";
    $shad->first_name = "Verena";
    $shad->last_name = "Example";
    $shad->phone = "555-555-5555";
    $shad->email = "verena@example.com";
    $shad->address1 = "123 Dolores St.";
    $shad->city = "San Francisco";
    $shad->state = "CA";
    $shad->zip = "94110";
    $shad->country = "US";
    $shad->company = "Recurly Inc.";

    return $shad;
  }

  public function testXml() {
    $shad = $this->mockShippingAddress();

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<shipping_address><address1>123 Dolores St.</address1><city>San Francisco</city><state>CA</state><zip>94110</zip><country>US</country><phone>555-555-5555</phone><email>verena@example.com</email><nickname>Work</nickname><first_name>Verena</first_name><last_name>Example</last_name><company>Recurly Inc.</company></shipping_address>\n",
      $shad->xml()
    );
  }

  public function testCreateShippingAddressOnExistingAccount() {
    $account = Recurly_Account::get('abcdef1234567890', $this->client);
    $this->client->addResponse('POST', 'https://api.recurly.com/v2/accounts/abcdef1234567890/shipping_addresses', 'shipping_addresses/create-201.xml');

    $shad = $this->mockShippingAddress();

    $account->createShippingAddress($shad, $this->client);

    $this->assertEquals($shad->id, 1234567);
  }

  public function testUpdateShippingAddress() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890/shipping_addresses', 'shipping_addresses/index-200.xml');
    $this->client->addResponse('PUT', 'https://api.recurly.com/v2/accounts/abcdef1234567890/shipping_addresses/1234567', 'shipping_addresses/update-200.xml');

    $shipping_addresses = Recurly_ShippingAddressList::get('abcdef1234567890', null, $this->client);

    foreach ($shipping_addresses as $shipping_address)  {
      if ($shipping_address->nickname == 'Home') {
        $shipping_address->address1 = "123 NewStreet Ave.";
        $shipping_address->update();
        $this->assertEquals($shipping_address->address1, "123 NewStreet Ave.");
      }
    }
  }

    public function testGetShippingAddress() {
      $this->client->addResponse('GET', '/accounts/abcdef1234567890/shipping_addresses/1234567', 'shipping_addresses/show-200.xml');

      $shad = Recurly_ShippingAddress::get('abcdef1234567890', 1234567, $this->client);
      $this->assertEquals($shad->id, 1234567);
    }

}
