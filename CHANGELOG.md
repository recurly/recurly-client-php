# Recurly PHP Client Library CHANGELOG

## Version 2.0.1 (November 2, 2011)

* Include method to retrieve invoice as PDF

Merged fixes from beaudesigns:

* Replaced static class to DomDocument::loadXML()
* "pending_subscription" now loads class Recurly_Subscription
* Fixed references to $this that should have been local scopes

## Version 2.0.0 (October 18, 2011)

* Full rewrite for API v2
