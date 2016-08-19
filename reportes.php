<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<script src="jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/reportes.js"></script>
<head>
    <style></style>
    <link rel="stylesheet" type="text/css" href="css/reportes.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">

</head>

<body>
<div class="principal">
    <div class="lineaDivisora">Reportes</div>
    <div>
        <input type="text" placeholder="Buscar Reporte" class="buscar" align="center">
    </div>
    <div class="reportes">
        <table align="center" >






            <tr style=" border: 1px gray solid" ><td><div class="nombre"><label>&#9656;</label>Pedidos facturados por mes</div></td></tr>
            <tr><td>
                    <a id="nivel1" class="nombre">&#9656;Ficha de Seguimiento de Clientes</a>
                    <div id="nivel2" class="filtros">

                        Filtrar por:
                        <input type="text" placeholder="Cliente" class="buscar">
                        <input type="date" placeholder="Fecha" class="fecha">
                        <br><br>
                            <input type="button" value="Aceptar" onclick="location.href='infoCliente.php'" class="colorgreen" style="margin-left: 10%"  >
                        <br>
                    </div>
             </td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Días Cartera</div></td></tr>
            <tr><td><div class="nombre" id="myBtn"><label>&#9656;</label>Estado de Cuenta de Cliente</div></td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Aplicación de anticipos detallados</div></td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Aplicación de cobro detallado</div></td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Factura diaria por serie y número de pago</div></td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Notas de crédito por aplicación detallada</div></td></tr>
            <tr><td><div class="nombre"><label>&#9656;</label>Catálogo de clientes con vencimiento de pagaré</div></td></tr>
        </table>
    </div>
    </div>
</body>
</html>