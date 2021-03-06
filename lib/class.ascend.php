<?php

class clsAscend
{
    private $conMysql;

    public $intLastInsertedId;
    public $intMySqlAffectedRows;
    public $strTransactionErrorCode;
    public $strTransactionErrorMessage;

    //atributos para Pagineo
    public $intTableId;
    public $strTableName;
    public $arrTableField = array();
    public $arrTableRelation = array();
    public $strGrid;
    public $strGridPagination;
    public $strGridTitle;
    public $strGridSql;
    public $strGridSqlOrder;
    public $intGridSqlPage;
    public $intGridSqlLimit;
    public $intScrollPosition;
    public $intGridNumberOfColumns;
    public $intGridNumberOfRecords;
    public $strGridHeader;
    public $strGridForm;
    public $strGridOption;
    public $strTableIdField;
    public $strTableStatusField;
    public $arrFormField = array();
    public $strIncludeJS;
    public $objTableRelation = array();
    public $objTableRelationCatalogs = array();
    //atributos para Pagineo

    function __construct(){

        $this->conMysql = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_report(MYSQLI_REPORT_OFF);
        mysqli_query($this->conMysql, "SET NAMES 'utf8'");
    }

    function __destruct(){

        if(isset($this->conMysql))
        {
            mysqli_close($this->conMysql);
            unset($this->conMysql);
        }
    }

    function dbOpenTransaction(){
        mysqli_begin_transaction($this->conMysql,MYSQLI_TRANS_START_READ_WRITE);
    }

    function dbCommitTransaction(){
        mysqli_commit($this->conMysql);
    }

    function dbRollbackTransaction(){
        mysqli_rollback($this->conMysql);
    }

    function dbInsert($strSql, $strUser = '', $strSource = ''){
        $this->strTransactionErrorCode = '';
        $this->strTransactionErrorMessage = '';
        try{mysqli_query($this->conMysql, $strSql);
            $this->intLastInsertedId = mysqli_insert_id($this->conMysql);
            if($strUser!='' && $strSource!=''){
                //RUTINA DE INSERT AL LOG
            }
        }catch (Exception $strException){
            $this->strTransactionErrorCode = $strException->getCode();
            $this->strTransactionErrorMessage = $strException->getMessage();
        }
    }

    function dbQuery($strSql)
    {
        try
        {
            $this->strTransactionErrorCode = '';
            $this->strTransactionErrorMessage = '';
            //echo $strSql;
            $rstData = mysqli_query($this->conMysql,$strSql);
            $arrRows = array();
            if(mysqli_error($this->conMysql)){
                $this->strTransactionErrorCode = mysqli_error($this->conMysql);
                $this->strTransactionErrorMessage = mysqli_error($this->conMysql);
            }
            else
            {

                while($objData = mysqli_fetch_assoc($rstData)){
                    $arrRows[] = $objData;
                }
                $this->intMySqlAffectedRows = count($arrRows);
                unset($objData);
                mysqli_free_result($rstData);
            }
            unset($rstData);
            return $arrRows;
        }
        catch(Exception $objMySqlError)
        {
            $this->strTransactionErrorCode = $objMySqlError->getCode();
            $this->strTransactionErrorMessage = $objMySqlError->getMessage();
        }
    }

    function dbUpdate($strSql, $strUser = '', $strSource = '')
    {
        $this->strTransactionErrorCode = '';
        $this->strTransactionErrorMessage = '';
        try{mysqli_query($this->conMysql, $strSql);
            if($strUser!='' && $strSource!=''){
                //RUTINA DE INSERT AL LOG
            }
        }catch (Exception $strException){
            $this->strTransactionErrorCode = $strException->getCode();
            $this->strTransactionErrorMessage = $strException->getMessage();
        }
    }

    function dbDelete($strSql, $strUser = '', $strSource = '')
    {
        $this->strTransactionErrorCode = '';
        $this->strTransactionErrorMessage = '';
        try{mysqli_query($this->conMysql, $strSql);
            if($strUser!='' && $strSource!=''){
                //RUTINA DE INSERT AL LOG
            }
        }catch (Exception $strException){
            $this->strTransactionErrorCode = $strException->getCode();
            $this->strTransactionErrorMessage = $strException->getMessage();
        }
    }

