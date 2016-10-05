<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("../../inc/sheet.inc");?>
	<link rel="stylesheet" type="text/css" href="../../css/seeker.css">
	<script type="text/javascript" src="../../js/seeker.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/carousel.css" />
</head>
<body>
    <div class="MainTitle">PRODUCTOS</div>
    <div class="MainContainer">
    
        <div class="row">
        	<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                <div class="divInputText searchGray dropdown">
                    <input type="text" id="search">
                    <div id="searchResult">
                    	
                    </div>
                    <label for="search">BUSCAR</label>
                </div>
            </div>
        </div>
        <div class="row">
        	<table id="catalog" style="width:97.4%; margin: 0 auto 0 auto ">
				<tr>
					<td id="contect" style="width: *">
						<div class="productCard">
							<div class="titleProduct">
								<b>NÚMERO DE PARTE:</b> IPH5DC/H
							</div>
							<div class="contectProduct">
								<div class="imageProduct">
									<div class="activePromotion">En descuento</div>
									<img src="../../img/product_2.jpg">
								</div>
								<div class="infoProduct">
									<div class="descriptionProduct"><b>DESCRIPCIÓN:</b> 802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ, 3MB LEVEL-3 CACHE</div>
									<div class="brandProduct"><b>MARCA:</b> CONCEPTRONIC</div>
									<div class="typeProduct"><b>TIPO:</b> REFURBISHED</div>
									<div class="prices">
										<div class="pricePromotion">$ 19,503.50</div>
										<div class="priceProduct">$ 119,503.50</div>	
									</div>
									<div class="btnBuy">
										<button class="btnAddCart"></button>
									</div>
								</div>
							</div>
							<div class="btnsProduct">
								<div class="btn-group-justified">
									<div class="btn-group">
										<button class="btn btnBrandBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectDetails', 'tabDetails', '1')">DETALLES</button>
									</div>
									<div class="btn-group">
										<button class="btn btnAlternativeBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectReplacements', 'tabReplacements', '1')">REMPLAZOS</button>
									</div>
									<div class="btn-group">
										<button class="btn btnBrandBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectCompatible', 'tabCompatible', '1')">COMPATIBLE</button>
									</div>
									<div class="btn-group">
										<button class="btn btnAlternativeBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectStocks', 'tabStocks', '1')">EXISTENCIAS</button>
									</div>
								</div>
							</div>
						</div>
						<div class="productCard">
							<div class="titleProduct">
								<b>NÚMERO DE PARTE:</b> IPH5DC/H
							</div>
							<div class="contectProduct">
								<div class="imageProduct">
									<div class="activePromotion">En descuento</div>
									<img src="../../img/product_2.jpg">
								</div>
								<div class="infoProduct">
									<div class="descriptionProduct"><b>DESCRIPCIÓN:</b> 802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ, 3MB LEVEL-3 CACHE</div>
									<div class="brandProduct"><b>MARCA:</b> CONCEPTRONIC</div>
									<div class="typeProduct"><b>TIPO:</b> REFURBISHED</div>
									<div class="prices">
										<div class="pricePromotion">$ 19,503.50</div>
										<div class="priceProduct">$ 119,503.50</div>	
									</div>
									<div class="btnBuy">
										<button class="btnAddCart"></button>
									</div>
								</div>
							</div>
							<div class="btnsProduct">
								<div class="btn-group-justified">
									<div class="btn-group">
										<button class="btn btnBrandBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectDetails', 'tabDetails', '2')">DETALLES</button>
									</div>
									<div class="btn-group">
										<button class="btn btnAlternativeBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectReplacements', 'tabReplacements', '2')">REMPLAZOS</button>
									</div>
									<div class="btn-group">
										<button class="btn btnBrandBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectCompatible', 'tabCompatible', '2')">COMPATIBLE</button>
									</div>
									<div class="btn-group">
										<button class="btn btnAlternativeBlue" onclick="getModalTab('modalProduct','closeProduct', 'contectStocks', 'tabStocks', '2')">EXISTENCIAS</button>
									</div>
								</div>
							</div>
						</div>
						
					</td>

					<td id="filters">
					  	<div class="SubTitle">Existencias</div>
				        <div class="row">
							<div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="stocks">
			                    <label for="stocks">Disponibles</label>
			                </div>
				        </div>
				        <div class="SubTitle">Precios</div>
				        <div class="row">
				        	<div class="divSelect divBrandBlue costGray">
                    			<select id="priceRange">
                    				<option>De $0  a $100</option>
                    				<option>De $101 a $200</option>
                    				<option>De $201 a $300</option>
                    			</select>
                    			<label for="priceRange">Rango de precios</label>
                			</div>
				        </div>
				        <div class="SubTitle">Marcas</div>
				        <div class="row">
							<div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="conceptronic">
			                    <label for="conceptronic">CONCEPTRONIC</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">STP</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">ACER</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">APPLE</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">COMPAQ</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">DELL</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">FUJITSU</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">GATEWAY</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MINOLTA</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">EPSON</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">NEC</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MITAC</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">HP</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">IBM</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">LEXMARK</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PALM</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">TOSHIBA</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PANASONIC</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">OKIDATA</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">XEROX</label>
			                </div>
				        </div>
				        <div class="SubTitle">Grupos</div>
				        <div class="row">
							<div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">DISCO DURO INTERNO</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">COMPUTER BAGS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">DISCO DURO EXTERNO</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">COMPONENTES ELECTRONICOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">IMPRESORAS COMPLETAS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PLOTTERS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">CABLES</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MEMORY</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">POWER BANK</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">POWER SUPPLY</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MARKETING</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">CUBIERTAS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MOTHERBOARDS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">DIGITALIZADORES</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">TRANSFER</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">MOTOR</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PANTALLAS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">DUPLEX Y ACCESORIOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">COMPONENTES EXTERNOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">COMPONENTES INTERNOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">VENTILADORES</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">RODILLOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PARTES PARA CARTUCHOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">BANDEJAS Y ACCESORIOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">ADAPTADORES</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">BATERIAS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">CARTUCHOS</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">FUSORES</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">KITS DE MANTENIMIENTO</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PARTES EN GENERAL</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PARTES PARA KIT</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">PARTES PARA FUSOR</label>
			                </div>
			                <div class="divInputMiniCheck divBrandBlue">
			                    <input type="checkbox" id="che">
			                    <label for="che">TECLADOS</label>
			                </div>
				        </div>
					</td>
				</tr>
			</table>	
        </div>
        

     

 
        
        <br style="clear: both;" />
    </div>

        <!--ROW DEL MODAL COMPATIBLES [INICIO]-->
        <div class="row">
        
            <div id="modalProduct" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeProduct" class="close">×</span>
                    <div id="modalTest">
						<ul class="tab">
						  <li><a href="#" id="tabDetails" class="tablinks" onclick="openTab(event, 'contectDetails')">Detalles</a></li>
						  <li><a href="#" id="tabReplacements" class="tablinks" onclick="openTab(event, 'contectReplacements')">Remplazos</a></li>
						  <li><a href="#" id="tabCompatible" class="tablinks" onclick="openTab(event, 'contectCompatible')">Compatible</a></li>
						  <li><a href="#" id="tabStocks" class="tablinks" onclick="openTab(event, 'contectStocks')">Existencias</a></li>
						</ul>

						
							<div id="contectDetails" class="tabcontent">
							  	<table id="tableBase">
							  		<tr>
								  		<td id="imageBase">
								  			<img src="../../img/product_2.jpg">
								  		</td>
								  		<td id="infoBase" style="width: *">
								  			<div class="MainTitle">A1357</div>
								  			<div id=descriptionBase>
								  				CQ893-67009 HP SPINDLE HUBS
								  			</div>
								  		</td>
							  		</tr>
							  	</table>
							  	<div class="MainTitle">GALERIA</div>
							  	<div id="ca-container" class="ca-container">
									<div class="ca-wrapper">
										<div class="ca-item ca-item-1">
											<div class="ca-item-main">
												<div class="ca-icon">
													<img src="../../img/product_2.jpg">
												</div>
											</div>
										</div>
										<div class="ca-item">
											<div class="ca-item-main">
												<img src="../../img/product_2.jpg">
											</div>
										</div>
										<div class="ca-item">
											<div class="ca-item-main">
												<div class="ca-icon" style="background:transparent url(../../img/slide/toner3.jpg) no-repeat center center"></div>
											</div>
										</div>
										<div class="ca-item">
											<div class="ca-item-main">
												<div class="ca-icon" style="background:transparent url(../../img/slide/toner4.jpg) no-repeat center center"></div>
											</div>
										</div>
										<div class="ca-item">
											<div class="ca-item-main">
												<div class="ca-icon" style="background:transparent url(../../img/slide/toner5.jpg) no-repeat center center"></div>
											</div>
										</div>
										
									</div>
								</div>
								<div class="MainTitle">ESPECIFICACIONES</div>
								<div class="MainContainer">
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
							    	<br style="clear: both;" />
								</div>
							</div>

							<div id="contectReplacements" class="tabcontent">
							 	<table>
				                    <thead>
					                    <tr>
					                        <th>Número Parte</th>
					                        <th>Descripción</th>
					                        <th>Marca</th>
					                        <th>Tipo</th>

					                    </tr>
				                    </thead>
				                    <tbody>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
					                    <tr>
					                        <td>VS-3454</td>
					                        <td>802511-601 HP-COMPAQ MOTHERBOARD INCLUDES AN INTEL CORE I5-4300U PROCESSOR 1.9GHZ</td>
					                        <td>DELL</td>
					                        <td>ORIGINAL</td>
					                    </tr>
				                    </tbody>
			                	</table>
							</div>

							<div id="contectCompatible" class="tabcontent">
							  	<table>
				                    <thead>
					                    <tr>
					                        <th>Número Parte</th>
					                        <th>Descripción</th>
					                        <th>Marca</th>
					                        <th>Tipo</th>

					                    </tr>
				                    </thead>
				                    <tbody>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
					                    <tr>
					                        <td>RE-3425623</td>
					                        <td>DE1908, ORIGINAL AC ADAPTER, DELL LATITUDE/ INSPIRON, 19.5V 4.62A, TIP 7.4X5.0</td>
					                        <td>XEROX</td>
					                        <td>REMANUFACTURADO</td>
					                    </tr>
				                    </tbody>
			                	</table>
							</div>
							
							<div id="contectStocks" class="tabcontent">
								<div class="MainContainer">
									<ul class="col3">
										<li><p><b>Moterrey: </b>6</p></li>
										<li><p><b>León Gto: </b>90</p></li>
										<li><p><b>Guadalajara: </b>1</p></li>
										<li><p><b>Chihuahua: </b>2</p></li>
										<li><p><b>Veracruz: </b>0</p></li>
										<li><p><b>Puebla: </b>9</p></li>
										<li><p><b>México: </b>6</p></li>
										<li><p><b>Merida: </b>1</p></li>
										<li><p><b>Hermosillo: </b>0</p></li>
										<li><p><b>Miami: </b>10</p></li>
										<li><p><b>Colombia: </b>15</p></li>
										<li><p><b>Perú: </b>3</p></li>
										<li><p><b>Chile: </b>10</p></li>
										<li><p><b>Argentina: </b>2</p></li>
									</ul>
									<br style="clear: both;" />
								</div>
							</div>
						

			    	</div>
                	<br style="clear: both;" />
                </div>
            </div>
        </div>
        <!--ROW DEL MODAL COMPATIBLES [FIN]-->


        <!--JAVASCRIPT DEL CARRUCEL INICIO-->
			<script type="text/javascript" src="../../lib/jquery-1.6.2.min.js"></script>
			<script type="text/javascript" src="../../lib/jquery.easing.1.3.js"></script>
			<!-- the jScrollPane script -->
			<script type="text/javascript" src="../../lib/jquery.mousewheel.js"></script>
			<script type="text/javascript" src="../../lib/jquery.contentcarousel.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function()
		        {
		            init();
		        });
				$('#ca-container').contentcarousel();

			</script>

		<!--JAVASCRIPT DEL CARRUCEL FIN-->

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>