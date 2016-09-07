<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Kit(s) de produccion</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-md-1-4 col-lg-1-4 col-sm-1-3">
            <div class="divInputText searchGray">
                <input type="text">
                <label>buscar</label>
            </div>
        </div>
    </div>
    <div class="ButtonContainer">
        <input type="button" value="Nueva" class="btn btnOnlineGreen" onclick="getModal('nuevo','close')" >
    </div>
    <div class="row">
        <div class="tblContainer">
            <table>
                <thead>
                <th>Claave del Kit</th>
                <th>Nombre del Kit</th>
                <th>Accion</th>
                </thead>
                <tbody>
                <tr>
                    <td>23-56-1</td>
                    <td>kit numero uno</td>
                    <td><input type="button" class="btn btnOnlineGreen" value="Construir Kit" onclick="getModal('mostrar','Close')"></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="nuevo" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="close" class="close">×</span>
        <div class="MainTitle">Nuevo BOM</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-2">
                    <div class="divInputText referenceYellow">
                        <input type="text">
                        <label>nombre del kit</label>
                    </div>
                </div>
                <div class="col-lg-1-2 col-md-1-2 col-sm-1-2">
                    <div class="divInputText calculatorYellow">
                        <input type="text">
                        <label>numero de elementos</label>
                    </div>
                </div>
            </div>
            <div class="SubTitle">Componentes del Kit</div>
            <div class="row">
                <div class="tblContainer">
                    <table>
                        <thead>
                        <th>Cantidad</th>
                        <th>SKU</th>
                        <th>No. Parte</th>
                        <th>Descripcion</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" class="btn btnOnlineGreen" value="Agregar">
            </div>
            <br style="clear: both;" />
        </div>


    </div>

</div>
<div id="mostrar" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="Close" class="close">×</span>
        <div class="MainTitle">Kit #89367</div>
        <div class="MainContainer">
            <div class="row">
                <div class="tblContainer">
                    <table>
                        <thead>
                        <th>Seleccionar</th>
                        <th>Cantidad</th>
                        <th>SKU</th>
                        <th>No. Parte</th>
                        <th>Descripcion</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>245890</td>
                            <td>8765456></td>
                            <td>8765445-b</td>
                            <td>xxxxxxx</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>245890</td>
                            <td>8765456></td>
                            <td>8765445-b</td>
                            <td>xxxxxxx</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>245890</td>
                            <td>8765456></td>
                            <td>8765445-b</td>
                            <td>xxxxxxx</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>245890</td>
                            <td>8765456></td>
                            <td>8765445-b</td>
                            <td>xxxxxxx</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>245890</td>
                            <td>8765456></td>
                            <td>8765445-b</td>
                            <td>xxxxxxx</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ButtonContainer">
                <input type="button" class="btn btnOnlineGreen" value="Crear">
            </div>
            <br style="clear: both;" />
        </div>


    </div>

</div>
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>