<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="lib/jquery-3.1.0.min.js"></script>
    <style>
        body {
            font-family: Arial;
            font-size: 10pt;
            background-color: #D8D8D8;
            margin: 0 0 0 0;
        }

            input[type=button] {
            font-size: 12pt;
            padding: 3px 12px 3px 12px;
            outline: none;
            cursor: pointer;
            font-weight: normal;
            background-color: #D8D8D8;
            border-left: 0px #1E202C solid;
            border-top: 0px #1E202C solid;
            border-right: 0px #1E202C solid;
            border-bottom: 0px #1E202C solid;
            color: #1E202C;
        }

        input[type=button]:hover{
            background-color: #D2CFD8;
        }

        .colorblue {
            box-shadow: 0 4px 0 #00B8FE;
        }

        .colordarkblue {
            box-shadow: 0 4px 0 #1766A1;
        }

        .coloryellow {
            box-shadow: 0 4px 0 #FFC000;
        }

        .colorgreen {
            box-shadow: 0 4px 0 #55B844;
        }

        .colorred {
            box-shadow: 0 4px 0 #EB1414;
        }

        .colordarkgrey {
            box-shadow: 0 4px 0 #323544;
        }

        .tabMain{
            display: inline-block;
            width: 100%;
            vertical-align: top;
            margin-bottom: 2px;
            background-color: #323544;
            color: #F1F1F1;
            text-shadow: 0 1px 0 #00000;
        }

        .tabMain .labelContent {
            position: inherit;
            display: inline-block;
            width: calc(100% - 23px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
        }

        .tabMain .labelContentSelected {
            position: inherit;
            display: inline-block;
            width: calc(100% - 23px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
            background-color: #F1F1F1;
            color:#323544;
            font-weight: bold;
        }

        .tabMain .labelClose {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #323544;
        }

        .tabMain .labelClose:hover {
            color:#F1F1F1;
        }

        .tabMain .labelCloseSelected {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #F1F1F1;
            background-color: #F1F1F1;
        }

        .tabMain .labelCloseSelected:hover {
            color:#323544;
        }

        .altMenuLeft {
            cursor:pointer;
            display: block;
            height: 50px;
            width: 50px;
            float: left;
            border-right: 2px #D8D8D8 solid;
        }

        .altMenuRight {
            cursor:pointer;
            display: block;
            height: 50px;
            width: 50px;
            float: right;
            border-left: 2px #D8D8D8 solid;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/panelNotificaciones.css">
</head>
<body>
<table style="width: 100vw; height: 100vh; border: 0; border-spacing: 2px; border-collapse: separate;  ">
    <tbody>
        <tr style="height: 50px">
            <td colspan="3" style="background-color: #050409; padding: 0 0 0 0">
                <div class="altMenuLeft" style="background-image: url('img/logo_h_byn_128.png'); background-repeat: no-repeat; background-position: center center; width: 152px !important; "></div>
                <div class="altMenuLeft" onclick="openMenu();" style="background-image: url('menu32.png'); background-repeat: no-repeat; background-position: center center"></div>
                <div class="altMenuRight" style="width: 200px !important;"></div>
                <div class="altMenuRight"></div>
                <div class="altMenuRight"></div>
                <div class="altMenuRight"></div>
                <div class="altMenuRight"></div>
            </td>
        </tr>
        <tr style="calc(100% - 50px)">
            <td style="background-color: #00B8FE; padding: 0 0 0 0;" width="152">
                <div style="width: calc(100% - 4px); height: 100%; overflow-x: hidden; overflow-y: auto; padding: 2px 2px 2px 2px;">
                    <div class="tabMain" title="Diseño de Botones"><div class="labelContent"  >Diseño Botones</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Formularios"><div class="labelContent" ">Diseño Formulario</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Reportes"><div class="labelContent" ">Diseño Reportes</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Graficas"><div class="labelContentSelected">Diseño Graficas</div><div class="labelCloseSelected">&#10006</div></div>
                </div>
            </td>


            <td style="padding: 0 0 0 0" width="*">
                <div style="width: calc(100% - 10px); height: 100%; overflow-x: auto; overflow-y: auto; background-color: #F1F1F1; padding: 5px 5px 5px 5px;">
                    <div style="font-size: 15pt; font-weight: bold; color:#1766A1; border-bottom: 1px #1766A1 solid; margin-bottom: 8px; ">Diseño de Botones</div>
                    <input type="button" value="alguna acción" class="colorblue">
                    <br /><br />
                    <input type="button" value="alguna acción" class="coloryellow">
                    <br /><br />
                    <input type="button" value="alguna acción" class="colorgreen">
                    <br /><br />
                    <input type="button" value="alguna acción" class="colordarkblue">
                    <br /><br />
                    <input type="button" value="alguna acción" class="colorred">
                    <br /><br />
                    <input type="button" value="alguna acción" class="colordarkgrey">
                </div>
                </div>
            </td>



            <td style="background-color: #1766A1; padding: 0 0 0 0;" width="200">
                <div style=" width: calc(100% - 4px); height: 55%; overflow-x: hidden; overflow-y: auto; padding: 2px 2px 2px 2px;">
                    <div >
                        <div style="color: #d2cfd8; font-size: 14pt; width: 195px"><b>&nbsp;Mis Tareas<b></b></div>
                    </div>
                    <div style="margin: 5px 7px 5px 7px; ;height: 1px; background-color: #D8D8D8;"></div>
                    <div class="tabNot" >
                        <div class="labelPendientes" >Cotizar orden #7456 partida #4</div>
                    </div>
                    <div class="tabNot" >
                        <div class="labelPendientes" >Enviar factura #673456-B a Trafico </div>
                    </div>
                    <div class="tabNot" >
                        <div class="labelPendientes" >Calcular maximos y minimos</div>
                    </div>
                    <div class="tabNot" >
                        <div class="labelPendientes" >Descargar historial de Proveedor HP</div>
                    </div>
                    <div class="tabNot" >
                        <div class="labelPendientes" >Enviar reporte de evaluación de personal a Luis Quintero</div>
                    </div>
                </div>

                <div style=" width: calc(100% - 4px); height: 45%; overflow-x: hidden; overflow-y: auto; padding: 2px 2px 2px 2px;">
                    <label style="font-size: 10pt; color: #d2cfd8">&nbsp;&nbsp;Notificaciones</label>
                    <div style="margin: 5px 7px 5px 7px; ;height: 1px; background-color: #D8D8D8;"></div>
                    <div class="tabNot"  >
                        <div class="imagen"><img src="img/aldo.jpg" width="50px"></div>
                        <div class="labelContent">Aldo Araya libero un pedido</div>
                        <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">7:15a.m</div>
                    </div>
                    <div class="tabNot" >
                        <div class="imagen"><img src="img/rocio.jpg" width="50px"></div>
                        <div class="labelContent">Rocio Barcenas envio un pedido</div>
                        <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                    </div>
                    <div class="tabNot" >
                        <div class="imagen"><img src="img/ismael.jpg" width="50px"></div>
                        <div class="labelContent">Ismael Gomez envio cotización</div>
                        <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                    </div>
                    <div class="tabNot" >
                        <div class="imagen"><img src="img/francisco.jpg" width="50px"></div>
                        <div class="labelContent">Fco Torres recibio material</div>
                        <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<?php require_once 'inc/menu.php'; ?>
<script type="text/javascript" src="js/añadirFormulario.js"></script>
</body>
</html>