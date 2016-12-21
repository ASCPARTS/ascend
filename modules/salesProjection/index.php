<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ('../../inc/include.config.php');
    require_once('../../'. LIB_PATH .'class.ascend.php');
    $objAscend = new clsAscend();
    require_once("../../inc/sheet.inc");
    ini_set("display_errors",0);
    ini_set("memory_limit",0);
    $intIdUser=$_SESSION['intUserID'];
    ?>
</head>
<body>
<div class="MainTitle">Proyección de Ventas</div>
<div class="MainContainer">
    <div class="SubTitle">Proyección</div>
    <div class="row">
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3">
            <div class="divSelect groupYellow ">
                <select id="decFactor">
                    <?php
                    $strSql="SELECT decFactor as strValue, intAnio as strDisplay FROM tblFactor WHERE intAnio >= 2016 ORDER BY 2;";
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
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3">
            <div class="divSelect numberYellow">
                <select id="strEstimate">
                    <option value="S" selected="selected">SI</option>
                    <option value="N">NO</option>
                </select>
                <label>Estimado</label>
            </div>
        </div>
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-lg-1-3">
            <div class="divSelect groupYellow ">
                <select id="intProjection">
                    <option value="1">ZONA</option>
                    <option value="2">VENDEDOR</option>

                    ?>
                </select>
                <label for="cbo1">Proyeccion Por:</label>
            </div>
        </div>
    </div>

    <div class="ButtonContainer">
        <input class="btn btnOnlineGreen" id="calculation" type="button" value="Calcular" onclick="calculation();">
    </div>
    <div class="row" id="divSales">
    </div>
    <br style="clear: both;" />
</div>
</div>
<?php require_once("../../inc/include.working.php");?>
</body>
<script>
    $intDD = '<?php echo date('Y-m-d');?>';
</script>
<script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>