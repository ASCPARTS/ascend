<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'salesProjection':
        $jsnPhpScriptResponse = array('salesProjection'=>'');
        $decFactor = $_REQUEST['decFactor'];
        $strEstimate = $_REQUEST['strEstimate'];
        $totalAnio=0;
        $totalMeta=0;
        $totalAccumulated=0;
        $totalMissing=0;

        $strSql="SELECT substring(I.intCreationDate,5,2) as nMonth, SUM(DD.decAmount) as totalMonth
        FROM tblInvoice I
        LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
        LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
        WHERE I.strStatus='A' 
        AND I.intCreationDate >= 20160000000000 
        AND I.intCreationDate <= 20169999999999
        GROUP BY nMonth
        ORDER BY nMonth;";
        $rstData=$objAscend->dbQuery($strSql);

        $strSql="SELECT substring(I.intCreationDate,5,2) as nMonth, SUM(DD.decAmount) as totalMonth
        FROM tblInvoice I
        LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
        LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
        WHERE I.strStatus='A' 
        AND I.intCreationDate >= 20160000000000 
        AND I.intCreationDate <= 20179999999999
        GROUP BY nMonth
        ORDER BY nMonth;";
        $rstSale=$objAscend->dbQuery($strSql);

        /*suma de venta de año pasado*/
        foreach ($rstData as $arrAnio){
            $totalAnio = $totalAnio + $arrAnio['totalMonth'];
        }
        /*suma de meta*/
        foreach ($rstData as $arrMeta){
            if($strEstimate=='S'){
                $intEstimate= $arrMeta['totalMonth']/$decFactor;
                $totalMeta+=$intEstimate;
            }else{
                $intEstimate= $arrMeta['totalMonth']*$decFactor;
                $totalMeta+=$intEstimate;
            }
        }
        /*suma de acumulado*/
        foreach ($rstSale as $arrAcu){
            $totalAccumulated = $totalAccumulated + $arrAcu['totalMonth'];
        }

        /*resta de incremento*/
        $totalMissing=$totalAccumulated-$totalMeta;
        $totalMissingPor=$totalAccumulated/$totalMeta;


        $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .='<table>';
        $strRespuesta .='<thead>';
        $strRespuesta .='<tr>';
        $strRespuesta .='<th>Vendedor/Zona/Etc..</th>';
        $strRespuesta .='<th>Vacio</th>';
        foreach ($rstData as $arrData){
            $strRespuesta .='<th>'.$arrData['nMonth'].'</th>';
        }
        $strRespuesta .='<th>Total</th>';
        $strRespuesta .='<th>Incremento</th>';
        $strRespuesta .='</tr>';
        $strRespuesta .='</thead>';
        $strRespuesta .='<tbody>';

        /*TOTALES DEL AÑO*/
        $strRespuesta .='<tr>';
        $strRespuesta .='<td rowspan="3"></td>';
        $strRespuesta .='<td>Año</td>';
        foreach ($rstData as $arrData){
            $strRespuesta .='<th>$ ' . number_format($arrData['totalMonth'],0,'.',',') . '</th>';
            //$totalAnio = $totalAnio + $arrData['totalMonth'];
        }

        $strRespuesta .='<td>$' . number_format($totalAnio,0,'.',',') . '</td>';
        $strRespuesta .='<td>VACIO</td>';
        $strRespuesta .='</tr>';
        /*FIN TOTALES DEL AÑO*/

        /*META DEL NUEVO AÑO*/
        $strRespuesta .='<tr>';
        $strRespuesta .='<td>Meta</td>';
        foreach ($rstData as $arrData){
            /*($strEstimate=='S'){
                $intEstimate= $arrData['totalMonth']/$decFactor;
                $totalMeta+=$intEstimate;
            }else{
                $intEstimate= $arrData['totalMonth']*$decFactor;
                $totalMeta+=$intEstimate;
            }*/
            $strRespuesta .='<td>$' . number_format($intEstimate,0,'.',',') . '</td>';
        }
        $strRespuesta .='<td>$' . number_format($totalMeta,0,'.',',') . '</td>';
        $strRespuesta .='<td>' . number_format($totalMissing,2,'.',',') . '</td>';
        $strRespuesta .='</tr>';
        /*FIN DEL NUEVO AÑO*/

        /* ACUMULADO DE VENTAS EN EL AÑO*/
        $strRespuesta .='<tr>';
        $strRespuesta .='<td>Acumulado</td>';

        foreach ($rstSale as $arrSale){
            $strRespuesta .='<th>$ ' . number_format($arrSale['totalMonth'],0,'.',',') . '</th>';
            //$totalAccumulated = $totalAccumulated + $arrSale['totalMonth'];
        }
        $strRespuesta .='<td>$' . number_format($totalAccumulated,0,'.',',') . '</td>';
        $strRespuesta .='<td>' . number_format($totalMissingPor,0,'.',',') . '%</td>';
        $strRespuesta .='</tr>';
        /*FIN DEL ACUMULADO POR AÑO*/
        $strRespuesta .='<tr>';
        $strRespuesta .='</tbody>';
        $strRespuesta .='</table>';
        $strRespuesta .='</div>';

        $jsnPhpScriptResponse['salesProjection'] = $strRespuesta;
        unset($arrData);
        unset($rstData);
        unset($arrAnio);
        unset($arrMeta);
        unset($arrAcu);
        unset($objAscend);
        break;
};
echo json_encode($jsnPhpScriptResponse);
unset($objAscend);
?>