<?php

class Recurly_Adjustment extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Adjustment::$_writeableAttributes = array(
      'currency','unit_amount_in_cents','quantity','description',
      'taxable','accounting_code'
    );
    Recurly_Adjustment::$_nestedAttributes = array(
      'invoice'
    );
  }

  public static function get($adjustment_uuid) {
    return Recurly_Base::_get(Recurly_Client::PATH_ADJUSTMENTS . '/' . rawurlencode($adjustment_uuid));
  }

  public function create() {
    $this->_save(Recurly_Client::POST, $this->createUriForAccount());
  }
  public function delete() {
    return Recurly_Resource::_delete($this->getHref());
  }

  protected function createUriForAccount() {
    if (empty($this->account_code))
      throw new Recurly_Error("'account_code' is not specified");

    return (Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($this->account_code) .
            Recurly_Client::PATH_ADJUSTMENTS);
  }

  protected function getNodeName() {
    return 'adjustment';
  }
  protected function getWriteableAttributes() {
    return Recurly_Adjustment::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_Adjustment::init();
