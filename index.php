<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>.:ASC Parts:.</title>
    <style>
        html, body { margin: 0 0 0 0; padding: 0 0 0 0; font-family: Arial; font-size: 10pt; background-color: #E0E0E0; }

        .divTop { background-color: #2C3942; padding: 0 100px 0 100px; text-align: right; color: #E4EDF4; height: 39px; line-height: 39px; font-size: 8pt; font-weight: normal }

        .divPleca { vertical-align: top; height: 103px; background-image: url('img/pleca.png'), url('img/pleca_left.png'); background-position: center top, left top; background-repeat: no-repeat, no-repeat; background-size: 270px 100px, 50% 100px; background-color: #38464F; padding: 0 0 0 0; border-bottom: 1px #4b5860 solid; }

        .divPleca .divLogo { display: inline-block; width: calc(50% - 102px); height: 100px; line-height: 100px; padding-left: 100px; }

        .divPleca .divLogo .imgLogo { cursor: pointer; height: 70%; vertical-align: middle; }

        .divPleca .divLoginContainer { display: inline-block; width: calc(50% - 102px); height: 100px; text-align: right; padding-right: 100px; vertical-align: top; }

        .divPleca .divLoginContainer .divLogin { cursor: pointer; display: inline-block; text-align: center; height: 30px; padding: 55px 10px 0 10px; margin-top: 7px; background-position: center 20px; background-repeat: no-repeat; background-size: auto 24px; color:#FFFFFF; }

        .divPleca .divLoginContainer .divLoginBlue { background-color: #379AFF; }
        .divPleca .divLoginContainer .divLoginBlue:hover { background-color: #2d90f4; }

        .divMenuContainer { background-color: #38464F; height: 48px; text-align: center; }

        .divMenuContainer .divMenu { color:#E4EDF4; display: inline-block; width: 110px; height: 40px; line-height: 40px; border-bottom: 8px #38464F solid; font-size: 10pt; margin: 0 10px 0 10px; cursor: pointer; }

        .divContentContainer { padding: 50px 100px 50px 100px; }
        .divContentContainer .divContent { background-color: #FFFFFF; color:#555555; padding: 70px 70px 70px 70px; font-size: 12pt; text-align: justify; }
        .divContentContainer .divContent .spanTitle { font-size: 24pt; color:#000000; }
        .divContentContainer .divContent .spanSubtitle { font-size: 18pt; color:#313841 }

        .divPayment { background-color: #406884; height: 108px; text-align: center; font-size: 11pt; line-height: 108px; color:#FFFFFF; font-weight: normal; }
        .divPayment .imgPayment { vertical-align: middle; margin-left: 50px; }

        .divFooter { background-color: #38464F; padding: 50px 100px 50px 100px; font-size: 10pt; color: #FFFFFF; vertical-align: top; text-align: center; }
        .divFooter .divBlock { display: inline-block; width: calc(20% - 30px); padding: 10px 10px 10px 10px; text-align: left; vertical-align: top; }
        .divFooter .divBlock .spanHighlightblue { color: #2CA5FA;font-weight: bold; }
        .divFooter .divBlock .spanGray {color: #707070; }

    </style>
    <script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
</head>
<body>
<div class="divTop">
    Mayorista internacional de partes para equipos de cómputo, impresión y dispositivos móviles
</div>
<div class="divPleca">
    <div class="divLogo">
        <img onclick="switchContent('Home');" src="img/logo_white-01.png" border="0" class="imgLogo">
    </div>
    <div class="divLoginContainer">
        <div class="divLogin divLoginBlue" style="background-image: url('img/client_login.png');" onclick="switchContent('Clientes');">
            Iniciar sesión
        </div>
        <div class="divLogin" style="background-image: url('img/ascend_login.png');" onclick="openLogin('ASCEND');">
            ASCend
        </div>
    </div>
</div>
<div class="divMenuContainer">
    <div id="divMenuNosotros" onclick="switchContent('Nosotros');" class="divMenu">NOSOTROS</div>
    <div id="divMenuProductos" onclick="switchContent('Productos');" class="divMenu">PRODUCTOS</div>
    <div id="divMenuServicios" onclick="switchContent('Servicios');" class="divMenu">SERVICIOS</div>
    <div id="divMenuSucursales" onclick="switchContent('Sucursales');" class="divMenu">SUCURSALES</div>
    <div id="divMenuContacto" onclick="switchContent('Contacto');" class="divMenu">CONTACTO</div>
</div>
<div class="divContentContainer">
    <div id="divContentHome" class="divContent">
        <span class="spanTitle">LANDING</span><br /><br />
    </div>
    <div id="divContentNosotros" class="divContent" style="display: none">
        <span class="spanTitle"">Nosotros.</span><br /><br />
        <span class="spanSubtitle">Quiénes somos.</span><br /><br />
        En ASC Parts, nos autodefinimos como una empresa de servicio para el canal de TIC. Para nosotros servicio significa stocks, atención, sistemas eficientes, plataforma online, logística, respuesta inmediata, garantía, y por supuesto, precio.<br /><br /><br />
        <span class="spanSubtitle">Oferta de valor.</span><br /><br />
        - Asesoría y atención personalizada por parte de un equipo de profesionales en el ramo.<br /><br />
        - Somos mayoristas autorizados de las marcas HP, Xerox, Epson y OKI.<br /><br />
        - Altos niveles de inventario que nos permiten ofrecer entrega inmediata en más del 90% de las partes requeridas.<br /><br />
        - Somos representantes directos de las marcas líderes en el mercado TIC.<br /><br />
        - Área técnica especializada en pruebas de calidad para todos los productos que comercializamos.<br /><br />
        - Almacén internacional para una logística integral a todo el mercado latinoamericano.<br /><br />
        - Centros de distribución y oficinas estratégicamente ubicadas para ofrecer servicio y oportuno.<br /><br />
        - Área de soporte técnico que brinda asesoría integral a todos nuestros clientes.<br /><br /><br />
        <span class="spanSubtitle">Misión.</span><br /><br />
        Comercializar productos y servicios de alta calidad con gran eficiencia en las entregas, que aporten soluciones al canal de TIC.
    </div>
    <div id="divContentProductos" class="divContent" style="display: none">
        <span class="spanTitle">Productos.</span><br /><br />
        <span class="spanSubtitle">Partes y repuestos para:</span><br /><br />
        Impresoras, laptops, desktops, smartphones, tablets, servidores, copiadoras, plotters, proyectores y mucho más.<br /><br />
        <span class="spanSubtitle">Además:</span><br /><br />
        Filminas, rollers, kits de transferencia, boards y tarjetas lógicas, interfaces, charolas y bandejas, pads, gomas y almohadillas, engranes, bandas y carriage belts, memorias RAM, perillas, cabezas de impresión, kits de herramientas, cables, tóners, consumibles, partes para plotters y servidores, duplexers, accesorios y más.<br /><br /><br />
        <div style="text-align: center;"><span class="spanSubtitle">Contamos con un catálogo de más de 12,000 artículos de las marcas del mercado.</span></div>
    </div>
    <div id="divContentServicios" class="divContent" style="display: none">
        <span class="spanTitle">Servicios.</span><br /><br />
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Envíos  a todo el país.</span><br /><br />
            Enviamos tus pedidos a cualquier punto de la república mexicana con entrega día siguiente, a una tarifa preferencial.
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">E-commerce.</span><br /><br />
            Contamos con el buscador de partes más extenso del país para que realices tus compras online a cualquier hora y desde cualquier lugar, pagando cómodamente con tu tarjeta crédito o débito.
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Drop shipping.</span><br /><br />
            Envía nuestros productos directamente a tu cliente, ¡sin que se entere de que el paquete proviene de ASC Parts! Deja de hacer movimientos dobles y ahorra tiempo y dinero para tu negocio.
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Apoyo a licitaciónes.</span><br /><br />
            Contamos con un área para Gobierno y Proyectos Especiales; para conocer más de este servicio envía tus solicitudes a licitaciones@ascparts.com
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Garantías y devoluciones.</span><br /><br />
            Realiza el trámite de garantías/devoluciones (eRMA) de manera práctica y segura vía nuestra página web, con lo que agilizamos el proceso y facilitamos el seguimiento a tus solicitudes.
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Además.</span><br /><br />
            Planes de crédito, asesoría especializada y promociones exclusivas.
        </div>
        <div style="display: inline-block; width: calc(50% - 12px); padding-right: 10px; padding-bottom: 20px; vertical-align: top;">
            <span class="spanSubtitle">Backorders.</span><br /><br />
            Si algún artículo no se encuentra en stock, ¡te lo conseguimos! Pregunta a tu ejecutivo por este servicio, costos y tiempo de entrega.
        </div>

    </div>
    <div id="divContentSucursales" class="divContent" style="display: none">
        <div style="display: inline-block; width: calc(50% - 12px); height: 100%; padding-right: 10px; vertical-align: top; text-align: left;">
            <span class="spanTitle">Sucursales.</span><br /><br />
            <span class="spanSubtitle">Guadalajara.</span><br /><br />
            Calle Pino #2436 Col. del Fresno C.P. 44909<br />
            Guadalajara, Jalisco. Tel.: (33) 3810 1015<br /><br />
            <span class="spanSubtitle">Ciudad de México.</span><br /><br />
            Eje Central Lazaro Cárdenas #899 Col. Vertiz Narvarte C.P. 03600<br />
            Ciudad de México. Tel.: (55) 2595 0250 al 59<br /><br />
            <span class="spanSubtitle">Monterrey.</span><br /><br />
            Av. Hermosillo #3301 Local A Col. Mitras Centro C.P. 64460<br />
            Monterrey, Nuevo León. Tel.: (81) 8123 4955/59<br /><br />
            <span class="spanTitle">Centros de atención y distribución.</span><br /><br />
            <span class="spanSubtitle">Hermosillo.</span><br /><br />
            Calle Yañez #79 Int. B-5 Col. San Benito C.P. 83190<br />
            Hermosillo, Sonora. Tel.: 01 800 830 6464 Ext. 720<br /><br />
            <span class="spanSubtitle">Puebla.</span><br /><br />
            Av. 25 Poniente #913 Col. Insurgentes Chulavista C.P. 72420<br />
            Puebla, Puebla. Tel.: 01 800 830 6464 Ext. 730<br /><br />
            <span class="spanSubtitle">Veracruz.</span><br /><br />
            Calle Hidalgo #167-2 esquina Emparan Col. Centro C.P. 91700<br />
            Veracruz, Veracruz. Tel.: 01 800 830 6464 Ext. 715<br /><br />
            <span class="spanSubtitle">Chuihuahua.</span><br /><br />
            Av. Antonio de Montes #2112 Int. 4 Fraccionamiento San Felipe C.P. 31240<br />
            Chihuahua, Chihuahua. Tel.: 01 800 830 6464 Ext. 740<br /><br />
            <span class="spanSubtitle">Mérida.</span><br /><br />
            Calle 5 #55 x 6 y 6 A Col. Reparto Dolores Patrón C.P. 97050<br />
            Mérida, Yucatán. Tel.: 01 800 830 6464 Ext. 710<br /><br />
            <span class="spanSubtitle">León.</span><br /><br />
            José Luis Cuevas #101 Local 8 Col. Los Murales C.P. 37219<br />
            León, Guanajuato. Tel.: 01 800 830 6464 Ext. 725<br /><br />
        </div>
        <div id="map" style="background-color: #3d8230; display: inline-block; width: calc(50% - 2px); height: 100%; vertical-align: top;">
            asd
        </div>
    </div>
    <div id="divContentContacto" class="divContent" style="display: none">
        <span class="spanTitle">Contacto.</span><br /><br />
    </div>
    <div id="divContentClientes" class="divContent" style="display: none">
        <span class="spanTitle">Iniciar Sesión.</span><br /><br />
    </div>
</div>
<div class="divPayment">
    Pago seguro con<img src="img/visa.png" border="0" class="imgPayment"><img src="img/mastercard.png" border="0" class="imgPayment">
</div>
<div class="divFooter">
    <div class="divBlock">
        <img src="img/logo_white-01.png" style="width: 65%;" />
    </div>
    <div class="divBlock">
        <span class="spanHighlightblue">GUADALAJARA, JAL.</span><br />
        Calle Pino #2436<br />
        Col. del Fresno<br />
        C.P. 44909<br />
        Tel: (33) 3810 1015
    </div>
    <div class="divBlock">
        <span class="spanHighlightblue">CIUDAD DE MÉXICO.</span><br />
        Eje Central Lazaro Cárdenas #899<br />
        Col. Vertiz Narvarte<br />
        C.P. 03600<br />
        Tel: (55) 2595 0250 al 59
    </div>
    <div class="divBlock">
        <span  class="spanHighlightblue">MONTERREY, N.L.</span><br />
        Av. Hermosillo #3301 Local A<br />
        Col. Mitras Centro<br />
        C.P. 64460<br />
        Tel: (81) 8123 4955/59
    </div>
    <div class="divBlock">
        Ventas por Teléfono:<br /><br />
        <span class="spanHighlightblue">(33) 3810 1015</span>
    </div>
    <br /><br />
    <div class="divBlock" style="width: calc(80% - 55px);">
        <span class="spanHighlightblue">CEDIS:</span><br />
        HERMOSILLO <span class="spanGray">Calle Yañez #79 Int. B-5 Col. San Benito C.P. 83190</span>&nbsp;
        CHIHUAHUA <span class="spanGray">Av. Antonio de Montes #2112 Int. 4 Fraccionamiento San Felipe C.P. 31240</span>&nbsp;
        PUEBLA <span class="spanGray">Av. 25 Poniente #913 Col. Insurgentes Chulavista C.P. 72420</span>&nbsp;
        MÉRIDA <span class="spanGray">Calle 5 #55 x 6 y 6 A Col. Reparto Dolores Patrón C.P. 97050</span>&nbsp;
        VERACRUZ <span class="spanGray">Calle Hidalgo #167-2 esquina Emparan Col. Centro C.P. 91700</span>&nbsp;
        LEÓN <span class="spanGray">José Luis Cuevas #101 Local 8 Col. Los Murales C.P. 37219</span>
    </div>
    <div class="divBlock">
        Síguenos:<br /><br />
        <a href="https://www.facebook.com/AscPartsInternacional" target="_blank"><img src="img/facebook.png" style="height: 22px; border: 0; margin-left: 10px; cursor: pointer;" /></a>
        <a href="https://www.youtube.com/watch?v=mMmkEn1pVqw&feature=youtu.be" target="_blank"><img src="img/youtube.png" style="height: 22px; border: 0; margin-left: 10px; cursor: pointer;" /></a>
        <a href="" target="_blank"><img src="img/linkedin.png" style="height: 22px; border: 0; margin-left: 10px; cursor: pointer;" /></a>
    </div>
</div>
<div style="background-color: #2C3942; padding: 0 100px 0 100px; text-align: right; color: #555555; height: 90px; line-height: 90px; font-size: 8pt; font-weight: normal">
    &copy; ASC Parts 2016. Derechos Reservados.
</div>
<script>
    function openLogin($strLogin){
        $('body').fadeOut('slow',function(){
            if($strLogin == 'Client'){
                window.location = 'index_back.php';
            }else{
                window.location = 'main.php';
            }
        });
    }

    function switchContent($strTarget){
        $arrSections = ['Home','Nosotros','Productos','Servicios','Sucursales','Contacto','Clientes'];
        for($intIx=0;$intIx<$arrSections.length;$intIx++){
            if($arrSections[$intIx] != 'Home' && $arrSections[$intIx] != 'Clientes'){
                $('#divMenu' + $arrSections[$intIx]).css('border-bottom-color','#38464F');
            }
            $('#divContent' + $arrSections[$intIx]).hide();
        }
        if($arrSections[$intIx] != 'Home' && $arrSections[$intIx] != 'Clientes') {
            $('#divMenu' + $strTarget).css('border-bottom-color', '#379AFF');
        }
        $('#divContent' + $strTarget).slideDown('slow');
    }
    
</script>
</body>
</html>