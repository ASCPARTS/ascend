<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">ALMACENES</div>
    <div class="MainContainer">
    <div class="SubTitle">REGISTRO DE ALMACENES</div>
        <div class="row">
        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText searchGray">
                    <input type="text" id="buscar">
                    <label for="buscar">BUSCAR</label>
                </div>
            </div>
            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="ButtonContainer">  
		            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('nuevoModal','closeNuevo')">Nuevo</button> 
		        </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                    	<tr>
                	  		<th>ESTADO</th>
                	  		<th>EDITAR</th>

	                      	<th>CLAVE</th>
	                      	<th>NOMBRE</th>
	                      	<th>DIRECCIÓN</th>
	                      	
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>01</td>
	                      	<td>GDL</td>
	                      	<td>DEL FRESNO #123</td>
	                      	
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>01</td>
                            <td>GDL</td>
                            <td>DEL FRESNO #123</td>
                            
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>01</td>
                            <td>GDL</td>
                            <td>DEL FRESNO #123</td>
                            
                        </tr>
                        
                           
                    </tbody>
                </table>
            </div>
        </div>
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="nuevoModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeNuevo" class="close">×</span>
                    <div class="MainTitle">NUEVO ALMACEN</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText keyWordYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">CLAVE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText customsYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">NOMBRE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText streetYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">DIRECCIÓN</label>
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
        <!--ROW DEL MODAL CREAR [FIN]-->

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">EDITAR ALMACEN</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText keyWordYellow">
                                    <input type="text" id="text2" value="01">
                                    <label for="text2">CLAVE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText customsYellow">
                                    <input type="text" id="text2" value="GDL">
                                    <label for="text2">NOMBRE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText streetYellow">
                                    <input type="text" id="text2" value="DEL FRESNO #123">
                                    <label for="text2">DIRECCIÓN</label>
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
        <!--ROW DEL MODAL CREAR [FIN]-->
        
        
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>