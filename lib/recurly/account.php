<?php

/**
 * Class Recurly_Account
 * @property Recurly_Stub $adjustments The URL of adjustments for the specified account.
 * @property Recurly_Stub $account_balance The URL of the account balance for the specified account.
 * @property Recurly_Stub $billing_info The URL of billing info for the specified account.
 * @property Recurly_Stub $invoices The URL of invoices for the specified account.
 * @property Recurly_Stub $redemption The URL of the coupon redemption for the specified account.
 * @property Recurly_Stub $subscriptions The URL of subscriptions for the specified account.
 * @property Recurly_Stub $transactions The URL of transactions for the specified account.
 * @property Recurly_Stub $invoice_template The URL of the invoice template for the specified account.
 * @property Recurly_Stub $entitlements The URL of the entitlements for the specified account.
 * @property Recurly_Stub $external_subscriptions The URL of the external_subscriptions for the specified account.
 * @property Recurly_Stub $external_invoices The URL of the external_invoices for the specified account.
 * @property Recurly_Stub $external_accounts The URL of the external_accounts for the specified account.
 * @property string $account_code The unique identifier of the account.
 * @property string $state The state of accounts to return: active or closed.
 * @property string $username The username of the account.
 * @property string $email The email address of the account.
 * @property string $cc_emails Additional email address that should receive account correspondence. These should be separated only by commas. These CC emails will receive all emails that the email field also receives.
 * @property string $first_name The first name of the account.
 * @property string $last_name The last name of the account.
 * @property string $company_name The company name of the account.
 * @property string $vat_number The VAT number of the account (to avoid having the VAT applied).
 * @property boolean $tax_exempt The tax status of the account. true exempts tax on the account, false applies tax on the account.
 * @property string $exemption_certificate Optional field for merchants taxing through Vertex. A string representing the exemption certificate. 1-30 characters in length.
 * @property Recurly_Address $address The nested address information of the account: address1, address2, city, state, zip, country, phone.
 * @property string $accept_language The ISO 639-1 language code from the user's browser, indicating their preferred language and locale.
 * @property string $hosted_login_token The unique token for automatically logging the account in to the hosted management pages. You may automatically log the user into their hosted management pages by directing the user to: https://:subdomain.recurly.com/account/:hosted_login_token.
 * @property string $preferred_locale The locale for the emails
 * @property string $preferred_time_zone The IANA time zone name to use for the emails
 * @property string $has_live_subscription True if the account has at least one live subscription.
 * @property string $has_active_subscription True if the account has at least one active subscription.
 * @property string $has_future_subscription True if the account has at least one future subscription.
 * @property string $has_canceled_subscription True if the account has at least one canceled subscription.
 * @property string $has_paused_subscription True if the account has at least one paised subscription.
 * @property string $has_past_due_invoice True if the account has at least one past due invoice.
 * @property DateTime $created_at The date and time the account was created in Recurly.
 * @property DateTime $updated_at The date and time the account or its billing info was last updated.
 * @property DateTime $closed_at For closed accounts, the date and time it was closed.
 * @property Recurly_AccountAcquisition $account_acquisition The nested account acquisition information: cost_in_cents, currency, channel, subchannel, campaign.
 * @property string $transaction_type Indicates type of resulting transaction. accepted_values: "moto".
 * @property string $dunning_campaign_id Unique ID to identify the dunning campaign used when dunning the invoice.
 */
class Recurly_Account extends Recurly_Resource
{
  function __construct($accountCode = null, $client = null) {
    parent::__construct(null, $client);
    if (!is_null($accountCode))
      $this->account_code = $accountCode;
    # setting address this way to prevent it from ending up in "unsavedKeys"
    $this->_values["address"] = new Recurly_Address();
    $this->custom_fields = new Recurly_CustomFieldList();
  }

  public function &__get($key)
  {
    if ($key == 'redemption' && parent::__isset('redemptions')) {
      $value = new Recurly_Stub('redemption', $this->_href . "/redemption", $this->_client);
      return $value;
    } else {
      return parent::__get($key);
    }
  }

