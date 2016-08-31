<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">PROVEEDORES</div>
    <div class="MainContainer">
    <div class="SubTitle">Registro de proveedores</div>
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

	                      	<th>CLAVE</th>
	                      	<th>RAZÓN SOCIAL</th>
	                      	<th>RAZÓN COMERCIAL</th>
	                      	<th>RFC</th>
	                      	<th>CURP</th>

	                      	<th>DIRECCIÓN</th>
	                      	<th>COLONIA</th>
	                      
	                      	<th>PAÍS</th>
	                      	<th>ESTADO</th>
	                      	<th>MUNICIPIO</th>
	                      	<th>CIUDAD</th>

	                      	<th>TELÉFONO 1</th>
	                      	<th>TELÉFONO 2</th>
	                      	<th>CORREO</th>
	                      	<th>COMPRADOR</th>
	                      	<th>FAMILIA</th>
	                      	<th>TIPO</th>
	                      	<th>GRUPO</th>

	                      	<th>MONEDA</th>
	                      	<th>CONDICIÓN DE PAGO</th>
	                      	

	                      	<th>DÍAS DE CREDITO</th>
	                      	<th>DÍAS DE PRONTO PAGO</th>
	                      	<th>DESCUENTO DE PRONTO PAGO</th>
	                      	<th>TIPO DE PAGO</th>
	                     	
	                      	<th>CUENTA BANCARIA (PESOS)</th>
	                      	<th>CUENTA BANCARIA (DLS)</th>
	                      	<th>BANCO</th>
	                      	<th>BENEFICIARIO</th>
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
                            
                        	<td>5534523</td>
	                      	<td>Hewlett-Packard</td>
	                      	<td>HP</td>
	                      	<td>HP52454RG22</td>
	                      	<td>GX7445235VSDGS</td>

	                      	<td>ENRIQUE MORENA #434</td>
	                      	<td>LOMAS VERDES</td>
	                      
	                      	<td>MÉXICO</td>
	                      	<td>CIUDAD DE MÉXICO</td>
	                      	<td>CDMX</td>
	                      	<td>CDMX</td>

	                      	<td>5514896378</td>
	                      	<td>5578946125</td>
	                      	<td>CONTACTO@HP.COM</td>
	                      	<td>ROLANDO LOPEZ</td>
	                      	<td>BATERIAS</td>
	                      	<td>ORIGINAL</td>
	                      	<td>REFACCIONES</td>

	                      	<td>USD</td>
	                      	<td>CONTADO</td>
	                      	

	                      	<td>30</td>
	                      	<td>10</td>
	                      	<td>8%</td>
	                      	<td>TRASFERENCIA</td>
	                     	
	                      	<td>657465516584351468</td>
	                      	<td>654651688435168421</td>
	                      	<td>SANTANDER</td>
	                      	<td>MINH YAN LIN</td>
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            
                        	<td>5534523</td>
	                      	<td>Hewlett-Packard</td>
	                      	<td>HP</td>
	                      	<td>HP52454RG22</td>
	                      	<td>GX7445235VSDGS</td>

	                      	<td>ENRIQUE MORENA #434</td>
	                      	<td>LOMAS VERDES</td>
	                      
	                      	<td>MÉXICO</td>
	                      	<td>CIUDAD DE MÉXICO</td>
	                      	<td>CDMX</td>
	                      	<td>CDMX</td>

	                      	<td>5514896378</td>
	                      	<td>5578946125</td>
	                      	<td>CONTACTO@HP.COM</td>
	                      	<td>ROLANDO LOPEZ</td>
	                      	<td>BATERIAS</td>
	                      	<td>ORIGINAL</td>
	                      	<td>REFACCIONES</td>

	                      	<td>USD</td>
	                      	<td>CONTADO</td>
	                      	

	                      	<td>30</td>
	                      	<td>10</td>
	                      	<td>8%</td>
	                      	<td>TRASFERENCIA</td>
	                     	
	                      	<td>657465516584351468</td>
	                      	<td>654651688435168421</td>
	                      	<td>SANTANDER</td>
	                      	<td>MINH YAN LIN</td>
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            
                        	<td>5534523</td>
	                      	<td>Hewlett-Packard</td>
	                      	<td>HP</td>
	                      	<td>HP52454RG22</td>
	                      	<td>GX7445235VSDGS</td>

	                      	<td>ENRIQUE MORENA #434</td>
	                      	<td>LOMAS VERDES</td>
	                      
	                      	<td>MÉXICO</td>
	                      	<td>CIUDAD DE MÉXICO</td>
	                      	<td>CDMX</td>
	                      	<td>CDMX</td>

	                      	<td>5514896378</td>
	                      	<td>5578946125</td>
	                      	<td>CONTACTO@HP.COM</td>
	                      	<td>ROLANDO LOPEZ</td>
	                      	<td>BATERIAS</td>
	                      	<td>ORIGINAL</td>
	                      	<td>REFACCIONES</td>

	                      	<td>USD</td>
	                      	<td>CONTADO</td>
	                      	

	                      	<td>30</td>
	                      	<td>10</td>
	                      	<td>8%</td>
	                      	<td>TRASFERENCIA</td>
	                     	
	                      	<td>657465516584351468</td>
	                      	<td>654651688435168421</td>
	                      	<td>SANTANDER</td>
	                      	<td>MINH YAN LIN</td>
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            
                        	<td>5534523</td>
	                      	<td>Hewlett-Packard</td>
	                      	<td>HP</td>
	                      	<td>HP52454RG22</td>
	                      	<td>GX7445235VSDGS</td>

	                      	<td>ENRIQUE MORENA #434</td>
	                      	<td>LOMAS VERDES</td>
	                      
	                      	<td>MÉXICO</td>
	                      	<td>CIUDAD DE MÉXICO</td>
	                      	<td>CDMX</td>
	                      	<td>CDMX</td>

	                      	<td>5514896378</td>
	                      	<td>5578946125</td>
	                      	<td>CONTACTO@HP.COM</td>
	                      	<td>ROLANDO LOPEZ</td>
	                      	<td>BATERIAS</td>
	                      	<td>ORIGINAL</td>
	                      	<td>REFACCIONES</td>

	                      	<td>USD</td>
	                      	<td>CONTADO</td>
	                      	

	                      	<td>30</td>
	                      	<td>10</td>
	                      	<td>8%</td>
	                      	<td>TRASFERENCIA</td>
	                     	
	                      	<td>657465516584351468</td>
	                      	<td>654651688435168421</td>
	                      	<td>SANTANDER</td>
	                      	<td>MINH YAN LIN</td>
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
                    <div class="MainTitle">NUEVO PROVEEDOR</div>
                    <div class="MainContainer" id="nuevoPedimento">
                    <div class="SubTitle">Datos Personales</div>
                        <div class="row">
                        	<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">RAZÓN SOCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">RAZÓN COMERCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">RFC</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">CURP</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">CALLE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO EXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO INT</label>
                                </div>
                            </div>
							<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
	                            <div class="divSelect">
	                                <select id="select1">
	                                    <option>MÉXICO</option>
	                                    <option>USA</option>
	                                    <option>COLOMBIA</option>
	                                    <option>CHILE</option>
	                                    <option>ARGENTINA</option>
	                                    <option>ITALIA</option>
	                                </select>
	                                <label for="select1">PAÍS</label>
	                            </div>
	                        </div>
	                        <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
	                            <div class="divSelect">
	                                <select id="select1">
	                                    <option>AGUASCALIENTES</option>
	                                    <option>JALISCO</option>
	                                    <option>NUEVO LEÓN</option>
	                                    <option>VERACRUZ</option>
	                                    <option>MERIDA</option>
	                                    <option>ZACATECAS</option>
	                                </select>
	                                <label for="select1">ESTADO</label>
	                            </div>
		                    </div>
		                    <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
	                            <div class="divSelect">
	                                <select id="select1">
	                                    <option>TEUL</option>
	                                    <option>PINOS</option>
	                                    <option>RIO GRANDE</option>
	                                    <option>MAZAPIL</option>
	                                    <option>JUAN ALDAMA</option>
	                                    <option>LUIS MOYA</option>
	                                </select>
	                                <label for="select1">MUNICIPIO</label>
	                            </div>
	                        </div>
	                        <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
	                            <div class="divSelect">
	                                <select id="select1">
	                                    <option>ZAPOPAN</option>
	                                    <option>GUADALAJARA</option>
	                                    <option>TONALA</option>
	                                    <option>TLAQUEPAQUE</option>
	                                    <option>LAS ROSAS</option>
	                                </select>
	                                <label for="select1">CIUDAD</label>
	                            </div>
		                    </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">TELÉFONO 1</label>
                                </div>
                            </div>
	                        
                           	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">TELÉFONO 2</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">CORREO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>MARIANA LOPEZ</option>
                                        <option>LORENA MARTINEZ</option>
                                        <option>JORGE RAMIREZ</option>
                                    </select>
                                    <label for="select1">COMPRADOR</label>
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
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                    <label for="select1">TIPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>CABLES</option>
                                        <option>PLOTTERS</option>
                                        <option>MOTORES</option>
                                    </select>
                                    <label for="select1">GRUPO</label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="SubTitle">Datos de credito </div>

                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>PRECIO 1</option>
                                        <option>PRECIO 2</option>
                                        <option>PRECIO 3</option>
                                    </select>
                                    <label for="select1">LISTA DE PRECIOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">CONDICION DE PAGO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>SUR</option>
                                        <option>CENTRO</option>
                                        <option>NORTE</option>
                                    </select>
                                    <label for="select1">ZONA DE VENTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">CONTACTO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>UPS</option>
                                        <option>HDL</option>
                                        <option>FEDEX</option>
                                    </select>
                                    <label for="select1">MEDIO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>AVIÓN</option>
                                        <option>BARCO</option>
                                        <option>CAMIÓN</option>
                                    </select>
                                    <label for="select1">VÍA DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">DÍAS REVISIÓN FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>9:00 - 12:00</option>
                                        <option>12:00 - 14:00</option>
                                        <option>14:00 - 16:00</option>
                                    </select>
                                    <label for="select1">HORARIO DE PAGO FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">DÍAS DE RECEPCIÓN MERCANCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>EFECTIVO</option>
                                        <option>CHEQUE</option>
                                        <option>TRASFERENCIA</option>
                                    </select>
                                    <label for="select1">MÉTODO DE PAGO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">REFERENCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1">
                                    <label for="date1">VENCIMIENTO DE PAGARE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">LIMITE DE CREDITO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>RECOMENDACIÓN</option>
                                        <option>INTERNET</option>
                                        <option>ASESOR DE VENTAS</option>
                                    </select>
                                    <label for="select1">ORIGEN DEL CLIENTE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1">
                                    <label for="date1">FECHA ULTIMA COMPRA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">DOMICILIO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">COLONIA DE EMBARQUE</label>
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