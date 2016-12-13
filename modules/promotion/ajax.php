<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'newPromo':
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];
        $jsnPhpScriptResponse = array('productList'=>'');
        $strSql  = "SELECT P.strSKU, P.strPartNumber, P.strDescription, F.strName as family, B.strName as brand, G.strName as nameGroup ";
        $strSql .= "FROM tblProduct P ";
        $strSql .= "LEFT JOIN tblFamily F ON P.intFamily = F.intId ";
        $strSql .= "LEFT JOIN tblBrand B ON P.intBrand = B.intId ";
        $strSql .= "LEFT JOIN tblGroup G ON P.intGroup = G.intId ";
        $strSql .= " WHERE P.strStatus='A' " ;
        if($strSKU!=''){
            $strSql .="AND P.strSKU = " . $strSKU . " ";
        }
        if($strPartNumber!=''){
            $strSql .="AND P.strPartNumber LIKE '%" . $strPartNumber . "%' ";
        }
        if($intFamily!=-1){
            $strSql .="AND P.intFamily = " . $intFamily . " ";
        }
        if($intBrand!=-1){
            $strSql .="AND P.intBrand = " . $intBrand . " ";
        }
        if($intGroup!=-1){
            $strSql .="AND P.intGroup = " . $intGroup . " ";
        }
        $strSql .= " ORDER BY P.strSKU;";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table>';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        $strRespuesta .= '<th>SKU</th>';
        $strRespuesta .= '<th>Núm. Parte</th>';
        $strRespuesta .= '<th>Descripción</th>';
        $strRespuesta .= '<th>Familia</th>';
        $strRespuesta .= '<th>Marca</th>';
        $strRespuesta .= '<th>Grupo</th>';
        $strRespuesta .= '<th>Seleccionar</th>';
        $strRespuesta .= '</tr>';
        $strRespuesta .= '</thead>';
        $strRespuesta .= '<tbody>';
        foreach($rstData as $arrData) {
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td>' . $arrData['strSKU'] . '</td>';
            $strRespuesta .= '<td>' . $arrData['strPartNumber'] . '</td>';
            $strRespuesta .= '<td>' . $arrData['strDescription'] . '</td>';
            $strRespuesta .= '<td>' . $arrData['family'] . '</td>';
            $strRespuesta .= '<td>' . $arrData['brand'] . '</td>';
            $strRespuesta .= '<td>' . $arrData['nameGroup'] . '</td>';
            $strRespuesta .= '<td>';
            $strRespuesta .= '';
            $strRespuesta .= '</td>';
            $strRespuesta .= '</tr>';
        }
        $strRespuesta .= '</tbody>';
        $strRespuesta .= '</table>';
        $strRespuesta .= '</div>';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '</div>';
        $jsnPhpScriptResponse['productList'] = $strRespuesta;
        unset($rstData);
        break;
    case 'promotion':
        $jsnPhpScriptResponse = array('promotionList'=>'');
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strStatus = $_REQUEST['strStatus'];
        $strSql="SELECT intId, strName, intDateTo, intDateFrom, strDiscount, intDiscount FROM tblPromotionAsc WHERE strStatus IN (" . $strStatus . ");";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .='<table>';
        $strRespuesta .='<thead>';
        $strRespuesta .='<tr>';
        $strRespuesta .='<th>Id Promoción</th>';
        $strRespuesta .='<th>Nombre de Promoción</th>';
        $strRespuesta .='<th>Fecha Inicio</th>';
        $strRespuesta .='<th>Fecha Fin</th>';
        $strRespuesta .='<th>Tipo de Descuento</th>';
        $strRespuesta .='<th>Total de Descuento</th>';
        $strRespuesta .='<th>Edición</th>';
        $strRespuesta .='<th>Cancelar</th>';
        $strRespuesta .='</tr>';
        $strRespuesta .='</thead>';
        $strRespuesta .='<tbody>';
        if(count($rstData)==0){
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td colspan="100" style="text-align: center">- NO EXISTEN REGISTROS -</td>';
            $strRespuesta .= '</tr>';
        }else{
            foreach($rstData as $arrData) {
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>' . $arrData['intId'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['strName'] . '</td>';
                $strRespuesta .= '<td>' . $objAscend->formatDateTime($arrData['intDateTo'],DTF_11) . '</td>';
                $strRespuesta .= '<td>' . $objAscend->formatDateTime($arrData['intDateFrom'],DTF_11) . '</td>';
                $strRespuesta .= '<td>' . $arrData['strDiscount'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['intDiscount'] . '</td>';
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnOverYellow" onclick="getProductList(' . $arrData['intId'] . ')">Editar / Ver</button>';
                $strRespuesta .= '</td>';
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelPromo(' . $arrData['intId'] . ')">Cancelar</button>';
                $strRespuesta .= '</td>';
                $strRespuesta .= '</tr>';
            }

        }
        $strRespuesta .='</tbody>';
        $strRespuesta .='</table>';
        $strRespuesta .='</div>';


        $jsnPhpScriptResponse['promotionList'] = $strRespuesta;
        unset($rstData);
        break;

};
echo json_encode($jsnPhpScriptResponse);
?>