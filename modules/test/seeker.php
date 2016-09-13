<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/seeker.css">
</head>
<body>
    <div class="MainTitle">PRODUCTOS</div>
    <div class="MainContainer">
    
        <div class="row">
        	<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                <div class="divInputText searchGray dropdown">
                    <input type="text" id="buscar" class="dropbtn">
                    <div class="dropdown-content col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
				      <ul class="autocomplete">
				        <li class="title_list"><a href="13">EXTERNAL COMPONENTS</a></li>
				        	<li class="item_list"><a href="44">734280-001 HP-COMPAQ HARD DRIVE HARDWARE KIT</a></li>
				        <li class="title_list">
				        	<a class="title_list" href="13">INTERNAL COMPONENTS</a>
				        	<a id="look_more" href="13">VER MAS...</a>
				        </li>
				        	<li class="item_list"><a href="44">003E77251 XEROX HANDLE CAM B2</a></li>
				        	<li class="item_list"><a href="44">003K13893 XEROX HANDLE ASSY</a></li>
				        	<li class="item_list"><a href="44">821665-001 HP HARD DRIVE HARDWARE KIT</a></li>
				        	<li class="item_list"><a href="44">Q6651-60068 HP HARD DISK DRIVE ASSEMBLY INCLUDES HOLDER AND SCREWS</a></li>
				        <li class="title_list"><a href="13">GROUPS</a></li>
				        	<li class="item_list"><a href="13">EXTERNAL COMPONENTS</a></li>
				        	<li class="item_list"><a href="13">INTERNAL COMPONENTS</a></li>
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