<?php
session_start();
if($_SESSION['intGoogleId']!=''){
    include_once 'lib/google/gpConfig.php';
    $gClient->revokeToken();
}
$_SESSION['intUserID'] = '';
$_SESSION['strUserEMail'] = '';
$_SESSION['strUserName'] = '';
$_SESSION['strUserImage'] = '';
$_SESSION['intGoogleId'] = '';
$_SESSION['arrUserProfile'] = '';
$_SESSION['intPriceList'] = '';
$_SESSION['intGoogleToken'] = '';
session_destroy();
header("Location:index.php");
?>