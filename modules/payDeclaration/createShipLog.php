<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/pagos_y_pedimentos.css">
</head>
<body>
	<div class="MainTitle">CREAR PEDIMENTO</div>
	<div class="MainContainer">
    <div class="SubTitle">Ship Log</div>
        <div class="ButtonContainer">  
            <input class="btn btnOnlineGreen" type="button" id="myBtn" value="Nuevo"> 
        </div>
    	<div class="row">
    		<div style="overflow-x: scroll; margin-top: 15px; background-color: white">
                <table width="100%">
                    <tr style="text-align: center">
                        <td><h4>PROVEEDOR</h4></td>
                        <td><h4>P.O. NUMERO</h4></td>
                        <td><h4># Factura</h4></td>
                        <td><h4>USD$</h4></td>
                        <td><h4>COMPAÑIA</h4></td>
                        <td><h4>GUIA</h4></td>
                        <td><h4># BULTOS</h4></td>
                        <td><h4>FECHA RECEPCION DE DOCUMENTOS</h4></td>
                        <td><h4>ESTADO</h4></td>
                        <td><h4>LLEGO A A.A.</h4></td>
                        <td><h4>AGENCIA ADUANAL</h4></td>
                        <td><h4>FECHA CRUCE ADUANA</h4></td>
                        <td><h4>OBSERVACIONES</h4></td>
                        <td><h4>DIAS DE TRÁNSITO (HÁBILES)</h4></td>
                        <td><h4>META</h4></td>
                        <td><h4>% FLETE SOBRE VALOR MERCANCIA</h4></td>
                        <td><h4>META</h4></td>
                        <td><h4>Editar</h4></td>
                        <td><h4>Eliminar</h4></td>
                    </tr>
                    <tr style="text-align: center">
                        <td>BAMTOP</td>
                        <td>9462</td>
                        <td>BTJ2015012901</td>
                        <td>1289.97</td>
                        <td>DHL</td>
                        <td>3836581011</td>
                        <td>1</td>
                        <td>04/02/2015</td>
                        <td>DESPACHO</td>
                        <td>11/02/2015</td>
                        <td>BRENNAN</td>
                        <td>11/02/2015</td>
                        <td>DESPACHO 13/02/2015 PED 3038 5000844</td>
                        <td>5</td>
                        <td>7</td>
                        <td>8%</td>
                        <td>10%</td>
                        <td>
                            <button class="btn btnOverBlue">Editar</button>
                        </td>
                        <td>
                            <button class="btn btnBrandRed">Eliminar</button>
                        </td>
                    </tr>
                </table>
            </div>
    	</div>

        <!--ROW DEL MODAL [INICIO]-->
    	<div class="row">
    		

			<div id="myModal" class="modal">

    			<!-- Modal content -->
                <div class="modal-content">
                    <span class="close">×</span>
                    <div class="MainTitle">Nuevo Pedimento</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-md-1-3">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BAMTOP</option>
                                        <option>Hongkong XH Co., Limited</option>
                                        <option>BIGBLUE</option>
                                        <option>CIRCUIT MKT</option>
                                        <option>ITEM INC</option>
                                        <option>CET</option>
                                        <option>ASC USA</option>
                                        <option>FEDCO</option>
                                        <option>LASER PROS</option>
                                        <option>SSIT HUB</option>
                                    </select>
                                    <label for="idProveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">P.O. NUMERO</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">Número Factura</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1-3">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">USD$</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>CONWAY</option>
                                        <option>UPS</option>
                                        <option>FEDEX</option>
                                        <option>DHL</option>
                                        <option>ROAD RUNNER</option>
                                        <option>SAIA</option>
                                        <option>SOUTFREIGHT</option>
                                        <option>RADIANT</option>
                                        <option>ESTES EXPRESS</option>
                                        <option>VARIOS</option>
                                    </select>
                                    <label for="idProveedor">COMPAÑIA</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">GUÍA</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1-3">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">NÚMERO DE BULTOS</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">RECEPCION DE DOCUMENTOS</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>DESPACHO</option>
                                        <option>RETORNO</option>
                                        <option>TRANSITO</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1-3">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA LLEGO A A.A.</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BRENNAN</option>
                                        <option>UPS</option>
                                        <option>CODEX</option>
                                        <option>HDL</option>
                                        <option>AMERICA</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                            <div class="col-md-1-3">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA CRUCE ADUANA</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1-4">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">DIAS DE TRÁNSITO</label>
                                </div>
                            </div>
                            <div class="col-md-1-4">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                            <div class="col-md-1-4">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">PORCENTAJE FLETE</label>
                                </div>
                            </div>
                            <div class="col-md-1-4">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1-1">
                                <div class="divInputTextArea">
                                    <label for="textarea1">OBSERVACIONES</label>
                                    <textarea id="textarea1"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <div class="ButtonContainer">  
                            <input class="btn btnOnlineGreen" type="button" value="Agregar"> 
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
<script type="text/javascript" src="../../js/modal.js"></script>
</html>