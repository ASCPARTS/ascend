<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Liberar Pedido</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText">
                <input type="text">
                <label>Buscar Folio</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 col-md-offset-2-4 col-lg-offset-2-4">
            <div class="divSelect">
                <select>
                    <option>Todos</option>
                    <option>Pendiente</option>
                    <option>Liberados</option>
                    <option>Liberados/Urgente</option>
                </select>
                <label>Buscar por estatus</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>Folio de Pedido</th>
                    <th>Fecha Compromiso</th>
                    <th>Estatus</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Liberado</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/Urgente</b></td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/urgente</b></td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Liberado</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal('verPedido','closePedido')"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Liberado</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="verPedido" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="closePedido" class="close">×</span>
        <div class="MainTitle">Liberar Pedido</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-sm-1-1 col-md-1-4 col-lg-1-4">
                    <div class="">
                        <img src="../../img/logo_colors-01.png" width="55%">
                    </div>
                </div>

                </div>
            <div class="row">
                <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                    <table >
                        <thead>
                        <tr>
                            <th>Clave del Cliente</th>
                            <th>Nombre del Cliente</th>
                            <th>Dias Cartera</th>
                            <th>Saldo en Credito</th>
                            <th>Saldo en Transito</th>
                            <th>Saldo en Almacen</th>
                            <th>Saldo Disponible</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><label>15-890</label></td>
                            <td><label>Maria del Carmen Rosas</label></td>
                            <td><label>12 Dias</label></td>
                            <td><label>$4, 500.00 Dlls</label></td>
                            <td><label>$1, 000.00 Dlls</label></td>
                            <td><label>$500.00 Dlls</label></td>
                            <td><label><b>$3, 000.00 Dlls</b></label></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

        </div>
            <div class="row">
                <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                    <table >
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Descripcion</th>
                            <th>Ubicación</th>
                            <th>Cantidad</th>
                            <th>U Medida</th>
                            <th>Importe</th>
                            <th>Impuestos</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>R01B</td>
                            <td>4</td>
                            <td>Pza</td>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>R01B</td>
                            <td>9</td>
                            <td>Pza</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>R01B</td>
                            <td>4</td>
                            <td>Pza</td>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>R01B</td>
                            <td>9</td>
                            <td>Pza</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>R01B</td>
                            <td>4</td>
                            <td>Pza</th>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>R01B</td>
                            <td>9</td>
                            <td>Pza</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-1 col-md-offset-3-4 col-lg-offset-3-4">
                   <div class="divInputText">
                    <input type="text" value="$2, 893.90" >
                    <label>Gran Total</label>
                       </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" value="Liberar Pedido" class="btn btnOnlineGreen" >
            </div>
            <br style="clear: both;" />
    </div>

</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>
</html>

