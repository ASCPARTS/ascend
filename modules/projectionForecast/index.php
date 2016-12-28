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
<body>
    <div class="MainTitle">FORECAST ASC PARTS</div>
    <div class="MainContainer">
    <div class="SubTitle">REGLAS DE FORECAST VIGENTES</div>
        <div class="ButtonContainer">
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getInfoFilter(0)">Nueva Regla Forecast</button>
        </div>
        <div class="row" id="tblPromo">
       
        </div>

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
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intQuantity">
                                <label>Semanas a Proyectar</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                        <div class="divSelect boxYellow">
                            <select id="intWarehouse">
                                <?php
                                $strSql="SELECT intId AS strValue, strDescription AS strDisplay FROM catWarehouse WHERE strStatus = 'A' ORDER BY 2;";
                                $rstFamily = $objAscend->dbQuery($strSql);
                                foreach ($rstFamily as $arrFamily){
                                    ?>
                                    <option value='<?php echo $arrFamily['strValue']; ?>'><?php echo $arrFamily['strDisplay']; ?></option>
                                    <?php
                                }
                                unset($rstFamily);
                                ?>
                            </select>
                            <label for="cbo1">Almacen</label>
                        </div>
                        </div>
                    </div>
                    <div class="row" id="firstPeriod">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
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
                            <div class="divInputText calendarYellow">
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
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="add.png" id="add1" width="30" height="30" oncl>
                        </div>

                    </div>
                    <div class="row" id="secondPeriod">
                        
                            
                                
                                
                            
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor3">
                                <label>Tercer Factor</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod4">
                                <label>Cuarto Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor4">
                                <label>Cuarto Factor</label>
                            </div>
                        </div>
                        <div id="2" class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="less.png" id="add2" width="30" height="30" onclick="deletePeriod('secondPeriod');">
                        </div>
                    </div>
                    <div class="row" id="thirdPeriod">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod5">
                                <label>Quinto Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor5">
                                <label>Quinto Factor</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod6">
                                <label>Sexto Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor6">
                                <label>Sexto Factor</label>
                            </div>
                        </div>
                        <div id="3" class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="less.png" id="add3" width="30" height="30" onclick="deletePeriod(thirdPeriod);">
                        </div>
                    </div>
                    <div class="row" id="fourthPeriod">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod7">
                                <label>Septimo Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor7">
                                <label>Septimo Factor</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod8">
                                <label>Octavo Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor8">
                                <label>Octavo Factor</label>
                            </div>
                        </div>
                        <div id="4" class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="less.png" id="add4" width="30" height="30" onclick="deletePeriod(fourthPeriod);">
                        </div>
                    </div>
                    <div class="row" id="fifthPeriod">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod9">
                                <label>Noveno Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor9">
                                <label>Noveno Factor</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod10">
                                <label>Decimo Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor10">
                                <label>Decimo Factor</label>
                            </div>
                        </div>
                        <div id="5" class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="less.png" id="add5" width="30" height="30" onclick="deletePeriod(fifthPeriod);">
                        </div>
                    </div>
                    <div class="row" id="sixthPeriod">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod11">
                                <label>Decimo Primer Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor11">
                                <label>Decimo Primer Factor</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText calendarYellow">
                                <input type="text" id="intPeriod12">
                                <label>Decimo Segundo Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divInputText numberYellow">
                                <input type="text" id="decFactor12">
                                <label>Decimo Segundo Factor</label>
                            </div>
                        </div>
                        <div id="6" class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <input type="image" src="less.png" id="add6" width="30" height="30" onclick="deletePeriod(sixthPeriod);">
                        </div>
                    </div>
                    <div class="SubTitle" id="divFilterTitle">Aplicar A:</div>
                    <div class="row" id="divFilter">
                        <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                            <div class="divSelect groupYellow ">
                                <select id="intFamily">
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
                    <div class="row" id="divProduct"></div>
                    <div class="ButtonContainer">
                        <input class="btn btnOnlineGreen" id="saveNew" type="button" value="Guardar" onclick="saveValues();">
                    </div>
                    <div class="ButtonContainer" >
                        <input class="btn btnBrandRed" id="btnOrder" type="button" value="Generar Orden de Compra">
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