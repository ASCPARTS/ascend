<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">TRASPASO DE MATERIAL</div>
    <div class="MainContainer">
    <div class="SubTitle"></div>
        <div class="row">
            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                <div class="divSelect">
                    <select id="select1">
                        <option>GUADALAJARA</option>
                        <option>MONTERREY</option>
                        <option>CIUDAD DE MÉXICO</option>
                        <option>LEÓN</option>
                        <option>VERACRUZ</option>
                        <option>MERIDA</option>
                        <option>CHIHUAHUA</option>
                        <option>HERMOSILLO</option>
                        <option>PUEBLA</option>
                    </select>
                    <label for="select1">ALMACEN ORIGEN</label>
                </div>
            </div>
            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                <div class="divSelect">
                    <select id="select1">
                        <option>LEÓN</option>
                        <option>GUADALAJARA</option>
                        <option>MONTERREY</option>
                        <option>CIUDAD DE MÉXICO</option>
                        <option>VERACRUZ</option>
                        <option>MERIDA</option>
                        <option>CHIHUAHUA</option>
                        <option>HERMOSILLO</option>
                        <option>PUEBLA</option>
                    </select>
                    <label for="select1">ALMACEN DESTINO</label>
                </div>
            </div>
            <div class="col-lg-1-3 col-md-1-3 col-sm-1-2 col-xs-1-1">
                <div class="text-left">  
                    <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalNuevo','closeNuevo')">Buscar Articulo</button> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>DESCRIPCIÓN</th>
                            <th>MARCA</th>
                            <th>TIPO</th>
                            <th>ORIGEN</th>
                            <th>DESTINO</th>
                            <th>CANTIDAD</th>
                            <th>QUITAR</th>
                      
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>APPLE</td>
                            <td>ORIGINAL</td>
                            <td>GUADALAJARA</td>
                            <td>MONTERREY</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>APPLE</td>
                            <td>ORIGINAL</td>
                            <td>GUADALAJARA</td>
                            <td>MONTERREY</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>APPLE</td>
                            <td>ORIGINAL</td>
                            <td>GUADALAJARA</td>
                            <td>MONTERREY</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>APPLE</td>
                            <td>ORIGINAL</td>
                            <td>GUADALAJARA</td>
                            <td>MONTERREY</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1">
                <div class="text-right">  
                    <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalAlert','closeAlert')">Finalizar traspaso</button> 
                </div>
            </div>
        </div>
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="modalNuevo" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeNuevo" class="close">×</span>
                    <div class="MainTitle">BUSCAR ARTICULO</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="buscar" value="A1357">
                                    <label for="buscar">BUSCAR</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="text-left">  
                                    <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalNuevo','closeNuevo')">Buscar Articulo</button> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                                <table>
                                    <thead>
                                        <tr>
                                            <th># PARTE</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>FAMILIA</th>
                                            <th>MARCA</th>
                                            <th>GRUPO</th>
                                            <th>TIPO</th>
                                            <th>EXISTENCIA</th>
                                            <th>CANTIDAD</th>
                                            <th>QUITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A1357</td>
                                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                                            <td>MOBILES</td>
                                            <td>APPLE</td>
                                            <td>AC ADAPTERS</td>
                                            <td>ORIGINAL</td>
                                            <td>100</td>
                                            <td><input type="text"></td>
                                            <td>
                                                <button class="btn btnOnlineGreen">Agregar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>A1357</td>
                                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                                            <td>MOBILES</td>
                                            <td>APPLE</td>
                                            <td>AC ADAPTERS</td>
                                            <td>GENERICO</td>
                                            <td>50</td>
                                            <td><input type="text"></td>
                                            <td>
                                                <button class="btn btnOnlineGreen">Agregar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>A1357</td>
                                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                                            <td>MOBILES</td>
                                            <td>APPLE</td>
                                            <td>AC ADAPTERS</td>
                                            <td>REFURBISHED</td>
                                            <td>90</td>
                                            <td><input type="text"></td>
                                            <td>
                                                <button class="btn btnOnlineGreen">Agregar</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL CREAR [FIN]-->
        <!--ROW DEL MODAL ALERT [INICIO]-->
        <div class="row">
        
            <div id="modalAlert" class="modal">

                <!-- Modal content -->
                <div class="alert-content">
                    <span id="closeAlert" class="close">×</span>
                    <div class="MainTitle">Alerta</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row text-center">
                            <h3>¿Estás seguro que deseas finalizar el traspaso?</h4>
                        </div>

                        <div class="col-lg-offset-1-5 col-lg-1-5 col-md-offset-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                             
                                <button class="btn btnOnlineGreen" type="button">Aceptar</button>
                            
                        </div>
                        <div class="col-lg-offset-1-5 col-lg-1-5 col-md-offset-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                             
                                <button class="btn btnBrandRed" type="button">Cancelar</button>
                            
                        </div>
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL EDITAR [FIN]-->
        
        
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
<script type="text/javascript" src="../../js/alert.js"></script>
</html>