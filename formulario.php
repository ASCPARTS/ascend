<!DOCTYPE html>
<html lang="en">
<head>
    <style></style>
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <script src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/añadirFormulario.js"></script>
</head>
<body>
<div class="principal">
    <div style="font-size: 15pt; font-weight: bold; color:#1766A1; border-bottom: 1px #1766A1 solid; margin-bottom: 8px; ">Orden de Cotización</div>
    <table id="mitabla" style="width: 100%; height: auto" >
        <tr>
            <td><input type="text" placeholder="Numero de Cotización" class="buscar"></td>
            <td></td>
            <td></td>
            <td><input type="image" src="img/add.png" value="Mostrar" id="add" class="añadir" title="Agregar Cotización" >
            </td>
        </tr>
        <tr style="height: 15px"></tr>

        <tr>
            <td><input type="text" value="39723" class="proveedor"></td>
            <td><input type="text" value="3" class="proveedor"></td>
        </tr>
        <tr style="height: 15px"></tr>

        <tr>
            <td><input type="text" placeholder="Proveedor" class="proveedor"></td>
            <td><input type="date" placeholder="Fecha" class="fecha"></td>
            <td><input type="text" placeholder="Tiempo de Llegada" class="tiempo"></td>
            <td><input type="text" placeholder="Costo" class="costo"></td>

        </tr>
        <tr>
            <td><input type="text" placeholder="Precio 1" class="precio"></td>
            <td><input type="text" placeholder="Precio 2" class="precio"></td>
            <td><input type="text" placeholder="Precio 3" class="precio"></td>
            <td><input type="text" placeholder="Precio de Venta" class="precioVenta" ></td>


        </tr>

        <tr>
            <td colspan="4">
                <div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>
            </td>
        </tr>


    </table>

    <div class="responder">
        <input type="button" value="Responder" class="colorgreen">
    </div>
</body>
</html>