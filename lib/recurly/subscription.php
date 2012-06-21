<?php

class Recurly_Subscription extends Recurly_Resource
{
  protected static $_writeableAttributes;
  protected static $_nestedAttributes;

  public static function init()
  {
    Recurly_Subscription::$_writeableAttributes = array(
      'account','plan_code','coupon_code','unit_amount_in_cents','quantity',
      'currency','starts_at','trial_ends_at','total_billing_cycles', 'first_renewal_date',
      'timeframe', 'subscription_add_ons'
    );
    Recurly_Subscription::$_nestedAttributes = array('account', 'subscription_add_ons');
  }

  public function __construct($href = null, $client = null)
  {
    parent::__construct($href, $client);
    $this->subscription_add_ons = array();
  }

  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_Subscription::uriForSubscription($uuid), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_SUBSCRIPTIONS);
  }

  /**
   * Cancel the subscription; it will remain active until it renews.
   */
  public function cancel() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/cancel');
  }
  /**
   * Reactivate a canceled subscription. The subscription will return back to the active,
   * auto renewing state.
   */
  public function reactivate() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/reactivate');
  }

  /**
   * Make an update that takes effect immediately.
   */
  public function updateImmediately() {
    $this->timeframe = 'now';
    $this->_save(Recurly_Client::PUT, $this->uri());
  }

  /**
   * Make an update that applies when the subscription renews.
   */
  public function updateAtRenewal() {
    $this->timeframe = 'renewal';
    $this->_save(Recurly_Client::PUT, $this->uri());
  }


  /**
   * Terminate the subscription immediately and issue a full refund of the last renewal
   */
  public function terminateAndRefund() {
    $this->terminate('full');
  }
  /**
   * Terminate the subscription immediately and issue a prorated/partial refund of the last renewal
   */
  public function terminateAndPartialRefund() {
    $this->terminate('partial');
  }
  /**
   * Terminate the subscription immediately without a refund
   */
  public function terminateWithoutRefund() {
    $this->terminate('none');
  }
  private function terminate($refundType) {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/terminate?refund=' . $refundType);
  }

  public function postpone($nextRenewalDate) {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/postpone?next_renewal_date=' . $nextRenewalDate);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else if (!empty($this->uuid))
      return Recurly_Subscription::uriForSubscription($this->uuid);
    else
      throw new Recurly_Error("Subscription UUID not specified");
  }
  protected static function uriForSubscription($uuid) {
    return Recurly_Client::PATH_SUBSCRIPTIONS . '/' . rawurlencode($uuid);
  }

  protected function getNodeName() {
    return 'subscription';
  }
  protected function getWriteableAttributes() {
    return Recurly_Subscription::$_writeableAttributes;
  }
  protected function getRequiredAttributes() {
    return array();
  }
}

Recurly_Subscription::init();
