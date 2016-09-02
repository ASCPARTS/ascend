<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Anticipos</div>
<div class="MainContainer">
    <div class="row">
        <div class="ButtonContainer">
            <input type="button" class="btn btnOnlineGreen" value="Nuevo" onclick="getModal('nuevo','cerrar')">
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
                <div class="col-lg-1-5 col-md-1-5 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Número de Cliente</label>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-1-5 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Número de deposito</label>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-1-5 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>Monto</label>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-1-5 col-sm-1-3">
                    <div class="divInputDate">
                        <input type="date">
                        <label>fecha de deposito</label>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-1-5 col-sm-1-3">
                    <div class="divInputText">
                        <input type="text">
                        <label>cantidad</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 col-lg-offset-2-4 col-md-offset-2-4">
                    <div class="divSelect">
                    <select>
                        <option>Saldo</option>
                        <option>Factura</option>
                    </select>
                    <label>Aplicar a</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText">
                    <input type="text">
                    <label>Numero de Factura</label>
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
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>