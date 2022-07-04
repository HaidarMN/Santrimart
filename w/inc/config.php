<?php
require_once '../vendor/autoload.php';

$clientID = '128100775612-drosbomdga330gfhte3rhhk77oq2tds5.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'http://localhost/santrimart/Santrimart/w/page/?menu=home';


// CREATE CLIENT REQUEST TO GOOGLE
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');