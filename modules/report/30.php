<?php
/*Catálogo de Artículos con Precio*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Catálogo de Artículos con Precio';
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
        //##### Input SKU
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('numeric','barCodeGray','strSKU','SKU',7,false,0,false,''));
        //##### Input Date
        //array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow','strDate_From','Fecha (de)',0,false,0,false,''));
        //array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow','strDate_To','Fecha (hasta)',0,false,0,false,''));

        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>$strTitle,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $strSKU = trim($_REQUEST['strSKU']);
        //$strDate_From = $_REQUEST['strDate_From'];
        //$strDate_To = $_REQUEST['strDate_To'];


        $strSql = "select P.strSKU as SKU, P.strDescription as Descripcion,P.decPrice as price, F.strNAme as Familia, B.strName as Marca, G.strName as Grupo,cC.strName as Condicion, C.strNAme as Clasee ";
        $strSql .= "FROM tblProduct P ";
        $strSql .= "left join tblFamily F on F.intId=P.intFamily ";
        $strSql .= "left join catClass C on C.intId = P.intClass ";
        $strSql .= "left join tblBrand B on B.intId=P.intBrand ";
        $strSql .= "left join tblGroup G on G.intId=P.intGroup ";
        $strSql .= "left join catCondition cC on cC.intId = P.intCondition ";
        $strSql .="where P.strStatus='A' ";
        if($strSKU!=''){
            $strSql .="AND P.strSKU = " . $strSKU . " ";
        }
        $strSql.= "ORDER BY P.strSKU;";
        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>Descripcion</th>';
        $strReport .= '<th>Precio</th>';
        $strReport .= '<th>Familia</th>';
        $strReport .= '<th>Marca</th>';
        $strReport .= '<th>Grupo</th>';
        $strReport .= '<th>Condicion</th>';
        $strReport .= '<th>Clase</th>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['SKU'] . '</td>';
            $strReport .= '<td>' . $arrData['Descripcion'] . '</td>';
            $strReport .= '<td>$ ' . number_format($arrData['price'],2,'.',',') . '</td>';
            $strReport .= '<td>' . $arrData['Familia'] . '</td>';
            $strReport .= '<td>' . $arrData['Marca'] . '</td>';
            $strReport .= '<td>' . $arrData['Grupo'] . '</td>';
            $strReport .= '<td>' . $arrData['Condicion'] . '</td>';
            $strReport .= '<td>' . $arrData['Clase'] . '</td>';
            $strReport .= '</tr>';
        }
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);