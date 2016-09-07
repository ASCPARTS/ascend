<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Programacion de pagos</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText searchGray">
                <input type="text">
                <label>Buscar</label>
            </div>
        </div>
    </div>
    <div class="ButtonContainer">
        <input type="button" value="Nuevo" onclick="getModal('nuevo','close')" class="btn btnOnlineGreen">
    </div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Clave de Pago</th>
                <th>Servicio</th>
                <th>Dia de Pago</th>
                <th>Cantidad a Pagar</th>
                <th>Tipo de Pago</th>
                <th>Acción</th>
                </thead>
                <tbody>
                <tr>
                    <td>23</td>
                    <td>CFE</td>
                    <td>3/mes/año</td>
                    <td>Varia</td>
                    <td>Fijo</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Pagar" onclick="getModal('pagar','cerrar')"></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Renta</td>
                    <td>1/mes/año</td>
                    <td>$10,000</td>
                    <td>Fijo</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Pagar" onclick="getModal('pagar','cerrar')"></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Renta Cd. Mexico</td>
                    <td>4/mes/año</td>
                    <td>$2,000</td>
                    <td>Fijo</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Pagar" onclick="getModal('pagar','cerrar')"></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Renta Monterrey</td>
                    <td>7/mes/año</td>
                    <td>$12,000</td>
                    <td>Fijo</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Pagar" onclick="getModal('pagar','cerrar')"></td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>Compra de inmobiliario</td>
                    <td>7/08/2016</td>
                    <td>$1,000</td>
                    <td>Variante</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Pagar" onclick="getModal('pagar','cerrar')"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="nuevo" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="close" class="close">×</span>
        <div class="MainTitle">Nuevo Pago</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divInputText billYellow">
                        <input type="text">
                        <label>Clave de pago</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divInputText referenceYellow">
                        <input type="text">
                        <label>servicio</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divInputDate  calendarYellow">
                        <input type="date">
                        <label>dia de pago</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>cantidad a pagar</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divSelect storeYellow">
                        <select>
                            <option>ASC Chile</option>
                            <option>ASC Cd.Mexico</option>
                            <option>ASC Miami</option>
                            <option>ASC Gdl</option>
                            <option>ASC Monterrey</option>
                        </select>
                        <label>sucursal</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
                    <div class="divSelect billYellow">
                        <select>
                            <option>Fijo</option>
                            <option>Variable</option>
                        </select>
                        <label>tipo de pago</label>
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
<div id="pagar" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span id="cerrar" class="close">×</span>
        <div class="MainTitle">Pago de Servicios</div>
        <div class="MainContainer">
            <div class="SubTitle">Datos del Servicio</div>
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>Saldo</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText storeYellow">
                        <input type="text">
                        <label>Banco</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText creditCardYellow">
                        <input type="text">
                        <label>Cuenta Bancaria</label>
                    </div>
                </div>

            </div>
            <div class="SubTitle">Datos de Pago ASC</div>
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText storeYellow">
                        <input type="text">
                        <label>Banco</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText creditCardYellow">
                        <input type="text">
                        <label>Cuenta</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText calculatorYellow">
                        <input type="text">
                        <label>Cantidad</label>
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