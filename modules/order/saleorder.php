<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Orden de Venta</div>
<div class="MainContainer">
    <div class="SubTitle">nueva orden de venta</div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText searchGray">
                <input id="x" type="text">
                <label for="x">Buscar folio de cotizacion</label>
            </div>
        </div>
        <div class="ButtonContainer">
            <input type="button" class="btnOnlineGreen btn" value="Agregar Partida">
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
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>76234</td>
                <td>678-NJ-09</td>
                <td>10</td>
                <td>$10.36</td>
                <td><input type="button" value="Editar" class="btnOverYellow btn"></td>
            </tr>
            <tr>
                <td>2</td>
                <td>09362</td>
                <td>823-PQ-98</td>
                <td>2</td>
                <td>$90.25</td>
                <td><input type="button" value="Editar" class="btnOverYellow btn"></td>
            </tr>
            <tr>
                <td>3</td>
                <td>63892</td>
                <td>106-SQ-89</td>
                <td>4</td>
                <td>$21.45</td>
                <td><input type="button" value="Editar" class="btnOverYellow btn"></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText boxYellow">
                <input id="x" type="text">
                <label for="x">Almacen</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText shipmentYellow">
                <input id="x" type="text">
                <label for="x">Embarque</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText packageYellow">
                <input id="x" type="text">
                <label for="x">Paqueteria</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText storeYellow">
                <input id="x" type="text">
                <label for="x">Sucursal</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText creditCardYellow">
                <input id="x" type="text">
                <label for="x">Metodo de pago</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText referenceGray">
                <input id="x" type="text">
                <label for="x">concepto</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText coinYellow">
                <input id="x" type="text">
                <label for="x">Tipo de cambio</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText directionYellow">
                <input id="x" type="text">
                <label for="x">domicilio de envio</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1-2 col-md-offset-1-2 col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText discountGray">
                <input id="x" type="text">
                <label for="x">Descuento</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText moneyYellow">
                <input id="x" type="text">
                <label for="x">Sub-total</label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-offset-2-4 col-md-offset-2-4 col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText taxYellow">
                <input id="x" type="text">
                <label for="x">iva</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText divYellow moneyGray">
                <input id="x" type="text">
                <label for="x">gran total</label>
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