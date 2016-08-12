<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>:: AscenD ::</title>
    <script src="jquery-3.1.0.min.js"></script>
    <style>
        body {
            font-family: Arial;
            font-size: 9pt;
            background-color: #F1F1F1;
            margin: 0 0 0 0;
        }

        .headerbar {
            height: 50px;
            line-height: 50px;
            background-color: #1766A1;
            text-align: left;
            font-size: 11pt;
            color: #F1F1F1;
            font-weight: bold;
            width: 100%;
            text-shadow: 0 1px 0 #03528D;
        }

        #menuBackGround {
            background-color: rgba(0,0,0,.7);
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
        }

        #menuMainContainer {
            text-align: center;
            padding: 0 10px 10px 10px;
            border: 1px #EAEAEA solid;
            box-shadow: 0 1px 0 #000000;
            background-color: #F1F1F1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto auto auto auto;
            position: absolute;
            height: calc(100% - 100px);
            width: 930px;
            vertical-align: top;
            display: none;
        }

        #menuClose {
            text-align: right;
            padding: 0 0 0 0;
            margin: 0 0 0 0;
        }

        #menuLabelClose {
            cursor: pointer;
            font-size: 14pt;
            color: #FF2828;
            text-shadow: 0 1px 0 #EB1414;
        }

        .menuNormal{
            background-color: #323544;
            width: 100px;
            height: 100px;
            border-radius: 50px;
            line-height: 100px;
            color: #F1F1F1;
            font-size: 9pt;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin: 0 5px 0 5px;
            vertical-align: top;
            border: 0;
        }

        .menuNormal:hover {
            background-color: #1766A1;
        }

        .menuSelected{
            background-color: #1766A1;
            width: 120px;
            height: 120px;
            border-radius: 60px;
            line-height: 120px;
            color: #F1F1F1;
            font-size: 11pt;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin: 0 5px 0 5px;
        }

        .menuGroupLevel1{
            background-color: #1766A1;
            top:-5px;
            position: relative;
            display:none;
            padding: 15px 15px 15px 15px;
            border-radius: 50px;
        }

        .menuNormalLevel1{
            background-color: #323544;
            width: 100px;
            height: 100px;
            border-radius: 50px;
            line-height: 100px;
            color: #F1F1F1;
            font-size: 9pt;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin: 0 5px 10px 5px;
            vertical-align: top;
        }

        .menuNormalLevel1:hover {
            background-color: #F1F1F1;
            color:#323544;
        }

        .menuSelected1{
            background-color: #F1F1F1;
            width: 120px;
            height: 120px;
            border-radius: 60px;
            line-height: 120px;
            color: #323544;
            font-size: 11pt;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin: 0 5px 0 5px;
        }

        .menuGroupLevel2{
            background-color: #F1F1F1;
            top:-8px;
            position: relative;
            display:none;
            padding: 15px 0 15px 0;
            border-radius: 50px;
        }

        .menuNormalLevel2{
            background-color: #6285AD;
            width: 100px;
            height: 100px;
            border-radius: 50px;
            line-height: 100px;
            color: #F1F1F1;
            font-size: 9pt;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin: 0 5px 10px 5px;
            vertical-align: top;
        }

        .menuNormalLevel2:hover {
            background-color: #323544;
        }

    </style>


</head>
<body>
<div class="headerbar">
    AscenD By ASC Parts <label style="font-size: 16pt; font-weight: bold; cursor: pointer;" onclick="loadMenu();">&#8801;</label>
</div>

