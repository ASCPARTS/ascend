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
    <div id="divIndexLogo"></div>
    <div id="divIndexLoginMain">
        <br />
        <div id="divIndexLoginContainer">
            <table style="height: 100%; border: 0; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <tr>
                    <td style="height: 13%; background-color: #050409; border:0;border-collapse: collapse; border-spacing: 0; background-image: url('img/logo_white-01.png'); background-position: right top; background-repeat: no-repeat; background-size: auto 90%;"></td>
                </tr>
                <tr>
                    <td style="height: 29%; background-color: #F1F1F1; border:0;border-collapse: collapse; border-spacing: 0; vertical-align: middle; padding: 0 3% 0 3%">
                        <input type="text" value="" placeholder="usuario" />
                    </td>
                </tr>
                <tr>
                    <td style="height: 29%; background-color: #F1F1F1; border:0;border-collapse: collapse; border-spacing: 0; vertical-align: middle; padding: 0 3% 0 3%">
                        <input type="password" value="" placeholder="contraseña" />
                    </td>
                </tr>
                <tr>
                    <td style="height: 29%; background-color: #F1F1F1; border:0;border-collapse: collapse; border-spacing: 0; vertical-align: middle; padding: 0 3% 0 3%">
                        <input type="button" value="ingresar" onclick="goMain();" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="divIndexFooter">
        Asesores en Sistemas de Cómputo y Comunicaciones, S.A. de C.V.
    </div>
    <script>
        function goMain(){
            window.location = 'main.php';
        }
    </script>
</body>
</html>