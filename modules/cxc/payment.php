<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Cobros</div>
<div class="MainContainer">
<div class="row">
    <div class="col-lg-1-4 col-md-1-4 col-sm-1-2">
        <div class="divInputText">
            <input type="text">
            <label>Buscar</label>
        </div>
    </div>

</div>
<div class="ButtonContainer">
        <input type="button" value="Nuevo" class="btn btnOnlineGreen" onclick="getModal('nuevo','close')">
    </div>
<div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Número de Cliente</th>
                <th>Nombre de Cliente</th>
                <th>Número de Factura</th>
                <th>Fecha Vencimiento</th>
                <th>Total Factura</th>
                <th>Saldo</th>
                <th>Acción</th>
                </thead>
                <tbody>
                <tr>
                    <td>29858</td>
                    <td>Maria Garcia</td>
                    <td>343389</td>
                    <td>2/08/16</td>
                    <td>$3, 000.00</td>
                    <td>$1, 800.00</td>
                    <td><input type="button" value="Abonar" onclick="getModal('cobro','cerrar')" class="btn btnOnlineGreen"></td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>Gonzalo Morales</td>
                    <td>342389</td>
                    <td>2/08/16</td>
                    <td>$1, 800.00</td>
                    <td>$500.34</td>
                    <td><input type="button" value="Abonar" onclick="getModal('cobro','cerrar')" class="btn btnOnlineGreen"></td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>Fernando Carrillo</td>
                    <td>344389</td>
                    <td>2/08/16</td>
                    <td>$4, 290.80</td>
                    <td>$67.90</td>
                    <td><input type="button" value="Abonar" onclick="getModal('cobro','cerrar')" class="btn btnOnlineGreen"></td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>294306</td>
                    <td>34-389</td>
                    <td>2/08/16</td>
                    <td>$1, 700.67</td>
                    <td>$23.89</td>
                    <td><input type="button" value="Abonar" onclick="getModal('cobro','cerrar')" class="btn btnOnlineGreen"></td>
                </tr>
                </tbody>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="nuevo" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="close" class="close">×</span>
        <div class="MainTitle">Nuevo Cobro</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Número de Cliente</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Número de Factura</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputDate">
                        <input type="date">
                        <label>Fecha Vencimiento</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Total Factura</label>
                    </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" value="Aceptar" class="btn btnOnlineGreen">
            </div>
            <br style="clear: both;" />
        </div>
    </div>
</div>
<div id="cobro" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="cerrar" class="close">×</span>
        <div class="MainTitle">Abono a Cobro</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText">
                        <input type="text">
                        <label>Saldo</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText">
                        <input type="text">
                        <label>Abono</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputDate">
                        <input type="date">
                        <label>Fecha</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText">
                        <input type="text">
                        <label>Tipo de Comprobante</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText">
                        <input type="text">
                        <label>Folio comprobante</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText">
                        <input type="text">
                        <label>Nuevo Saldo</label>
                    </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" class="btn btnOnlineGreen" value="Aplicar">
            </div>
            <br style="clear: both;" />
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>