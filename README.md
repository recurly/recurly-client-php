# Recurly PHP Client

The Recurly PHP Client library is an open source library to interact with Recurly's subscription management from your PHP website. The library interacts with Recurly's [REST API](http://support.recurly.com/faqs/api).

**Note:** This version uses Recurly API v2. There are substantial differences between this version of the client library and versions before _0.5.0_. Please be careful when upgrading.

### Installation

If you already have git, the easiest way to download the Recurly PHP Client is with the git command:

    git clone git://github.com/recurly/recurly-client-php.git /path/to/include/recurly
    
Alternatively, you may download the PHP files in the `lib/` directory and place them within your PHP project.

### Requirements

The PHP library depends on PHP 5.3.0 (or higher) and libcurl compiled with OpenSSL support. Open up a phpinfo(); page and verify that under the curl section, there's a line that says something like:

    libcurl/7.19.5 OpenSSL/0.9.8g zlib/1.2.3.3 libidn/1.15

## Initialization

Load the Recurly library files and set your API Key globally:

    <?php
    require_once('./lib/recurly.php');

    Recurly_Client::$apiKey = '012345678901234567890123456789ab';

If you are using [Recurly.js](http://js.recurly.com), specify your `private_key`:

    Recurly_js::$privateKey = "0123456789abcdef0123456789abcdef";

## API Documentation

Please see the [Recurly API](http://docs.recurly.com/api) for more information.
