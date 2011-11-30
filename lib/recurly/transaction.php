<?php

class Recurly_Transaction extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Transaction::$_writeableAttributes = array(
      'account','amount_in_cents','currency','description'
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
   * Void a recent, successful transaction
   */
  public function void() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/void');
  }

  /**
   * Refund a previous, successful transaction
   */
  public function refund($amountInCents = null) {
    if (is_null($amountInCents))
      $this->_save(Recurly_Client::PUT, $this->uri() . '/refund');
    else
      $this->_save(Recurly_Client::PUT, $this->uri() . '/refund?amount_in_cents=' . strval(intval($amountInCents)));
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else if (!empty($this->uuid))
      return Recurly_Account::uriForTransaction($this->uuid);
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
}

Recurly_Transaction::init();
