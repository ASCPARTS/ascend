<?php
require_once ('inc/include.config.php');
require_once(LIB_PATH .'class.ascend.php');
ini_set("display_errors",1);
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$_SESSION['intUserID'] = '';
$_SESSION['strUserEMail'] = '';
$_SESSION['strUserName'] = '';
$_SESSION['strUserImage'] = '';
$_SESSION['intGoogleId'] = '';
$_SESSION['intGoogleToken'] = '';
$_SESSION['arrUserProfile'] = '';
$_SESSION['intPriceList'] = '';

switch ($strProcess) {
    case 'authClient':
        $jsnPhpScriptResponse = array('authClient'=>'0');
        $_SESSION['intUserID'] = '0';
        $_SESSION['strUserEMail'] = 'mail@mail.com';
        $_SESSION['strUserName'] = 'Compureparaciones SA. de CV.';
        $_SESSION['strUserImage'] = '';
        $_SESSION['intGoogleId'] = '';
        $_SESSION['intGoogleToken'] = '';
        $_SESSION['arrUserProfile'] = '';
        $_SESSION['intPriceList'] = '2';
        $jsnPhpScriptResponse['authClient'] = $_SESSION['intUserID'];
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>