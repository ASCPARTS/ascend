<?php
require_once('../../inc/include.config.php');
require_once ('../../'.LIB_PATH.'class.ascend.php');

$objAscend = new clsAscend();
$strProcess = $_GET['strProcess'];
echo 'hola gaels';
switch ($strProcess){

    case 'getFamily':
        $result=$objAscend->dbQuery('select strName from tblFamily;');
        echo"<pre>";
        print_r($result);
        echo"</pre>";
    break;

    case 'getBrand':
        $result=$objAscend->dbQuery('select strName from tblBrand;');
        echo"<pre>";
        print_r($result);
        echo"</pre>";
    break;

    case 'getGroup':
        $result=$objAscend->dbQuery('select strName from tblGroup;');
        echo"<pre>";
        print_r($result);
        echo"</pre>";
    break;

    case 'getProduct':
        break;
    case 'getDetail':
        break;


}