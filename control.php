<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$conMySql = mysqli_connect('localhost','root','','db_ascend');
mysqli_query($conMySql, "SET NAMES 'utf8'");

$arrMenu = array();

$strSql = "SELECT * FROM tblMenu WHERE intParent = 0 ORDER BY intOrder;";
$rstLevel0 = mysqli_query($conMySql, $strSql);

$strDivs0 = '<div id="divMenuCategory_0" class="divMenuLevel0">' . "\r\n";
$strDivs1 = '';
$strDivs2 = '';
$strJavaScriptArray0 = "'Categories':Array(";
$strJavaScriptArray1 = "";
while($arrLevel0=mysqli_fetch_assoc($rstLevel0)){
    $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel0['intId'] . " ORDER BY intOrder;";
    $rstLevel1 = mysqli_query($conMySql, $strSql);

    if(mysqli_num_rows($rstLevel1)!=0){
        $strDivs0 .= '<div id="divMenuCategory_' . $arrLevel0['intId'] . '" onclick="openMenu(2,' . $arrLevel0['intId'] . ');" class="divMenuCategory"><div class="divMenuLabel">' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
        $strDivs1 .= '<div id="divMenuMain_' . $arrLevel0['intId'] . '" class="divMenuLevel1">' . "\r\n";
        $strJavaScriptArray0 .= "'" . $arrLevel0['intId'] . "',";
        $strJavaScriptArray1 .= "'" . $arrLevel0['intId'] . "':Array(";
    }else{
        $strDivs0 .= '<div id="divMenuOption_' . $arrLevel0['intId'] . '" onclick="handleTab(\'' . $arrLevel0['intId'] . '\',\'' . $arrLevel0['strName'] . '\',\'' . $arrLevel0['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
    }
    while($arrLevel1=mysqli_fetch_assoc($rstLevel1)){
        $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel1['intId'] . " ORDER BY intOrder;";
        $rstLevel2 = mysqli_query($conMySql, $strSql);
        if(mysqli_num_rows($rstLevel2)!=0){
            $strDivs1 .= '<div id="divMenuSubCategory_' . $arrLevel1['intId'] . '" onclick="openMenu(3,' . $arrLevel1['intId'] . ');" class="divMenuSubCategory"><div class="divMenuLabel">' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
            $strDivs2 .= '<div id="divMenuMain_' . $arrLevel1['intId'] . '" class="divMenuLevel2">' . "\r\n";
            $strJavaScriptArray1 .= "'" . $arrLevel1['intId'] . "',";
        }else{
            $strDivs1 .= '<div id="divMenuOption_' . $arrLevel1['intId'] . '" onclick="handleTab(\'' . $arrLevel1['intId'] . '\',\'' . $arrLevel1['strName'] . '\',\'' . $arrLevel1['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
        }
        while($arrLevel2=mysqli_fetch_assoc($rstLevel2)){
            $strDivs2 .= '<div id="divMenuOption_' . $arrLevel2['intId'] . '" onclick="handleTab(\'' . $arrLevel2['intId'] . '\',\'' . $arrLevel2['strName'] . '\',\'' . $arrLevel2['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel2['strName'] . '</div></div>' . "\r\n";
        }
        unset($arrLevel2);
        if(mysqli_num_rows($rstLevel2)!=0) {
            $strDivs2 .= "</div>" . "\r\n";
        }
        mysqli_free_result($rstLevel2);
        unset($rstLevel2);
    }
    unset($arrLevel1);
    if(mysqli_num_rows($rstLevel1)!=0) {
        $strDivs1 .= "</div>" . "\r\n";
        $strJavaScriptArray1 .= "'END'),";
    }
    mysqli_free_result($rstLevel1);
    unset($rstLevel1);
}
unset($arrLevel0);
$strDivs0 .= "</div>" . "\r\n";
$strJavaScriptArray0 .= "'END'),";
mysqli_free_result($rstLevel0);
unset($rstLevel0);

mysqli_close($conMySql);
unset($conMySql);

$strJavaScriptArray= str_replace(",'END'","",$strJavaScriptArray0) . str_replace("'END'","",str_replace(",'END'","",$strJavaScriptArray1));
$strJavaScriptArray = "$arrMenu = {" . substr($strJavaScriptArray,0,strlen($strJavaScriptArray) - 1) . "};\r\n";

?>
</body>
</html>