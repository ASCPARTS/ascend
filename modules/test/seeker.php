<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/finder.css">
</head>
<body>
    <div class="MainTitle">PRODUCTOS</div>
    <div class="MainContainer">
    
        <div class="row">
        	<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                <div class="divInputText searchGray dropdown">
                    <input type="text" id="buscar" class="dropbtn">
                    <div class="dropdown-content">
				      <ul>
				        <li><a href="default.asp">Home</a></li>
				        <li><a href="news.asp">News</a></li>
				        <li><a href="contact.asp">Contact</a></li>
				        <li><a href="about.asp">About</a></li>
				     </ul>
				    </div>
                    <label for="buscar">BUSCAR</label>
                </div>
            </div>
        </div>
        <div class="row">
        	<div id="catalogo">
				<div id="filtros">
				  <ul>
				    <li><a href="#">London</a></li>
				    <li><a href="#">Paris</a></li>
				    <li><a href="#">Tokyo</a></li>
				  </ul>
				  <div class="divInputText searchGray">
                    <input type="text" id="buscar">
                    <label for="buscar">BUSCAR</label>
                </div>
				</div>

				<div id="contenido">
					<div class="producto-tarjeta">
						<div id="tituloProducto"></div>
						<div id="contenidoProducto">
							<div id="imagenProducto">
								
							</div>
							<div id="infoProducto">informacion del producto</div>
						</div>
						<div id="botonesProducto">
							<button class="btn btnBrandRed">Click me</button>
							<button class="btn btnOverBlue">Click me</button>
							<button class="btn btnBackgroundBlack">Click me</button>
							<button class="btn btnAlternativeBlue">Click me</button>
						</div>
					</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
					<div class="producto-tarjeta">Floating box</div>
				</div>
			</div>	
        </div>
        

     

 
        
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>