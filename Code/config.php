<?php

//start session on web page

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('26101194236-hao4dpniqm6229qoa1q3h1erttcocdjj.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('94m5_saCdTOiJXmQJd8z-Ndq');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Group03/login.php');

// to get the email and profile
$google_client->addScope('email');

$google_client->addScope('profile');

?>