    //funciones pagineo

    function buildGridSortCell($intSort, $strName, $strField){
        $strSortCell = '';
        $strSortCell .= '<th class="thGrid">';
        if($intSort==1){
            $strSortCell .= '<table style="border:0; border-collapse: collapse; border-spacing: 0; width: 100%; " class="tblSort">';
            $strSortCell .= '<tr style="height: 14px">';
            $strSortCell .= '<td rowspan="2" style="text-align: left; padding: 0 4px 0 0; margin: 0 0 0 0;">' . $strName . '</td>';
            $strSortCell .= '<td class="arrow" style="cursor:pointer; font-size: 7pt;vertical-align: middle; padding: 0 0 0 0; margin: 0 0 0 0;" title="' . $strName . ' ASC" onclick="gridSort(\'' . $strField . ' ASC\')">&#9650;</td>';
            $strSortCell .= '</tr>';
            $strSortCell .= '<tr style="height: 14px">';
            $strSortCell .= '<td class="arrow" style="cursor:pointer; font-size: 7pt;vertical-align: middle; padding: 0 0 0 0; margin: 0 0 0 0;" title="' . $strName . ' DESC" onclick="gridSort(\'' . $strField . ' DESC\')">&#9660;</td>';
            $strSortCell .= '</tr>';
            $strSortCell .= '</table>';
        }else{
            $strSortCell .= $strName;
        }
        $strSortCell .= '</th>';
        return $strSortCell;
    }

