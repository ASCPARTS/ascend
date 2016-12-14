<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
echo "1";
switch ($strProcess) {

    case 'getNewPromo':
        echo "2";
        $jsnPhpScriptResponse = array('productList'=>'','historyPromotion'=>'','priceList'=>'','strName'=>'','strDiscount'=>'','intDiscount'=>'','intDateFrom'=>'','intDateTo'=>'','strStatus'=>'');

        $intIdPromo = $_REQUEST['intIdPromo'];
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];

        if($intIdPromo==0){
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
        }else{
            echo "asd";
            $strSql  = "SELECT P.strSKU, P.strPartNumber, P.strDescription, F.strName as family, B.strName as brand, G.strName as nameGroup 
            FROM tblProduct P 
            LEFT JOIN tblFamily F ON P.intFamily = F.intId 
            LEFT JOIN tblBrand B ON P.intBrand = B.intId 
            LEFT JOIN tblGroup G ON P.intGroup = G.intId
            LEFT JOIN tblPromotionDetail PD ON PD.intProduct=P.intId
            LEFT JOIN tblPromotionAsc PA ON PA.intId=PD.intPromotion 
            WHERE PA.strStatus='A' AND PD.intPromotion=" . $intIdPromo . "; ";
        }
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table id="tblProduct">';
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
            if($intIdPromo==0){
                $strRespuesta .= '<td>';
                $strRespuesta .= '<input id="chk_' . $arrData['intId'] . '" value="' . $arrData['intId'] . '" type="checkbox">';
                $strRespuesta .= '</td>';
            }else{
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelPromo(' . $intIdPromo . ')">Eliminar</button>';
                $strRespuesta .= '</td>';
            }
            $strRespuesta .= '</tr>';
        }
        $strRespuesta .= '</tbody>';
        $strRespuesta .= '</table>';
        $strRespuesta .= '</div>';
        $strRespuesta .= '</div>';
        $jsnPhpScriptResponse['productList'] = $strRespuesta;
        unset($rstData);

        if($intIdPromo!=0){
            $strSql = "SELECT strName, strDiscount, intDiscount, intDateTo, intDateFrom,strStatus FROM tblPromotionAsc WHERE intId = " . $intIdPromo . ";";
            $rstData = $objAscend->dbQuery($strSql);
            foreach($rstData as $arrData){
                $jsnPhpScriptResponse['strName'] = $arrData['strName'];
                $jsnPhpScriptResponse['strDiscount'] = $arrData['strDiscount'];
                $jsnPhpScriptResponse['intDiscount'] = $arrData['intDiscount'];
                $jsnPhpScriptResponse['intDateFrom'] = $objAscend->formatDateTime($arrData['intDateFrom'],DTF_11);
                $jsnPhpScriptResponse['intDateTo'] = $objAscend->formatDateTime($arrData['intDateTo'],DTF_11);
                $jsnPhpScriptResponse['strSatus'] = $arrData['strSatus'];

            }
            $strSql="SELECT U.strName as userCreator, PH.intDateCreation, US.strName as UserModified, PH.intDateModify , UR.strName, PH.intDateCanceled as userCanceled
        FROM tblPromotionHistory PH
        LEFT JOIN tblPromotionAsc PA ON PA.intId=PH.intPromotion
        LEFT JOIN tblUser U ON U.intId= PH.intCreatedBy
        LEFT JOIN tblUser US ON US.intId= PH.intModifyBy
        LEFT JOIN tblUser UR ON UR.intId= PH.intCanceledBy
        WHERE PA.strStatus='A' AND intPromotion= " . $intIdPromo . " ";
            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .='<table>';
            $strRespuesta .='<thead>';
            $strRespuesta .='<tr>';
            $strRespuesta .='<th>Acción</th>';
            $strRespuesta .='<th>Usuario</th>';
            $strRespuesta .='<th>Fecha</th>';
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
                    $strRespuesta .= '<td>' . $arrData['userCreator'] . '</td>';
                    $strRespuesta .= '<td>' . $arrData['strName'] . '</td>';
                    $strRespuesta .= '<td>' . $objAscend->formatDateTime($arrData['intDateCreation'],DTF_11) . '</td>';
                    $strRespuesta .= '</tr>';
                }
            }
            $strRespuesta .='</tbody>';
            $strRespuesta .='</table>';
            $strRespuesta .='</div>';
            $jsnPhpScriptResponse['historyPromotion'] = $strRespuesta;
            unset($rstData);


            $strSql="SELECT PL.strDescription 
            FROM tblPromotionPricetList PPL
            LEFT JOIN tblPricelist PL ON PL.intId=PPL.intPriceList
            WHERE PL.strStatus='A';";
            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .='<table>';
            $strRespuesta .='<thead>';
            $strRespuesta .='<tr>';
            for($x=0; $x=count($rstData); $x++){
                $strRespuesta .='<th>' . $arrData['strDescription'] . '</th>';
            }
            $strRespuesta .='</tr>';
            $strRespuesta .='</thead>';
            $strRespuesta .='<tbody>';
            $strRespuesta .= '<tr>';
            for($x=0; $x=count($rstData); $x++) {
                $strRespuesta .= '<td><input type="checkbox"></td>';
            }
            $strRespuesta .= '</tr>';
            $strRespuesta .='</tbody>';
            $strRespuesta .='</table>';
            $strRespuesta .='</div>';
            $jsnPhpScriptResponse['priceList'] = $strRespuesta;
            unset($rstData);
        }
        break;
    case 'getPromotion':
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
                $strRespuesta .= '<button class="btn btnOverYellow" onclick="getInfoFilter(' . $arrData['intId'] . ')">Editar / Ver</button>';
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
    case 'saveValues':

        $strName = $_REQUEST['strName'];
        $strDiscount = $_REQUEST['strDiscount'];
        $intDiscount = $_REQUEST['intDiscount'];
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strStatus ='A';
        $strSql="INSERT INTO tblPromotionAsc (strName,strDiscount, intDiscount,intDateFrom, intDateTo, strStatus) values ('$strName','$strDiscount',$intDiscount,$intDateFrom,$intDateFrom,'$strStatus');";
        $rstData = $objAscend->dbInsert($strSql);
        break;
};
echo json_encode($jsnPhpScriptResponse);
?>