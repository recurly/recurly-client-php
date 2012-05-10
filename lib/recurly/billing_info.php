<?php

class Recurly_BillingInfo extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_BillingInfo::$_writeableAttributes = array(
      'first_name','last_name','ip_address',
      'address1','address2','city','state','country','zip','phone','vat_number',
      'number','month','year','verification_value','start_year','start_month','issue_number'
    );
    Recurly_BillingInfo::$_nestedAttributes = array('account');
  }

  public static function get($accountCode, $client = null) {
    return Recurly_Base::_get(Recurly_BillingInfo::uriForBillingInfo($accountCode), $client);
  }

  public function create() {
    $this->update();
  }
  public function update() {
    $this->_save(Recurly_Client::PUT, $this->uri());
  }

  public function delete() {
    return Recurly_Resource::_delete($this->uri());
  }
  public static function deleteForAccount($accountCode) {
    return Recurly_Resource::_delete(Recurly_BillingInfo::uriForBillingInfo($accountCode));
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else if (!empty($this->account_code))
      return Recurly_BillingInfo::uriForBillingInfo($this->account_code);
    else
      throw new Recurly_Error("'account_code' not specified.");
  }
  protected static function uriForBillingInfo($accountCode) {
    return Recurly_Client::PATH_ACCOUNTS . '/' . rawurlencode($accountCode) . Recurly_Client::PATH_BILLING_INFO;
  }

  protected function getNodeName() {
    return 'billing_info';
  }
  protected function getWriteableAttributes() {
    return Recurly_BillingInfo::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_BillingInfo::init();
