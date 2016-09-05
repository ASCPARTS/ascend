<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">RMA Proveedor</div>
<div class="MainContainer">
    <div class="SubTitle">RMA(S) pendientes</div>

            <div class="ButtonContainer">
            <input type="button" value="Nuevo RMA"  onclick="getModal('modalAgregar','closeFin')" class="btnOnlineGreen btn">
            </div>

    <div class="row">
        <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>Número de Proveedor</th>
                    <th>Folio de Factura</th>
                    <th>folio de RMA</th>
                    <th>numero de parte</th>
                    <th>cantidad</th>
                    <th>observaciones</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>056-12</td>
                    <td>1467</td>
                    <td>2</td>
                    <td>10326</td>
                    <td>2</td>
                    <td>El producto se encuentra dañado de la parte superior izquierda</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle"  onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>
                <tr>
                    <td>043-12</td>
                    <td>1689</td>
                    <td>1</td>
                    <td>90123</td>
                    <td>2</td>
                    <td>El producto no incluye todas las piezas</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>
                <tr>
                    <td>034-10</td>
                    <td>1698</td>
                    <td>1</td>
                    <td>13632</td>
                    <td>1</td>
                    <td>No funciona (no prende)</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>
                <tr>
                    <td>056-12</td>
                    <td>1467</td>
                    <td>2</td>
                    <td>10326</td>
                    <td>2</td>
                    <td>El producto se encuentra dañado de la parte superior izquierda</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle"  onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>
                <tr>
                    <td>043-12</td>
                    <td>1689</td>
                    <td>1</td>
                    <td>90123</td>
                    <td>2</td>
                    <td>El producto no incluye todas las piezas</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>
                <tr>
                    <td>034-10</td>
                    <td>1698</td>
                    <td>1</td>
                    <td>13632</td>
                    <td>1</td>
                    <td>No funciona (no prende)</td>
                    <td>Pendiente</td>
                    <td style="text-align: center"><input type="button" value="Ver Detalle" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="modalAgregar" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="closeFin" class="close">×</span>
        <div class="MainTitle">nuevo rma</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>Numero de proveedor</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>Numero de Factura</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>Partida</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>cantidad</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>Numero de Parte</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>descripcion</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputText">
                        <input type="text">
                        <label>costo</label>
                    </div>
                </div>
                <div class="col-md-1-4 col-lg-1-4 col-sm-1-4">
                    <div class="divInputDate">
                        <input type="date">
                        <label>fecha</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1-1 col-lg-1-1 col-sm-1-1">
                    <div class="divInputTextArea">
                        <label>Descripcion de la Devolución</label>
                        <textarea></textarea>
                    </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" value="Crear"  class="btnOnlineGreen btn">
                <input type="button" value="Cancelar"  class="btnBrandRed btn">
            </div>
            <br style="clear: both;" />
        </div>

    </div>

</div>
<div id="modalEditar" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="closeEditar" class="close">×</span>
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