<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$intIdUser=$_SESSION['intUserID'];
$fecha= date('Ymdhis');
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'getPromotion':
        $jsnPhpScriptResponse = array('promotionList'=>'');

        $strSql="SELECT intId, strName, intUser, strTypeProjection, intQuantity FROM tblForecast WHERE strStatus='A';";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .='<table>';
        $strRespuesta .='<thead>';
        $strRespuesta .='<tr>';
        $strRespuesta .='<th>Id Regla</th>';
        $strRespuesta .='<th>Nombre de Regla de Forecast</th>';
        $strRespuesta .='<th>Creador</th>';
        $strRespuesta .='<th>Periodo de Forecast</th>';
        $strRespuesta .='<th>Cantidad de ' . ( $arrData['strTypeProjection'] == 'M' ? 'Mensual' : ( $arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal')) . ' a Proyectar</th>';
        $strRespuesta .='<th>Edición</th>';
        $strRespuesta .='<th>Eliminar</th>';
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
                $strRespuesta .= '<td>' . $arrData['strName'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['intUser'] . '</td>';
                $strRespuesta .= '<td>' . ( $arrData['strTypeProjection'] == 'M' ? 'Mensual' : ( $arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal')) . '</td>';
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


        $jsnPhpScriptResponse['promotionList'] = $strRespuesta;
        unset($arrData);
        unset($rstData);
        break;
    case 'saveValues':

        $strName = $_REQUEST['strName'];
        $strType = $_REQUEST['strType'];
        $intQuantity = $_REQUEST['intQuantity'];
        $intWarehouse = $_REQUEST['intWarehouse'];
        $intPeriod1 = $_REQUEST['intPeriod1'];
        $decFactor1 = $_REQUEST['decFactor1'];
        $intPeriod2 = $_REQUEST['intPeriod2'];
        $decFactor2 = $_REQUEST['decFactor2'];
        $intPeriod3 = $_REQUEST['intPeriod3'];
        $decFactor3 = $_REQUEST['decFactor3'];
        $intPeriod4 = $_REQUEST['intPeriod4'];
        $decFactor4 = $_REQUEST['decFactor4'];
        $intPeriod5 = $_REQUEST['intPeriod5'];
        $decFactor5 = $_REQUEST['decFactor5'];
        $intPeriod6 = $_REQUEST['intPeriod6'];
        $decFactor6 = $_REQUEST['decFactor6'];
        $intPeriod7 = $_REQUEST['intPeriod7'];
        $decFactor7 = $_REQUEST['decFactor7'];
        $intPeriod8 = $_REQUEST['intPeriod8'];
        $decFactor8 = $_REQUEST['decFactor8'];
        $intPeriod9 = $_REQUEST['intPeriod9'];
        $decFactor9 = $_REQUEST['decFactor9'];
        $intPeriod10 = $_REQUEST['intPeriod10'];
        $decFactor10 = $_REQUEST['decFactor10'];
        $intPeriod11 = $_REQUEST['intPeriod11'];
        $decFactor11 = $_REQUEST['decFactor11'];
        $intPeriod12 = $_REQUEST['intPeriod12'];
        $decFactor12 = $_REQUEST['decFactor12'];
        $intFamily = $_REQUEST['intFamily'];

        /*guardamos el encabezado de la promo en tblPromotionAsc*/
        $strSql="INSERT INTO tblForecast (intUser,strName,strTypeProjection,intQuantity, intWarehouse,strStatus) 
        values ($intIdUser,'$strName','$strType',$intQuantity,$intWarehouse,'A');";
        $rstData = $objAscend->dbInsert($strSql);
        $intForecast=$objAscend->intLastInsertedId;

        /*se recorre el arreglo de la listas seleccionadas y se almacenan en tblPromotionPriceList*/
        $strSql="SELECT intId FROM tblProduct WHERE intFamily=" . $intFamily . " AND strStatus='A';";
        $rstDa=$objAscend->dbQuery($strSql);
        
        foreach($rstDa as $arrDa ){
            $strSql="INSERT INTO tblForecastDetail (intForecast,intPeriod1,decFactor1,intPeriod2,decFactor2,intPeriod3,decFactor3,intPeriod4,decFactor4,intPeriod5,decFactor5,intPeriod6,decFactor6,intPeriod7,decFactor7,intPeriod8,decFactor8,intPeriod9,decFactor9,intPeriod10,decFactor10,intPeriod11,decFactor11,intPeriod12,decFactor12,intProduct,intFamily,intBrand,intGroup)
            values
            ($intForecast,$intPeriod1,$decFactor1,$intPeriod2,$decFactor2,$intPeriod3,$decFactor3,$intPeriod4,$decFactor4,$intPeriod5,$decFactor5,$intPeriod6,$decFactor6,$intPeriod7,$decFactor7,$intPeriod8,$decFactor8,$intPeriod9,$decFactor9,$intPeriod10,$decFactor10,$intPeriod11,$decFactor11,$intPeriod12,$decFactor12,".$arrDa['intId'].",$intFamily,null,null);";
            echo $strSql;
            $rstDa = $objAscend->dbInsert($strSql);
        }


        unset($arrData);
        unset($rstData);
        break;
    case 'getNewPromo':
        $jsnPhpScriptResponse = array('productList'=>'','historyPromotion'=>'','priceList'=>'','strName'=>'','strDiscount'=>'','intDiscount'=>'','intDateFrom'=>'','intDateTo'=>'','strStatus'=>'');

        $intIdPromo = $_REQUEST['intIdPromo'];
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];

            /*si es el detalle de una promoción se muestran los SKU´s que corresponden a la promocion seleccionada*/
            $strSql  = "SELECT P.intId, P.strSKU, P.strPartNumber, FO.intQuantity 
            FROM tblProduct P 
            LEFT JOIN tblFamily F ON P.intFamily = F.intId 
            LEFT JOIN tblBrand B ON P.intBrand = B.intId 
            LEFT JOIN tblGroup G ON P.intGroup = G.intId
            LEFT JOIN tblForecastDetail FD ON FD.intProduct=P.intId
            LEFT JOIN tblForecast FO ON FO.intId=FD.intForecast
            WHERE FO.strStatus='A' AND FD.strStatus='A' AND FD.intForecast=" . $intIdPromo . "; ";

            $rstData = $objAscend->dbQuery($strSql);
            $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .= '<table id="tblProduct">';
            $strRespuesta .= '<thead>';
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<th>SKU</th>';
            $strRespuesta .= '<th>Núm. Parte</th>';
            $projectionQuantity=$rstData['intQuantity'];
            for($i=1;$i<=$projectionQuantity;$i++){
                $strRespuesta .= '<th>Semana</th>';
            }
            $strRespuesta .= '<th>Maximo Semanal</th>';
            $strRespuesta .= '<th>Existencias</th>';
            $strRespuesta .= '<th>Forecast</th>';
            if($intIdPromo!=0){
                $strRespuesta .= '<th>Cantidad a Comprar</th>';
            }
            $strRespuesta .= '</tr>';
            $strRespuesta .= '</thead>';
            $strRespuesta .= '<tbody>';
                foreach ($rstData as $arrData) {
                    $strRespuesta .= '<tr>';
                    $strRespuesta .= '<td>' . $arrData['strSKU'] . '</td>';
                    $strRespuesta .= '<td>' . $arrData['strPartNumber'] . '</td>';
                    $strRespuesta .= '<td>cac</td>';
                    if ($intIdPromo != 0) {
                        $strRespuesta .= '<td>';
                        $strRespuesta .= '<input type="text" id=(' . $intIdPromo . ',' . $arrData['intId'] . ')">';
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
        //fin del pintado de SKUS
        //recuperar info del forecast
        if($intIdPromo!=0){
            $strSql = "SELECT F.strName, F.strTypeProjection, F.intQuantity,FD.intPeriod1,FD.intPeriod2,FD.decFactor1,FD.decFactor2
            FROM tblForecast F 
            LEFT JOIN tblForecastDetail FD ON FD.intForecast=F.intId
            WHERE F.intId = " . $intIdPromo . "
            AND FD.intForecast = " . $intIdPromo . ";";
            $rstData = $objAscend->dbQuery($strSql);
            foreach($rstData as $arrData){
                $jsnPhpScriptResponse['strName'] = $arrData['strName'];
                $jsnPhpScriptResponse['strTypeProjection'] = $arrData['strTypeProjection'];
                $jsnPhpScriptResponse['intQuantity'] = $arrData['intQuantity'];
                $jsnPhpScriptResponse['intPeriod1'] = $arrData['intPeriod1'];
                $jsnPhpScriptResponse['intPeriod2'] = $arrData['intPeriod2'];
                $jsnPhpScriptResponse['decFactor1'] = $arrData['decFactor1'];
                $jsnPhpScriptResponse['decFactor2'] = $arrData['decFactor2'];
            }
        }
        unset($arrData);
        unset($rstData);
        break;
    case 'cancelPromo':
        $intId = $_REQUEST['intId'];
        $strSql="UPDATE tblForecast SET strStatus='C' WHERE intId=$intId;";
        $rstData=$objAscend->dbUpdate($strSql);
        $strSql="UPDATE tblForecastDetail SET strStatus='C' WHERE intForecast=$intId;";
        $rstData=$objAscend->dbUpdate($strSql);

        unset($rstData);
        break;
    
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>