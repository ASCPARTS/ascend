<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">RECEPCIÓN DE MATERIAL</div>
    <div class="MainContainer">
    <div class="SubTitle">Seguimiento de material</div>
        <div class="ButtonContainer">  
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('myModal','closeModal')">Nuevo</button> 
        </div>
        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                        <tr>
                          <th>EDITAR</th>
                          <th>CANCELAR</th>
                          <th>PROVEEDOR</th>
                          <th>P.O. NUMERO</th>
                          <th># Factura</th>
                          <th>USD$</th>
                          <th>COMPAÑIA</th>
                          <th>GUIA</th>
                          <th># BULTOS</th>
                          <th>FECHA RECEPCION DE DOCUMENTOS</th>
                          <th>ESTADO</th>
                          <th>LLEGO A A.A.</th>
                          <th>AGENCIA ADUANAL</th>
                          <th>FECHA CRUCE ADUANA</th>
                          <th>OBSERVACIONES</th>
                          <th>DIAS DE TRÁNSITO (HÁBILES)</th>
                          <th>META</th>
                          <th>% FLETE SOBRE VALOR MERCANCIA</th>
                          <th>META</th>
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
                            <td>BAMTOP</td>
                            <td>9462</td>
                            <td>BTJ2015012901</td>
                            <td>1289.97</td>
                            <td>DHL</td>
                            <td>3836581011</td>
                            <td>1</td>
                            <td>04/02/2015</td>
                            <td>DESPACHO</td>
                            <td>11/02/2015</td>
                            <td>BRENNAN</td>
                            <td>11/02/2015</td>
                            <td>DESPACHO 13/02/2015 PED 3038 5000844</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8%</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>BAMTOP</td>
                            <td>9462</td>
                            <td>BTJ2015012901</td>
                            <td>1289.97</td>
                            <td>DHL</td>
                            <td>3836581011</td>
                            <td>1</td>
                            <td>04/02/2015</td>
                            <td>DESPACHO</td>
                            <td>11/02/2015</td>
                            <td>BRENNAN</td>
                            <td>11/02/2015</td>
                            <td>DESPACHO 13/02/2015 PED 3038 5000844</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8%</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>BAMTOP</td>
                            <td>9462</td>
                            <td>BTJ2015012901</td>
                            <td>1289.97</td>
                            <td>DHL</td>
                            <td>3836581011</td>
                            <td>1</td>
                            <td>04/02/2015</td>
                            <td>DESPACHO</td>
                            <td>11/02/2015</td>
                            <td>BRENNAN</td>
                            <td>11/02/2015</td>
                            <td>DESPACHO 13/02/2015 PED 3038 5000844</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8%</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btnOverYellow" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                            <td>BAMTOP</td>
                            <td>9462</td>
                            <td>BTJ2015012901</td>
                            <td>1289.97</td>
                            <td>DHL</td>
                            <td>3836581011</td>
                            <td>1</td>
                            <td>04/02/2015</td>
                            <td>DESPACHO</td>
                            <td>11/02/2015</td>
                            <td>BRENNAN</td>
                            <td>11/02/2015</td>
                            <td>DESPACHO 13/02/2015 PED 3038 5000844</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8%</td>
                            <td>10%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     

        <!--ROW DEL MODAL [INICIO]-->
        <div class="row">
        
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeModal" class="close">×</span>
                    <div class="MainTitle">Nuevo registro</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BAMTOP</option>
                                        <option>Hongkong XH Co., Limited</option>
                                        <option>BIGBLUE</option>
                                        <option>CIRCUIT MKT</option>
                                        <option>ITEM INC</option>
                                        <option>CET</option>
                                        <option>ASC USA</option>
                                        <option>FEDCO</option>
                                        <option>LASER PROS</option>
                                        <option>SSIT HUB</option>
                                    </select>
                                    <label for="idProveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">P.O. NUMERO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">Número Factura</label>
                                </div>
                            </div>
                        
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">USD$</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>CONWAY</option>
                                        <option>UPS</option>
                                        <option>FEDEX</option>
                                        <option>DHL</option>
                                        <option>ROAD RUNNER</option>
                                        <option>SAIA</option>
                                        <option>SOUTFREIGHT</option>
                                        <option>RADIANT</option>
                                        <option>ESTES EXPRESS</option>
                                        <option>VARIOS</option>
                                    </select>
                                    <label for="idProveedor">COMPAÑIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">GUÍA</label>
                                </div>
                            </div>
                        
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">NÚMERO DE BULTOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">RECEPCION DE DOCUMENTOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>DESPACHO</option>
                                        <option>RETORNO</option>
                                        <option>TRANSITO</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                        
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA LLEGO A A.A.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BRENNAN</option>
                                        <option>UPS</option>
                                        <option>CODEX</option>
                                        <option>HDL</option>
                                        <option>AMERICA</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">FECHA CRUCE ADUANA</label>
                                </div>
                            </div>
                        
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">DIAS DE TRÁNSITO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">PORCENTAJE FLETE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                        
                            <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                                <div class="divInputTextArea">
                                    <label for="textarea1">OBSERVACIONES</label>
                                    <textarea id="textarea1"></textarea>
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

        <!--ROW DEL MODAL EDITAR[INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">Editar registro</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BAMTOP</option>
                                        <option>Hongkong XH Co., Limited</option>
                                        <option>BIGBLUE</option>
                                        <option>CIRCUIT MKT</option>
                                        <option>ITEM INC</option>
                                        <option>CET</option>
                                        <option>ASC USA</option>
                                        <option>FEDCO</option>
                                        <option>LASER PROS</option>
                                        <option>SSIT HUB</option>
                                    </select>
                                    <label for="idProveedor">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="9462">
                                    <label for="text1">P.O. NUMERO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="BTJ2015012901">
                                    <label for="text1">Número Factura</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="1289.97">
                                    <label for="text1">USD$</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>CONWAY</option>
                                        <option>UPS</option>
                                        <option>FEDEX</option>
                                        <option selected>DHL</option>
                                        <option>ROAD RUNNER</option>
                                        <option>SAIA</option>
                                        <option>SOUTFREIGHT</option>
                                        <option>RADIANT</option>
                                        <option>ESTES EXPRESS</option>
                                        <option>VARIOS</option>
                                    </select>
                                    <label for="idProveedor">COMPAÑIA</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="3836581011">
                                    <label for="text1">GUÍA</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="1">
                                    <label for="text1">NÚMERO DE BULTOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1" value="2015-02-04">
                                    <label for="text1">RECEPCION DE DOCUMENTOS</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>DESPACHO</option>
                                        <option>RETORNO</option>
                                        <option>TRANSITO</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1" value="2015-01-08">
                                    <label for="text1">FECHA LLEGO A A.A.</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="idProveedor">
                                        <option>BRENNAN</option>
                                        <option>UPS</option>
                                        <option>CODEX</option>
                                        <option>HDL</option>
                                        <option>AMERICA</option>
                                    </select>
                                    <label for="idProveedor">ESTADO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="text1" value="2015-02-11">
                                    <label for="text1">FECHA CRUCE ADUANA</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="5">
                                    <label for="text1">DIAS DE TRÁNSITO</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="8">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="8%">
                                    <label for="text1">PORCENTAJE FLETE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="10%">
                                    <label for="text1">META</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1-1 col-md-1-1 col-sm-1-2 col-xs-1-1">
                                <div class="divInputTextArea">
                                    <label for="textarea1">OBSERVACIONES</label>
                                    <textarea id="textarea1">DESPACHO 13/02/2015 PED 3038 5000844</textarea>
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