<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'filterGrid':
        $jsnPhpScriptResponse = array('gridHeader'=>'','gridTable'=>'');
        $strMail = $_REQUEST['strMail'];
        $strName = trim($_REQUEST['strName']);
        $intRoll = $_REQUEST['intRoll'];
        $intParent = $_REQUEST['intParent'];
        $strStatus = $_REQUEST['strStatus'];
        $divGridHeader = '<table id="tblGridHeader" class="tblGrid">';
        $divGridHeader .= '<thead id="theadGrid">';
        $divGridHeader .= '<tr>';
        $divGridHeader .= '<th>ID</th>';
        $divGridHeader .= '<th>EMail</th>';
        $divGridHeader .= '<th>Nombre</th>';
        $divGridHeader .= '<th>Departamento</th>';
        $divGridHeader .= '<th>Reporta a</th>';
        $divGridHeader .= '<th>Estatus</th>';
        $divGridHeader .= '<th>&nbsp;</th>';
        $divGridHeader .= '<th id="thGridOffset" class="thGridOffset"></th>';
        $divGridHeader .= '</tr>';
        $divGridHeader .= '</thead>';
        $divGridHeader .= '</table>';
        $jsnPhpScriptResponse['gridHeader'] = $divGridHeader;
        $strSql  = "SELECT USR.intId, USR.strMail, USR.strName, DPT.strName AS strDepartment, PRT.strName AS strParent, USR.strStatus ";
        $strSql .= "FROM tblUser AS USR ";
        $strSql .= "LEFT JOIN tblUser AS PRT ON PRT.intId = USR.intParent ";
        $strSql .= "LEFT JOIN catDepartment AS DPT ON DPT.intId = USR.intRoll ";
        $strSql .= "WHERE USR.strStatus IN (" . $strStatus . ") ";
        if($strMail!='') {
            $strSql .= "AND USR.strMail LIKE ('%" . $strMail . "%') ";
        }
        if($strName!='') {
            $strSql .= "AND USR.strName LIKE ('%" . $strName . "%') ";
        }
        if($intRoll!=-1) {
            $strSql .= "AND USR.intRoll = " . $intRoll . " ";
        }
        if($intParent!=-1) {
            $strSql .= "AND USR.intParent = " . $intParent . " ";
        }
        $strSql .= "ORDER BY USR.strName;";
        $divGridTable = '<table class="tblGrid">';
        $divGridTable .= '<tbody id="tbodyGrid">';
        $rstData = $objAscend->dbQuery($strSql);
        foreach($rstData as $arrData){
            $divGridTable .= '<tr>';
            $divGridTable .= '<td>' . $arrData['intId'] . '</td>';
            $divGridTable .= '<td>' . $arrData['strMail'] . '</td>';
            $divGridTable .= '<td>' . $arrData['strName'] . '</td>';
            $divGridTable .= '<td>' . $arrData['strDepartment'] . '</td>';
            if(is_null($arrData['strParent'])){
                $divGridTable .= '<td>N/A</td>';
            }else{
                $divGridTable .= '<td>' . $arrData['strParent'] . '</td>';
            }
            $divGridTable .= '<td style="text-align: center">' . $arrData['strStatus'] . '</td>';
            $divGridTable .= '<td style="text-align: center"><button class="btn btnOverYellow" onclick="getRecord(' . $arrData['intId'] . ')">Editar</button></td>';
            $divGridTable .= '<td class="tdGridOffset"></td>';
            $divGridTable .= '</tr>';
        }
        unset($arrData);
        unset($rstData);
        $divGridTable .= '</tbody>';
        $divGridTable .= '</table>';
        $jsnPhpScriptResponse['gridTable'] = $divGridTable;
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>