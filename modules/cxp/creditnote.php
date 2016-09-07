<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Notas de Credito</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText searchGray">
                <input type="text" id="x">
                <label for="x">Buscar </label>
            </div>
        </div>
        </div>
    <div class="ButtonContainer">
                <input type="button" value="Nueva" class="btn btnOnlineGreen" onclick="getModal('nueva','cerrar')">
    </div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Folio Nota de Credito</th>
                <th>Factura</th>
                <th>Número Proveedor</th>
                <th>Fecha</th>
                <th>Comprador</th>
                <th>Concepto</th>
                <th>Observaciones</th>
                <th>Saldo a Favor</th>
                </thead>
                <tbody>
                <tr>
                    <td>29858</td>
                    <td>294306</td>
                    <td>34-389</td>
                    <td>2/08/16</td>
                    <td>Zona Sur</td>
                    <td>Devolucion de MErcancia</td>
                    <td>Mercancia Dañada</td>
                    <td>$33.05</td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>294306</td>
                    <td>34-389</td>
                    <td>2/08/16</td>
                    <td>Zona Sur</td>
                    <td>Devolucion de Mercancia</td>
                    <td>Mercancia Dañada</td>
                    <td>$33.05</td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>294306</td>
                    <td>34-389</td>
                    <td>2/08/16</td>
                    <td>Zona Sur</td>
                    <td>Devolucion de MErcancia</td>
                    <td>Mercancia Dañada</td>
                    <td>$33.05</td>
                </tr>
                <tr>
                    <td>29858</td>
                    <td>294306</td>
                    <td>34-389</td>
                    <td>2/08/16</td>
                    <td>Zona Sur</td>
                    <td>Devolucion de MErcancia</td>
                    <td>Mercancia Dañada</td>
                    <td>$33.05</td>
                </tr>
                </tbody>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="nueva" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="cerrar" class="close">×</span>
        <div class="MainTitle">Nueva Nota de Credito</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-1">
                    <div class="divInputText providerYellow">
                        <input type="text" >
                        <label>Proveedor</label>
                    </div>
                </div>
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-1">
                    <div class="divSelect coinYellow">
                        <select>
                            <option>Dolares</option>
                            <option>Pesos</option>
                        </select>
                        <label>Moneda</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-1">
                    <div class="divSelect referenceYellow">
                        <select>
                            <option>concepto 1</option>
                            <option>concepto 2</option>
                            <option>concepto 3</option>
                        </select>
                        <label>Concepto</label>
                    </div>
                </div>
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-1">
                    <div class="divInputText referenceYellow">
                        <input type="text" >
                        <label>Detalle de concepto</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-1 col-md-1-1 col-sm-1-1">
                    <div class="divInputTextArea">
                        <label>Otro Concepto</label>
                        <textarea></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-lg-offset-3-4 col-md-offset-3-4">
                    <div class="divInputText moneyYellow">
                        <input type="text">
                        <label>Sub-total</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-lg-offset-3-4 col-md-offset-3-4">
                    <div class="divInputText taxYellow">
                        <input type="text">
                        <label>iva</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-lg-offset-3-4 col-md-offset-3-4">
                    <div class="divInputText moneyYellow">
                        <input type="text">
                        <label>Saldo a favor</label>
                    </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" value="Crear" class="btn btnOnlineGreen">
            </div>
            <br style="clear: both;" />
    </div>

</div>
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>