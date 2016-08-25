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

$strSql = "SELECT * FROM tblMenu WHERE intParent = 0 ORDER BY intOrder;";
$rstLevel0 = mysqli_query($conMySql, $strSql);

while($arrLevel0=mysqli_fetch_assoc($rstLevel0)){
    echo $arrLevel0['intId'] . " - " . $arrLevel0['strName'] . "<br />";
}
unset($arrLevel0);

mysqli_free_result($rstCategory);
unset($rstCategory);

mysqli_close($conMySql);
unset($conMySql);
?>
</body>
</html>