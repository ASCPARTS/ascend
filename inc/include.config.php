<?php
session_start();
header('Content-Type:text/html; charset=UTF-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
header("Expires: Fri, 1 Jan 1999 05:00:00 GMT");
ini_set('display_errors',1);
ini_set("max_execution_time",1800);
ini_set('session.cookie_httponly',1);
date_default_timezone_set('America/Mexico_City');
mb_internal_encoding("UTF-8");

//##### PATH CONSTANTS #####
if(!defined('CSS_PATH'))            define('CSS_PATH','css/');
if(!defined('IMAGE_PATH'))          define('IMAGE_PATH','img/');
if(!defined('MENU_ICON_PATH'))      define('MENU_ICON_PATH',IMAGE_PATH . 'menu/');
if(!defined('USER_MENU_ICON_PATH')) define('USER_MENU_ICON_PATH',IMAGE_PATH . 'usermenu/');
if(!defined('INCLUDE_PATH'))        define('INCLUDE_PATH','inc/');
if(!defined('JS_PATH'))             define('JS_PATH','js/');
if(!defined('LIB_PATH'))            define('LIB_PATH','lib/');
if(!defined('MODULE_PATH'))         define('MODULE_PATH','modules/');

//##### DB CONSTANTS #####
if(!defined('DB_SERVER'))           define('DB_SERVER','ascparts.cxjfzamzvgxa.us-west-2.rds.amazonaws.com');
if(!defined('DB_USER'))             define('DB_USER','ascDBuser');
if(!defined('DB_PASSWORD'))         define('DB_PASSWORD','ascParts246');
if(!defined('DB_NAME'))             define('DB_NAME','dbASCParts');
if(!defined('DB_CHARSET'))          define('DB_CHARSET','UTF8');

//##### DATE/TIME FORMAT CONSTANTS #####
if(!defined('DTF_1'))               define('DTF_1','yyyy/mm/dd hh:mm:ss');
if(!defined('DTF_2'))               define('DTF_2','yyyy-mm-dd hh:mm:ss');
if(!defined('DTF_3'))               define('DTF_3','yyyy.mm.dd hh:mm:ss');
if(!defined('DTF_4'))               define('DTF_4','mm/dd/yyyy hh:mm:ss');
if(!defined('DTF_5'))               define('DTF_5','mm-dd-yyyy hh:mm:ss');
if(!defined('DTF_6'))               define('DTF_6','mm.dd.yyyy hh:mm:ss');
if(!defined('DTF_7'))               define('DTF_7','dd/mm/yyyy hh:mm:ss');
if(!defined('DTF_8'))               define('DTF_8','dd-mm-yyyy hh:mm:ss');
if(!defined('DTF_9'))               define('DTF_9','dd.dd.yyyy hh:mm:ss');
if(!defined('DTF_10'))              define('DTF_10','yyyy/mm/dd');
if(!defined('DTF_11'))              define('DTF_11','yyyy-mm-dd');
if(!defined('DTF_12'))              define('DTF_12','yyyy.mm.dd');
if(!defined('DTF_13'))              define('DTF_13','mm/dd/yyyy');
if(!defined('DTF_14'))              define('DTF_14','mm-dd-yyyy');
if(!defined('DTF_15'))              define('DTF_15','mm.dd.yyyy');
if(!defined('DTF_16'))              define('DTF_16','dd/mm/yyyy');
if(!defined('DTF_17'))              define('DTF_17','dd-mm-yyyy');
if(!defined('DTF_18'))              define('DTF_18','dd.dd.yyyy');
if(!defined('DTF_19'))              define('DTF_19','hh:mm:ss');
if(!defined('DTF_20'))              define('DTF_20','hh:mm');

?>