<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ('../../inc/include.config.php');
    require_once('../../'. LIB_PATH .'class.ascend.php');
    $objAscend = new clsAscend();
    require_once("../../inc/sheet.inc");

    ini_set("display_errors",1);
    ?>
    
</head>
<body>
    <div class="MainTitle">PROMOCIONES ASC PARTS</div>
    <div class="MainContainer">
    <div class="SubTitle">PROMOCIONES VIGENTES</div>
        <div class="row">
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
                <div class="divInputText calendarYellow"><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateFrom">
                    <label>Inicio de Promoción</label>
                </div>
            </div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
                <div class="divInputText calendarYellow "><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateTo">
                    <label>Fin de la Promoción</label>
                </div>
            </div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
                <div class="divSelect groupYellow">
                    <select id="strStatus">
                        <option value="'A'" selected="selected">Activas</option>
                        <option value="'C'">Canceladas</option>
                        <option value="'A','C'">Ambas</option>
                    </select>
                    <label>Estatus de la Promoción</label>
                </div>
            </div>
        </div>
        <div class="ButtonContainer">
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getPromo();">Filtrar</button>
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getInfoFilter(0)">Nueva Promoción</button>
        </div>
        <div class="row" id="tblPromo">
       
        </div>

        <!--MODAL NUEVA PROMOCION-->
        <div class="row">
            <div id="modalAdd" class="modal">
                <!-- Modal content -->
                <div id="getModal-header" class="modal-header">
                    <div id="getModal-title" class="modal-title">Promociones</div>
                    <div class="modal-close"><span class="close" onclick="$('#modalAdd').hide();">&times;</span></div>
                </div>
                <div class="modal-content">
                    <div class="MainContainer" id="newPromo">
                        <div class="SubTitle">Información de la Promoción:</div>
                        <div class="row">
                            <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                                <div class="divInputText attachmentYellow">
                                    <input type="text" id="strName">
                                    <label>Nombre de la Promoción</label>
                                </div>
                            </div>
                            <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                                <div class="divSelect discountYellow">
                                    <select id="strDiscount">
                                        <option value="1" selected="selected">Porcentaje</option>
                                        <option value="2">Valor Monetario</option>
                                        <option value="3">Piezas</option>
                                    </select>
                                    <label>Tipo de Promoción</label>
                                </div>
                            </div>
                            <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                                <div class="divInputText numberYellow">
                                    <input type="text" id="intDiscount">
                                    <label>Cantidad a descontar</label>
                                </div>
                            </div>
                            <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3">
                                <div class="divInputText calendarYellow">
                                    <input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateNewFrom">
                                    <label>Inicio de la Promoción</label>
                                </div>
                            </div>
                            <div class="col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3"><div class="divInputText calendarYellow ">
                                    <input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateNewTo">
                                    <label>Fin de la Promoción</label>
                                </div>
                            </div>
                        </div>
                        <div class="SubTitle" id="divPriceListTitle">Lista de Precios:</div>
                        <div class="row" id="divPriceList"></div>
                        <div class="SubTitle" id="divHistoryTitle">Historial:</div>
                        <div class="row" id="divHistory"></div>
                        
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
                            <button class="btn btnOnlineGreen" type="button" id="myBtnFilter" onclick="getProductList();">Filtrar</button>
                        </div>
                        <div class="SubTitle">Información de Productos:</div>
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

        <br style="clear: both;" />
    </div>
<?php require_once("../../inc/include.working.php");?>
</body>
<script>
    $intDD = '<?php echo date('Y-m-d');?>';
</script>
<script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>