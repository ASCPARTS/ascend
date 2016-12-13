$('document').ready(function(){
    $('#intDateFrom').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateFrom').val().split('-').join(''))>parseInt($('#intDateTo').val().split('-').join(''))){$('#intDateTo').val($('#intDateFrom').val());}}});
    $('#intDateTo').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateTo').val().split('-').join(''))<parseInt($('#intDateFrom').val().split('-').join(''))){$('#intDateFrom').val($('#intDateTo').val());}}});

    $('#intDateNewFrom').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateNewFrom').val().split('-').join(''))>parseInt($('#intDateNewTo').val().split('-').join(''))){$('#intDateNewTo').val($('#intDateNewFrom').val());}}});
    $('#intDateNewTo').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateNewTo').val().split('-').join(''))<parseInt($('#intDateNewFrom').val().split('-').join(''))){$('#intDateNewFrom').val($('#intDateNewTo').val());}}});

    getPromo();
});

function getPromo(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#tblPromo').html('');
        $strQueryString = "strProcess=promotion&intDateFrom=" + $('#intDateFrom').val().substr(0,4) + $('#intDateFrom').val().substr(5,2) + $('#intDateFrom').val().substr(8,2) + "000000&intDateTo=" + $('#intDateTo').val().substr(0,4) + $('#intDateTo').val().substr(5,2) + $('#intDateTo').val().substr(8,2) + "999999&strStatus=" + $('#strStatus').val();
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#tblPromo').html($jsnPhpScriptResponse.promotionList);
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function($e){
                alert('algo paso');
                console.log($e);
            }
        });
    });
}
function getProductList($intIdPromo){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divProduct').html('');
        if($intIdPromo==0){
            $('#intDateNewFrom').val('$intDD');
            $('#intDateNewTo').val('$intDD');
            $('#strDiscount option:eq(0)').prop('selected',true);
            //terminar de limpiar controladores
            $strQueryString = "strProcess=newPromo&strSKU="+$('#strSKU').val()+ "&strPartNumber=" + $('#strPartNumber').val() + "&intFamily=" + $('#intFamily').val() + "&intBrand=" + $('#intBrand').val() + "&intGroup=" + $('#intGroup').val();

            console.log($strQueryString);

            $.ajax({
                url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                    $('#divProduct').html($jsnPhpScriptResponse.productList);
                }
            });
        }else {
            $strQueryString = "strProcess=promodetail&intIdPromo=" + $intIdPromo;
            $.ajax({
                url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                   // $('#divProduct').html($jsnPhpScriptResponse.productList);
                }
            });
        }
        $('#myModal').show('fast', function () {
            $('#divWorkingBackground').fadeOut('slow');
        });
    });
}

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