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
    <br />
    <div id="divIndexLoginContainer">
        <input id="txtUser" type="text" value="" placeholder="usuario" />
        <input id="pwdPassword" type="password" value="" placeholder="contraseña" />
        <div id="btnLogin" onclick="goMain();"></div>
    </div>
</div>
<script>
    function goMain(){
        window.location = 'main.php';
    }
</script>
<div id="divIndexFooter">
    Asesores en Sistemas de Cómputo y Comunicaciones, S.A. de C.V.
</div>
</body>
</html>