<?php
/*Caracteristicas de Articulos*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

switch ($strProcess) {
    case 'Filter':
        $jsnPhpScriptResponse = array('strTitle'=>'Caracteristicas de Articulos','arrFilters'=>array());
        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divInputText barCodeGray">';
        $strFilter .= '<input type="text" id="strSKU" maxlength="7">';
        $strFilter .= '<label>SKU</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'strSKU','label'=>'SKU','html'=>$strFilter,'type'=>'numeric','negative'=>'','decimalPlaces'=>'','required'=>''));

        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="intFamily">';
        $strFilter .= '<option value="-1">--seleccionar--</option>';
        $sqlResult = 'SELECT intId, strName FROM tblFamily';
        $rstData = $objAscend->dbQuery($sqlResult);
        foreach($rstData as $arrData){
            $strFilter .= '<option value="' . $arrData['intId'] . '">' . $arrData['strName'] . '</option>';
        }
        unset($arrData);
        unset($rstData);
        $strFilter .= '</select>';
        $strFilter .= '<label >Familia</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intFamily','label'=>'Familia','html'=>$strFilter,'type'=>'select','negative'=>'','decimalPlaces'=>'','required'=>''));

        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="intBrand">';
        $strFilter .= '<option value="-1">--seleccionar--</option>';
        $sqlResult = 'SELECT intId, strName FROM tblBrand';
        $rstData = $objAscend->dbQuery($sqlResult);
        foreach($rstData as $arrData){
            $strFilter .= '<option value="' . $arrData['intId'] . '">' . $arrData['strName'] . '</option>';
        }
        unset($arrData);
        unset($rstData);
        $strFilter .= ' </select>';
        $strFilter .= '<label >Marca</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intBrand','label'=>'Marca','html'=>$strFilter,'type'=>'select','negative'=>'','decimalPlaces'=>'','required'=>''));

        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="intGroup">';
        $strFilter .= '<option value="-1">--seleccionar--</option>';
        $sqlResult = 'SELECT intId, strName FROM tblGroup';
        $rstData = $objAscend->dbQuery($sqlResult);
        foreach($rstData as $arrData){
            $strFilter .= '<option value="' . $arrData['intId'] . '">' . $arrData['strName'] . '</option>';
        }
        unset($arrData);
        unset($rstData);
        $strFilter .= '</select>';
        $strFilter .= '<label >Grupo</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intGroup','label'=>'Grupo','html'=>$strFilter,'type'=>'select','negative'=>'','decimalPlaces'=>'','required'=>''));

        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="intClass">';
        $strFilter .= '<option value="-1">--seleccionar--</option>';
        $sqlResult = 'SELECT intId, strName FROM catClass';
        $rstData = $objAscend->dbQuery($sqlResult);
        foreach($rstData as $arrData){
            $strFilter .= '<option value="' . $arrData['intId'] . '">' . $arrData['strName'] . '</option>';
        }
        unset($arrData);
        unset($rstData);
        $strFilter .= '</select>';
        $strFilter .= '<label >Clase</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intClass','label'=>'Clase','html'=>$strFilter,'type'=>'select','negative'=>'','decimalPlaces'=>'','required'=>''));
        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>'','btnXLS'=>true,'btnPDF'=>true,'btnTXT'=>true);
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

        $strReport = '<table>';
        $strReport .= '<tr>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>NumeroParte</th>';
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
        $strReport .= '</tr>';
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
        $strReport .= '</table>';

        echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
//echo json_encode($jsnPhpScriptResponse);