<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="../../lib/jquery-3.1.0.min.js"></script>
    <style>
        body {
            font-size: 10pt;
            background-color: #C0C0C0;
            margin: 15px 15px 15px 15px;
            font-family: Arial;
        }

        input[type=button] {
            font-size: 9pt;
            font-weight: bold;
            border: 1px #000000 solid;
            background-color: #87B5EE;
            width: 150px;
            padding: 3px 0 3px 0;
            cursor: pointer;
            margin: 3px 15px 0px 0px;
        }

    </style>
</head>
<body>
    <table style="height: calc(100vh - 30px); background-color: #23518A; width: 100%">
        <tr>
            <td width="335" style="vertical-align: top; font-size: 10pt; color: #FFFFFF; font-weight: bold">
                visor ASCvisorCAM<br />
                Guadalajara<br />
                <input id="btn3001" type="button" value="Pino, Recepción" onclick="loadCam(3001);">
                <input id="btn3002" type="button" value="Pino, TI-Marketing" onclick="loadCam(3002);">
                <input id="btn3003" type="button" value="Pino, Administración" onclick="loadCam(3003);">
                <input id="btn3004" type="button" value="Pino, Ventas 1" onclick="loadCam(3004);">
                <input id="btn3005" type="button" value="Pino, Ventas 2" onclick="loadCam(3005);">
                <input id="btn3006" type="button" value="Pino, Ventas 3" onclick="loadCam(3006);">
                <input id="btn3007" type="button" value="Pino, Compras" onclick="loadCam(3007);">
                <input id="btn3008" type="button" value="Pino, Rampa" onclick="loadCam(3008);">
                <input id="btn3009" type="button" value="Pino, Almacén 1" onclick="loadCam(3009);">
                <input id="btn3010" type="button" value="Pino, Almacén 2" onclick="loadCam(3010);">
                <input id="btn3011" type="button" value="Fresno, Recepción" onclick="loadCam(3011);">
                <input id="btn3012" type="button" value="Fresno, Soporte" onclick="loadCam(3012);">
                <input id="btn3013" type="button" value="Fresno, Calidad" onclick="loadCam(3013);">
                <input id="btn3014" type="button" value="Fresno, Almacén" onclick="loadCam(3014);">
                <br />
                Monterrey<br />
                <input id="btn3015" type="button" value="Recepcion" onclick="loadCam(3015);">
                <input id="btn3016" type="button" value="Recepcion 2" onclick="loadCam(3016);">
                <input id="btn3017" type="button" value="Almacen" onclick="loadCam(3017);">
                <br />
                México<br />
                <input id="btn3018" type="button" value="Ejecutivos" onclick="loadCam(3018);">
                <input id="btn3019" type="button" value="Asesores" onclick="loadCam(3019);">
                <input id="btn3020" type="button" value="Almacén" onclick="loadCam(3020);">
                <br />
                Colombia<br />
                <input id="btn3021" type="button" value="Recepcion" onclick="loadCam(3021);">
                <input id="btn3022" type="button" value="Administracion" onclick="loadCam(3022);">
                <input id="btn3023" type="button" value="Almacén" onclick="loadCam(3023);">
            </td>
            <td width="*">
                <iframe id="frmCam" src="empty.php" style="width: 100%; border: 0; height: 100%;"></iframe>
            </td>
        </tr>
    </table>
    <script>

        $intCurrent = 0;
        function loadCam($intCam){
            if($intCurrent!=$intCam) {
                if ($intCurrent != 0) {
                    $('#btn' + $intCurrent).css('background-color', '#87B5EE');
                }
                $('#frmCam').attr('src', 'http://201.163.99.82:' + $intCam);
                $intCurrent = $intCam;
                $('#btn' + $intCam).css('background-color', '#55CCFF');
            }
        }
    </script>
</body>
</html>