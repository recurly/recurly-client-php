<?php

require_once 'library/recurly.php';
RecurlyClient::SetAuth('support@mainstreethub.com', '85a24ac1a85b49b394cf3fb6f655cbb1', 'mainstreethub');


$bi = RecurlyBillingInfo::getBillingInfo('56805');

print_r($bi);