  public static function get($accountCode, $client = null) {
    return Recurly_Base::_get(Recurly_Account::uriForAccount($accountCode), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_ACCOUNTS);
  }
  public function update() {
    # Manually clear the `parent_account` because the attribute name is `parent_account_code`
    $this->parent_account = null;
    $this->_save(Recurly_Client::PUT, $this->uri());
  }

  public function close() {
    Recurly_Base::_delete($this->uri(), $this->_client);
    $this->state = 'closed';
  }
  public static function closeAccount($accountCode, $client = null) {
    return Recurly_Base::_delete(Recurly_Account::uriForAccount($accountCode), $client);
  }

  public function reopen() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/reopen');
  }
  public static function reopenAccount($accountCode, $client = null) {
    return Recurly_Base::_put(Recurly_Account::uriForAccount($accountCode) . '/reopen', $client);
  }

  public function createShippingAddress($shippingAddress, $client = null) {
    if ($client) {
      $shippingAddress->_client = $client;
    }
    $shippingAddress->_save(Recurly_Client::POST, $this->uri() . '/shipping_addresses');
  }

  public function createBillingInfo($billingInfo, $client = null) {
    if ($client) {
      $billingInfo -> _client = $client;
    }
    $billingInfo -> _save(Recurly_Client::POST, $this->uri() . '/billing_infos');
  }

  public function updateBillingInfo($billingInfo, $client = null) {
    if ($client) {
      $billingInfo -> _client = $client;
    }
    $billingInfo -> _save(Recurly_Client::PUT, $this->uri() . '/billing_infos/' . $billingInfo->uuid);
  }

  public function getBillingInfos($client = null) {
    return Recurly_Base::_get($this->uriForBillingInfos(), $client);
  }

  public function getBillingInfo($billingInfoUuid, $client = null) {
    return Recurly_Base::_get($this->uriForBillingInfos() . '/' . $billingInfoUuid, $client);
  }

  public function deleteBillingInfo($billingInfoUuid, $client = null) {
    return Recurly_Base::_delete($this->uriForBillingInfos() . '/' . $billingInfoUuid, $client);
  }

  public function getExternalAccounts($client = null) {
    return Recurly_Base::_get($this->uriForExternalAccounts(), $client);
  }

  public function getExternalAccount($externalAccountUuid, $client = null) {
    return Recurly_Base::_get($this->uriForExternalAccounts() . '/' . $externalAccountUuid, $client);
  }

  public function createExternalAccount($externalAccount, $client = null) {
    if ($client) {
      $externalAccount -> _client = $client;
    }
    $externalAccount -> _save(Recurly_Client::POST, $this->uri() . '/external_accounts');
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_Account::uriForAccount($this->account_code);
  }
  protected static function uriForAccount($accountCode) {
    return self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $accountCode);
  }

  protected function uriForBillingInfos() {
    return Recurly_Account::uriForAccount($this->account_code) . '/' . Recurly_Client::PATH_BILLING_INFOS;
  }

  protected function uriForExternalAccounts() {
    return Recurly_Account::uriForAccount($this->account_code) . '/' . Recurly_Client::PATH_EXTERNAL_ACCOUNTS;
  }

  protected function getNodeName() {
    return 'account';
  }
  protected function getWriteableAttributes() {
    return array(
      'account_code', 'username', 'first_name', 'last_name', 'vat_number',
      'email', 'company_name', 'accept_language', 'billing_info', 'address',
      'tax_exempt', 'entity_use_code', 'cc_emails', 'shipping_addresses',
      'preferred_locale', 'preferred_time_zone', 'custom_fields', 'account_acquisition', 'exemption_certificate',
      'parent_account_code', 'transaction_type', 'dunning_campaign_id', 'invoice_template_uuid',
      'external_accounts',
    );
  }
  protected function getRequiredAttributes() {
    return array(
      'account_code'
    );
  }
}
