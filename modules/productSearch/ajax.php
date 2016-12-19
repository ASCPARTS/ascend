<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');
require_once('class.productSearch.php');

$objAscend = new clsAscend();
$objProductSearch= new clsProductSearch();

$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();
$jsnPhpScriptResponse = array();


switch ($strProcess)
{
    case 'modal':
        $jsnPhpScriptResponse["jsnModal"] .= '<div class="row">';
            $jsnPhpScriptResponse["jsnModal"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2" id="divParameter">';
                $jsnPhpScriptResponse["jsnModal"] .= '<div class="divInputText searchGray"><input type="text" id="strProductParameter"><label for="strProductParameter">Datos del producto</label></div>';
            $jsnPhpScriptResponse["jsnModal"] .= '</div>';
            $jsnPhpScriptResponse["jsnModal"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2" id="divParameter">';
                $jsnPhpScriptResponse["jsnModal"] .= '<button class="btn btnBrandBlue" type="button" id="btnSearch" onclick="productSearch_search();">Buscar</button>';
            $jsnPhpScriptResponse["jsnModal"] .= '</div>';
        $jsnPhpScriptResponse["jsnModal"] .= '</div>';

        $jsnPhpScriptResponse["jsnModal"] .= '<div class="row">';
            $jsnPhpScriptResponse["jsnModal"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divProductList">';
        $jsnPhpScriptResponse["jsnModal"] .= '</div>';
        $jsnPhpScriptResponse["jsnModal"] .= '<div class="row">';
            $jsnPhpScriptResponse["jsnModal"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divProductInformation">';
        $jsnPhpScriptResponse["jsnModal"] .= '</div>';
    break;

    case 'search':
        $strType = $_REQUEST['strType'];
        $intPage = $_REQUEST['intPage'];
        $intRecordsPerPage = $_REQUEST['intRecordsPerPage'];

        $intStock = $_REQUEST['intStock'];
        $strPriceRange = $_REQUEST['strPriceRange'];

        $jsnBrand = json_decode($_REQUEST['jsnBrand'], true);
        $jsnGroup = json_decode($_REQUEST['jsnGroup'], true);

        $jsnParameters = json_decode($_REQUEST["jsnParameters"], true);
        //--

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
        //--

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

        //echo $sqlProduct;
        
        $jsnPhpScriptResponse["htmlLateralBar"] = $objProductSearch -> getLateralBar($sqlProduct, $intStock, $strPriceRange, $jsnBrand, $jsnGroup );


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
        //echo $intPage . "<br>" . $intRecordsPerPage;
        $objPagination = $objProductSearch->queryPagination($sqlProduct, $intPage, $intRecordsPerPage);
        $rstProduct = $objAscend->dbQuery($sqlProduct . $objPagination["strLimit"] );
        $rstQuery = $rstProduct;
        unset($rstProduct);

        /////////////////////////////////////
        $jsnPhpScriptResponse["htmlProduct"] = "";
        $jsnPhpScriptResponse["htmlProduct"] .= "<table>";
        $jsnPhpScriptResponse["htmlProduct"] .= "<thead>";
            $jsnPhpScriptResponse["htmlProduct"] .= "<tr>";
                $jsnPhpScriptResponse["htmlProduct"] .= "<td> Numero de Parte</td> <td>Promocion</td> <td>Descripcion</td> <td>Marca</td> <td>Tipo</td>";
            $jsnPhpScriptResponse["htmlProduct"] .= "</tr>";
        $jsnPhpScriptResponse["htmlProduct"] .= "</thead>";
        $jsnPhpScriptResponse["htmlProduct"] .= "<tbody>";
        foreach($rstQuery as $product)
        {
            $htmlProduct = '<tr>';
            //if(!file_exists("../../img/" . $product["strImage"])) { $product["strImage"] = "product/notfound.jpg";   }
            //$htmlProduct .= '<img src="../../img/' . $product["strImage"] .'">';
            $htmlProduct .= '<td> ' . $product["strPartNumber"] . '</td>';

            if( $product["strPromotionStatus"] != null && $product["strPromotionStatus"] == "A" )
            {
                $objPromotion = $objProductSearch->priceRuleCalculation( $product["decPrice"], $product["strPromotionRule"] );
                $htmlProduct .= '<td' . $objPromotion["strRuleDescription"] . '</td>';
            }
            else
            {
                $htmlProduct .= '<td >-</td>';
            }

            $htmlProduct .= '<td>' . $product["strDescription"] . '</td>';
            $htmlProduct .= '<td>' . $product["strBrand"] . '</td>';
            $htmlProduct .= '<td>' . $product["strCondition"] . '</td>';


            $htmlProduct .= '<td>$ ' . number_format($product["decPrice"], 2, ",", ".") . '</td>';
            if( $product["strPromotionStatus"] != null && $product["strPromotionStatus"] == "A" )
            {
                $htmlProduct .= '<td>$ ' . number_format($objPromotion["decPrice"], 2, ",", ".") . '</td>';
            }
            else
            {
                $htmlProduct .= '<td>-</td>';
            }




            /*
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectDetails\', \'tabDetails\', \'' . $product["intId"] . '\')">DETALLES</button>';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectReplacements\', \'tabReplacements\', \'' . $product["intId"] . '\')">REMPLAZOS</button>';
            $htmlProduct .= '<button class="btn btnBrandBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectCompatible\', \'tabCompatible\', \'' . $product["intId"] . '\')">COMPATIBLE</button>';
            $htmlProduct .= '<button class="btn btnAlternativeBlue" onclick="getModalTab(\'modalProduct\',\'closeProduct\', \'contectStocks\', \'tabStocks\', \'' . $product["intId"] . '\')">EXISTENCIAS</button>';
            */
            $jsnPhpScriptResponse["htmlProduct"] .= ($htmlProduct);
        }

        $jsnPhpScriptResponse["htmlProduct"] .= "</tbody>";
        $jsnPhpScriptResponse["htmlProduct"] .= "</table>";
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

};

unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>