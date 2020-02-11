# Recurly

This repository houses the official dotnet client for Recurly's V3 API.

> *Note*:
> If you were looking for the V2 client, see the [v2 branch](https://github.com/recurly/recurly-client-php/tree/v2).

Documentation for the HTTP API and example code can be found
[on our Developer Portal](https://developers.recurly.com/api/v2019-10-10/).

## Getting Started

### Installing

This package is published on Packagist under the name [recurly/recurly-client](https://packagist.org/packages/recurly/recurly-client) and can be added as a dependency to your project's `composer.json` file. We recommend using [Composer](http://getcomposer.org/) to install and maintain this dependency.

```json
{
    "require": {
        "recurly/recurly-client": "3.0.*"
    }
}
```

> *Note*: We try to follow [semantic versioning](https://semver.org/) and will only apply breaking changes to major versions.

### Creating a Client

Client instances provide one place where every operation on the Recurly API can be found (rather than having them spread out amongst classes). A new client can be initialized with its constructor. It only requires an API key which can be obtained on the [API Credentials Page](https://app.recurly.com/go/integrations/api_keys).

```php
$api_key = '83749879bbde395b5fe0cc1a5abf8e5';
$client = new \Recurly\Client($api_key);
```

### Operations

The `\Recurly\Client` contains every operation you can perform on the site as a list of methods. Each method is documented explaining the types and descriptions for each input and return type.

### Pagination

Pagination is accomplished using the `\Recurly\Pager` object. A pager is created by the `list*` operations of the client. The Pager implements [PHP's Iterator](https://www.php.net/manual/en/class.iterator.php) interface, so it can be used in a `foreach` loop. 

```php
$accounts = $client->listAccounts();

foreach($accounts as $account) {
    echo 'Account code: ' . $account->getCode() . PHP_EOL;
}
```