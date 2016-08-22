<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<script src="jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/reportes.js"></script>
<head>
    <style></style>
    <link rel="stylesheet" type="text/css" href="css/reportes.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">

</head>

<body>




        <div id="principal" >

            <div class="lineaDivisora">Reportes</div>
            <div>
                <input type="text" placeholder="Buscar Reporte" class="buscar" align="center">
            </div>

            <div style="height: 15px;"></div>


            <div style="width: 80%; height: auto; background-color: white; border: 1px gray solid; margin: 6px 6px 6px 10px;">
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div id="nivel1" class="nombreReporte"><label>&#9656;</label>Ficha de Seguimiento de Cliente</div>
                <div id="nivel2" class="filtros">

                    Filtrar por:<br>
                    <input type="text" placeholder="Cliente" class="buscar"><br>
                    <input type="date" placeholder="Fecha" class="fecha"><br>
                    <div style="margin-left: 5%">
                        <button type="button" value="Aceptar" id="myBtn"  class="colorGreen">Aceptar</button>
                        <input type="button" value="Cancelar" onclick="" class="colorRed">
                    </div>
                    <br>
                </div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Ficha de Cliente</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>
                <div class="nombreReporte"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div>

            </div>


        </div>



        <h2>Modal Example</h2>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">×</span>
                <div class="lineaDivisoraTitulo">Ficha de Seguimiento de Cliente</div>
                <div>
                    <table>
                        <tr>
                            <td width="50%">
                                <label>Fecha de Visita:</label> 1/Sep/2016<br>
                                <label>Hora de Visita:</label> 12:00 p.m<br>
                                <label>Hora de Termino de Visita:</label> _________<br>
                                <label>Asunto:</label> Presentación de nuevos precios
                            </td>
                            <td width="50%">
                                <label>Promotor:</label> Israel Orosco<br>
                                <label>Nombre Comercial:</label> ACCECOMP_ACCESORIOS DE COMPUTADORAS<br>
                                <label>Nombre de Contacto:</label> EDUARDO LOPEZ TORRES<br>
                                <label>Nuevos Contactos:</label> __________________
                            </td>
                        </tr>
                    </table>
                </div>


                <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white">
                    <div class="lineaDivisora" style="text-align: center;">COTIZACIONES POR FAMILIA</div>
                    <table width="100%" >
                        <tr style="text-align: center">
                            <td><h3>Familia</h3></td>
                            <td><h3>2 años Anteriores</h3></td>
                            <td><h3>Año Anteior</h3></td>
                            <td><h3>Año Actual</h3></td>
                            <td><h3>PCT Actual VS Anterior</h3></td>
                            <td colspan="5"><div class="lineaDivisora" ></div></td>
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


                <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white;">
                    <table width="100%">
                        <tr style="text-align: center">

                            <div class="lineaDivisora" style="text-align: center">VENTAS POR FAMILIA</div>
                            <td><h3>Familia</h3></td>
                            <td><h3>2 años Anteriores</h3></td>
                            <td><h3>Año Anteior</h3></td>
                            <td><h3>Año Actual</h3></td>
                            <td><h3>PCT Actual VS Anterior</h3></td>
                            <td colspan="5"><div class="lineaDivisora" ></div></td>
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




                <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white;">
                    <table width="100%">
                        <tr style="text-align: center">

                            <div class="lineaDivisora" style="text-align: center">VENTAS DE FAMILIA POR MARCA</div>
                            <td><h3>Familia Marca</h3></td>
                            <td><h3>2 años Anteriores</h3></td>
                            <td><h3>Año Anteior</h3></td>
                            <td><h3>Año Actual</h3></td>
                            <td><h3>PCT Actual VS Anterior</h3></td>
                            <td colspan="5"><div class="lineaDivisora" ></div></td>
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


                <div style="border: 1px #050409 solid; margin-top: 15px; background-color: white">
                    <table width="100%">
                        <tr style="text-align: center">

                            <div class="lineaDivisora" style="text-align: center">VENTAS POR GRUPO</div>
                            <td><h3>Grupo</h3></td>
                            <td><h3>2 años Anteriores</h3></td>
                            <td><h3>Año Anteior</h3></td>
                            <td><h3>Año Actual</h3></td>
                            <td><h3>PCT Actual VS Anterior</h3></td>
                            <td colspan="5"><div class="lineaDivisora" ></div></td>
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
                </div>

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