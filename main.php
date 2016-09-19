<?php
require_once 'inc/include.config.php';
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
        <td colspan="3" style="background-color: #050409; padding: 0 0 0 0">
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
        <td id="tdNotificationContainer" width="200">
            <?php require_once INCLUDE_PATH . 'include.notification.php'; ?>
        </td>
    </tr>
    </tbody>
</table>
<?php require_once INCLUDE_PATH . 'include.menu.php'; ?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>menu.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>tab.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>notification.js"></script>
<script>
    handleTab(4, "test", "modules/test/seeker.php")
</script>
</body>
</html>
<?php
unset($classAscend);
?>