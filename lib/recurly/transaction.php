<?php

class Recurly_Transaction extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Transaction::$_writeableAttributes = array(
      'account','amount_in_cents','currency','description','accounting_code'
    );
    Recurly_Transaction::$_nestedAttributes = array('account');
  }

  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_Transaction::uriForTransaction($uuid), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_TRANSACTIONS);
  }

  /**
   * Refund a previous, successful transaction
   */
  public function refund($amountInCents = null) {
    if (is_null($amountInCents))
      $this->_delete($this->uri());
    else
      $this->_delete($this->uri() . '?amount_in_cents=' . strval(intval($amountInCents)));
  }

  /**
   * Attempt a void, otherwise refund
   */
  public function void() {
    trigger_error('Deprecated method: void(). Use refund() instead.', E_USER_NOTICE);
    $this->refund();
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else if (!empty($this->uuid))
      return Recurly_Transaction::uriForTransaction($this->uuid);
    else
      throw new Recurly_Error('"uuid" is not supplied');
  }
  protected static function uriForTransaction($uuid) {
    return Recurly_Client::PATH_TRANSACTIONS . '/' . rawurlencode($uuid);
  }

  protected function getNodeName() {
    return 'transaction';
  }
  protected function getWriteableAttributes() {
    return Recurly_Transaction::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_Transaction::init();
