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
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">Buscar</label>
            </div>
        </div>
    </div>
    <div class="row">
        <table>
            <tr>
                <td>Partida</td>
                <td>Número SKU</td>
                <td>Número de Parte</td>
                <td>Cantidad</td>
                <td>Precio Unitario</td>
                <td>Editar</td>
            </tr>
            <tr>
                <td>1</td>
                <td>76234</td>
                <td>678-NJ-09</td>
                <td>10</td>
                <td>$10.36</td>
                <td><input type="button" value="Editar"></td>
            </tr>
            <tr>
                <td>2</td>
                <td>09362</td>
                <td>823-PQ-98</td>
                <td>2</td>
                <td>$90.25</td>
                <td><input type="button" value="Editar"></td>
            </tr>
            <tr>
                <td>3</td>
                <td>63892</td>
                <td>106-SQ-89</td>
                <td>4</td>
                <td>$21.45</td>
                <td><input type="button" value="Editar"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">Almacen</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">Embarque</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">Paqueteria</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-3">
            <div class="divInputText">
                <input id="x" type="text">
                <label for="x">Sucursal</label>
            </div>
        </div>
    </div>

    <br style="clear: both;" />
</div>

</body>
</html>