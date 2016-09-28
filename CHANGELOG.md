# Recurly PHP Client Library CHANGELOG

## Unreleased

* Added property documentation to several classes (thanks to [phpdave](https://github.com/phpdave)) [#278](https://github.com/recurly/recurly-client-php/pull/278)
* Added company attribute to billing info [#280](https://github.com/recurly/recurly-client-php/pull/280)

## Version 2.7.0 (September 15th, 2016)

* Upgraded to API V2.4: https://dev.recurly.com/v2.4/docs
* Fix for client not being passed from `Recurly_Pager` to its items (thanks to [cyruscollier](https://github.com/cyruscollier)) [#265](https://github.com/recurly/recurly-client-php/pull/265)
* Adding missing require for `account_balance` [#273](https://github.com/recurly/recurly-client-php/pull/273)
* Allow credit adjustments (`Recurly_Adjustment`) to specify an `origin` of `external_gift_card` [#263](https://github.com/recurly/recurly-client-php/pull/263)
* Added `Recurly_AccountAcquisition` [#259](https://github.com/recurly/recurly-client-php/pull/259)
* Added support for automated exports [#260](https://github.com/recurly/recurly-client-php/pull/260)
* Added support for shipping addresses [#269](https://github.com/recurly/recurly-client-php/pull/269)
* Added filters to `Recurly_Stub` allowing `$account->invoices->get(array('state' => 'past_due'))` (thanks to [developer-devPHP](https://github.com/developer-devPHP)) [#270](https://github.com/recurly/recurly-client-php/pull/270)

## Version 2.6.0 (August 9th, 2016)

* Upgraded to API V2.3: https://dev.recurly.com/v2.3/docs
* Added support for `original_transaction` to `Recurly_Transaction` [#238](https://github.com/recurly/recurly-client-php/pull/238)
* Added `Recurly_AccountBalance` [#239](https://github.com/recurly/recurly-client-php/pull/239)
* Print warnings when using a deprecated version of the API. [#250](https://github.com/recurly/recurly-client-php/pull/250):
* Added support new pagination options [#249](https://github.com/recurly/recurly-client-php/pull/249):
  - `sort` accepts `created_at` or `updated_at`, defaults to `created_at`.
  - `order` accepts `desc` or `asc`, defaults to `desc`.
  - `begin_time` and `end_time` accepts an ISO 8601 date or date and time.
* Changed `Recurly_AddonList::get()` and `Recurly_NoteList::get()` to add `$params` as the second parameter so sort, order and date filtering can be passed in [#249](https://github.com/recurly/recurly-client-php/pull/249)
* Added support for `revenue_schedule_type` to `Recurly_Addon`, `Recurly_Adjustment`, `Recurly_Plan`, `Recurly_Subscription` and `Recurly_SubscriptionAddOn` classes [#257](https://github.com/recurly/recurly-client-php/pull/257)

## Version 2.5.3 (July 5th, 2016)

* Added support for setting `free_trial_amount` and `free_trial_unit` to `Recurly_Coupon` [#224](https://github.com/recurly/recurly-client-php/pull/224)
* Fix PHP 7 notice (thanks to [davedevelopment](https://github.com/davedevelopment)) [#235](https://github.com/recurly/recurly-client-php/pull/235)
* Fix for fetching `Recurly_NoteList` [#236](https://github.com/recurly/recurly-client-php/pull/236)
* Fix for updating subscriptions with add-ons [#242](https://github.com/recurly/recurly-client-php/pull/242)
* Fix for paginating `Recurly_CouponRedemptionList` and `Recurly_UniqueCouponCodeList` [#243](https://github.com/recurly/recurly-client-php/pull/243)
* Use standard PHPUnit configuration file name (thanks to [davedevelopment](https://github.com/davedevelopment)) [#234](https://github.com/recurly/recurly-client-php/pull/234)
* Removed old transparent post path constants [#237](https://github.com/recurly/recurly-client-php/pull/237)
* Provide default implementation for `getRequiredAttributes()` [#241](https://github.com/recurly/recurly-client-php/pull/241)

## Version 2.5.2 (June 7th, 2016)

* Added support for parsing `fraud` attribute on the `Transaction` class [#228](https://github.com/recurly/recurly-client-php/pull/228)
* Added support for setting `start_date` and `end_date` when creating an `Adjustment` (thanks to [imsagar](https://github.com/imsagar)) [#229](https://github.com/recurly/recurly-client-php/pull/229)
* Added support for Usage Based Billing [#227](https://github.com/recurly/recurly-client-php/pull/227)

## Version 2.5.1 (February 19th, 2016)

* Added support for `cc_emails` attribute on the `Account` class [#202](https://github.com/recurly/recurly-client-php/pull/202)
* Fix bug with incorrect `delete_uri` on the `Redemption` class [#201](https://github.com/recurly/recurly-client-php/pull/201)
* Added `currency` attribute to `BillingInfo` [#205](https://github.com/recurly/recurly-client-php/pull/205)

## Version 2.5.0 (January 13th, 2016)

* Removed `nestedAttributes` [#191](https://github.com/recurly/recurly-client-php/pull/191)
* Added support for coupon `update` and `restore` actions [#186](https://github.com/recurly/recurly-client-php/pull/186)
* Added support bulk coupons and generation [#188](https://github.com/recurly/recurly-client-php/pull/188)

## Version 2.4.6 (September 15th, 2015)

* Added `setup_fee_accounting_code` to `Plan` [#179](https://github.com/recurly/recurly-client-php/pull/179)
* Added `applies_to_non_plan_charges` to `Coupon` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `redemption_resource` to `Coupon` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `X-Api-Version` request header at 2.1 [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `uuid` to `Account` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `redemptions` to `Account` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `max_redemptions_per_account` to `Coupon` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `redemptions` to `Subscription` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `coupon_codes` to `Subscription` [#181](https://github.com/recurly/recurly-client-php/pull/181)
* Added `CACertPath` to `Recurly_Client` [#176](https://github.com/recurly/recurly-client-php/pull/176)

## Version 2.4.5 (August 3, 2015)

* Added `duration`, `temporal_unit`, & `temporal_amount` to `Coupon` [#171](https://github.com/recurly/recurly-client-php/pull/171)

## Version 2.4.4 (July 2nd, 2015)

* Added `gateway_error_code` to `Recurly_Transaction` [#163](https://github.com/recurly/recurly-client-php/pull/163)
* Add support for `refund_apply_order` when performing an open amount or line item refund [#161](https://github.com/recurly/recurly-client-php/pull/161)]
* Add `tax_exempt`, `tax_code` to `Recurly_Transaction` [#166](https://github.com/recurly/recurly-client-php/pull/166)
* Add `Recurly_CouponRedemptionList` (thanks to [Flambe](https://github.com/Flambe)) [#164](https://github.com/recurly/recurly-client-php/pull/164)

## Version 2.4.3 (June 4th, 2015)

* Fixed bug where fetching an invoice PDF did not use the invoice number prefix [#155](https://github.com/recurly/recurly-client-php/pull/155)
* Added bank account attributes to `Recurly_BillingInfo`, these include:
  + `name_on_account`
  + `account_type` (`checking` or `savings`)
  + `last_four`
  + `routing_number`
  * [#153](https://github.com/recurly/recurly-client-php/pull/153)
* Added `ip_address` attribute to `Recurly_Transaction`[#157](https://github.com/recurly/recurly-client-php/pull/157)
* Added `bank_account_authorized_at` to `Recurly_Subscription` [#156](https://github.com/recurly/recurly-client-php/pull/156)
* Add invoice node to `Recurly_PushNotification` to read data on *_invoice_notification (thanks to [rikless](https://github.com/rikless)) [#159](https://github.com/recurly/recurly-client-php/pull/159)

## Version 2.4.2 (Apr 14th, 2015)

* Fixes encoding of values with ampersands [#150](https://github.com/recurly/recurly-client-php/issues/150)

## Version 2.4.1 (Feb 6th, 2015)

* Added adjustment refund support: `refund()` and `toRefundAttributes()` on `Recurly_Adjustment` [#133](https://github.com/recurly/recurly-client-php/pull/133)
* Added invoice refund support: `refund()` and `refundAmount()` on `Recurly_Invoice` [#133](https://github.com/recurly/recurly-client-php/pull/133)

## Version 2.4.0 (Feb 2nd, 2015)

* Force cURL to validate SSL certificates [#122](https://github.com/recurly/recurly-client-php/pull/122)
* Reverted #64, removing `balance_in_cents_invoiced` and `balance_in_cents_uninvoiced` from `Recurly_Account`. They were never added to the API.
* Added `tax_code` to `Recurly_Plan`, `Recurly_Addon` and `Recurly_Adjustment` [#120](https://github.com/recurly/recurly-client-php/pull/120)
* Added invoice previews: `Recurly_Invoice::previewPendingCharges($accountCode)` [#112](https://github.com/recurly/recurly-client-php/pull/112)
* Added `terms_and_conditions` and `customer_notes` to `Recurly_Invoice` [#115](https://github.com/recurly/recurly-client-php/pull/115)
* Added `vat_location_valid` field to `Recurly_Account` [#127](https://github.com/recurly/recurly-client-php/pull/127)
* Added `updateNotes()` and `vat_reverse_charge` to `Recurly_Subscription` [#128](https://github.com/recurly/recurly-client-php/pull/128)
* Added `vat_reverse_charge_notes` to `Recurly_Invoice` [#128](https://github.com/recurly/recurly-client-php/pull/128)
* Added `invoice_number_prefix` and `invoiceNumberWithPrefix()` to `Recurly_Invoice`. This is to be used with the Country Invoice Sequencing feature. [#130](https://github.com/recurly/recurly-client-php/pull/130)
* Added `collection_method`, `net_terms` and `po_number` to `Recurly_Invoice` [#131 by dmatora](https://github.com/recurly/recurly-client-php/pull/131)

## Version 2.3.1 (Sept 26th, 2014)

* Added remaining billing cycles to subscriptions: `$subscription->remaining_billing_cycles` [#91](https://github.com/recurly/recurly-client-php/pull/91)
* Added subscription change preview for existing subscriptions: `$subscription->preview()` [#94](https://github.com/recurly/recurly-client-php/pull/94)
* Remove readme reference to RecurlyJS v2 private key [#97](https://github.com/recurly/recurly-client-php/pull/97)
* Adding bulk parameter to subscription creation [#98](https://github.com/recurly/recurly-client-php/pull/98)
* Added account entity use code: `$account->entity_use_code` [#100](https://github.com/recurly/recurly-client-php/pull/100)
* Added PHP 5.6 and HHVM to `travis.yml` (thanks to [Nyholm](https://github.com/Nyholm)) [#101](https://github.com/recurly/recurly-client-php/pull/101)
* Update branch alias to 2.3.x-dev (thanks to [bangpound](https://github.com/bangpound)) [#102](https://github.com/recurly/recurly-client-php/pull/102)
* Bump phpunit to 4.2 [#103](https://github.com/recurly/recurly-client-php/pull/103)
* Adds PayPal and Amazon support to `Recurly_BillingInfo` [#104](https://github.com/recurly/recurly-client-php/pull/104)
* Adding bulk parameter to `$subscription->postpone()` [#105](https://github.com/recurly/recurly-client-php/pull/105)

## Version 2.3.0 (May 19th, 2014)

* Added tax details to adjustments: `$adjustment->tax_details` [#90](https://github.com/recurly/recurly-client-php/pull/90)
* Added subscription previews: `$subscription->preview()` [#90](https://github.com/recurly/recurly-client-php/pull/90)

## Version 2.2.6 (May 9th, 2014)

* Added support for `Recurly_Account` field `balance_in_cents_invoiced` [#64](https://github.com/recurly/recurly-client-php/pull/64)
* Added support for `Recurly_Account` field `balance_in_cents_uninvoiced` [#64](https://github.com/recurly/recurly-client-php/pull/64)
* Added support for `Recurly_BillingInfo` field `token_id` [#83](https://github.com/recurly/recurly-client-php/pull/83)
* Fixed bug in parsing large XML responses [#88](https://github.com/recurly/recurly-client-php/pull/88)

## Version 2.2.5 (Apr 24th, 2014)

* Explictly call `Recurly_Resource`'s constructor [#67](https://github.com/recurly/recurly-client-php/pull/67)
* More tests for coupons [#77](https://github.com/recurly/recurly-client-php/pull/77)
* Document where new releases are announced in the README [#78](https://github.com/recurly/recurly-client-php/pull/78)
* Fixed error where where `Recurly_Addon` was not found [#79 by baxevanis](https://github.com/recurly/recurly-client-php/pull/79)
* Fixed bug setting account address [#80 by deviantintegral](https://github.com/recurly/recurly-client-php/pull/80)

## Version 2.2.4 (Jan 7th, 2014)

* Fixed error when trying to redeem expired or maxed out coupons (thanks to [jeffchannell](https://github.com/jeffchannell))
* Improved documentation of `Recurly_PushNotification` (thanks to [richardkmiller](https://github.com/richardkmiller))
* Updated XML in test fixtures
* Better tests for `Recurly_Adjustment`

## Version 2.2.3 (Nov 11th, 2013)

* Use PHPUnit for testing
* Remove old `taxable` parameter from `Recurly_Adjustment`
* Send `null` attributes because `Recurly_PlanTest` needs `total_billing_cycles` to be set to `null` for unlimited renewals.

## Version 2.2.2 (Oct 7th, 2013)

* Fixed errors thrown due to empty XML strings #62 [beaudesigns](https://github.com/beaudesigns)

## Version 2.2.1 (July 19th, 2013)

* Fixed invalid XML errors when saving subscriptions with add-ons.
* Added support for manual payments
* Added support for account level address
* Moved VAT number to Account

## Version 2.2.0 (May 10, 2013)

* Added support for client subdomains, the default of 'api' should be fine for most users.
* Added support for fetching account notes.

## Version 2.1.4 (February 19, 2013)

* Fixed fatal error in `Recurly_Invoice::getInvoicePdf()`.
* Fixed fatal error in `Recurly_Account::close()`.
* Added `reopen()` and `reopenAccount` to `Recurly_Account`.

## Version 2.1.3 (February 8, 2013)

* Added Composer support (SimpleTest is no longer bundled, use `composer install --dev` to install it)
* Added `Recurly_AccountList::getClosed()`
* Added `update()` and `accounting_code` to `Recurly_Addon` and `Recurly_Transaction`
* Improved test coverage
* Lists now implement Countable and IteratorAggregate
* Fixed fatal errors in delete methods
* Fixed problems marking invoices successful/failed

## Version 2.1.2 (June 7, 2012)

* Support marking invoices as successful/failed
* Add subscriptions postpone functionality
* Support for subscriptions 'first_renewal_date' attribute.
* Fix problem where require parameters are sometimes not sent in requests (such as account_code).
* Fix un-pageable array results (no href is present), such as invoice/transactions.
* Fix transaction refunding, which was sending to a deprecated route.

## Version 2.1.1 (March 13, 2012)

* Fix Recurly.js token retrieval

## Version 2.1.0 (March 2, 2012)

* Improved Recurly.js support for Recurly.js v2.1.x. Supports optional parameters, simplified signatures, etc.

NOTE: Recurly.js signature and result retrieval is not backwards compatible with 2.0.x version of the client.

## Version 2.0.8 (February 22, 2012)

* Better parsing of transaction errors on one-time transaction requests.
* Parse an array of plan_codes as strings in the coupon response.

## Version 2.0.7 (November 30, 2011)

* Update subscription create URL to the endpoint that auto-creates the account if it does not exist.
* Accept transaction description.

## Version 2.0.6 (November 29, 2011)

* Fix creating subscription when add-ons is an empty array. Added tests.

## Version 2.0.5 (November 20, 2011)

* Always send list of addons when performing a subscription update.
* Fixed URL for `Recurly_CouponRedemption::get()`.
* Added `Recurly_TransactionList::getForAccount()`.
* Add coupon redemption via `$coupon->redeemCoupon('account_code')`.
* Properly encode `plan_codes` when limiting coupons to specific plans.

## Version 2.0.4 (November 16, 2011)

* Support for creating a subscription with add-ons (thanks to @qqqq).
* Attributes with a date are now DateTime objects instead of epoch timestamps.

## Version 2.0.3 (November 9, 2011)

* Use `rawurlencode()` instead of `urlencode()` to create resource URLs. Required for URLs that contain spaces
* Raise `Recurly_ValidationError` for 422 instead of `Recurly_RequestError`. Bug introduced in earlier commit today

## Version 2.0.2 (November 9, 2011)

* Fix `Recurly_InvoiceList::getForAccount()`, `SubscriptionList::getForAccount()`
* Interpret 4xx as request errors and 5xx as server errors for future error codes

## Version 2.0.1 (November 2, 2011)

* Include method to retrieve invoice as PDF

Merged fixes from [beaudesigns](https://github.com/beaudesigns):

* Replaced static class to DomDocument::loadXML()
* "pending_subscription" now loads class `Recurly_Subscription`
* Fixed references to $this that should have been local scopes

## Version 2.0.0 (October 18, 2011)

* Full rewrite for API v2
