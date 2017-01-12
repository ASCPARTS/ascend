<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$intIdUser=$_SESSION['intUserID'];
$fecha= date('Ymdhis');
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'getPromotion':
        $jsnPhpScriptResponse = array('promotionList' => '');

        $strSql = "SELECT intId, strName, intUser, strTypeProjection, intQuantity FROM tblForecast WHERE strStatus='A';";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table>';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        $strRespuesta .= '<th>Id Regla</th>';
        $strRespuesta .= '<th>Nombre de Regla de Forecast</th>';
        $strRespuesta .= '<th>Creador</th>';
        $strRespuesta .= '<th>Periodo de Forecast</th>';
        $strRespuesta .= '<th>Cantidad de ' . ($arrData['strTypeProjection'] == 'M' ? 'Mensual' : ($arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal')) . ' a Proyectar</th>';
        $strRespuesta .= '<th>Edición</th>';
        $strRespuesta .= '<th>Eliminar</th>';
        $strRespuesta .= '</tr>';
        $strRespuesta .= '</thead>';
        $strRespuesta .= '<tbody>';
        if (count($rstData) == 0) {
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td colspan="100" style="text-align: center">- NO EXISTEN REGISTROS -</td>';
            $strRespuesta .= '</tr>';
        } else {
            foreach ($rstData as $arrData) {
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>' . $arrData['intId'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['strName'] . '</td>';
                $strRespuesta .= '<td>' . $arrData['intUser'] . '</td>';
                $strRespuesta .= '<td>' . ($arrData['strTypeProjection'] == 'M' ? 'Mensual' : ($arrData['strTypeProjection'] == 'Q' ? 'Quincenal' : 'Semanal')) . '</td>';
                $strRespuesta .= '<td>' . $arrData['intQuantity'] . '</td>';
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnOverYellow" onclick="getInfoFilter(' . $arrData['intId'] . ')">Ver</button>';
                $strRespuesta .= '</td>';
                $strRespuesta .= '<td>';
                $strRespuesta .= '<button class="btn btnBrandRed" onclick="cancelPromo(' . $arrData['intId'] . ')">Cancelar</button>';
                $strRespuesta .= '</td>';
                $strRespuesta .= '</tr>';
            }
        }
        $strRespuesta .= '</tbody>';
        $strRespuesta .= '</table>';
        $strRespuesta .= '</div>';


        $jsnPhpScriptResponse['promotionList'] = $strRespuesta;
        unset($arrData);
        unset($rstData);
        break;
    case 'saveValues':

        $strName = $_REQUEST['strName'];
        $strType = $_REQUEST['strType'];
        $intQuantity = $_REQUEST['intQuantity'];
        $intWarehouse = $_REQUEST['intWarehouse'];
        $intFamily = $_REQUEST['intFamily'];
        $intArrLength = $_REQUEST['intArrLength'];

        /*guardamos el encabezado de la promo en tblForecast*/
        $strSql = "INSERT INTO tblForecast (intUser,strName,strTypeProjection,intQuantity, intWarehouse,strStatus) 
        values ($intIdUser,'$strName','$strType',$intQuantity,$intWarehouse,'A');";
        $rstData = $objAscend->dbInsert($strSql);
        $intForecast = $objAscend->intLastInsertedId;

        /*guardamos los periodos en tblForecastPeriod*/

        for ($i=0; $i<$intArrLength; $i++){
            $intPeriod = $_REQUEST['intPeriod' . $i];
            $decFactor = $_REQUEST['decFactor' . $i];
            $strSql = "INSERT INTO tblForecastPeriod (intForecast,intPeriod,decFactor,strStatus) values (" . $intForecast . "," . $intPeriod . "," . $decFactor . ",'A');";
            $rstDa = $objAscend->dbInsert($strSql);
        }

        /*se recorre el arreglo de la listas seleccionadas y se almacenan en tblForecastProduct*/
        $strSql = "SELECT intId FROM tblProduct WHERE intFamily=" . $intFamily . " AND strStatus='A';";
        $rstDa = $objAscend->dbQuery($strSql);
        foreach ($rstDa as $arrDa) {
            $strSql = "INSERT INTO tblForecastProduct (intForecast,intProduct,intFamily,intBrand,intGroup) values ($intForecast," . $arrDa['intId'] . ",$intFamily,null,null);";
            $rstDa = $objAscend->dbInsert($strSql);
        }

        unset($arrData);
        unset($rstData);
        break;
    case 'getNewPromo':
        $jsnPhpScriptResponse = array('productList' => '', 'priceList' => '','periodList'=>'');

        $intIdForecast = $_REQUEST['intIdForecast'];
        $strSKU = trim($_REQUEST['strSKU']);
        $strPartNumber = $_REQUEST['strPartNumber'];
        $intFamily = $_REQUEST['intFamily'];
        $intBrand = $_REQUEST['intBrand'];
        $intGroup = $_REQUEST['intGroup'];


        if ($intIdForecast > 0) {

        $strSql = "SELECT intId,intUser,strName,strTypeProjection,intQuantity,intWarehouse,strStatus FROM tblForecast WHERE strStatus='A' AND intId=".$intIdForecast.";";
        $rstForecast = $objAscend->dbQuery($strSql);
            foreach ($rstForecast as $arrForecast) {
                $jsnPhpScriptResponse['strName'] = $arrForecast['strName'];
                $jsnPhpScriptResponse['strTypeProjection'] = $arrForecast['strTypeProjection'];
                $jsnPhpScriptResponse['intQuantity'] = $arrForecast['intQuantity'];
                $jsnPhpScriptResponse['intWarehouse'] = $arrForecast['intWarehouse'];
            }
        $weekProjection=$rstForecast['intQuantiy'];
        unset($arrForecast);

        $strSql="SELECT intId,intPeriod, decFactor FROM tblForecastPeriod WHERE strStatus='A' AND intForecast = ".$intIdForecast.";";
        $rstPeriodFactor=$objAscend->dbQuery($strSql);
        $strRespuesta = '';
            foreach ($rstPeriodFactor as $arrPeriodFactor){
                $strRespuesta .="<div class='row'>";
                $strRespuesta .= "<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>" ;
                $strRespuesta .="<div class='divInputText calendarYellow'>" ;
                $strRespuesta .="<input type='text' name='intPeriod' value='$arrPeriodFactor[intPeriod]' disabled>" ;
                $strRespuesta .="<label>Periodo</label>" ;
                $strRespuesta .="</div>" ;
                $strRespuesta .="</div>" ;
                $strRespuesta .="<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>" ;
                $strRespuesta .="<div class='divInputText numberYellow'>" ;
                $strRespuesta .= "<input type='text' name='decFactor' id='decFactor' value='$arrPeriodFactor[decFactor]' disabled>" ;
                $strRespuesta .="<label>Factor</label>" ;
                $strRespuesta .="</div>" ;
                $strRespuesta .="</div>" ;
                $strRespuesta .="</div>" ;
            }
            $jsnPhpScriptResponse['periodList'] = $strRespuesta;
            unset($rstPeriodFactor);
            unset($arrPeriodFactor);

        /*si es el detalle de una promoción se muestran los SKU´s que corresponden a la promocion seleccionada*/
        $strSql = "SELECT P.intId, P.strSKU, P.strPartNumber, WS.intStock
        FROM tblProduct P
        LEFT JOIN tblFamily F ON P.intFamily = F.intId 
        LEFT JOIN tblBrand B ON P.intBrand = B.intId
        LEFT JOIN tblGroup G ON P.intGroup = G.intId
        LEFT JOIN tblForecastProduct FP ON FP.intProduct=P.intId
        LEFT JOIN tblForecast FO ON FO.intId=FP.intForecast
        LEFT JOIN catWarehouse CW ON CW.intId=FO.intWarehouse
        LEFT JOIN tblWarehouseStock WS ON WS.intId= CW.intId
        WHERE WS.intId=FO.intWarehouse AND FO.strStatus='A' AND FP.intForecast=" . $intIdForecast . "; ";
        $rstSKU = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table id="tblProduct">';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        $strRespuesta .= '<th>SKU</th>';
        $strRespuesta .= '<th>Núm. Parte</th>';
        $strSql="SELECT I.intCreationDate as nMonth, SUM(DD.decAmount) as totalMonth
        FROM tblInvoice I
        LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
        LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
        LEFT JOIN tblDocument D ON D.intId=DD.intDocument
        LEFT JOIN tblUser U ON U.intId=D.intCreator
        LEFT JOIN catZone Z ON Z.intId = U.intZone
        WHERE I.strStatus='A'
        GROUP BY nMonth
        ORDER BY nMonth
        LIMIT $rstForecast[intQuantity];";
        $rstSalesTotal=$objAscend->dbQuery($strSql);
            foreach($rstSalesTotal as $arrSalesTotal){
                $semana = date('W',  mktime(0,0,0,$mes,$dia,$anio));
                $strRespuesta .= '<th>'.$semana.'</th>';
            }
        unset($arrQuantity);
        $strRespuesta .= '<th>Maximo Semanal</th>';
        $strRespuesta .= '<th>Existencias</th>';
        $strRespuesta .= '<th>Forecast</th>';
        $strRespuesta .= '<th>Cantidad a Comprar</th>';
        $strRespuesta .= '</tr>';
        $strRespuesta .= '</thead>';
        $strRespuesta .= '<tbody>';
        foreach ($rstSKU as $arrSKU) {
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td>' . $arrSKU['strSKU'] . '</td>';
            $strRespuesta .= '<td>' . $arrSKU['strPartNumber'] . '</td>';

            $strRespuesta .= '<td>total vendido semana</td>';

        $strSql="SELECT intPeriod, decFactor FROM tblForecastPeriod WHERE intForecast=".$intIdForecast.";";
        $rstSales=$objAscend->dbQuery($strSql);

            $strRespuesta .= '<td>MS</td>';
            $strRespuesta .= '<td>' . $arrSKU['intStock'] . ' Pzas</td>';
            $strRespuesta .= '<td>cac</td>';
            if ($intIdForecast > 0) {
                $strRespuesta .= '<td>';
                $strRespuesta .= '<input type="text" id=(' . $intIdForecast . ',' . $arrSKU['intId'] . ')">';
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
        unset($arrSKU);
        unset($rstSKU);
        unset($intQuantity);
        unset($rstForecast);
        //fin del pintado de SKUS
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