<?php

class Recurly_ShippingAddress extends Recurly_Resource
{
  public static function get($accountCode, $shippingAddressId, $client = null) {
    return Recurly_Base::_get(Recurly_ShippingAddress::uriForAccountShippingAddress($accountCode, $shippingAddressId), $client);
  }

  protected static function uriForAccountShippingAddress($accountCode, $shippingAddressId) {
    return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . '/shipping_addresses/' . rawurlencode($shippingAddressId);
  }

  public function update() {
    $this->_save(Recurly_Client::PUT, $this->getHref());
  }

  protected function getNodeName() {
    return 'shipping_address';
  }
  protected function getWriteableAttributes() {
    return array(
      'address1', 'address2', 'city', 'state',
      'zip', 'country', 'phone', 'email', 'nickname',
      'first_name', 'last_name', 'company'
    );
  }
  protected function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node)) {
      $shippingAddressNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $shippingAddressNode, $obj);
    } else {
      parent::populateXmlDoc($doc, $node, $obj);
    }
  }

  private function isEmbedded($node) {
    $path = explode('/', $node->getNodePath());
    $last = $path[count($path)-1];
    return $last == 'shipping_addresses';
  }
}
