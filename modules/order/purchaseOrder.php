<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Orden de Compra</div>
<div class="MainContainer">
    <div class="SubTitle">generar orden de compra</div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText">
                <input type="text" id="x">
                <label for="x">Buscar folio de pedido</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>Partida</th>
                    <th>Número SKU</th>
                    <th>Número de Parte</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>76234</td>
                    <td>678-NJ-09</td>
                    <td>10</td>
                    <td>$10.36</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>09362</td>
                    <td>823-PQ-98</td>
                    <td>2</td>
                    <td>$90.25</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>63892</td>
                    <td>106-SQ-89</td>
                    <td>4</td>
                    <td>$21.45</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">numero de Proveedor</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">condicion de pago</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">almacen</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">medio de embarque</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">precio de compra</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputDate">
                <input id="x" type="date">
                <label for="x">fecha compromiso</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">no. back order</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">terminos de envio</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1-2 col-md-offset-1-2 col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">importe</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">impuestos</label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-offset-1-2 col-md-offset-1-2 col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">%impuestos</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">total</label>
            </div>
        </div>

    </div>
    <div class="SubTitle">Facturacion y embarque</div>
    <div class="row">
        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                    <tr>
                        <th>Facturar A:</th>
                        <th>Embarcar A:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Chile</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Chile</label>
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Argentina</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Argentina</label>
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Peru</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Peru</label>
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Cd. MExico</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC cd. mexico</label>
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC Monterrey</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC monterrey</label>
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC guadalajara</label>
                                </div>
                            </div></td>
                        <td><div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputCheck">
                                    <input type="checkbox" id="che">
                                    <label for="che">ASC guadalajara</label>
                                </div>
                            </div></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1-1 col-md-1-1 col-sm-1-1">
            <div class="divInputTextArea">
                <label for="textarea2">comentarios</label>
                <textarea id="textarea2"></textarea>
            </div>
        </div>
    </div>
    <div class="ButtonContainer">
        <input type="button" class="btnOnlineGreen btn" value="Aceptar">
        <input type="button" class="btnBrandRed btn" value="Cancelar">
    </div>


    <br style="clear: both;" />

</div>
</body>
</html>