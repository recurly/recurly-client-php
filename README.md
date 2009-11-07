Recurly PHP Client
==================

The Recurly PHP Client library is an open source library to interact with Recurly's subscription management from your PHP website. The library interacts with Recurly's [REST API](http://support.recurly.com/faqs/api).


Installation
------------

If you already have git, the easiest way to download the Recurly PHP Client is with the git command:

    git clone git://github.com/recurly/recurly-client-php.git /path/to/include/recurly
    
Alternatively, you may download the PHP files in the library directory and place them within your PHP project.


Initialization
--------------

First, the Recurly classes must be loaded. Next, specify your username and password for your 
Recurly account.  Please see the [Authentication](http://support.recurly.com/faqs/api/authentication)
documentation for more details.

    <?php
        require_once('recurly/library/recurly.php');
        RecurlyClient::SetAuth(RECURLY_USERNAME, RECURLY_PASSWORD);
    ?>


Usage
-----

Please see the test code in the *unittest/* directory for examples.

Please see the [documentation](http://support.recurly.com/faqs/api/php-client) and
[support forums](http://support.recurly.com/discussions) for more information.


API Documentation
-----------------

Please see the [Recurly API](http://support.recurly.com/faqs/api/) for more information.