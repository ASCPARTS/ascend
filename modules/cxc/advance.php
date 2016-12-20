<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Anticipos</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-2">
            <div class="divInputText searchGray">
                <input type="text">
                <label>Buscar</label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="ButtonContainer">
            <input type="button" class="btn btnOnlineGreen" value="Nuevo" onclick="getModal('nuevo','cerrar')">
        </div>
    </div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Numero de Cliente</th>
                <th>Folio de Deposito</th>
                <th>Monto del Deposito</th>
                <th>Fecha de Deposito</th>
                <th>Banco Destino</th>
                <th>Cuenta Destino</th>
                <th>Aplicado a</th>
                <th>Folio a Afectar</th>
                </thead>

                <tbody>
                <tr>
                    <td>23-907</td>
                    <td>67894</td>
                    <td>$1, 987.00</td>
                    <td>3/04/20016</td>
                    <td>Banamex</td>
                    <td>Cuenta Pesos</td>
                    <td>Factura</td>
                    <td>678145</td>
                </tr>
                <tr>
                    <td>23-907</td>
                    <td>67894</td>
                    <td>$1, 987.00</td>
                    <td>3/04/20016</td>
                    <td>Banamex</td>
                    <td>Cuenta Pesos</td>
                    <td>Factura</td>
                    <td>678145</td>
                </tr>
                <tr>
                    <td>23-907</td>
                    <td>67894</td>
                    <td>$1, 987.00</td>
                    <td>3/04/20016</td>
                    <td>Banamex</td>
                    <td>Cuenta Pesos</td>
                    <td>Factura</td>
                    <td>678145</td>
                </tr>
                <tr>
                    <td>23-907</td>
                    <td>67894</td>
                    <td>$1, 987.00</td>
                    <td>3/04/20016</td>
                    <td>Banamex</td>
                    <td>Cuenta Pesos</td>
                    <td>Factura</td>
                    <td>678145</td>
                </tr>
                <tr>
                    <td>23-907</td>
                    <td>67894</td>
                    <td>$1, 987.00</td>
                    <td>3/04/20016</td>
                    <td>Banamex</td>
                    <td>Cuenta Pesos</td>
                    <td>Factura</td>
                    <td>678145</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="nuevo" class="modal">
    <!-- Modal content -->
    <div id="getModal-header" class="modal-header">
        <div id="getModal-title" class="modal-title">Nuevo Anticipo</div>
        <div class="modal-close"><span class="close" onclick="$('#nuevo').hide();">&times;</span></div>
    </div>
    <div class="modal-content">
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText userYellow">
                        <input type="text">
                        <label>Número de Cliente</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText billYellow">
                        <input type="text">
                        <label>Número de deposito</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>Monto</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputDate calendarYellow">
                        <input type="date">
                        <label>fecha de deposito</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>cantidad</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText creditCardYellow">
                        <input type="text">
                        <label>Banco</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3 ">
                    <div class="divSelect referenceYellow">
                        <select>
                            <option>Saldo</option>
                            <option>Factura</option>
                        </select>
                        <label>Aplicar a</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
                    <div class="divInputText billGray">
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