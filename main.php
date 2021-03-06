<?php
require_once 'inc/include.config.php';

if($_SESSION['intUserID']==''){
    header("Location:index.php");
    exit(0);
}
require_once LIB_PATH . 'class.ascend.php';
$classAscend = new clsAscend();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASCEND, ASC Parts</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>formulario.css">
    <script type="text/javascript" src="<?php echo LIB_PATH; ?>jquery-3.1.0.min.js"></script>
</head>
<body>
<table style="width: 100vw; height: 100vh; border: 0; border-spacing: 2px; border-collapse: separate;">
    <tbody>
    <tr style="height: 50px">
        <td colspan="3" style="padding: 0 0 0 0; background-image: url('img/main/pleca_main_left.png'), url('img/main/pleca_main_center.png'), url('img/main/pleca_main_right.png') ; background-size: calc(50% - 65px) 50px, 131px 50px, calc(50% - 66px) 50px; background-repeat: no-repeat, no-repeat, no-repeat; background-position: left top, center top, right top; ">
        <?php require_once INCLUDE_PATH . 'include.topmenu.php'; ?>
        </td>
    </tr>
    <tr style="calc(100% - 50px)">
        <td class="tdTabMainContainer" width="152">
            <div id="divTabContainer" class="divTabContainer"></div>
        </td>
        <td class="tdSheetMainContainer" width="*">
            <div id="divSheetContainer" class="divSheetContainer"></div>
        </td>
        <?php
        $_SESSION['intGoogleId'] = '';
        if($_SESSION['intGoogleId']!=''){
        ?>
        <td id="tdNotificationContainer" width="200">
            <?php require_once INCLUDE_PATH . 'include.notification.php'; ?>
        </td>
        <?php
        }
        ?>
    </tr>
    </tbody>
</table>
<?php require_once INCLUDE_PATH . 'include.menu.php'; ?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>menu.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>tab.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>notification.js"></script>
<script>
    //handleTab("100000", "Buscador de partes", "modules/test/seeker.php");
    handleTab('96', 'Orden de Venta', 'modules/saleorder/');
    handleTab('10','Marcas','modules/catalog/index.php?intCatalogId=1');
</script>
</body>
</html>
<?php
unset($classAscend);
?>