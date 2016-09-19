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
    public $strTableIdField;
    public $strTableStatusField;
    public $arrFormField = array();
    public $strIncludeJS;
    //atributos para Pagineo

    function __construct(){
        $this->conMysql = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_report(MYSQLI_REPORT_OFF);
        mysqli_query($this->conMysql, "SET NAMES 'utf8'");
    }

    function __destruct(){
        mysqli_close($this->conMysql);
        unset($this->conMysql);
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
        $this->strTransactionErrorCode = '';
        $this->strTransactionErrorMessage = '';
        $rstData = mysqli_query($this->conMysql,$strSql);
        if(mysqli_error($this->conMysql)){
            try{
                throw new Exception("MySQL error " . mysqli_error($this->conMysql) . "<br> Query:<br> $strSql", mysqli_error($this->conMysql));
            }catch(Exception $objMySqlError){
                $this->strTransactionErrorCode = $objMySqlError->getCode();
                $this->strTransactionErrorMessage = $objMySqlError->getMessage();
            }
        }else{
            $arrRows = array();
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
    function getTableData()
    {
        $strSql = "SELECT * FROM TBL_TABLE WHERE TBL_ID = " . $this->intTableId;
        $rstTable = $this->dbQuery($strSql);
        $this->strGridTitle = $rstTable[0]['TBL_DISPLAY'];
        $strTableSqlFrom = ' FROM ' . $rstTable[0]['TBL_NAME'];
        $this->strTableName = $rstTable[0]['TBL_NAME'];
        $this->strIncludeJS = $rstTable[0]['TBL_INCLUDE_JS'];
        unset($rstTable);
        $strSql = 'SELECT * FROM TBL_TABLE_FIELD WHERE TBL_TABLE = ' . $this->intTableId . ' ORDER BY TBL_ORDER';
        $rstField = $this->dbQuery($strSql);
        $this->intGridNumberOfColumns = $this->intAffectedRows + 1;
        $strTableSqlSelect = 'SELECT ';
        $strTableSqlWhere = ' WHERE ';
        $strTableSqlOrder = '';
        $this->strGridHeader = '<tr>';
        $this->strGridForm = '<table class="form_main_table">';
        foreach ($rstField as $objField) {
            array_push($this->arrTableField, array(
                    'TBL_FIELD' => $objField['TBL_FIELD'],
                    'TBL_NAME' => $objField['TBL_NAME'],
                    'TBL_TYPE' => $objField['TBL_TYPE'],
                    'TBL_DISPLAY' => $objField['TBL_DISPLAY'],
                    'TBL_ALIGN' => $objField['TBL_ALIGN'],
                    'TBL_SORT' => $objField['TBL_SORT'],
                    'TBL_FUNCTION' => $objField['TBL_FUNCTION'],
                    'TBL_ORDER' => $objField['TBL_ORDER'],
                    'TBL_STATUS_FIELD' => $objField['TBL_STATUS_FIELD'],
                    'TBL_ID_FIELD' => $objField['TBL_ID_FIELD'],
                    'TBL_EDIT' => $objField['TBL_EDIT'],
                    'TBL_DUPLICATE' => $objField['TBL_DUPLICATE'],
                    'TBL_LENGTH' => $objField['TBL_LENGTH']
                )
            );
            if ($objField['TBL_ID_FIELD'] == 1) {
                $strTableSqlOrder = $objField['TBL_FIELD'];
                $this->strTableIdField = $objField['TBL_FIELD'];
            }
            if ($objField['TBL_STATUS_FIELD'] == 1) {
                $strTableSqlWhere .= $objField['TBL_FIELD'];
                $this->strTableStatusField = $objField['TBL_FIELD'];
            }
            $strTableSqlSelect .= $objField['TBL_FIELD'] . ', ';
            if ($objField['TBL_DISPLAY'] == 1) {
                $this->strGridHeader .= $this->buildGridSortCell($objField['TBL_SORT'],$objField['TBL_NAME'],$objField['TBL_FIELD']);
            }
            if ($objField['TBL_EDIT'] == 1) {
                array_push($this->arrFormField, array(
                    'TBL_FIELD' => $objField['TBL_FIELD'],
                    'TBL_NAME' => $objField['TBL_NAME'],
                    'TBL_TYPE' => $objField['TBL_TYPE'],
                    'TBL_DUPLICATE' => $objField['TBL_DUPLICATE'],
                    'TBL_LENGTH' => $objField['TBL_LENGTH']
                ));
                $this->strGridForm .= '<tr>';
                $this->strGridForm .= '<td class="form_main_td_title"><label for="txt' . $objField['TBL_FIELD'] . '" class="form_label">' . $objField['TBL_NAME'] . '</label></td>';
                $this->strGridForm .= '<td class="form_main_td_data">';
                switch ($objField['TBL_TYPE']) {
                    case 'N':
                        if($objField['TBL_LENGTH']==0){
                            $this->strGridForm .= '<input type="text" id="txt' . $objField['TBL_FIELD'] . '" class="form_input_text" style="width: 150px;" value="" maxlength="6" />';
                        }else{
                            $this->strGridForm .= '<input type="text" id="txt' . $objField['TBL_FIELD'] . '" class="form_input_text" style="width: 150px;" value="" maxlength="11" />';
                        }
                        break;
                    case 'T':
                        $this->strGridForm .= '<input type="text" id="txt' . $objField['TBL_FIELD'] . '" class="form_input_text" style="width: 150px;" value="" />';
                        break;
                    case 'S':
                        $this->strGridForm .= '<input type="text" id="txt' . $objField['TBL_FIELD'] . '" class="form_input_text" style="background-color:transparent; border:1px transparent solid; cursor:pointer;" onclick="changeSwitch2();" value="" />';
                        break;
                }
                $this->strGridForm .= '</td>';
                $this->strGridForm .= '</tr>';
            }
        }
        unset($objField);
        unset($rstField);
        $strSql = 'SELECT * FROM TBL_TABLE_RELATION WHERE TBL_TABLE = ' . $this->intTableId . ' ORDER BY TBL_ORDER';
        $rstRelation = $this->dbQuery($strSql);
        if ($this->intAffectedRows != 0) {
            foreach ($rstRelation as $objRelation) {
                array_push($this->arrTableRelation, array(
                    'TBL_ID' => $objRelation['TBL_ID'],
                    'TBL_NAME' => $objRelation['TBL_NAME'],
                    'TBL_TABLE' => $objRelation['TBL_TABLE'],
                    'TBL_DISPLAY' => $objRelation['TBL_DISPLAY'],
                    'TBL_ORDER' => $objRelation['TBL_ORDER']
                ));
                $this->strGridForm .= '<tr>';
                $this->strGridForm .= '<td class="form_main_td_title"><label class="form_label">' . $objRelation['TBL_DISPLAY'] . '</label></td>';
                $this->strGridForm .= '<td id="tdRelationContainer_' . $objRelation['TBL_NAME'] . '" class="form_main_td_data">';
                $this->strGridForm .= '<table id="tblRelation_' . $objRelation['TBL_NAME'] . '" class="form_table_relation"></tr></table>';
                $this->strGridForm .= '</td>';
                $this->strGridForm .= '</tr>';
            }
            unset($objRelation);
        }
        unset($rstRelation);
        $this->arrFormField = json_encode($this->arrFormField);
        $this->arrTableRelation = json_encode($this->arrTableRelation);
        $this->strGridHeader .= '<th class="thGrid" style="">Editar</th>';
        $this->strGridHeader .= '</tr>';
        $this->strGridForm .= '</table>';
        $strTableSqlSelect = substr($strTableSqlSelect, 0, strlen($strTableSqlSelect) - 2);
        $strTableSqlWhere .= " IN (0,1) ";
        $this->strGridSql = $strTableSqlSelect . $strTableSqlFrom . $strTableSqlWhere . " ORDER BY ";
        $this->strGridSqlOrder = $strTableSqlOrder . " ASC";
    }

    function updateGrid(){
        $rstData = $this->dbQuery($this->strGridSql . $this->strGridSqlOrder);
        $this->intGridNumberOfRecords = $this->intAffectedRows;
        if ($this->intGridNumberOfRecords != 0) {
            $intPages = ceil($this->intGridNumberOfRecords / $this->intGridSqlLimit);
        } else {
            $intPages = 1;
        }

        $intFirstRecord = ($this->intGridSqlLimit * $this->intGridSqlPage) - $this->intGridSqlLimit;
        $intLastRecord = $intFirstRecord + $this->intGridSqlLimit - 1;
        $this->strGrid = '';
        if ($this->intGridNumberOfRecords != 0) {
            for ($intIndex = $intFirstRecord; $intIndex <= $intLastRecord; $intIndex++) {
                $this->strGrid .= '<tr id="trGrid_' . $rstData[$intIndex][$this->strTableIdField] . '">';
                for ($intArrayIndex = 0; $intArrayIndex < count($this->arrTableField); $intArrayIndex++) {
                    switch ($this->arrTableField[$intArrayIndex]['TBL_TYPE']) {
                        case 'N':
                            $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['TBL_FIELD'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['TBL_ALIGN'] . ';">' . number_format($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']], $this->arrTableField[$intArrayIndex]['TBL_LENGTH'], '.', ',') . '</td>';
                            break;
                        case 'T':
                            $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['TBL_FIELD'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['TBL_ALIGN'] . ';">' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']] . '</td>';
                            break;
                        case 'S':
                            if($this->arrTableField[$intArrayIndex]['TBL_FIELD'] == $this->strTableStatusField){
                                $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['TBL_FIELD'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['TBL_ALIGN'] . ';">';
                                if ($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']] == 1) {
                                    $this->strGrid .= '<label id="lblDeactivate_' . $rstData[$intIndex][$this->strTableIdField] . '" currentValue="' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']] . '" onclick="deactivateRecord(' . $rstData[$intIndex][$this->strTableIdField] . ');" class="labelActions labelActionsGreen">&#10004;</label>';
                                } else {
                                    $this->strGrid .= '<label id="lblDeactivate_' . $rstData[$intIndex][$this->strTableIdField] . '" currentValue="' . $rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']] . '" onclick="deactivateRecord(' . $rstData[$intIndex][$this->strTableIdField] . ');" class="labelActions labelActionsRed">&#10006;</label>';
                                }
                                $this->strGrid .= '</td>';
                            }else{
                                $this->strGrid .= '<td id="td' . $this->arrTableField[$intArrayIndex]['TBL_FIELD'] . '_' . $rstData[$intIndex][$this->strTableIdField] . '" class="tdGrid" style="text-align: ' . $this->arrTableField[$intArrayIndex]['TBL_ALIGN'] . ';">';
                                if ($rstData[$intIndex][$this->arrTableField[$intArrayIndex]['TBL_FIELD']] == 1) {
                                    $this->strGrid .= '&#10004;';
                                } else {
                                    $this->strGrid .= '&#10006;';
                                }
                                $this->strGrid .= '</td>';
                            }
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
        } else {
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
}

?>