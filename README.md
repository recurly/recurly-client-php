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
Recurly API user.  Note, you must use an **API user** to connect with the PHP client.
Please see the [Authentication](http://support.recurly.com/faqs/api/authentication)
documentation for more details.

    <?php
        require_once('recurly/library/recurly.php');
        RECURLY_API_USERNAME = '';
        RECURLY_API_PASSWORD = '[32 character string]';
        RECURLY_PRIVATE_KEY  = '[32 character string]'; // Required for Recurly.JS and Transparent Post
        RECURLY_SUBDOMAIN    = '[your Recurly subdomain]';
        RECURLY_ENVIRONMENT  = 'sandbox'; // OR 'production'
        RecurlyClient::SetAuth(RECURLY_API_USERNAME, RECURLY_API_PASSWORD, RECURLY_SUBDOMAIN, 
                               RECURLY_ENVIRONMENT, RECURLY_PRIVATE_KEY);
    ?>


Usage
-----

Please see the test code in the *unittest/* directory for examples.

Please see the [documentation](http://support.recurly.com/faqs/api/php-client) and
[support forums](http://support.recurly.com/discussions) for more information.

Receiving Push Notifications
----------------------------

Create a new PHP script to receive the Push Notification:

    <?php
        require_once('recurly/library/recurly.php');
        RecurlyClient::SetAuth(RECURLY_API_USERNAME, RECURLY_API_PASSWORD, RECURLY_SUBDOMAIN,
                               RECURLY_ENVIRONMENT, RECURLY_PRIVATE_KEY);
        
        $post_xml = file_get_contents ("php://input");
        $notification = new RecurlyPushNotification($post_xml);
        
        // process based on $notification->type
    ?>

Be sure to update your Recurly site settings to submit POST Notifications to your new script.

Examples
--------

Please see **/demo/subscribe.php** for an example subscription page.

API Documentation
-----------------

Please see the [Recurly API](http://support.recurly.com/faqs/api/) for more information.