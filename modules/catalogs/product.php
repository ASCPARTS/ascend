<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">PRODUCTOS</div>
    <div class="MainContainer">
    <div class="SubTitle">REGISTRO DE PRODUCTOS</div>
        <div class="row">
        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="buscar">
                    <label for="buscar">BUSCAR</label>
                </div>
            </div>
            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="ButtonContainer">  
		            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('myModal','closeModal')">Nuevo</button> 
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

	                      	<th>SKU</th>
	                      	<th>NÚMERO DE PARTE</th>
	                      	<th>FAMILIA</th>
	                      	<th>MARCA</th>
	                      	<th>GRUPO</th>
	                      	<th>CONDICIÓN</th>
	                      	<th>CLASE</th>
	                      	<th>TIPO</th>
	                      	<th>DESCRIPCIÓN</th>
	                      	<th>COSTO</th>
	                      	<th>PRECIO</th>
	                      	<th>IVA</th>
	                      	<th>MONEDA DE COMPRA</th>
	                      	<th>MONEDA DE VENTA</th>
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
                            <td>6543645</td>
	                      	<td>A1357</td>
	                      	<td>MOVILES</td>
	                      	<td>APPLE</td>
	                      	<td>DISPLAY</td>
	                      	<td>ACTIVO</td>
	                      	<td>A</td>
	                      	<td>ORIGINAL</td>
	                      	<td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
	                      	<td>3.40</td>
	                      	<td>9.20</td>
	                      	<td>1.47</td>
	                      	<td>EURO</td>
	                      	<td>DOLAR</td>
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>6543645</td>
	                      	<td>A1357</td>
	                      	<td>MOVILES</td>
	                      	<td>APPLE</td>
	                      	<td>DISPLAY</td>
	                      	<td>ACTIVO</td>
	                      	<td>A</td>
	                      	<td>ORIGINAL</td>
	                      	<td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
	                      	<td>3.40</td>
	                      	<td>9.20</td>
	                      	<td>1.47</td>
	                      	<td>EURO</td>
	                      	<td>DOLAR</td>
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>6543645</td>
	                      	<td>A1357</td>
	                      	<td>MOVILES</td>
	                      	<td>APPLE</td>
	                      	<td>DISPLAY</td>
	                      	<td>ACTIVO</td>
	                      	<td>A</td>
	                      	<td>ORIGINAL</td>
	                      	<td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
	                      	<td>3.40</td>
	                      	<td>9.20</td>
	                      	<td>1.47</td>
	                      	<td>EURO</td>
	                      	<td>DOLAR</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeModal" class="close">×</span>
                    <div class="MainTitle">NUEVO PRODUCTO</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">SKU</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO DE PARTE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>MOVILES</option>
                                        <option>IMPRESORAS</option>
                                        <option>COPIADORAS</option>
                                    </select>
                                    <label for="select1">FAMILIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>HP</option>
                                        <option>APPLE</option>
                                        <option>GATEWAY</option>
                                    </select>
                                    <label for="select1">MARCA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>CABLES</option>
                                        <option>POWER SUPPLY</option>
                                        <option>DIGITALIZADORES</option>
                                    </select>
                                    <label for="select1">GRUPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>ACTIVO</option>
                                        <option>DESACTIVO</option>
                                    </select>
                                    <label for="select1">CONDICIÓN</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                    <label for="select1">CLASE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>ORIGINAL</option>
                                        <option>GENERICO</option>
                                        <option>MANOFACTURADO</option>
                                    </select>
                                    <label for="select1">TIPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">COSTO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">PRECIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">IVA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA DE COMPRA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA DE VENTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-1 col-md-1-1 col-sm-1-2 col-xs-1-1">
                                <div class="divInputTextArea">
                                    <label for="textarea1">DESCRIPCIÓN</label>
                                    <textarea id="textarea1"></textarea>
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
        <!--ROW DEL MODAL EDITAR [INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">EDITAR PRODUCTO</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="6543645">
                                    <label for="text1">SKU</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="A1357">
                                    <label for="text2">NÚMERO DE PARTE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>MOVILES</option>
                                        <option>IMPRESORAS</option>
                                        <option>COPIADORAS</option>
                                    </select>
                                    <label for="select1">FAMILIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>HP</option>
                                        <option selected>APPLE</option>
                                        <option>GATEWAY</option>
                                    </select>
                                    <label for="select1">MARCA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DISPLAY</option>
                                        <option>POWER SUPPLY</option>
                                        <option>DIGITALIZADORES</option>
                                    </select>
                                    <label for="select1">GRUPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>ACTIVO</option>
                                        <option>DESACTIVO</option>
                                    </select>
                                    <label for="select1">CONDICIÓN</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                    <label for="select1">CLASE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>ORIGINAL</option>
                                        <option>GENERICO</option>
                                        <option>MANOFACTURADO</option>
                                    </select>
                                    <label for="select1">TIPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="3.40">
                                    <label for="text1">COSTO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="9.20">
                                    <label for="text1">PRECIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="1.47">
                                    <label for="text1">IVA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA DE COMPRA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA DE VENTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-1 col-md-1-1 col-sm-1-2 col-xs-1-1">
                                <div class="divInputTextArea">
                                    <label for="textarea1">DESCRIPCIÓN</label>
                                    <textarea id="textarea1">A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</textarea>
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
        <!--ROW DEL MODAL EDITAR [FIN]-->
        
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>