<div id="menuBackGround">
    <div id="menuMainContainer">
        <div id="menuClose"><label id="menuLabelClose" onclick="closeMenu();">&#10006</label></div>
        <div id="divMenu_1" class="menuNormal" onclick="selectMenu(1)">Catálogos</div>
        <div id="divMenu_2" class="menuNormal" onclick="selectMenu(2)">Ventas</div>
        <div id="divMenu_3" class="menuNormal" onclick="selectMenu(3)">Compras</div>
        <div id="divMenu_4" class="menuNormal" onclick="selectMenu(4)">Tráfico</div>
        <div id="divMenu_5" class="menuNormal" onclick="selectMenu(5)">Administración</div>
        <div id="divMenu_6" class="menuNormal" onclick="selectMenu(6)">Almacén</div>
        <div id="divMenu_7" class="menuNormal" onclick="selectMenu(7)">Garantías</div>
        <div id="divMenu_8" class="menuNormal" onclick="selectMenu(8)">Marketing</div>
        <div id="divMenuGroup_1" class="menuGroupLevel1">
            <div id="divMenu_1_1" class="menuNormalLevel1" onclick="closeMenu();">Clientes</div>
            <div id="divMenu_1_2" class="menuNormalLevel1" onclick="closeMenu();">Preveedores</div>
            <div id="divMenu_1_3" class="menuNormalLevel1" onclick="closeMenu();">Productos</div>
            <div id="divMenu_1_4" class="menuNormalLevel1" onclick="closeMenu();">Bancos</div>
            <div id="divMenu_1_5" class="menuNormalLevel1" onclick="closeMenu();">Almaces</div>
            <div id="divMenu_1_6" class="menuNormalLevel1" onclick="closeMenu();">Aduanas</div>
            <div id="divMenu_1_7" class="menuNormalLevel1" onclick="closeMenu();">Impuestos</div>
            <div id="divMenu_1_8" class="menuNormalLevel1" onclick="closeMenu();">Familias</div>
            <div id="divMenu_1_9" class="menuNormalLevel1" onclick="closeMenu();">Marcas</div>
            <div id="divMenu_1_10" class="menuNormalLevel1" onclick="closeMenu();">Modelos</div>
        </div>
        <div id="divMenuGroup_2" class="menuGroupLevel1">
            <div id="divMenu_2_1" class="menuNormalLevel1" onclick="closeMenu();">Cotizar Producto</div>
            <div id="divMenu_2_2" class="menuNormalLevel1" onclick="closeMenu();">Realizar Pedido</div>
            <div id="divMenu_2_3" class="menuNormalLevel1" onclick="closeMenu();">Reportes</div>
        </div>
        <div id="divMenuGroup_3" class="menuGroupLevel1">
            <div id="divMenu_3_1" class="menuNormalLevel1" onclick="closeMenu();">Responder Cotizaciones</div>
            <div id="divMenu_3_2" class="menuNormalLevel1" onclick="closeMenu();">Elaborar Orden de Compra</div>
            <div id="divMenu_3_3" class="menuNormalLevel1" onclick="closeMenu();">Registrar numero guia</div>
            <div id="divMenu_3_4" class="menuNormalLevel1" onclick="closeMenu();">Reportes</div>
        </div>
        <div id="divMenuGroup_4" class="menuGroupLevel1">
            <div id="divMenu_4_1" class="menuNormalLevel1" onclick="closeMenu();">Recepcion de Productos</div>
            <div id="divMenu_4_2" class="menuNormalLevel1" onclick="closeMenu();">Pagos y Pedimentos</div>
        </div>
        <div id="divMenuGroup_5" class="menuGroupLevel1">
            <div id="divMenu_5_1" class="menuNormalLevel1" onclick="selectMenu1('5_1');">Bancos</div>
            <div id="divMenu_5_2" class="menuNormalLevel1" onclick="selectMenu1('5_2');">CXC</div>
            <div id="divMenu_5_3" class="menuNormalLevel1" onclick="selectMenu1('5_3');">CXP</div>
            <div id="divMenu_5_4" class="menuNormalLevel1" onclick="closeMenu();">Reportes</div>
            <div id="divMenuGroup_5_1" class="menuGroupLevel2">
                <div id="divMenu_5_1_1" class="menuNormalLevel2" onclick="closeMenu();">Depositos</div>
                <div id="divMenu_5_1_2" class="menuNormalLevel2" onclick="closeMenu();">Retiro</div>
                <div id="divMenu_5_1_3" class="menuNormalLevel2" onclick="closeMenu();">Cheques</div>
                <div id="divMenu_5_1_4" class="menuNormalLevel2" onclick="closeMenu();">Estados de Cuenta</div>
                <div id="divMenu_5_1_5" class="menuNormalLevel2" onclick="closeMenu();">Cierre Mensual</div>
                <div id="divMenu_5_1_6" class="menuNormalLevel2" onclick="closeMenu();">Conciliación Bancaria</div>
            </div>
            <div id="divMenuGroup_5_2" class="menuGroupLevel2">
                <div id="divMenu_5_2_1" class="menuNormalLevel2" onclick="closeMenu();">Notas de Credito</div>
                <div id="divMenu_5_2_2" class="menuNormalLevel2" onclick="closeMenu();">Cobros</div>
                <div id="divMenu_5_2_3" class="menuNormalLevel2" onclick="closeMenu();">Anticipos</div>
                <div id="divMenu_5_2_4" class="menuNormalLevel2" onclick="closeMenu();">Aplicación de Anticipos</div>
                <div id="divMenu_5_2_5" class="menuNormalLevel2" onclick="closeMenu();">Facturas</div>
                <div id="divMenu_5_2_6" class="menuNormalLevel2" onclick="closeMenu();">Pedidos</div>
                <div id="divMenu_5_2_7" class="menuNormalLevel2" onclick="closeMenu();">Cierre Mensual</div>
                <div id="divMenu_5_2_8" class="menuNormalLevel2" onclick="closeMenu();">Estados de Cuenta</div>
            </div>
            <div id="divMenuGroup_5_3" class="menuGroupLevel2">
                <div id="divMenu_5_3_1" class="menuNormalLevel2" onclick="closeMenu();">Notas de Credito</div>
                <div id="divMenu_5_3_2" class="menuNormalLevel2" onclick="closeMenu();">Pagos</div>
                <div id="divMenu_5_3_3" class="menuNormalLevel2" onclick="closeMenu();">Anticipos</div>
                <div id="divMenu_5_3_4" class="menuNormalLevel2" onclick="closeMenu();">Aplicación de Anticipos</div>
                <div id="divMenu_5_3_5" class="menuNormalLevel2" onclick="closeMenu();">Programación de Pagos</div>
                <div id="divMenu_5_3_6" class="menuNormalLevel2" onclick="closeMenu();">Estados de Cuenta</div>
                <div id="divMenu_5_3_7" class="menuNormalLevel2" onclick="closeMenu();">Cierre Mensual</div>
            </div>
        </div>
        <div id="divMenuGroup_6" class="menuGroupLevel1">
            <div id="divMenu_6_1" class="menuNormalLevel1" onclick="closeMenu();">Recepcion de Productos</div>
            <div id="divMenu_6_2" class="menuNormalLevel1" onclick="closeMenu();">Organización de Productos</div>
            <div id="divMenu_6_3" class="menuNormalLevel1" onclick="closeMenu();">Surtido de Pedidos</div>
            <div id="divMenu_6_4" class="menuNormalLevel1" onclick="closeMenu();">Facturar</div>
            <div id="divMenu_6_5" class="menuNormalLevel1" onclick="closeMenu();">Traspaso de Productos</div>
            <div id="divMenu_6_6" class="menuNormalLevel1" onclick="closeMenu();">Producción</div>
            <div id="divMenu_6_7" class="menuNormalLevel1" onclick="closeMenu();">Reportes</div>
        </div>
        <div id="divMenuGroup_7" class="menuGroupLevel1">
            <div id="divMenu_7_1" class="menuNormalLevel1" onclick="closeMenu();">RMA Cliente</div>
            <div id="divMenu_7_2" class="menuNormalLevel1" onclick="closeMenu();">RMA Proveedor</div>
            <div id="divMenu_7_3" class="menuNormalLevel1" onclick="closeMenu();">Reportes</div>
        </div>
        <div id="divMenuGroup_8" class="menuGroupLevel1">
            <div id="divMenu_8_1" class="menuNormalLevel1" onclick="closeMenu();">Opción 1</div>
            <div id="divMenu_8_2" class="menuNormalLevel1" onclick="closeMenu();">Opción 2</div>
            <div id="divMenu_8_3" class="menuNormalLevel1" onclick="closeMenu();">Opción 3</div>
        </div>
    </div>
