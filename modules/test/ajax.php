<?php
require_once('../../include/config.php');
require_once(LIB_PATH .  'scrap.php');

//ini_set('display_errors',1);
$objScrap = new clsScrap();


$strProcess = $_REQUEST['strProcess'];
switch ($strProcess) {
    case 'updateMonths':
        $jsnPhpScriptResponse = array('strResponse'=>'');
        $intYear = $_REQUEST['intYear'];
        $intMaxMonth = 12;
        if(date('Y')==$intYear){
            $intMaxMonth = date('n');
        };
        $strSql = "SELECT * FROM SLE_SALE_STATUS WHERE SLE_YEAR = " . $intYear . " AND SLE_MONTH BETWEEN 1 AND " . $intMaxMonth . " ORDER BY SLE_MONTH";
        $rstMonths = $objScrap->dbQuery($strSql);
        foreach($rstMonths as $objMonths){
            $jsnPhpScriptResponse['strResponse'] .= "<tr>";
            $jsnPhpScriptResponse['strResponse'] .= "<td>";
            $strMonth = '';
            switch($objMonths['SLE_MONTH']){
                case 1: $strMonth = 'Enero'; break;
                case 2: $strMonth = 'Febrero'; break;
                case 3: $strMonth = 'Marzo'; break;
                case 4: $strMonth = 'Abril'; break;
                case 5: $strMonth = 'Mayo'; break;
                case 6: $strMonth = 'Junio'; break;
                case 7: $strMonth = 'Julio'; break;
                case 8: $strMonth = 'Agosto'; break;
                case 9: $strMonth = 'Septiembre'; break;
                case 10: $strMonth = 'Octubre'; break;
                case 11: $strMonth = 'Noviembre'; break;
                case 12: $strMonth = 'Diciembre'; break;
            }
            $jsnPhpScriptResponse['strResponse'] .= $strMonth;
            $jsnPhpScriptResponse['strResponse'] .= "</td>";
            if($objMonths['SLE_STATUS']==1){
                $jsnPhpScriptResponse['strResponse'] .= '<td colspan="2" style="text-align: center">cerrado</td>';
            }else{
                $jsnPhpScriptResponse['strResponse'] .= '<td><input type="button" value="importar" onclick="showImport(' . $objMonths['SLE_MONTH'] . ');" class="buttons button_excel"></td>';
                $jsnPhpScriptResponse['strResponse'] .= '<td><input type="button" value="cerrar" onclick="showClose(' . $objMonths['SLE_MONTH'] . ');"  class="buttons button_red"></td>';
            }
        }
        unset($rstMonths);
        break;
    case 'importSales':
        $jsnPhpScriptResponse = array('strResult'=>'');
        $strFileExtension = strtolower($_REQUEST['strFileExtension']);
        $intYear = $_REQUEST['intYear'];
        $intMonth = $_REQUEST['intMonth'];
        if (0 < $_FILES['file']['error']){
            $jsnPhpScriptResponse['strResult'] = $_FILES['file']['error'];
        }else {
            $strTempFileName = SALES_UPLOAD_PATH . "tmp_sales_" . date('YmdHisu') . $strFileExtension;
            move_uploaded_file($_FILES['file']['tmp_name'], $strTempFileName);
            require_once('../../lib/PHPExcel.php');
            $objPHPExcel = new PHPExcel();
            $blnValidFile = false;
            $arrFileTypes = array('Excel2007', 'Excel5');
            $strExcelVersion = '';
            foreach ($arrFileTypes as $objFileType) {
                $objPHPExcelReader = PHPExcel_IOFactory::createReader($objFileType);
                if ($objPHPExcelReader->canRead($strTempFileName)) {
                    $blnValidFile = true;
                    $strExcelVersion = $objFileType;
                    unset($objPHPExcelReader);
                    break;
                }
            }
            if(!$blnValidFile){
                $jsnPhpScriptResponse['strResult'] = '#archivo corruputo o de tipo invalido</span>';
            }else{
                if($intMonth<10){
                    $intMonth = '0' . $intMonth;
                }
                $strSql = "DELETE FROM SLE_SALE WHERE SLE_POSTINGDATE BETWEEN " . $intYear . $intMonth . "00 AND " . $intYear . $intMonth . "99";
                $objScrap->dbDelete($strSql);
                $objPHPExcelReader = PHPExcel_IOFactory::createReader($strExcelVersion);
                $objPHPExcelReader = PHPExcel_IOFactory::load($strTempFileName);
                $objPHPExcelReader->setActiveSheetIndex(0);
                $arrExcelRows = $objPHPExcelReader->getActiveSheet()->toArray(null,true,true,false);
                foreach($arrExcelRows as $intRowIndex=>$objRow){
                    if($intRowIndex>10){
                        $strMaterial = trim($objRow[2]);
                        $strProfitCenter = trim($objRow[3]);
                        $strSalesHW = trim($objRow[4]);
                        $strBillQty = trim($objRow[5]);
                        $strPostingDate = trim($objRow[6]);
                        $strBillDoc = trim($objRow[7]);
                        if($strMaterial=='' && $strProfitCenter =='' && $strSalesHW =='' && $strBillQty =='' && $strPostingDate =='' && $strBillDoc ==''){
                            break;
                        }else{
                            if($strMaterial!=''){
                                $strSql = "SELECT PRF_ID FROM PRF_PROFITCENTER WHERE PRF_STATUS = 1 AND PRF_NAME = '" . $strProfitCenter . "'";
                                $rstProfitCenter = $objScrap->dbQuery($strSql);
                                if($objScrap->intAffectedRows!=0){
                                    $intProfitCenter = $rstProfitCenter[0]['PRF_ID'];
                                    $strSql = "SELECT ASM_ID FROM ASM_ASSEMBLY WHERE ASM_STATUS = 1 AND ASM_NAME = '" . $strMaterial . "' UNION SELECT PRT_ID AS ASM_ID FROM PRT_PART WHERE PRT_STATUS = 1 AND PRT_NUMBER = '" . $strMaterial . "'";
                                    $rstMaterial = $objScrap->dbQuery($strSql);
                                    if($objScrap->intAffectedRows!=0){
                                        $intMaterial = $rstMaterial[0]['ASM_ID'];
                                        $decSalesHW = floatval($strSalesHW);
                                        $decBillQty = floatval($strBillQty);
                                        list($strDay, $strMonth, $strYear) = explode('.',$strPostingDate);
                                        if($strYear==$intYear && $strMonth==$intMonth){
                                            $intPostingDate = $strYear . $strMonth . $strDay;
                                            $strSql = "INSERT INTO SLE_SALE(SLE_ID,SLE_PROFITCENTER,SLE_POSTINGDATE,SLE_MATERIAL,SLE_SALESHW,SLE_BILLQTY,SLE_BILLDOC) VALUES((SELECT NVL(MAX(SLE_ID),0) + 1 FROM SLE_SALE)," . $intProfitCenter . "," . $intPostingDate . "," . $intMaterial . "," . $decSalesHW . "," . $decBillQty . ",'" . $strBillDoc . "')";
                                            $objScrap->dbInsert($strSql);
                                            $jsnPhpScriptResponse['strResult'] .= "#" . intval($intRowIndex + 1) . " ... OK<br />";
                                            unset($rstCount);
                                        }else{
                                            $jsnPhpScriptResponse['strResult'] .= "#" . intval($intRowIndex + 1) . " ... ignorado (Fecha no pertenece al periodo)<br />";
                                        }
                                    }else{
                                        $jsnPhpScriptResponse['strResult'] .= "#" . intval($intRowIndex + 1) . " ... ignorado (Material no existe)<br />";
                                    }
                                    unset($rstMaterial);
                                }else{
                                    $jsnPhpScriptResponse['strResult'] .= "#" . intval($intRowIndex + 1) . " ... ignorado (Profit Center no existe)<br />";
                                }
                                unset($rstProfitCenter);
                            }else{
                                $jsnPhpScriptResponse['strResult'] .= "#" . intval($intRowIndex + 1) . " ... ignorado (sin Material)<br />";
                            }
                        }
                    }
                }
                unset($objPHPExcelReader);
            }
            $objPHPExcel->disconnectWorksheets();
            unset($objPHPExcel);
        }
        unlink($strTempFileName);
        break;
    case 'closeMonth':
        $jsnPhpScriptResponse = '';
        $intYear = $_REQUEST['intYear'];
        $intMonth = $_REQUEST['intMonth'];
        $strSql = "UPDATE SLE_SALE_STATUS SET SLE_STATUS = 1 WHERE SLE_YEAR = " . $intYear . " AND SLE_MONTH = " . $intMonth;
        $objScrap->dbUpdate($strSql);
        break;
};
unset($objScrap);
echo json_encode($jsnPhpScriptResponse);
?>