    function getTableData()
    {
        $strSql = "SELECT * FROM tblTable WHERE intId = " . $this->intTableId;
        $rstTable = $this->dbQuery($strSql);
        $this->strGridTitle = $rstTable[0]['strDisplay'];
        $this->strTableName = $rstTable[0]['strName'];
        $this->strIncludeJS = $rstTable[0]['strIncludeJs'];
        unset($rstTable);
        $strSql = 'SELECT * FROM tblTableField WHERE intTable = ' . $this->intTableId . ' ORDER BY intOrder';
        $rstField = $this->dbQuery($strSql);
        $this->intGridNumberOfColumns = $this->intMySqlAffectedRows + 1;


        $strTableSqlSelect = 'SELECT ';
        $strTableSqlFrom = ' FROM ' . $rstTable[0]['strName'] . ' T1 ';
        $strTableSqlJoin = '';
        $strTableSqlWhere = ' WHERE ';
        $strTableSqlOrder = '';

        $this->strGridHeader = '<tr>';
        $this->strGridForm = '<table class="form_main_table">';
        foreach ($rstField as $objField) {
            array_push($this->arrTableField, array(
                    'intId' => $objField['intId'],
                    'strField' => $objField['strField'],
                    'strName' => $objField['strName'],
                    'strType' => $objField['strType'],
                    'intDisplay' => $objField['intDisplay'],
                    'strAlign' => $objField['strAlign'],
                    'intSort' => $objField['intSort'],
                    'strFunction' => $objField['strFunction'],
                    'intOrder' => $objField['intOrder'],
                    'intStatusField' => $objField['intStatusField'],
                    'intIdField' => $objField['intIdField'],
                    'intEdit' => $objField['intEdit'],
                    'intDuplicate' => $objField['intDuplicate'],
                    'intLength' => $objField['intLength']
                )
            );
            if ($objField['intIdField'] == 1) {
                $strTableSqlOrder = $objField['strField'];
                $this->strTableIdField = $objField['strField'];
            }
            if ($objField['intStatusField'] == 1) {
                $strTableSqlWhere .= ' T1.' . $objField['strField'];
                $this->strTableStatusField = $objField['strField'];
            }
            $strTableSqlSelect .= ' T1.'  .$objField['strField'] . ', ';
            if( $objField['strType'] == "R" )
            {
                /*
                ##### Rlations Routine #####
                */

                $strSqlTableRelation = "SELECT TR.intId, TR.strRelationName, TR.strRelationAlias, TR.intOriginField, TFO.strField AS strOriginField, TR.intDestinyField, TFD.strField AS strDestinyField, TR.intDescriptionField, TFDESC.strField AS strDescriptionField, TR.strType, TR.intOriginTable, TTO.strTable AS strOriginTable "
                ."FROM tblTableRelation TR "
                ."LEFT JOIN tblTable TTO ON TR.intOriginTable = TTO.intId "
                ."LEFT JOIN tblTableField TFD ON TR.intDestinyField = TFD.intId "
                ."LEFT JOIN tblTableField TFO ON TR.intOriginField = TFO.intId "
                ."LEFT JOIN tblTableField TFDESC ON TR.intDescriptionField = TFDESC.intId "
                ."WHERE TR.intDestinyField = " . $objField['intId'] . ";";
                //echo "<br><br>".$strSqlTableRelation."<br><br>";
                $rstTableRelation = $this->dbQuery($strSqlTableRelation);

                if( count($rstTableRelation) > 0 )
                {
                    $this-> objTableRelation = $rstTableRelation[0];
                    /*echo "<br><br>";
                    print_r($this-> objTableRelation);
                    echo"<br><br>";
                    echo $this-> objTableRelation['strRelationAlias'];
                    echo"<br><br>";*/
                    $strTableSqlSelect .= ' ' . $this-> objTableRelation['strRelationAlias'] . '.' . $this-> objTableRelation['strDescriptionField'] . ' AS ' . str_replace("int", "str", $objField['strField']) . ', ';
                    $strTableSqlJoin .= ' LEFT JOIN ' . $this-> objTableRelation['strOriginTable'] . ' ' . $this-> objTableRelation['strRelationAlias'] . ' ON T1.' . $this-> objTableRelation['strDestinyField'] . ' = ' . $this-> objTableRelation['strRelationAlias'] . '.' . $this-> objTableRelation['strOriginField'] . ' ';

                    $sqlTableCatalog = 'SELECT ' . $this-> objTableRelation['strRelationAlias'] . '.' . $this-> objTableRelation['strOriginField'] . ' AS intId, ' . $this-> objTableRelation['strRelationAlias'] . '.' . $this-> objTableRelation['strDescriptionField'] . ' AS strName '
                    .'FROM ' . $this-> objTableRelation['strOriginTable'] . ' ' . $this-> objTableRelation['strRelationAlias'] . ' '
                    .'ORDER BY strName;';
                    //echo "<br><br>" . $sqlTableCatalog . "<br><br>";
                    $rstTableCatalog = $this->dbQuery($sqlTableCatalog);
                    $objTableRelationCatalogs[$objField['intId']] = $rstTableCatalog;
                    /*echo "<br><br>";
                    print_r($objTableRelationCatalogs[ $this-> objTableRelation['strRelationAlias']]);
                    echo"<br><br>";*/
                }
            }

            if ($objField['intDisplay'] == 1) {
                $this->strGridHeader .= $this->buildGridSortCell($objField['intSort'],$objField['strName'],$objField['strField']);
            }
            if ($objField['intEdit'] == 1) {
                array_push($this->arrFormField, array(
                    'strField' => $objField['strField'],
                    'strName' => $objField['strName'],
                    'strType' => $objField['strType'],
                    'intDuplicate' => $objField['intDuplicate'],
                    'intLength' => $objField['intLength']
                ));
                $this->strGridForm .= '<tr>';
                $this->strGridForm .= '<td class="form_main_td_title"><label for="txt' . $objField['strField'] . '" class="form_label">' . $objField['strName'] . '</label></td>';
                $this->strGridForm .= '<td class="form_main_td_data">';
                switch ($objField['strType']) {
                    case 'N':
                        if($objField['intLength']==0){
                            $this->strGridForm .= '<input type="text" id="txt' . $objField['strField'] . '" class="form_input_text" style="width: 150px;" value="" maxlength="6" />';
                        }else{
                            $this->strGridForm .= '<input type="text" id="txt' . $objField['strField'] . '" class="form_input_text" style="width: 150px;" value="" maxlength="11" />';
                        }
                        break;
                    case 'T':
                        $this->strGridForm .= '<input type="text" id="txt' . $objField['strField'] . '" class="form_input_text" style="width: 150px;" value="" />';
                        break;
                    case 'S':
                        $this->strGridForm .= '<input type="text" id="txt' . $objField['strField'] . '" class="form_input_text" style="background-color:transparent; border:1px transparent solid; cursor:pointer;" onclick="changeSwitch2();" value="" />';
                        break;
                    case 'R':

                        $this->strGridForm .= '<select id="cbo' . $objField['intId'] . '" class="form_input_text" style="width: 150px;">';
                        foreach( $objTableRelationCatalogs[$objField['intId']] as $catalogRow )
                        {
                            $this->strGridForm .= '<option value="' . $catalogRow["intId"] . '">' . $catalogRow["strName"] . '</option>';
                        }
                        $this->strGridForm .= '</select>';
                        break;
                }
                $this->strGridForm .= '</td>';
                $this->strGridForm .= '</tr>';
            }
        }

        //$this ->printArray($objTableRelationCatalogs);



        $this->arrFormField = json_encode($this->arrFormField);
        $this->arrTableRelation = json_encode($this->arrTableRelation);
        $this->strGridHeader .= '<th class="thGrid" style="">Editar</th>';
        $this->strGridHeader .= '</tr>';
        $this->strGridForm .= '</table>';
        $strTableSqlSelect = substr($strTableSqlSelect, 0, strlen($strTableSqlSelect) - 2);
        $strTableSqlWhere .= " IN ('B','A') ";
        $this->strGridSql = $strTableSqlSelect . $strTableSqlFrom . $strTableSqlJoin . $strTableSqlWhere;
        /*echo"<br><br>";
        echo $this->strGridSql;
        echo"<br><br>";*/
        $this->strGridSqlOrder = $strTableSqlOrder . " ASC";
        $this->strGridOption = "default";
    }

