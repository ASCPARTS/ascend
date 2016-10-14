<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');
require_once('class.searchAscend.php');

$objAscend = new clsAscend();
$objSearchAscend = new clsSearchAscend();

$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();
$jsnPhpScriptResponse = array();

#parametros para balanceador de busquedas
$strType = "";
$intPage = 1;
$jsnParameters = array();
$intRecordsPerPage = 10;
$sqlProduct = "";
$strWhereProduct = "";
$objPagination = array();

$arrPriceRange = array();


#### Preparado de datos
switch ($strProcess)
{
    #
    case 'searchProduct':
        $strType = $_REQUEST['strType'];
        $intPage = $_REQUEST['intPage'];
        //echo var_dump($_REQUEST['jsnParameters']);
        //settype($_REQUEST['jsnParameters'], "String");
        //echo var_dump($_REQUEST['jsnParameters']);
        $jsnParameters = json_decode($_REQUEST['jsnParameters'],true);
        $intRecordsPerPage = $_REQUEST['intRecordsPerPage'];

        $intStock = $_REQUEST['intStock'];
        $strPriceRange = $_REQUEST['strPriceRange'];

        $jsnBrand = json_decode($_REQUEST['jsnBrand']);
        $jsnGroup = json_decode($_REQUEST['jsnGroup']);



        switch( $strType )
        {
            case 'initialSearch':
                $strWhereProduct = "WHERE P.strStatus='A' ";
            break;
            case 'customSearch':

                $arrNeedle = array_unique( explode( " ", strtoupper($jsnParameters["strNeedle"])) );

                $strWhereSKU = "";
                $strWherePartNumber = "";
                $strWhereDescription = "";
                $strWhereBrand = "";
                $strWhereGroup = "";
                foreach ($arrNeedle as $strNeedle)
                {
                    $strWhereSKU .= " P.strSKU LIKE '%" . $strNeedle . "%' OR";
                    $strWherePartNumber .= " P.strPartNumber LIKE '%" . $strNeedle . "%' OR";
                    $strWhereDescription .= " P.strDescription LIKE '%" . $strNeedle . "%' OR";
                    $strWhereBrand .= " B.strName LIKE '%" . $strNeedle . "%' OR";
                    $strWhereGroup .= " G.strName LIKE '%" . $strNeedle . "%' OR";
                }
                $strWhereSKU = substr($strWhereSKU, 0, ( strlen($strWhereSKU) - 2 ) );
                $strWherePartNumber = substr($strWherePartNumber, 0, ( strlen($strWherePartNumber) - 2 ) );
                $strWhereDescription = substr($strWhereDescription, 0, ( strlen($strWhereDescription) - 2 ) );
                $strWhereBrand = substr($strWhereBrand, 0, ( strlen($strWhereBrand) - 2 ) );
                $strWhereGroup = substr($strWhereGroup, 0, ( strlen($strWhereGroup) - 2 ) );

                $strWhereProduct = "WHERE P.strStatus='A' AND ( ( " . $strWhereSKU . " ) OR ( " . $strWherePartNumber . " ) OR ( " . $strWhereDescription . " ) OR ( " . $strWhereBrand . " ) OR ( " . $strWhereGroup . " ) ) ";
            break;
            case 'advancedSearch':

            break;
            case 'searchByGroup':
                $intGroup = $jsnParameters["intGroup"];
                $strWhereProduct = "WHERE P.strStatus='A' AND G.intId = $intGroup ";
            break;
        }

        $sqlProduct =
            " SELECT P.intId, P.strSku, P.strPartNumber, P.strDescription, P.decPrice, P.intBrand, B.strName AS strBrand, P.intGroup, G.strName AS strGroup, P.intCondition, C.strName AS strCondition, I.intSold, IFNULL(PR.strRule, '') AS strPromotionRule, IFNULL(PR.strStatus, 'B') AS strPromotionStatus, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage, IFNULL( (SELECT SUM(intStock) FROM tblWarehouseStock WHERE intProduct = P.intId AND strStatus = 'A'), 0) AS intStock "
            ."FROM tblProduct P  "
            ."LEFT JOIN tblInvoice I ON I.intProduct = P.intId "
            ."LEFT JOIN tblPromotion PR ON P.intId = PR.intProduct "
            ."LEFT JOIN tblBrand B ON P.intBrand = B.intId  "
            ."LEFT JOIN tblGroup G ON P.intGroup = G.intId "
            ."LEFT JOIN catCondition C ON P.intCondition = C.intId "
            ."LEFT JOIN tblProductImage PI ON P.intId = PI.intProduct AND PI.strType = 'default' "
            .$strWhereProduct
            ."ORDER BY strPromotionStatus ASC, I.intSold DESC ";

        $jsnPhpScriptResponse["htmlLateralBar"] = $objSearchAscend -> getLateralBar($sqlProduct, $intStock, $strPriceRange, $jsnBrand, $jsnGroup );


        $boolLateralFilter = 0;
        $strWhereProduct = "";
        if( $intStock == 1 )
        {
            $boolLateralFilter = 1;
            $strWhereProduct = " intStock > 0 AND ";
        }

        if( $strPriceRange != "ALL" )
        {
            $boolLateralFilter = 1;
            $arrPriceRanges = explode("-", $strPriceRange );
            $strWhereProduct = " ( decPrice > " . $arrPriceRanges[0] . " AND decPrice <= " . $arrPriceRanges[1] . " ) AND ";
        }

        if( count($jsnBrand) > 0 )
        {
            $boolLateralFilter = 1;
            $strWhereProduct .= " intBrand IN (";
            foreach( $jsnBrand as $arrBrand )
            {
                $strWhereProduct .= " " . $arrBrand . ",";
            }
            $strWhereProduct = substr($strWhereProduct, 0, ( strlen($strWhereProduct) - 1 ));
            $strWhereProduct .= " ) AND ";
        }

        if( count($jsnGroup) > 0 )
        {
            $boolLateralFilter = 1;
            $strWhereProduct .= " intGroup IN (";
            foreach( $jsnGroup as $arrGroup )
            {
                $strWhereProduct .= " " . $arrGroup . ",";
            }
            $strWhereProduct = substr($strWhereProduct, 0, ( strlen($strWhereProduct) - 1 ));
            $strWhereProduct .= " ) AND ";
        }



        if( $boolLateralFilter )
        {
            $strWhereProduct = substr($strWhereProduct, 0, (strlen($strWhereProduct) - 4) ) . "";
            $sqlProduct =
                "SELECT * FROM "
                ."( "
                . $sqlProduct . " "
                .") "
                ."A WHERE" . $strWhereProduct;
        }

        $objPagination = $objSearchAscend->queryPagination($sqlProduct, $intPage, $intRecordsPerPage);
        $rstProduct = $objAscend->dbQuery($sqlProduct . $objPagination["strLimit"] );
        $rstQuery = $rstProduct;
        unset($rstProduct);

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


        $htmlList = '';

        $htmlList .= '<div class="dropdown-content col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">';
        $htmlList .= '<ul class="autocomplete">';
        foreach( $arrayResponse["arrayList"] as $arrList )
        {
            $htmlList .= '<li class="title_list">';
            $htmlList .= '<a href="javascript:' . ( count($arrList["arrayRows"]) > 5 ? 'searchGroup(' . $arrList["intGroup"] . ')' : 'void(0)' ) . ';">' . $arrList["strGroup"] . ( count($arrList["arrayRows"]) > 5 ? '<div class="look_more">VER MAS...</div>' : '' ) . '</a>';
            $htmlList .= '</li>';
            $maxGroupRecords = ( count($arrList["arrayRows"]) > 5 ? 5 : count($arrList["arrayRows"]) );
            for( $c = 0; $c < $maxGroupRecords; $c++ )
            {
                $arrList["arrayRows"][$c];
                $htmlList .= '<li class="item_list"><a href="javascript:searchId(' . $arrList["arrayRows"][$c]["intId"] . ');">' . $arrList["arrayRows"][$c]["strDescription"] . '</a></li>';
            }
        }
        if( count($arrayResponse["arrayGroups"]) > 0 )
        {
            $htmlList .= '<li class="title_list"><a href="javascript:void(0);">GRUPOS</a></li>';
            foreach( $arrayResponse["arrayGroups"] as $arrGroup )
            {
                $htmlList .= '<li class="item_list"><a href="javascript:searchGroup(' . $arrGroup["intGroup"] . ');">' . $arrGroup["strGroup"] . '</a></li>';
            }
        }

        $htmlList .= '</ul>';
        $htmlList .= '</div>';

        $jsnPhpScriptResponse['htmlList'] = $htmlList;
        break;
};

