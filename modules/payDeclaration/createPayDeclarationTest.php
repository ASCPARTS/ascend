<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/pagos_y_pedimentos.css">
</head>
<body>
	<div class="MainTitle">CREAR PEDIMENTO</div>
	<div class="MainContainer">
        <div class="SubTitle">Datos Generales</div>
		<div class="row">
			<div class="col-md-1-2">
				<h4>Folio: 7654323456</h4> 
            </div>
            <div class="col-md-1-2">
            	<h4 style="text-align: right;">Fecha: 2016/08/09</h4>
            </div>
        </div>
    <div class="SubTitle">Pedimentos</div>
    	<div class="row">
    		<div style="overflow-x: scroll; margin-top: 15px; background-color: white">
                <table width="100%">
                    <tr style="text-align: center">
                        <td><h4>PROVEEDOR</h4></td>
                        <td><h4>FACTURA</h4></td>
                        <td><h4>FECHA PEDIMENTO</h4></td>
                        <td><h4>GUIA</h4></td>
                        <td><h4>PROVEEDOR</h4></td>
                        <td><h4>DTA</h4></td>
                        <td><h4>CNT</h4></td>
                        <td><h4>PREV</h4></td>
                        <td><h4>I.V.A.</h4></td>
                        <td><h4>Advalorem</h4></td>
                        <td><h4>OTROS</h4></td>
                        <td><h4>IVA</h4></td>
                        <td><h4>A.A AMERICANA MX</h4></td>
                        <td><h4>DESC.</h4></td>
                        <td><h4>I.V.A.</h4></td>
                        <td><h4>Honorarios</h4></td>
                        <td><h4>I.V.A </h4></td>
                        <td><h4>V. FACTURA USD</h4></td>
                        <td><h4>% VALOR TOTAL FACTURAS vs  VALOR FACTURA</h4></td>
                        <td><h4>T.C. </h4></td>
                        <td><h4>TOTAL PEDIMENTO CUADRO DE IMPUESTOS</h4></td>
                        <td><h4>VALOR A.A+PED  MX</h4></td>
                        <td><h4>VALOR A.A+PED USD</h4></td>
                        <td><h4>Flete (usd) PEDIMENTO</h4></td>
                        <td><h4>Flete (usd) FACTURA</h4></td>
                        <td><h4>STATUS F.F/ VF</h4></td>
                        <td><h4>GASTOS A.A + PED (SIN IVA)</h4></td>
                        <td><h4>% INC X GASTOS</h4></td>
                        <td><h4>VAL TOTAL PDTO EN CEDIS</h4></td>
                        <td><h4>VAL TOTAL PDTO EN CEDIS</h4></td>
                        <td><h4>% PUESTO EN CEDIS / VALOR FACT</h4></td>
                        <td><h4>ref imp</h4></td>
                        <td><h4>Impuestos</h4></td>
                        <td><h4>ref flet</h4></td>
                        <td><h4>Fletes Importacion</h4></td>
                    </tr>
                    <tr style="text-align: center">
                        <td>ASC USA</td>
                        <td>2702</td>
                        <td>01/03/2016</td>
                        <td>1ZE96Y170302217271</td>
                        <td>927</td>
                        <td>57</td>
                        <td>210</td>
                        <td>19005</td>
                        <td>1964</td>
                        <td>0</td>
                        <td>0</td>
                        <td>8994.44</td>
                        <td>2,397.08</td>
                        <td>389.54</td>
                        <td>600.00</td>
                        <td>96.99</td>
                        <td>18.30</td>
                        <td>0.33%</td>
                        <td>18.1706</td>
                        <td>22163</td>
                        <td>34,634.03</td>
                        <td>1906.05</td>
                        <td>429.71</td>
                        <td>6.95</td>
                        <td>37.98%</td>
                        <td>15,149.51</td>
                        <td>45.56</td>
                        <td>6.23</td>
                        <td>34.17</td>
                        <td>240</td>
                        <td>TNL14929/16-753</td>
                        <td>CGO9142/CGO9143</td>
                        <td>2702-1</td>
                        <td>CGO9145</td>
                        <td>C9145</td>
                    </tr>
                    <tr style="text-align: center">
                        <td>ASC USA</td>
                        <td>2702</td>
                        <td>01/03/2016</td>
                        <td>1ZE96Y170302217271</td>
                        <td>927</td>
                        <td>57</td>
                        <td>210</td>
                        <td>19005</td>
                        <td>1964</td>
                        <td>0</td>
                        <td>0</td>
                        <td>8994.44</td>
                        <td>2,397.08</td>
                        <td>389.54</td>
                        <td>600.00</td>
                        <td>96.99</td>
                        <td>18.30</td>
                        <td>0.33%</td>
                        <td>18.1706</td>
                        <td>22163</td>
                        <td>34,634.03</td>
                        <td>1906.05</td>
                        <td>429.71</td>
                        <td>6.95</td>
                        <td>37.98%</td>
                        <td>15,149.51</td>
                        <td>45.56</td>
                        <td>6.23</td>
                        <td>34.17</td>
                        <td>240</td>
                        <td>TNL14929/16-753</td>
                        <td>CGO9142/CGO9143</td>
                        <td>2702-1</td>
                        <td>CGO9145</td>
                        <td>C9145</td>
                    </tr>
                    
                </table>
            </div>
    	</div>
    	<div class="row">
    		<input type="button" value="Cotizar" id="myBtn" class="colorGreen">
			<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
			<span class="close">×</span>
			<p>Some text in the Modal..</p>
			</div>

			</div>
    	</div>
    	<br style="clear: both;" />
	</div>

</body>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</html>