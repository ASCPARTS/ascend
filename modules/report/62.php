<?php
/*Tipo de Cambio por Fecha*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');


require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Tipo de Cambio por Fecha';
$blnPaginated = true;
$blnFreezeHeader = true;
$btnXLS = false;
$btnPDF = false;
$btnTXT = true;

switch ($strProcess) {
    case 'Filter':
        $jsnPhpScriptResponse = array('strTitle'=>$strTitle,'arrFilters'=>array(),'blnPaginated'=>$blnPaginated,'blnFreezeHeader'=>$blnFreezeHeader);
        //##### Function buildFilter
        //$strType: 'numeric' || 'select' || 'date'
        //$strIcon: catalogo imagenes || ''
        //$strName: id del input
        //$strLabel: etiqueta para el input
        //$intMaxLength: longitud maxima || 0=no aplica || 0=ilimitado
        //$blnNegative: si el campo es numerico true=admite negativos || false=no admite negativos
        //$intDecimalPlaces: si el campo es numerico 0=no admite decimales || X=numero de decimales
        //$blnRequired: campo requerido: true=requerido || false=opcional
        //$strSql: sentencia sql para llenar campo tipo select
        //#####
        //##### Input Date
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow','strDate_From','Fecha (de)',0,false,0,true,''));
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow ','strDate_To','Fecha (hasta)',0,false,0,true,''));

        break;
    case 'Report':
        
        $jsnPhpScriptResponse = array('strReport'=>$strReport,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);
        
        $strDate_From = $_REQUEST['strDate_From'];
        $strDate_To = $_REQUEST['strDate_To'];
        
        $strSql .= "select intDate, decExchangeRate ";
        $strSql .= "from tblCurrencyChangeType  ";
        $strSql .= "WHERE intDate >= '$strDate_From' and intDate <= '$strDate_To' ";
        $strSql .= "ORDER BY intDate;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>Fecha</th>';
        $strReport .= '<th>Tipo de Cambio</th>';
        $strReport .= '</thead>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intDate'],DTF_11) . '</td>';
            $strReport .= '<td>$ ' . number_format($arrData['decExchangeRate'],2,'.',',') . '</td>';
            $strReport .= '</tr>';
        }
        unset($arrData);
        unset($rstData);
        $strReport .= '</table>';

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);