<?php

//googleConfig.php

//Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('739914030087-qfligh4d6kk9hp6n891kc7a5ehfijco3.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('79HWGcVjtJoOf1UF_3QRQlIK');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/login-via-fb-or-google/socialMedia/google.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();


