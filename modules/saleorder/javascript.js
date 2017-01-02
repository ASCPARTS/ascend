$strCurrentModal = '';

function openForm($intSalesOrderId){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $strCurrentModal = 'divSaleOrder';
        if($intSalesOrderId==0){
            $('#divClientListOption').show();
            $('#strClient').val('');
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
        $('#divWorkingBackground').fadeOut('slow');
    })

}