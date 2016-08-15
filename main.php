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
            font-size: 12pt;
            background-color: #F1F1F1;
            border: 1px #1E202C solid;
            outline: none;
            color: #1E202C;
            padding: 3px 5px 3px 31px;
            background-image: url('pixel_1E202C.png'), url('input_img.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 26px, 0;
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
        .tabNot:hover {
            background-color: #f1f1f1;
            color:#1766A1;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
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
                    <div class="tabMain" title="Diseño de Botones"><div class="labelContent">Diseño Botones</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Formularios"><div class="labelContent">Diseño Formulario</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Reportes"><div class="labelContent">Diseño Reportes</div><div class="labelClose">&#10006</div></div>
                    <div class="tabMain" title="Diseño de Graficas"><div class="labelContentSelected">Diseño Graficas</div><div class="labelCloseSelected">&#10006</div></div>
                </div>
            </td>
            <td style="padding: 0 0 0 0" width="*">
                <div style="width: calc(100% - 10px); height: 100%; overflow-x: auto; overflow-y: auto; background-color: #F1F1F1; padding: 5px 5px 5px 5px; ">
                    <div style="font-size: 15pt; font-weight: bold; color:#1766A1; border-bottom: 1px #1766A1 solid; margin-bottom: 8px; ">Catálogo de Productos</div>
                    <input type="text" placeholder="valor">
                    <br />
                    <div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>
                    <br /><br />
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

<div id="divMenuMain">
    <table id="tblMenu" >
        <tr>
            <td id="tdMenu">
                <div id="divMenuHeader"></div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('1')">Catálogos</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_1">
                        <div class="divMenuOption">Clientes</div>
                        <div class="divMenuOption">Proveedores</div>
                        <div class="divMenuOption">Productos</div>
                        <div class="divMenuOption">Bancos</div>
                        <div class="divMenuOption">Almacenes</div>
                        <div class="divMenuOption">Aduanas</div>
                        <div class="divMenuOption">Impuestos</div>
                        <div class="divMenuOption">Familias</div>
                        <div class="divMenuOption">Marcas</div>
                        <div class="divMenuOption">Modelos</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('2')">Administración</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_2">
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_1')">Bancos</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_1">
                                <div class="divMenuOption">Bancos</div>
                                <div class="divMenuOption">Retiros</div>
                                <div class="divMenuOption">Cheques</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                                <div class="divMenuOption">Conciliación Bancaria</div>
                            </div>
                        </div>
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_2')">CXC</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_2">
                                <div class="divMenuOption">Notas de Crédito</div>
                                <div class="divMenuOption">Cobros</div>
                                <div class="divMenuOption">Anticipos</div>
                                <div class="divMenuOption">Aplicación de Anticipos</div>
                                <div class="divMenuOption">Facturas</div>
                                <div class="divMenuOption">Pedidos</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                            </div>
                        </div>
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_3')">CXP</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_3">
                                <div class="divMenuOption">Notas de Cargo</div>
                                <div class="divMenuOption">Pagos</div>
                                <div class="divMenuOption">Anticipos</div>
                                <div class="divMenuOption">Aplicación de Anticipos</div>
                                <div class="divMenuOption">Programación de Pagos</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                            </div>
                        </div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('3')">Ventas</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_3">
                        <div class="divMenuOption">Cotizar Producto</div>
                        <div class="divMenuOption">Realizar Pedido</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('4')">Compras</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_4">
                        <div class="divMenuOption">Responder</div>
                        <div class="divMenuOption">Elaborar Orden</div>
                        <div class="divMenuOption">Registrar</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('5')">Tráfico</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_5">
                        <div class="divMenuOption">Recepción de Productos</div>
                        <div class="divMenuOption">Pagos y Pedimentos</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('6')">Almacén</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_6">
                        <div class="divMenuOption">Recepción de Productos</div>
                        <div class="divMenuOption">Organización de Productos</div>
                        <div class="divMenuOption">Surtido de Pedidos</div>
                        <div class="divMenuOption">Facturar</div>
                        <div class="divMenuOption">Traspaso de Productos</div>
                        <div class="divMenuOption">Producción</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('7')">Garantías</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_7">
                        <div class="divMenuOption">RMA Cliente</div>
                        <div class="divMenuOption">RMA Proveedor</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('8')">Maketing</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_8">
                        <div class="divMenuOption">Opción 1</div>
                        <div class="divMenuOption">Opción 2</div>
                        <div class="divMenuOption">Opción 3</div>
                    </div>
                </div>
            </td>
            <td id="tdMenuClear" onclick="closeMenu();">$nbsp;</td>
        </tr>
    </table>
</div>
<script src="lib/jquery-3.1.0.min.js"></script>
<script>
    $arrMenu = {
        'Categories':Array('1','2','3','4','5','6','7','8'),
        '1':Array(),
        '2':Array('2_1','2_2','2_3'),
        '3':Array(),
        '4':Array(),
        '5':Array(),
        '6':Array(),
        '7':Array(),
        '8':Array()
    };
</script>
<script src="js/menu.js"></script>
</body>
</html>