$strCurrentModal = '';

function openForm($intSalesOrderId){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $strCurrentModal = 'divSaleOrder';
        if($intSalesOrderId==-1){
            $('#divClientListOption').show();
            $('#strClient').val('');
            $('#labelClientName').hide();
            $('#labelClientNumber').hide();
            $('#labelClientRFC').hide();
            $('#labelClientClass').hide();
            $('#labelClientZone').hide();
            $('#labelClientStatus').hide();
        }else{

        }
        $('#divSaleOrder').show();
        $('#divWorkingBackground').fadeOut('slow');
    })
}

function closeModal(){
    $('#' + $strCurrentModal).hide();
}

function clientSearch(){
    $('#divClientList').hide();
    $('#divClientList').html('');
    if($('#strClient').val().trim().length >= 3){
        $strQueryString = "strProcess=getClientList&strClient=" + $('#strClient').val().trim();
        $.ajax({url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divClientList').css('width',$('#strClient').width() - 12);
                $('#divClientList').css('left',$('#strClient').position().left);
                $('#divClientList').css('top',$('#strClient').position().top + 23);
                $('#divClientList').html($jsnPhpScriptResponse.strClientList);
                $('#divClientList').show();
            }
        });
    }
}

function selectClient($intId){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divClientList').hide();
        $('#divClientList').html('');
        $strQueryString = "strProcess=getClientInfo&intId=" + $intId;
        $.ajax({url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#strClient').val('');
                $('#strClientName').val($jsnPhpScriptResponse.strClientName);
                $('#labelClientName').show();
                $('#strClientNumber').val($jsnPhpScriptResponse.strClientNumber);
                $('#labelClientNumber').show();
                $('#strClientRFC').val($jsnPhpScriptResponse.strClientRFC);
                $('#labelClientRFC').show();
                $('#strClientClass').val($jsnPhpScriptResponse.strClientClass);
                $('#labelClientClass').show();
                $('#strClientZone').val($jsnPhpScriptResponse.strClientZone);
                $('#labelClientZone').show();
                $('#strClientStatus').val($jsnPhpScriptResponse.strClientStatus);
                $('#labelClientStatus').show();
                $('#divWorkingBackground').fadeOut('slow');
            }
        });
    })

}