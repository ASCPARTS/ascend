/*funcion para recopilar las fechas y estatus y en automatico mandar la ejecucion de la consulta 
que traen las promociones activas*/
$('document').ready(function(){
    $('#intDateFrom').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateFrom').val().split('-').join(''))>parseInt($('#intDateTo').val().split('-').join(''))){$('#intDateTo').val($('#intDateFrom').val());}}});
    $('#intDateTo').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateTo').val().split('-').join(''))<parseInt($('#intDateFrom').val().split('-').join(''))){$('#intDateFrom').val($('#intDateTo').val());}}});

    $('#intDateNewFrom').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateNewFrom').val().split('-').join(''))>parseInt($('#intDateNewTo').val().split('-').join(''))){$('#intDateNewTo').val($('#intDateNewFrom').val());}}});
    $('#intDateNewTo').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateNewTo').val().split('-').join(''))<parseInt($('#intDateNewFrom').val().split('-').join(''))){$('#intDateNewFrom').val($('#intDateNewTo').val());}}});

    getPromo();
});
/*funcion para cerrar los modales de editar y agregar*/
function closeLModal(){
    $('#modalAdd').hide();
}
/*obtienen la lista de las promociones activas y las muestra*/
function getPromo(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=getPromotion&intDateFrom=" + $('#intDateFrom').val().substr(0,4) + $('#intDateFrom').val().substr(5,2) + $('#intDateFrom').val().substr(8,2) + "000000&intDateTo=" + $('#intDateTo').val().substr(0,4) + $('#intDateTo').val().substr(5,2) + $('#intDateTo').val().substr(8,2) + "999999&strStatus=" + $('#strStatus').val();
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
        $('#strDiscount option:eq(0)').prop('selected',true);
        $('#intDiscount').val('');
        $('#intDateNewFrom').val($intDD);
        $('#intDateNewTo').val($intDD);
        $('#strSKU').val('');
        $('#strPartNumber').val('');
        $('#intFamily option:eq(0)').prop('selected',true);
        $('#intBrand option:eq(0)').prop('selected',true);
        $('#intGroup option:eq(0)').prop('selected',true);
        $('#divProduct').html('');
        $('#divPriceListTitle').hide();
        $('#divPriceList').hide();
        $('#divHistoryTitle').hide();
        $('#divHistory').hide();
        $('#divFilterTitle').hide();
        $('#divFilter').hide();
        $('#myBtnFilter').hide();
        $('#divProduct').empty();
        getProductList($intIdPromo);
    });
}
/*funcion que obtiene la lista de los sku´s que esten en promo o no*/
function getProductList($intIdPromo){
    $('#divProduct').html('');
    $('#divWorkingBackground').fadeIn('slow',function() {
        $strQueryString = "strProcess=getNewPromo&intIdPromo=" + $intIdPromo + "&strSKU=" + $('#strSKU').val() + "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();

        console.log("ajax.php?" + $strQueryString);

        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divProduct').html($jsnPhpScriptResponse.productList);
                $('#divPriceList').html($jsnPhpScriptResponse.priceList);
                if($intIdPromo!=0){
                    $('#divHistory').html($jsnPhpScriptResponse.historyPromotion);
                    $('#divPriceListTitle').show();
                    $('#divPriceList').show();
                    $('#divHistoryTitle').show();
                    $('#divHistory').show();
                    $('#strName').val($jsnPhpScriptResponse.strName);
                    $('#strDiscount').val($jsnPhpScriptResponse.strDiscount);
                    $('#intDiscount').val($jsnPhpScriptResponse.intDiscount);
                    $('#intDateFrom').val($jsnPhpScriptResponse.intDateFrom);
                    $('#intDateTo').val($jsnPhpScriptResponse.intDateFrom);
                }else{
                    $('#divPriceListTitle').show();
                    $('#divPriceList').show();
                    $('#divFilterTitle').show();
                    $('#divFilter').show();
                    $('#myBtnFilter').show();
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
    arregloList = $('.chbList');
    strList= '';
    $.each(arregloList, function( index, obj ) {
        if( $(obj).prop( "checked" ) )
        {
            strList += $(obj).val() + '|';
        }
    });
    if( strList.length > 0 )
    {
        strList = strList.substr(0, ( strList.length -1 ) );
    }
    
    
    arregloSKU = $('.chbListSKU');
    strListSKU= '';
    $.each(arregloSKU, function( index, obj ) {
        if( $(obj).prop( "checked" ) )
        {
            strListSKU += $(obj).val() + '|';
        }
    });
    if( strListSKU.length > 0 )
    {
        strListSKU = strListSKU.substr(0, ( strListSKU.length -1 ) );
    }
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=saveValues&strName="+$('#strName').val() + "&strDiscount=" + $('#strDiscount').val() + "&intDiscount=" + $('#intDiscount').val() + "&intDateFrom=" + $('#intDateFrom').val().substr(0,4) + $('#intDateFrom').val().substr(5,2) + $('#intDateFrom').val().substr(8,2) + "000000&intDateTo=" + $('#intDateTo').val().substr(0,4) + $('#intDateTo').val().substr(5,2) + $('#intDateTo').val().substr(8,2)+"999999&chkList="+ strList+"&chkListSKU="+ strListSKU;
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
/*funcion para cancelar la promo*/
function cancelPromo($intIdPromo){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divpruebas').html('');
            $strQueryString = "strProcess=promodetail&intIdPromo=" + $intIdPromo;
            $.ajax({
                url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                    $('#myModal').show('fast',function(){
                        $('#divWorkingBackground').fadeOut('slow');
                    });
                }
            });
    });
}