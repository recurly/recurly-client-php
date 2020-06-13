<?php

class Recurly_CouponRedemptionList extends Recurly_Pager
{
  public static function getForAccount($accountCode, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode, Recurly_Client::PATH_COUPON_REDEMPTIONS), $params);
    return new self($uri, $client);
  }

  public static function getForInvoice($invoiceNumber, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_INVOICES, $invoiceNumber, Recurly_Client::PATH_COUPON_REDEMPTIONS), $params);
    return new self($uri, $client);
  }

  public static function getForSubscription($subscriptionUuid, $params = null, $client = null) {
    $uri = self::_uriWithParams(self::_safeUri(Recurly_Client::PATH_SUBSCRIPTIONS, $subscriptionUuid, Recurly_Client::PATH_COUPON_REDEMPTIONS), $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'redemptions';
  }
}
