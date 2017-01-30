<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="css.css?v=<?php echo date('Ymdhis') ;?>">
</head>
<body>
<div class="MainTitle" id="divTitle">Cotizacion/Orden de Venta</div>
<div class="MainContainer">
    <div id="divFormSubmit" class="ButtonContainer">
        <input id="btnGetReport" type="button" class="btnBrandBlue btn" value="crear orden" style="" onclick="openForm(-1);">
    </div>
    <br style="clear: both;" />
    <div style="width: 100%; height: calc(100% - 45px); overflow-x: auto; overflow-y: auto; ">
        aqui ira el grid de ordenes
    </div>
</div>

<div id="divSaleOrder" class="divModalBackground">
    <div class="divModalMain">
        <div class="divModalBar"><label class="lblClose" onclick="closeModal();">&#10005</label></div>
        <div class="divModalWorkArea">
            <div class="col-xs-1-1 col-sm-1-1 col-md-1-1 col-md-1-1 col-lg-1-1" id="inputClientSearch" >
                <div class="divInputText searchYellow">
                    <input type="text" id="strClient" onkeyup="clientSearch();">
                    <div id="divClientList" class="divClientList"></div>
                    <label for="strClient">Buscar Cliente</label>
                </div>
            </div>
            <div class="col-xs-1-1 col-sm-1-1 col-md-1-1 col-md-1-1 col-lg-1-1" id="labelClientName">
                <div class="divInputText userGray">
                    <input type="text" id="strClientName" class="inputAsLabel" disabled="disabled">
                    <label for="strClientName">Razón Social</label>
                </div>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5 col-md-1-5 col-lg-1-5" id="labelClientNumber">
                <div class="divInputText numberGray">
                    <input type="text" id="strClientNumber" class="inputAsLabel" disabled="disabled">
                    <label for="strClientNumber">Número de Cliente</label>
                </div>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5 col-md-1-5 col-lg-1-5" id="labelClientRFC">
                <div class="divInputText numberGray">
                    <input type="text" id="strClientRFC" class="inputAsLabel" disabled="disabled">
                    <label for="strClientRFC">RFC</label>
                </div>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5 col-md-1-5 col-lg-1-5" id="labelClientClass">
                <div class="divInputText numberGray">
                    <input type="text" id="strClientClass" class="inputAsLabel" disabled="disabled">
                    <label for="strClientClass">Clase</label>
                </div>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5 col-md-1-5 col-lg-1-5" id="labelClientZone">
                <div class="divInputText numberGray">
                    <input type="text" id="strClientZone" class="inputAsLabel" disabled="disabled">
                    <label for="strClientZone">Zona</label>
                </div>
            </div>
            <div class="col-xs-1-5 col-sm-1-5 col-md-1-5 col-md-1-5 col-lg-1-5" id="labelClientStatus">
                <div class="divInputText numberGray">
                    <input type="text" id="strClientStatus" class="inputAsLabel" disabled="disabled">
                    <label for="strClientStatus">Estátus</label>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once("../../inc/include.working.php");?>
<script>
</script>
<script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
</body>
</html>