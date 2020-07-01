<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly;

class Client extends BaseClient
{
    /**
     * The Recurly openapi spec version that this client library was generated for.
     *
     * @return string The openapi spec version
     */
    protected function apiVersion(): string
    {
        return "v2019-10-10";
    }

  
    /**
     * List sites
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'state' (string): Filter by state.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of sites.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_sites
     */
    public function listSites(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/sites", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch a site
     *
     * @param string $site_id Site ID or subdomain. For ID no prefix is used e.g. `e28zov4fw0v2`. For subdomain use prefix `subdomain-`, e.g. `subdomain-recurly`.
     *
     * @return \Recurly\Resources\Site A site.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_site
     */
    public function getSite(string $site_id): \Recurly\Resources\Site
    {
        $path = $this->interpolatePath("/sites/{site_id}", ['site_id' => $site_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * List a site's accounts
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'email' (string): Filter for accounts with this exact email address. A blank value will return accounts with both `null` and `""` email addresses. Note that multiple accounts can share one email address.
     * 'subscriber' (bool): Filter for accounts with or without a subscription in the `active`,
     *        `canceled`, or `future` state.
     * 'past_due' (string): Filter for accounts with an invoice in the `past_due` state.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's accounts.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_accounts
     */
    public function listAccounts(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create an account
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\Account An account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_account
     */
    public function createAccount(array $body): \Recurly\Resources\Account
    {
        $path = $this->interpolatePath("/accounts", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\Account An account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_account
     */
    public function getAccount(string $account_id): \Recurly\Resources\Account
    {
        $path = $this->interpolatePath("/accounts/{account_id}", ['account_id' => $account_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Modify an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\Account An account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_account
     */
    public function updateAccount(string $account_id, array $body): \Recurly\Resources\Account
    {
        $path = $this->interpolatePath("/accounts/{account_id}", ['account_id' => $account_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Deactivate an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\Account An account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/deactivate_account
     */
    public function deactivateAccount(string $account_id): \Recurly\Resources\Account
    {
        $path = $this->interpolatePath("/accounts/{account_id}", ['account_id' => $account_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Fetch an account's acquisition data
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\AccountAcquisition An account's acquisition data.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_account_acquisition
     */
    public function getAccountAcquisition(string $account_id): \Recurly\Resources\AccountAcquisition
    {
        $path = $this->interpolatePath("/accounts/{account_id}/acquisition", ['account_id' => $account_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an account's acquisition data
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\AccountAcquisition An account's updated acquisition data.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_account_acquisition
     */
    public function updateAccountAcquisition(string $account_id, array $body): \Recurly\Resources\AccountAcquisition
    {
        $path = $this->interpolatePath("/accounts/{account_id}/acquisition", ['account_id' => $account_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Remove an account's acquisition data
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\EmptyResource Acquisition data was succesfully deleted.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_account_acquisition
     */
    public function removeAccountAcquisition(string $account_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/accounts/{account_id}/acquisition", ['account_id' => $account_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Reactivate an inactive account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\Account An account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/reactivate_account
     */
    public function reactivateAccount(string $account_id): \Recurly\Resources\Account
    {
        $path = $this->interpolatePath("/accounts/{account_id}/reactivate", ['account_id' => $account_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Fetch an account's balance and past due status
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\AccountBalance An account's balance.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_account_balance
     */
    public function getAccountBalance(string $account_id): \Recurly\Resources\AccountBalance
    {
        $path = $this->interpolatePath("/accounts/{account_id}/balance", ['account_id' => $account_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Fetch an account's billing information
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\BillingInfo An account's billing information.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_billing_info
     */
    public function getBillingInfo(string $account_id): \Recurly\Resources\BillingInfo
    {
        $path = $this->interpolatePath("/accounts/{account_id}/billing_info", ['account_id' => $account_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Set an account's billing information
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\BillingInfo Updated billing information.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_billing_info
     */
    public function updateBillingInfo(string $account_id, array $body): \Recurly\Resources\BillingInfo
    {
        $path = $this->interpolatePath("/accounts/{account_id}/billing_info", ['account_id' => $account_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Remove an account's billing information
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\EmptyResource Billing information deleted
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_billing_info
     */
    public function removeBillingInfo(string $account_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/accounts/{account_id}/billing_info", ['account_id' => $account_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Show the coupon redemptions for an account
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the the coupon redemptions on an account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_coupon_redemptions
     */
    public function listAccountCouponRedemptions(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/coupon_redemptions", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Show the coupon redemption that is active on an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\CouponRedemption An active coupon redemption on an account.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_active_coupon_redemption
     */
    public function getActiveCouponRedemption(string $account_id): \Recurly\Resources\CouponRedemption
    {
        $path = $this->interpolatePath("/accounts/{account_id}/coupon_redemptions/active", ['account_id' => $account_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Generate an active coupon redemption on an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\CouponRedemption Returns the new coupon redemption.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_coupon_redemption
     */
    public function createCouponRedemption(string $account_id, array $body): \Recurly\Resources\CouponRedemption
    {
        $path = $this->interpolatePath("/accounts/{account_id}/coupon_redemptions/active", ['account_id' => $account_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Delete the active coupon redemption from an account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     *
     * @return \Recurly\Resources\CouponRedemption Coupon redemption deleted.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_coupon_redemption
     */
    public function removeCouponRedemption(string $account_id): \Recurly\Resources\CouponRedemption
    {
        $path = $this->interpolatePath("/accounts/{account_id}/coupon_redemptions/active", ['account_id' => $account_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List an account's credit payments
     *
     * Supported optional parameters:
     *
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the account's credit payments.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_credit_payments
     */
    public function listAccountCreditPayments(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/credit_payments", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List an account's invoices
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'type' (string): Filter by type when:
     *        - `type=charge`, only charge invoices will be returned.
     *        - `type=credit`, only credit invoices will be returned.
     *        - `type=non-legacy`, only charge and credit invoices will be returned.
     *        - `type=legacy`, only legacy invoices will be returned.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the account's invoices.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_invoices
     */
    public function listAccountInvoices(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/invoices", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create an invoice for pending line items
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\InvoiceCollection Returns the new invoices.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_invoice
     */
    public function createInvoice(string $account_id, array $body): \Recurly\Resources\InvoiceCollection
    {
        $path = $this->interpolatePath("/accounts/{account_id}/invoices", ['account_id' => $account_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Preview new invoice for pending line items
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\InvoiceCollection Returns the invoice previews.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/preview_invoice
     */
    public function previewInvoice(string $account_id, array $body): \Recurly\Resources\InvoiceCollection
    {
        $path = $this->interpolatePath("/accounts/{account_id}/invoices/preview", ['account_id' => $account_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * List an account's line items
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'original' (string): Filter by original field.
     * 'state' (string): Filter by state field.
     * 'type' (string): Filter by type field.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the account's line items.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_line_items
     */
    public function listAccountLineItems(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/line_items", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new line item for the account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\LineItem Returns the new line item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_line_item
     */
    public function createLineItem(string $account_id, array $body): \Recurly\Resources\LineItem
    {
        $path = $this->interpolatePath("/accounts/{account_id}/line_items", ['account_id' => $account_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a list of an account's notes
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of an account's notes.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_notes
     */
    public function listAccountNotes(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/notes", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch an account note
     *
     * @param string $account_id      Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param string $account_note_id Account Note ID.
     *
     * @return \Recurly\Resources\AccountNote An account note.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_account_note
     */
    public function getAccountNote(string $account_id, string $account_note_id): \Recurly\Resources\AccountNote
    {
        $path = $this->interpolatePath("/accounts/{account_id}/notes/{account_note_id}", ['account_id' => $account_id, 'account_note_id' => $account_note_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Fetch a list of an account's shipping addresses
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of an account's shipping addresses.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_shipping_addresses
     */
    public function listShippingAddresses(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/shipping_addresses", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new shipping address for the account
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\ShippingAddress Returns the new shipping address.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_shipping_address
     */
    public function createShippingAddress(string $account_id, array $body): \Recurly\Resources\ShippingAddress
    {
        $path = $this->interpolatePath("/accounts/{account_id}/shipping_addresses", ['account_id' => $account_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch an account's shipping address
     *
     * @param string $account_id          Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param string $shipping_address_id Shipping Address ID.
     *
     * @return \Recurly\Resources\ShippingAddress A shipping address.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_shipping_address
     */
    public function getShippingAddress(string $account_id, string $shipping_address_id): \Recurly\Resources\ShippingAddress
    {
        $path = $this->interpolatePath("/accounts/{account_id}/shipping_addresses/{shipping_address_id}", ['account_id' => $account_id, 'shipping_address_id' => $shipping_address_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an account's shipping address
     *
     * @param string $account_id          Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param string $shipping_address_id Shipping Address ID.
     * @param array  $body                The body of the request.
     *
     * @return \Recurly\Resources\ShippingAddress The updated shipping address.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_shipping_address
     */
    public function updateShippingAddress(string $account_id, string $shipping_address_id, array $body): \Recurly\Resources\ShippingAddress
    {
        $path = $this->interpolatePath("/accounts/{account_id}/shipping_addresses/{shipping_address_id}", ['account_id' => $account_id, 'shipping_address_id' => $shipping_address_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Remove an account's shipping address
     *
     * @param string $account_id          Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param string $shipping_address_id Shipping Address ID.
     *
     * @return \Recurly\EmptyResource Shipping address deleted.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_shipping_address
     */
    public function removeShippingAddress(string $account_id, string $shipping_address_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/accounts/{account_id}/shipping_addresses/{shipping_address_id}", ['account_id' => $account_id, 'shipping_address_id' => $shipping_address_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List an account's subscriptions
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *        
     *        - When `state=active`, `state=canceled`, `state=expired`, or `state=future`, subscriptions with states that match the query and only those subscriptions will be returned.
     *        - When `state=in_trial`, only subscriptions that have a trial_started_at date earlier than now and a trial_ends_at date later than now will be returned.
     *        - When `state=live`, only subscriptions that are in an active, canceled, or future state or are in trial will be returned.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the account's subscriptions.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_subscriptions
     */
    public function listAccountSubscriptions(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/subscriptions", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List an account's transactions
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'type' (string): Filter by type field. The value `payment` will return both `purchase` and `capture` transactions.
     * 'success' (string): Filter by success field.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the account's transactions.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_transactions
     */
    public function listAccountTransactions(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/transactions", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List an account's child accounts
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'email' (string): Filter for accounts with this exact email address. A blank value will return accounts with both `null` and `""` email addresses. Note that multiple accounts can share one email address.
     * 'subscriber' (bool): Filter for accounts with or without a subscription in the `active`,
     *        `canceled`, or `future` state.
     * 'past_due' (string): Filter for accounts with an invoice in the `past_due` state.
     *
     * @param string $account_id Account ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-bob`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of an account's child accounts.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_child_accounts
     */
    public function listChildAccounts(string $account_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/accounts/{account_id}/accounts", ['account_id' => $account_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List a site's account acquisition data
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's account acquisition data.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_account_acquisition
     */
    public function listAccountAcquisition(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/acquisitions", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List a site's coupons
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's coupons.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_coupons
     */
    public function listCoupons(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/coupons", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new coupon
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\Coupon A new coupon.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_coupon
     */
    public function createCoupon(array $body): \Recurly\Resources\Coupon
    {
        $path = $this->interpolatePath("/coupons", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a coupon
     *
     * @param string $coupon_id Coupon ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-10off`.
     *
     * @return \Recurly\Resources\Coupon A coupon.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_coupon
     */
    public function getCoupon(string $coupon_id): \Recurly\Resources\Coupon
    {
        $path = $this->interpolatePath("/coupons/{coupon_id}", ['coupon_id' => $coupon_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an active coupon
     *
     * @param string $coupon_id Coupon ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-10off`.
     * @param array  $body      The body of the request.
     *
     * @return \Recurly\Resources\Coupon The updated coupon.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_coupon
     */
    public function updateCoupon(string $coupon_id, array $body): \Recurly\Resources\Coupon
    {
        $path = $this->interpolatePath("/coupons/{coupon_id}", ['coupon_id' => $coupon_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Expire a coupon
     *
     * @param string $coupon_id Coupon ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-10off`.
     *
     * @return \Recurly\Resources\Coupon The expired Coupon
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/deactivate_coupon
     */
    public function deactivateCoupon(string $coupon_id): \Recurly\Resources\Coupon
    {
        $path = $this->interpolatePath("/coupons/{coupon_id}", ['coupon_id' => $coupon_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List unique coupon codes associated with a bulk coupon
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $coupon_id Coupon ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-10off`.
     * @param array  $options   Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of unique coupon codes that were generated
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_unique_coupon_codes
     */
    public function listUniqueCouponCodes(string $coupon_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/coupons/{coupon_id}/unique_coupon_codes", ['coupon_id' => $coupon_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List a site's credit payments
     *
     * Supported optional parameters:
     *
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's credit payments.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_credit_payments
     */
    public function listCreditPayments(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/credit_payments", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch a credit payment
     *
     * @param string $credit_payment_id Credit Payment ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\CreditPayment A credit payment.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_credit_payment
     */
    public function getCreditPayment(string $credit_payment_id): \Recurly\Resources\CreditPayment
    {
        $path = $this->interpolatePath("/credit_payments/{credit_payment_id}", ['credit_payment_id' => $credit_payment_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * List a site's custom field definitions
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'related_type' (string): Filter by related type.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's custom field definitions.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_custom_field_definitions
     */
    public function listCustomFieldDefinitions(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/custom_field_definitions", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch an custom field definition
     *
     * @param string $custom_field_definition_id Custom Field Definition ID
     *
     * @return \Recurly\Resources\CustomFieldDefinition An custom field definition.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_custom_field_definition
     */
    public function getCustomFieldDefinition(string $custom_field_definition_id): \Recurly\Resources\CustomFieldDefinition
    {
        $path = $this->interpolatePath("/custom_field_definitions/{custom_field_definition_id}", ['custom_field_definition_id' => $custom_field_definition_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * List a site's items
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's items.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_items
     */
    public function listItems(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/items", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new item
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\Item A new item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_item
     */
    public function createItem(array $body): \Recurly\Resources\Item
    {
        $path = $this->interpolatePath("/items", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch an item
     *
     * @param string $item_id Item ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-red`.
     *
     * @return \Recurly\Resources\Item An item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_item
     */
    public function getItem(string $item_id): \Recurly\Resources\Item
    {
        $path = $this->interpolatePath("/items/{item_id}", ['item_id' => $item_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an active item
     *
     * @param string $item_id Item ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-red`.
     * @param array  $body    The body of the request.
     *
     * @return \Recurly\Resources\Item The updated item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_item
     */
    public function updateItem(string $item_id, array $body): \Recurly\Resources\Item
    {
        $path = $this->interpolatePath("/items/{item_id}", ['item_id' => $item_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Deactivate an item
     *
     * @param string $item_id Item ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-red`.
     *
     * @return \Recurly\Resources\Item An item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/deactivate_item
     */
    public function deactivateItem(string $item_id): \Recurly\Resources\Item
    {
        $path = $this->interpolatePath("/items/{item_id}", ['item_id' => $item_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Reactivate an inactive item
     *
     * @param string $item_id Item ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-red`.
     *
     * @return \Recurly\Resources\Item An item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/reactivate_item
     */
    public function reactivateItem(string $item_id): \Recurly\Resources\Item
    {
        $path = $this->interpolatePath("/items/{item_id}/reactivate", ['item_id' => $item_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * List a site's invoices
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'type' (string): Filter by type when:
     *        - `type=charge`, only charge invoices will be returned.
     *        - `type=credit`, only credit invoices will be returned.
     *        - `type=non-legacy`, only charge and credit invoices will be returned.
     *        - `type=legacy`, only legacy invoices will be returned.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's invoices.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_invoices
     */
    public function listInvoices(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/invoices", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch an invoice
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\Invoice An invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_invoice
     */
    public function getInvoice(string $invoice_id): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an invoice
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\Invoice An invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/put_invoice
     */
    public function putInvoice(string $invoice_id, array $body): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Fetch an invoice as a PDF
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\BinaryFile An invoice as a PDF.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_invoice_pdf
     */
    public function getInvoicePdf(string $invoice_id): \Recurly\Resources\BinaryFile
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}.pdf", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Collect a pending or past due, automatic invoice
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\Invoice The updated invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/collect_invoice
     */
    public function collectInvoice(string $invoice_id, array $body = []): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/collect", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Mark an open invoice as failed
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\Invoice The updated invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/fail_invoice
     */
    public function failInvoice(string $invoice_id): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/mark_failed", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Mark an open invoice as successful
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\Invoice The updated invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/mark_invoice_successful
     */
    public function markInvoiceSuccessful(string $invoice_id): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/mark_successful", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Reopen a closed, manual invoice
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\Invoice The updated invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/reopen_invoice
     */
    public function reopenInvoice(string $invoice_id): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/reopen", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Void a credit invoice.
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Resources\Invoice The updated invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/void_invoice
     */
    public function voidInvoice(string $invoice_id): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/void", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Record an external payment for a manual invoices.
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\Transaction The recorded transaction.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/record_external_transaction
     */
    public function recordExternalTransaction(string $invoice_id, array $body): \Recurly\Resources\Transaction
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/transactions", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * List an invoice's line items
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'original' (string): Filter by original field.
     * 'state' (string): Filter by state field.
     * 'type' (string): Filter by type field.
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the invoice's line items.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_invoice_line_items
     */
    public function listInvoiceLineItems(string $invoice_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/line_items", ['invoice_id' => $invoice_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Show the coupon redemptions applied to an invoice
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $options    Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the the coupon redemptions associated with the invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_invoice_coupon_redemptions
     */
    public function listInvoiceCouponRedemptions(string $invoice_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/coupon_redemptions", ['invoice_id' => $invoice_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List an invoice's related credit or charge invoices
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     *
     * @return \Recurly\Pager A list of the credit or charge invoices associated with the invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_related_invoices
     */
    public function listRelatedInvoices(string $invoice_id): \Recurly\Pager
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/related_invoices", ['invoice_id' => $invoice_id]);
        return new \Recurly\Pager($this, $path, null);
    }
  
    /**
     * Refund an invoice
     *
     * @param string $invoice_id Invoice ID or number. For ID no prefix is used e.g. `e28zov4fw0v2`. For number use prefix `number-`, e.g. `number-1000`.
     * @param array  $body       The body of the request.
     *
     * @return \Recurly\Resources\Invoice Returns the new credit invoice.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/refund_invoice
     */
    public function refundInvoice(string $invoice_id, array $body): \Recurly\Resources\Invoice
    {
        $path = $this->interpolatePath("/invoices/{invoice_id}/refund", ['invoice_id' => $invoice_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * List a site's line items
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'original' (string): Filter by original field.
     * 'state' (string): Filter by state field.
     * 'type' (string): Filter by type field.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's line items.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_line_items
     */
    public function listLineItems(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/line_items", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch a line item
     *
     * @param string $line_item_id Line Item ID.
     *
     * @return \Recurly\Resources\LineItem A line item.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_line_item
     */
    public function getLineItem(string $line_item_id): \Recurly\Resources\LineItem
    {
        $path = $this->interpolatePath("/line_items/{line_item_id}", ['line_item_id' => $line_item_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Delete an uninvoiced line item
     *
     * @param string $line_item_id Line Item ID.
     *
     * @return \Recurly\EmptyResource Line item deleted.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_line_item
     */
    public function removeLineItem(string $line_item_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/line_items/{line_item_id}", ['line_item_id' => $line_item_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List a site's plans
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of plans.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_plans
     */
    public function listPlans(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/plans", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a plan
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\Plan A plan.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_plan
     */
    public function createPlan(array $body): \Recurly\Resources\Plan
    {
        $path = $this->interpolatePath("/plans", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a plan
     *
     * @param string $plan_id Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     *
     * @return \Recurly\Resources\Plan A plan.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_plan
     */
    public function getPlan(string $plan_id): \Recurly\Resources\Plan
    {
        $path = $this->interpolatePath("/plans/{plan_id}", ['plan_id' => $plan_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update a plan
     *
     * @param string $plan_id Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param array  $body    The body of the request.
     *
     * @return \Recurly\Resources\Plan A plan.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_plan
     */
    public function updatePlan(string $plan_id, array $body): \Recurly\Resources\Plan
    {
        $path = $this->interpolatePath("/plans/{plan_id}", ['plan_id' => $plan_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Remove a plan
     *
     * @param string $plan_id Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     *
     * @return \Recurly\Resources\Plan Plan deleted
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_plan
     */
    public function removePlan(string $plan_id): \Recurly\Resources\Plan
    {
        $path = $this->interpolatePath("/plans/{plan_id}", ['plan_id' => $plan_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List a plan's add-ons
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *
     * @param string $plan_id Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param array  $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of add-ons.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_plan_add_ons
     */
    public function listPlanAddOns(string $plan_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/plans/{plan_id}/add_ons", ['plan_id' => $plan_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create an add-on
     *
     * @param string $plan_id Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param array  $body    The body of the request.
     *
     * @return \Recurly\Resources\AddOn An add-on.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_plan_add_on
     */
    public function createPlanAddOn(string $plan_id, array $body): \Recurly\Resources\AddOn
    {
        $path = $this->interpolatePath("/plans/{plan_id}/add_ons", ['plan_id' => $plan_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a plan's add-on
     *
     * @param string $plan_id   Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param string $add_on_id Add-on ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     *
     * @return \Recurly\Resources\AddOn An add-on.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_plan_add_on
     */
    public function getPlanAddOn(string $plan_id, string $add_on_id): \Recurly\Resources\AddOn
    {
        $path = $this->interpolatePath("/plans/{plan_id}/add_ons/{add_on_id}", ['plan_id' => $plan_id, 'add_on_id' => $add_on_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an add-on
     *
     * @param string $plan_id   Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param string $add_on_id Add-on ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param array  $body      The body of the request.
     *
     * @return \Recurly\Resources\AddOn An add-on.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_plan_add_on
     */
    public function updatePlanAddOn(string $plan_id, string $add_on_id, array $body): \Recurly\Resources\AddOn
    {
        $path = $this->interpolatePath("/plans/{plan_id}/add_ons/{add_on_id}", ['plan_id' => $plan_id, 'add_on_id' => $add_on_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Remove an add-on
     *
     * @param string $plan_id   Plan ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     * @param string $add_on_id Add-on ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     *
     * @return \Recurly\Resources\AddOn Add-on deleted
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_plan_add_on
     */
    public function removePlanAddOn(string $plan_id, string $add_on_id): \Recurly\Resources\AddOn
    {
        $path = $this->interpolatePath("/plans/{plan_id}/add_ons/{add_on_id}", ['plan_id' => $plan_id, 'add_on_id' => $add_on_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List a site's add-ons
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of add-ons.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_add_ons
     */
    public function listAddOns(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/add_ons", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch an add-on
     *
     * @param string $add_on_id Add-on ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-gold`.
     *
     * @return \Recurly\Resources\AddOn An add-on.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_add_on
     */
    public function getAddOn(string $add_on_id): \Recurly\Resources\AddOn
    {
        $path = $this->interpolatePath("/add_ons/{add_on_id}", ['add_on_id' => $add_on_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * List a site's shipping methods
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's shipping methods.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_shipping_methods
     */
    public function listShippingMethods(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/shipping_methods", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new shipping method
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\ShippingMethod A new shipping method.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_shipping_method
     */
    public function createShippingMethod(array $body): \Recurly\Resources\ShippingMethod
    {
        $path = $this->interpolatePath("/shipping_methods", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a shipping method
     *
     * @param string $id Shipping Method ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-usps_2-day`.
     *
     * @return \Recurly\Resources\ShippingMethod A shipping method.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_shipping_method
     */
    public function getShippingMethod(string $id): \Recurly\Resources\ShippingMethod
    {
        $path = $this->interpolatePath("/shipping_methods/{id}", ['id' => $id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Update an active Shipping Method
     *
     * @param string $shipping_method_id Shipping Method ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-usps_2-day`.
     * @param array  $body               The body of the request.
     *
     * @return \Recurly\Resources\ShippingMethod The updated shipping method.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/update_shipping_method
     */
    public function updateShippingMethod(string $shipping_method_id, array $body): \Recurly\Resources\ShippingMethod
    {
        $path = $this->interpolatePath("/shipping_methods/{shipping_method_id}", ['shipping_method_id' => $shipping_method_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Deactivate a shipping method
     *
     * @param string $shipping_method_id Shipping Method ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-usps_2-day`.
     *
     * @return \Recurly\Resources\ShippingMethod A shipping method.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/deactivate_shipping_method
     */
    public function deactivateShippingMethod(string $shipping_method_id): \Recurly\Resources\ShippingMethod
    {
        $path = $this->interpolatePath("/shipping_methods/{shipping_method_id}", ['shipping_method_id' => $shipping_method_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * List a site's subscriptions
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'state' (string): Filter by state.
     *        
     *        - When `state=active`, `state=canceled`, `state=expired`, or `state=future`, subscriptions with states that match the query and only those subscriptions will be returned.
     *        - When `state=in_trial`, only subscriptions that have a trial_started_at date earlier than now and a trial_ends_at date later than now will be returned.
     *        - When `state=live`, only subscriptions that are in an active, canceled, or future state or are in trial will be returned.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's subscriptions.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_subscriptions
     */
    public function listSubscriptions(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/subscriptions", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Create a new subscription
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_subscription
     */
    public function createSubscription(array $body): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Fetch a subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_subscription
     */
    public function getSubscription(string $subscription_id): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Modify a subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $body            The body of the request.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/modify_subscription
     */
    public function modifySubscription(string $subscription_id, array $body): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Terminate a subscription
     *
     * Supported optional parameters:
     *
     * 'refund' (string): The type of refund to perform:
     *        
     *        * `full` - Performs a full refund of the last invoice for the current subscription term.
     *        * `partial` - Prorates a refund based on the amount of time remaining in the current bill cycle.
     *        * `none` - Terminates the subscription without a refund.
     *        
     *        In the event that the most recent invoice is a $0 invoice paid entirely by credit, Recurly will apply the credit back to the customer’s account.
     *        
     *        You may also terminate a subscription with no refund and then manually refund specific invoices.
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $options         Associative array of optional parameters:
     *
     * @return \Recurly\Resources\Subscription An expired subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/terminate_subscription
     */
    public function terminateSubscription(string $subscription_id, array $options = []): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('DELETE', $path, null, $options);
    }
  
    /**
     * Cancel a subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $body            The body of the request.
     *
     * @return \Recurly\Resources\Subscription A canceled or failed subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/cancel_subscription
     */
    public function cancelSubscription(string $subscription_id, array $body = []): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/cancel", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Reactivate a canceled subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\Subscription An active subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/reactivate_subscription
     */
    public function reactivateSubscription(string $subscription_id): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/reactivate", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Pause subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $body            The body of the request.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/pause_subscription
     */
    public function pauseSubscription(string $subscription_id, array $body): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/pause", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, $body, null);
    }
  
    /**
     * Resume subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/resume_subscription
     */
    public function resumeSubscription(string $subscription_id): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/resume", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Convert trial subscription
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\Subscription A subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/convert_trial
     */
    public function convertTrial(string $subscription_id): \Recurly\Resources\Subscription
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/convert_trial", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Fetch a subscription's pending change
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\SubscriptionChange A subscription's pending change.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_subscription_change
     */
    public function getSubscriptionChange(string $subscription_id): \Recurly\Resources\SubscriptionChange
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/change", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Create a new subscription change
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $body            The body of the request.
     *
     * @return \Recurly\Resources\SubscriptionChange A subscription change.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_subscription_change
     */
    public function createSubscriptionChange(string $subscription_id, array $body): \Recurly\Resources\SubscriptionChange
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/change", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Delete the pending subscription change
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\EmptyResource Subscription change was deleted.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/remove_subscription_change
     */
    public function removeSubscriptionChange(string $subscription_id): \Recurly\EmptyResource
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/change", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Preview a new subscription change
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $body            The body of the request.
     *
     * @return \Recurly\Resources\SubscriptionChangePreview A subscription change.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/preview_subscription_change
     */
    public function previewSubscriptionChange(string $subscription_id, array $body): \Recurly\Resources\SubscriptionChangePreview
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/change/preview", ['subscription_id' => $subscription_id]);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * List a subscription's invoices
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'type' (string): Filter by type when:
     *        - `type=charge`, only charge invoices will be returned.
     *        - `type=credit`, only credit invoices will be returned.
     *        - `type=non-legacy`, only charge and credit invoices will be returned.
     *        - `type=legacy`, only legacy invoices will be returned.
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $options         Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the subscription's invoices.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_subscription_invoices
     */
    public function listSubscriptionInvoices(string $subscription_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/invoices", ['subscription_id' => $subscription_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List a subscription's line items
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'original' (string): Filter by original field.
     * 'state' (string): Filter by state field.
     * 'type' (string): Filter by type field.
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $options         Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the subscription's line items.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_subscription_line_items
     */
    public function listSubscriptionLineItems(string $subscription_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/line_items", ['subscription_id' => $subscription_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Show the coupon redemptions for a subscription
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     *
     * @param string $subscription_id Subscription ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     * @param array  $options         Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the the coupon redemptions on a subscription.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_subscription_coupon_redemptions
     */
    public function listSubscriptionCouponRedemptions(string $subscription_id, array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/subscriptions/{subscription_id}/coupon_redemptions", ['subscription_id' => $subscription_id]);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * List a site's transactions
     *
     * Supported optional parameters:
     *
     * 'ids' (array): Filter results by their IDs. Up to 200 IDs can be passed at once using
     *        commas as separators, e.g. `ids=h1at4d57xlmy,gyqgg0d3v9n1,jrsm5b4yefg6`.
     *        
     *        **Important notes:**
     *        
     *        * The `ids` parameter cannot be used with any other ordering or filtering
     *          parameters (`limit`, `order`, `sort`, `begin_time`, `end_time`, etc)
     *        * Invalid or unknown IDs will be ignored, so you should check that the
     *          results correspond to your request.
     *        * Records are returned in an arbitrary order. Since results are all
     *          returned at once you can sort the records yourself.
     * 'limit' (int): Limit number of records 1-200.
     * 'order' (string): Sort order.
     * 'sort' (string): Sort field. You *really* only want to sort by `updated_at` in ascending
     *        order. In descending order updated records will move behind the cursor and could
     *        prevent some records from being returned.
     * 'begin_time' (string): Filter by begin_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'end_time' (string): Filter by end_time when `sort=created_at` or `sort=updated_at`.
     *        **Note:** this value is an ISO8601 timestamp. A partial timestamp that does not include a time zone will default to UTC.
     * 'type' (string): Filter by type field. The value `payment` will return both `purchase` and `capture` transactions.
     * 'success' (string): Filter by success field.
     *
     * @param array $options Associative array of optional parameters:
     *
     * @return \Recurly\Pager A list of the site's transactions.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/list_transactions
     */
    public function listTransactions(array $options = []): \Recurly\Pager
    {
        $path = $this->interpolatePath("/transactions", []);
        return new \Recurly\Pager($this, $path, $options);
    }
  
    /**
     * Fetch a transaction
     *
     * @param string $transaction_id Transaction ID or UUID. For ID no prefix is used e.g. `e28zov4fw0v2`. For UUID use prefix `uuid-`, e.g. `uuid-123457890`.
     *
     * @return \Recurly\Resources\Transaction A transaction.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_transaction
     */
    public function getTransaction(string $transaction_id): \Recurly\Resources\Transaction
    {
        $path = $this->interpolatePath("/transactions/{transaction_id}", ['transaction_id' => $transaction_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Fetch a unique coupon code
     *
     * @param string $unique_coupon_code_id Unique Coupon Code ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-abc-8dh2-def`.
     *
     * @return \Recurly\Resources\UniqueCouponCode A unique coupon code.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/get_unique_coupon_code
     */
    public function getUniqueCouponCode(string $unique_coupon_code_id): \Recurly\Resources\UniqueCouponCode
    {
        $path = $this->interpolatePath("/unique_coupon_codes/{unique_coupon_code_id}", ['unique_coupon_code_id' => $unique_coupon_code_id]);
        return $this->makeRequest('GET', $path, null, null);
    }
  
    /**
     * Deactivate a unique coupon code
     *
     * @param string $unique_coupon_code_id Unique Coupon Code ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-abc-8dh2-def`.
     *
     * @return \Recurly\Resources\UniqueCouponCode A unique coupon code.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/deactivate_unique_coupon_code
     */
    public function deactivateUniqueCouponCode(string $unique_coupon_code_id): \Recurly\Resources\UniqueCouponCode
    {
        $path = $this->interpolatePath("/unique_coupon_codes/{unique_coupon_code_id}", ['unique_coupon_code_id' => $unique_coupon_code_id]);
        return $this->makeRequest('DELETE', $path, null, null);
    }
  
    /**
     * Restore a unique coupon code
     *
     * @param string $unique_coupon_code_id Unique Coupon Code ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For code use prefix `code-`, e.g. `code-abc-8dh2-def`.
     *
     * @return \Recurly\Resources\UniqueCouponCode A unique coupon code.
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/reactivate_unique_coupon_code
     */
    public function reactivateUniqueCouponCode(string $unique_coupon_code_id): \Recurly\Resources\UniqueCouponCode
    {
        $path = $this->interpolatePath("/unique_coupon_codes/{unique_coupon_code_id}/restore", ['unique_coupon_code_id' => $unique_coupon_code_id]);
        return $this->makeRequest('PUT', $path, null, null);
    }
  
    /**
     * Create a new purchase
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\InvoiceCollection Returns the new invoices
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/create_purchase
     */
    public function createPurchase(array $body): \Recurly\Resources\InvoiceCollection
    {
        $path = $this->interpolatePath("/purchases", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
    /**
     * Preview a new purchase
     *
     * @param array $body The body of the request.
     *
     * @return \Recurly\Resources\InvoiceCollection Returns preview of the new invoices
     * @link   https://developers.recurly.com/api/v2019-10-10#operation/preview_purchase
     */
    public function previewPurchase(array $body): \Recurly\Resources\InvoiceCollection
    {
        $path = $this->interpolatePath("/purchases/preview", []);
        return $this->makeRequest('POST', $path, $body, null);
    }
  
}