<?php

class clsAscend
{
    private $conMysql;

    public $intLastInsertedId;
    public $intMySqlAffectedRows;
    public $strTransactionErrorCode;
    public $strTransactionErrorMessage;

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