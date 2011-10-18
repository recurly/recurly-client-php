<?php

class Recurly_js
{
  /**
   * Recurly.js Private Key
   */
  public static $privateKey;
  
  private $data;

  const BILLING_INFO_UPDATE =  'billinginfoupdate';
  const BILLING_INFO_UPDATED = 'billinginfoupdated';
  const SUBSCRIPTION_CREATE =  'subscriptioncreate';
  const SUBSCRIPTION_CREATED = 'subscriptioncreated';
  const TRANSACTION_CREATE =   'transactioncreate';
  const TRANSACTION_CREATED =  'transactioncreated';
  

  function __construct($data)
  {
    $this->data = $data;
  }

  public function verifySubscription()
  {
    if (!isset($this->data['signature'], $this->data['account_code'], $this->data['plan_code'], $this->data['quantity']))
      throw new InvalidArgumentException("Signature, account_code, plan_code, and/or quantity not present.");

    $verify_data = array(
      'account_code' => $this->data['account_code'],
      'plan_code' => $this->data['plan_code'],
      'quantity' => $this->data['quantity']
    );

    if (isset($this->data['coupon_code']))
      $verify_data['coupon_code'] = $this->data['coupon_code'];

    if (isset($this->data['add_ons']) && is_array($this->data['add_ons'])) {
      $add_ons = array();
      foreach ($this->data['add_ons'] as $add_on) {
        $add_ons[] = array('add_on_code' => $add_on['add_on_code'], 'quantity' => $add_on['quantity']);
      }
      $verify_data['add_ons'] = $add_ons;
    }

    return $this->_verifyResults(self::SUBSCRIPTION_CREATED, $this->data['signature'], $verify_data);
  }

  public function verifyTransaction()
  {
    if (!isset($this->data['signature'], $this->data['account_code'], $this->data['amount_in_cents'], $this->data['currency'], $this->data['uuid']))
      throw new InvalidArgumentException("Signature, account_code, amount_in_cents, currency, and/or uuid not present.");

    return $this->_verifyResults(self::TRANSACTION_CREATED, $this->data['signature'],
      array(
        'account_code' => $this->data['account_code'],
        'amount_in_cents' => $this->data['amount_in_cents'],
        'currency' => $this->data['currency'],
        'uuid' => $this->data['uuid']
      ));
  }

  public function verifyBillingInfoUpdated()
  {
    if (!isset($this->data['signature'], $this->data['account_code']))
      throw new InvalidArgumentException("Signature and account_code not present.");

    return $this->_verifyResults(self::BILLING_INFO_UPDATED, $this->data['signature'], array('account_code' => $this->data['account_code']));
  }

  // Create a signature for a one-time transaction for the given $accountCode
  public static function signTransaction($amountInCents, $currency, $accountCode = null)
  {
    if (empty($currency) || strlen($currency) != 3)
      throw new InvalidArgumentException("Invalid currency");
    if (intval($amountInCents) <= 0)
      throw new InvalidArgumentException("Invalid amount in cents");

    return self::_generateSignature(self::TRANSACTION_CREATE, array(
      'account_code' => $accountCode,
      'amount_in_cents' => $amountInCents,
      'currency' => $currency
    ));
  }

  // Create a signature for updating billing information for the given $accountCode
  public static function signBillingInfoUpdate($accountCode)
  {
    if (empty($accountCode))
      throw new InvalidArgumentException("Account code is required");

    return self::_generateSignature(self::BILLING_INFO_UPDATE, array('account_code' => $accountCode));
  }
  
  // In its own function so it can be stubbed for testing
  function time_difference($timestamp)
  {
    return (time() - $timestamp);
  }

  # Validate the parameters are authentic
  private function _verifyResults($claim, $signature, $values)
  {
    $pos = strpos($signature, '-');
    if (!$pos)
      throw new Recurly_ForgedQueryStringError("Invalid signature");
    $hmac = substr($signature, 0, $pos);
    $timestamp = intval(substr($signature, $pos + 1));
    $time_diff = $this->time_difference($timestamp);

    if ($time_diff > 3600 || $time_diff < -3600)
      throw new Recurly_ForgedQueryStringError("Timestamp is too new or too old.");

    $expected_signature = self::_generateSignature($claim, $values, $timestamp);

    if ($signature != $expected_signature)
      throw new Recurly_ForgedQueryStringError("Signature is not authentic.");
  }

  # Create a signature using the private key
  protected static function _generateSignature($claim, $values, $timestamp = null)
  {
    if (is_null($timestamp)) { $timestamp = time(); }
    ksort($values);
    $flat_args = array();
    foreach($values as $key => $val) {
      if (!is_null($val)) {
        if (is_array($val)) {
          $inner_args = array();
          foreach($val as $val_item) {
            $inner_array = array();
            ksort($val_item);
            foreach ($val_item as $inner_key => $inner_val) {
              if (!empty($inner_val))
              $inner_array[] = $inner_key . ':' . preg_replace('/([\[\],:\\\\])/', '\${1}', $inner_val);
            }
            $inner_args[] = '[' . implode($inner_array, ',') . ']';
          }
          $flat_args[] = $key . ':[' . implode($inner_args, ',') . ']';
        }
        elseif (!empty($val)) {
          $flat_args[] = $key . ':' . preg_replace('/([\[\],:\\\\])/', '\${1}', $val);
        }
      }
    }
    $message = "[$timestamp,$claim,[" . implode($flat_args, ',') . ']]';
    return Recurly_HmacHash::hash(self::$privateKey, $message) . '-' . strval($timestamp);
  }
}
