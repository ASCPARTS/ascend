<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
require_once('lib.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'getPromoList':
        $jsnPhpScriptResponse = array('tblPromoList'=>'');
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strStatus = $_REQUEST['strStatus'];
        $tblPromoList = '<table id="tablePromoList" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $tblPromoList .= '<thead id="theadPromoList" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $tblPromoList .= '<tr>';
        $tblPromoList .= '<th>ID</th>';
        $tblPromoList .= '<th>Promoción</th>';
        $tblPromoList .= '<th>Vigencia (De)</th>';
        $tblPromoList .= '<th>Vigencia (Hasta)</th>';
        $tblPromoList .= '<th>Estatus</th>';
        $tblPromoList .= '</tr>';
        $tblPromoList .= '</thead>';
        $tblPromoList .= '<tbody id="tbodyPromoList" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';
        $strSql = "SELECT tblPromo.strName, tblPromo.intDateFrom, tblPromo.intDateTo, tblPromo.strStatus FROM tblPromo WHERE tblPromo.intDateFrom <= " . $intDateFrom . " AND tblPromo.intDateTo >= " . $intDateTo . " AND tblPromo.strStatus IN (" . $strStatus . ")";
        $rstData = $objAscend->dbQuery($strSql);
        if(count($rstData)==0){
            $tblPromoList .= '<tr><td colspan="5">No existen registros</td></tr>';
        }
        unset($rstData);
        $tblPromoList .= '</tbody>';
        $tblPromoList .= '</table>';
        $jsnPhpScriptResponse['tblPromoList'] = $tblPromoList;
        break;
};
echo json_encode($jsnPhpScriptResponse);
?>