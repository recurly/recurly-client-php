# Recurly PHP Client Library CHANGELOG

## Version 0.2.4 (August 25, 2011)

* Fix bug with verifyBillingInfoUpdated not incorporating account_code key in signature message and failing

## Version 0.2.3 (August 19, 2011)

* Added support for Recurly.js

## Version 0.2.2 (April 30, 2011)

* Correctly parse "field_name" on XML errors. Thanks to Matthew Bafford for the patch.
* Added RecurlyTransaction::refund() to refund a previous successful transaction.

## Version 0.2.1 (March 15, 2011)

* Transparent Post: Handle 404s when plan code is not found.

## Version 0.2.0 (March 14, 2011 -- Happy Pi day!)

* Transparent Post API support

## Version 0.1.12 (February 3, 2011)

* Added Coupon support (see http://docs.recurly.com/api/coupons for more info)
* Added RecurlySubscription::terminateSubscription() to terminate a subscription without a refund.
* Added environment variable ('production' or 'sandbox') for authentication. Client library no longer submits API requests to [your-subdomain].recurly.com. Please be sure to use your account's API user credentials when connecting to Recurly.

## Version 0.1.11 (February 1, 2011)

* Fixed RecurlyTransaction::create()
* Added RecurlyTransaction::getTransaction(), and void()
* Added RecurlyUnauthorizedException for 401/Authorization failures when connecting to the API

## Version 0.1.10 (January 9, 2011)

* Automatically submit "Accept-Language" header to Recurly when creating or updating an account.

## Version 0.1.9 (August 26, 2010)

* Subscription add-ons support.

## Version 0.1.8 (July 27, 2010)

* Added RecurlyTransaction::create()
* Fixed error message when invoice creation fails.
* Fixed potential bug when request IP address is not set.
* Removed the 'creditcard.php' dependency because it does not provide comprehensive validation.
* Added Luhn validation RecurlyCreditCard class.
* Added raw xml variable to the RecurlyException class.

## Version 0.1.7 (March 11, 2010)

* Added 'subdomain' parameter to authentication.
* Added clarification that credentials should be for an API user.

## Version 0.1.6 (February 1, 2010)

* Added pending_subscription information to the RecurlySubscription.

## Version 0.1.5 (January 31, 2010)

* Renamed RecurlyPostNotification to RecurlyPushNotification to match naming convention in the web app.
* Removed RecurlyPlanVersion. Plan pricing information is now part of RecurlyPlan.
* Added RecurlyInvoice::createInvoice() to create invoices for non-invoiced charges.
* Added more subscription status variables to RecurlySubscription.
* Added more variables to RecurlyTransaction.
