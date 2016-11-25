<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();

switch ($strProcess) {

    case 'Filter':
        $jsnPhpScriptResponse = array('htmlform'=>'','strError'=>'','arrFilters'=>array());
        $family;
        $bran;
        $group;
        $class;
        $sqlResult = 'SELECT intId, strName FROM tblFamily';
        $rstFamily = $objAscend->dbQuery($sqlResult);

        $sqlResult = 'SELECT intId, strName FROM tblBrand';
        $rstBrand = $objAscend->dbQuery($sqlResult);

        $sqlResult = 'SELECT intId, strName FROM tblGroup';
        $rstGroup = $objAscend->dbQuery($sqlResult);

        $sqlResult = 'SELECT intId, strName FROM catClass';
        $rstClass = $objAscend->dbQuery($sqlResult);

        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divInputText barCodeGray">';
        $strFilter .= '<input type="text" name="strSKU">';
        $strFilter .= '<label>SKU</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'strSKU','html'=>$strFilter,'type'=>'string','lenght'=>'7','required'=>''));


        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="cbo1" name="intBrand">';
        $strFilter .= '<?php foreach ($rstBrand as $brand){echo "<option value="'.$brand['intId'].'">'.$brand['strName'].'</option>";}?>';
        $strFilter .= ' </select>';
        $strFilter .= '<label for="cbo1">Marca</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intBrand','html'=>$strFilter,'type'=>'integer','lenght'=>'','required'=>''));


        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="cbo1" name="intGroup">';
        $strFilter .= '<?php foreach ($rstGroup as $group){echo "<option value="'.$group['intId'].'">'.$group['strName'].'</option>";}?>';
        $strFilter .= '</select>';
        $strFilter .= '<label for="cbo1">Grupo</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intGroup','html'=>$strFilter,'type'=>'integer','lenght'=>'','required'=>''));


        $strFilter = '<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">';
        $strFilter .= '<div class="divSelect groupYellow ">';
        $strFilter .= '<select id="cbo1" name="intClass">';
        $strFilter .= '<?php foreach ($rstClass as $class){echo "<option value="'.$class['intId'].'">'.$class['strName'].'</option>";}?>';
        $strFilter .= '</select>';
        $strFilter .= '<label for="cbo1">Clase</label>';
        $strFilter .= '</div>';
        $strFilter .= '</div>';
        array_push($jsnPhpScriptResponse['arrFilters'],array('name'=>'intClass','html'=>$strFilter,'type'=>'integer','lenght'=>'','required'=>''));

        //$strSKU = $_REQUEST['strSKU'];
        //$intFamily = $_REQUEST['intFamily'];
        //$intBrand = $_REQUEST['intBrand'];
        //$intGroup = $_REQUEST['intGroup'];
        //$intClass = $_REQUEST['intClass'];

        break;

    case 'Report':

        $strSKU = $_REQUEST['strSKU'];
        $intFamily = $_REQUEST['strFamily'];
        $intBrand = $_REQUEST['strBrand'];
        $intGroup = $_REQUEST['intGroup'];
        $intClass = $_REQUEST['strClass'];

        $sqlResult = "SELECT P.strSKU as SKU, P.strPArtNumber as NumeroParte, P.strDescription as Descripcion,  F.strName AS Familia, B.strName AS Marca, G.strName AS Grupo, C.strName AS Clase, CO.strName,W.strDescription as LocalidadAlmacen, WS.intStock as Existencia, WS.intMinimum as Min, WS.intMaximum as Max, PPL.decPrice as Precio, PL.strDescription AS Lista "
            ." FROM tblProduct P "
            ." LEFT JOIN tblWarehouseStock WS ON P.intId = WS.intProduct "
            ." LEFT JOIN catWarehouse W ON WS.intWarehouse= W.intId "
            ." LEFT JOIN tblFamily F ON P.intFamily = F.intId "
            ." LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ." LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            ." LEFT JOIN catClass C ON P.intClass = C.intId "
            ." LEFT JOIN catCondition CO ON P.intCondition = CO.intId "
            ." LEFT JOIN tblProductPricelist PPL ON PPL.intProduct=P.intId "
            ." LEFT JOIN tblPricelist PL ON PL.intId=PPL.intPriceList "
            ." ORDER BY P.strSKU";

        $blnWhere = false;
        IF ($_REQUEST['strSKU']!='')
        {
            if($blnWhere)
            {
                $sqlResult .= " AND ";
            }
            else
            {
                $sqlResult .= " WHERE ";
                $blnWhere = true;
            }
            $sqlResult .= "P.strSKU = " . $strSKU . " ";
        }
        IF ($_REQUEST['intFamily']!='')
        {
            if($blnWhere)
            {
                $sqlResult .= " AND ";
            }
            else
            {
                $sqlResult .= " WHERE ";
                $blnWhere = true;
            }
            $sqlResult .= "F.intFamily = " . $strFamily . " ";
        }
        IF ($_REQUEST['intBrand']!='')
        {
            if($blnWhere)
            {
                $sqlResult .= " AND ";
            }
            else
            {
                $sqlResult .= " WHERE ";
                $blnWhere = true;
            }
            $sqlResult .= "B.strBrand = " . $strBrand. " ";
        }
        IF ($_REQUEST['intGroup']!='')
        {
            if($blnWhere)
            {
                $sqlResult .= " AND ";
            }else
            {
                $sqlResult .= " WHERE ";
                $blnWhere = true;
            }
            $sqlResult .= "G.intGroup = " . $intGroup. " ";
        }
        IF ($_REQUEST['intClass']!='')
        {
            if ($blnWhere) {
                $sqlResult .= " AND ";
            } else {
                $sqlResult .= " WHERE ";
                $blnWhere = true;
            }
            $sqlResult .= "C.intClass = " . $strClass. " ";
        }

        $rstQuery = $objAscend->dbQuery($sqlResult);
        echo "<pre>";
        print_r($rstQuery);
        echo "</pre>";
        break;
};
echo json_encode($jsnPhpScriptResponse);