<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$intIdUser=$_SESSION['intUserID'];
$fecha= date('Ymdhis');
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {

    case 'getNewPromo':
        $jsnPhpScriptResponse = array('productList'=>'','historyPromotion'=>'','priceList'=>'','strName'=>'','strDiscount'=>'','intDiscount'=>'','intDateFrom'=>'','intDateTo'=>'','strStatus'=>'');

        $intIdPromo = $_REQUEST['intIdPromo'];
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];

        if($intIdPromo==0){
            /*Si es una nueva promocion se muestra la lista de SKU's activos para poner en promocion*/
            $strSql  = "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName as family, B.strName as brand, G.strName as nameGroup ";
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
            /*si es el detalle de una promoción se muestran los SKU´s que corresponden a la promocion seleccionada*/
            $strSql  = "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName as family, B.strName as brand, G.strName as nameGroup 
            FROM tblProduct P 
            LEFT JOIN tblFamily F ON P.intFamily = F.intId 
            LEFT JOIN tblBrand B ON P.intBrand = B.intId 
            LEFT JOIN tblGroup G ON P.intGroup = G.intId
            LEFT JOIN tblPromotionDetail PD ON PD.intProduct=P.intId
            LEFT JOIN tblPromotionAsc PA ON PA.intId=PD.intPromotion 
            WHERE PA.strStatus='A' AND PD.strStatus='A' AND PD.intPromotion=" . $intIdPromo . "; ";
        }
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table id="tblProduct">';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        if($intIdPromo==0){
            $strRespuesta .= '<th>Seleccionar</th>';
        }
        $strRespuesta .= '<th>SKU</th>';
        $strRespuesta .= '<th>Núm. Parte</th>';
        $strRespuesta .= '<th>Descripción</th>';
        $strRespuesta .= '<th>Familia</th>';
        $strRespuesta .= '<th>Marca</th>';
        $strRespuesta .= '<th>Grupo</th>';
        if($intIdPromo!=0){
            $strRespuesta .= '<th>Seleccionar</th>';
        }
        $strRespuesta .= '</tr>';
        $strRespuesta .= '</thead>';
        $strRespuesta .= '<tbody>';
        if(count($rstData)==0){
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td colspan="100" style="text-align: center">- NO EXISTEN REGISTROS -</td>';
            $strRespuesta .= '</tr>';
        }else {
            foreach ($rstData as $arrData) {
                $strRespuesta .= '<tr>';
                if ($intIdPromo == 0) {
                    $strRespuesta .= '<td>';
                    $strRespuesta .= '<input id="chkProduct" class="chbListSKU" value="' . $arrData['intId'] . '" type="checkbox">';
                    $strRespuesta .= '</td>';
                }
                $strRespuesta .= '<td>' . $arrData['strSKU'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['strPartNumber'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['strDescription'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['family'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['brand'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['nameGroup'] . '</td>';
                if ($intIdPromo != 0) {
                    $strRespuesta .= '<td>';
                    $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelProduct(' . $intIdPromo . ',' . $arrData['intId'] . ')">Eliminar</button>';
                    $strRespuesta .= '</td>';
                }
                $strRespuesta .= '</tr>';
            }
        }
            $strRespuesta .= '</tbody>';
            $strRespuesta .= '</table>';
            $strRespuesta .= '</div>';
            $strRespuesta .= '</div>';

        $jsnPhpScriptResponse['productList'] = $strRespuesta;
        unset($rstData);

        if($intIdPromo==0){
            $strSql="SELECT PL.intId, PL.strDescription 
            FROM tblPricelist PL
            WHERE PL.strStatus='A';";
            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .='<table>';
            $strRespuesta .='<thead>';
            $strRespuesta .='<tr>';
            foreach($rstData as $arrData){
                $strRespuesta .='<th>' . $arrData['strDescription'] . '</th>';
            }
            $strRespuesta .='</tr>';
            $strRespuesta .='</thead>';
            $strRespuesta .='<tbody>';
            $strRespuesta .= '<tr>';
            foreach($rstData as $arrData){
                $strRespuesta .= '<td><input id="chkList" class="chbList" value="' . $arrData['intId'] . '" type="checkbox"></td>';
            }
            $strRespuesta .= '</tr>';
            $strRespuesta .='</tbody>';
            $strRespuesta .='</table>';
            $strRespuesta .='</div>';
            $jsnPhpScriptResponse['priceList'] = $strRespuesta;
            unset($rstData);
        }else{
            $strSql="SELECT PL.intId, PL.strDescription 
            FROM tblPricelist PL
            WHERE PL.strStatus='A';";
            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .='<table>';
            $strRespuesta .='<thead>';
            $strRespuesta .='<tr>';
            foreach($rstData as $arrData){
                $strRespuesta .='<th>' . $arrData['strDescription'] . '</th>';
            }
            $strRespuesta .='</tr>';
            $strRespuesta .='</thead>';
            $strRespuesta .='<tbody>';
            $strRespuesta .= '<tr>';
            $strSql="SELECT intPriceList FROM tblPromotionPriceList WHERE intPromotion =".$intIdPromo.";";
            $rstDa=$objAscend->dbQuery($strSql);
            foreach($rstData as $arrData){
                $flagList = false;
                foreach ($rstDa as $arrDa){
                    if( $arrData['intId']==$arrDa['intPriceList']){
                        $flagList = true;
                    }
                }
                $strRespuesta .= '<td><input id="chkList" class="chbList" value="' . $arrData['intId'] . '" type="checkbox" '.( $flagList ? 'checked': '').'></td>';
            }
            $strRespuesta .= '</tr>';
            $strRespuesta .='</tbody>';
            $strRespuesta .='</table>';
            $strRespuesta .='</div>';
            $jsnPhpScriptResponse['priceList'] = $strRespuesta;
            unset($rstData);
            unset($arrData);
        }
        if($intIdPromo!=0){
            $strSql = "SELECT strName, strDiscount, intDiscount, intDateTo, intDateFrom,strStatus FROM tblPromotionAsc WHERE intId = " . $intIdPromo . ";";
            $rstData = $objAscend->dbQuery($strSql);
            foreach($rstData as $arrData){
                $jsnPhpScriptResponse['strName'] = $arrData['strName'];
                $jsnPhpScriptResponse['strDiscount'] = $arrData['strDiscount'];
                $jsnPhpScriptResponse['intDiscount'] = $arrData['intDiscount'];
                $jsnPhpScriptResponse['intDateFrom'] = $objAscend->formatDateTime($arrData['intDateFrom'],DTF_11);
                $jsnPhpScriptResponse['intDateTo'] = $objAscend->formatDateTime($arrData['intDateTo'],DTF_11);
                $jsnPhpScriptResponse['strStatus'] = $arrData['strStatus'];
            }
            $strSql="SELECT PH.intPromotion, U.strName, PH.intDate, PH.strAction
            FROM tblPromotionHistory PH
            LEFT JOIN tblPromotionAsc PA ON PA.intId=PH.intPromotion
            LEFT JOIN tblUser U ON U.intId= PH.intUser
            WHERE PA.strStatus='A'
            AND intPromotion= " . $intIdPromo . "
            ORDER BY PH.intDate;";
            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .='<table>';
            $strRespuesta .='<thead>';
            $strRespuesta .='<tr>';
            $strRespuesta .='<th>Usuario</th>';
            $strRespuesta .='<th>Fecha</th>';
            $strRespuesta .='<th>Acción</th>';
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
                    $strRespuesta .= '<td>' . $arrData['strName'] . '</td>';
                    $strRespuesta .= '<td>' . $objAscend->formatDateTime($arrData['intDate'],DTF_11) . '</td>';
                    $strRespuesta .= '<td>' . ( $arrData['strAction'] == 'N' ? 'Creador' : ($arrData['strAction'] == 'M' ? 'Modifico' : 'Cancelo') ) . '</td>';
                    $strRespuesta .= '</tr>';
                }


            }
            $strRespuesta .='</tbody>';
            $strRespuesta .='</table>';
            $strRespuesta .='</div>';
            $jsnPhpScriptResponse['historyPromotion'] = $strRespuesta;
        }
        unset($arrData);
        unset($rstData);
        break;
    case 'getPromotion':
        $jsnPhpScriptResponse = array('promotionList'=>'');
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strStatus = $_REQUEST['strStatus'];
        $strSql="SELECT intId, strName, intDateTo, intDateFrom, strDiscount, intDiscount, strStatus 
        FROM tblPromotionAsc WHERE strStatus=$strStatus AND intDateFrom >= ".$intDateFrom." AND intDateTo <= ".$intDateTo.";";
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
                $strRespuesta .= '<td>' . ( $arrData['strDiscount'] == 1 ? 'Porcentaje' : 'Valor Monetario') . '</td>';
                $strRespuesta .= '<td>' . $arrData['intDiscount'] . '</td>';
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnOverYellow" onclick="getInfoFilter(' . $arrData['intId'] . ')">Editar / Ver</button>';
                $strRespuesta .= '</td>';
                if($arrData['strStatus']=='A'){
                    $strRespuesta .= '<td>';
                    $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelPromo(' . $arrData['intId'] . ')">Cancelar</button>';
                    $strRespuesta .= '</td>';
                }else{
                    $strRespuesta .= '<td>';
                    $strRespuesta .= '<label>Cancelada</label>';
                    $strRespuesta .= '</td>';
                }

                $strRespuesta .= '</tr>';
            }
        }
        $strRespuesta .='</tbody>';
        $strRespuesta .='</table>';
        $strRespuesta .='</div>';


        $jsnPhpScriptResponse['promotionList'] = $strRespuesta;
        unset($arrData);
        unset($rstData);
        break;
    case 'saveValues':
        $strName = $_REQUEST['strName'];
        $strDiscount = $_REQUEST['strDiscount'];
        $intDiscount = $_REQUEST['intDiscount'];
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $chkList = $_REQUEST['chkList'];
        $chkListSKU = $_REQUEST['chkListSKU'];
        $strStatus ='A';
        $rstchk=explode("|",$chkList);
        $rstchkSKU=explode("|",$chkListSKU);
        /*guardamos el encabezado de la promo en tblPromotionAsc*/
        $strSql="INSERT INTO tblPromotionAsc (strName,strDiscount, intDiscount,intDateFrom, intDateTo, strStatus) values ('$strName','$strDiscount',$intDiscount,$intDateFrom,$intDateTo,'$strStatus');";
        $rstData = $objAscend->dbInsert($strSql);
        $intPromotion=$objAscend->intLastInsertedId;
        /*se recorre el arreglo de la listas seleccionadas y se almacenan en tblPromotionPriceList*/
        if(!empty($chkList)) {
            foreach($rstchk as $arrchk ){
                $strSql="INSERT INTO tblPromotionPriceList (intPromotion,intPriceList) values ($intPromotion,$arrchk);";
                $rstData = $objAscend->dbInsert($strSql);
            }
        }
        /*se recorre el arreglo de los SKU's seleccionados y se almacenan en tblPromotionDetail*/
        if(!empty($chkListSKU)) {
            foreach($rstchkSKU as $arrchkSKU ){
                $strSql="INSERT INTO tblPromotionDetail (intPromotion,intProduct, strStatus) values ($intPromotion,$arrchkSKU,'$strStatus');";
                $rstData = $objAscend->dbInsert($strSql);
            }
        }
        $strSql="INSERT tblPromotionHistory (intPromotion, intUser, intDate, strAction) 
        VALUES ($intPromotion,$intIdUser,$fecha,'N');";
        $rstUser=$objAscend->dbInsert($strSql);
        unset($arrData);
        unset($rstData);
        break;
    case 'cancelSKU':
        $intIdPromo = $_REQUEST['intIdPromo'];
        $intId = $_REQUEST['intId'];
        $strSql="UPDATE tblPromotionDetail SET strStatus='C' WHERE intPromotion=" . $intIdPromo . " AND intProduct=" . $intId . ";";
        $rstData=$objAscend->dbUpdate($strSql);


        $strSql="SELECT COUNT(*) AS REGS FROM tblPromotionDetail WHERE intPromotion=" . $intIdPromo . " AND strStatus='A';";
        $rstData=$objAscend->dbQuery($strSql);
        foreach ($rstData as $arrData){
            if($arrData['REGS']==0){
                $strSql="UPDATE tblPromotionAsc SET strStatus='C' WHERE intId=" . $intIdPromo . ";";
                $rstData=$objAscend->dbUpdate($strSql);
            }
        }
        unset($arrData);
        unset($rstData);
        break;
    case 'cancelPromo':
        $intId = $_REQUEST['intId'];
        $strSql="UPDATE tblPromotionAsc SET strStatus='C' WHERE intId=$intId;";
        $rstData=$objAscend->dbUpdate($strSql);
        $strSql="UPDATE tblPromotionDetail SET strStatus='C' WHERE intPromotion=$intId;";
        $rstData=$objAscend->dbUpdate($strSql);

        unset($rstData);
        break;
    case 'updatePromo':
        $intIdPromo = $_REQUEST['intIdPromo'];
        $strName = $_REQUEST['strName'];
        $strDiscount = $_REQUEST['strDiscount'];
        $intDiscount = $_REQUEST['intDiscount'];
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strSql="UPDATE tblPromotionAsc SET strName='$strName', strDiscount='$strDiscount', intDiscount=$intDiscount, intDateFrom=$intDateFrom, intDateTo=$intDateTo, strStatus='A' 
        WHERE intId =".$intIdPromo.";";
        $strData=$objAscend->dbUpdate($strSql);

        $strSql="INSERT tblPromotionHistory (intPromotion, intUser, intDate, strAction) 
        VALUES ($intIdPromo,$intIdUser,$fecha,'M');";
        $rstUser=$objAscend->dbInsert($strSql);
        unset($rstData);
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>