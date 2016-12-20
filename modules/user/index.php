<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
ini_set("display_errors",0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/grid.css?v=<?php echo date('Ymdhis') ;?>">
</head>
<body>
<div class="MainTitle" id="divTitle">Usuarios</div>
<div class="MainContainer MCHeight">
    <div id="divForm">
        <div id="divFormFilters" class="row">
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3"><div class="divInputText emailGray"><input type="text" id="strMail"><label for="strMail">EMail</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3"><div class="divInputText userGray"><input type="text" id="strName"><label for="strName">Nombre</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3"><div class="divSelect groupGray"><select id="intRoll"><option value="-1">--Todos--</option>
            <?php
            $strSql="SELECT intId, strName FROM catDepartment WHERE strStatus = 'A' ORDER BY strName;";
            $rstData = $objAscend->dbQuery($strSql);
            foreach ($rstData as $arrData){
                ?><option value='<?php echo $arrData['intId']; ?>'><?php echo $arrData['strName']; ?></option><?php
            }
            unset($rstGroup);
            ?>
            </select><label for="intRoll">Departamento</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3"><div class="divSelect groupGray"><select id="intParent"><option value="-1">--Todos--</option>
            <?php
            $strSql="SELECT A.intId, A.strName FROM tblUser A WHERE (SELECT COUNT(*) FROM tblUser B WHERE B.intParent = A.intId) > 0 AND A.strStatus = 'A' ORDER BY A.strName;";
            $rstData = $objAscend->dbQuery($strSql);
            foreach ($rstData as $arrData){
                ?><option value='<?php echo $arrData['intId']; ?>'><?php echo $arrData['strName']; ?></option><?php
            }
            unset($rstGroup);
            ?>
            </select><label for="intParent">Reporta a</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3"><div class="divSelect referenceGray"><select id="strStatus"><option value="'A'" selected="selected">Activos</option><option value="'I'">Inactivos</option><option value="'A','I'">Todos</option></select><label for="strStatus">Estatus</label></div></div>
        </div>
        <div id="divFormSubmit" class="ButtonContainer">
            <input id="btnfilterGrid" type="button" class="btnOnlineGreen btn" value="Filtrar" onclick="filterGrid();">
            <input id="btnnewUser" type="button" class="btnBrandBlue btn" value="Nuevo" onclick="getUser(0);">
        </div>
    </div>
    <br style="clear: both" />
    <?php require_once("../../inc/grid.php");?>
</div>


<?php require_once("../../inc/include.working.php");?>
<script>
    $('#chkList')
</script>
<script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
<script src="../../js/grid.js?v=<?php echo date('Ymdhis') ;?>"></script>
</body>
</html>
<?php
unset($objAscend);
?>