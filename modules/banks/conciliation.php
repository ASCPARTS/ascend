<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Conciliacion Mensual</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
            <div class="divInputDate">
                <input type="date">
                <label>Fecha Inicio</label>
            </div>
        </div>
        <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
            <div class="divInputDate">
                <input type="date">
                <label>Fecha Fin</label>
            </div>
        </div>
        <div class="col-lg-1-3 col-md-1-3 col-sm-1-3">
            <div class="divSelect">
                <select>
                    <option>Banamex USD</option>
                    <option>Banamex Pesos</option>
                    <option>BBVA USD</option>
                    <option>BBVA Pesos</option>
                </select>
                <label>Banco</label>
            </div>
        </div>

    </div>
    <div class="SubTitle">Movimientos a Conciliar</div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Conciliar</th>
                <th>Tipo de Movimiento</th>
                <th>Fecha</th>
                <th>Banco</th>
                <th>Cuenta</th>
                <th>Monto</th>
                <th>Descripcion</th>
                </thead>
                <tbody>
                <tr>
                <td><input type="checkbox"></td>
                <td>Trasferencia</td>
                <td>2/08/2016</td>
                <td>Banamex USD</td>
                <td>1278945234</td>
                <td>$456.78</td>
                <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Trasferencia</td>
                    <td>2/08/2016</td>
                    <td>Banamex USD</td>
                    <td>1278945234</td>
                    <td>$456.78</td>
                    <td>Pago de inmobiliario a Muebles Torres Factura #56897</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ButtonContainer">
        <input type="button" class="btn btnOnlineGreen" value="Conciliar">
    </div>
    <br style="clear: both;" />
</div>
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>