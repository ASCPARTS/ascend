<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/sheet.css">
    <script src="../../lib/jquery-3.1.0.min.js"></script>
</head>
<body>
    <div class="MainTitle">Cámaras</div>
    <div class="MainContainer" style="text-align: center;">
        <input id="btn3001" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Recepción" onclick="loadCam(3001);">
        <input id="btn3002" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, TI-Marketing" onclick="loadCam(3002);">
        <input id="btn3003" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Administración" onclick="loadCam(3003);">
        <input id="btn3004" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Ventas 1" onclick="loadCam(3004);">
        <input id="btn3005" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Ventas 2" onclick="loadCam(3005);">
        <input id="btn3006" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Ventas 3" onclick="loadCam(3006);">
        <input id="btn3007" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Compras" onclick="loadCam(3007);">
        <input id="btn3008" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Rampa" onclick="loadCam(3008);">
        <input id="btn3009" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Almacén 1" onclick="loadCam(3009);">
        <input id="btn3010" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Pino, Almacén 2" onclick="loadCam(3010);">
        <input id="btn3011" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Fresno, Recepción" onclick="loadCam(3011);">
        <input id="btn3012" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Fresno, Soporte" onclick="loadCam(3012);">
        <input id="btn3013" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Fresno, Calidad" onclick="loadCam(3013);">
        <input id="btn3014" type="button" class="buttonBrandBlue" style="width: 220px;" value="Guadalajara, Fresno, Almacén" onclick="loadCam(3014);">
        <input id="btn3015" type="button" class="buttonBrandBlue" style="width: 220px;" value="Monterrey, Recepcion" onclick="loadCam(3015);">
        <input id="btn3016" type="button" class="buttonBrandBlue" style="width: 220px;" value="Monterrey, Recepcion 2" onclick="loadCam(3016);">
        <input id="btn3017" type="button" class="buttonBrandBlue" style="width: 220px;" value="Monterrey, Almacen" onclick="loadCam(3017);">
        <input id="btn3018" type="button" class="buttonBrandBlue" style="width: 220px;" value="México, Ejecutivos" onclick="loadCam(3018);">
        <input id="btn3019" type="button" class="buttonBrandBlue" style="width: 220px;" value="México, Asesores" onclick="loadCam(3019);">
        <input id="btn3020" type="button" class="buttonBrandBlue" style="width: 220px;" value="México, Almacén" onclick="loadCam(3020);">
        <input id="btn3021" type="button" class="buttonBrandBlue" style="width: 220px;" value="Colombia, Recepcion" onclick="loadCam(3021);">
        <input id="btn3022" type="button" class="buttonBrandBlue" style="width: 220px;" value="Colombia, Administracion" onclick="loadCam(3022);">
        <input id="btn3023" type="button" class="buttonBrandBlue" style="width: 220px;" value="Colombia, Almacén" onclick="loadCam(3023);">
    </div>
    <iframe id="frmCam" src="empty.php" style="width: 100%; border: 0; height: 600px; background-color: #FF2828"></iframe>
    <script>
        function loadCam($intCam){
            if($intCurrent!=$intCam) {
                $('#frmCam').attr('src', 'http://201.163.99.82:' + $intCam);
            }
        }
    </script>
</body>
</html>