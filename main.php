<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASCEND, ASC Parts</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
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

    </style>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/tab.css">
    <link rel="stylesheet" type="text/css" href="css/notification.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/panelNotificaciones.css">
</head>
<body>
<table style="width: 100vw; height: 100vh; border: 0; border-spacing: 2px; border-collapse: separate;  ">
    <tbody>
        <tr style="height: 50px">
            <td colspan="3" style="background-color: #050409; padding: 0 0 0 0">
                <div class="divTopMenuLogo"></div>
                <div class="divTopMenuLeft" onclick="openMenu();" style="background-image: url('img/menu32.png'); background-repeat: no-repeat; background-position: center center"></div>
                <div class="divTopMenuRight" style="width: 200px !important;"></div>
                <div class="divTopMenuRight" onclick="handleTab('200','Cámaras','modules/cams/');" style="background-image: url('img/video-camera.png'); background-repeat: no-repeat; background-position: center center"></div>
                <div class="divTopMenuRight" onclick="handleTab('201','HP Parts','http://partsurfer.hp.com/search.aspx');" style="background-image: url('img/hp32.png'); background-repeat: no-repeat; background-position: center center;"></div>
                <div class="divTopMenuRight" onclick="handleTab('202','Impact','https://www.impactcomputers.com');" style="background-image: url('https://www.impactcomputers.com/image/data/logo.gif'); background-repeat: no-repeat; background-position: center center; background-size: 90% auto"></div>
                <div class="divTopMenuRight"></div>
                <div class="divTopMenuRight"></div>
            </td>
        </tr>
        <tr style="calc(100% - 50px)">
            <td class="tdTabMainContainer" width="152">
                <div id="divTabContainer" class="divTabContainer"></div>
            </td>
            <td clas="tdSheetMainContainer" width="*">
                <div id="divSheetContainer" class="divSheetContainer"></div>
            </td>
            <td style="background-color: #1766A1; padding: 0 0 0 0;" width="200">
<?php require_once 'inc/notification.php'; ?>
            </td>
        </tr>
    </tbody>
</table>
<?php require_once 'inc/menu.php'; ?>
<script src="js/menu.js"></script>
<script src="js/tab.js"></script>
<script type="text/javascript" src="js/añadirFormulario.js"></script>

<script>
    handleTab('1','Clientes','clientes.php');
    handleTab('2','Proveedores','proveedores.php');
    handleTab('3','Formulario','formulario.php');
    handleTab('4','Reportes','reportes.php');
</script>
</body>
</html>