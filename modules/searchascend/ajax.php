<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();

$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();
$strError = "";
$jsnPhpScriptResponse = "";


#### Preparado de datos
switch ($strProcess)
{
    case 'initialSearch':

        $sqlPromotion =
            "SELECT P. intId, P.strSku, P.strPartNumber, P.strDescription, P.decPrice, B.strName AS strBrand, C.strName AS strCondition, I.intSold, PR.strRule AS strPromotionRule, PR.strStatus AS strPromotionStatus, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage "
            ."FROM tblProduct P "
            ."LEFT JOIN tblInvoice I ON I.intProduct = P.intId "
            ."LEFT JOIN tblPromotion PR ON P.intId = PR.intProduct "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
            ."LEFT JOIN tblProductImage PI ON P.intId = PI.intProduct AND PI.strType = 'default' "
            ."WHERE PR.strStatus is not null  AND PR.strStatus = 'A' "
            ."ORDER BY I.intSold DESC LIMIT 100;";

        $rstPromotion = $objAscend->dbQuery($sqlPromotion);
        if( count($rstPromotion) > 0 )
        {
            $rstQuery = $rstPromotion;
        }
        else
        {
            $sqlTop =
                "SELECT P. intId, P.strSku, P.strPartNumber, P.strDescription, P.decPrice, B.strName AS strBrand, C.strName AS strCondition, I.intSold, PR.strRule AS strPromotionRule, PR.strStatus AS strPromotionStatus, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage "
                ."FROM tblProduct P "
                ."LEFT JOIN tblInvoice I ON I.intProduct = P.intId "
                ."LEFT JOIN tblPromotion PR ON P.intId = PR.intProduct "
                ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
                ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
                ."LEFT JOIN tblProductImage PI ON P.intId = PI.intProduct AND PI.strType = 'default' "
                ."where P.strStatus='A' "
                ."ORDER BY I.intSold DESC limit 100;";
            $rstTop= $objAscend->dbQuery($sqlTop);
            $rstQuery = $rstTop;
            unset($rstTop);
        }
        unset($rstPromotion);

        break;
    case 'searchProduct':
        $strNeedle = strtoupper(trim($_REQUEST['strNeedle']));

        $strBrand =$_REQUEST['strBrand'];
        $strGroup =$_REQUEST['strGroup'];
        $strPartNumber =$_REQUEST['strPartNumber'];

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
            $sqlWhereFamily .= "F.strName LIKE '%$strNeedle%' OR ";
            $sqlWhereBrand .= "B.strName LIKE '%$strNeedle%' OR ";
            $sqlWhereGroup .= "G.strName LIKE '%$strNeedle%' OR ";
            $sqlWhereSKU .= "P.strSKU LIKE '%$strNeedle%' OR ";
            $sqlWherePartNumber .= "P.strPartNumber LIKE '%$strNeedle%' OR ";
            $sqlWhereDescription .= "P.strDescription LIKE '%$strNeedle%' OR ";

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
        if( strlen($sqlPartNumber) > 0 ){ $sqlPartNumber = substr($sqlPartNumber, 0, ( strlen($sqlPartNumber)  - 3)) . " ) "; }


        $rstsearchProducts =$objAscend->dbQuery(
            "SELECT P.intId, P.strSKU, P.strPartNumber, P.strDescription, F.strName AS strFamily, B.strName AS strBrand, G.strName AS strGroup,C.strName, P.decPrice"
            ." FROM tblProduct P "
            ." LEFT JOIN tblFamily F ON P.intFamily = F.intId "
            ." LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ." LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId"
            ." WHERE 
            ( "
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
            .")");
        $jsnPhpScriptResponse=$rstsearchProducts;
        echo"<pre>";
        print_r($jsnPhpScriptResponse);
        echo"</pre>";
        break;
    case 'infoProduct':
        $strSKU =$_REQUEST['strSKU'];
        $rstInfoProduct= $objAscend->dbQuery("select P.intId, P.strSKU, P.strPArtNumber, P.strDescription, P.decPrice, B.strName, C.strName"
            ." from tblProduct P"
            ." LEFT JOIN tblBrand B ON P.intBrand = B.intId"
            ." LEFT JOIN catCondition C ON C.intId = P.intCondition"
            ." where P.strSKU='$strSKU' and P.strStatus='A'");
        $sqlGroup= $objAscend->dbQuery("select intGroup, intId from tblProduct where strSKU='$strSKU' and strStatus='A';");
        $rstEncabezado= $objAscend->dbQuery("select strDisplay from tblGroupField where intGroup= ".$sqlGroup[0]['intGroup']." and strStatus='A';");
        $rsrValoresEncabezado=$objAscend->dbQuery("select strDisplay from tblProductDetail where intProduct='".$sqlGroup[0]['intId']."' and strStatus='A';");

        $jsnPhpScriptResponse=$rstInfoProduct;
        $jsnPhpScriptResponse1=$rstEncabezado;
        $jsnPhpScriptResponse2=$rsrValoresEncabezado;

        echo $objAscend-> strTransactionErrorMessage;
        echo"<pre>";
        print_r($jsnPhpScriptResponse);
        echo"</pre>";

        break;
    case 'replacement':


        $strSKU =$_REQUEST['strSKU'];
        $intSKU= $objAscend->dbQuery("SELECT intId FROM tblProduct Where strSKU = '$strSKU';");
        $rstReplacement=$objAscend->dbQuery("select P.strSKU"
            ." from tblProductRelationship PR"
            ." LEFT JOIN tblProduct P ON P.intId = PR.intRelatedProduct"
            ." where PR.intProduct=".$intSKU[0]['intId']." and PR.strRelationshipType = 'R' and PR.strStatus='A';");
        $jsnPhpScriptResponse=$rstReplacement;
        echo"<pre>";
        print_r($jsnPhpScriptResponse);
        echo"</pre>";
        break;
    case 'compatible':
        $strSKU =$_REQUEST['strSKU'];
        $intSKU= $objAscend->dbQuery("SELECT intId FROM tblProduct Where strSKU = '$strSKU';");
        $rstCompatible=$objAscend->dbQuery("select P.strSKU"
            ." from tblProductRelationship PR"
            ." LEFT JOIN tblProduct P ON P.intId = PR.intRelatedProduct"
            ." where PR.intProduct=".$intSKU[0]['intId']." and PR.strRelationshipType = 'C' and PR.strStatus='A';");
        $jsnPhpScriptResponse=$rstCompatible;
        echo"<pre>";
        print_r($jsnPhpScriptResponse);
        echo"</pre>";
        break;
    case 'stock':
        $strSKU =$_REQUEST['strSKU'];
        $sqlProduct=$objAscend->dbQuery("select intId from tblProduct where strSKU='6171374';");
        $rstStock=$objAscend->dbQuery("select W.strDescription, WS.intStock"
            ." from tblWarehouseStock WS"
            ." LEFT JOIN catWarehouse W ON WS.intWarehouse= W.intId"
            ." where WS.intProduct='".$sqlProduct[0]['intId']."' and WS.intStock > 0;");
        $jsnPhpScriptResponse=$rstStock;
        echo"<pre>";
        print_r($jsnPhpScriptResponse);
        echo"</pre>";
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

#### pintar Response
switch ($strProcess)
{
    case 'searchProduct':
    case 'advancedSearch':
    case 'initialSearch':
        foreach($rstQuery as $product)
        {
            $htmlProduct = '';
            $htmlProduct .= '<div class="productCard">';
            $htmlProduct .= '<div class="titleProduct">';
            $htmlProduct .= '<b>NÚMERO DE PARTE:</b> ' . $product["strPartNumber"];
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="productContent">';
            $htmlProduct .= '<div class="imageProduct">';
            if( $product["strPromotionStatus"] != null && $product["strPromotionStatus"] == "A" )
            {
                $objPromotion = $objAscend->priceRuleCalculation( $product["decPrice"], $product["strPromotionRule"] );
                $htmlProduct .= '<div class="activePromotion">' . $objPromotion["strRuleDescription"] . '</div>';
            }
            $htmlProduct .= '<img src="../../img/' . $product["strImage"] .'">';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="infoProduct">';
            $htmlProduct .= '<div class="descriptionProduct"><b>DESCRIPCIÓN:</b> ' . $product["strDescription"] . '</div>';
            $htmlProduct .= '<div class="brandProduct"><b>MARCA:</b> ' . $product["strBrand"] . '</div>';
            $htmlProduct .= '<div class="typeProduct"><b>TIPO:</b> ' . $product["strCondition"] . '</div>';

            $htmlProduct .= '<div class="prices"></div>';
            $htmlProduct .= '<div class="pricePromotion">$ ' . number_format($product["decPrice"], 2, ",", ".") . '</div>';
            if( $product["strPromotionStatus"] != null && $product["strPromotionStatus"] == "A" )
            {
                $htmlProduct .= '<div class="priceProduct">$ ' . number_format($objPromotion["decPrice"], 2, ",", ".") . '</div>';
            }
            $htmlProduct .= '</div>';

            $htmlProduct .= '<div class="btnBuy">';
            $htmlProduct .= '<button class="btnAddCart"></button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '</div>';

            $htmlProduct .= '<div class="btnsProduct">';
            $htmlProduct .= '<div class="btn-group-justified">';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalArticulo\',\'closeArticulo\', \'contenidoDetalles\', \'tabDetalles\')">DETALLES</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalArticulo\',\'closeArticulo\', \'contenidoRemplazos\', \'tabRemplazos\')">REMPLAZOS</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalArticulo\',\'closeArticulo\', \'contenidoCompatibles\', \'tabCompatibles\')">COMPATIBLE</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalArticulo\',\'closeArticulo\', \'contenidoExistencias\', \'tabExistencias\')">EXISTENCIAS</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '</div>';

            $jsnPhpScriptResponse .= $htmlProduct;
        }

        /*echo"<pre>";
        print_r($rstQuery);
        echo"</pre>";*/
        break;
}
unset($objAscend);
echo ($jsnPhpScriptResponse);
?>