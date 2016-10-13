<?php

require_once('../../'.LIB_PATH .'class.ascend.php');

class clsSearchAscend extends clsAscend
{
    private $objAscend;
    function __construct(){
        $this -> objAscend = new clsAscend();
    }

    public function queryPagination( $strSql, $intPage, $intRecordsPerPage )
    {
        $sqlCount = "SELECT COUNT(*) AS intCount FROM( " . str_replace(";", "", $strSql) . " ) A";
        //echo "<br><br>" . $strSql . "<br><br> . $intPage . \"<br><br> . $intPage . \"<br><br>";
        //echo "<br><br>" . $sqlCount . "<br><br>";
        $rstCount = $this -> objAscend -> dbQuery( $sqlCount);
        $intCount = $rstCount[0]["intCount"];
        $intStartRecord = ( $intPage == 1 ? 0 : (( $intPage - 1 ) * $intRecordsPerPage) );

        if( $intStartRecord >= $intCount )
        {
            $strLimit = "LIMIT 0, $intRecordsPerPage";
        }
        else
        {
            $strLimit = "LIMIT $intStartRecord, $intRecordsPerPage";
        }

        $intPages = ceil($intCount / $intRecordsPerPage);
        return array
        (
            "strLimit" => " " . $strLimit . "; ",
            "intPages" => $intPages,
            "intTotalRows" => $intCount
        );
    }

    //support functions ascend
    public function priceRuleCalculation($decPrice, $strRule)
    {
        $decResult = 0;
        $strRuleDescription = "";
        switch ($strRule)
        {
            case "-10%":    $decResult = $decPrice * 0.9;   $strRuleDescription = "-10%";   break;
            case "-20%":    $decResult = $decPrice * 0.8;   $strRuleDescription = "-20%";   break;
            case "-30%":    $decResult = $decPrice * 0.7;   $strRuleDescription = "-30%";   break;
            case "-40%":    $decResult = $decPrice * 0.6;   $strRuleDescription = "-40%";   break;
            case "-50%":    $decResult = $decPrice * 0.5;   $strRuleDescription = "-50%";   break;
            case "-60%":    $decResult = $decPrice * 0.4;   $strRuleDescription = "-60%";   break;
            case "-70%":    $decResult = $decPrice * 0.3;   $strRuleDescription = "-70%";   break;
            case "-80%":    $decResult = $decPrice * 0.2;   $strRuleDescription = "-80%";   break;
            case "-90%":    $decResult = $decPrice * 0.1;   $strRuleDescription = "-90%";   break;
        }
        return array("decPrice" => $decResult, "strRuleDescription" => $strRuleDescription );
    }

