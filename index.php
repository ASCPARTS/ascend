<?php
include_once 'lib/google/gpConfig.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>.:ASC Parts:.</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="homecarousel.css">
    <script type="text/javascript" src="lib/jquery-3.1.0.min.js"></script>
    <script src="jssor.slider-22.0.6.mini.js" type="text/javascript"></script>
    <script type="text/javascript" src="homecarousel.js"></script>
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
        <?php
        $authUrl = $gClient->createAuthUrl();
        //$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
        ?>
        <a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL); ?>">
        <div class="divLogin" style="background-image: url('img/ascend_login.png');">
            ASCend
        </div>
        </a>
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
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 380px; overflow: hidden; visibility: hidden;">
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('img/carousel/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 980px; height: 380px; overflow: hidden;">
                <div data-b="0" data-p="200.00" data-po="80% 55%">
                    <img data-u="image" src="img/main/banner_0.jpg" />
                </div>
                <a data-u="any" href="http://www.jssor.com" style="display:none">Introduction Slider</a>
                <div data-b="1" data-p="200.00" style="display: none;">
                    <img data-u="image" src="img/main/banner_1.jpg" />
                </div>
                <div data-b="2" data-p="200.00" style="display: none;">
                    <img data-u="image" src="img/main/banner_2.jpg" />
                </div>
            </div>
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:10px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:10px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
        <div style="margin-top: 25px; text-align: center; overflow-x: auto; overflow-y: hidden; height: 200px; max-height: 200px; white-space: nowrap;">
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(55,215,255,.5); margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle">Impresión</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(56,70,79,.5); color: #FFFFFF; margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle" style="color: #FFFFFF;">Cómputo</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(129,226,90,.5); margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle">Impresión</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(55,215,255,.5); margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle">Impresión</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(56,70,79,.5); color: #FFFFFF; margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle" style="color: #FFFFFF;">Cómputo</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 180px; background-color: rgba(129,226,90,.5); margin-right: 20px; text-align: left; ">
                <span class="spanSubtitle">Impresión</span><br /><br />
                - Apple Mobile<br />
                - Samsung Mobile<br />
                - Micromax Mobile<br />
                - Nokia Mobile<br />
                - HTC Mobile<br />
                - Sony Mobile
            </div>
        </div>
        <br /><span class="spanSubtitle"">Los más vendidos</span><br />
        <div style="margin-top: 20px; text-align: center; overflow-x: auto; overflow-y: hidden; height: 250px; max-height: 250px; white-space: nowrap; border-top: 5px #2CA5FA solid; ">
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodOne.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodTwo.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodThree.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodFour.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodFive.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodSix.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodSeven.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodEight.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
        </div>
        <br /><span class="spanSubtitle"">Productos nuevos</span><br />
        <div style="margin-top: 20px; text-align: center; overflow-x: auto; overflow-y: hidden; height: 250px; max-height: 250px; white-space: nowrap; border-top: 5px #2CA5FA solid; ">
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodOne.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodTwo.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodThree.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodFour.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodFive.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodSix.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodSeven.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
            <div style="padding: 10px 10px 10px 10px; display: inline-block; width: 180px; height: 230px; margin-right: 20px; text-align: center; vertical-align: bottom; ">
                <img src="img/index/prodEight.png" style="display: inline-block; border: 0; width: 180px" /><br />
                Batería HP<br />
                Precio Especial<br />
                SKU: 66776677
            </div>
        </div>
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
        <span class="spanTitle">Clientes.</span><br /><br />
        <table style="width: 100%; border-spacing: 0; border-collapse: collapse;">
            <tbody>
            <tr>
                <td style="width: 20%; padding: 5px 5px 5px 5px;">No. de Cliente</td>
                <td style="width: 55%; padding: 5px 5px 5px 5px;"><input id="strClientNumber" type="text" value="" class="inputLogin"></td>
                <td style="width: 25%; padding: 5px 5px 5px 5px;"><label class="labelRegister">Registrarme</label></td>
            </tr>
            <tr>
                <td style="width: 20%; padding: 5px 5px 5px 5px;">Contraseña</td>
                <td style="width: 55%; padding: 5px 5px 5px 5px;"><input id="strClientPassword" type="password" value="" class="inputLogin"></td>
                <td style="width: 25%; padding: 5px 5px 5px 5px;"><label class="labelForgot">Olvidé mi contraseña</label></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;"><input type="button" value="Ingresar" class="buttonLogin" onclick="loginClient();"> </td>
            </tr>
            </tbody>
        </table>
        <div class="divLoginError" id="divLoginError"></div>
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

<div id="divWorkingBackground" class="divWorkingBackground">
    <div id="divWorking" class="divWorking">
        <img src="img/main/ajax-loader.gif" class="imgWorking"/>
    </div>
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
            if($arrSections[$intIx] == 'Clientes'){
                $('#strClientNumber').val('');
                $('#strClientPassword').val('');
                $('#divLoginError').html('');
                $('#divLoginError').hide();
            }
            $('#divContent' + $arrSections[$intIx]).hide();
        }
        if($arrSections[$intIx] != 'Home' && $arrSections[$intIx] != 'Clientes') {
            $('#divMenu' + $strTarget).css('border-bottom-color', '#379AFF');
        }
        $('#divContent' + $strTarget).slideDown('slow');
    }

    function loginClient(){
        $('#divWorkingBackground').fadeIn('fast',function(){
            $('#divLoginError').html('');
            $('#divLoginError').hide();
            $strClientNumber = $('#strClientNumber').val().trim();
            $strClientPassword = $('#strClientPassword').val().trim();
            if($strClientNumber==''){
                $('#divLoginError').html('Ingrese su número de cliente');
                $('#divLoginError').show();
                $('#divWorkingBackground').fadeOut('fast',function(){
                    $('#strClientNumber').focus();
                });
            }else{
                if($strClientPassword==''){
                    $('#divLoginError').html('Ingrese su contraseña');
                    $('#divLoginError').show();
                    $('#divWorkingBackground').fadeOut('fast',function(){
                        $('#strClientPassword').focus();
                    });
                }else{
                    $strQueryString = "strProcess=authClient&strClientNumber=" + $strClientNumber + "&strClientPassword=" + $strClientPassword;
                    $.ajax({
                        url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                        success: function ($jsnPhpScriptResponse) {
                            switch($jsnPhpScriptResponse.authClient){
                                case '0':
                                    $('#divLoginError').html('Su número de cliente es erroneo, verifique');
                                    $('#divLoginError').show();
                                    $('#strClientNumber').focus();
                                    $blnGo = 0;
                                    break;
                                case '-1':
                                    $('#divLoginError').html('Su contraseña es erronea, verifique');
                                    $('#divLoginError').show();
                                    $('#strClientNumber').focus();
                                    $blnGo = 0;
                                    break;
                                case '-2':
                                    $('#divLoginError').html('Su número de cliente se encuentra inactivo');
                                    $('#divLoginError').show();
                                    $('#strClientNumber').focus();
                                    $blnGo = 0;
                                    break;
                                default:
                                    $blnGo = 1;
                                    break;
                            }
                            $('#divWorkingBackground').fadeOut('fast',function(){
                                if($blnGo==1){
                                    $('body').slideUp('fast',function(){
                                        window.location = 'main.php';
                                    })
                                }
                            });
                        },
                        error: function($e){
                            alert('Error de sistema, contactar al administrador');
                            console.log($e);
                        }
                    });
                }
            }
        });
    }

</script>
</body>
</html>