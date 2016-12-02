<?php
/*Caracteristicas de Articulos*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Caracteristicas de Articulos';
$blnPaginated = true;
$blnFreezeHeader = true;
$btnXLS = true;
$btnPDF = true;
$btnTXT = false;

switch ($strProcess) {
    case 'Filter':
        $jsnPhpScriptResponse = array('strTitle'=>$strTitle,'arrFilters'=>array(),'blnPaginated'=>$blnPaginated,'blnFreezeHeader'=>$blnFreezeHeader);

        //##### Function buildFilter
        //$strType: 'numeric' || 'select' || 'date' || 'textwithscore'
        //$strIcon: catalogo imagenes || ''
        //$strName: id del input
        //$strLabel: etiqueta para el input
        //$intMaxLength: longitud maxima || 0=no aplica || 0=ilimitado
        //$blnNegative: si el campo es numerico true=admite negativos || false=no admite negativos
        //$intDecimalPlaces: si el campo es numerico 0=no admite decimales || X=numero de decimales
        //$blnRequired: campo requerido: true=requerido || false=opcional
        //$strSql: sentencia sql para llenar campo tipo select
        //##### Function buildFilter

        //##### Input SKU
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('numeric','barCodeGray','strSKU','SKU',7,false,0,false,''));
        //##### Input Family
        $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblFamily WHERE strStatus = 'A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','groupGray','intFamily','Familia',0,false,0,false,$strSql));
        //##### Input Brand
        $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblBrand WHERE strStatus = 'A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','groupGray','intBrand','Marca',0,false,0,false,$strSql));
        //##### Input Group
        $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblGroup WHERE strStatus = 'A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','groupGray','intGroup','Grupo',0,false,0,false,$strSql));
        //##### Input Class
        $strSql="SELECT intId AS strValue, strName AS strDisplay FROM catClass WHERE strStatus = 'A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','classGray','intClass','Clase',0,false,0,false,$strSql));
        //##### Input Condition
        $strSql="SELECT intId AS strValue, strName AS strDisplay FROM catCondition WHERE strStatus = 'A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','typeGray','intCondition','Condición',0,false,0,false,$strSql));

        break;
    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>'','btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $strSKU = trim($_REQUEST['strSKU']);
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];
        $intClass = $_REQUEST['intClass'];

        $strSql = "SELECT P.intId AS intId, P.strSKU as SKU, P.strPArtNumber as NumeroParte, P.strDescription as Descripcion, F.strName AS Familia, B.strName AS Marca, G.strName AS Grupo, C.strName AS Clase, CO.strName AS Condicion ";
        $strSql .= "FROM tblProduct P ";
        $strSql .= "LEFT JOIN tblFamily F ON P.intFamily = F.intId ";
        $strSql .= "LEFT JOIN tblBrand B ON P.intBrand = B.intId ";
        $strSql .= "LEFT JOIN tblGroup G ON P.intGroup = G.intId ";
        $strSql .= "LEFT JOIN catClass C ON P.intClass = C.intId ";
        $strSql .= "LEFT JOIN catCondition CO ON P.intCondition = CO.intId ";
        $blnWhere = false;
        if($strSKU!=''){
            if($blnWhere){
                $strSql .="AND ";
            }else{
                $strSql .="WHERE ";
                $blnWhere = true;
            }
            $strSql .="P.strSKU = " . $strSKU . " ";
        }
        if($intFamily!=-1){
            if($blnWhere){
                $strSql .="AND ";
            }else{
                $strSql .="WHERE ";
                $blnWhere = true;
            }
            $strSql .="P.intFamily = " . $intFamily . " ";
        }
        if($intBrand!=-1){
            if($blnWhere){
                $strSql .="AND ";
            }else{
                $strSql .="WHERE ";
                $blnWhere = true;
            }
            $strSql .="P.intBrand = " . $intBrand . " ";
        }
        if($intGroup!=-1){
            if($blnWhere){
                $strSql .="AND ";
            }else{
                $strSql .="WHERE ";
                $blnWhere = true;
            }
            $strSql .="P.intGroup = " . $intGroup . " ";
        }
        if($intClass!=-1){
            if($blnWhere){
                $strSql .="AND ";
            }else{
                $strSql .="WHERE ";
                $blnWhere = true;
            }
            $strSql .="P.intClass = " . $intClass . " ";
        }
        $strSql .= "ORDER BY P.strSKU;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>Numero de Parte</th>';
        $strReport .= '<th>Descripcion</th>';
        $strReport .= '<th>Familia</th>';
        $strReport .= '<th>Marca</th>';
        $strReport .= '<th>Grupo</th>';
        $strReport .= '<th>Clase</th>';
        $strReport .= '<th>Condicion</th>';
        $strSql = "SELECT strDescription FROM tblPricelist WHERE strStatus = 'A' ORDER BY intId";
        $rstPriceList = $objAscend->dbQuery($strSql);
        foreach ($rstPriceList as $arrPriceList){
            $strReport .= '<th>' . $arrPriceList['strDescription'] . '</th>';
        }
        unset($arrPriceList);
        unset($rstPriceList);
        $strReport .= '<th style="width: 16px"></th>';
        $strReport .= '</thead>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';
        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['SKU'] . '</td>';
            $strReport .= '<td>' . $arrData['NumeroParte'] . '</td>';
            $strReport .= '<td>' . $arrData['Descripcion'] . '</td>';
            $strReport .= '<td>' . $arrData['Familia'] . '</td>';
            $strReport .= '<td>' . $arrData['Marca'] . '</td>';
            $strReport .= '<td>' . $arrData['Grupo'] . '</td>';
            $strReport .= '<td>' . $arrData['Clase'] . '</td>';
            $strReport .= '<td>' . $arrData['Condicion'] . '</td>';
            $strSql = "SELECT intId FROM tblPricelist WHERE strStatus = 'A' ORDER BY intId";
            $rstPriceList = $objAscend->dbQuery($strSql);
            foreach ($rstPriceList as $arrPriceList){
                $strSql = "SELECT decPrice FROM tblProductPricelist WHERE intProduct = " . $arrData['intId'] . " AND intPriceList = " . $arrPriceList['intId'] . ";";
                $rstPrice = $objAscend->dbQuery($strSql);
                if(count($rstPrice)==0){
                    $strReport .= '<td>N/A</td>';
                }else{
                    foreach ($rstPrice as $arrPrice){
                        $strReport .= '<td>$ ' . number_format($arrPrice['decPrice'],2,'.',',') . '</td>';
                    }
                    unset($arrPrice);
                }
                unset($rstPrice);
            }
            unset($arrPriceList);
            unset($rstPriceList);
            $strReport .= '</tr>';
        }
        unset($arrData);
        unset($rstData);
        $strReport .= '</tbody>';
        $strReport .= '</table>';

        $jsnPhpScriptResponse['strReport'] = $strHeader . $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);