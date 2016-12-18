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

        $objPagination = $clsProductSearch->queryPagination($sqlProduct, $intPage, $intRecordsPerPage);
        $rstProduct = $objAscend->dbQuery($sqlProduct . $objPagination["strLimit"] );
        $rstQuery = $rstProduct;
        unset($rstProduct);

    break;

};

unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>