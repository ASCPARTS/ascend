$('document').ready(function(){
    getForecast();
});
function newForecast(){
    $('#divWorkingBackground').fadeIn('slow',function() {
        $strQueryString = "strProcess=getNewPromo&intIdPromo=" + $intIdPromo + "&strSKU=" + $('#strSKU').val() + "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divProduct').html($jsnPhpScriptResponse.productList);

                $('#modalAdd').show('fast', function () {
                    $('#divWorkingBackground').fadeOut('slow');
                });
            },
            error: function ($objError) {
                alert('Se presento un error en el proceso');
                console.log($objError);
            }
        });
    });
}
function getForecast(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblForecast').html('');
        $strQueryString = "strProcess=getForecast";
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#tblForecast').html($jsnPhpScriptResponse.forecast);
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function($e){
                alert('Error de sistema, contactar al administrador...Lindo día');
                console.log($e);
            }
        });
    });
}
function getProductList($intIdForecast){
    $('#divProduct').html('');
    $('#divWorkingBackground').fadeIn('slow',function() {
        $strQueryString = "strProcess=productList&intIdForecast=" + $intIdForecast + "&strSKU=" + $('#strSKU').val() + "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divProduct').html($jsnPhpScriptResponse.productList);
                $('#modalAdd').show('fast', function () {
                    $('#divWorkingBackground').fadeOut('slow');
                });
            },
            error: function ($objError) {
                alert('Error al consultar los articulos');
                console.log($objError);
            }
        });
    });
}
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
        $strQueryString = "strProcess=saveValues&strName="+$('#strName').val() + "&strType=" + $('#strType').val() + "&intQuantity=" + $('#intQuantity').val() + "&intPeriod1=" + $('#intPeriod1').val() + "&decFactor1=" + $('#decFactor1').val() + "&intPeriod2=" + $('#intPeriod2').val()+ "&decFactor2=" + $('#decFactor2').val()+"&intFamily="+$('#intFamily').val()+"&intBrand="+$('#intBrand').val()+"&intGroup="+$('#intGroup').val()+"&chkListSKU="+ strListSKU;
        console.log($strQueryString);
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                alert('Promoción almacenada exitosamente');
                $('#modalAdd').hide();
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function($e){
                alert('No se almaceno la información, contactar al administrador...');
                console.log($e);
            }
        });
    });
}

