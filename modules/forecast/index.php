<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
require_once("../../inc/sheet.inc");

ini_set("display_errors",0);
ini_set("memory_limit",0);
$_SESSION['intUserID'];
?>
</head>
<div class="MainTitle">FORECAST</div>
<div class="MainContainer">
    <div class="SubTitle">REGLAS DE CALCULO VIGENTE</div>
    <div class="ButtonContainer">
        <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="newForecast()">Nueva Regla de Forecast</button>
    </div>
    <div class="row" id="tblForecast"></div>

    <br style="clear: both;" />
</div>

<!--MODAL NUEVA PROMOCION-->
<div class="row">
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div id="getModal-header" class="modal-header">
            <div id="getModal-title" class="modal-title">FORECAST</div>
            <div class="modal-close"><span class="close" onclick="$('#modalAdd').hide();">&times;</span></div>
        </div>
        <div class="modal-content">
            <div class="MainContainer" id="newPromo">
                <div class="SubTitle">Información de la regla del Forecast:</div>
                <div class="row">
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText attachmentYellow">
                            <input type="text" id="strName">
                            <label>Nombre de la Regla</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divSelect discountYellow">
                            <select id="strType">
                                <option value="M" selected="selected">Mensual</option>
                                <option value="Q">Quincenal</option>
                                <option value="S">Semanal</option>
                            </select>
                            <label>Tipo de Forcast</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText numberYellow">
                            <input type="text" id="intQuantity">
                            <label>Semanas a Proyectar</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText numberYellow">
                            <input type="text" id="intPeriod1">
                            <label>Primer Periodo</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText numberYellow">
                            <input type="text" id="decFactor1">
                            <label>Primer Factor</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText numberYellow">
                            <input type="text" id="intPeriod2">
                            <label>Segundo Periodo</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText numberYellow">
                            <input type="text" id="decFactor2">
                            <label>Segundo Factor</label>
                        </div>
                    </div>
                </div>
                <div class="SubTitle" id="divFilterTitle">Filtrar por:</div>
                <div class="row" id="divFilter">
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText searchGray">
                            <input type="text" id="strSKU">
                            <label>SKU</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divInputText attachmentYellow">
                            <input type="text" id="strPartNumber">
                            <label>Número de Parte</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divSelect groupYellow ">
                            <select id="intFamily">
                                <option value="-1">--Seleccionar--</option>
                                <?php
                                $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblFamily WHERE strStatus = 'A' ORDER BY 2;";
                                $rstFamily = $objAscend->dbQuery($strSql);
                                foreach ($rstFamily as $arrFamily){
                                    ?>
                                    <option value='<?php echo $arrFamily['strValue']; ?>'><?php echo $arrFamily['strDisplay']; ?></option>
                                    <?php
                                }
                                unset($rstFamily);
                                ?>
                            </select>
                            <label for="cbo1">Familia</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divSelect groupYellow ">
                            <select id="intBrand">
                                <option value="-1">--Seleccionar--</option>
                                <?php
                                $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblBrand WHERE strStatus = 'A' ORDER BY 2;";
                                $rstBrand = $objAscend->dbQuery($strSql);
                                foreach ($rstBrand as $arrBrand){
                                    ?>
                                    <option value='<?php echo $arrBrand['strValue']; ?>'><?php echo $arrBrand['strDisplay']; ?></option>
                                    <?php
                                }
                                unset($rstBrand);
                                ?>
                            </select>
                            <label for="cbo1">Marca</label>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divSelect groupYellow ">
                            <select id="intGroup">
                                <option value="-1">--Seleccionar--</option>
                                <?php
                                $strSql="SELECT intId AS strValue, strName AS strDisplay FROM tblGroup WHERE strStatus = 'A' ORDER BY 2;";
                                $rstGroup = $objAscend->dbQuery($strSql);
                                foreach ($rstGroup as $arrGroup){
                                    ?>
                                    <option value='<?php echo $arrGroup['strValue']; ?>'><?php echo $arrGroup['strDisplay']; ?></option>
                                    <?php
                                }
                                unset($rstGroup);
                                ?>
                            </select>
                            <label for="cbo1">Group</label>
                        </div>
                    </div>
                </div>
                <div class="ButtonContainer">
                    <button class="btn btnOnlineGreen" type="button" id="myBtnFilter" onclick="getProductList(0);">Filtrar</button>
                </div>
                <div class="SubTitle">Información de Productos para Forecast:</div>
                <div class="row" id="divProduct"></div>
                <div class="ButtonContainer">
                    <input class="btn btnOnlineGreen" id="saveNew" type="button" value="Guardar" onclick="saveValues();">
                </div>
                <br style="clear: both;" />
            </div>
        </div>
    </div>
</div>
<!--ROW DEL MODAL [FIN]-->



<?php require_once("../../inc/include.working.php");?>
</body>
<script>
$intDD = '<?php echo date('Y-m-d');?>';
</script>
<script src="javascript.js?ascparts=<?php echo date('Ymdhis') ;?>"></script>
<script type="text/javascript" src="../../js/modal.js"></script>
<script type="text/javascript" src="../../lib/jquery.numeric.js"></script>
</html>
