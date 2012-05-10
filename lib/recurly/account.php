<?php

class Recurly_Account extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;
  protected static $_requiredAttributes;

  function __construct($accountCode = null) {
    if (!is_null($accountCode))
      $this->account_code = $accountCode;
  }

  public static function init()
  {
    Recurly_Account::$_writeableAttributes = array(
      'account_code','username','first_name','last_name',
      'email','company_name','accept_language','billing_info'
    );
    Recurly_Account::$_nestedAttributes = array(
      'adjustments','billing_info','invoices','subscriptions','transactions'
    );
    Recurly_Account::$_requiredAttributes = array(
      'account_code'
    );
  }

  public static function get($accountCode, $client = null) {
    return Recurly_Base::_get(Recurly_Account::uriForAccount($accountCode), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_ACCOUNTS);
  }
  public function update() {
    $this->_save(Recurly_Client::PUT, $this->uri());
  }

  public function close() {
    return Recurly_Resource::_delete($this->uri());
  }
  public static function closeAccount($accountCode) {
    return Recurly_Resource::_delete(Recurly_Account::uriForAccount($accountCode));
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_Account::uriForAccount($this->account_code);
  }
  protected static function uriForAccount($accountCode) {
    return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode);
  }

  protected function getNodeName() {
    return 'account';
  }
  protected function getWriteableAttributes() {
    return Recurly_Account::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return Recurly_Account::$_requiredAttributes;
  }
}

Recurly_Account::init();