</div>

<script>

    function loadMenu(){
        $('#menuBackGround').fadeIn('fast',function(){
            $('#menuMainContainer').show('fast');
        });
    }

    function closeMenu(){
        $('#menuMainContainer').hide('fast',function(){
            cleanMenu();
            $('#menuBackGround').fadeOut('fast');
        });
    }

    $arrMenu_Level_1 = Array(1,2,3,4,5,6,7,8);
    $arrMenu_Level_2 = Array('5_1','5_2','5_3');

    function selectMenu($intMenu){
        for($intIndex=0;$intIndex<$arrMenu_Level_1.length;$intIndex++) {
            $('#divMenuGroup_' + $arrMenu_Level_1[$intIndex]).hide();
            $('#divMenu_' + $arrMenu_Level_1[$intIndex]).removeClass('menuSelected');
            $('#divMenu_' + $arrMenu_Level_1[$intIndex]).addClass('menuNormal');
        }
        $('#divMenu_' + $intMenu).removeClass('menuNormal');
        $('#divMenu_' + $intMenu).addClass('menuSelected');
        $('#divMenuGroup_' + $intMenu).slideDown('fast');
    }

    function selectMenu1($intMenu){
        for($intIndex=0;$intIndex<$arrMenu_Level_2.length;$intIndex++) {
            $('#divMenuGroup_' + $arrMenu_Level_2[$intIndex]).hide();
            $('#divMenu_' + $arrMenu_Level_2[$intIndex]).removeClass('menuSelected1');
            $('#divMenu_' + $arrMenu_Level_2[$intIndex]).addClass('menuNormal1');
        }
        $('#divMenu_' + $intMenu).removeClass('menuNormal1');
        $('#divMenu_' + $intMenu).addClass('menuSelected1');
        $('#divMenuGroup_' + $intMenu).slideDown('fast');
    }

    function cleanMenu(){
        for($intIndex=0;$intIndex<$arrMenu_Level_1.length;$intIndex++) {
            $('#divMenuGroup_' + $arrMenu_Level_1[$intIndex]).hide();
            $('#divMenu_' + $arrMenu_Level_1[$intIndex]).removeClass('menuSelected');
            $('#divMenu_' + $arrMenu_Level_1[$intIndex]).addClass('menuNormal');
        }
        for($intIndex=0;$intIndex<$arrMenu_Level_2.length;$intIndex++) {
            $('#divMenuGroup_' + $arrMenu_Level_2[$intIndex]).hide();
            $('#divMenu_' + $arrMenu_Level_2[$intIndex]).removeClass('menuSelected1');
            $('#divMenu_' + $arrMenu_Level_2[$intIndex]).addClass('menuNormal1');
        }
    }

</script>

</body>
</html>