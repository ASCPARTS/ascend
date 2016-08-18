<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <style>
        body {
            font-family: Arial;
            font-size: 10pt;
            background-color: #D8D8D8;
            margin: 0 0 0 0;
        }
        .principal{
            width: calc(100% - 10px);
            height: 100%;
            overflow-x: auto;
            overflow-y: auto;
            background-color: #F1F1F1;
            padding: 5px 5px 5px 5px; "
        }

    </style>
    <link rel="stylesheet" type="text/css" href="css/reportes.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">

</head>
<body>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>
        <p>Filtrar por:</p>
        <input type="text" placeholder="Cliente" class="buscar">
        <input type="date" placeholder="Fecha" class="fecha">
        <input type="text" placeholder="Saldo minimo" class="buscar">
        <input type="text" placeholder="Saldo maximo" class="buscar">
        <input type="text" placeholder="Zona" class="buscar">
        <input type="text" placeholder="Zona" class="buscar"><br><br>
        <div class="boton"><input type="button" value="Responder" class="colorgreen"></div>
    </div>
</div>


<div class="principal">
    <div class="lineaDivisora">Reportes</div>
    <div>
        <input type="text" placeholder="Buscar Reporte" class="buscar">
        <button id="myBtn">&#9656;Facturas por forma de pago</button>
    </div>
    <div class="reportes">
        <table align="center" >

            <tr style="background-color: white; border: 1px gray solid" ><td><div class="nombre"><label>&#9656;</label>Pedidos facturados por mes</div></td></tr>
            <tr><td><div class="nombre">&#9656;Antigüedad de saldos</div></td></tr>
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
   <script type="text/javascript" src="js/modal.js"></script>
</body>
</html>