<?php
require_once 'inc/include.config.php';
ini_set("display_errors",0);
include_once 'lib/google/gpConfig.php';
require_once 'lib/class.ascend.php';

    $objAscend = new clsAscend();

    if(isset($_GET['error'])){
        $strUrl = "index.php";
        header('Location: ' . filter_var($strUrl, FILTER_SANITIZE_URL));
    }

    if(isset($_GET['code'])){
        $gClient->authenticate($_GET['code']);
        $_SESSION['intGoogleToken'] = $gClient->getAccessToken();
        header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
    }

    if(isset($_SESSION['intGoogleToken'])){
        $gClient->setAccessToken($_SESSION['intGoogleToken']);
    }

    if($gClient->getAccessToken()){
        $gpUserProfile = $google_oauthV2->userinfo->get();
        $strUrl = '';
        $strSql = "SELECT intId FROM tblUser WHERE strMail = '" . trim(strtolower($gpUserProfile['email'])) . "'";
        $rstData = $objAscend->dbQuery($strSql);
        if(count($rstData)>0) {
            foreach ($rstData as $arrData) {
                $_SESSION['intUserID'] = $arrData['intId'];
                $_SESSION['strUserEMail'] = $gpUserProfile['email'];
                $_SESSION['strUserName'] = trim($gpUserProfile['given_name']) . ' ' . trim($gpUserProfile['family_name']);
                $_SESSION['strUserImage'] = $gpUserProfile['picture'];
                $_SESSION['intGoogleId'] = $gpUserProfile['id'];
                $_SESSION['arrUserProfile'] = '';
                $_SESSION['intPriceList'] = '';
                $strUrl = 'main.php';
            }
            unset($arrData);
        }else {
            $_SESSION['intUserID'] = '';
            $_SESSION['strUserEMail'] = '';
            $_SESSION['strUserName'] = '';
            $_SESSION['strUserImage'] = '';
            $_SESSION['intGoogleId'] = '';
            $_SESSION['arrUserProfile'] = '';
            $_SESSION['intPriceList'] = '';
            $strUrl = 'index.php';
        }
        unset($rstData);
    }

    header('Location: ' . filter_var($strUrl, FILTER_SANITIZE_URL));

    unset($objAscend);
?>
