<?php
/*Existencias Artículos con Almacén, Ubicación y Costos*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Existencias Artículos con Almacén, Ubicación y Costos';
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
        //##### Input Periodo
        //$strSql="select intId as strValue, strDescription as strDisplay from catPeriod where strStatus='A';";
        //array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','calendarGray','intPeriod','Periodo',0,false,0,false,$strSql));
        //##### Input Almacen
        $strSql="select intId as strValue, strDescription as strDisplay from catWarehouse where strStatus='A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','companyGray','intWarehouse','Almacen',0,false,0,false,$strSql));

        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>$strTitle,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $intPeriod = trim($_REQUEST['intPeriod']);
        $intWarehouse = $_REQUEST['intWarehouse'];

        $strSql = "select P.strSKU, P.strDescription as description, C.strName as class, WS.intMaximum as maximum, 
F.strName as family, G.strName as nameGroup, B.strName as brand, CO.strName as nameCondition ";
        $strSql .= "from tblProduct P ";
        $strSql .= "LEFT JOIN tblFamily F ON P.intFamily = F.intId ";
        $strSql .= "LEFT JOIN tblBrand B ON P.intBrand = B.intId ";
        $strSql .= "LEFT JOIN tblGroup G ON P.intGroup = G.intId ";
        $strSql .= "LEFT JOIN catClass C ON P.intClass = C.intId ";
        $strSql .= "LEFT JOIN catCondition CO ON P.intCondition = CO.intId ";
        $strSql .= "left join tblWarehouseStock WS on WS.intProduct=P.intId ";
        $strSql .= "where P.strStatus='A' ";
        if(intWarehouse!=-1){
            $strSql .="AND WS.intId = " . $intWarehouse . " ";
        }
        $strSql .= "ORDER BY P.strSKU;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>Descripción</th>';
        $strReport .= '<th>Clase</th>';
        $strReport .= '<th>Maximo</th>';
        $strReport .= '<th>Familia</th>';
        $strReport .= '<th>Grupo</th>';
        $strReport .= '<th>Marca</th>';
        $strReport .= '<th>Condicion</th>';
        $strSql = "SELECT strDescription FROM catWarehouse WHERE strStatus = 'A' ORDER BY intId";
        $rstPriceList = $objAscend->dbQuery($strSql);
        foreach ($rstWarehouse as $arrWarehouse){
            $strReport .= '<th>' . $arrWarehouse['strDescription'] . '</th>';
        }
        unset($arrWarehouse);
        unset($rstWarehouse);
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['strSKU'] . '</td>';
            $strReport .= '<td>' . $arrData['description'] . '</td>';
            $strReport .= '<td>' . $arrData['class'] . '</td>';
            $strReport .= '<td>' . $arrData['maximum'] . '</td>';
            $strReport .= '<td>' . $arrData['family'] . '</td>';
            $strReport .= '<td>' . $arrData['nameGroup'] . '</td>';
            $strReport .= '<td>' . $arrData['brand'] . '</td>';
            $strReport .= '<td>' . $arrData['nameCondition'] . '</td>';
            $strSql = "SELECT intId FROM catWarehouse WHERE strStatus = 'A' ORDER BY intId ";
            $rstPriceList = $objAscend->dbQuery($strSql);
            foreach ($rstWarehouse as $arrWarehouse){
                $strSql = "SELECT intStock FROM tblWarehouseStock WHERE intProduct = " . $arrData['intId'] . " AND intWarehouse = " . $arrWarehouse['intId'] . ";";
                $rstWarehouse = $objAscend->dbQuery($strSql);
                if(count($rstWarehouse)==0){
                    $strReport .= '<td>N/A</td>';
                }else{
                    foreach ($rstWarehouse as $arrWarehouse){
                        $strReport .= '<td>$ ' . number_format($arrWarehouse['decPrice'],2,'.',',') . '</td>';
                    }
                    unset($arrPrice);
                }
                unset($rstPrice);
            }
            unset($arrPriceList);
            unset($rstPriceList);
            $strReport .= '</tr>';
        }
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);