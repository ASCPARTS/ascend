/*funcion para recopilar las fechas y estatus y en automatico mandar la ejecucion de la consulta 
que traen las promociones activas*/
$('document').ready(function(){
    getPromo();
});
/*obtienen la lista de las promociones activas y las muestra*/
function getPromo(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=getPromotion";
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#tblPromo').html($jsnPhpScriptResponse.promotionList);
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function($e){
                alert('Error de sistema, contactar al administrador...Lindo día');
                console.log($e);
            }
        });
    });
}
/*funcion que pinta la informacion de la promocion y los filtros*/
function getInfoFilter($intIdForecast){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#strName').val('');
        $('#strType option:eq(0)').prop('selected',true);
        $('#intQuantity').val('');
        $('#intWarehouse').val('');
        $('#intPeriod1').val('');
        $('#decFactor1').val('');
        $('#intPeriod2').val('');
        $('#decFactor2').val('');
        $('#divPeriodFactor').html('');
        $('#intFamily option:eq(0)').prop('selected',true);
        $('#intBrand option:eq(0)').prop('selected',true);
        $('#intGroup option:eq(0)').prop('selected',true);
        $('#intWarehouse option:eq(0)').prop('selected',true);
        $('#divProduct').html('');
        $('#divProduct').empty();
        $('#modalAdd').hide();
        $('#btnOrder').hide();
        $('#saveNew').hide();
        $('#divPeriods').html('');
        $intPeriod=0;
        $arrPeriods=[];
        if($intIdForecast!=0){
            $('#update').attr('intIdPromo',$intIdForecast);
        }
        getProductList($intIdForecast);
    });
}
/*funcion que obtiene la lista de los sku´s que esten en promo o no*/
function getProductList($intIdForecast){
    $('#divProduct').html('');
    $('#divWorkingBackground').fadeIn('slow',function() {
        $strQueryString = "strProcess=getNewPromo&intIdForecast=" + $intIdForecast + "&strSKU=" + $('#strSKU').val() + "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divProduct').html($jsnPhpScriptResponse.productList);
                if($intIdForecast!=0){
                    $('#divProduct').show();
                    $('#strName').val($jsnPhpScriptResponse.strName).attr('disabled','disabled');
                    $('#strType').val($jsnPhpScriptResponse.strTypeProjection).attr('disabled','disabled');
                    $('#intQuantity').val($jsnPhpScriptResponse.intQuantity).attr('disabled','disabled');
                    $('#intWarehouse').val($jsnPhpScriptResponse.intWarehouse).attr('disabled','disabled');
                    $('#divPeriods').html($jsnPhpScriptResponse.periodList);
                    $('#btnOrder').show();
                }else{
                    $('#strName').removeAttr('disabled');
                    $('#strType').removeAttr('disabled');
                    $('#intQuantity').removeAttr('disabled');
                    $('#intWarehouse').removeAttr('disabled');
                    $('#divPeriodFactor').hide();
                    $('#divProduct').hide();
                    $('#divFilterTitle').show();
                    $('#divFilter').show();
                    $('#saveNew').show();
                    addPeriod();
                }

                $('#modalAdd').show('fast', function () {
                    $('#divWorkingBackground').fadeOut('slow');
                });
            },
            error: function ($objError) {
                alert('ps que crees ...');
                console.log($objError);
            }
        });
    });
}
/*guardar valores*/
function saveValues(){
    if($('#intPeriod' + $intPeriod).val().trim()==''){
        $('#intPeriod' + $intPeriod).focus();
        return;
    }
    if($('#decFactor' + $intPeriod).val().trim()==''){
        $('#decFactor' + $intPeriod).focus();
        return;
    }
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=saveValues&strName="+$('#strName').val() + "&strType=" + $('#strType').val() + "&intQuantity=" + $('#intQuantity').val() +"&intWarehouse="+$('#intWarehouse').val()+"&intFamily="+$('#intFamily').val();
        for($intx=0;$intx<$arrPeriods.length;$intx++){
            $strQueryString+="&intPeriod" +$intx+"=" + $('#intPeriod'+$arrPeriods[$intx]).val() + "&decFactor" +$intx+"=" + $('#decFactor'+$arrPeriods[$intx]).val();
        }
        $strQueryString+="&intArrLength=" + $arrPeriods.length;

        console.log($strQueryString);
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                alert('Promoción almacenada exitosamente');
                $('#modalAdd').hide();
                getPromo();
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function($e){
                alert('No se almaceno la información, contactar al administrador...');
                console.log($e);
            }
        });
    });
}
function cancelPromo($intId){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $strQueryString = "strProcess=cancelPromo&intId=" + $intId;
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                alert("Se elimino la la Promoción");
                getPromo();
                $('#myModal').show('fast',function(){
                    $('#divWorkingBackground').fadeOut('slow');
                });
            }
        });
    });
}
function deletePeriod($name){
    $('#' + $name).remove();
}
$intPeriod=1;
$arrPeriods = [];
function addPeriod(){
    if($arrPeriods.indexOf($intPeriod)!=-1){
        if($('#intPeriod' + $intPeriod).val().trim()==''){
            $('#intPeriod' + $intPeriod).focus();
            return;
        }
        if($('#decFactor' + $intPeriod).val().trim()==''){
            $('#decFactor' + $intPeriod).focus();
            return;
        }
        $('#intPeriod' + $intPeriod).attr('disabled','disabled');
        $('#decFactor' + $intPeriod).attr('disabled','disabled');
        $('#imgAdd' + $intPeriod).attr('src','less.png');
        $('#imgAdd' + $intPeriod).attr('onclick','deletePeriod(' + $intPeriod + ');')
    }

    $intPeriod++;
    $arrPeriods.push($intPeriod);

    $strNewPeriod = '<div class="row" id="divPeriod_' + $intPeriod + '">';
    $strNewPeriod += "<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>" +
        "<div class='divInputText calendarYellow'>" +
        "<input type='text' class='period' name='intPeriod" + $intPeriod +"' id='intPeriod" + $intPeriod + "' value=''>" +
        "<label>Periodo</label>" +
        "</div>" +
        "</div>" +
        "<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>" +
        "<div class='divInputText numberYellow'>" +
        "<input type='text' name='decFactor" + $intPeriod +"' id='decFactor" + $intPeriod + "' value=''>" +
        "<label>Factor</label>" +
        "</div>" +
        "</div>" +
        "<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>"+
        "<input type='image' src='add.png' id='imgAdd" + $intPeriod + "' width='30' height='30' onclick='addPeriod();'>";
    "</div>";

    $('#divPeriods').append($strNewPeriod);
}
function deletePeriod($intPeriod){
    $arrPeriods.splice($arrPeriods.indexOf($intPeriod),1);
    $('#divPeriod_' + $intPeriod).remove();
}
function totalPeriod(){
    importe_total = 0;
    for($intx=0;$intx<$arrPeriods.length;$intx++){
        importe_total = importe_total + parseInt($('#intPeriod' + $arrPeriods[$intx]).val());
    };

    if(importe_total==$('#intQuantity').val()){
        saveValues();
    }else{
        alert('La suma de los periodos es diferente a la cantidad de semanas a proyectar')
    }

}
