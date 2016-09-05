<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">FAMILIA</div>
    <div class="MainContainer">
    <div class="SubTitle">REGISTRO DE FAMILIAS</div>
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
                            <th>FAMILIA</th>
                            <th>MARCA</th>
                            <th>GRUPO</th>
                            <th>TIPO</th>
                            <th>CANTIDAD</th>
                            <th>QUITAR</th>
                      
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>MOBILES</td>
                            <td>APPLE</td>
                            <td>AC ADAPTERS</td>
                            <td>ORIGINAL</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>MOBILES</td>
                            <td>APPLE</td>
                            <td>AC ADAPTERS</td>
                            <td>ORIGINAL</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>MOBILES</td>
                            <td>APPLE</td>
                            <td>AC ADAPTERS</td>
                            <td>ORIGINAL</td>
                            <td>10</td>
                            <td>
                                <button class="btn btnBrandRed">Quitar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6526254</td>
                            <td>A1357 ORIGINAL AC ADAPT FOR APPLE IPHONE IPAD IPOD 5.1 V 2.1 A SIN CABLE DATOS</td>
                            <td>MOBILES</td>
                            <td>APPLE</td>
                            <td>AC ADAPTERS</td>
                            <td>ORIGINAL</td>
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
                    <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('modalFinalizar','closeFinalizar')">Finalizar traspaso</button> 
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
                            
                            
                        </div>

                        
                        <br style="clear: both;" />
                    </div>

                </div>

            </div>
        </div>
        <!--ROW DEL MODAL CREAR [FIN]-->
        <!--ROW DEL MODAL EDITAR [INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">EDITAR FAMILIA</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="F01">
                                    <label for="text2">CLAVE</label>
                                </div>
                            </div>
                            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="IMPRESORAS">
                                    <label for="text2">NOMBRE</label>
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
        <!--ROW DEL MODAL EDITAR [FIN]-->
        
        
        <br style="clear: both;" />
    </div>

</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>