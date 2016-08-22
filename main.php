<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASCEND, ASC Parts</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <script src="lib/jquery-3.1.0.min.js"></script>
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
                <div class="divTopMenuRight" onclick="handleTab('203','Drive','http://mail.ascparts.com');" style="background-image: url('https://www.impactcomputers.com/image/data/logo.gif'); background-repeat: no-repeat; background-position: center center; background-size: 90% auto"></div>
                <div class="divTopMenuRight"></div>
            </td>
        </tr>
        <tr style="calc(100% - 50px)">
            <td class="tdTabMainContainer" width="152">
                <div id="divTabContainer" class="divTabContainer"></div>
            </td>
            <td class="tdSheetMainContainer" width="*">
                <div id="divSheetContainer" class="divSheetContainer"></div>
            </td>
            <td id="tdNotificationContainer" width="200">
<?php require_once 'inc/notification.php'; ?>
            </td>
        </tr>
    </tbody>
</table>
<?php require_once 'inc/menu.php'; ?>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/notification.js"></script>
<script type="text/javascript" src="js/añadirFormulario.js"></script>
<script>
    handleTab('3','Formulario','formulario.php');
    handleTab('4','Reportes','reportes.php');
</script>
</body>
</html>