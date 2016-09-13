<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();


$strProcess = $_REQUEST['strProcess'];
switch ($strProcess)
{

    case 'searchProduct':
        $strBuscador = "laptop hp";
        $strBuscador = strtoupper(trim($_REQUEST['strBuscador']));
        $arrayBuscador = explode(" ", $strBuscador );
        $sqlWhereFamily = "( ";
        $sqlWhereBrand = "( ";
        $sqlWhereGroup = "( ";
        $sqlWhereSKU = "( ";
        $sqlWherePartNumber = "( ";
        $sqlWhereDescription = "( ";

        foreach ($arrayBuscador as $strBuscadorSelected)
        {
            $sqlWhereFamily .= "F.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereBrand .= "B.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereGroup .= "G.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereSKU .= "P.strSKU LIKE '%$strBuscadorSelected%' OR ";
            $sqlWherePartNumber .= "P.strPartNumber LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereDescription .= "P.strDescription LIKE '%$strBuscadorSelected%' OR ";
        }

        if( strlen($sqlWhereFamily) > 0 ){ $sqlWhereFamily = substr($sqlWhereFamily, 0, ( strlen($sqlWhereFamily) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereBrand) > 0 ){ $sqlWhereBrand = substr($sqlWhereBrand, 0, ( strlen($sqlWhereBrand) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereGroup) > 0 ){ $sqlWhereGroup = substr($sqlWhereGroup, 0, ( strlen($sqlWhereGroup) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereSKU) > 0 ){ $sqlWhereSKU = substr($sqlWhereSKU, 0, ( strlen($sqlWhereSKU) - 3 )) . " ) OR "; }
        if( strlen($sqlWherePartNumber) > 0 ){ $sqlWherePartNumber = substr($sqlWherePartNumber, 0, ( strlen($sqlWherePartNumber) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereDescription) > 0 ){ $sqlWhereDescription = substr($sqlWhereDescription, 0, ( strlen($sqlWhereDescription) - 3 )) . " ) "; }

        $sqlsearchProducts =
            "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName AS strFamily, B.strName AS strBrand, G.strName AS strGroup "
            ."FROM tblProduct P "
            ."LEFT JOIN tblFamily F ON P.intFamily = F.intId "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            ."WHERE "
            ."( "
            ."$sqlWhereFamily "
            ."$sqlWhereBrand "
            ."$sqlWhereGroup "
            ."$sqlWhereSKU "
            ."$sqlWherePartNumber "
            ."$sqlWhereDescription "
            .");";
        echo $sqlsearchProducts;
        $jsnPhpScriptResponse;
        break;

};
unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>