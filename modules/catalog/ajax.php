<?php
require_once('../../inc/include.config.php');
require_once( '../../' . LIB_PATH . 'class.ascend.php');
$objAscend = new clsAscend();
$objAscend->intTableId = $_REQUEST['intTableId'];
if($objAscend->intTableId!=0){
    $objAscend->getTableData();
}
$strProcess = $_REQUEST['strProcess'];
switch ($strProcess)
{
    case 'getWSUserData':
        $jsnPhpScriptResponse = array();
        $strPersonalNumber = $_REQUEST['strPersonalNumber'];
        $jsnPhpScriptResponse = $objAscend->getWSUserData($strPersonalNumber);
        break;
    case 'updateGrid':
        $jsnPhpScriptResponse = array('grid' => '', 'pagination' => '', 'intSqlNumberOfRecords' => 0,'intScrollPosition'=>0);
        $objAscend->strGridSqlOrder = $_REQUEST['strSqlOrder'];
        $objAscend->intGridSqlPage = $_REQUEST['intSqlPage'];
        $objAscend->intGridSqlLimit = $_REQUEST['intSqlLimit'];
        $objAscend->intScrollPosition = $_REQUEST['intScrollPosition'];
        $objAscend->strGridOption = $_REQUEST['strGridOption'];
        $objAscend->updateGrid();
        $jsnPhpScriptResponse['grid'] = $objAscend->strGrid;
        $jsnPhpScriptResponse['pagination'] = $objAscend->strGridPagination;
        $jsnPhpScriptResponse['intSqlNumberOfRecords'] = $objAscend->intGridNumberOfRecords;
        $jsnPhpScriptResponse['intScrollPosition'] = $objAscend->intScrollPosition;
        $jsnPhpScriptResponse['strGridOption'] = $objAscend->strGridOption;
        break;
    case 'processRecord':
        $jsnPhpScriptResponse = array('blnGo' => true, 'strError' => '', 'strField' => '');
        $jsnForm = json_decode($objAscend->arrFormField, true);
        for ($intIndex = 0; $intIndex < count($jsnForm); $intIndex++) {
            if ($jsnForm[$intIndex]['intDuplicate'] == 0) {
                $strSql = "SELECT COUNT(*) AS COUNT FROM " . $objAscend->strTableName;
                $strSql .= " WHERE " . $jsnForm[$intIndex]['strField'] . " = '" . $_REQUEST[$jsnForm[$intIndex]['strField']] . "'";
                if ($_REQUEST['intRecordId'] != 0) {
                    $strSql .= " AND " . $objAscend->strTableIdField . " <> '" . $_REQUEST['intRecordId'] . "'";
                }
                $rstRecordCount = $objAscend->dbQuery($strSql);
                if ($objAscend->getProperty('strDBError') == '') {
                    if ($rstRecordCount[0]['COUNT'] != 0) {
                        $jsnPhpScriptResponse['blnGo'] = false;
                        $jsnPhpScriptResponse['strError'] = $jsnForm[$intIndex]['strName'] . " <b>" . $_REQUEST[$jsnForm[$intIndex]['strField']] . "</b> ya existe";
                        $jsnPhpScriptResponse['strField'] = $jsnForm[$intIndex]['strField'];
                        $intIndex = count($jsnForm);
                    }
                } else {
                    $jsnPhpScriptResponse['blnGo'] = false;
                    $jsnPhpScriptResponse['strError'] = $objAscend->getProperty('strDBError');
                    $intIndex = count($jsnForm);
                }
                unset($rstRecordCount);
            }
        }
        if ($jsnPhpScriptResponse['blnGo']) {
            if ($_REQUEST['intRecordId'] == 0) {
                $strSql = "INSERT INTO " . $objAscend->strTableName . "(";
                $strInsertFields =  $objAscend->strTableIdField . ',';
                $strInsertValues = '(SELECT NVL(MAX(' . $objAscend->strTableIdField . '),0) + 1 FROM ' . $objAscend->strTableName . '),';
                for ($intIndex = 0; $intIndex < count($jsnForm); $intIndex++) {
                    $strInsertFields .= $jsnForm[$intIndex]['strField'] . ",";
                    $strInsertValues .= "'" . $_REQUEST[$jsnForm[$intIndex]['strField']] . "',";
                }
                $strSql .= substr($strInsertFields, 0, strlen($strInsertFields) - 1) . ") VALUES(" . substr($strInsertValues, 0, strlen($strInsertValues) - 1) . ") RETURNING " . $objAscend->strTableIdField . " INTO :intInsertedID";
                $objAscend->dbInsert($strSql);
                $intRecordId = $objAscend->getProperty('intLastInsertId');
            } else {
                $intRecordId = $_REQUEST['intRecordId'];
                $strSql = "UPDATE " . $objAscend->strTableName . " SET ";
                for ($intIndex = 0; $intIndex < count($jsnForm); $intIndex++) {
                    $strSql .= $jsnForm[$intIndex]['strField'] . " = '" . $_REQUEST[$jsnForm[$intIndex]['strField']] . "', ";
                }
                $strSql = substr($strSql, 0, strlen($strSql) - 2) . " WHERE " . $objAscend->strTableIdField . " = " . $intRecordId;
                $objAscend->dbUpdate($strSql);
            };
            $jsnRelation = json_decode($objAscend->arrTableRelation, true);
            foreach($jsnRelation as $intRelationIndex=>$objRelation){
                $strSql = relationTable($objRelation['strName'],"UPDATE ||strTable|| SET ||strField_Status|| = 0 WHERE ||strField_0|| = " . $intRecordId);
                $objAscend->dbUpdate($strSql);
                $arrRelationIds = explode("|",$_REQUEST[$objRelation['strName']]);
                array_splice($arrRelationIds, count($arrRelationIds) - 1);
                foreach($arrRelationIds as $objRelationIds){
                    $strSql = relationTable($objRelation['strName'],"INSERT INTO ||strTable||(||strField_Id||,||strField_0||,||strField_1||) VALUES((SELECT NVL(MAX(||strField_Id||),0) + 1 FROM ||strTable||)," . $intRecordId . "," . $objRelationIds . ")");
                    $objAscend->dbInsert($strSql);
                    $strSql = relationTable($objRelation['strName'],"UPDATE ||strTable|| SET ||strField_Status|| = 1 WHERE ||strField_0|| = " . $intRecordId . " AND ||strField_1|| = " . $objRelationIds);
                    $objAscend->dbUpdate($strSql);
                }
                unset($objRelationIds);
            }
            unset($objRelation);
            unset($intRelationIndex);
            unset($jsnRelation);
        }
        break;
    case 'deactivateRecord':
        $jsnPhpScriptResponse = array('blnGo' => 'true', 'strError' => '');
        $strSql = "UPDATE " . $objAscend->strTableName . " SET " . $objAscend->strTableStatusField . " = " . $_REQUEST['intStatus'] . " WHERE " . $objAscend->strTableIdField . " = " . $_REQUEST['intRecordId'];
        $objAscend->dbUpdate($strSql);
        if ($objAscend->getProperty('strDBError') != '') {
            $jsnPhpScriptResponse['blnGo'] = false;
            $jsnPhpScriptResponse['strError'] = $objAscend->getProperty('strDBError');
        }
        break;
    case 'generateImportTemplate':
        ini_set("display_errors",1);
        $jsnPhpScriptResponse = array('strTemplateFile'=>'');
        require_once('../../lib/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $strFileName = 'template/Scrap_' . stripAccents($objAscend->strGridTitle) . '.xlsx';
        $arrStyle = array('font'=>array('bold'=>true));
        if(file_exists($strFileName)){
            unlink($strFileName);
        }
        $arrFields = json_decode($objAscend->arrFormField,true);
        foreach($arrFields as $intFieldIndex=>$objField){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($intFieldIndex,1, $objField['strName']);
        }
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($arrStyle);
        $intFieldIndex = $intFieldIndex;
        unset($objField);
        unset($arrFields);
        $objPHPExcel->getActiveSheet()->setTitle($objAscend->strGridTitle);
        $arrRelation = json_decode($objAscend->arrTableRelation, true);
        if(count($arrRelation)>0){
            foreach($arrRelation as $intRelationIndex=>$objRelation){
                $intFieldIndex = $intFieldIndex + 1;
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($intFieldIndex,1, $objRelation['strDisplay']);
                $objPHPExcel->createSheet();
                $objPHPExcel->setActiveSheetIndex($intRelationIndex + 1)->setCellValueByColumnAndRow(0,1, $objRelation['strDisplay']);
                $objPHPExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($arrStyle);
                switch($objRelation['strName']){
                    case 'PLANT_COUNTRY':
                        $strRelationSql = "SELECT CNT_COUNTRY.CNT_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME AS FIELD_NAME FROM CNT_COUNTRY WHERE CNT_STATUS = 1";
                        break;
                    case 'SHIP_PLANT':
                        $strRelationSql = "SELECT PLN_PLANT_RELATION.PLN_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME AS FIELD_NAME FROM PLN_PLANT, CNT_COUNTRY, PLN_PLANT_RELATION WHERE PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'DIVISION_SHIP':
                        $strRelationSql = "SELECT SHP_SHIP_RELATION.SHP_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME AS FIELD_NAME FROM SHP_SHIP_RELATION, PLN_PLANT_RELATION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'SEGMENT_DIVISION':
                        $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME AS FIELD_NAME FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'PROFITCENTER_SEGMENT':
                        $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME AS FIELD_NAME FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'APD_SEGMENT':
                        $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME AS FIELD_NAME FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'COSTCENTER_DIVISION':
                        $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME AS FIELD_NAME FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'STATION_AREA':
                        $strRelationSql = "SELECT ARE_AREA.ARE_ID AS FIELD_ID, ARE_AREA.ARE_NAME AS FIELD_NAME FROM ARE_AREA WHERE ARE_STATUS = 1";
                        break;
                    case 'LINE_STATION':
                        $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'FAULT_STATION':
                        $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'CAUSE_FAULT':
                        $strRelationSql = "SELECT FLT_FAULT_RELATION.FLT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME||' - '||FLT_FAULT.FLT_NAME AS FIELD_NAME FROM FLT_FAULT_RELATION, STT_STATION_RELATION, FLT_FAULT, STT_STATION, ARE_AREA WHERE FLT_FAULT_RELATION.FLT_STATION = STT_STATION_RELATION.STT_ID AND FLT_FAULT_RELATION.FLT_FAULT = FLT_FAULT.FLT_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND FLT_FAULT_RELATION.FLT_STATUS = 1 AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'SCRAPCODE_CAUSE':
                        $strRelationSql = "SELECT CAS_CAUSE.CAS_ID AS FIELD_ID, CAS_NAME AS FIELD_NAME FROM CAS_CAUSE WHERE CAS_STATUS = 1";
                        break;
                    case 'PART_UNIT':
                        $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS FIELD_ID, UNT_UNIT.UNT_CODE AS FIELD_NAME FROM UNT_UNIT WHERE UNT_STATUS = 1";
                        break;
                    case 'PART_TYPE':
                        $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS FIELD_ID, TYP_TYPE.TYP_NAME AS FIELD_NAME FROM TYP_TYPE WHERE TYP_STATUS = 1";
                        break;
                    case 'ASSEMBLY_UNIT':
                        $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS FIELD_ID, UNT_UNIT.UNT_CODE AS FIELD_NAME FROM UNT_UNIT WHERE UNT_STATUS = 1";
                        break;
                    case 'ASSEMBLY_TYPE':
                        $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS FIELD_ID, TYP_TYPE.TYP_NAME AS FIELD_NAME FROM TYP_TYPE WHERE TYP_STATUS = 1";
                        break;
                    case 'PROJECT_PROFITCENTER':
                        $strRelationSql = "SELECT PRF_PROFITCENTER_RELATION.PRF_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME||' - '||PRF_PROFITCENTER.PRF_NAME AS FIELD_NAME FROM PRF_PROFITCENTER_RELATION, SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, PRF_PROFITCENTER, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE PRF_PROFITCENTER_RELATION.PRF_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID AND SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_PROFITCENTER = PRF_PROFITCENTER.PRF_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_STATUS = 1 AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PRF_PROFITCENTER.PRF_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'PROJECT_STATION':
                        $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY FIELD_NAME, FIELD_ID";
                        break;
                    case 'ASSEMBLY_PART':
                        $strRelationSql = "SELECT PRT_PART.PRT_ID AS FIELD_ID, PRT_PART.PRT_NUMBER AS FIELD_NAME FROM PRT_PART WHERE PRT_STATUS = 1";
                        break;
                    case 'PROJECT_PART':
                        $strRelationSql = "SELECT PRT_PART.PRT_ID AS FIELD_ID, PRT_PART.PRT_NUMBER AS FIELD_NAME FROM PRT_PART WHERE PRT_STATUS = 1";
                        break;
                    case 'PROJECT_ASSEMBLY':
                        $strRelationSql = "SELECT ASM_ASSEMBLY.ASM_ID AS FIELD_ID, ASM_ASSEMBLY.ASM_NAME AS FIELD_NAME FROM ASM_ASSEMBLY WHERE ASM_STATUS = 1";
                        break;
                    case 'PROJECT_SCRAPCODE':
                        $strRelationSql = "SELECT SCD_SCRAPCODE.SCD_ID AS FIELD_ID, SCD_SCRAPCODE.SCD_CODE||' - '||SCD_SCRAPCODE.SCD_NAME AS FIELD_NAME FROM SCD_SCRAPCODE WHERE SCD_STATUS = 1";
                        break;
                }
                $rstRelationData = $objAscend->dbQuery($strRelationSql);
                $intNumRows = $objAscend->intMySqlAffectedRows;
                if($intNumRows!=0){
                    foreach($rstRelationData as $intRelationDataIndex=>$objRelationData){
                        $objPHPExcel->setActiveSheetIndex($intRelationIndex + 1)->setCellValueByColumnAndRow(0,$intRelationDataIndex + 2, $objRelationData['FIELD_NAME']);
                    }
                    unset($objRelationData);
                }
                unset($rstRelationData);
                if(strlen($objRelation['strDisplay'])>31){
                    $objPHPExcel->getActiveSheet()->setTitle(substr($objRelation['strDisplay'],0,29) . '...');
                }else{
                    $objPHPExcel->getActiveSheet()->setTitle($objRelation['strDisplay']);
                }
            }
        }
        unset($arrRelation);
        unset($objRelation);
        unset($intRelationIndex);
        unset($arrRelation);
        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($strFileName);
        unset($objWriter);
        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
        $jsnPhpScriptResponse['strTemplateFile'] = $strFileName;
        break;
    case 'getRelation':
        $jsnPhpScriptResponse = array();
        $strSql = "SELECT * FROM TBL_TABLE_RELATION WHERE TBL_TABLE = " . $_REQUEST['intTableId'] . " ORDER BY TBL_ORDER";
        $rstRelation = $objAscend->dbQuery($strSql);
        foreach ($rstRelation as $intRelationIndex=>$objRelation) {
            $jsnPhpScriptResponse[$intRelationIndex]=array('strRelationName'=>$objRelation['TBL_NAME'],'arrRelationIds'=>array(),'arrRelationRows'=>array());
            switch($objRelation['TBL_NAME']){
                case 'PLANT_COUNTRY':
                    $strRelationSql = "SELECT CNT_COUNTRY.CNT_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PLN_PLANT_RELATION WHERE PLN_STATUS = 1 AND PLN_PLANT = " . $_REQUEST['intRecordId'] . " AND PLN_COUNTRY = CNT_COUNTRY.CNT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM CNT_COUNTRY WHERE CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'SHIP_PLANT':
                    $strRelationSql = "SELECT PLN_PLANT_RELATION.PLN_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM SHP_SHIP_RELATION WHERE SHP_STATUS = 1 AND SHP_SHIP = " . $_REQUEST['intRecordId'] . " AND SHP_PLANT = PLN_PLANT_RELATION.PLN_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM PLN_PLANT, CNT_COUNTRY, PLN_PLANT_RELATION WHERE PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'DIVISION_SHIP':
                    $strRelationSql = "SELECT SHP_SHIP_RELATION.SHP_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM DVS_DIVISION_RELATION WHERE DVS_STATUS = 1 AND DVS_DIVISION = " . $_REQUEST['intRecordId'] . " AND DVS_SHIP = SHP_SHIP_RELATION.SHP_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM SHP_SHIP_RELATION, PLN_PLANT_RELATION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'SEGMENT_DIVISION':
                    $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM SGM_SEGMENT_RELATION WHERE SGM_STATUS = 1 AND SGM_SEGMENT = " . $_REQUEST['intRecordId'] . " AND SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROFITCENTER_SEGMENT':
                    $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRF_PROFITCENTER_RELATION WHERE PRF_STATUS = 1 AND PRF_PROFITCENTER = " . $_REQUEST['intRecordId'] . " AND PRF_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'APD_SEGMENT':
                    $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM APD_APD_RELATION WHERE APD_STATUS = 1 AND APD_APD = " . $_REQUEST['intRecordId'] . " AND APD_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'COSTCENTER_DIVISION':
                    $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM CST_COSTCENTER_RELATION WHERE CST_STATUS = 1 AND CST_COSTCENTER = " . $_REQUEST['intRecordId'] . " AND CST_DIVISION = DVS_DIVISION_RELATION.DVS_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'STATION_AREA':
                    $strRelationSql = "SELECT ARE_AREA.ARE_ID AS FIELD_ID, ARE_AREA.ARE_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM STT_STATION_RELATION WHERE STT_STATUS = 1 AND STT_STATION = " . $_REQUEST['intRecordId'] . " AND STT_AREA = ARE_AREA.ARE_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM ARE_AREA WHERE ARE_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'LINE_STATION':
                    $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM LIN_LINE_RELATION WHERE LIN_STATUS = 1 AND LIN_LINE = " . $_REQUEST['intRecordId'] . " AND LIN_STATION = STT_STATION_RELATION.STT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'FAULT_STATION':
                    $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM FLT_FAULT_RELATION WHERE FLT_STATUS = 1 AND FLT_FAULT = " . $_REQUEST['intRecordId'] . " AND FLT_STATION = STT_STATION_RELATION.STT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'CAUSE_FAULT':
                    $strRelationSql = "SELECT FLT_FAULT_RELATION.FLT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME||' - '||FLT_FAULT.FLT_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM CAS_CAUSE_RELATION WHERE CAS_STATUS = 1 AND CAS_CAUSE = " . $_REQUEST['intRecordId'] . " AND CAS_FAULT = FLT_FAULT_RELATION.FLT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM FLT_FAULT_RELATION, STT_STATION_RELATION, FLT_FAULT, STT_STATION, ARE_AREA WHERE FLT_FAULT_RELATION.FLT_STATION = STT_STATION_RELATION.STT_ID AND FLT_FAULT_RELATION.FLT_FAULT = FLT_FAULT.FLT_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND FLT_FAULT_RELATION.FLT_STATUS = 1 AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'SCRAPCODE_CAUSE':
                    $strRelationSql = "SELECT CAS_CAUSE.CAS_ID AS FIELD_ID, CAS_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM SCD_SCRAPCODE_RELATION WHERE SCD_STATUS = 1 AND SCD_SCRAPCODE = " . $_REQUEST['intRecordId'] . " AND SCD_CAUSE = CAS_CAUSE.CAS_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM CAS_CAUSE WHERE CAS_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PART_UNIT':
                    $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS FIELD_ID, UNT_UNIT.UNT_CODE AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRT_PART_UNIT WHERE PRT_STATUS = 1 AND PRT_PART = " . $_REQUEST['intRecordId'] . " AND PRT_UNIT = UNT_UNIT.UNT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM UNT_UNIT WHERE UNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PART_TYPE':
                    $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS FIELD_ID, TYP_TYPE.TYP_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRT_PART_TYPE WHERE PRT_STATUS = 1 AND PRT_PART = " . $_REQUEST['intRecordId'] . " AND PRT_TYPE = TYP_TYPE.TYP_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM TYP_TYPE WHERE TYP_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'ASSEMBLY_UNIT':
                    $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS FIELD_ID, UNT_UNIT.UNT_CODE AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM ASM_ASSEMBLY_UNIT WHERE ASM_STATUS = 1 AND ASM_ASSEMBLY = " . $_REQUEST['intRecordId'] . " AND ASM_UNIT = UNT_UNIT.UNT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM UNT_UNIT WHERE UNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'ASSEMBLY_TYPE':
                    $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS FIELD_ID, TYP_TYPE.TYP_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM ASM_ASSEMBLY_TYPE WHERE ASM_STATUS = 1 AND ASM_ASSEMBLY = " . $_REQUEST['intRecordId'] . " AND ASM_TYPE = TYP_TYPE.TYP_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM TYP_TYPE WHERE TYP_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROFILE_MENU':
                    $strRelationSql = "SELECT MENUS.MNU_ID AS FIELD_ID, CATEGORIES.MNU_NAME||' - '||MENUS.MNU_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRO_PROFILE_RELATION WHERE PRO_STATUS = 1 AND PRO_PROFILE = " . $_REQUEST['intRecordId'] . " AND PRO_MENU = MENUS.MNU_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM MNU_MENU MENUS LEFT JOIN MNU_MENU CATEGORIES ON CATEGORIES.MNU_ID = MENUS.MNU_PARENT WHERE MENUS.MNU_STATUS = 1 AND MENUS.MNU_PARENT <> 0 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'USER_PROFILE':
                    $strRelationSql = "SELECT PRO_PROFILE.PRO_ID AS FIELD_ID, PRO_PROFILE.PRO_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM USR_USER_RELATION WHERE USR_STATUS = 1 AND USR_USER = " . $_REQUEST['intRecordId'] . " AND USR_PROFILE = PRO_PROFILE.PRO_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM PRO_PROFILE WHERE PRO_PROFILE.PRO_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'ASSEMBLY_PART':
                    $strRelationSql = "SELECT PRT_PART.PRT_ID AS FIELD_ID, PRT_PART.PRT_NUMBER||' - '||PRT_PART.PRT_DESCRIPTION AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM ASM_ASSEMBLY_RELATION WHERE ASM_STATUS = 1 AND ASM_ASSEMBLY = " . $_REQUEST['intRecordId'] . " AND ASM_PART = PRT_PART.PRT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM PRT_PART WHERE PRT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROJECT_PROFITCENTER':
                    $strRelationSql = "SELECT PRF_PROFITCENTER_RELATION.PRF_ID AS FIELD_ID, CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME||' - '||PRF_PROFITCENTER.PRF_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRJ_PROJECT_PROFITCENTER WHERE PRJ_STATUS = 1 AND PRJ_PROJECT = " . $_REQUEST['intRecordId'] . " AND PRJ_PROFITCENTER = PRF_PROFITCENTER_RELATION.PRF_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM PRF_PROFITCENTER_RELATION, SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, PRF_PROFITCENTER, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE PRF_PROFITCENTER_RELATION.PRF_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID AND SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_PROFITCENTER = PRF_PROFITCENTER.PRF_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_STATUS = 1 AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PRF_PROFITCENTER.PRF_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROJECT_STATION':
                    $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS FIELD_ID, ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRJ_PROJECT_STATION WHERE PRJ_STATUS = 1 AND PRJ_PROJECT = " . $_REQUEST['intRecordId'] . " AND PRJ_STATION = STT_STATION_RELATION.STT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROJECT_PART':
                    $strRelationSql = "SELECT PRT_PART.PRT_ID AS FIELD_ID, PRT_PART.PRT_NUMBER||' - '||PRT_PART.PRT_DESCRIPTION AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRJ_PROJECT_PART WHERE PRJ_STATUS = 1 AND PRJ_PROJECT = " . $_REQUEST['intRecordId'] . " AND PRJ_PART = PRT_PART.PRT_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM PRT_PART WHERE PRT_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROJECT_ASSEMBLY':
                    $strRelationSql = "SELECT ASM_ASSEMBLY.ASM_ID AS FIELD_ID, ASM_ASSEMBLY.ASM_NAME||' - '||ASM_ASSEMBLY.ASM_DESCRIPTION AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRJ_PROJECT_ASSEMBLY WHERE PRJ_STATUS = 1 AND PRJ_PROJECT = " . $_REQUEST['intRecordId'] . " AND PRJ_ASSEMBLY = ASM_ASSEMBLY.ASM_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM ASM_ASSEMBLY WHERE ASM_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
                case 'PROJECT_SCRAPCODE':
                    $strRelationSql = "SELECT SCD_SCRAPCODE.SCD_ID AS FIELD_ID, SCD_SCRAPCODE.SCD_CODE||' - '||SCD_SCRAPCODE.SCD_NAME AS FIELD_NAME, ";
                    if($_REQUEST['intRecordId']!=0){
                        $strRelationSql .= "(SELECT COUNT(*) AS COUNT FROM PRJ_PROJECT_SCRAPCODE WHERE PRJ_STATUS = 1 AND PRJ_PROJECT = " . $_REQUEST['intRecordId'] . " AND PRJ_SCRAPCODE = SCD_SCRAPCODE.SCD_ID)";
                    }else{
                        $strRelationSql .= "0";
                    }
                    $strRelationSql .= " AS COUNT FROM SCD_SCRAPCODE WHERE SCD_STATUS = 1 ORDER BY COUNT DESC, FIELD_NAME, FIELD_ID";
                    break;
            }

            $rstRelationData = $objAscend->dbQuery($strRelationSql);
            $intNumRows = $objAscend->intMySqlAffectedRows;
            if($intNumRows!=0){
                foreach($rstRelationData as $intRelationDataIndex=>$objRelationData){
                    $jsnPhpScriptResponse[$intRelationIndex]['arrRelationIds'][$intRelationDataIndex]=$objRelationData['FIELD_ID'];
                    $strRelationRows = '<tr>';
                    $strRelationRows .= '<td id="tdRelation_' . $objRelation['TBL_NAME'] . '_' . $objRelationData['FIELD_ID'] . '"';
                    $strRelationRows .= ' onclick="switchSelected(' . "'" . $objRelation['TBL_NAME'] . "'," . $objRelationData['FIELD_ID'] . ')"';
                    $strRelationRows .= ' class="td';
                    if($objRelationData['COUNT']!=0){
                        $strRelationRows .= 'Active">&#10004';
                    }else{
                        $strRelationRows .= 'NonActive">&#10006';
                    }
                    $strRelationRows .= '</td><td>' . $objRelationData['FIELD_NAME'] . '</td>';
                    $strRelationRows .= '</tr>';
                    $jsnPhpScriptResponse[$intRelationIndex]['arrRelationRows'][$intRelationDataIndex]=$strRelationRows;
                }
                unset($objRelationData);
            }
            unset($rstRelationData);
        }
        unset($objRelation);
        unset($rstRelation);
        break;
    case 'excelUpload':
        $jsnPhpScriptResponse = array('strFileName'=>'','arrResult'=>'','strError'=>'');
        if (0 < $_FILES['file']['error']){
            $jsnPhpScriptResponse['strError'] = $_FILES['file']['error'];
        }else{
            $strPath = UPLOAD_PATH;
            $strTempFileName = $strPath . "tmp_" . $_REQUEST['intTableId'] . '_' . date('YmdHisu') . $_REQUEST['strFileExtension'];
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
                $jsnPhpScriptResponse['strError'] = '<span style="color: #FF2828;">&#10006 archivo corruputo o de tipo invalido</span>';
                unlink($strTempFileName);
            }else{
                $objPHPExcelReader = PHPExcel_IOFactory::createReader($strExcelVersion);
                $objPHPExcelReader = PHPExcel_IOFactory::load($strTempFileName);
                $objPHPExcelReader->setActiveSheetIndex(0);
                $arrExcelRows = $objPHPExcelReader->getActiveSheet()->toArray(null,true,true,false);
                if(count($arrExcelRows)<2){
                    $jsnPhpScriptResponse['strError'] = '<span style="color: #FF2828;">&#10006 archivo vacio</span>';
                    unlink($strTempFileName);
                }else{
                    $arrFormField = json_decode($objAscend->arrFormField, true);
                    $arrTableRelation = json_decode($objAscend->arrTableRelation, true);
                    $intNumberOfColumns = count($arrFormField) + count($arrTableRelation);
                    $arrRecord = array();
                    $intErrorCount = 0;
                    foreach($arrExcelRows as $intRowIndex=>$objRow){
                        if($intRowIndex>0){
                            $blnCellValueError = false;
                            foreach($objRow as $intColIndex=>$objCell){
                                if($intColIndex<$intNumberOfColumns){
                                    $varValue = trim(strtoupper($objCell));
                                    if($varValue=='') {
                                        $blnCellValueError = true;
                                    }
                                }
                            }
                            unset($intColIndex);
                            unset($objCell);
                            if($blnCellValueError){
                                $intErrorCount++;
                                $jsnPhpScriptResponse['arrResult'] .= '<b><span style="color: #FF2828;">&#10006</span> Registro ' . intval($intRowIndex + 1) . ' </b>contiene columnas vacias, verificar<br />';
                            }else{
                                $blnCellValueError = false;
                                $strCellName = '';
                                foreach($objRow as $intColIndex=>$objCell){
                                    if($intColIndex<$intNumberOfColumns){
                                        $varValue = trim(strtoupper($objCell));
                                        if ($arrFormField[$intColIndex]['strType']=='N'){
                                            if(!is_numeric($varValue)){
                                                $strCellName .= $arrFormField[$intColIndex]['strName'] . ", ";
                                                $blnCellValueError = true;
                                            }
                                        }
                                    }
                                }
                                unset($intColIndex);
                                unset($objCell);
                                if($blnCellValueError){
                                    $intErrorCount++;
                                    $jsnPhpScriptResponse['arrResult'] .= '<b><span style="color: #FF2828;">&#10006</span> Registro ' . intval($intRowIndex + 1) . ' </b>columna(s) <b>' . substr($strCellName,0,strlen($strCellName) - 2) . '</b> debe(n) contener solo números, verificar<br />';
                                }else {
                                    foreach($objRow as $intColIndex=>$objCell) {
                                        $varValue = trim(strtoupper($objCell));
                                        if ($intColIndex < count($arrFormField)) {
                                            if($arrFormField[$intColIndex]['intDuplicate']==0){
                                                $strCountSql = "SELECT " . $objAscend->strTableIdField . " FROM " . $objAscend->strTableName . " WHERE " . $arrFormField[$intColIndex]['strField'] . " = '" . $varValue . "' AND " . $objAscend->strTableStatusField . " IN (0,1)";
                                                $rstCount = $objAscend->dbQuery($strCountSql);
                                                if($objAscend->intMySqlAffectedRows!=0){
                                                    if(count($arrFormField)<2){
                                                        $intErrorCount++;
                                                        $jsnPhpScriptResponse['arrResult'] .= '<b><span style="color: #FF2828;">&#10006</span> Registro ' . intval($intRowIndex + 1) . ' </b>ya existe, será ignorado<br />';
                                                    }
                                                }
                                            }
                                        }else{
                                            if($intColIndex<$intNumberOfColumns){
                                                switch($arrTableRelation[$intColIndex - count($arrFormField)]['TBL_NAME']){
                                                    case 'PLANT_COUNTRY':
                                                        $strRelationSql = "SELECT COUNT(CNT_COUNTRY.CNT_ID) AS COUNT FROM CNT_COUNTRY WHERE CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'SHIP_PLANT':
                                                        $strRelationSql = "SELECT COUNT(PLN_PLANT_RELATION.PLN_ID) AS COUNT FROM PLN_PLANT, CNT_COUNTRY, PLN_PLANT_RELATION WHERE PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'DIVISION_SHIP':
                                                        $strRelationSql = "SELECT COUNT(SHP_SHIP_RELATION.SHP_ID) AS COUNT FROM SHP_SHIP_RELATION, PLN_PLANT_RELATION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'SEGMENT_DIVISION':
                                                        $strRelationSql = "SELECT COUNT(DVS_DIVISION_RELATION.DVS_ID) AS COUNT FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'PROFITCENTER_SEGMENT':
                                                        $strRelationSql = "SELECT COUNT(SGM_SEGMENT_RELATION.SGM_ID) AS COUNT FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME  = '" . $varValue . "'";
                                                        break;
                                                    case 'APD_SEGMENT':
                                                        $strRelationSql = "SELECT COUNT(SGM_SEGMENT_RELATION.SGM_ID) AS COUNT FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'COSTCENTER_DIVISION':
                                                        $strRelationSql = "SELECT COUNT(DVS_DIVISION_RELATION.DVS_ID) AS COUNT FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'STATION_AREA':
                                                        $strRelationSql = "SELECT COUNT(ARE_AREA.ARE_ID) AS COUNT FROM ARE_AREA WHERE ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'LINE_STATION':
                                                        $strRelationSql = "SELECT COUNT(STT_STATION_RELATION.STT_ID) AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'FAULT_STATION':
                                                        $strRelationSql = "SELECT COUNT(STT_STATION_RELATION.STT_ID) AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'CAUSE_FAULT':
                                                        $strRelationSql = "SELECT COUNT(FLT_FAULT_RELATION.FLT_ID) AS COUNT FROM FLT_FAULT_RELATION, STT_STATION_RELATION, FLT_FAULT, STT_STATION, ARE_AREA WHERE FLT_FAULT_RELATION.FLT_STATION = STT_STATION_RELATION.STT_ID AND FLT_FAULT_RELATION.FLT_FAULT = FLT_FAULT.FLT_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND FLT_FAULT_RELATION.FLT_STATUS = 1 AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME||' - '||FLT_FAULT.FLT_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'SCRAPCODE_CAUSE':
                                                        $strRelationSql = "SELECT COUNT(CAS_CAUSE.CAS_ID) AS COUNT FROM CAS_CAUSE WHERE CAS_STATUS = 1 AND CAS_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'PART_UNIT':
                                                        $strRelationSql = "SELECT COUNT(UNT_UNIT.UNT_ID) AS COUNT FROM UNT_UNIT WHERE UNT_STATUS = 1 AND UNT_CODE = '" . $varValue . "'";
                                                        break;
                                                    case 'PART_TYPE':
                                                        $strRelationSql = "SELECT COUNT(TYP_TYPE.TYP_ID) AS COUNT FROM TYP_TYPE WHERE TYP_STATUS = 1 AND TYP_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'ASSEMBLY_UNIT':
                                                        $strRelationSql = "SELECT COUNT(UNT_UNIT.UNT_ID) AS COUNT FROM UNT_UNIT WHERE UNT_STATUS = 1 AND UNT_CODE = '" . $varValue . "'";
                                                        break;
                                                    case 'ASSEMBLY_TYPE':
                                                        $strRelationSql = "SELECT COUNT(TYP_TYPE.TYP_ID) AS COUNT FROM TYP_TYPE WHERE TYP_STATUS = 1 AND TYP_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'PROJECT_PROFITCENTER':
                                                        $strRelationSql = "SELECT COUNT(PRF_PROFITCENTER_RELATION.PRF_ID) AS COUNT FROM PRF_PROFITCENTER_RELATION, SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, PRF_PROFITCENTER, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE PRF_PROFITCENTER_RELATION.PRF_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID AND SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_PROFITCENTER = PRF_PROFITCENTER.PRF_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_STATUS = 1 AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PRF_PROFITCENTER.PRF_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME||' - '||PRF_PROFITCENTER.PRF_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'PROJECT_STATION':
                                                        $strRelationSql = "SELECT COUNT(STT_STATION_RELATION.STT_ID) AS COUNT FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'ASSEMBLY_PART':
                                                        $strRelationSql = "SELECT COUNT(PRT_PART.PRT_ID) AS COUNT FROM PRT_PART WHERE PRT_STATUS = 1 AND PRT_NUMBER = '" . $varValue . "'";
                                                        break;
                                                    case 'PROJECT_PART':
                                                        $strRelationSql = "SELECT COUNT(PRT_PART.PRT_ID) AS COUNT FROM PRT_PART WHERE PRT_STATUS = 1 AND PRT_NUMBER = '" . $varValue . "'";
                                                        break;
                                                    case 'PROJECT_ASSEMBLY':
                                                        $strRelationSql = "SELECT COUNT(ASM_ASSEMBLY.ASM_ID) AS COUNT FROM ASM_ASSEMBLY WHERE ASM_STATUS = 1 AND ASM_NAME = '" . $varValue . "'";
                                                        break;
                                                    case 'PROJECT_SCRAPCODE':
                                                        $strRelationSql = "SELECT COUNT(SCD_SCRAPCODE.SCD_ID) AS COUNT FROM SCD_SCRAPCODE WHERE SCD_STATUS = 1 AND SCD_CODE||' - '||SCD_NAME = '" . $varValue . "'";
                                                        break;
                                                }
                                                $rstExcelRelation = $objAscend->dbQuery($strRelationSql);
                                                if($rstExcelRelation[0]['COUNT']==0){
                                                    $intErrorCount++;
                                                    $jsnPhpScriptResponse['arrResult'] .= '<b><span style="color: #FF2828;">&#10006</span> Registro ' . intval($intRowIndex + 1) . ' </b>el valor <b>' . $varValue . '</b> para la relación <b>' . $arrTableRelation[$intColIndex - count($arrFormField)]['TBL_DISPLAY'] . '</b> no existe, verificar<br />';
                                                    //$jsnPhpScriptResponse['arrResult'] .= $strRelationSql . '<br />';
                                                }
                                                unset($rstExcelRelation);
                                            }else{
                                                break;
                                            }
                                        }
                                    }
                                    unset($intColIndex);
                                    unset($objCell);
                                }
                            }
                        }
                    }
                    $jsnPhpScriptResponse['arrResult'] .= "<br /><br />";
                    if($intErrorCount!=0){
                        $jsnPhpScriptResponse['arrResult'] .= '<b><span style="color: #FF2828;">' . $intErrorCount . ' errores en el archivo, importar el resto?</span></b>';
                        $jsnPhpScriptResponse['arrResult'] .= "<br /><br />";
                    }else{

                    }
                    $jsnPhpScriptResponse['arrResult'] .= '<input id="btnImportSubmit" type="button" value="importar" onclick="importExcel();" tempfile="' . $strTempFileName . '" class="buttons button_green">';
                    $jsnPhpScriptResponse['strFileName'] = $strTempFileName;
                }
                unset($objPHPExcelReader);
            }
            $objPHPExcel->disconnectWorksheets();
            unset($objPHPExcel);
        }
        break;
    case 'removeTempFile':
        unlink($_REQUEST['strTempFile']);
        break;
    case 'importExcel':
        $jsnPhpScriptResponse = array('strFileName'=>'','arrResult'=>'','strError'=>'');
        $strTempFileName = $_REQUEST['strTempFile'];
        require_once('../../lib/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $arrFileTypes = array('Excel2007', 'Excel5');
        $strExcelVersion = '';
        foreach ($arrFileTypes as $objFileType) {
            $objPHPExcelReader = PHPExcel_IOFactory::createReader($objFileType);
            if ($objPHPExcelReader->canRead($strTempFileName)) {
                $strExcelVersion = $objFileType;
                unset($objPHPExcelReader);
                break;
            }
        }
        $objPHPExcelReader = PHPExcel_IOFactory::createReader($strExcelVersion);
        $objPHPExcelReader = PHPExcel_IOFactory::load($strTempFileName);
        $objPHPExcelReader->setActiveSheetIndex(0);
        $arrExcelRows = $objPHPExcelReader->getActiveSheet()->toArray(null,true,true,false);
        if(count($arrExcelRows)>=2){
            $arrFormField = json_decode($objAscend->arrFormField, true);
            $arrTableRelation = json_decode($objAscend->arrTableRelation, true);
            $intNumberOfColumns = count($arrFormField) + count($arrTableRelation);
            $arrRecord = array();
            foreach($arrExcelRows as $intRowIndex=>$objRow){
                if($intRowIndex>0){
                    $blnCellValueError = false;
                    foreach($objRow as $intColIndex=>$objCell){
                        if($intColIndex<$intNumberOfColumns){
                            $varValue = trim(strtoupper($objCell));
                            if($varValue=='') {
                                $blnCellValueError = true;
                            }
                        }
                    }
                    unset($intColIndex);
                    unset($objCell);
                    if(!$blnCellValueError){
                        $blnCellValueError = false;
                        $strCellName = '';
                        foreach($objRow as $intColIndex=>$objCell){
                            if($intColIndex<count($arrFormField)){
                                $varValue = trim(strtoupper($objCell));
                                if ($arrFormField[$intColIndex]['TBL_TYPE']=='N'){
                                    if(!is_numeric($varValue)){
                                        $strCellName .= $arrFormField[$intColIndex]['TBL_NAME'] . ", ";
                                        $blnCellValueError = true;
                                    }
                                }
                            }
                        }
                        unset($intColIndex);
                        unset($objCell);
                        if(!$blnCellValueError){
                            $strInsertRecordFields = "";
                            $strInsertRecordValues = "";
                            $strUpdateValues = "";
                            $strUpdateNeedle = "";
                            $strIDValue = "";
                            foreach($objRow as $intColIndex=>$objCell) {
                                $varValue = trim(strtoupper($objCell));
                                if($intColIndex<count($arrFormField)){
                                    $strInsertRecordFields .= $arrFormField[$intColIndex]['TBL_FIELD'] . ",";
                                    $strInsertRecordValues .= "'" . $varValue . "',";
                                    if($arrFormField[$intColIndex]['TBL_DUPLICATE']==0){
                                        $strIDValue = $varValue;
                                        $strUpdateNeedle = $arrFormField[$intColIndex]['TBL_FIELD'] . " = '" . $varValue . "'";
                                    }else{
                                        $strUpdateValues = $arrFormField[$intColIndex]['TBL_FIELD'] . " = '" . $varValue . "',";
                                    }
                                }else{
                                    $strSqlInsertRecord = "INSERT INTO " . $objAscend->strTableName . "(" . $objAscend->strTableIdField . "," . substr($strInsertRecordFields,0,strlen($strInsertRecordFields) - 1) . ") VALUES((SELECT NVL(MAX(" . $objAscend->strTableIdField . "),0) + 1 FROM " . $objAscend->strTableName . ")," . substr($strInsertRecordValues,0,strlen($strInsertRecordValues) - 1) . ")";
                                    $objAscend->dbInsert($strSqlInsertRecord);
                                    if(count($arrFormField)>1){
                                        $strSqlUpdateRecord = "UPDATE " . $objAscend->strTableName . " SET " . substr($strUpdateValues,0,strlen($strUpdateValues) - 1) . " WHERE " . $strUpdateNeedle;
                                        $objAscend->dbUpdate($strSqlUpdateRecord);
                                        $jsnPhpScriptResponse['arrResult'] .= '<b>Registro ' . $intRowIndex . ' </b> ' . $strSqlUpdateRecord . '<br />';
                                    }
                                    if($intColIndex<$intNumberOfColumns){
                                        switch($arrTableRelation[$intColIndex - count($arrFormField)]['TBL_NAME']){
                                            case 'PLANT_COUNTRY':
                                                $strRelationSql = "SELECT CNT_COUNTRY.CNT_ID AS RELATIONID FROM CNT_COUNTRY WHERE CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME = '" . $varValue . "'";
                                                break;
                                            case 'SHIP_PLANT':
                                                $strRelationSql = "SELECT PLN_PLANT_RELATION.PLN_ID AS RELATIONID FROM PLN_PLANT, CNT_COUNTRY, PLN_PLANT_RELATION WHERE PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME = '" . $varValue . "'";
                                                break;
                                            case 'DIVISION_SHIP':
                                                $strRelationSql = "SELECT SHP_SHIP_RELATION.SHP_ID AS RELATIONID FROM SHP_SHIP_RELATION, PLN_PLANT_RELATION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME = '" . $varValue . "'";
                                                break;
                                            case 'SEGMENT_DIVISION':
                                                $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS RELATIONID FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME = '" . $varValue . "'";
                                                break;
                                            case 'PROFITCENTER_SEGMENT':
                                                $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS RELATIONID FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME  = '" . $varValue . "'";
                                                break;
                                            case 'APD_SEGMENT':
                                                $strRelationSql = "SELECT SGM_SEGMENT_RELATION.SGM_ID AS RELATIONID FROM SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME = '" . $varValue . "'";
                                                break;
                                            case 'COSTCENTER_DIVISION':
                                                $strRelationSql = "SELECT DVS_DIVISION_RELATION.DVS_ID AS RELATIONID FROM DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME = '" . $varValue . "'";
                                                break;
                                            case 'STATION_AREA':
                                                $strRelationSql = "SELECT ARE_AREA.ARE_ID AS RELATIONID FROM ARE_AREA WHERE ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME = '" . $varValue . "'";
                                                break;
                                            case 'LINE_STATION':
                                                $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS RELATIONID FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                break;
                                            case 'FAULT_STATION':
                                                $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS RELATIONID FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                break;
                                            case 'CAUSE_FAULT':
                                                $strRelationSql = "SELECT FLT_FAULT_RELATION.FLT_ID AS RELATIONID FROM FLT_FAULT_RELATION, STT_STATION_RELATION, FLT_FAULT, STT_STATION, ARE_AREA WHERE FLT_FAULT_RELATION.FLT_STATION = STT_STATION_RELATION.STT_ID AND FLT_FAULT_RELATION.FLT_FAULT = FLT_FAULT.FLT_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND FLT_FAULT_RELATION.FLT_STATUS = 1 AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME||' - '||FLT_FAULT.FLT_NAME = '" . $varValue . "'";
                                                break;
                                            case 'SCRAPCODE_CAUSE':
                                                $strRelationSql = "SELECT CAS_CAUSE.CAS_ID AS RELATIONID FROM CAS_CAUSE WHERE CAS_STATUS = 1 AND CAS_NAME = '" . $varValue . "'";
                                                break;
                                            case 'PART_UNIT':
                                                $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS RELATIONID FROM UNT_UNIT WHERE UNT_STATUS = 1 AND UNT_CODE = '" . $varValue . "'";
                                                break;
                                            case 'PART_TYPE':
                                                $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS RELATIONID FROM TYP_TYPE WHERE TYP_STATUS = 1 AND TYP_NAME = '" . $varValue . "'";
                                                break;
                                            case 'ASSEMBLY_UNIT':
                                                $strRelationSql = "SELECT UNT_UNIT.UNT_ID AS RELATIONID FROM UNT_UNIT WHERE UNT_STATUS = 1 AND UNT_CODE = '" . $varValue . "'";
                                                break;
                                            case 'ASSEMBLY_TYPE':
                                                $strRelationSql = "SELECT TYP_TYPE.TYP_ID AS RELATIONID FROM TYP_TYPE WHERE TYP_STATUS = 1 AND TYP_NAME = '" . $varValue . "'";
                                                break;
                                            case 'PROJECT_PROFITCENTER':
                                                $strRelationSql = "SELECT PRF_PROFITCENTER_RELATION.PRF_ID AS RELATIONID FROM PRF_PROFITCENTER_RELATION, SGM_SEGMENT_RELATION, DVS_DIVISION_RELATION, SHP_SHIP_RELATION, PLN_PLANT_RELATION, PRF_PROFITCENTER, SGM_SEGMENT, DVS_DIVISION, SHP_SHIP, PLN_PLANT, CNT_COUNTRY WHERE PRF_PROFITCENTER_RELATION.PRF_SEGMENT = SGM_SEGMENT_RELATION.SGM_ID AND SGM_SEGMENT_RELATION.SGM_DIVISION = DVS_DIVISION_RELATION.DVS_ID AND DVS_DIVISION_RELATION.DVS_SHIP = SHP_SHIP_RELATION.SHP_ID AND SHP_SHIP_RELATION.SHP_PLANT = PLN_PLANT_RELATION.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_PROFITCENTER = PRF_PROFITCENTER.PRF_ID AND SGM_SEGMENT_RELATION.SGM_SEGMENT = SGM_SEGMENT.SGM_ID AND DVS_DIVISION_RELATION.DVS_DIVISION = DVS_DIVISION.DVS_ID AND SHP_SHIP_RELATION.SHP_SHIP = SHP_SHIP.SHP_ID AND PLN_PLANT_RELATION.PLN_PLANT = PLN_PLANT.PLN_ID AND PLN_PLANT_RELATION.PLN_COUNTRY = CNT_COUNTRY.CNT_ID AND PRF_PROFITCENTER_RELATION.PRF_STATUS = 1 AND SGM_SEGMENT_RELATION.SGM_STATUS = 1 AND DVS_DIVISION_RELATION.DVS_STATUS = 1 AND SHP_SHIP_RELATION.SHP_STATUS = 1 AND PLN_PLANT_RELATION.PLN_STATUS = 1 AND PRF_PROFITCENTER.PRF_STATUS = 1 AND SGM_SEGMENT.SGM_STATUS = 1 AND DVS_DIVISION.DVS_STATUS = 1 AND SHP_SHIP.SHP_STATUS = 1 AND PLN_PLANT.PLN_STATUS = 1 AND CNT_COUNTRY.CNT_STATUS = 1 AND CNT_COUNTRY.CNT_NAME||' - '||PLN_PLANT.PLN_NAME||' - '||SHP_SHIP.SHP_NAME||' - '||DVS_DIVISION.DVS_NAME||' - '||SGM_SEGMENT.SGM_NAME||' - '||PRF_PROFITCENTER.PRF_NAME = '" . $varValue . "'";
                                                break;
                                            case 'PROJECT_STATION':
                                                $strRelationSql = "SELECT STT_STATION_RELATION.STT_ID AS RELATIONID FROM STT_STATION, ARE_AREA, STT_STATION_RELATION WHERE STT_STATION_RELATION.STT_AREA = ARE_AREA.ARE_ID AND STT_STATION_RELATION.STT_STATION = STT_STATION.STT_ID AND STT_STATION_RELATION.STT_STATUS = 1 AND STT_STATION.STT_STATUS = 1 AND ARE_AREA.ARE_STATUS = 1 AND ARE_AREA.ARE_NAME||' - '||STT_STATION.STT_NAME = '" . $varValue . "'";
                                                break;
                                            case 'ASSEMBLY_PART':
                                                $strRelationSql = "SELECT PRT_PART.PRT_ID AS RELATIONID FROM PRT_PART WHERE PRT_STATUS = 1 AND PRT_NUMBER = '" . $varValue . "'";
                                                break;
                                            case 'PROJECT_PART':
                                                $strRelationSql = "SELECT PRT_PART.PRT_ID AS RELATIONID FROM PRT_PART WHERE PRT_STATUS = 1 AND PRT_NUMBER = '" . $varValue . "'";
                                                break;
                                            case 'PROJECT_ASSEMBLY':
                                                $strRelationSql = "SELECT ASM_ASSEMBLY.ASM_ID AS RELATIONID FROM ASM_ASSEMBLY WHERE ASM_STATUS = 1 AND ASM_NAME = '" . $varValue . "'";
                                                break;
                                            case 'PROJECT_SCRAPCODE':
                                                $strRelationSql = "SELECT SCD_SCRAPCODE.SCD_ID AS RELATIONID FROM SCD_SCRAPCODE WHERE SCD_STATUS = 1 AND SCD_CODE||' - '||SCD_NAME = '" . $varValue . "'";
                                                break;
                                        }
                                        $intRelationID = 0;
                                        $rstExcelRelation = $objAscend->dbQuery($strRelationSql);
                                        if($objAscend->intMySqlAffectedRows!=0){
                                            $intRelationID = $rstExcelRelation[0]['RELATIONID'];
                                        }
                                        unset($rstExcelRelation);
                                        if($intRelationID!=0){
                                            $strSqlRecordId = "SELECT " . $objAscend->strTableIdField . " AS FIELDID FROM " . $objAscend->strTableName . " WHERE " . $strUpdateNeedle;
                                            $rstRecordId = $objAscend->dbQuery($strSqlRecordId);
                                            $intRecordId = $rstRecordId[0]['FIELDID'];
                                            unset($rstRecordId);
                                            $strSqlInsertRelation = relationTable($arrTableRelation[$intColIndex - count($arrFormField)]['TBL_NAME'],"INSERT INTO ||strTable||(||strField_Id||,||strField_0||,||strField_1||) VALUES((SELECT NVL(MAX(||strField_Id||),0) + 1 FROM ||strTable||)," . $intRecordId . "," . $intRelationID . ")");
                                            $objAscend->dbInsert($strSqlInsertRelation);
                                        }
                                    }else{
                                        break;
                                    }
                                }
                            }
                            unset($intColIndex);
                            unset($objCell);
                        }
                    }
                }
            }
        }
        unset($objPHPExcelReader);
        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
        unlink($strTempFileName);
        break;
    case 'importImages':
        $jsnPhpScriptResponse = array('strResult'=>'');
        $strFileExtension = strtolower($_REQUEST['strFileExtension']);
        if (0 < $_FILES['file']['error']){
            $jsnPhpScriptResponse['strResult'] = $_FILES['file']['error'];
        }else {
            $strTempFileName = IMAGES_UPLOAD_PATH . "tmp_images_" . date('YmdHisu') . $strFileExtension;
            move_uploaded_file($_FILES['file']['tmp_name'], $strTempFileName);
            $blnValidFile = false;
            $objZip = new ZipArchive();
            $intResult = $objZip->open($strTempFileName);
            if($objZip->open($strTempFileName)!=1){
                $jsnPhpScriptResponse['strResult'] = '# archivo corruputo o de tipo invalido';
                unlink($strTempFileName);
            }else{
                $objZip->extractTo(IMAGES_UPLOAD_PATH);
                unlink($strTempFileName);
                $arrFiles = scandir(IMAGES_UPLOAD_PATH);
                foreach($arrFiles as $objFiles){
                    if($objFiles!='.' && $objFiles!='..'){
                        if(exif_imagetype(IMAGES_UPLOAD_PATH . $objFiles)!=IMAGETYPE_JPEG){
                            $jsnPhpScriptResponse['strResult'] .= '# ' . $objFiles . ' ... formato de imágen inválido<br />';
                        }else{
                            $strFile = str_replace('.JPEG','',str_replace('.JPG','',strtoupper($objFiles)));
                            switch($objAscend->intTableId){
                                case 18:
                                    $strSql = "SELECT COUNT(*) AS COUNT FROM PRT_PART WHERE PRT_NUMBER = '" . $strFile . "'";
                                    break;
                                case 21:
                                    $strSql = "SELECT COUNT(*) AS COUNT FROM ASM_ASSEMBLY WHERE ASM_NAME = '" . $strFile . "'";
                                    break;
                            }
                            $rstCount = $objAscend->dbQuery($strSql);
                            if($rstCount[0]['COUNT']!=0){
                                $jsnPhpScriptResponse['strResult'] .= '# ' . $objFiles . ' ... no registrado<br />';
                            }else{
                                $intWidth = 150;
                                $intHeight = 150;
                                list($intOriginalWidth, $intOriginalHeight) = getimagesize(IMAGES_UPLOAD_PATH . $objFiles);
                                $intOriginalRatio = $intOriginalWidth / $intOriginalHeight;
                                if ($intWidth / $intHeight > $intOriginalRatio) {
                                    $intWidth = $intHeight * $intOriginalRatio;
                                } else {
                                    $intHeight = $intWidth / $intOriginalRatio;
                                }
                                $objImage = imagecreatetruecolor($intWidth, $intHeight);
                                $objNewImage = imagecreatefromjpeg(IMAGES_UPLOAD_PATH . $objFiles);
                                imagecopyresampled($objImage, $objNewImage, 0, 0, 0, 0, $intWidth, $intHeight, $intOriginalWidth, $intOriginalHeight);
                                if(file_exists(PART_IMAGES_PATH . $strFile . '.jpg')){
                                    unlink(PART_IMAGES_PATH . $strFile . '.jpg');
                                    $jsnPhpScriptResponse['strResult'] .= '# ' . $objFiles . ' ... actualizado<br />';
                                }else{
                                    $jsnPhpScriptResponse['strResult'] .= '# ' . $objFiles . ' ... agregado<br />';
                                }
                                imagejpeg($objImage, PART_IMAGES_PATH . $strFile . '.jpg', 72);
                            }
                            unset($rstCount);
                            unlink(IMAGES_UPLOAD_PATH . $objFiles);
                        }
                    }
                }
                unset($objFiles);
            }
            $objZip->close();
            unset($zip);
        }
        break;
};
unset($objAscend);
echo json_encode($jsnPhpScriptResponse);

function relationTable($strRelation,$strSql)
{
    switch($strRelation)
    {
        case 'PLANT_COUNTRY':
            $strSql = str_replace("||strTable||","PLN_PLANT_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","PLN_ID",$strSql);
            $strSql = str_replace("||strField_0||","PLN_PLANT",$strSql);
            $strSql = str_replace("||strField_1||","PLN_COUNTRY",$strSql);
            $strSql = str_replace("||strField_Status||","PLN_STATUS",$strSql);
            return $strSql;
            break;
        case 'SHIP_PLANT':
            $strSql = str_replace("||strTable||","SHP_SHIP_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","SHP_ID",$strSql);
            $strSql = str_replace("||strField_0||","SHP_SHIP",$strSql);
            $strSql = str_replace("||strField_1||","SHP_PLANT",$strSql);
            $strSql = str_replace("||strField_Status||","SHP_STATUS",$strSql);
            return $strSql;
            break;
        case 'DIVISION_SHIP':
            $strSql = str_replace("||strTable||","DVS_DIVISION_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","DVS_ID",$strSql);
            $strSql = str_replace("||strField_0||","DVS_DIVISION",$strSql);
            $strSql = str_replace("||strField_1||","DVS_SHIP",$strSql);
            $strSql = str_replace("||strField_Status||","DVS
            _STATUS",$strSql);
            return $strSql;
            break;
        case 'SEGMENT_DIVISION':
            $strSql = str_replace("||strTable||","SGM_SEGMENT_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","SGM_ID",$strSql);
            $strSql = str_replace("||strField_0||","SGM_SEGMENT",$strSql);
            $strSql = str_replace("||strField_1||","SGM_DIVISION",$strSql);
            $strSql = str_replace("||strField_Status||","SGM_STATUS",$strSql);
            break;
        case 'PROFITCENTER_SEGMENT':
            $strSql = str_replace("||strTable||","PRF_PROFITCENTER_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","PRF_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRF_PROFITCENTER",$strSql);
            $strSql = str_replace("||strField_1||","PRF_SEGMENT",$strSql);
            $strSql = str_replace("||strField_Status||","PRF_STATUS",$strSql);
            break;
        case 'APD_SEGMENT':
            $strSql = str_replace("||strTable||","APD_APD_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","APD_ID",$strSql);
            $strSql = str_replace("||strField_0||","APD_APD",$strSql);
            $strSql = str_replace("||strField_1||","APD_SEGMENT",$strSql);
            $strSql = str_replace("||strField_Status||","APD_STATUS",$strSql);
            break;
        case 'COSTCENTER_DIVISION':
            $strSql = str_replace("||strTable||","CST_COSTCENTER_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","CST_ID",$strSql);
            $strSql = str_replace("||strField_0||","CST_COSTCENTER",$strSql);
            $strSql = str_replace("||strField_1||","CST_DIVISION",$strSql);
            $strSql = str_replace("||strField_Status||","CST_STATUS",$strSql);
            break;
        case 'STATION_AREA':
            $strSql = str_replace("||strTable||","STT_STATION_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","STT_ID",$strSql);
            $strSql = str_replace("||strField_0||","STT_STATION",$strSql);
            $strSql = str_replace("||strField_1||","STT_AREA",$strSql);
            $strSql = str_replace("||strField_Status||","STT_STATUS",$strSql);
            return $strSql;
            break;
        case 'LINE_STATION':
            $strSql = str_replace("||strTable||","LIN_LINE_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","LIN_ID",$strSql);
            $strSql = str_replace("||strField_0||","LIN_LINE",$strSql);
            $strSql = str_replace("||strField_1||","LIN_STATION",$strSql);
            $strSql = str_replace("||strField_Status||","LIN_STATUS",$strSql);
            return $strSql;
            break;
        case 'FAULT_STATION':
            $strSql = str_replace("||strTable||","FLT_FAULT_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","FLT_ID",$strSql);
            $strSql = str_replace("||strField_0||","FLT_FAULT",$strSql);
            $strSql = str_replace("||strField_1||","FLT_STATION",$strSql);
            $strSql = str_replace("||strField_Status||","FLT_STATUS",$strSql);
            return $strSql;
            break;
        case 'CAUSE_FAULT':
            $strSql = str_replace("||strTable||","CAS_CAUSE_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","CAS_ID",$strSql);
            $strSql = str_replace("||strField_0||","CAS_CAUSE",$strSql);
            $strSql = str_replace("||strField_1||","CAS_FAULT",$strSql);
            $strSql = str_replace("||strField_Status||","CAS_STATUS",$strSql);
            return $strSql;
            break;
        case 'SCRAPCODE_CAUSE':
            $strSql = str_replace("||strTable||","SCD_SCRAPCODE_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","SCD_ID",$strSql);
            $strSql = str_replace("||strField_0||","SCD_SCRAPCODE",$strSql);
            $strSql = str_replace("||strField_1||","SCD_CAUSE",$strSql);
            $strSql = str_replace("||strField_Status||","SCD_STATUS",$strSql);
            return $strSql;
            break;
        case 'PART_UNIT':
            $strSql = str_replace("||strTable||","PRT_PART_UNIT",$strSql);
            $strSql = str_replace("||strField_Id||","PRT_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRT_PART",$strSql);
            $strSql = str_replace("||strField_1||","PRT_UNIT",$strSql);
            $strSql = str_replace("||strField_Status||","PRT_STATUS",$strSql);
            return $strSql;
            break;
        case 'PART_TYPE':
            $strSql = str_replace("||strTable||","PRT_PART_TYPE",$strSql);
            $strSql = str_replace("||strField_Id||","PRT_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRT_PART",$strSql);
            $strSql = str_replace("||strField_1||","PRT_TYPE",$strSql);
            $strSql = str_replace("||strField_Status||","PRT_STATUS",$strSql);
            return $strSql;
            break;
        case 'ASSEMBLY_UNIT':
            $strSql = str_replace("||strTable||","ASM_ASSEMBLY_UNIT",$strSql);
            $strSql = str_replace("||strField_Id||","ASM_ID",$strSql);
            $strSql = str_replace("||strField_0||","ASM_ASSEMBLY",$strSql);
            $strSql = str_replace("||strField_1||","ASM_UNIT",$strSql);
            $strSql = str_replace("||strField_Status||","ASM_STATUS",$strSql);
            return $strSql;
            break;
        case 'ASSEMBLY_TYPE':
            $strSql = str_replace("||strTable||","ASM_ASSEMBLY_TYPE",$strSql);
            $strSql = str_replace("||strField_Id||","ASM_ID",$strSql);
            $strSql = str_replace("||strField_0||","ASM_ASSEMBLY",$strSql);
            $strSql = str_replace("||strField_1||","ASM_TYPE",$strSql);
            $strSql = str_replace("||strField_Status||","ASM_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROFILE_MENU':
            $strSql = str_replace("||strTable||","PRO_PROFILE_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","PRO_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRO_PROFILE",$strSql);
            $strSql = str_replace("||strField_1||","PRO_MENU",$strSql);
            $strSql = str_replace("||strField_Status||","PRO_STATUS",$strSql);
            return $strSql;
            break;
        case 'USER_PROFILE':
            $strSql = str_replace("||strTable||","USR_USER_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","USR_ID",$strSql);
            $strSql = str_replace("||strField_0||","USR_USER",$strSql);
            $strSql = str_replace("||strField_1||","USR_PROFILE",$strSql);
            $strSql = str_replace("||strField_Status||","USR_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROJECT_PROFITCENTER':
            $strSql = str_replace("||strTable||","PRJ_PROJECT_PROFITCENTER",$strSql);
            $strSql = str_replace("||strField_Id||","PRJ_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRJ_PROJECT",$strSql);
            $strSql = str_replace("||strField_1||","PRJ_PROFITCENTER",$strSql);
            $strSql = str_replace("||strField_Status||","PRJ_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROJECT_STATION':
            $strSql = str_replace("||strTable||","PRJ_PROJECT_STATION",$strSql);
            $strSql = str_replace("||strField_Id||","PRJ_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRJ_PROJECT",$strSql);
            $strSql = str_replace("||strField_1||","PRJ_STATION",$strSql);
            $strSql = str_replace("||strField_Status||","PRJ_STATUS",$strSql);
            return $strSql;
            break;
        case 'ASSEMBLY_PART':
            $strSql = str_replace("||strTable||","ASM_ASSEMBLY_RELATION",$strSql);
            $strSql = str_replace("||strField_Id||","ASM_ID",$strSql);
            $strSql = str_replace("||strField_0||","ASM_ASSEMBLY",$strSql);
            $strSql = str_replace("||strField_1||","ASM_PART",$strSql);
            $strSql = str_replace("||strField_Status||","ASM_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROJECT_PART':
            $strSql = str_replace("||strTable||","PRJ_PROJECT_PART",$strSql);
            $strSql = str_replace("||strField_Id||","PRJ_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRJ_PROJECT",$strSql);
            $strSql = str_replace("||strField_1||","PRJ_PART",$strSql);
            $strSql = str_replace("||strField_Status||","PRJ_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROJECT_ASSEMBLY':
            $strSql = str_replace("||strTable||","PRJ_PROJECT_ASSEMBLY",$strSql);
            $strSql = str_replace("||strField_Id||","PRJ_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRJ_PROJECT",$strSql);
            $strSql = str_replace("||strField_1||","PRJ_ASSEMBLY",$strSql);
            $strSql = str_replace("||strField_Status||","PRJ_STATUS",$strSql);
            return $strSql;
            break;
        case 'PROJECT_SCRAPCODE':
            $strSql = str_replace("||strTable||","PRJ_PROJECT_SCRAPCODE",$strSql);
            $strSql = str_replace("||strField_Id||","PRJ_ID",$strSql);
            $strSql = str_replace("||strField_0||","PRJ_PROJECT",$strSql);
            $strSql = str_replace("||strField_1||","PRJ_SCRAPCODE",$strSql);
            $strSql = str_replace("||strField_Status||","PRJ_STATUS",$strSql);
            return $strSql;
            break;
    }
    return $strSql;
}

function stripAccents($strString) {
    return strtr(utf8_decode($strString), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
?>