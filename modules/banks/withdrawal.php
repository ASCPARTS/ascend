<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">RETIROS</div>
    <div class="MainContainer">
    <div class="SubTitle">REGISTRO DE RETIROS</div>
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
	                      	<th>CUENTA BANCARIA</th>
	                      	<th>BENEFICIARIO</th>
	                      	<th>REFERENCIA</th>
	                      	<th>IMPORTE</th>
	                      	<th>ESTATUS</th>
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
                            <td>R23</td>
	                      	<td>2016/06/01</td>
	                      	<td>BANAMEX PESOS</td>
	                      	<td>BRENNAN INTERNACIONAL S.C.</td>
	                      	<td>IMPUESTOS ADUANALES</td>
	                      	<td>180,303.00</td>
	                      	<td>DOLAR</td>
	                      	<td>ACTIVO</td>

                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>R23</td>
	                      	<td>2016/06/01</td>
	                      	<td>BANAMEX PESOS</td>
	                      	<td>BRENNAN INTERNACIONAL S.C.</td>
	                      	<td>IMPUESTOS ADUANALES</td>
	                      	<td>180,303.00</td>
	                      	<td>DOLAR</td>
	                      	<td>ACTIVO</td>

                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>R23</td>
	                      	<td>2016/06/01</td>
	                      	<td>BANAMEX PESOS</td>
	                      	<td>BRENNAN INTERNACIONAL S.C.</td>
	                      	<td>IMPUESTOS ADUANALES</td>
	                      	<td>180,303.00</td>
	                      	<td>DOLAR</td>
	                      	<td>ACTIVO</td>

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
                    <div id="getModal-title" class="modal-title">Nuevo Retiro</div>
                    <div class="modal-close"><span class="close" onclick="$('#modalNuevo').hide();">&times;</span></div>
                </div>
                <div class="modal-content">
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText barCodeYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">CLAVE</label>
                                </div>
                            </div>
                            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA</label>
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
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText userYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">BENEFICIARIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText businessCardYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">REFERENCIA</label>
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
                <div id="getModal-header" class="modal-header">
                    <div id="getModal-title" class="modal-title">Editar Retiro</div>
                    <div class="modal-close"><span class="close" onclick="$('#modalEditar').hide();">&times;</span></div>
                </div>
                <div class="modal-content">
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                        	
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="R23">
                                    <label for="text2">CLAVE</label>
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
                                        <option>BANAMEX PESOS</option>
                                        <option>BANORTE DOLAR</option>
                                        <option>BANCOMER PESOS</option>
                                    </select>
                                    <label for="idProveedor">CUENTA BANCARIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="BRENNAN INTERNACIONAL S.C.">
                                    <label for="text2">BENEFICIARIO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="IMPUESTOS ADUANALES">
                                    <label for="text2">REFERENCIA</label>
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
                                    <input type="text" id="text2" value="180,303.00">
                                    <label for="text2">IMPORTE</label>
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