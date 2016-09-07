<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">CLIENTES</div>
    <div class="MainContainer">
    <div class="SubTitle">Registro de clientes</div>
        <div class="row">
        	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText searchGray">
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

                          <th>DIRECCIÓN</th>
                          <th>COLONIA</th>
                          <th>ENTRE CALLE 1</th>
                          <th>ENTRE CALLE 2</th>
                          
                          <th>PAÍS</th>
                          <th>ESTADO</th>
                          <th>MUNICIPIO</th>
                          <th>CIUDAD</th>

                          <th>TELÉFONO</th>
                          <th>SITIO WEB</th>
                          <th>CORREO</th>
                          <th>CLASE</th>

                          <th>VENDEDOR</th> <!--ALTA-->
                          <th>LISTA DE PRECIO</th>
                          <th>MONEDA</th>
                          <th>CONDICIÓN DE PAGO</th>

                          <th>ZONA</th>
                          <th>MEDIO DE EMBARGUE</th>
                          <th>VÍA DE EMBARGUE</th>
                          <th>HORARIO DE REVISIÓN DE FACTURA</th>

                          <th>DÍA DE PAGO DE FACTURA</th>
                          <th>HORARIO DE PAGO DE FACTURA</th>
                          <th>DÍA DE RECEPCIÓN DE MERCANCIA</th>
                          <th>HORARIO DE RECEPCIÓN DE MERCANCIA</th>

                          <th>MÉTODO DE PAGO</th>
                          <th>REFERENCIA</th>
                          <th>VENCIMIENTO DE PAGARE</th>
                          <th>LIMITE DE CREDITO</th>

                          <th>ORIGEN DEL CLIENTE</th>
                          <th>FECHAS ÚLTIMA DE COMPRA</th>
                          <th>DOMICILIO DE EMBARQUE</th>
                          <th>COLONIA DE EMBARQUE</th>

                          <th>CIUDAD DE EMBARQUE</th>
                          <th>ESTADO DE EMBARQUE</th>
                          <th>CP. DE EMBARQUE</th>
                          <th>COSTO DE EMBARQUE</th>

                          

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
                            
                        	<td>453245</td>
                        	<td>SEGUCOM ASOCIADOS</td>
                          	<td>SEGUCOM</td>
	                        <td>SEG54355GD5</td>

	                        <td>JUSTO SIERRA #234</td>
                          	<td>CENTRO</td>
                          	<td>MORELOS</td>
                          	<td>VALLARTA</td>
                          
                          	<td>MÉXICO</td>
                          	<td>JALISCO</td>
                          	<td>GUADALAJARA</td>
                          	<td>GUADALAJARA</td>

                          	<td>311-566-34-56</td>
                         	<td>WWW.SEGUCOM.MX</td>
                          	<td>CONTACTO@SEGUCOM.MX</td>
                          	<td>B</td>

                          	<td>MARIANA ALVAREZ</th> <!--ALTA-->
                          	<td>PRECIO 3</td>
                          	<td>USD</td>
                          	<td>TRASFERENCIA</td>

                          	<td>SUR</td>
                          	<td>PAQUETERIA</td>
                          	<td>HDL</td>
                          	<td>10:00 AM - 12:00 PM</td>

                          	<td>15</td>
                          	<td>9:00 AM - 7:00 PM</td>
                          	<td>17</td>
                          	<td>3:00 PM - 7:30 PM</td>

                          	<td>TRASFERENCIA ELECTRONICA</td>
                          	<td>TC45235</td>
                          	<td>18/08/2016</td>
                          	<td>50,000.00</td>

                          	<td>INTERNET</td>
                          	<td>17/09/2016</td>
                          	<td>VALLARTA #214</td>
                          	<td>SAN PEDRO</td>

                          	<td>TLAQUEPAQUE</td>
                          	<td>JALISCO</td>
                          	<td>98450</td>
                          	<td>503.00</td>
   
                       
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnOnlineGreen">Activar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            
                        	<td>453245</td>
                        	<td>SEGUCOM ASOCIADOS</td>
                          	<td>SEGUCOM</td>
	                        <td>SEG54355GD5</td>

	                        <td>JUSTO SIERRA #234</td>
                          	<td>CENTRO</td>
                          	<td>MORELOS</td>
                          	<td>VALLARTA</td>
                          
                          	<td>MÉXICO</td>
                          	<td>JALISCO</td>
                          	<td>GUADALAJARA</td>
                          	<td>GUADALAJARA</td>

                          	<td>311-566-34-56</td>
                         	<td>WWW.SEGUCOM.MX</td>
                          	<td>CONTACTO@SEGUCOM.MX</td>
                          	<td>B</td>

                          	<td>MARIANA ALVAREZ</th> <!--ALTA-->
                          	<td>PRECIO 3</td>
                          	<td>USD</td>
                          	<td>TRASFERENCIA</td>

                          	<td>SUR</td>
                          	<td>PAQUETERIA</td>
                          	<td>HDL</td>
                          	<td>10:00 AM - 12:00 PM</td>

                          	<td>15</td>
                          	<td>9:00 AM - 7:00 PM</td>
                          	<td>17</td>
                          	<td>3:00 PM - 7:30 PM</td>

                          	<td>TRASFERENCIA ELECTRONICA</td>
                          	<td>TC45235</td>
                          	<td>18/08/2016</td>
                          	<td>50,000.00</td>

                          	<td>INTERNET</td>
                          	<td>17/09/2016</td>
                          	<td>VALLARTA #214</td>
                          	<td>SAN PEDRO</td>

                          	<td>TLAQUEPAQUE</td>
                          	<td>JALISCO</td>
                          	<td>98450</td>
                          	<td>503.00</td>
   
                       
                        </tr>
                        <tr>
                        	<td>
                                <button class="btn btnBrandRed">Desactivar</button>
                            </td>
                        	<td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            
                        	<td>453245</td>
                        	<td>SEGUCOM ASOCIADOS</td>
                          	<td>SEGUCOM</td>
	                        <td>SEG54355GD5</td>

	                        <td>JUSTO SIERRA #234</td>
                          	<td>CENTRO</td>
                          	<td>MORELOS</td>
                          	<td>VALLARTA</td>
                          
                          	<td>MÉXICO</td>
                          	<td>JALISCO</td>
                          	<td>GUADALAJARA</td>
                          	<td>GUADALAJARA</td>

                          	<td>311-566-34-56</td>
                         	<td>WWW.SEGUCOM.MX</td>
                          	<td>CONTACTO@SEGUCOM.MX</td>
                          	<td>B</td>

                          	<td>MARIANA ALVAREZ</th> <!--ALTA-->
                          	<td>PRECIO 3</td>
                          	<td>USD</td>
                          	<td>TRASFERENCIA</td>

                          	<td>SUR</td>
                          	<td>PAQUETERIA</td>
                          	<td>HDL</td>
                          	<td>10:00 AM - 12:00 PM</td>

                          	<td>15</td>
                          	<td>9:00 AM - 7:00 PM</td>
                          	<td>17</td>
                          	<td>3:00 PM - 7:30 PM</td>

                          	<td>TRASFERENCIA ELECTRONICA</td>
                          	<td>TC45235</td>
                          	<td>18/08/2016</td>
                          	<td>50,000.00</td>

                          	<td>INTERNET</td>
                          	<td>17/09/2016</td>
                          	<td>VALLARTA #214</td>
                          	<td>SAN PEDRO</td>

                          	<td>TLAQUEPAQUE</td>
                          	<td>JALISCO</td>
                          	<td>98450</td>
                          	<td>503.00</td>
   
        
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
                    <div class="MainTitle">NUEVO CLIENTE</div>
                    <div class="MainContainer" id="nuevoPedimento">
                    <div class="SubTitle">Datos Personales</div>
                        <div class="row">
                        	<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText ">
                                    <input type="text" id="text1">
                                    <label for="text1">RAZÓN SOCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText ">
                                    <input type="text" id="text2">
                                    <label for="text2">RAZÓN COMERCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText ">
                                    <input type="text" id="text1">
                                    <label for="text1">RFC</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText directionYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">CALLE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText numberYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO EXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText numberYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">NÚMERO INT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText directionYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">ENTRE CALLE 1</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText directionYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">ENTRE CALLE 2</label>
                                </div>
                            </div>
	                        <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
	                            <div class="divSelect worldYellow">
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
	                            <div class="divSelect worldYellow">
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
	                            <div class="divSelect worldYellow">
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
	                            <div class="divSelect worldYellow">
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
                                <div class="divInputText phoneYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">TELÉFONO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText atYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">SITIO WEB</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText emailYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">CORREO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect referenceYellow">
                                    <select id="select1">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                    <label for="select1">CLASE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect userYellow">
                                    <select id="select1">
                                        <option>MARIANA LOPEZ</option>
                                        <option>LORENA MARTINEZ</option>
                                        <option>JORGE RAMIREZ</option>
                                    </select>
                                    <label for="select1">VENDEDOR</label>
                                </div>
                            </div>
                        </div>
                        <div class="SubTitle">Datos de credito </div>

                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect referenceYellow">
                                    <select id="select1">
                                        <option>PRECIO 1</option>
                                        <option>PRECIO 2</option>
                                        <option>PRECIO 3</option>
                                    </select>
                                    <label for="select1">LISTA DE PRECIOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect coinYellow">
                                    <select id="select1">
                                        <option>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText referenceYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">CONDICION DE PAGO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect referenceYellow">
                                    <select id="select1">
                                        <option>SUR</option>
                                        <option>CENTRO</option>
                                        <option>NORTE</option>
                                    </select>
                                    <label for="select1">ZONA DE VENTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText businessCardYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">CONTACTO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect packageYellow">
                                    <select id="select1">
                                        <option>UPS</option>
                                        <option>HDL</option>
                                        <option>FEDEX</option>
                                    </select>
                                    <label for="select1">MEDIO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect shipmentYellow">
                                    <select id="select1">
                                        <option>AVIÓN</option>
                                        <option>BARCO</option>
                                        <option>CAMIÓN</option>
                                    </select>
                                    <label for="select1">VÍA DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText calendarYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">DÍAS REVISIÓN FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect clockYellow">
                                    <select id="select1">
                                        <option>9:00 - 12:00</option>
                                        <option>12:00 - 14:00</option>
                                        <option>14:00 - 16:00</option>
                                    </select>
                                    <label for="select1">HORARIO DE PAGO FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText calendarYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">DÍAS DE RECEPCIÓN MERCANCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect creditCardYellow">
                                    <select id="select1">
                                        <option>EFECTIVO</option>
                                        <option>CHEQUE</option>
                                        <option>TRASFERENCIA</option>
                                    </select>
                                    <label for="select1">MÉTODO DE PAGO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText referenceYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">REFERENCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="date1">
                                    <label for="date1">VENCIMIENTO DE PAGARE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText coinYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">LIMITE DE CREDITO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect referenceYellow">
                                    <select id="select1">
                                        <option>RECOMENDACIÓN</option>
                                        <option>INTERNET</option>
                                        <option>ASESOR DE VENTAS</option>
                                    </select>
                                    <label for="select1">ORIGEN DEL CLIENTE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="date1">
                                    <label for="date1">FECHA ULTIMA COMPRA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText directionYellow">
                                    <input type="text" id="text2">
                                    <label for="text2">DOMICILIO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText streetYellow">
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

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">EDITAR CLIENTE</div>
                    <div class="MainContainer" id="nuevoPedimento">
                    <div class="SubTitle">Datos Personales</div>
                        <div class="row">
                        	<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="SEGUCOM ASOCIADOS">
                                    <label for="text1">RAZÓN SOCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="SEGUCOM">
                                    <label for="text2">RAZÓN COMERCIAL</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="SEG54355GD5">
                                    <label for="text1">RFC</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="JUSTO SIERRA">
                                    <label for="text2">CALLE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="234">
                                    <label for="text2">NÚMERO EXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="N/A">
                                    <label for="text2">NÚMERO INT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="MORELOS">
                                    <label for="text2">ENTRE CALLE 1</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="VALLARTA">
                                    <label for="text2">ENTRE CALLE 2</label>
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
	                                    <option selected>JALISCO</option>
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
	                                    <option selected>PINOS</option>
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
	                                    <option selected>TLAQUEPAQUE</option>
	                                    <option>LAS ROSAS</option>
	                                </select>
	                                <label for="select1">CIUDAD</label>
	                            </div>
		                    </div>
                           	<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="311-566-34-56">
                                    <label for="text1">TELÉFONO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="WWW.SEGUCOM.MX">
                                    <label for="text1">SITIO WEB</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="CONTACTO@SEGUCOM.MX">
                                    <label for="text1">CORREO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>A</option>
                                        <option selected>B</option>
                                        <option>C</option>
                                    </select>
                                    <label for="select1">CLASE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>MARIANA LOPEZ</option>
                                        <option>LORENA MARTINEZ</option>
                                        <option>JORGE RAMIREZ</option>
                                    </select>
                                    <label for="select1">VENDEDOR</label>
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
                                        <option selected>PRECIO 3</option>
                                    </select>
                                    <label for="select1">LISTA DE PRECIOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option selected>DOLAR</option>
                                        <option>EURO</option>
                                        <option>PESO</option>
                                    </select>
                                    <label for="select1">MONEDA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="TRASFERENCIA">
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
                                    <input type="text" id="text2" value="5">
                                    <label for="text2">DÍAS REVISIÓN FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>9:00 - 12:00</option>
                                        <option selected>12:00 - 14:00</option>
                                        <option>14:00 - 16:00</option>
                                    </select>
                                    <label for="select1">HORARIO DE PAGO FACTURA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="15">
                                    <label for="text2">DÍAS DE RECEPCIÓN MERCANCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>EFECTIVO</option>
                                        <option>CHEQUE</option>
                                        <option selected>TRASFERENCIA</option>
                                    </select>
                                    <label for="select1">MÉTODO DE PAGO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="TC45235">
                                    <label for="text2">REFERENCIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1" value="2015-02-11">
                                    <label for="date1">VENCIMIENTO DE PAGARE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="50,000">
                                    <label for="text2">LIMITE DE CREDITO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>RECOMENDACIÓN</option>
                                        <option selected>INTERNET</option>
                                        <option>ASESOR DE VENTAS</option>
                                    </select>
                                    <label for="select1">ORIGEN DEL CLIENTE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1" value="2016-08-09">
                                    <label for="date1">FECHA ULTIMA COMPRA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="VALLARTA #214">
                                    <label for="text2">DOMICILIO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="SAN PEDRO">
                                    <label for="text2">COLONIA DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>GUADALAJARA</option>
                                        <option selected>AGUASCALIENTES</option>
                                        <option>MERIDA</option>
                                    </select>
                                    <label for="select1">CIUDAD DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>JALISCO</option>
                                        <option selected>CHIAPAS</option>
                                        <option>NUEVO LEON</option>
                                    </select>
                                    <label for="select1">ESTADO DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="98345">
                                    <label for="text2">C.P. DE EMBARQUE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="503.00">
                                    <label for="text2">COSTO DE EMBARQUE</label>
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