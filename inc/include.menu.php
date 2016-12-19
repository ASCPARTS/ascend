<div id="divMenuMain">
<?php
$strSql = "SELECT * FROM tblMenu WHERE intId IN (SELECT intMenu FROM tblProfileMenu WHERE intProfile IN (SELECT intProfile FROM tblUserProfile WHERE intUser = " . $_SESSION['intUserID'] . ")) AND intParent = 0 AND intStatus = 1 AND strLocation = 'M' ORDER BY intOrder;";
$rstLevel0 = $classAscend->dbQuery($strSql);
$strDivs0 = '<div id="divMenuCategory_0" class="divMenuLevel0">'  . "\r\n" . '<div class="divMenuPadding divMenuLogo"></div>' . "\r\n";
$strDivs1 = '';
$strDivs2 = '';
foreach ($rstLevel0 as $arrLevel0){
    $strSql = "SELECT * FROM tblMenu WHERE intId IN (SELECT intMenu FROM tblProfileMenu WHERE intProfile IN (SELECT intProfile FROM tblUserProfile WHERE intUser = " . $_SESSION['intUserID'] . ")) AND intParent = " . $arrLevel0['intId'] . " AND intStatus = 1 AND strLocation = 'M' ORDER BY intOrder;";
    $rstLevel1 = $classAscend->dbQuery($strSql);
    if(count($rstLevel1)!=0){
        $strDivs0 .= '<div id="divMenuCategory_' . $arrLevel0['intId'] . '" onclick="openMenu(2,' . $arrLevel0['intId'] . ');" class="divMenuCategory"><div class="divMenuLabel"';
        if(!is_null($arrLevel0['strIcon'])){
            $strDivs0 .= ' style="background-image: url(\'' . MENU_ICON_PATH . $arrLevel0['strIcon'] . '\');"';
        }
        $strDivs0 .= '>' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
        $strDivs1 .= '<div id="divMenuMain_' . $arrLevel0['intId'] . '" class="divMenuLevel1">'  . "\r\n" . '<div class="divMenuPadding"></div>' . "\r\n";
    }else{
        $strDivs0 .= '<div id="divMenuOption_' . $arrLevel0['intId'] . '" onclick="handleTab(\'' . $arrLevel0['intId'] . '\',\'' . $arrLevel0['strName'] . '\',\'' . $arrLevel0['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel"';
        if(!is_null($arrLevel0['strIcon'])){
            $strDivs0 .= ' style="background-image: url(\'' . MENU_ICON_PATH . $arrLevel0['strIcon'] . '\');"';
        }
        $strDivs0 .= '>' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
    }
    foreach ($rstLevel1 as $arrLevel1){
        $strSql = "SELECT * FROM tblMenu WHERE intId IN (SELECT intMenu FROM tblProfileMenu WHERE intProfile IN (SELECT intProfile FROM tblUserProfile WHERE intUser = " . $_SESSION['intUserID'] . ")) AND intParent = " . $arrLevel1['intId'] . " AND intStatus = 1 AND strLocation = 'M' ORDER BY intOrder;";
        $rstLevel2 = $classAscend->dbQuery($strSql);
        if(count($rstLevel2)!=0){
            $strDivs1 .= '<div id="divMenuSubCategory_' . $arrLevel1['intId'] . '" onclick="openMenu(3,' . $arrLevel1['intId'] . ');" class="divMenuSubCategory"><div class="divMenuLabel"';
            if(!is_null($arrLevel1['strIcon'])){
                $strDivs1 .= ' style="background-image: url(\'' . MENU_ICON_PATH . $arrLevel1['strIcon'] . '\');"';
            }
            $strDivs1 .= '>' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
            $strDivs2 .= '<div id="divMenuMain_' . $arrLevel1['intId'] . '" class="divMenuLevel2">'  . "\r\n" . '<div class="divMenuPadding"></div>' . "\r\n";
        }else{
            $strDivs1 .= '<div id="divMenuOption_' . $arrLevel1['intId'] . '" onclick="handleTab(\'' . $arrLevel1['intId'] . '\',\'' . $arrLevel1['strName'] . '\',\'' . $arrLevel1['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel"';
            if(!is_null($arrLevel1['strIcon'])){
                $strDivs1 .= ' style="background-image: url(\'' . MENU_ICON_PATH . $arrLevel1['strIcon'] . '\');"';
            }
            $strDivs1 .= '>' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
        }
        foreach ($rstLevel2 as $arrLevel2){
            $strDivs2 .= '<div id="divMenuOption_' . $arrLevel2['intId'] . '" onclick="handleTab(\'' . $arrLevel2['intId'] . '\',\'' . $arrLevel2['strName'] . '\',\'' . $arrLevel2['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel"';
            if(!is_null($arrLevel2['strIcon'])){
                $strDivs2 .= ' style="background-image: url(\'' . MENU_ICON_PATH . $arrLevel2['strIcon'] . '\');"';
            }
            $strDivs2 .= '>' . $arrLevel2['strName'] . '</div></div>' . "\r\n";
        }
        unset($arrLevel2);
        if(count($rstLevel2)!=0) {
            $strDivs2 .= "</div>" . "\r\n";
        }
        unset($rstLevel2);
    }
    unset($arrLevel1);
    if(count($rstLevel1)!=0) {
        $strDivs1 .= "</div>" . "\r\n";
    }
    unset($rstLevel1);
}
unset($arrLevel0);
$strDivs0 .= "</div>" . "\r\n";
unset($rstLevel0);
echo $strDivs0 . $strDivs1 . $strDivs2;
?>
    <div id="divcleanmenu" class="divMenuClear" onclick="closeMenuMain();">
</div>
<br style="clear: both" />
</div>
