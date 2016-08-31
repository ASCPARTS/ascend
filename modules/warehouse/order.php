<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Surtir Pedidos</div>
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
                    <option>Enviado</option>
                    <option>Pendiente/urgente</option>
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
                    <td>Enviado</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/Urgente</b></td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/urgente</b></td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Enviado</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Ver Pedido" class="btn btnOnlineGreen" onclick="getModal(verPedido,closePedido)"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Enviado</td>
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
        <div class="MainTitle">RMA detalle</div>
        <div class="MainContainer">
            <div class="tblContainer">
                <table>
                    <tbody>
                    <tr>
                        <td>Fecha de rma</td>
                        <td>23 agosto 2015</td>
                    </tr>
                    <tr>
                        <td>Responsable de la RMA</td>
                        <td>Pedro Lopez</td>
                    </tr>
                    <tr>
                        <td>Estatus</td>
                        <td>Pendiente</td>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-1-1 col-md-1-4 col-lg-1-4 col-md-offset-3-4 col-lg-offset-3-4">
                        <div class="divSelect">
                            <select>
                                <option>Enviado</option>
                                <option>Recibido</option>
                                <option>Pendiente</option>
                                <option>concluido</option>
                            </select>
                            <label>nuevo estatus</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>

</html>