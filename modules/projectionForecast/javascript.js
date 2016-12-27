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
function getInfoFilter($intIdPromo){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#strName').val('');
        $('#strType option:eq(0)').prop('selected',true);
        $('#intQuantity').val('');
        $('#intWarehouse').val('');
        $('#intPeriod1').val('');
        $('#decFactor1').val('');
        $('#intPeriod2').val('');
        $('#decFactor2').val('');
        $('#intFamily option:eq(0)').prop('selected',true);
        $('#intBrand option:eq(0)').prop('selected',true);
        $('#intGroup option:eq(0)').prop('selected',true);
        $('#divProduct').html('');
        $('#divProduct').empty();
        $('#modalAdd').hide();
        $('#btnOrder').hide();
        $('#saveNew').hide();
        
        if($intIdPromo!=0){
            $('#update').attr('intIdPromo',$intIdPromo);
        }
        getProductList($intIdPromo);
    });
}
/*funcion que obtiene la lista de los sku´s que esten en promo o no*/
function getProductList($intIdPromo){
    $('#divProduct').html('');
    $('#divWorkingBackground').fadeIn('slow',function() {
        $strQueryString = "strProcess=getNewPromo&intIdPromo=" + $intIdPromo + "&strSKU=" + $('#strSKU').val() + "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divProduct').html($jsnPhpScriptResponse.productList);
                if($intIdPromo!=0){
                    $('#divProduct').show();
                    $('#strName').val($jsnPhpScriptResponse.strName);
                    $('#strType').val($jsnPhpScriptResponse.strTypeProjection);
                    $('#intQuantity').val($jsnPhpScriptResponse.intQuantity);
                    $('#intWarehouse').val($jsnPhpScriptResponse.intWarehouse);
                    $('#intPeriod1').val($jsnPhpScriptResponse.intPeriod1);
                    $('#intPeriod2').val($jsnPhpScriptResponse.intPeriod2);
                    $('#decFactor1').val($jsnPhpScriptResponse.decFactor1);
                    $('#decFactor2').val($jsnPhpScriptResponse.decFactor2);
                    $('#btnOrder').show();
                }else{
                    $('#divProduct').hide();
                    $('#divFilterTitle').show();
                    $('#divFilter').show();
                    $('#saveNew').show();
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
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=saveValues&strName="+$('#strName').val() + "&strType=" + $('#strType').val() + "&intQuantity=" + $('#intQuantity').val() +"&intWarehouse="+$('#intWarehouse').val()+ "&intPeriod1=" + $('#intPeriod1').val() + "&decFactor1=" + $('#decFactor1').val() + "&intPeriod2=" + $('#intPeriod2').val()+ "&decFactor2=" + $('#decFactor2').val()+ "&intPeriod3=" + $('#intPeriod3').val()+ "&decFactor3=" + $('#decFactor3').val()+ "&intPeriod4=" + $('#intPeriod4').val()+ "&decFactor4=" + $('#decFactor4').val()+ "&intPeriod5=" + $('#intPeriod5').val()+ "&decFactor5=" + $('#decFactor5').val()+ "&intPeriod6=" + $('#intPeriod6').val()+ "&decFactor6=" + $('#decFactor6').val()+ "&intPeriod7=" + $('#intPeriod7').val()+ "&decFactor7=" + $('#decFactor7').val()+ "&intPeriod8=" + $('#intPeriod8').val()+ "&decFactor8=" + $('#decFactor8').val()+ "&intPeriod9=" + $('#intPeriod9').val()+ "&decFactor9=" + $('#decFactor9').val()+ "&intPeriod10=" + $('#intPeriod10').val()+ "&decFactor10=" + $('#decFactor10').val()+ "&intPeriod11=" + $('#intPeriod11').val()+ "&decFactor11=" + $('#decFactor11').val()+ "&intPeriod12=" + $('#intPeriod12').val()+ "&decFactor12=" + $('#decFactor12').val();
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
function agregarCampo(){
    campos=2;
    campos = campos + 1;
    var NvoCampo= document.createElement("div");
    NvoCampo.id= "divcampo_"+(campos);
    NvoCampo.innerHTML=
        "<div class='col-lg-1-5 col-md-1-5 col-sm-1-4 col-xs-1-3'>" +
        "<div class='divInputText calendarYellow'>" +
        "<input type='text' id='intPeriod3'>" +
        "        <input type='text' size='50' name='articu_" + campos +
        "' id='articu_" + campos + "'>" +
        "<label>Periodo</label>" +
        "</div>>" +
        "        <a href='JavaScript:quitarCampo(" + campos +");'> Quitar </a>" +
        "     </td>" +
        "   </tr>" +
        "</table>";
    var contenedor= document.getElementById("contenedorcampos");
    contenedor.appendChild(NvoCampo);
}