$('document').ready(function(){
    $('#intDateFrom').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateFrom').val().split('-').join(''))>parseInt($('#intDateTo').val().split('-').join(''))){$('#intDateTo').val($('#intDateFrom').val());}}});
    $('#intDateTo').datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#intDateTo').val().split('-').join(''))<parseInt($('#intDateFrom').val().split('-').join(''))){$('#intDateFrom').val($('#intDateTo').val());}}});
    getPromo();
});

function getPromo(){
    $strQueryString = "strProcess=promotion&intDateFrom=" + $('#intDateFrom').val().substr(0,4) + $('#intDateFrom').val().substr(5,2) + $('#intDateFrom').val().substr(8,2) + "000000&intDateTo=" + $('#intDateTo').val().substr(0,4) + $('#intDateTo').val().substr(5,2) + $('#intDateTo').val().substr(8,2) + "999999&strStatus=" + $('#strStatus').val();
    $.ajax({
        url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
        success: function ($jsnPhpScriptResponse) {
            $('#tblPromo').html('');
            $('#tblPromo').html($jsnPhpScriptResponse.promotionList);
        }
    });
}

function getProduct(){
    $strQueryString = "strProcess=product";
    $.ajax({
        url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
        success: function ($jsnPhpScriptResponse) {
            $('#divProduct').html('');
            $('#divProduct').html($jsnPhpScriptResponse.productList);
        }
    });
}




function getProductList(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divpruebas').html('');
        $strQueryString = "";
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divpruebas').html($jsnPhpScriptResponse.tblPromoList);
                $('#divWorkingBackground').fadeOut('slow');
            }
        });
    });
}