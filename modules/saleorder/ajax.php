<?php
require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

switch ($strProcess) {
    case 'getClientList':
        $jsnPhpScriptResponse = array('strClientList'=>'');
        $strClient = $_REQUEST['strClient'];
        $strSql = "SELECT * FROM tblCustomer WHERE strCode LIKE ('%" . $strClient . "%') OR strRFC LIKE ('%" . $strClient . "%') OR strRegisteredName LIKE ('%" . $strClient . "%') OR strCommercialName LIKE ('%" . $strClient . "%') ORDER BY strRegisteredName";
        $rstData = $objAscend->dbQuery($strSql);
        if(count($rstData)>0){
            foreach ($rstData as $arrData){
                $strOut = '<div class="divClientListOption" onclick="selectClient(' . $arrData['intId'] . ');">' . $arrData['strCode'] . ' - ';
                $strOut .= $arrData['strRegisteredName'] . ' - ';
                $strOut .= $arrData['strRFC'] . ' - ';
                $strOut .= $arrData['strCommercialName'] . ' - ';
                $strOut .= $arrData['strStatus'] . '</div>';
                $jsnPhpScriptResponse['strClientList'] .= $strOut;
            }
            unset($arrData);
        }else{
            $jsnPhpScriptResponse['strClientList'] = 'NADA DE NADA';
        }
        unset($rstData);
        break;
    case 'getClientInfo':
        $jsnPhpScriptResponse = array('strClientName'=>'', 'strClientNumber'=>'', 'strClientRFC'=>'', 'strClientClass'=>'', 'strClientZone'=>'', 'strClientStatus'=>'');
        $strSql = "SELECT tblCustomer.strRegisteredName, tblCustomer.strCode, tblCustomer.strRFC, catCustomerClass.strName, catZone.strKey, tblCustomer.strStatus FROM tblCustomer LEFT JOIN catCustomerClass ON catCustomerClass.intId = tblCustomer.intClass LEFT JOIN catZone ON catZone.intId = tblCustomer.intZone WHERE tblCustomer.intId = " . $_REQUEST['intId'] . ";";
        $rstData = $objAscend->dbQuery($strSql);
        foreach ($rstData as $arrData){
            $jsnPhpScriptResponse['strClientName'] = $arrData['strRegisteredName'];
            $jsnPhpScriptResponse['strClientNumber'] = $arrData['strCode'];
            $jsnPhpScriptResponse['strClientRFC'] = $arrData['strRFC'];
            $jsnPhpScriptResponse['strClientClass'] = $arrData['strName'];
            $jsnPhpScriptResponse['strClientZone'] = $arrData['strKey'];
            $jsnPhpScriptResponse['strClientStatus'] = $arrData['strStatus'];
        }
        unset($arrData);
        unset($rstData);
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);