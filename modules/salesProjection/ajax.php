<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$intIdUser=$_SESSION['intUserID'];
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'salesProjection':
        $jsnPhpScriptResponse = array('salesProjectionZone'=>'');
        $decFactor = $_REQUEST['decFactor'];
        $strEstimate = $_REQUEST['strEstimate'];
        $intProjection = $_REQUEST['intProjection'];
        $totalAnio=0;
        $totalMeta=0;
        $totalAccumulated=0;
        $totalMissing=0;

        if($intProjection==1){
            $strSql = "select intId , strDescription FROM catZone WHERE strStatus='A' ORDER BY 2;";
            $rstSeller = $objAscend->dbQuery($strSql);
            $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .= '<table>';
            $strRespuesta .= '<thead>';
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<th>Vendedor</th>';
            $strRespuesta .= '<th>&nbsp;</th>';
            for ($intIxAnio = 1; $intIxAnio <= 12; $intIxAnio++) {
                $strRespuesta .= '<th>' . $intIxAnio . '</th>';
            }
            $strRespuesta .= '<th>Total</th>';
            $strRespuesta .= '<th>Incremento</th>';
            $strRespuesta .= '</tr>';
            $strRespuesta .= '</thead>';
            $strRespuesta .= '<tbody>';
            foreach ($rstSeller as $arrSeller) {
                $totalAnio=0;
                $totalMeta=0;
                $totalAccumulated=0;
                $totalMissing=0;
                $strSql = "SELECT substring(I.intCreationDate,5,2) as nMonth, SUM(DD.decAmount) as totalMonth
                FROM tblInvoice I
                LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
                LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
                LEFT JOIN tblDocument D ON D.intId=DD.intDocument
                LEFT JOIN tblUser U ON U.intId=D.intCreator
                LEFT JOIN catZone Z ON Z.intId = U.intZone
                WHERE I.strStatus='A'
                AND U.intZone = " . $arrSeller['intId'] . "
                AND I.intCreationDate >= 20160000000000 
                AND I.intCreationDate <= 20169999999999
                GROUP BY nMonth
                ORDER BY nMonth;";

                $rstData = $objAscend->dbQuery($strSql);

                foreach ($rstData as $arrAnio) {
                    $totalAnio = $totalAnio + $arrAnio['totalMonth'];
                }
                unset($arrAnio);
                foreach ($rstData as $arrMeta) {
                    if ($strEstimate == 'S') {
                        $intEstimate = $arrMeta['totalMonth'] / $decFactor;
                        $totalMeta += $intEstimate;
                    } else {
                        $intEstimate = $arrMeta['totalMonth'] * $decFactor;
                        $totalMeta += $intEstimate;
                    }
                }
                unset($arrMeta);
                foreach ($rstData as $arrAcu) {
                    $totalAccumulated = $totalAccumulated + $arrAcu['totalMonth'];
                }
                unset($arrAcu);
                $totalMissing = $totalAccumulated - $totalMeta;
                if($totalMeta==0){
                    $totalMissingPor = 0;
                }else{
                    $totalMissingPor = $totalAccumulated / $totalMeta;
                }
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td rowspan="3">' . $arrSeller['strDescription'] . '</td>';
                $strRespuesta .= '<td>Año</td>';

                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<th>$ ' . number_format($arrData['totalMonth'], 0, '.', ',') . '</th>';
                        //$totalAnio = $totalAnio + $arrData['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<th>$ 0.00</th>';
                    }
                }

                $strRespuesta .= '<td>$' . number_format($totalAnio, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>&nbsp;</td>';
                $strRespuesta .= '</tr>';
                /*FIN TOTALES DEL AÑO*/
                /*META DEL NUEVO AÑO*/
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>Meta</td>';
                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<td>$' . number_format($intEstimate, 0, '.', ',') . '</td>';
                        //$totalAccumulated = $totalAccumulated + $arrSale['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<td>$ 0.00</td>';
                    }
                }
                $strRespuesta .= '<td>$' . number_format($totalMeta, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>' . number_format($totalMissing, 2, '.', ',') . '</td>';
                $strRespuesta .= '</tr>';
                /*FIN DEL NUEVO AÑO*/
                /* ACUMULADO DE VENTAS EN EL AÑO*/
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>Acumulado</td>';
                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<th>$ ' . number_format($arrData['totalMonth'], 0, '.', ',') . '</th>';
                        //$totalAccumulated = $totalAccumulated + $arrSale['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<th>$ 0.00</th>';
                    }
                }
                unset($rstData);
                $strRespuesta .= '<td>$' . number_format($totalAccumulated, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>' . number_format($totalMissingPor, 0, '.', ',') . '%</td>';
                $strRespuesta .= '</tr>';
            }
            unset($arrSeller);
            unset($rstSeller);
            $strRespuesta .= '</tbody>';
            $strRespuesta .= '</table>';
            $strRespuesta .= '</div>';
            
        }
        else {

            $strSql = "select intId , strName FROM tblUser WHERE intRoll = (SELECT intId FROM catDepartment where strName='ventas') ORDER BY 2;";
            $rstSeller = $objAscend->dbQuery($strSql);
            $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
            $strRespuesta .= '<table>';
            $strRespuesta .= '<thead>';
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<th>Vendedor</th>';
            $strRespuesta .= '<th>&nbsp;</th>';
            for ($intIxAnio = 1; $intIxAnio <= 12; $intIxAnio++) {
                $strRespuesta .= '<th>' . $intIxAnio . '</th>';
            }
            $strRespuesta .= '<th>Total</th>';
            $strRespuesta .= '<th>Incremento</th>';
            $strRespuesta .= '</tr>';
            $strRespuesta .= '</thead>';
            $strRespuesta .= '<tbody>';
            foreach ($rstSeller as $arrSeller) {
                $totalAnio=0;
                $totalMeta=0;
                $totalAccumulated=0;
                $totalMissing=0;
                $strSql = "SELECT substring(I.intCreationDate,5,2) as nMonth, SUM(DD.decAmount) as totalMonth
                FROM tblInvoice I
                LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
                LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
                LEFT JOIN tblDocument D ON D.intId=DD.intDocument
                LEFT JOIN tblUser U ON U.intId=D.intCreator 
                WHERE I.strStatus='A'
                AND U.intId = " . $arrSeller['intId'] . "
                AND I.intCreationDate >= 20160000000000 
                AND I.intCreationDate <= 20169999999999
                GROUP BY nMonth
                ORDER BY nMonth;";

                $rstData = $objAscend->dbQuery($strSql);

                foreach ($rstData as $arrAnio) {
                    $totalAnio = $totalAnio + $arrAnio['totalMonth'];
                }
                unset($arrAnio);
                foreach ($rstData as $arrMeta) {
                    if ($strEstimate == 'S') {
                        $intEstimate = $arrMeta['totalMonth'] / $decFactor;
                        $totalMeta += $intEstimate;
                    } else {
                        $intEstimate = $arrMeta['totalMonth'] * $decFactor;
                        $totalMeta += $intEstimate;
                    }
                }
                unset($arrMeta);
                foreach ($rstData as $arrAcu) {
                    $totalAccumulated = $totalAccumulated + $arrAcu['totalMonth'];
                }
                unset($arrAcu);
                $totalMissing = $totalAccumulated - $totalMeta;
                if($totalMeta==0){
                    $totalMissingPor = 0;
                }else{
                    $totalMissingPor = $totalAccumulated / $totalMeta;
                }
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td rowspan="3">' . $arrSeller['strName'] . '</td>';
                $strRespuesta .= '<td>Año</td>';

                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<th>$ ' . number_format($arrData['totalMonth'], 0, '.', ',') . '</th>';
                        //$totalAnio = $totalAnio + $arrData['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<th>$ 0.00</th>';
                    }
                }

                $strRespuesta .= '<td>$' . number_format($totalAnio, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>&nbsp;</td>';
                $strRespuesta .= '</tr>';
                /*FIN TOTALES DEL AÑO*/
                /*META DEL NUEVO AÑO*/
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>Meta</td>';
                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<td>$' . number_format($intEstimate, 0, '.', ',') . '</td>';
                        //$totalAccumulated = $totalAccumulated + $arrSale['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<td>$ 0.00</td>';
                    }
                }
                $strRespuesta .= '<td>$' . number_format($totalMeta, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>' . number_format($totalMissing, 2, '.', ',') . '</td>';
                $strRespuesta .= '</tr>';
                /*FIN DEL NUEVO AÑO*/
                /* ACUMULADO DE VENTAS EN EL AÑO*/
                $strRespuesta .= '<tr>';
                $strRespuesta .= '<td>Acumulado</td>';
                if(count($rstData)>0){
                    foreach ($rstData as $arrData) {
                        $strRespuesta .= '<th>$ ' . number_format($arrData['totalMonth'], 0, '.', ',') . '</th>';
                        //$totalAccumulated = $totalAccumulated + $arrSale['totalMonth'];
                    }
                    unset($arrData);
                }else{
                    for($intIxAnio=1;$intIxAnio<13;$intIxAnio++){
                        $strRespuesta .= '<th>$ 0.00</th>';
                    }
                }
                unset($rstData);
                $strRespuesta .= '<td>$' . number_format($totalAccumulated, 0, '.', ',') . '</td>';
                $strRespuesta .= '<td>' . number_format($totalMissingPor, 0, '.', ',') . '%</td>';
                $strRespuesta .= '</tr>';
            }
            unset($arrSeller);
            unset($rstSeller);
            $strRespuesta .= '</tbody>';
            $strRespuesta .= '</table>';
            $strRespuesta .= '</div>';
        }
        $jsnPhpScriptResponse['salesProjectionZone'] = $strRespuesta;
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>