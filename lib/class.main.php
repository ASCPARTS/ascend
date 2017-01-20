<?php

class classMain{
    private $objDBConnection;

    function __construct(){
        $this->objDBConnection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_query($this->objDBConnection, "SET NAMES 'utf8'");
    }

    function __destruct(){
        mysqli_close($this->objDBConnection);
        unset($this->objDBConnection);
    }

    function dbQuery($strSql)
    {
        $arrRecordset = array();
        $rstData = mysqli_query($this->objDBConnection,$strSql);
        while($objData = mysqli_fetch_assoc($rstData)){
            $arrRecordset[] = $objData;
        }
        unset($rstData);
        return $arrRecordset;
        unset($arrRecordset);
    }
}