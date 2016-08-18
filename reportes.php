<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<script src="jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/reportes.js"></script>
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
<div class="principal">
    <div class="lineaDivisora">Reportes</div>
    <div>
        <input type="text" placeholder="Buscar Reporte" class="buscar">
    </div>
    <div class="reportes">
        <table align="center" >






            <tr style="background-color: white; border: 1px gray solid" ><td><div class="nombre"><label>&#9656;</label>Pedidos facturados por mes</div></td></tr>
            <tr><td>
                    <a id="nivel1">&#9656;Antigüedad de saldos</a>
                    <div id="nivel2" class="filtros">

                        Filtrar por:
                        <input type="text" placeholder="Cliente" class="buscar">
                        <input type="date" placeholder="Fecha" class="fecha">
                        <br><br>
                        <div >
                            <input type="button" value="Aceptar" onclick="location.href='infoCliente.phhp'" class="colorgreen" style="margin-left: 2%">
                            <input type="button" value="Cerrar" class="colorred">
                        </div>
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