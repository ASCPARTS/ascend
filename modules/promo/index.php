<?php
ini_set("display_errors",1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle" id="divTitle">Promociones</div>
<div class="MainContainer">
    <div id="divFormFilters" class="row">
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divInputText calendarYellow"><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateFrom"><label>Fecha (de)</label></div></div>
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divInputText calendarYellow "><input type="text" class="datepicker-here" style="cursor: pointer" onkeydown="return false;" value="<?php echo date('Y-m-d'); ?>" id="intDateTo"><label>Fecha (hasta)</label></div></div>
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5"><div class="divSelect groupYellow"><select id="strStatus"><option value="'A'" selected="selected">Activas</option><option value="'C'">Canceladas</option><option value="'A','C'">Ambas</option></select><label>Estatus</label></div></div>
    </div>
    <div id="divFormSubmit" class="ButtonContainer">
        <input id="btnGetReport" type="button" class="btnOnlineGreen btn" value="Filtrar" onclick="getPromoList();">
        <input id="btnGetReport" type="button" class="btnBrandBlue btn" value="Nueva" onclick="">
    </div>
    <div id="divPromoList" style="width: 100%; height: calc(100% - 35px); overflow-x: hidden; overflow-y: hidden; display: block; margin: 0 0 0 0; ">
    </div>
    <br style="clear: both;" />
</div>
<?php require_once("../../inc/include.working.php");?>
<script>

</script>
<script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
</body>
</html>

