<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            margin-bottom: 100px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        h3{
            color: #0086cc;
        }
    </style>
</head>
<body>
<div class="MainTitle">Cotizaciones</div>
<div class="MainContainer">
    <div class="SubTitle">Cotizaciones Pendientes</div>
    <div class="row">
        <table border="1px soli gray" width="100%">
            <tr style="text-align: center">
                <td><h3>Folio</h3></td>
                <td><h3>SKU</h3></td>
                <td><h3>Cantidad</h3></td>
                <td><h3>Existencia</h3></td>
                <td><h3>Faltantes</h3></td>
                <td><h3>Estado</h3></td>
                <td><h3>Cotizar</h3></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td>Pendiente</td>
                <td style="text-align: center"><input type="button" value="Cotizar" id="myBtn" class="btnOnlineGreen btn"></td>
            </tr>
        </table>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">×</span>
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