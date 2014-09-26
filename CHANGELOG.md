# Recurly PHP Client Library CHANGELOG

## Version 2.3.1 (Sept 26th, 2014)

* Added remaining billing cycles to subscriptions: `subscription->remaining_billing_cycles` [91](https://github.com/recurly/recurly-client-php/pull/91)
* Added subscription change preview for existing subscriptions: `subscription->preview()` [94](https://github.com/recurly/recurly-client-php/pull/94)
* Remove readme reference to recurlyjs v2 private key [97](https://github.com/recurly/recurly-client-php/pull/97)
* Addding bulk parameter to subscription creation [98](https://github.com/recurly/recurly-client-php/pull/98)
* Added account entity use code: `account->entity_use_code` [100](https://github.com/recurly/recurly-client-php/pull/100)
* Added PHP 5.6 and HHVM to travis.yml (thanks to [Nyholm](https://github.com/Nyholm)) [101](https://github.com/recurly/recurly-client-php/pull/101)
* Update branch alias to 2.3.x-dev (thanks to [bangpound](https://github.com/bangpound)) [102](https://github.com/recurly/recurly-client-php/pull/102)
* Bump phpunit to 4.2 [103](https://github.com/recurly/recurly-client-php/pull/103)
* Adds PayPal and Amazon support to Recurly_BillingInfo [104](https://github.com/recurly/recurly-client-php/pull/104)
* Adding bulk parameter to `$subscription->postpone()` [105](https://github.com/recurly/recurly-client-php/pull/105)

## Version 2.3.0 (May 19th, 2014)

* Added tax details to adjustments: `$adjustment->tax_details` [90](https://github.com/recurly/recurly-client-php/pull/90)
* Added subscription previews: `$subscription->preview()` [90](https://github.com/recurly/recurly-client-php/pull/90)

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

* Fixed fatal error in Recurly_Invoice::getInvoicePdf().
* Fixed fatal error in Recurly_Account::close().
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
* Fixed URL for Recurly_CouponRedemption::get().
* Added Recurly_TransactionList::getForAccount().
* Add coupon redemption via $coupon->redeemCoupon('account_code').
* Properly encode plan_codes when limiting coupons to specific plans.

## Version 2.0.4 (November 16, 2011)

* Support for creating a subscription with add-ons (thanks to @qqqq).
* Attributes with a date are now DateTime objects instead of epoch timestamps.

## Version 2.0.3 (November 9, 2011)

* Use rawurlencode() instead of urlencode() to create resource URLs. Required for URLs that contain spaces
* Raise Recurly_ValidationError for 422 instead of Recurly_RequestError. Bug introduced in earlier commit today

## Version 2.0.2 (November 9, 2011)

* Fix Recurly_InvoiceList::getForAccount(), SubscriptionList::getForAccount()
* Interpret 4xx as request errors and 5xx as server errors for future error codes

## Version 2.0.1 (November 2, 2011)

* Include method to retrieve invoice as PDF

Merged fixes from [beaudesigns](https://github.com/beaudesigns):

* Replaced static class to DomDocument::loadXML()
* "pending_subscription" now loads class Recurly_Subscription
* Fixed references to $this that should have been local scopes

## Version 2.0.0 (October 18, 2011)

* Full rewrite for API v2
