<?php
function buildFilter($strType, $strIcon, $strName, $strLabel, $intMaxLength, $blnNegative, $intDecimalPlaces, $blnRequired, $strSql){

    global $objAscend;

    $strInput = '';
    $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
    $strFilter .= '<div class="';
    switch($strType){
        case 'select':
            $strFilter .= 'divSelect';
            $strInput .= '<select id="' . $strName . '">';
            $strInput .= '<option value="-1">--Seleccionar--</option>';
            $rstData = $objAscend->dbQuery($strSql);
            foreach($rstData as $arrData){
                $strInput .= '<option value="' . $arrData['strValue'] . '">' . $arrData['strDisplay'] . '</option>';
            }
            unset($arrData);
            unset($rstData);
            $strInput .= '</select>';
            break;
        case 'numeric':
            $strFilter .= 'divInputText';
            $strInput = '<input type="text" id="' . $strName . '"';
            if($intMaxLength>0){
                $strInput .= 'maxlength="' . $intMaxLength . '"';
            }
            $strInput .= '>';
            break;
        case 'date':
            $strFilter .= 'divInputText ';
            $strInput = '<input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="' . date("Y-m-d") . '" id="' . $strName . '"';
            if($intMaxLength>0){
                $strInput .= 'maxlength="' . $intMaxLength . '"';
            }
            $strInput .= '>';
            break;
    }
    if($strIcon!='}'){
        $strFilter .= ' ' . $strIcon;
    }
    $strFilter .= '">';
    $strFilter .= $strInput;
    $strFilter .= '<label>' . $strLabel . '</label>';
    $strFilter .= '</div>';
    $strFilter .= '</div>';
    return array('name'=>$strName,'label'=>$strLabel,'html'=>$strFilter,'type'=>$strType,'negative'=>$blnNegative,'decimalPlaces'=>$intDecimalPlaces,'required'=>$blnRequired);
}
?>