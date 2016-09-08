<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Numero Guia</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText searchGray">
                <input type="text">
                <label>Buscar</label>
            </div>
        </div>
    </div>
    <div class="ButtonContainer">
        <input type="button" class="btn btnOnlineGreen" value="Nuevo" onclick="getModal('guia','close')">
    </div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Numero de Orden de Compra</th>
                <th>Numero de Factura</th>
                <th>Fecha de Compra</th>
                <th>Fecha de Registro</th>
                </thead>

                <tbody>
                <tr>
                    <td>45823</td>
                    <td>8456</td>
                    <td>2/08/2016</td>
                    <td>7/09/2016</td>
                </tr>
                <tr>
                    <td>45823</td>
                    <td>8456</td>
                    <td>2/08/2016</td>
                    <td>7/09/2016</td>
                </tr>
                <tr>
                    <td>45823</td>
                    <td>8456</td>
                    <td>2/08/2016</td>
                    <td>7/09/2016</td>
                </tr>
                <tr>
                    <td>45823</td>
                    <td>8456</td>
                    <td>2/08/2016</td>
                    <td>7/09/2016</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="guia" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="close" class="close">×</span>
        <div class="MainTitle">Nuevo Numero de Guia</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText billYellow">
                        <input type="text">
                        <label>Numero de orden de compra</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText billYellow">
                        <input type="text">
                        <label>numero de factura</label>
                    </div>
                </div>
                <div class="col-lg-1-3 col-md-1-3 col-sm-1-2">
                    <div class="divInputText barCodeYellow">
                        <input type="text">
                        <label>numero guia</label>
                    </div>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" class="btn btnOnlineGreen" value="Agregar">
            </div>
            <br style="clear: both;" />
        </div>


    </div>

</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>
</html>