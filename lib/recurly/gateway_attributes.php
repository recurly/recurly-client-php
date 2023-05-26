<?php

/**
 * Class Recurly_GatewayAttributes
 * @property string $account_reference Used by Adyen gateways. The Shopper Reference value used when the external token was created. Must be used in conjunction with gateway_token and gateway_code.
 */
class Recurly_GatewayAttributes extends Recurly_Resource
{
  protected function getNodeName() {
    return 'gateway_attributes';
  }
  protected function getWriteableAttributes() {
    return array(
      'account_reference'
    );
  }
}
