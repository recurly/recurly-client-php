# Recurly

This repository houses the official php client for Recurly's V3 API.

> *Note*:
> If you were looking for the V2 client, see the [v2 branch](https://github.com/recurly/recurly-client-php/tree/v2).

Documentation for the HTTP API and example code can be found
[on our Developer Portal](https://developers.recurly.com/api/latest/).

## Getting Started

### Installing

This package is published on Packagist under the name [recurly/recurly-client](https://packagist.org/packages/recurly/recurly-client) and can be added as a dependency to your project's `composer.json` file. We recommend using [Composer](http://getcomposer.org/) to install and maintain this dependency.

```json
{
    "require": {
        "recurly/recurly-client": "^3"
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
$params = array(
    // the following params are common amongst pageable endpoints
    'limit' => 200,   // 200 resources per page (http call)
    'order' => 'asc', // asc or desc order
    'begin_time' => '2020-01-01T01:00:00Z', // don't include accounts before 2020-01-01
    'end_time' => '2020-02-01T01:00:00Z', // don't include accounts after 2020-02-01
    // the following params are specific to the list_account endpoint
    'email' => 'admin@email.com', // only accounts with this email
    'subscriber' => true, // only accounts with a subscription in the active, canceled, or future state
    'past_due' => false // no accounts with an invoice in the past_due state
);
$accounts = $client->listAccounts($params);

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

Sometimes you might want to get some additional information about the underlying HTTP request and response. Instead of returning this information directly and forcing the programmer to unwrap it, we inject this metadata into the top level resource that was returned. You can access the response by calling `getResponse()` on any Resource.

> **Warning**:
> Do not log or render whole requests or responses as they may contain PII or sensitive data.

```php
$account = $client->getAccount("code-douglas");
$response = $account->getResponse();
echo "Request ID:" . $response->getRequestId() . PHP_EOL;
echo "Rate limit remaining:" . $response->getRateLimitRemaining() . PHP_EOL;
```

This also works on `Empty` resources (for when there is no return body):

```php
$response = $client->removeLineItem("a959576b2b10b012")->getResponse();
echo "Request ID:" . $response->getRequestId() . PHP_EOL;
```
