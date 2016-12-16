<?php
$strUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
$strBrowserName = getBrowserName($strUserAgent);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASCEND, ASC Parts</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<img id="imgIndexLogoASC" src="img/logo_white-01.png">
<img id="imgIndexLogoAscend" src="img/logo_v_byn_256.png">
<div id="divIndexLoginMain">
<?php
if($strBrowserName !='Chrome' && $strBrowserName !='Safari') {
    ?>
    <div id="divUnsupportedContainer">
        <img src="img/unsupported/<?php echo str_replace(' ','',strtolower($strBrowserName)); ?>.png">
        <br /><br />
        Lo sentimos, el navegador <?php echo $strBrowserName; ?> no otorga lo necesario para el correcto funcionamiento del sistema
        <br /><br />
        Por favor ingresa a la aplicacion desde Chrome o Safari
        <br /><br />
        <img src="img/unsupported/chrome.png">
        <img src="img/unsupported/safari.png">
    </div>
    <?php
} else {
    ?>
    <div id="divIndexLoginContainer">
        <input id="txtUser" type="text" value="" placeholder="usuario" />
        <input id="pwdPassword" type="password" value="" placeholder="contraseña" />
        <div id="btnLogin" onclick="goMain();"></div>
    </div>
    <script>
        function goMain(){
            window.location = 'main.php';
        }
    </script>
    <?php
};
?>
</div>
<div id="divIndexFooter">
    Asesores en Sistemas de Cómputo y Comunicaciones, S.A. de C.V.
</div>
</body>
</html>
<?php
function getBrowserName($strUserAgent)
{
    if (strpos($strUserAgent, 'opera') || strpos($strUserAgent, 'opr/')) return 'Opera';
    elseif (strpos($strUserAgent, 'edge')) return 'Edge';
    elseif (strpos($strUserAgent, 'chrome')) return 'Chrome';
    elseif (strpos($strUserAgent, 'safari')) return 'Safari';
    elseif (strpos($strUserAgent, 'firefox')) return 'Firefox';
    elseif (strpos($strUserAgent, 'msie') || strpos($strUserAgent, 'Trident')) return 'Internet Explorer';
    return 'Other';
}
?>