<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();


$strProcess = $_REQUEST['strProcess'];
switch ($strProcess)
{

    case 'searchProduct':
        $strBrand =$_REQUEST['strBrand'];
        $strGroup =$_REQUEST['strGroup'];
        $strPartNumber =$_REQUEST['strPartNumber'];
        $strBuscador =$_REQUEST['strBuscador'];
        $strBuscador = strtoupper(trim($_REQUEST['strBuscador']));
        $arrayBuscador = explode(" ", $strBuscador );
        $sqlWhereFamily = "( ";
        $sqlWhereBrand = "( ";
        $sqlWhereGroup = "( ";
        $sqlWhereSKU = "( ";
        $sqlWherePartNumber = "( ";
        $sqlWhereDescription = "( ";

        $sqlBrand = "( ";
        $sqlGroup = "( ";
        $sqlPartNumber = "( ";



        foreach ($arrayBuscador as $strBuscadorSelected)
        {
            $sqlWhereFamily .= "F.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereBrand .= "B.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereGroup .= "G.strName LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereSKU .= "P.strSKU LIKE '%$strBuscadorSelected%' OR ";
            $sqlWherePartNumber .= "P.strPartNumber LIKE '%$strBuscadorSelected%' OR ";
            $sqlWhereDescription .= "P.strDescription LIKE '%$strBuscadorSelected%' OR ";

            $sqlBrand .= "B.strName LIKE '%$strBrand%' OR ";
            $sqlGroup .= "G.strName LIKE '%$strGroup%' OR ";
            $sqlPartNumber .= "P.strPartNumber LIKE '%$strPartNumber%' OR ";
        }

        if( strlen($sqlWhereFamily) > 0 ){ $sqlWhereFamily = substr($sqlWhereFamily, 0, ( strlen($sqlWhereFamily) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereBrand) > 0 ){ $sqlWhereBrand = substr($sqlWhereBrand, 0, ( strlen($sqlWhereBrand) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereGroup) > 0 ){ $sqlWhereGroup = substr($sqlWhereGroup, 0, ( strlen($sqlWhereGroup) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereSKU) > 0 ){ $sqlWhereSKU = substr($sqlWhereSKU, 0, ( strlen($sqlWhereSKU) - 3 )) . " ) OR "; }
        if( strlen($sqlWherePartNumber) > 0 ){ $sqlWherePartNumber = substr($sqlWherePartNumber, 0, ( strlen($sqlWherePartNumber) - 3 )) . " ) OR "; }
        if( strlen($sqlWhereDescription) > 0 ){ $sqlWhereDescription = substr($sqlWhereDescription, 0, ( strlen($sqlWhereDescription) - 3 )) . " ) "; }

        if( strlen($sqlBrand) > 0 ){ $sqlBrand = substr($sqlBrand, 0, ( strlen($sqlBrand) - 3 )) . " ) " . ( strlen($sqlGroup) > 0 ? " OR " : "" ); }
        if( strlen($sqlGroup) > 0 ){ $sqlGroup = substr($sqlGroup, 0, ( strlen($sqlGroup) - 3 )) . " ) " . ( strlen($sqlPartNumber) > 0 ? " OR " : "" ); }
        if( strlen($sqlPartNumber) > 0 ){ $sqlPartNumber = substr($sqlPartNumber, 0, ( strlen($sqlPartNumber)  )) . " ) "; }


        $sqlsearchProducts =
            "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName AS strFamily, B.strName AS strBrand, G.strName AS strGroup, W.intProduct, W.intStock, C.strDescription"
            ."FROM tblProduct P "
            ."LEFT JOIN tblFamily F ON P.intFamily = F.intId "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            ."LEFT JOIN tblWarehouseStock W ON P.intId = W.intProduct"
            ."LEFT JOIN catWarehouse C ON W.intWarehouse= C.intId"
            ."WHERE (W.intProduct > 0) and "
            ."( "
            ."$sqlWhereFamily "
            ."$sqlWhereBrand "
            ."$sqlWhereGroup "
            ."$sqlWhereSKU "
            ."$sqlWherePartNumber "
            ."$sqlWhereDescription "
            .")
            and
            ("
            ."$sqlBrand "
            ."$sqlGroup "
            ."$sqlPartNumber "
            .")";
        echo $sqlsearchProducts;
        $jsnPhpScriptResponse;
        break;

    case 'autocomplete':

        $strNeedle = strtoupper(trim($_REQUEST['strNeedle']));
        $arrayNeedle = explode(" ", $strNeedle);
        $sqlWhereFamily = "( ";
        $sqlWhereBrand = "( ";
        $sqlWhereGroup = "( ";
        $sqlWhereSKU = "( ";
        $sqlWherePartNumber = "( ";
        $sqlWhereDescription = "( ";

        foreach ($arrayNeedle as $strNeedleSelected) {
            $sqlWhereFamily .= "F.strName LIKE '%$strNeedleSelected%' OR ";
            $sqlWhereBrand .= "B.strName LIKE '%$strNeedleSelected%' OR ";
            $sqlWhereGroup .= "G.strName LIKE '%$strNeedleSelected%' OR ";
            $sqlWhereSKU .= "P.strSKU LIKE '%$strNeedleSelected%' OR ";
            $sqlWherePartNumber .= "P.strPartNumber LIKE '%$strNeedleSelected%' OR ";
            $sqlWhereDescription .= "P.strDescription LIKE '%$strNeedleSelected%' OR ";
        }

        if (strlen($sqlWhereFamily) > 0) {
            $sqlWhereFamily = substr($sqlWhereFamily, 0, (strlen($sqlWhereFamily) - 3)) . " ) OR ";
        }
        if (strlen($sqlWhereBrand) > 0) {
            $sqlWhereBrand = substr($sqlWhereBrand, 0, (strlen($sqlWhereBrand) - 3)) . " ) OR ";
        }
        if (strlen($sqlWhereGroup) > 0) {
            $sqlWhereGroup = substr($sqlWhereGroup, 0, (strlen($sqlWhereGroup) - 3)) . " ) OR ";
        }
        if (strlen($sqlWhereSKU) > 0) {
            $sqlWhereSKU = substr($sqlWhereSKU, 0, (strlen($sqlWhereSKU) - 3)) . " ) OR ";
        }
        if (strlen($sqlWherePartNumber) > 0) {
            $sqlWherePartNumber = substr($sqlWherePartNumber, 0, (strlen($sqlWherePartNumber) - 3)) . " ) OR ";
        }
        if (strlen($sqlWhereDescription) > 0) {
            $sqlWhereDescription = substr($sqlWhereDescription, 0, (strlen($sqlWhereDescription) - 3)) . " ) ";
        }

        $sqlProducts =
            "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName AS strFamily, B.strName AS strBrand, P.intGroup, G.strName AS strGroup "
            . "FROM tblProduct P "
            . "LEFT JOIN tblFamily F ON P.intFamily = F.intId "
            . "LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            . "LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            . "WHERE "
            . "( "
            . "$sqlWhereFamily "
            . "$sqlWhereBrand "
            . "$sqlWhereGroup "
            . "$sqlWhereSKU "
            . "$sqlWherePartNumber "
            . "$sqlWhereDescription "
            . ") "
            . "ORDER BY strGroup, P.strDescription;";
        //echo $sqlProducts;
        $resultProducts = $objAscend->dbQuery($sqlProducts);
        /*echo "<pre>";
        print_r($resultProducts);
        echo "</pre><br><br>";*/

        $arrayGroups = array();
        foreach ($resultProducts as $objProduct) {
            $boolExistsInArray = false;
            foreach ($arrayGroups as $objGroup) {
                if ($objProduct["intGroup"] == $objGroup["intGroup"]) {
                    $boolExistsInArray = true;
                }
            }
            if (!$boolExistsInArray) {
                $arrayGroups[] = array("intGroup" => $objProduct["intGroup"], "strGroup" => $objProduct["strGroup"]);
            }
        }

        /*echo "<pre>";
        print_r($arrayGroups);
        echo "</pre>";*/

        $arrayResponse = array("arrayList" => array(), "arrayGroups" => array(), "boolMore" => false, "strNeedle" => "");


        $intLimit = count($arrayGroups);

        if (count($arrayGroups) > 5) {
            $intLimit = 5;

            $arrayResponse["boolMore"] = true;
        }
        $arrayResponse["arrayGroups"] = $arrayGroups;
        $arrayResponse["strNeedle"] = $strNeedle;

        for( $g = 0; $g< $intLimit; $g++)
        {
            $intCounterGrouprow = 0;
            $arrayTempGroup = array("intGroup" => $arrayGroups[$g]["intGroup"], "strGroup" => $arrayGroups[$g]["strGroup"], "arrayRows" => array() );
            foreach ($resultProducts as $objProduct)
            {
                if( $intCounterGrouprow <= 5 )
                    if( $objProduct["intGroup"] == $arrayGroups[$g]["intGroup"] )
                    {
                        $arrayTempGroup["arrayRows"][] = array("intId" => $objProduct["intId"], "strDescription" => $objProduct["strDescription"]);
                        $intCounterGrouprow++;
                    }
            }
            $arrayResponse["arrayList"][] = $arrayTempGroup;
        }

        echo "<pre>";
        print_r($arrayResponse);
        echo "</pre>";
        $jsnPhpScriptResponse['strResult'] = $arrayResponse;
    break;

};
unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>