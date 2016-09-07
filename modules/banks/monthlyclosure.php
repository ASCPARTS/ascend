<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">CIERRE MENSUAL</div>
    <div class="MainContainer">
    <div class="SubTitle"></div>
        <div class="row">
        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divSelect calendarYellow">
                    <select id="select1">
                        <option>ENERO</option>
                        <option>FEBRERO</option>
                        <option>MARZO</option>
                        <option>ABRIL</option>
                        <option>MAYO</option>
                        <option>JUNIO</option>
                        <option>JULIO</option>
                        <option>AGOSTO</option>
                        <option>SEPTIEMBRE</option>
                        <option>OCTUBRE</option>
                        <option>NOVIEMBRE</option>
                        <option>DICIEMBRE</option>
                    </select>
                    <label for="select1">MES</label>
                </div>
                
            </div>
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div>  
		            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalCierreMensual','closeCierreMensual')">Generar</button> 
		        </div>
            </div>
        </div>
        <div class="row">
            <div class="tblContainer">
                <table>
                    <thead>
                    <th>Banco</th>
                    <th>Numero de Cuenta</th>
                    <th>Periodo</th>
                    <th>Saldo Inicial</th>
                    <th>Saldo Final</th>
                    </thead>
                    <tbody>

                    <tr>
                        <td>BBVA USD</td>
                        <td>85687568795689086709</td>
                        <td>3/07/206 a 3/08/2016</td>
                        <td>$5, 906.00</td>
                        <td>$ 578, 575. 00</td>
                    </tr>
                    <tr>
                        <td>Banamex USD</td>
                        <td>85687568795689086709</td>
                        <td>3/07/206 a 3/08/2016</td>
                        <td>$5, 906.00</td>
                        <td>$ 578, 575. 00</td>
                    </tr>
                    <tr>
                        <td>HSBC USD</td>
                        <td>85687568795689086709</td>
                        <td>3/07/206 a 3/08/2016</td>
                        <td>$5, 906.00</td>
                        <td>$ 578, 575. 00</td>
                    </tr>
                    <tr>
                        <td>BBVA USD</td>
                        <td>85687568795689086709</td>
                        <td>3/07/206 a 3/08/2016</td>
                        <td>$5, 906.00</td>
                        <td>$ 578, 575. 00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br style="clear: both;" />
        </div>

     
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="modalCierreMensual" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="closeCierreMensual">×</span>
                <div class="MainContainer">
                <div class="SubTitle">ESTADO</div>
                	<p><b>ABIERTO</b>: Comprendiendo el periodo de [2016/09/01 - 2016/09/30]</p>
                    <div class="row">
                        <div class="tblContainer">
                            <table>
                                <thead>
                                <th>Banco</th>
                                <th>Numero de Cuenta</th>
                                <th>Saldo</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>BBVA USD</td>
                                    <td>85687568795689086709</td>
                                    <td>$ 578, 575. 00</td>
                                </tr>
                                <tr>
                                    <td>BBVA Pesos</td>
                                    <td>85687568795689086709</td>
                                    <td>$ 578, 575. 00</td>
                                </tr>
                                <tr>
                                    <td>Banamex USD</td>
                                    <td>85687568795689086709</td>
                                    <td>$ 578, 575. 00</td>
                                </tr>
                                <tr>
                                    <td>BBVA USD</td>
                                    <td>85687568795689086709</td>
                                    <td>$ 578, 575. 00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="ButtonContainer">  
		            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalAlert','closeAlert')">Finalizar cierre</button> 
		        	</div>

                    <br style="clear: both;" />
                </div>
            </div>

            </div>
        </div>
        <!--ROW DEL MODAL CIERRE MENSUAL [FIN]-->

        <!--ROW DEL MODAL ALERT [INICIO]-->
        <div class="row">
        
            <div id="modalAlert" class="modal">

                <!-- Modal content -->
                <div class="alert-content">
                    <span id="closeAlert" class="close">×</span>
                    <div class="MainTitle">Alerta</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row text-center">
                        	<h3>¿Estás seguro que deseas finalizar el cierre de mes?</h3>
                        	<h4>Esta acción es permanente y no se podrá deshacer.</h4>
                        </div>

                        <div class="col-lg-offset-1-5 col-lg-1-5 col-md-offset-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                    
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
<script type="text/javascript" src="../../js/alert.js"></script>
</html>