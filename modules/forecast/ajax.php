<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$intIdUser=$_SESSION['intUserID'];
$fecha= date('Ymdhis');
$strProcess = $_REQUEST['strProcess'];

switch ($strProcess) {
    case 'getForecast':
        $jsnPhpScriptResponse = array('forecast'=>'');
        $strSql="SELECT intId, intUser, strTypeProjection, intQuantity FROM tblForecast WHERE strStatus='A';";
        $rstData=$objAscend->dbQuery($strSql);
        $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .='<table>';
        $strRespuesta .='<thead>';
        $strRespuesta .='<tr>';
        $strRespuesta .='<th>Id Forecast</th>';
        $strRespuesta .='<th>Usuario Creador</th>';
        $strRespuesta .='<th>Tipo de Proyección</th>';
        $strRespuesta .='<th>Cantidad ' . ( $arrData['strTypeProjection'] == 'M' ? 'Mensual' : ( $arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal' ) ) . ' a proyectar</th>';
        $strRespuesta .='</tr>';
        $strRespuesta .='</thead>';
        $strRespuesta .='<tbody>';
        if(count($rstData)==0){
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td colspan="100" style="text-align: center">- NO EXISTEN REGISTROS -</td>';
            $strRespuesta .= '</tr>';
        }else{
            foreach($rstData as $arrData){
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>' . $arrData['intId'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['intUser'] . '</td>';
                $strRespuesta .= '<td>' . ( $arrData['strTypeProjection'] == 'M' ? 'Mensual' : ( $arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal' ) ) . '</td>';
                $strRespuesta .= '<td>' . $arrData['intQuantity'] . '</td>';
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


        $jsnPhpScriptResponse['forecast'] = $strRespuesta;
        unset($arrData);
        unset($rstData);
        break;
    case 'productList':
        $intIdForecast = $_REQUEST['intIdForecast'];
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];

        $jsnPhpScriptResponse = array('productList'=>'');

        if($intIdForecast==0){
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

        }
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table id="tblProduct">';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        if($intIdForecast==0){
            $strRespuesta .= '<th>Seleccionar</th>';
        }
        $strRespuesta .= '<th>SKU</th>';
        $strRespuesta .= '<th>Núm. Parte</th>';
        $strRespuesta .= '<th>Descripción</th>';
        $strRespuesta .= '<th>Familia</th>';
        $strRespuesta .= '<th>Marca</th>';
        $strRespuesta .= '<th>Grupo</th>';
        if($intIdForecast!=0){
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
                    $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelProduct(' . $intIdForecast . ',' . $arrData['intId'] . ')">Eliminar</button>';
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
        break;
    case 'saveValues':
        $strName = $_REQUEST['strName'];
        $strType = $_REQUEST['strType'];
        $intQuantity = $_REQUEST['intQuantity'];
        $intPeriod1 = $_REQUEST['intPeriod1'];
        $decFactor1 = $_REQUEST['decFactor1'];
        $intPeriod2 = $_REQUEST['intPeriod2'];
        $decFactor2 = $_REQUEST['decFactor2'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];
        $strStatus ='A';
        $rstchkSKU=explode("|",$chkListSKU);
       /*guardamos el encabezado de la promo en tblPromotionAsc*/
        $strSql="INSERT INTO tblForecast (strName,intUser,strTypeProjection,intQuantity, strStatus) 
        values ('$strName',$intIdUser,'$strType',$intQuantity,'$strStatus');";
        $rstData = $objAscend->dbInsert($strSql);
        $intForecast=$objAscend->intLastInsertedId;

        /*se recorre el arreglo de los SKU's seleccionados y se almacenan en tblPromotionDetail*/
        if(!empty($chkListSKU)) {
            foreach($rstchkSKU as $arrchkSKU ){
                $strSql="INSERT INTO tblForecastDetail (intForecast,strName,intPeriod1, intPeriod2,decFactor1,decFactor2,intProduct,intFamily,intBrand,intGroup,strStatus) 
                values ($intForecast,'$strName',$intPeriod1,$intPeriod2,$decFactor1,$decFactor2,$arrchkSKU,$intFamily,$intBrand,$intGroup,'$strStatus');";
                echo $strSql;
                $rstData = $objAscend->dbInsert($strSql);
            }
        }
        unset($arrData);
        unset($rstData);
        break;

};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>