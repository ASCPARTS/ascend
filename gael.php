<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
    <div class="MainTitle">CLIENTES</div>
    <div class="MainContainer">
    <div class="SubTitle">Registro de clientes</div>
        <div class="ButtonContainer">  
            <button class="btn btnOnlineGreen" type="button" id="myBtn" onclick="getModal('myModal','closeModal')">Nuevo</button> 
        </div>
        <div class="row">
            <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
                <table>
                    <thead>
                        <tr>
                          <th></th>
                          <th>P.O. NUMERO</th>
                          <th># Factura</th>
                          <th>Editar</th>
                          <th>Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BAMTOP</td>
                            <td>9462</td>
                            <td>BTJ2015012901</td>
                            <td>
                                <button class="btn btnOverYellow" id="btnEditar1" onclick="getModal('modalEditar','closeEditar')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btnBrandRed">Cancelar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     

        <!--ROW DEL MODAL CREAR [INICIO]-->
        <div class="row">
        
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeModal" class="close">×</span>
                    <div class="MainTitle">Nuevo registro</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>OPTION1</option>
                                        <option>OPTION2</option>
                                        <option>OPTION3</option>
                                    </select>
                                    <label for="select1">SELECT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1">
                                    <label for="text1">TEXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2">
                                    <label for="text2">TEXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1">
                                    <label for="date1">FECHA</label>
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
        <!--ROW DEL MODAL CREAR [FIN]-->

        <!--ROW DEL MODAL EDITAR[INICIO]-->
        <div class="row">
        
            <div id="modalEditar" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span id="closeEditar" class="close">×</span>
                    <div class="MainTitle">Editar registro</div>
                    <div class="MainContainer" id="nuevoPedimento">
                        <div class="row">
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divSelect">
                                    <select id="select1">
                                        <option>OPTION1</option>
                                        <option selected>OPTION2</option>
                                        <option>OPTION3</option>
                                    </select>
                                    <label for="select1">SELECT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text1" value="TEXT">
                                    <label for="text1">TEXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputText">
                                    <input type="text" id="text2" value="TEXT">
                                    <label for="text2">TEXT</label>
                                </div>
                            </div>
                            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                                <div class="divInputDate">
                                    <input type="date" id="date1" value="2016-03-01">
                                    <label for="date1">FECHA</label>
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