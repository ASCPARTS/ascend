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
                $strOut .= $arrData['strStatus'] . '</div>';
                $jsnPhpScriptResponse['strClientList'] .= $strOut;
            }
            unset($arrData);
        }else{
            $jsnPhpScriptResponse['strClientList'] = 'NADA DE NADA';
        }
        unset($rstData);
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);