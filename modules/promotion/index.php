<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once ('../../inc/include.config.php');
    ini_set("display_errors",0);
    require_once('../../'. LIB_PATH .'class.ascend.php');
    $objAscend = new clsAscend();
    require_once("../../inc/sheet.inc");
    ?>
    
</head>
<body>
    <div class="MainTitle">PROMOCIONES ASC PARTS</div>
    <div class="MainContainer">
    <div class="SubTitle">PROMOCIONES VIGENTES</div>
        <div class="row">
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divInputText calendarYellow"><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateFrom"><label>Fecha (de)</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divInputText calendarYellow "><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateTo"><label>Fecha (hasta)</label></div></div>
            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divSelect groupYellow"><select id="strStatus"><option value="'A'" selected="selected">Activas</option><option value="'C'">Canceladas</option><option value="'A','C'">Ambas</option></select><label>Estatus</label></div></div>
        </div>
        <div class="ButtonContainer">
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="onclick="getPromo();"">Filtrar</button>
        </div>
        <div class="ButtonContainer">
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('myModal','closeModal')">Nueva Promoción</button>
        </div>
        <div class="row" id="tblPromo">
       
        </div>
     

        <!--ROW DEL MODAL [INICIO]-->
        <div class="row">
        
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeModal" class="close">×</span>
                    <div class="MainTitle">NUEVA PROMOCION</div>
                    <div class="MainContainer" id="newPromo">
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 col-xs-1-2">
                                <div class="divInfo">
                                    <span type="text">Alfredo Aguilar</span>
                                    <label for="text1">Usuario Creador</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 col-xs-1-2">
                                <div class="divInfo">
                                    <span type="text">2016-12-11</span>
                                    <label for="text1">fecha de creación</label>
                                </div>
                            </div>
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-4">
                                <div class="divInputText calendarYellow">
                                    <input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateFrom">
                                    <label>Fecha (de)</label>
                                </div>
                            </div>
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-md-1-4 col-lg-1-4">
                                <div class="divInputText calendarYellow "><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateTo">
                                    <label>Fecha (hasta)</label>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divInputText discountYellow">
                                    <input type="text">
                                    <label>descuento de promocion</label>
                                </div>
                            </div>

                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divInputText attachmentYellow">
                                    <input type="text">
                                    <label>titulo de la promoción</label>
                                </div>
                            </div>

                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divSelect referenceYellow">
                                    <select>
                                        <option>A</option>
                                        <option>C</option>
                                    </select>
                                    <label for="x">Estatus</label>
                                </div>
                            </div>


                        </div>
                        <div class="row" id="divProduct">


                        </div>

                        <div class="ButtonContainer">
                            <input class="btn btnOnlineGreen" type="button" value="Guardar">
                        </div>

                        <div class="ButtonContainer">  
                            <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                        </div>
                        
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL [FIN]-->

        <!--ROW DEL MODAL EDITAR[INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">EDITAR PROMOCION</div>
                    <div class="MainContainer" id="newPromo">
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 col-xs-1-2">
                                <div class="divInfo">
                                    <span type="text">Alfredo Aguilar</span>
                                    <label for="text1">Usuario Creador</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 col-xs-1-2">
                                <div class="divInfo">
                                    <span type="text">2016-12-11</span>
                                    <label for="text1">fecha de creación</label>
                                </div>
                            </div>
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-4">
                                <div class="divInputText calendarYellow">
                                    <input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateFrom">
                                    <label>Fecha (de)</label>
                                </div>
                            </div>
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-3 col-md-1-4 col-lg-1-4">
                                <div class="divInputText calendarYellow "><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateTo">
                                    <label>Fecha (hasta)</label>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divInputText discountYellow">
                                    <input type="text">
                                    <label>descuento de promocion</label>
                                </div>
                            </div>

                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divInputText attachmentYellow">
                                    <input type="text">
                                    <label>titulo de la promoción</label>
                                </div>
                            </div>

                            <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                                <div class="divSelect referenceYellow">
                                    <select>
                                        <option>A</option>
                                        <option>C</option>
                                    </select>
                                    <label for="x">Estatus</label>
                                </div>
                            </div>


                        </div>
                        <div class="ButtonContainer">  
                            <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                        </div>

                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL [FIN]-->
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="javascript.js"></script>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>