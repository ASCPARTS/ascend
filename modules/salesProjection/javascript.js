$('document').ready(function(){

});
function calculation(){
        $('#divWorkingBackground').fadeIn('slow',function(){
            $strQueryString = "strProcess=salesProjection&decFactor="+$('#decFactor').val() + "&strEstimate=" + $('#strEstimate').val();
            console.log($strQueryString);
            $.ajax({
                url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                    $('#divSales').html($jsnPhpScriptResponse.salesProjection);
                    $('#divWorkingBackground').fadeOut('slow');
                }
            });
        });
    } 