#### pintar Response
switch ($strProcess)
{
    #print the data of initialSearch(), searchProduct, advandecSearch()
    case 'searchProduct':
        $jsnPhpScriptResponse["htmlProduct"] = "";
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
                $objPromotion = $objSearchAscend->priceRuleCalculation( $product["decPrice"], $product["strPromotionRule"] );
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

            $jsnPhpScriptResponse["htmlProduct"] .= ($htmlProduct);
        }

        #Pagineo

        $htmlPagination = "";
        $htmlPagination .= "<div class=\"divPagination\">";
        if( $intPage != 1)
        {
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow\" onclick=\"onChangePage(1)\" title=\"Inicio\">⋘</label>";
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow\" onclick=\"onChangePage(" . ( $intPage - 1) . ")\" title=\"Anterior\">≪</label>";
        }
        else
        {
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow labelPaginationDisabled\" title=\"Inicio\">&#8920;</label>";
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow labelPaginationDisabled\" title=\"Anterior\">&#8810</label>";
        }

        $htmlPagination .= "<div class=\"divPagesScroll\">";

        for($p = 1; $p <= $objPagination["intPages"]; $p++)
        {
            if( $p != $intPage)
            {
                $htmlPagination .= "<label class=\"labelPagination\" onclick=\"onChangePage($p)\">$p</label>";
            }
            else
            {
                $htmlPagination .= "<label class=\"labelPagination labelPaginationCurrent\">$p</label>";
            }
        }

        $htmlPagination .= "</div>";

        if( $intPage != $objPagination["intPages"])
        {
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow labelPaginationDisabled\" title=\"Siguiente\">&#8811</label>";
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow labelPaginationDisabled\" title=\"Final\">&#8921</label>";
        }
        else
        {
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow\" onclick=\"onChangePage(" . ( $intPage + 1) . ")\" title=\"Siguiente\">≫</label>";
            $htmlPagination .= "<label class=\"labelPagination labelPaginationArrow\" onclick=\"onChangePage(" . $objPagination["intPages"] . ")\" title=\"Final\">⋙</label>";
        }

        $htmlPagination .= "<div class=\"paginationInfo\">";
        $htmlPagination .= "<b> " . $objPagination["intTotalRows"] . " </b> Registros - <b>" . $objPagination["intPages"] . "</b> Páginas -";
        $htmlPagination .= "<select id=\"numPages\" onchange=\"onChangeRecords(this.value);\">";
        $htmlPagination .= "<option  value=\"10\" " . ( $intRecordsPerPage ==  10 ? "selected=\"selected\"" : "" ) . ">10</option>";
        $htmlPagination .= "<option  value=\"20\" " . ( $intRecordsPerPage ==  20 ? "selected=\"selected\"" : "" ) . ">20</option>";
        $htmlPagination .= "<option  value=\"40\" " . ( $intRecordsPerPage ==  40 ? "selected=\"selected\"" : "" ) . ">40</option>";
        $htmlPagination .= "<option  value=\"60\" " . ( $intRecordsPerPage ==  60 ? "selected=\"selected\"" : "" ) . ">60</option>";
        $htmlPagination .= "<option  value=\"80\" " . ( $intRecordsPerPage ==  80 ? "selected=\"selected\"" : "" ) . ">80</option>";
        $htmlPagination .= "<option value=\"100\" " . ( $intRecordsPerPage == 100 ? "selected=\"selected\"" : "" ) . ">100</option>";
        $htmlPagination .= "</select>";
        $htmlPagination .= "Registros por página";
        $htmlPagination .= "</div>";
        $htmlPagination .= "</div>";

        $jsnPhpScriptResponse["htmlPagination"] = $htmlPagination;
        //echo "<br><br><br>" . $htmlPagination;
        //$objAscend->printArray($rstQuery);

        #

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

        $jsnPhpScriptResponse["htmlResult"] = $jsnDetail . $jsnReplacement . $jsnCompatibility . $jsnStock;
        break;
}
unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>