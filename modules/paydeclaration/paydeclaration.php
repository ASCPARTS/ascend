<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    
</head>
<body>
    <div class="MainTitle">CREAR PEDIMENTO</div>
    <div class="MainContainer">
        <div class="SubTitle">Datos Generales</div>
        <div class="row">
            <div class="col-md-1-2">
                <h4>Folio: 7654323456</h4> 
            </div>
            <div class="col-md-1-2">
                <h4 style="text-align: right;">Fecha: 2016/08/09</h4>
            </div>
        </div>
    <div class="SubTitle">Pedimentos</div>
        <div class="ButtonContainer">  
            <input class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalNuevo','closeNuevo')" value="Nuevo"> 
        </div>
        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                        <tr>
                            <th>EDITAR</th>
                            <th>CANCELAR</th>
                            <th>PROVEEDOR</th>
                            <th>FACTURA</th>
                            <th>FECHA PEDIMENTO</th>
                            <th>GUIA</th>
                            <th>DTA</th>
                            <th>CNT</th>
                            <th>PREV</th>
                            <th>I.V.A.</th>
                            <th>Advalorem</th>
                            <th>OTROS</th>
                            <th>IVA</th>
                            <th>A.A AMERICANA MX</th>
                            <th>DESC.</th>
                            <th>I.V.A</th>
                            <th>Honorarios</th>
                            <th>I.V.A</th>
                            <th>V. FACTURA USD</th>
                            <th>% VALOR TOTAL FACTURAS vs  VALOR FACTURA</th>
                            <th>T.C. </th>
                            <th>TOTAL PEDIMENTO CUADRO DE IMPUESTOS</th>
                            <th>VALOR A.A+PED  MX</th>
                            <th>VALOR A.A+PED USD</th>
                            <th>Flete (usd) PEDIMENTO</th>
                            <th>Flete (usd) FACTURA</th>
                            <th>STATUS F.F/ VF</th>
                            <th>GASTOS A.A + PED (SIN IVA)</th>
                            <th>% INC X GASTOS</th>
                            <th>VAL TOTAL PDTO EN CEDIS</th>
                            <th>% PUESTO EN CEDIS / VALOR FACT</th>
                            <th>ADUANA</th>
                            <th>ref imp</th>
                            <th>Impuestos</th>
                            <th>ref flet</th>
                            <th>Fletes Importacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>ASC USA</td>
                            <td>2702</td>
                            <td>01/03/2016</td>
                            <td>1ZE96Y170302217271</td>
                            <td>927</td>
                            <td>57</td>
                            <td>210</td>
                            <td>19005</td>
                            <td>1964</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8994.44</td>
                            <td>2,397.08</td>
                            <td>389.54</td>
                            <td>600.00</td>
                            <td>96.99</td>
                            <td>18.30</td>
                            <td>0.33%</td>
                            <td>18.1706</td>
                            <td>22163</td>
                            <td>34,634.03</td>
                            <td>1906.05</td>
                            <td>429.71</td>
                            <td>6.95</td>
                            <td>37.98%</td>
                            <td>15,149.51</td>
                            <td>45.56</td>
                            <td>6.23</td>
                            <td>34.17</td>
                            <td>240</td>
                            <td>TNL14929/16-753</td>
                            <td>CGO9142/CGO9143</td>
                            <td>2702-1</td>
                            <td>CGO9145</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>ASC USA</td>
                            <td>2702</td>
                            <td>01/03/2016</td>
                            <td>1ZE96Y170302217271</td>
                            <td>927</td>
                            <td>57</td>
                            <td>210</td>
                            <td>19005</td>
                            <td>1964</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8994.44</td>
                            <td>2,397.08</td>
                            <td>389.54</td>
                            <td>600.00</td>
                            <td>96.99</td>
                            <td>18.30</td>
                            <td>0.33%</td>
                            <td>18.1706</td>
                            <td>22163</td>
                            <td>34,634.03</td>
                            <td>1906.05</td>
                            <td>429.71</td>
                            <td>6.95</td>
                            <td>37.98%</td>
                            <td>15,149.51</td>
                            <td>45.56</td>
                            <td>6.23</td>
                            <td>34.17</td>
                            <td>240</td>
                            <td>TNL14929/16-753</td>
                            <td>CGO9142/CGO9143</td>
                            <td>2702-1</td>
                            <td>CGO9145</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>ASC USA</td>
                            <td>2702</td>
                            <td>01/03/2016</td>
                            <td>1ZE96Y170302217271</td>
                            <td>927</td>
                            <td>57</td>
                            <td>210</td>
                            <td>19005</td>
                            <td>1964</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8994.44</td>
                            <td>2,397.08</td>
                            <td>389.54</td>
                            <td>600.00</td>
                            <td>96.99</td>
                            <td>18.30</td>
                            <td>0.33%</td>
                            <td>18.1706</td>
                            <td>22163</td>
                            <td>34,634.03</td>
                            <td>1906.05</td>
                            <td>429.71</td>
                            <td>6.95</td>
                            <td>37.98%</td>
                            <td>15,149.51</td>
                            <td>45.56</td>
                            <td>6.23</td>
                            <td>34.17</td>
                            <td>240</td>
                            <td>TNL14929/16-753</td>
                            <td>CGO9142/CGO9143</td>
                            <td>2702-1</td>
                            <td>CGO9145</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>ASC USA</td>
                            <td>2702</td>
                            <td>01/03/2016</td>
                            <td>1ZE96Y170302217271</td>
                            <td>927</td>
                            <td>57</td>
                            <td>210</td>
                            <td>19005</td>
                            <td>1964</td>
                            <td>0</td>
                            <td>0</td>
                            <td>8994.44</td>
                            <td>2,397.08</td>
                            <td>389.54</td>
                            <td>600.00</td>
                            <td>96.99</td>
                            <td>18.30</td>
                            <td>0.33%</td>
                            <td>18.1706</td>
                            <td>22163</td>
                            <td>34,634.03</td>
                            <td>1906.05</td>
                            <td>429.71</td>
                            <td>6.95</td>
                            <td>37.98%</td>
                            <td>15,149.51</td>
                            <td>45.56</td>
                            <td>6.23</td>
                            <td>34.17</td>
                            <td>240</td>
                            <td>TNL14929/16-753</td>
                            <td>CGO9142/CGO9143</td>
                            <td>2702-1</td>
                            <td>CGO9145</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--ROW DEL MODAL [INICIO]-->
        <div class="row">
            <div id="modalNuevo" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="closeNuevo">×</span>
                    <div class="MainTitle">Nuevo Pedimento</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect providerYellow">
                                    <select id="idProveedor">
                                        <option>IMPACT</option>
                                        <option>CHINA ETERNAL CET</option>
                                        <option>LASER PROS</option>
                                        <option>ASC USA</option>
                                        <option>FEDCO BATTERIES</option>
                                        <option>SIGNAL AND POWER</option>
                                    </select>
                                    <label for="idProveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText barCodeYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Folio Factura</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA PEDIMENTO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText shipmentYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Guía</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">DTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">CNT</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">PREV</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">I.V.A.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText calculatorYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Advalorem</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1 customsYellow">
                                    <label for="text1">A.A AMERICANA MX</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText reductionYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">DESC.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText clockYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Honorarios</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText checkYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">V. FACTURA USD</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText billYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">T.C. </label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText billYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Flete (usd) PEDIMENTO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText customsYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">ADUANA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">ref imp</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Impuestos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText shipmentYellow">
                                    <input type="text" id="text1">
                                    <label for="text1">Fletes Importacion</label>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="ButtonContainer">  
                            <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                        </div>
                        
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL [FIN]-->

        <!--ROW DEL MODAL EDITAR [INICIO]-->
        <div class="row">
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="closeEditar">×</span>
                    <div class="MainTitle">Editar Pedimento</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect providerYellow">
                                    <select id="idProveedor">
                                        <option>IMPACT</option>
                                        <option>CHINA ETERNAL CET</option>
                                        <option>LASER PROS</option>
                                        <option selected>ASC USA</option>
                                        <option>FEDCO BATTERIES</option>
                                        <option>SIGNAL AND POWER</option>
                                    </select>
                                    <label for="idProveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText barCodeYellow">
                                    <input type="text" id="text1" value="2702">
                                    <label for="text1">Folio Factura</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate calendarYellow">
                                    <input type="date" id="text1" value="2016-03-01">
                                    <label for="text1">FECHA PEDIMENTO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText shipmentYellow">
                                    <input type="text" id="text1" value="1ZE96Y170302217271">
                                    <label for="text1">Guía</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="927">
                                    <label for="text1">DTA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="57">
                                    <label for="text1">CNT</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="210">
                                    <label for="text1">PREV</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="19005">
                                    <label for="text1">I.V.A.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="1964">
                                    <label for="text1">Advalorem</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText customsYellow">
                                    <input type="text" id="text1" value="8994.44">
                                    <label for="text1">A.A AMERICANA MX</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText reductionYellow">
                                    <input type="text" id="text1" value="2,397.08">
                                    <label for="text1">DESC.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText timeYellow">
                                    <input type="text" id="text1" value="600.00">
                                    <label for="text1">Honorarios</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText checkYellow">
                                    <input type="text" id="text1" value="18.30">
                                    <label for="text1">V. FACTURA USD</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText billYellow">
                                    <input type="text" id="text1" value="18.1706">
                                    <label for="text1">T.C. </label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText billYellow">
                                    <input type="text" id="text1" value="6.95">
                                    <label for="text1">Flete (usd) PEDIMENTO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText customsYellow">
                                    <input type="text" id="text1" value="240">
                                    <label for="text1">ADUANA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="TNL14929/16-753">
                                    <label for="text1">ref imp</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText discountYellow">
                                    <input type="text" id="text1" value="CGO9142/CGO9143">
                                    <label for="text1">Impuestos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText shipmentYellow">
                                    <input type="text" id="text1" value="2702-1">
                                    <label for="text1">Fletes Importacion</label>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="ButtonContainer">  
                            <input class="btn btnOnlineGreen" type="button" value="Guardar"> 
                        </div>
                        
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL [FIN]-->
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>