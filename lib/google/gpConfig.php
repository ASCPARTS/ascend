<?php
include_once 'Google_Client.php';
include_once 'contrib/Google_Oauth2Service.php';
$clientId = '839294887884-aocngunfl5p38s9lmpqiobcosjingj1f.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'xhJHgeurjllQqvzIPLpiJ7KN'; //Google client secret
if(trim(strtolower($_SERVER['HTTP_HOST']))=='localhost'){
    $redirectURL = 'http://localhost/ascend/glogin.php'; //Callback URL
}else{
    $redirectURL = 'http://demo.ascparts.com/glogin.php'; //Callback URL
};
$gClient = new Google_Client();
$gClient->setApplicationName('ascend');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
$google_oauthV2 = new Google_Oauth2Service($gClient);
?>