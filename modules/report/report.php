<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="../../css/report.css">


</head>

<body>
<div class="MainTitle">Reportes</div>
        <div class="MainContainer" >
            <div class="row">
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                <div class="divInputText">
                    <input type="text" id="x">
                <label for="x">Buscar reporte</label>
                </div>
            </div>
                </div>
<div class="row">
            <div class="reportePrincipal">
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('reporte','cerrar')"><label>&#9656;</label>Ficha de Seguimiento de Cliente</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Ficha de Cliente</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte" onclick="getModal('filtro','cerrar')"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
            </div>
    </div>


        <div id="reporte" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span id="cerrar" class="close" id="closeEditar">×</span>
                <div class="MainContainer">
                <table width="100%">

                    <tr>
                        <td colspan="2"><div class="lineaDivisoraTitulo">Ficha de Seguimiento de Cliente</div></td>
                    </tr>
                    <tr>
                        <td style="border: 1px dimgray solid">
                            <label>Fecha de Visita:</label> 1/Sep/2016<br>
                            <label>Hora de Visita:</label> 12:00 p.m<br>
                            <label>Hora de Termino de Visita:</label> _________<br>
                            <label>Asunto:</label> Presentación de nuevos precios
                            <label>Promotor:</label> Israel Orosco<br>
                            <label>Nombre Comercial:</label> ACCECOMP_ACCESORIOS DE COMPUTADORAS<br>
                            <label>Nombre de Contacto:</label> EDUARDO LOPEZ TORRES<br>
                            <label>Nuevos Contactos:</label> __________________
                        </td>
                        <td style="border: 1px dimgray solid">
                            <div class="infoCredito">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label class="clienteCredito">Crédito:</label><br>
                                            <label class="clienteCredito">Monto Ejercido:</label><br>
                                            <label class="clienteCredito">Monto Vencido:</label><br>
                                            <label class="clienteCredito">Condicion de Pago:</label><br>
                                            <label class="clienteCredito">Precio de Lista:</label><br>
                                            <label class="clienteCredito">Clase Cliente:</label><br>
                                            <label class="clienteCredito">Categoria (Auto):</label><br>
                                            <label class="clienteCredito">Venta Estrategia:</label><br>
                                            <label class="clienteCredito">Ultima Compra:</label><br>
                                            <label class="clienteCredito">Visita 30 dias:</label><br>
                                        </td>
                                        <td width="50%" style="text-align: right">
                                            <label>$ 5, 000.00</label><br>
                                            <label>$311.6</label><br>
                                            <label>$167.42</label><br>
                                            <label>Credito a 15 dias</label><br>
                                            <label>DIST3</label><br>
                                            <label>A</label><br>
                                            <label>CAT2</label><br>
                                            <label>S</label><br>
                                            <label>17 Agosto 2016</label><br>
                                            <label>O veces</label><br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px dimgray solid;">
                                <h2>Datos Fiscales del Contacto</h2>
                                <h3>VICKY MONSERRAT SANTANA GARFIAS</h3>
                                <label>Clave del cliente: 19-475</label><br>
                                <label>RFC: SAGV-890501-R26</label><br>
                                <label>Domicilio: Av. Vicente Guerrero no.35 Col. Centro C.P: 4000</label><br>
                                <label>Iguala de la Indepegro</label><br>
                                <h2>Domicilios de Embarque y Sucursales</h2>
                                <h3>Clave del destino: 19-475-01</h3>
                                <label>VICKY MONSERRAT SANTANA GARFIAS</label><br>
                                <label>Domicilio: Av. Vicente Guerrero no.35 Col. Centro C.P: 4000</label><br>
                                <label>Iguala de la Indepegro</label>
                                <h3>Cuentas de correo electronico</h3>
                                <label>ventas@accecomp.com.mx</label>
                                <h4>Compras Web del Mes:  2</h4>
                                <h4>Ultima Compra Web: 17 Agosto 2016</h4>

                        </td>
                        <td style="border: 1px dimgray solid">
                            <img src="../../img/grafica.jpg" width="470px"  style="padding: 5px 2px 5px 2px">
                            <div class="Grafica">
                                <table width="100%">
                                    <tr >
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" style="text-align: center">
                                                <tr>
                                                    <td><h3>Periodo</h3></td>
                                                    <td><h3>Valor</h3></td>
                                                </tr>
                                                <tr>
                                                    <td>Ago 2015
                                                    </td>
                                                    <td>575.18</td>
                                                </tr>
                                                <tr>
                                                    <td>Sep 2015</td>
                                                    <td>239.26</td>
                                                </tr>
                                                <tr>
                                                    <td>Oct 2015</td>
                                                    <td>115.50</td>
                                                </tr>
                                                <tr>
                                                    <td>Nov 2015</td>
                                                    <td>314.44</td>
                                                </tr>
                                                <tr>
                                                    <td>Dic 2015</td>
                                                    <td>232.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Ene 2016</td>
                                                    <td>303.50</td>
                                                </tr>
                                                <tr>
                                                    <td>Feb 2016</td>
                                                    <td>297.50</td>
                                                </tr>
                                                <tr>
                                                    <td>Mar 2016</td>
                                                    <td>234.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Abr 2016</td>
                                                    <td>281.50</td>
                                                </tr>
                                                <tr>
                                                    <td>May 2016</td>
                                                    <td>303.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Jun 2016</td>
                                                    <td>424.50</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Total anual</b></td>
                                                    <td><b>3,443. 88</b></td>
                                                </tr>

                                            </table>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white">
                                <div class="lineaDivisora" style="text-align: center;">COTIZACIONES POR FAMILIA</div>
                                <table width="100%" >
                                    <tr style="text-align: center">
                                        <td><h3>Familia</h3></td>
                                        <td><h3>2 años Anteriores</h3></td>
                                        <td><h3>Año Anteior</h3></td>
                                        <td><h3>Año Actual</h3></td>
                                        <td><h3>PCT Actual VS Anterior</h3></td>

                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Laptops</td>
                                        <td>8,202.71</td>
                                        <td>6,447.26</td>
                                        <td>2,660.35</td>
                                        <td>0.41</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Mobiles</td>
                                        <td>880.84</td>
                                        <td>653.01</td>
                                        <td>55.50</td>
                                        <td>0.08</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Printers</td>
                                        <td>36.25</td>
                                        <td>47.03</td>
                                        <td>48.36</td>
                                        <td>1.03</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Projectors</td>
                                        <td>0.00</td>
                                        <td>157.07</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Desktops</td>
                                        <td>3.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Accesories</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Copiers</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Servers</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white;">
                                <table width="100%">
                                    <tr style="text-align: center">

                                        <div class="lineaDivisora" style="text-align: center">VENTAS POR FAMILIA</div>
                                        <td><h3>Familia</h3></td>
                                        <td><h3>2 años Anteriores</h3></td>
                                        <td><h3>Año Anteior</h3></td>
                                        <td><h3>Año Actual</h3></td>
                                        <td><h3>PCT Actual VS Anterior</h3></td>

                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Laptops</td>
                                        <td>5,895.95</td>
                                        <td>4,504.51</td>
                                        <td>2,576.36</td>
                                        <td>0.57</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Acccesories</td>
                                        <td>116.03</td>
                                        <td>175.54</td>
                                        <td>81.20</td>
                                        <td>0.46</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Mobiles</td>
                                        <td>327.24</td>
                                        <td>350.70</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Printers</td>
                                        <td>23.49</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Projectors</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Copiers</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Servers</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Desktops</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>

                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white;">
                                <table width="100%">
                                    <tr style="text-align: center">

                                        <div class="lineaDivisora" style="text-align: center">VENTAS DE FAMILIA POR MARCA</div>
                                        <td><h3>Familia Marca</h3></td>
                                        <td><h3>2 años Anteriores</h3></td>
                                        <td><h3>Año Anteior</h3></td>
                                        <td><h3>Año Actual</h3></td>
                                        <td><h3>PCT Actual VS Anterior</h3></td>

                                    </tr>
                                    <tr style="text-align: center">
                                        <td><h2>Accesories</h2></td>
                                        <td>0.03</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Power Plus</td>
                                        <td>0.03</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td><h2>Laptops</h2></td>
                                        <td>1,696.45</td>
                                        <td>1,459.86</td>
                                        <td>1, 067.20</td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Power Plus</td>
                                        <td>1,696.45</td>
                                        <td>1,459.86</td>
                                        <td>1, 067.20</td>
                                        <td>0.73</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td><h2>Mobiles</h2></td>
                                        <td>327.24</td>
                                        <td>350.70</td>
                                        <td>0.00</td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Apple</td>
                                        <td>222.84</td>
                                        <td>198.24</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Power Plus</td>
                                        <td>104.40</td>
                                        <td>117.66</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>NIM</td>
                                        <td>0.00</td>
                                        <td>34.80</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td><h2>Printers</h2></td>
                                        <td>23.49</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>HP</td>
                                        <td>23.49</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>

                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white">
                                <table width="100%">
                                    <tr style="text-align: center">

                                        <div class="lineaDivisora" style="text-align: center">VENTAS POR GRUPO</div>
                                        <td><h3>Grupo</h3></td>
                                        <td><h3>2 años Anteriores</h3></td>
                                        <td><h3>Año Anteior</h3></td>
                                        <td><h3>Año Actual</h3></td>
                                        <td><h3>PCT Actual VS Anterior</h3></td>

                                    </tr>
                                    <tr style="text-align: center">
                                        <td>AC Adapters</td>
                                        <td>3,450.74</td>
                                        <td>2,795.90</td>
                                        <td>1,775.96</td>
                                        <td>0.64</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Batteries</td>
                                        <td>1,406.55</td>
                                        <td>918.72</td>
                                        <td>378.16</td>
                                        <td>0.41</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Displays</td>
                                        <td>999.51</td>
                                        <td>690.39</td>
                                        <td>267.96</td>
                                        <td>0.39</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Keyboards</td>
                                        <td>146.16</td>
                                        <td>128.76</td>
                                        <td>154.28</td>
                                        <td>1.20</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>General Parts</td>
                                        <td>116.00</td>
                                        <td>211.28</td>
                                        <td>81.20</td>
                                        <td>0.38</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Digitizers</td>
                                        <td>139.32</td>
                                        <td>157.60</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Power Bank</td>
                                        <td>104.40</td>
                                        <td>117.66</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Cords</td>
                                        <td>0.00</td>
                                        <td>10.44</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>Marketing</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white;" >
                                <table style="text-align: center; ">
                                    <div class="lineaDivisora" style="text-align: center">TRAMITES RMA POR ESTATUS</div>
                                    <td><h3>Tipo Trámite y Último Estatus</h3></td>
                                    <td><h3>Dos Años Antes</h3></td>
                                    <td><h3>Año Anterior</h3></td>
                                    <td><h3>Año Actual</h3></td>
                                    <td><h3>PCT Actual VS Anterior</h3></td>
                                    </tr>
                                    <tr>
                                        <td><h2>Devolución</h2></td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Devolución realizada. Nota de crédito generada.</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Tramite Cancelado</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td><h2>Garantia</h2></td>
                                        <td>5</td>
                                        <td>4</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Tramite finalizado. Confirmado y aceptado por el cliente.</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>RMA rechazado</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </table>
                </table>
                    <br style="clear: both;" />
                </div>
            </div>
            


        </div>


</body>
<script type="text/javascript" src="../../js/modal.js"></script>
<script type="text/javascript" src="../../js/reportes.js"></script>
</html>