    public function getLateralBar( $sql, $intStock, $strPriceRange, $jsnBrand, $jsnGroup )
    {
        $htmlLateralBar = "";
        $strSelectPivot = "SELECT P.intId, P.strSku, P.strPartNumber, P.strDescription, P.decPrice, P.intBrand, B.strName AS strBrand, P.intGroup, G.strName AS strGroup, P.intCondition, C.strName AS strCondition, I.intSold, IFNULL(PR.strRule, '') AS strPromotionRule, IFNULL(PR.strStatus, 'B') AS strPromotionStatus, IFNULL(PI.strUrl, 'product/notfound.jpg') AS strImage, IFNULL( (SELECT SUM(intStock) FROM tblWarehouseStock WHERE intProduct = P.intId AND strStatus = 'A'), 0) AS intStock";




        #STOCK
        $htmlLateralBar .= '<div class="SubTitle">Existencias</div>';
        $htmlLateralBar .= '<div class="row">';
        $htmlLateralBar .= '<div class="divInputMiniCheck divBrandBlue">';
        $htmlLateralBar .= '<input class="checkStock" type="checkbox" id="chbExistence" onchange="pushStock()" ' . ( $intStock == 1 ? 'checked' : '' ) .' >';
        $htmlLateralBar .= '<label for="stocksFilter">Disponibles</label>';
        $htmlLateralBar .= '</div>';
        $htmlLateralBar .= '</div>';




        #PRICERANGE
        $intRange = 5;
        $sqlPriceRange = str_replace( $strSelectPivot, "SELECT MAX(P.decPrice) AS decMax, MIN(P.decPrice) AS decMin", $sql);
        $sqlPriceRange = str_replace("ORDER BY strPromotionStatus ASC, I.intSold DESC", " AND P.decPrice <> 0 ", $sqlPriceRange);
        //echo "<br>" . $sqlPriceRange . "<br>";
        $objRange = $this -> objAscend -> dbQuery( $sqlPriceRange);
        $decRange = ( $objRange[0]["decMax"] - $objRange[0]["decMin"] ) / $intRange ;
        //echo "<br>decMin: " . $objRange[0]["decMin"] . "<br>";
        //echo "<br>decMax: " . $objRange[0]["decMax"] . "<br>";
        //echo "<br>decRange: " . $decRange . "<br>";
        //$this ->objAscend ->printArray($objRange);

        $htmlLateralBar .= '<div class="SubTitle">Precios</div> ';
	    $htmlLateralBar .= '<div class="row"> ';
		$htmlLateralBar .= '<div class="divSelect divBrandBlue costGray"> ';
        $htmlLateralBar .= '<select id="priceRangeFilter" onchange="onChangeRangePrice()"> ';

        $arrPriceRange = array();
        $arrPriceRanges = explode("-", $strPriceRange );
        //$arrPriceRange[0] = array("intIndex" => 1, "strRange" => "$ " . number_format(1, 2, ".", ",") . " - $ " . number_format($objRange[0]["decMin"], 2, ".", ",")  );
        $htmlLateralBar .= '<option value="ALL">Todos</option>';
        for($r = 1; $r < $intRange; $r++)
        {
            $strSelectValue = number_format(( $objRange[0]["decMin"] + ( $decRange* $r) ), 2, ".", "") . "-" . number_format(( $objRange[0]["decMin"] + ( $decRange* $r) + $decRange ), 2, ".", "");
            $strSelectText = 'De ' . "$ " . number_format(( $objRange[0]["decMin"] + ( $decRange* $r) ), 2, ".", ",") . " a $ " . number_format(( $objRange[0]["decMin"] + ( $decRange* $r) + $decRange ), 2, ".", ",");
            $htmlLateralBar .= '<option value="' . $strSelectValue . '" ' . ( $strPriceRange == $strSelectValue ? 'selected' : '' ) . ' > ' . $strSelectText . '</option> ';
            //$arrPriceRange[$r] = array("intIndex" => ($r + 1), "strRange" => "$ " . number_format(( $objRange[0]["decMin"] + ( $decRange* $r) ), 2, ".", ",") . " - $ " . number_format(( $objRange[0]["decMin"] + ( $decRange* $r) + $decRange ), 2, ".", ",")  );
        }
        $htmlLateralBar .= '</select> ';
        $htmlLateralBar .= '<label for="priceRangeFilter">Rango de precios</label> ';
        $htmlLateralBar .= '</div> ';
        $htmlLateralBar .= '</div>';




        #BRANDS
        $sqlBrands = str_replace( $strSelectPivot, "SELECT P.intBrand, B.strName AS strBrand", $sql);
        $sqlBrands = str_replace( "ORDER BY strPromotionStatus ASC, I.intSold DESC", "", $sqlBrands);
        $sqlBrands = "SELECT * FROM ( " . $sqlBrands . ") A GROUP BY intBrand ORDER BY strBrand";
        $objBrands = $this -> objAscend -> dbQuery( $sqlBrands);
        //$this->objAscend->printArray($jsnBrand);
        if( count($objBrands) > 0 )
        {
            $htmlLateralBar .= '<div class="SubTitle">Marcas</div>';
            $htmlLateralBar .= '<div class="row sizeFilter" id="brandsFilter">';
            foreach( $objBrands as $brand )
            {
                $intIsCheckedBrand = 0;
                foreach ($jsnBrand as $checkedBrand)
                {
                    if( $brand["intBrand"] == $checkedBrand ) { $intIsCheckedBrand = 1;  }
                }
                $htmlLateralBar .= '<div class="divInputMiniCheck divBrandBlue">';
                $htmlLateralBar .= '<input type="checkbox" class="checkBrands" id="' . 'chbStrBrand' . $brand["intBrand"] . '" onchange="pushBrand()" value="' . $brand["intBrand"] . '" ' . ( $intIsCheckedBrand == 1 ? 'checked' : '') . '>';
                $htmlLateralBar .= '<label for="' . 'chbStrBrand' . $brand["intBrand"] . '">' . $brand["strBrand"] . '</label>';
                $htmlLateralBar .= '</div>';
            }
            $htmlLateralBar .= '</div>';
        }

        #GROUPS
        $sqlGroups = str_replace( $strSelectPivot, "SELECT P.intGroup, G.strName AS strGroup", $sql);
        $sqlGroups = str_replace( "ORDER BY strPromotionStatus ASC, I.intSold DESC", "", $sqlGroups);
        $sqlGroups = "SELECT * FROM ( " . $sqlGroups . ") A GROUP BY intGroup ORDER BY strGroup";
        $objGroups = $this -> objAscend -> dbQuery( $sqlGroups);
        //$this->objAscend->printArray($jsnGroup);
        if( count($objGroups) > 0 )
        {
            $htmlLateralBar .= '<div class="SubTitle">Grupos</div>';
            $htmlLateralBar .= '<div class="row sizeFilter" id="groupsFilter">';
            foreach( $objGroups as $group )
            {
                $intIsCheckedGroup = 0;
                //echo gettype($jsnGroup);

                foreach ($jsnGroup as $checkedGroup)
                {
                    if( $group["intGroup"] == $checkedGroup ) { $intIsCheckedGroup = 1;  }
                }
                $htmlLateralBar .= '<div class="divInputMiniCheck divBrandBlue">';
                $htmlLateralBar .= '<input type="checkbox" class="checkGroups" id="' . 'chbStrGroup' . $group["intGroup"] . '"  onchange="pushGroup()" value="' . $group["intGroup"] . '" ' . ( $intIsCheckedGroup == 1 ? 'checked' : '') . '>';
                $htmlLateralBar .= '<label for="' . 'chbStrGroup' . $group["intGroup"] . '">' . $group["strGroup"] . '</label>';
                $htmlLateralBar .= '</div>';
            }
            $htmlLateralBar .= '</div>';
        }


        //echo $htmlLateralBar;
        return $htmlLateralBar;
    }
}