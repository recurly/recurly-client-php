# Recurly PHP Client Library CHANGELOG


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

Merged fixes from beaudesigns:

* Replaced static class to DomDocument::loadXML()
* "pending_subscription" now loads class Recurly_Subscription
* Fixed references to $this that should have been local scopes

## Version 2.0.0 (October 18, 2011)

* Full rewrite for API v2
