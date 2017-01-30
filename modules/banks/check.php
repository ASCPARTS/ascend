<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">CHEQUES</div>
    <div class="MainContainer">
    <div class="SubTitle">REGISTRO DE CHEQUES</div>
        <div class="row">
        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText searchGray">
                    <input type="text" id="buscar">
                    <label for="buscar">BUSCAR</label>
                </div>
            </div>
            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="ButtonContainer">  
		            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalNuevo','closeNuevo')">Nuevo</button> 
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
	                      	<th>FECHA</th>
	                      	<th>TIPO</th>
	                      	<th>NÚMERO DE CHEQUE</th>
	                      	<th>BENEFICIARIO</th>
	                      	<th>IMPORTE</th>
	                      	<th>CUENTA</th>
                            <th>MONEDA</th>
	                      	
	                      
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>C02</td>
	                      	<td>2016/06/09</td>
	                      	<td>CHEQUE VARIO</td>
                            <td>4165463164643</td>
                            <td>COMPUSOLUCIONES Y ASOCIADOS SA DE CV</td>
                            <td>12,000.00</td>
                            <td>HSBC PESOS</td>
                            <td>PESOS</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>C02</td>
                            <td>2016/06/09</td>
                            <td>CHEQUE VARIO</td>
                            <td>4165463164643</td>
                            <td>COMPUSOLUCIONES Y ASOCIADOS SA DE CV</td>
                            <td>12,000.00</td>
                            <td>HSBC PESOS</td>
                            <td>PESOS</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>C02</td>
                            <td>2016/06/09</td>
                            <td>CHEQUE VARIO</td>
                            <td>4165463164643</td>
                            <td>COMPUSOLUCIONES Y ASOCIADOS SA DE CV</td>
                            <td>12,000.00</td>
                            <td>HSBC PESOS</td>
                            <td>PESOS</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>C02</td>
                            <td>2016/06/09</td>
                            <td>CHEQUE VARIO</td>
                            <td>4165463164643</td>
                            <td>COMPUSOLUCIONES Y ASOCIADOS SA DE CV</td>
                            <td>12,000.00</td>
                            <td>HSBC PESOS</td>
                            <td>PESOS</td>
                        </tr>                           
                    </tbody>
                </table>
            </div>
        </div>
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="modalNuevo" class="modal">

                <!-- Modal content -->
                <div id="getModal-header" class="modal-header">
                    <div id="getModal-title" class="modal-title">Nuevo Cheque</div>
                    <div class="modal-close"><span class="close" onclick="$('#modalNuevo').hide();">&times;</span></div>
                </div>
                <div class="modal-content">
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText checkYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO DE CHEQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect typeYellow">
                                    <select id="idProveedor">
                                        <option>CHEQUE POR PAGO A PROVEEDOR</option>
                                        <option>CHEQUE VARIO</option>
                                    </select>
                                    <label for="idProveedor">TIPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText userYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">BENEFICIARIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect creditCardYellow">
                                    <select id="idProveedor">
                                        <option>BANAMEX PESOS</option>
                                        <option>BANORTE DOLAR</option>
                                        <option>BANCOMER PESOS</option>
                                    </select>
                                    <label for="idProveedor">CUENTA BANCARIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect coinYellow">
                                    <select id="idProveedor">
                                        <option>PESO</option>
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                    </select>
                                    <label for="idProveedor">MONEDA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText moneyYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">IMPORTE</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">IMPRIMIR</label>
                                </div>
                            </div>
                            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="ButtonContainer">  
                                    <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                                </div>
                            </div>
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
                <div id="getModal-header" class="modal-header">
                    <div id="getModal-title" class="modal-title">Editar Cheque</div>
                    <div class="modal-close"><span class="close" onclick="$('#modalEditar').hide();">&times;</span></div>
                </div>
                <div class="modal-content">
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="4165463164643">
                                    <label for="text2">NÚMERO DE CHEQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1" value="2016-09-10">
                                    <label for="text1">FECHA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>CHEQUE POR PAGO A PROVEEDOR</option>
                                        <option>CHEQUE VARIO</option>
                                    </select>
                                    <label for="idProveedor">TIPO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="COMPUSOLUCIONES Y ASOCIADOS SA DE CV">
                                    <label for="text2">BENEFICIARIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BANAMEX PESOS</option>
                                        <option>BANORTE DOLAR</option>
                                        <option>BANCOMER PESOS</option>
                                    </select>
                                    <label for="idProveedor">CUENTA BANCARIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>PESO</option>
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                    </select>
                                    <label for="idProveedor">MONEDA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="12,000.00">
                                    <label for="text2">IMPORTE</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div>  
                                    <input class="btn btnOverBlue" type="button" value="Imprimir"> 
                                </div>
                            </div>
                            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="ButtonContainer">  
                                    <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                                </div>
                            </div>
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