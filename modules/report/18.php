<?php
/*Catálogo de Clientes General*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Catálogo de Clientes General';
$blnPaginated = true;
$blnFreezeHeader = true;
$btnXLS = true;
$btnPDF = true;
$btnTXT = false;

switch ($strProcess) {
    case 'Filter':
        $jsnPhpScriptResponse = array('strTitle'=>$strTitle,'arrFilters'=>array(),'blnPaginated'=>$blnPaginated,'blnFreezeHeader'=>$blnFreezeHeader);

        //##### FUnction buildFilter
        //$strType: 'numeric' || 'select'
        //$strIcon: catalogo imagenes || ''
        //$strName: id del input
        //$strLabel: etiqueta para el input
        //$intMaxLength: longitud maxima || 0=no aplica || 0=ilimitado
        //$blnNegative: si el campo es numerico true=admite negativos || false=no admite negativos
        //$intDecimalPlaces: si el campo es numerico 0=no admite decimales || X=numero de decimales
        //$blnRequired: campo requerido: true=requerido || false=opcional
        //$strSql: sentencia sql para llenar campo tipo select
        //#####
        // input Cliente
        array_push($jsnPhpScriptResponse['arrFilters'],
        buildFilter('textwithscore','userGray','strCustomer','Cliente','',false,0,false,''));

        break;

    case 'Report':
        $strCustomer = trim($_REQUEST['strCustomer']);

        $jsnPhpScriptResponse = array('strReport'=>$strTitle,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $strSql = " select C.strKeyNumber, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, CC.strName, Z.strDescription ";
        $strSql .= "from tblCustomer C ";
        $strSql .= "LEFT JOIN catClass CC ON CC.intId = C.intClass ";
        $strSql .= "LEFT JOIN catZone Z ON Z.intId = C.intZone ";
        $strSql .= "where C.strStatus='A' ";
        if($strCustomer!=''){
            $strSql .="AND C.strKeyNumber =  '$strCustomer'  ";
        }
        $strSql .= "ORDER BY C.strKeyNumber;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>Clave Cliente</th>';
        $strReport .= '<th>Número de Referencia</th>';
        $strReport .= '<th>Razón Social</th>';
        $strReport .= '<th>Razón Comercial</th>';
        $strReport .= '<th>Clase</th>';
        $strReport .= '<th>Zona</th>';
        $strReport .= '</thead>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['strKeyNumber'] . '</td>';
            $strReport .= '<td>' . $arrData['strReferenceNumber'] . '</td>';
            $strReport .= '<td>' . $arrData['strRegisteredName'] . '</td>';
            $strReport .= '<td>' . $arrData['strCommercialName'] . '</td>';
            $strReport .= '<td>' . $arrData['strName'] . '</td>';
            $strReport .= '<td>' . $arrData['strDescription'] . '</td>';
            $strReport .= '</tr>';
        }
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);