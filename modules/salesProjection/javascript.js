$('document').ready(function(){
    

});
function calculation(){
        $('#divWorkingBackground').fadeIn('slow',function(){
            $strQueryString = "strProcess=salesProjection&decFactor="+$('#decFactor').val() + "&strEstimate=" + $('#strEstimate').val() + "&intProjection="+ $('#intProjection').val();
            console.log($strQueryString);

            $.ajax({
                url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                    console.log($jsnPhpScriptResponse);

                    $('#divSales').html($jsnPhpScriptResponse.salesProjectionZone);
                    $('#divWorkingBackground').fadeOut('slow');
                }
            });
        });
    } 

