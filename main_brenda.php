<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>

        body {
            font-family: Arial;
            font-size: 10pt;
            background-color: #D8D8D8;
            margin: 0 0 0 0;
        }

        input[type=text]{
            width: 150px;
            font-size: 12pt;
            background-color: white;
            border: 1px gray solid;
            outline: none;
            color: #1E202C;
            padding: 3px 5px 3px 31px;
           /* background-image: url('pixel_1E202C.png'), url('input_img.png');*/
            background-repeat: repeat-y, no-repeat;
            background-position: 26px, 0;
        }
        input[type=text].proveedor{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/user.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;

        }
        input[type=date].fecha{
            width: 150px;
            font-size: 9pt;
            background-color: white;
            border: 1px gray solid;
            outline: none;
            color: gray;
            padding: 3px 5px 3px 31px;
            background-image: url('pixel_1E202C.png'), url('imagenes/calendar.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;

        }
        input[type=text].precio{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/dollar-symbol.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 26px, 2px;
            margin: 3px 3px 3px 3px;
        }
        input[type=text].costo{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/price-tag (1).png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;
        }
        input[type=text].precioVenta{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/price-tag (2).png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;
        }
        input[type=text].tiempo{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/time.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;
        }
        input[type=text].buscar{
            margin: 3px 3px 3px 3px;
            background-image: url('pixel_1E202C.png'), url('imagenes/search.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 20px, 2px;
            margin: 3px 3px 3px 3px;

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
        .tabNot{
            display: inline-block;
            height: 52px;
            width: 185px;
            vertical-align: top;
            margin: 4px 3px 3px 5px;
            text-shadow: 0 1px 0 #00000;
            color: #f1f1f1;
            border: 1px solid #d2cfd8;
        }
        .tabNot .imagen{
            float: left;
            width: 50px;
            height: 50px;
            margin: 0 3px 0 0;
            border: 1px #d2cfd8 solid;
        }
        .tabNot .labelContent {
            position: inherit;
            display: inline-block;
            width: calc(100% - 73px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
            font-size: 9pt;
            font-weight: bold;
        }
        .tabNot .labelPendientes {
            height: auto;
            width: calc(100% - 33px);
            padding: 4px 2px 4px 2px;
            cursor: pointer;
            font-size: 9pt;
        }
        .tabNot .labelContentSelected {
            position: inherit;
            display: inline-block;
            width: calc(100% - 23px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
            background-color: #1766A1;
            color:#F1F1F1;
        }
        .tabNot .labelClose {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #1766A1;
        }
        .labelCloseFormulario {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #323544;
        }

        }
        .tabNot:hover {
            background-color: #f1f1f1;
            color:#1766A1;
        }
        .responder{
            margin-top: 3%;
            width: 110px;
            margin-left: 84.5%;

        }
    </style>

    <script src="jquery-3.1.0.min.js"></script>
    <script>
        $(document).ready(function(){

            $("#add").click(function() {

                /* Opción 1 */
                var n = $('tr:last td', $("#mitabla")).length;

                for(var i = 0; i <n; i++){

                    var tds = '<tr>';
                    tds += '<td><input type="text" placeholder="Proveedor" class="proveedor"></td>';
                    tds += '<td><input type="date" placeholder="Fecha" class="fecha"></td>';
                    tds += '<td><input type="text" placeholder="Tiempo de Llegada" class="tiempo"></td>';
                    tds += '<td><input type="text" placeholder="Costo" class="costo"></td>';
                    tds += '</tr>';

                    tds += '<tr>';
                    tds += '<td><input type="text" placeholder="Precio 1" class="precio"></td>';
                    tds += '<td><input type="text" placeholder="Precio 2" class="precio"></td>';
                    tds += '<td><input type="text" placeholder="Precio 3" class="precio"></td>';
                    tds += '<td><input type="text" placeholder="Precio de Venta" class="precioVenta" ></td>';
                    tds +='<td><div class="labelCloseFormulario" onclick="myFunction()">&#10006</div></div></td>';
                    tds += '</tr>';
                    tds += '<tr>';
                    tds += '<td colspan="4">';
                    tds +='<div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>';
                    tds += '<td>';
                    tds +='</tr>';


                }

                $("#mitabla").append(tds);
            });
        });
    </script>
</head>
<body>
<table style="width: 100vw; height: 100vh; border: 0; border-spacing: 2px; border-collapse: separate;  ">
    <tbody>
    <tr style="height: 50px">
        <td colspan="3" style="background-color: #050409; padding: 0 0 0 0">
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
                <div class="tabMain" title="Nueva orden de compra"><label class="labelContent">Nueva orden...</label><label class="labelClose">&#10006</label></div>
                <div class="tabMain" title="Registrar numero guia"><div class="labelContent">Registrar número...</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Responder Cotización"><div class="labelContent">Responder cot...</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContentSelected">Organización</div><div class="labelCloseSelected">&#10006</div></div>
                <div class="tabMain" title="Reporte de Datos de Entrada"><div class="labelContent">Reporte datos..</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="OReporte de pedidos pendientes"><div class="labelContent">Reporte pedidos...</div><div class="labelClose">&#10006</div></div>
            </div>
        </td>
        <td style="padding: 0 0 0 0; " width="*">
            <div style="width: calc(100% - 10px); height: 100%; overflow-x: auto; overflow-y: auto; background-color: #F1F1F1; padding: 5px 5px 5px 5px; ">
                <div style="font-size: 15pt; font-weight: bold; color:#1766A1; border-bottom: 1px #1766A1 solid; margin-bottom: 8px; ">Orden de Cotización</div>
                <table id="mitabla" style="width: 100%; height: auto" >
                     <tr>
                         <td><input type="text" placeholder="Numero de Cotización" class="buscar"></td>
                         <td></td>
                         <td></td>
                         <td><input type="image" src="imagenes/add.png" value="Mostrar" id="add"  style="margin-left: 61%" width="50px" title="Agregar Cotización" >
                         </td>
                     </tr>
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
                    <div class="imagen"><img src="imagenes/aldo.jpg" width="50px"></div>
                    <div class="labelContent">Aldo Araya libero un pedido</div>
                    <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">7:15a.m</div>
                </div>
                <div class="tabNot" >
                    <div class="imagen"><img src="imagenes/rocio.jpg" width="50px"></div>
                    <div class="labelContent">Rocio Barcenas envio un pedido</div>
                    <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                </div>
                <div class="tabNot" >
                    <div class="imagen"><img src="imagenes/ismael.jpg" width="50px"></div>
                    <div class="labelContent">Ismael Gomez envio cotización</div>
                    <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                </div>
                <div class="tabNot" >
                    <div class="imagen"><img src="imagenes/francisco.jpg" width="50px"></div>
                    <div class="labelContent">Fco Torres recibio material</div>
                    <div style=" width: 55px; height: 15px; margin-left: 135px; font-size: 8pt">10:48a.m</div>
                </div>
            </div>
        </td>
    </tr>

    </tbody>
</table>

<div id="divMenuMain" style="position: fixed; top: 0; bottom: 0; left: 0; right: 0; display: none; ">
    <table style="width: 100%; height: 100%; border-spacing: 0; border-collapse: collapse;" >
        <tr>
            <td width="300" style="background-color: #D8D8D8">Menu<br />Menu<br />Menu<br />Menu<br />Menu<br /></td>
            <td width="*" style="background-color: rgba(0,0,0,.7)" onclick="closeMenu();">$nbsp;</td>
        </tr>
    </table>
</div>

<script>
    function openMenu(){
        $('#divMenuMain').fadeIn('fast');
    }

    function closeMenu() {
        $('#divMenuMain').fadeOut('fast');
    }
</script>

</body>
</html>