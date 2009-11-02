Recurly PHP Client
==================

Overview
--------
The Recurly PHP Client allows your PHP website to integrate with Recurly for your subscription management.


Installation
------------

If you already have git, the easiest way to download the Recurly PHP Client is with the git command:

    git clone git://github.com/recurly/recurly-client-php.git /path/to/include/recurly
    
Alternatively, you may download the files in the library directory and place them within your PHP project.


Initialization
--------------

First, the Recurly classes must be loaded:

    <?php
        require_once('recurly/recurly.php');
    ?>
    
Next, specify your username and password for your Recurly account.  Please see the [Authentication](http://support.recurly.com/faqs/api/authentication) documentation for more details

    <?php
        RecurlyClient::SetAuth(RECURLY_USERNAME, RECURLY_PASSWORD);
    ?>


Usage
-----

Please see the test code in the unitTest directory for examples.


API Documentation
-----------------

Please see the [Recurly API](http://support.recurly.com/faqs/api/) for more information.