<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');

$objAscend = new clsAscend();

$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();
$strError = "";
$jsnPhpScriptResponse = "";

#parametros para balanceador de busquedas
$strType = "";
$intPage = 1;
$jsnParameters = array();
$intRecordsPerPage = 10;

#### Preparado de datos
switch ($strProcess)
{
    #
    case 'searchProduct':
        $strType = $_REQUEST['strType'];
        $intPage = $_REQUEST['intPage'];
        $jsnParameters = json_decode($_REQUEST['jsnParameters']);
        $intRecordsPerPage = $_REQUEST['intRecordsPerPage'];


        switch( $strType )
        {
            case 'initialSearch':
                $sqlProduct =
                    "SELECT P. intId, P.strSku, P.strPartNumber, P.strDescription, P.decPrice, B.strName AS strBrand, C.strName AS strCondition, I.intSold, IFNULL(PR.strRule, '') AS strPromotionRule, IFNULL(PR.strStatus, 'B') AS strPromotionStatus, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage "
                    ."FROM tblProduct P  "
                    ."LEFT JOIN tblInvoice I ON I.intProduct = P.intId "
                    ."LEFT JOIN tblPromotion PR ON P.intId = PR.intProduct "
                    ."LEFT JOIN tblBrand B ON P.intBrand = B.intId  "
                    ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
                    ." LEFT JOIN tblProductImage PI ON P.intId = PI.intProduct AND PI.strType = 'default' "
                    ." WHERE P.strStatus='A' "
                    ."ORDER BY strPromotionStatus ASC, I.intSold DESC ";

                $rstProduct = $objAscend->dbQuery($sqlProduct . $objAscend->queryLimit($sqlProduct, $intPage, $intRecordsPerPage) );
                $rstQuery = $rstProduct;
                unset($rstProduct);

            break;
            case 'customSearch':
                break;
            case 'advancedSearch':
                break;
        }
        break;
    
    #detailed information of products
    case 'productInfo':
        $intId = $_REQUEST['intId'];

        #Product
        $sqlProduct =
            "SELECT P.intId, P.strPartNumber, P.strDescription, P.strSKU, P.intGroup, G.strName AS strGroup, C.strName AS strCondition, B.strName AS strBrand, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage "
            ."FROM tblProduct P "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN tblGroup G ON P.intBrand = G.intId "
            ."LEFT JOIN tblProductImage PI ON P.intId = PI.intProduct AND PI.strType = 'default' "
            ."WHERE P.intId = $intId;";
        $rstProduct = $objAscend->dbQuery($sqlProduct);

        $intGroup = $rstProduct[0]["intGroup"];

        #Gallery
        $sqlGallery =
            "SELECT intId, strUrl "
            ."FROM tblProductImage "
            ."WHERE intProduct = $intId AND strType <> 'default' AND strStatus <> 'B';";
        $rstGallery = $objAscend->dbQuery($sqlGallery);

        #DetailHeaders
        $sqlDetailHeaders =
            "SELECT intId, intOrder, strDisplay "
            ."FROM tblGroupField "
            ."WHERE intGroup = $intGroup AND strStatus <> 'B' "
            ."ORDER BY intOrder;";
        $rstDetailHeaders = $objAscend->dbQuery($sqlDetailHeaders);

        #DetailValues
        $sqlDetailValues =
            "SELECT intId, intOrder, strDisplay "
            ."FROM tblProductDetail "
            ."WHERE intProduct = $intId AND strStatus <> 'B' "
            ."ORDER BY intOrder;";
        $rstDetailValues = $objAscend->dbQuery($sqlDetailValues);

        #Replacements
        $sqlReplacements =
            "SELECT P.intId, P.strPartNumber, P.strDescription, B.strName AS strBrand, C.strName AS strCondition "
            ."FROM tblProductRelationship PR "
            ."LEFT JOIN tblProduct P ON PR.intRelatedProduct = P.intId "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
            ."WHERE PR.intProduct = $intId AND  PR.strRelationshipType = 'R' AND  PR.strStatus <> 'B' AND P.strStatus <> 'B';";
        $rstReplacements = $objAscend->dbQuery($sqlReplacements);

        #Compatibility
        $sqlCompatibility =
            "SELECT P.intId, P.strPartNumber, P.strDescription, B.strName AS strBrand, C.strName AS strCondition "
            ."FROM tblProductRelationship PR "
            ."LEFT JOIN tblProduct P ON PR.intRelatedProduct = P.intId "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
            ."WHERE PR.intProduct = $intId AND  PR.strRelationshipType = 'C' AND  PR.strStatus <> 'B' AND P.strStatus <> 'B';";
        $rstCompatibility = $objAscend->dbQuery($sqlCompatibility);

        #Stock
        $sqlStock =
            "SELECT WHS.intWarehouse as intId, WH.strCode, WH.strDescription, WHS.intStock "
            ."FROM tblWarehouseStock WHS "
            ."LEFT JOIN catWarehouse WH ON WHS.intWarehouse = WH.intId "
            ."WHERE WHS.intProduct = $intId AND WHS.strStatus <> 'B' AND WH.strStatus <> 'B';";
        $rstStock = $objAscend->dbQuery($sqlStock);

        $rstQuery["product"] = $rstProduct[0];
        $rstQuery["gallery"] = $rstGallery;
        $rstQuery["detailHeaders"] = $rstDetailHeaders;
        $rstQuery["detailValues"] = $rstDetailValues;
        $rstQuery["replacements"] = $rstReplacements;
        $rstQuery["compatibles"] = $rstCompatibility;
        $rstQuery["stock"] = $rstStock;
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
    #print the data of initialSearch(), searchProduct, advandecSearch()
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
            $htmlProduct .= '<div class="contectProduct">';
            $htmlProduct .= '<div class="imageProduct">';
            if( $product["strPromotionStatus"] != null && $product["strPromotionStatus"] == "A" )
            {
                $objPromotion = $objAscend->priceRuleCalculation( $product["decPrice"], $product["strPromotionRule"] );
                $htmlProduct .= '<div class="activePromotion">' . $objPromotion["strRuleDescription"] . '</div>';
            }
            if(!file_exists("../../img/" . $product["strImage"])) { $product["strImage"] = "product/notfound.jpg";   }
            $htmlProduct .= '<img src="../../img/' . $product["strImage"] .'">';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="infoProduct">';
            $htmlProduct .= '<div class="descriptionProduct"><b>DESCRIPCIÓN:</b> ' . $product["strDescription"] . '</div>';
            $htmlProduct .= '<div class="brandProduct"><b>MARCA:</b> ' . $product["strBrand"] . '</div>';
            $htmlProduct .= '<div class="typeProduct"><b>TIPO:</b> ' . $product["strCondition"] . '</div>';

            $htmlProduct .= '<div class="prices">';
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
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectDetails\', \'tabDetails\', \'' . $product["intId"] . '\')">DETALLES</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectReplacements\', \'tabReplacements\', \'' . $product["intId"] . '\')">REMPLAZOS</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectCompatible\', \'tabCompatible\', \'' . $product["intId"] . '\')">COMPATIBLE</button>';
            $htmlProduct .= '</div>';
            $htmlProduct .= '<div class="btn-group">';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectStocks\', \'tabStocks\', \'' . $product["intId"] . '\')">EXISTENCIAS</button>';
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

    #### DETAIL
    case 'productInfo':
        $jsnDetail = '';
        //## Detail Top Zone
        $jsnDetail .= '<div id="contectDetails" class="tabcontent" style="display: none;"> ';
        $jsnDetail .= '<table id="tableBase"> ';
        $jsnDetail .= '<tr> ';
        $jsnDetail .= '<td id="imageBase"> ';
        if(!file_exists("../../img/" . $rstQuery["product"]["strImage"])) { $rstQuery["product"]["strImage"] = "product/notfound.jpg";   }
        $jsnDetail .= '<img src="../../img/' . $rstQuery["product"]["strImage"] .'"> ';
        $jsnDetail .= '</td> ';
        $jsnDetail .= '<td id="infoBase" style="width: *"> ';
        $jsnDetail .= '<div class="MainTitle">' . $rstQuery["product"]["strPartNumber"] .'</div> ';
        $jsnDetail .= '<div id="descriptionBase">' . $rstQuery["product"]["strDescription"] .'</div> ';
        $jsnDetail .= '</td> ';
        $jsnDetail .= '</tr> ';
        $jsnDetail .= '</table> ';

        //## Detail Gallery
        $jsnDetail .= '<div class="MainTitle">GALERIA</div> ';
        if( count($rstQuery["gallery"]) > 0 )
        {

            $jsnDetail .= '<div id="ca-container" class="ca-container"><div class="ca-nav"><span class="ca-nav-prev">Previous</span><span class="ca-nav-next">Next</span></div> ';
            $jsnDetail .= '<div class="ca-wrapper" style="overflow: hidden;"> ';
            foreach( $rstQuery["gallery"] as $fileImage )
            {
                $jsnDetail .= '<div class="ca-item ca-item-1"> ';
                $jsnDetail .= '<div class="ca-item-main">';
                if(!file_exists("../../img/" . $fileImage["strUrl"])) { $fileImage["strUrl"] = "product/notfound.jpg";   }
                $jsnDetail .= '<div class="ca-icon">';
                $jsnDetail .= '<img src="../../img/' . $fileImage["strUrl"] .'">';
                $jsnDetail .= '</div>';
                $jsnDetail .= '</div>';
                $jsnDetail .= '</div>';
            }
            $jsnDetail .= '</div> ';
            $jsnDetail .= '</div> ';
        }
        else
        {
            $jsnDetail .= '<div class="contentGallery"><h3>Galería vacía</h3></div> ';
        }

        //## Detail Especifications
        $jsnDetail .= '<div class="MainTitle">ESPECIFICACIONES</div> ';
        $jsnDetail .= '<div class="MainContainer"> ';
        $jsnDetail .= '<ul class="col3"> ';
        $jsnDetail .= '<li><p><b>SKU:</b> ' . $rstQuery["product"]["strSKU"] .'</p></li> ';
        $jsnDetail .= '<li><p><b>NÚMERO DE PARTE:</b> ' . $rstQuery["product"]["strPartNumber"] .'</p></li> ';
        $jsnDetail .= '<li><p><b>Marca:</b>' . $rstQuery["product"]["strBrand"] .'</p></li> ';
        $jsnDetail .= '<li><p><b>GRUPO:</b>' . $rstQuery["product"]["strGroup"] .'</p></li> ';
        $jsnDetail .= '<li><p><b>CONDICION:</b>' . $rstQuery["product"]["strCondition"] .'</p></li> ';
        foreach( $rstQuery["detailHeaders"] as $detailHeader )
        {
            $jsnDetail .= '<li><p><b>' . $detailHeader["strDisplay"] . '</b>:';
            foreach( $rstQuery["detailValues"] as $detailValue )
            {
                if( $detailHeader["intOrder"] == $detailValue["intOrder"] )
                {
                    $jsnDetail .= $detailValue["strDisplay"];
                    break;
                }
            }
            $jsnDetail .= '</p></li> ';
        }
        $jsnDetail .= '</ul> ';
        $jsnDetail .= '<br style="clear: both;"> ';
        $jsnDetail .= '</div> ';
        $jsnDetail .= '</div>';

        #### REPLACEMENT

        $jsnReplacement = '';
        $jsnReplacement .= '<div id="contectReplacements" class="tabcontent" style="display: none;">';
        $jsnReplacement .= '<table>';
        $jsnReplacement .= '<thead> <tr> <th>Número Parte</th> <th>Descripción</th> <th>Marca</th> <th>Tipo</th> </tr> </thead>';
        $jsnReplacement .= '<tbody>';
        foreach($rstQuery["replacements"] as $replacement )
        {
            $jsnReplacement .= '<tr>';
            $jsnReplacement .= '<td>' . $replacement["strPartNumber"] . '</td>';
            $jsnReplacement .= '<td>' . $replacement["strDescription"] . '</td>';
            $jsnReplacement .= '<td>' . $replacement["strBrand"] . '</td>';
            $jsnReplacement .= '<td>' . $replacement["strCondition"] . '</td>';
            $jsnReplacement .= '</tr>';
        }
        $jsnReplacement .= '</tbody>';
        $jsnReplacement .= '</table>';
        $jsnReplacement .= '</div>';

        #### COMPATIBILITY

        $jsnCompatibility = '';
        $jsnCompatibility .= '<div id="contectCompatible" class="tabcontent" style="display: none;">';
        $jsnCompatibility .= '<table>';
        $jsnCompatibility .= '<thead> <tr> <th>Número Parte</th> <th>Descripción</th> <th>Marca</th> <th>Tipo</th> </tr> </thead>';
        $jsnCompatibility .= '<tbody>';
        foreach($rstQuery["compatibles"] as $compatible )
        {
            $jsnCompatibility .= '<tr>';
            $jsnCompatibility .= '<td>' . $compatible["strPartNumber"] . '</td>';
            $jsnCompatibility .= '<td>' . $compatible["strDescription"] . '</td>';
            $jsnCompatibility .= '<td>' . $compatible["strBrand"] . '</td>';
            $jsnCompatibility .= '<td>' . $compatible["strCondition"] . '</td>';
            $jsnCompatibility .= '</tr>';
        }
        $jsnCompatibility .= '</tbody>';
        $jsnCompatibility .= '</table>';
        $jsnCompatibility .= '</div>';

        ####STOCK

        $jsnStock = '';
        $jsnStock .= '<div id="contectStocks" class="tabcontent" style="display: none;">';
	    $jsnStock .= '<div class="MainContainer">';
		$jsnStock .= '<ul class="col3">';
        foreach ($rstQuery["stock"] as $warehouse )
        {
            $jsnStock .= '<li><p><b>' . $warehouse["strDescription"] . ':</b> ' . $warehouse["intStock"] . '</p></li>';
        }
		$jsnStock .= '</ul>';
		$jsnStock .= '<br style="clear: both;">';
	    $jsnStock .= '</div>';
    $jsnStock .= '</div>';

        //echo $jsnDetail;
        //echo $jsnReplacement;
        //echo $jsnCompatibility;
        //echo $jsnStock;
        //echo "<pre>";
        //print_r($rstQuery);
        //echo "</pre>";

        $jsnPhpScriptResponse .= $jsnDetail . $jsnReplacement . $jsnCompatibility . $jsnStock;
        break;
}
unset($objAscend);
echo ($jsnPhpScriptResponse);
?>