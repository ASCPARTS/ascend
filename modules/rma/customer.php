<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">RMA cliente</div>
<div class="MainContainer">
    <div class="SubTitle">RMA(s) Pendientes</div>
<div class="row">
    <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 tblContainer">
        <table>
            <thead>
            <tr>
                <th>Número de Cliente</th>
                <th>Folio de Factura</th>
                <th>numero de partida</th>
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
                <td style="text-align: center"><input type="button" value="Resolver"  onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>043-12</td>
                <td>1689</td>
                <td>1</td>
                <td>90123</td>
                <td>2</td>
                <td>El producto no incluye todas las piezas</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Resolver" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>034-10</td>
                <td>1698</td>
                <td>1</td>
                <td>13632</td>
                <td>1</td>
                <td>No funciona (no prende)</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Resolver" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>056-12</td>
                <td>1467</td>
                <td>2</td>
                <td>10326</td>
                <td>2</td>
                <td>El producto se encuentra dañado de la parte superior izquierda</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Resolver"  onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>043-12</td>
                <td>1689</td>
                <td>1</td>
                <td>90123</td>
                <td>2</td>
                <td>El producto no incluye todas las piezas</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Resolver" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>034-10</td>
                <td>1698</td>
                <td>1</td>
                <td>13632</td>
                <td>1</td>
                <td>No funciona (no prende)</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Resolver" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
<div id="modalEditar" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span id="closeEditar" class="close">×</span>
            <div class="MainTitle">RMA</div>

        </div>

    </div>
    <br style="clear: both;" />
</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>
</html>