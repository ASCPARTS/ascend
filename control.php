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

while($arrLevel0=mysqli_fetch_assoc($rstLevel0)){
    array_push($arrMenu,array('intId' => $arrLevel0['intId'], 'strName' => $arrLevel0['strName'], 'arrChildren' => array()));

    $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel0['intId'] . " ORDER BY intOrder;";
    $rstLevel1 = mysqli_query($conMySql, $strSql);

    while($arrLevel1=mysqli_fetch_assoc($rstLevel1)){
        //array_push($arrMenu[])
        //echo "---->" . $arrLevel1['intId'] . " - " . $arrLevel1['strName']
        //
        // . "<br />";
        $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel1['intId'] . " ORDER BY intOrder;";
        $rstLevel2 = mysqli_query($conMySql, $strSql);

        while($arrLevel2=mysqli_fetch_assoc($rstLevel2)){
            //echo "--------->" . $arrLevel2['intId'] . " - " . $arrLevel2['strName'] . "<br />";
        }
        unset($arrLevel2);

        mysqli_free_result($rstLevel2);
        unset($rstLevel2);

    }
    unset($arrLevel1);

    mysqli_free_result($rstLevel1);
    unset($rstLevel1);
}
unset($arrLevel0);

mysqli_free_result($rstLevel0);
unset($rstLevel0);

mysqli_close($conMySql);
unset($conMySql);

var_dump($arrMenu);

?>
</body>
</html>