<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Cotizaciones</div>
<div class="MainContainer">
    <div class="SubTitle">Cotizaciones Pendientes</div>
    <div class="row">
    <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 tblContainer">
        <table>
            <thead>
            <tr>
                <th>Folio</th>
                <th>SKU</th>
                <th>Cantidad</th>
                <th>Existencia</th>
                <th>Faltantes</th>
                <th>Estado</th>
                <th>Cotiza</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar"  onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" onclick="getModal('modalEditar','closeEditar')" class="btnOnlineGreen btn"></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span id="closeEditar" class="close">×</span>
            <div class="MainTitle">Cotizacion</div>
            <div class="MainContainer">
                <div class="SubTitle">Cotizacion A</div>
                <div class="row">
                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1" >Proveedor</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputDate">
                            <input type="date" id="text1">
                            <label for="text1">fecha</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">tiempo de entrega</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">costo</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">Precio 1</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio 2</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio 3</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio</label>
                        </div>
                    </div>

                </div>
                <div class="SubTitle">Cotizacion B</div>
                <div class="row">
                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1" >Proveedor</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputDate">
                            <input type="date" id="text1">
                            <label for="text1">fecha</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">tiempo de entrega</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">costo</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">Precio 1</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio 2</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio 3</label>
                        </div>
                    </div>

                    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                        <div class="divInputText">
                            <input type="text" id="text1">
                            <label for="text1">precio</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-1-1 col-md-1-1 col-sm-1-1">
                        <div class="divInputTextArea">
                            <label for="textarea1">Comentarios</label>
                            <textarea id="textarea1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="ButtonContainer">
                    <input type="button" class="btnOnlineGreen btn" value="Aceptar">
                    <input type="button" class="btnBrandRed btn" value="Cancelar">
                </div>
                <br style="clear: both;" />
            </div>

        </div>

    </div>


    <br style="clear: both;" />
</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>
</html>