<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("../../inc/sheet.inc");?>
	<link rel="stylesheet" type="text/css" href="../../css/seeker2.css">
	<script type="text/javascript" src="../../js/seeker2.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/style.css" />
	<script>
        $(document).ready(function()
        {

            document.getElementById("detalles").style.display = "block";
            document.getElementById("tabDetalles").className += " active";
			//tab.className += " active";
            

        });
    </script>

</head>
<body onload="openCity(event, 'detalles')">
	
	<p>Click on the links inside the tabbed menu:</p>
	<div id="modalTest">
		<ul class="tab">
		  <li><a href="#" id="tabDetalles" class="tablinks" onclick="openCity(event, 'detalles')">Detalles</a></li>
		  <li><a href="#" id="tabRemplazos" class="tablinks" onclick="openCity(event, 'replazos')">Remplazos</a></li>
		  <li><a href="#" id="tabCompatible" class="tablinks" onclick="openCity(event, 'compatible')">Compatible</a></li>
		  <li><a href="#" id="tabExistencia" class="tablinks" onclick="openCity(event, 'existencias')">Existencias</a></li>
		</ul>

		<div id="detalles" class="tabcontent">
		  	<table id="tablaBase">
		  		<tr>
			  		<td id="imagenBase">
			  			<img src="../../img/product_2.jpg">
			  		</td>
			  		<td id="infoBase" style="width: *">
			  			<div class="MainTitle">DETALLES </div>
			  			<div id=descripcionBase>
			  				802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ, 3MB LEVEL-3 CACHE
			  			</div>
			  		</td>
		  		</tr>
		  	</table>
		  	<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<div class="ca-item ca-item-1">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
						</div>
					</div>
					<div class="ca-item ca-item-2">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
						</div>
					</div>
					<div class="ca-item ca-item-3">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
						</div>
					</div>
					<div class="ca-item ca-item-4">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
						</div>
					</div>
					<div class="ca-item ca-item-5">
						<div class="ca-item-main">
							<div class="ca-icon"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
		    	<ul class="col3">
		    		<li><p><b>SKU:</b> 6030031</p></li>
					<li><p><b>NÚMERO DE PARTE:</b> CO1512</p></li>
					<li><p><b>GRUPO:</b> AC ADAPTERS</p></li>
					<li><p><b>CONDICION:</b >REPLACEMENT</p></li>
					<li><p><b>Voltaje:</b> 18.5V</p></li>
					<li><p><b>Amper:</b>3.5A</p></li>
					<li><p><b>Watts:</b> 65W</p></li>
					<li><p><b>Punta:</b> 4.8mm*1.7mm</p></li>
					<li><p><b>Contacto:</b> Barrel Type</p></li>
					<li><p><b>Garantia:</b> 1 Año</p></li>
					<li><p><b>Marca:</b> HP</p></li>
		    	</ul>
		    </div>

		</div>

		<div id="replazos" class="tabcontent">
		  <h3>Paris</h3>
		  <p>Paris is the capital of France.</p>
		</div>

		<div id="compatible" class="tabcontent">
		  <h3>Tokyo</h3>
		  <p>Tokyo is the capital of Japan.</p>
		</div>
		<div id="existencias" class="tabcontent">
		  <h3>existencias</h3>
		  <p>Tokyo is the capital of Japan.</p>
		</div>     
    </div>
    
<br style="clear: both;" />
<!--JAVASCRIPT DEL CARRUCEL INICIO-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="../../js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="../../js/jquery.contentcarousel.js"></script>
	<script type="text/javascript">
		$('#ca-container').contentcarousel();
	</script>
<!--JAVASCRIPT DEL CARRUCEL FIN-->
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>