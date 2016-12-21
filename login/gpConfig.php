<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '839294887884-aocngunfl5p38s9lmpqiobcosjingj1f.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'xhJHgeurjllQqvzIPLpiJ7KN'; //Google client secret
$redirectURL = 'http://localhost/ascend/login/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('ascend');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>