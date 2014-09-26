# Recurly PHP Client

[![Build Status](https://travis-ci.org/recurly/recurly-client-php.png?branch=master)](https://travis-ci.org/recurly/recurly-client-php)

The Recurly PHP Client library is an open source library to interact with
Recurly's subscription management from your PHP website. The library interacts
with Recurly's [REST API](http://support.recurly.com/faqs/api).

**Note:** This version uses Recurly API v2. There are substantial differences
between this version of the client library and versions before _0.5.0_. Please
be careful when upgrading.

## Requirements

The PHP library depends on PHP 5.3.0 (or higher) and libcurl compiled with
OpenSSL support. Open up a `phpinfo();` page and verify that under the curl
section, there's a line that says something like:

```
libcurl/7.19.5 OpenSSL/0.9.8g zlib/1.2.3.3 libidn/1.15
```

## Installation

### Composer

If you're using [Composer](http://getcomposer.org/), you can simply add a
dependency on `recurly/recurly-client` to your project's `composer.json` file.
Here's an example of a dependency on 2.3:

```json
{
    "require": {
        "recurly/recurly-client": "2.3.*"
    }
}
```

### Git

If you already have git, the easiest way to download the Recurly PHP Client is
with the git command:

```
git clone git://github.com/recurly/recurly-client-php.git /path/to/include/recurly
```

### By Hand

Alternatively, you may download the PHP files in the `lib/` directory and place
them within your PHP project.

## Initialization

Load the Recurly library files and set your subdomain and API Key globally:

```php
<?php
require_once('./lib/recurly.php');

Recurly_Client::$subdomain = 'your-subdomain';
Recurly_Client::$apiKey = '012345678901234567890123456789ab';
```

## API Documentation

Please see the [Recurly API](http://docs.recurly.com/api) for more information.

## Support

- [https://support.recurly.com](https://support.recurly.com)
- [stackoverflow](http://stackoverflow.com/questions/tagged/recurly)

## Announcements

- [@recurly](https://twitter.com/recurly)
- [Google Group Announcements](https://groups.google.com/group/recurly-api)

## Contributing Guidelines

Please refer to [CONTRIBUTING.md](CONTRIBUTING.md)
