<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ('../../inc/include.config.php');
    require_once('../../'. LIB_PATH .'class.ascend.php');
    $objAscend = new clsAscend();
    require_once("../../inc/sheet.inc");
    ini_set("display_errors",1);
    ini_set("memory_limit",0);
    ?>
</head>


<body>
<div class="MainTitle">Proyección de Ventas</div>
<div class="MainContainer">
    <div class="SubTitle">Proyección</div>
    <div class="row">
        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
            <div class="divSelect groupYellow ">
                <select id="intAnio">
                    <option value="-1">--Seleccionar--</option>
                    <?php
                    $strSql="SELECT intFactor AS strValue, intAnio AS strDisplay FROM tblFamily WHERE strStatus = 'A' ORDER BY 2;";
                    $rstFactor = $objAscend->dbQuery($strSql);
                    foreach ($rstFactor as $arrFactor){
                        ?>
                        <option value='<?php echo $arrFactor['strValue']; ?>'><?php echo $arrFactor['strDisplay']; ?></option>
                        <?php
                    }
                    unset($rstFamily);
                    ?>
                </select>
                <label for="cbo1">Año</label>
            </div>
        </div>
        <div class="col-xs-1-1 col-sm-1-1 col-md-1-2 col-md-1-2 col-lg-1-2">
            <div class="divSelect numberYellow">
                <select id="strStatus">
                    <option value="1" selected="selected">SI</option>
                    <option value="0">NO</option>
                </select>
                <label>Estimado</label>
            </div>
        </div>
    </div>
    <br style="clear: both;" />
</div>
</div>
</body>