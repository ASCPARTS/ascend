<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Facturar</div>
<div class="MainContainer">
    <div class="row">
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
            <div class="divInputText searchGray">
                <input type="text">
                <label>Buscar Folio</label>
            </div>
        </div>
        <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 col-md-offset-2-4 col-lg-offset-2-4">
            <div class="divSelect searchGray">
                <select>
                    <option>Todos</option>
                    <option>Pendiente</option>
                    <option>Enviado</option>
                    <option>Pendiente/urgente</option>
                </select>
                <label>Buscar por estatus</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>Folio de Pedido</th>
                    <th>Fecha Compromiso</th>
                    <th>Estatus</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Enviado</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/Urgente</b></td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                </tr>
                <tr class="blue">
                    <td><b>296243</b></td>
                    <td><b>3 septiembre 2016</b></td>
                    <td><b>Pendiente/urgente</b></td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Enviado</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr>
                    <td>167823</td>
                    <td>25 agosto 2016</td>
                    <td>Enviado</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                <tr>
                    <td>197263</td>
                    <td>5 octubre 2016</td>
                    <td>Pendiente</td>
                    <td><input type="button" value="Facturar" class="btn btnOnlineGreen" onclick="getModal('facturar','cerrar')"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="facturar" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span id="cerrar" class="close">×</span>
        <div class="MainTitle">Facturar</div>
        <div class="MainContainer">
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText billYellow">
                        <input type="text">
                        <label>Folio</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText userYellow">
                        <input type="text">
                        <label>Cliente</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divSelect creditCardYellow">
                        <select>
                            <option>Contado</option>
                            <option>Credito</option>
                        </select>
                        <label>Metodo de Pago</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divSelect shipmentYellow">
                        <select>
                            <option>Paqueteria</option>
                            <option>Vehiculo Propio</option>
                            <option>Otros</option>
                        </select>
                        <label>Medio de Embarque</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divSelect packageYellow">
                        <select>
                            <option>Estafeta</option>
                            <option>DHL</option>
                            <option>UPS</option>
                        </select>
                        <label>Paqueteria</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText barCodeYellow">
                        <input type="text">
                        <label>Número guia</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText storeYellow">
                        <input type="text">
                        <label>sucursal</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>moneda</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText referenceGray">
                        <input type="text">
                        <label>referencia</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText creditCardYellow">
                        <input type="text">
                        <label>condicion de pago</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText coinYellow">
                        <input type="text">
                        <label>tipo de cambio</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4">
                    <div class="divInputText weightYellow">
                        <input type="text">
                        <label>peso volumetrico</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                    <table >
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Impuestos</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>4</td>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>9</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>4</td>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>9</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        <tr>
                            <td>87653</td>
                            <td>Bateria para iphone 6</td>
                            <td>4</td>
                            <td>300.16</td>
                            <td>12.04</td>
                            <td>312.20</td>
                        </tr>
                        <tr>
                            <td>89321</td>
                            <td>Display LCD para ipad</td>
                            <td>9</td>
                            <td>300</td>
                            <td>11</td>
                            <td>311.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 col-md-offset-2-4 col-lg-offset-2-4">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>Sub-total</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 ">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>total descuento</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 col-md-offset-2-4 col-lg-offset-2-4">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>Sub-total</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 ">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>total impuestos</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 col-md-offset-2-4 col-lg-offset-2-4">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>total retencion</label>
                    </div>
                </div>
                <div class="col-lg-1-4 col-md-1-4 col-sm-1-4 ">
                    <div class="divInfo">
                        <span type="text"></span>
                        <label>gran total</label>
                    </div>
                </div>
            </div>


            <div class="ButtonContainer">
                <input type="button" value="Aceptar" class="btn btnOnlineGreen">
            </div>
            <br style="clear: both;" />
        </div>

    </div>
    <script type="text/javascript" src="../../js/modal.js"></script>
<script type="text/javascript" src="../../js/modal.js"></script>

</body>
</html>

