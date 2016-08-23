<div class="divTopMenu divTopMenuLeft" title="Indicadores" onclick="handleTab('200','Indicadores','modules/kpi/');" style="background-image: url('img/business-bars-graphic.png'); background-repeat: no-repeat; background-position: center center"></div>
<div class="divTopMenu divTopMenuLeft" title="Cámaras" onclick="handleTab('201','Cámaras','modules/cams/');" style="background-image: url('img/video-camera.png'); background-repeat: no-repeat; background-position: center center"></div>
<div class="divTopMenu divTopMenuLeft" title="HP Parts Store" onclick="handleTab('202','HP Parts Store','http://partsurfer.hp.com/search.aspx');" style="background-image: url('img/hp32.png'); background-repeat: no-repeat; background-position: center center;"></div>
<div class="divTopMenu divTopMenuLeft" title="Impact" onclick="handleTab('203','Impact','https://www.impactcomputers.com');" style="background-image: url('https://www.impactcomputers.com/image/data/logo.gif'); background-repeat: no-repeat; background-position: center center; background-size: 90% auto"></div>
<div class="divTopMenuUser" style="background-image: url('img/luis_quintero.jpg')" onclick="openUserMenu();">Luis Quintero</div>
<div id="divTopMenuUserMain">
    <table id="tableTopMenuUserMain">
        <tr>
            <td rowspan="3" onclick="closeUserMenu();"></td>
            <td width="204" height="50" onclick="closeUserMenu();"></td>
        </tr>
        <tr>
            <td id="tdTopMenuUser" width="252" height="1">
                <div class="divTopMenuUserOption" style="background-image: url('img/google_search.png');" onclick="window.open('http://www.google.com','_blank'); closeUserMenu();">Google</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_mail.png');" onclick="window.open('http://mail.ascparts.com','_blank'); closeUserMenu();">Correo</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_drive.png');" onclick="window.open('http://drive.ascparts.com','_blank'); closeUserMenu();">Drive</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_calendar.png');" onclick="window.open('http://calendar.ascparts.com','_blank'); closeUserMenu();">Calendario</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_contacts.png');" onclick="window.open('http://contacts.google.com','_blank'); closeUserMenu();">Contactos</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_hangouts.png');" onclick="window.open('http://hangouts.google.com','_blank'); closeUserMenu();">Hangouts</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_sheets.png');" onclick="window.open('http://docs.google.com/spreadsheets/','_blank'); closeUserMenu();">Hójas de Cálculo</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_docs.png');" onclick="window.open('http://docs.google.com/document/','_blank'); closeUserMenu();">Documentos</div>
                <div class="divTopMenuUserOption" style="background-image: url('img/google_slides.png');" onclick="window.open('http://docs.google.com/presentation/','_blank'); closeUserMenu();">Presentaciones</div>
                <br />
                <div class="divTopMenuUserOption" style="background-image: url('img/logout.png');" onclick="window.location = 'index.php';">Cerrar Sesión</div>
            </td>
        </tr>
        <tr><td width="204" height="*" onclick="closeUserMenu();"></td></tr>
    </table>
</div>