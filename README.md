# Recurly
[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-v2.0%20adopted-ff69b4.svg)](CODE_OF_CONDUCT.md)

This repository houses the official php client for Recurly's V3 API.

> *Note*:
> If you were looking for the V2 client, see the [v2 branch](https://github.com/recurly/recurly-client-php/tree/v2).

Documentation for the HTTP API and example code can be found
[on our Developer Portal](https://developers.recurly.com/api/latest/).

## Getting Started

Reference documentation can be found on [Github Pages](https://recurly.github.io/recurly-client-php/).

### Installing

This package is published on Packagist under the name [recurly/recurly-client](https://packagist.org/packages/recurly/recurly-client) and can be added as a dependency to your project's `composer.json` file. We recommend using [Composer](http://getcomposer.org/) to install and maintain this dependency.

```json
{
    "require": {
        "recurly/recurly-client": "^4"
    }
}
```

> *Note*: We try to follow [semantic versioning](https://semver.org/) and will only apply breaking changes to major versions.

### Creating a Client

Client instances provide one place where every operation on the Recurly API can be found (rather than having them spread out amongst classes). A new client can be initialized with its constructor. It only requires an API key which can be obtained on the [API Credentials Page](https://app.recurly.com/go/integrations/api_keys).

```php
// You should store your API key somewhere safe
// and not in plain text if possible
$api_key = 'myApiKey';
$client = new \Recurly\Client($api_key);
```

To access Recurly API in Europe, you will need to specify the EU Region in the options.

```php
// You should store your API key somewhere safe
// and not in plain text if possible
$api_key = 'myApiKey';
$client = new \Recurly\Client($api_key, ['region' => 'eu']);
```

#### Logging

The client constructor optionally accepts a logger provided by the programmer. The logger you pass should implement the [PSR-3 Logger Interface](https://www.php-fig.org/psr/psr-3/). By default, the client creates an instance of the `\Recurly\Logger` which is a basic implementation that prints log messages to `php://stdout` with the `\Psr\Log\LogLevel::WARNING` level.

```php
// Create an instance of the Recurly\Logger
$logger = new \Recurly\Logger('Recurly', \Psr\Log\LogLevel::INFO);

$client = new \Recurly\Client($api_key, $logger);
```

> *SECURITY WARNING*: The log level should never be set to DEBUG in production. This could potentially result in sensitive data in your logging system.

### Operations

The `\Recurly\Client` contains every operation you can perform on the site as a list of methods. Each method is documented explaining the types and descriptions for each input and return type. For example, to use the [get_plan](https://developers.recurly.com/api/latest/index.html#operation/get_plan) endpoint, call the `Client#getPlan()` method:

```php
$plan_code = "gold";
$plan = $client->getPlan("code-$plan_code");
```

### Pagination

Pagination is accomplished using the `\Recurly\Pager` object. A pager is created by the `list*` operations of the client. The Pager implements [PHP's Iterator](https://www.php.net/manual/en/class.iterator.php) interface, so it can be used in a `foreach` loop.

> **Note**
> Calling `list*` methods do not call the API right away. They return immediately with the Pager. The API is not called until you iterate over the pager or request items from it.

```php
$accounts = $client->listAccounts();

foreach($accounts as $account) {
    echo 'Account code: ' . $account->getCode() . PHP_EOL;
}
```

#### Sorting and Filtering

When calling the `list*` methods and constructing Pagers, you can pass in optional query parameters to help you sort
or filter the resulting resources in the list. The query params are documented on the method and can be found in the docs
under the *Query Parameters* section of [any pageable endpoint](https://developers.recurly.com/api/latest/index.html#operation/list_accounts).

Example filtering an sorting accounts:

```php
$options = array('params' = array(
    // the following params are common amongst pageable endpoints
    'limit' => 200,   // 200 resources per page (http call)
    'order' => 'asc', // asc or desc order
    'begin_time' => '2020-01-01T01:00:00Z', // don't include accounts before 2020-01-01
    'end_time' => '2020-02-01T01:00:00Z', // don't include accounts after 2020-02-01
    // the following params are specific to the list_account endpoint
    'email' => 'admin@email.com', // only accounts with this email
    'subscriber' => true, // only accounts with a subscription in the active, canceled, or future state
    'past_due' => false // no accounts with an invoice in the past_due state
));
$accounts = $client->listAccounts($options);

foreach($accounts as $account) {
    echo 'Account code: ' . $account->getCode() . PHP_EOL;
}
```

#### Counting Resources

The Pager class implements a `getCount()` method which allows you to count the resources the pager would return if iterated.
It does so by calling the endpoint with `HEAD` and parsing and returning the `Recurly-Total-Records` header. This method respects any filtering parameters you apply to the pager, but the sorting parameters will have no effect.

```php
$accounts = $client->listAccounts([ 'past_due' => true ]);
// make the HTTP call to get the total count
$count = $accounts->getCount();
echo "Number of accounts past due: $count"
```

#### Efficiently Fetch the First or Last Resource

The Pager class implements a `getFirst()` method which allows you to fetch just the first or last resource from the server. On top of being a convenient abstraction, this is implemented efficiently by only asking the server for the 1 resource you want.

```php
$accounts = $client->listAccounts([ 'order' => 'desc', 'past_due' => true ]);
// fetch only the first account with past due invoice
$account = $accounts->getFirst();
```

If you want to fetch the last account in this scenario, invert the order from `desc` to `asc`:

```php
$accounts = $client->listAccounts([ 'order' => 'asc', 'past_due' => true ]);
// fetch only the last account with past due invoice
$account = $accounts->getFirst();
```

#### A Note on Headers

In accordance with [section 4.2 of RFC 2616](https://www.ietf.org/rfc/rfc2616.txt), HTTP header fields are case-insensitive.

### Creating Resources

For creating or updating resources, pass a plain associative array to one of the `create*` or `update*` methods:

```php
$plan_create = array(
    "name" => "Monthly Coffee Subscription",
    "code" => "coffee-monthly",
    "currencies" => [
        array(
            "currency" => "USD",
            "unit_amount" => 20.0
        )
    ]
);

$plan = $client->createPlan($plan_create);

echo 'Created Plan:' . PHP_EOL;
var_dump($plan);
```

### Error Handling

```php
try {
    $account = $client->deactivateAccount($account_id);
} catch (\Recurly\Errors\Validation $e) {
    // If the request was not valid, you may want to tell your user
    // why. You can find the invalid params and reasons in err.params
    // TODO show how to get params
    var_dump($e);
} catch (\Recurly\Errors\NotFound $e) {
    // You'll receive a NotFound error if one of the identifiers in your request
    // was incorrect. In this case, it's possible the $account_id is incorrect or
    // the associated account does not exist
    var_dump($e);
} catch (\Recurly\RecurlyError $e) {
    // All errors inherit from this base class, so this should catch
    // any error that this library throws. If we don't know what to
    // do with the err, we should probably re-raise and let
    // our web framework and logger handle it
    var_dump($e);
}
```

### HTTP Metadata

Sometimes you might want to get some additional information about the underlying HTTP request and response. Instead of returning this information directly and forcing the programmer to unwrap it, we inject this metadata into the top level resource that was returned. You can access the response by calling `getResponse()` on any Resource.

> **Warning**:
> Do not log or render whole requests or responses as they may contain PII or sensitive data.

```php
$account = $client->getAccount("code-douglas");
$response = $account->getResponse();
echo "Request ID:" . $response->getRequestId() . PHP_EOL;
echo "Rate limit remaining:" . $response->getRateLimitRemaining() . PHP_EOL;
```

Information about the request is also included in the `\Recurly\Response` class and can be accessed using the `getRequest()` method on the Response.

```php
$account = $client->getAccount("code-douglas");
$response = $account->getResponse();
$request = $response->getRequest();
echo "Request path:" . $request->getPath() . PHP_EOL;
echo "Request body as JSON:" . $request->getBodyAsJson() . PHP_EOL;
foreach($request->getHeaders() as $k => $v) {
    echo "Request header: $k => $v" . PHP_EOL;
}
```

This also works on `Empty` resources (for when there is no return body):

```php
$response = $client->removeLineItem("a959576b2b10b012")->getResponse();
echo "Request ID:" . $response->getRequestId() . PHP_EOL;
```