    function updateGrid(){
        //echo $this->strGridSql . $this->strGridSqlOrder;
        switch ($this->strGridOption){
            case 'finder':

                break;

            case 'default':
                $rstData = $this->dbQuery($this->strGridSql . " ORDER BY " .  $this->strGridSqlOrder);

                $this->intGridNumberOfRecords = $this->intMySqlAffectedRows;
                if ($this->intGridNumberOfRecords != 0) {
                    $intPages = ceil($this->intGridNumberOfRecords / $this->intGridSqlLimit);
                } else {
                    $intPages = 1;
                }

                $intFirstRecord = ($this->intGridSqlLimit * $this->intGridSqlPage) - $this->intGridSqlLimit;
                $intLastRecord = $intFirstRecord + $this->intGridSqlLimit - 1;
                $this->strGrid = '';
                if ($this->intGridNumberOfRecords != 0)
                {
                    for ($intIndex = $intFirstRecord; $intIndex <= $intLastRecord; $intIndex++) {
                        $this->strGrid .= '<tr id="trGrid_' . $rstData[$intIndex][$this->strTableIdField] . '">';
                        for ($intArrayIndex = 0; $intArrayIndex < count($this->arrTableField); $intArrayIndex++) {
                            switch ($this->arrTableField[$intArrayIndex]['strType']) {
                                case 'N':
                                    $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['strField'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['strAlign'] . ';">' . number_format($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']], $this->arrTableField[$intArrayIndex]['intLength'], '.', ',') . '</td>';
                                    break;
                                case 'T':
                                    $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['strField'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['strAlign'] . ';">' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']] . '</td>';
                                    break;
                                case 'S':
                                    if($this->arrTableField[$intArrayIndex]['strField'] == $this->strTableStatusField){
                                        $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['strField'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['strAlign'] . ';">';
                                        if ($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']] == 1) {
                                            $this->strGrid .= '<label id="lblDeactivate_' . $rstData[$intIndex][$this->strTableIdField] . '" currentValue="' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']] . '" onclick="deactivateRecord(' . $rstData[$intIndex][$this->strTableIdField] . ');" class="labelActions labelActionsGreen">&#10004;</label>';
                                        } else {
                                            $this->strGrid .= '<label id="lblDeactivate_' . $rstData[$intIndex][$this->strTableIdField] . '" currentValue="' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']] . '" onclick="deactivateRecord(' . $rstData[$intIndex][$this->strTableIdField] . ');" class="labelActions labelActionsRed">&#10006;</label>';
                                        }
                                        $this->strGrid .= '</td>';
                                    }else{
                                        $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['strField'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['strAlign'] . ';">';
                                        if ($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['strField']] == 1) {
                                            $this->strGrid .= '&#10004;';
                                        } else {
                                            $this->strGrid .= '&#10006;';
                                        }
                                        $this->strGrid .= '</td>';
                                    }
                                    break;
                                case 'R':
                                    $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['strField'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['strAlign'] . ';">' . $rstData[$intIndex][ str_replace("int", "str", $this->arrTableField[$intArrayIndex]['strField'] ) ] . '</td>';
                                    break;
                            }
                        }
                        $this->strGrid .= '<td class="tdGrid" style="text-align: center;">';

                        $this->strGrid .= '<label id="lblEdit_' . $rstData[$intIndex][$this->strTableIdField] . '" onclick="showModal(' . $rstData[$intIndex][$this->strTableIdField] . ');" class="labelActions labelActionsOrange">&#9998;</label>';
                        $this->strGrid .= '</td>';
                        $this->strGrid .= '</tr>';
                        if ($intIndex == ($this->intGridNumberOfRecords - 1)) {
                            break;
                        }
                    };
                }
                else {
                    $this->strGrid .= '<tr><td class="tdGrid" style="text-align: center" colspan="' . $this->intGridNumberOfColumns . '">No existen registros</td></tr>';
                }
                $this->strGridPagination = '<div style="margin-bottom: 2px; vertical-align: top;">';
                if ($this->intGridSqlPage != 1) {
                    $this->strGridPagination .= '<label class="labelPagination" onclick="gridPagination(1)" title="Inicio">&#8920;</label>';
                    $this->strGridPagination .= '<label class="labelPagination" onclick="gridPagination(' . ($this->intGridSqlPage - 1) . ')" title="Anterior">&#8810</label>';
                } else {
                    $this->strGridPagination .= '<label class="labelPagination labelPaginationDisabled" title="Inicio">&#8920;</label>';
                    $this->strGridPagination .= '<label class="labelPagination labelPaginationDisabled" title="Anterior">&#8810</label>';
                }
                $this->strGridPagination .= '<div id="divPagesScroll" style="display: inline-block; width: 545px; height: 42px; white-space: nowrap; overflow-x: auto; overflow-y: hidden">';
                for ($intPage = 1; $intPage <= $intPages; $intPage++) {
                    if ($intPage == $this->intGridSqlPage) {
                        $this->strGridPagination .= '<label class="labelPagination labelPaginationCurrent">' . $intPage . '</label>';
                    } else {
                        $this->strGridPagination .= '<label class="labelPagination" onclick="gridPagination(' . $intPage . ')">' . $intPage . '</label>';
                    }
                }
                $this->strGridPagination .= '</div>';
                if ($this->intGridSqlPage != $intPages) {
                    $this->strGridPagination .= '<label class="labelPagination" onclick="gridPagination(' . ($this->intGridSqlPage + 1) . ')" title="Siguiente">&#8811</label>';
                    $this->strGridPagination .= '<label class="labelPagination" onclick="gridPagination(' . $intPages . ')" title="Final">&#8921</label>';
                } else {
                    $this->strGridPagination .= '<label class="labelPagination labelPaginationDisabled" title="Siguiente">&#8811</label>';
                    $this->strGridPagination .= '<label class="labelPagination labelPaginationDisabled" title="Final">&#8921</label>';
                }
                $this->strGridPagination .= '</div>';
                $this->strGridPagination .= '<b>' . $this->intGridNumberOfRecords . '</b> Registro';
                if ($this->intGridNumberOfRecords > 1) {
                    $this->strGridPagination .= 's';
                }
                $this->strGridPagination .= ' - ';
                $this->strGridPagination .= '<b>' . $intPages . '</b> Página';
                if ($intPages > 1) {
                    $this->strGridPagination .= 's';
                }
                $this->strGridPagination .= ' - ';
                if ($this->intGridNumberOfRecords != 0) {
                    $this->strGridPagination .= '<select onchange="gridRecords(this.value);">';
                    for ($intPageCount = 25; $intPageCount <= 100; $intPageCount = $intPageCount + 25) {
                        $this->strGridPagination .= '<option value="' . $intPageCount . '"';
                        if ($this->intGridSqlLimit == $intPageCount) {
                            $this->strGridPagination .= ' selected="selected"';
                        }
                        $this->strGridPagination .= '>' . $intPageCount . '</option>';
                    }
                    $this->strGridPagination .= '</select>';
                } else {
                    $this->strGridPagination .= '<select>';
                    $this->strGridPagination .= '<option value="0">0</option>';
                    $this->strGridPagination .= '</select>';
                }
                $this->strGridPagination .= ' Registros por página';
                unset($rstData);
                break;
        }
    }

    //funciones pagineo

    function getDate(){
        return date('Ymdhis');
    }

    function formatDateTime($intDateTime,$strFormat){
        $strYear = substr($intDateTime,0,4);
        $strMonth = substr($intDateTime,4,2);
        $strDay = substr($intDateTime,6,2);
        $strHour = substr($intDateTime,8,2);
        $strMinute = substr($intDateTime,10,2);
        $strSecond = substr($intDateTime,12,2);
        switch ($strFormat){
            case DTF_1: $strDate = $strYear . '/' . $strMonth . '/' . $strDay . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_2: $strDate = $strYear . '-' . $strMonth . '-' . $strDay . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_3: $strDate = $strYear . '.' . $strMonth . '.' . $strDay . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_4: $strDate = $strMonth . '/' . $strDay . '/' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_5: $strDate = $strMonth . '-' . $strDay . '-' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_6: $strDate = $strMonth . '.' . $strDay . '.' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_7: $strDate = $strDay . '/' . $strMonth . '/' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_8: $strDate = $strDay . '-' . $strMonth . '-' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_9: $strDate = $strDay . '.' . $strMonth . '.' . $strYear . ' ' . $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_10: $strDate = $strYear . '/' . $strMonth . '/' . $strDay; break;
            case DTF_11: $strDate = $strYear . '-' . $strMonth . '-' . $strDay; break;
            case DTF_12: $strDate = $strYear . '.' . $strMonth . '.' . $strDay; break;
            case DTF_13: $strDate = $strMonth . '/' . $strDay . '/' . $strYear; break;
            case DTF_14: $strDate = $strMonth . '-' . $strDay . '-' . $strYear; break;
            case DTF_15: $strDate = $strMonth . '.' . $strDay . '.' . $strYear; break;
            case DTF_16: $strDate = $strDay . '/' . $strMonth . '/' . $strYear; break;
            case DTF_17: $strDate = $strDay . '-' . $strMonth . '-' . $strYear; break;
            case DTF_18: $strDate = $strDay . '.' . $strMonth . '.' . $strYear; break;
            case DTF_19: $strDate = $strHour . ':' . $strMinute . ':' . $strSecond; break;
            case DTF_20: $strDate = $strHour . ':' . $strMinute; break;
            default: $strDate = $intDateTime; break;
        }
        return $strDate;
    }

    function getProperty($strProperty)
    {
        return $this->$strProperty;
    }

    private function cleanProperties()
    {
        $this->intAffectedRows = 0;
        $this->intLastInsertId = 0;
        $this->strDBError = "";
    }

    //generic support functions
    public function printArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    public function formatMoney($amount, $colored = false)
    {
        $openTag = '';
        $closeTag = '';
        if($colored)
        {
            if($amount > 0)
            {
                $openTag = '<span style="color: #55B844">';
            }

            if($amount < 0)
            {
                $openTag = '<span style="color: #ff3754">';
            }

            $closeTag = "</span>";
        }
        return $openTag . "$ " . number_format($amount, 2, ".", ",") . $closeTag;
    }

}


?>