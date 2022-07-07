<?php
require_once '../vendor/autoload.php';

$clientID = '964884563069-qvqeu2hepq606g37q19htsu8sgq5sr0u.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'https://localhost/santrimart/Santrimart/w/aut/login.php';


// CREATE CLIENT REQUEST TO GOOGLE
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');