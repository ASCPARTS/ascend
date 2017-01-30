
function getMenuItems(){
    $intId = 0;

    $.ajax({
        url: "ajax.php", dataType: 'json', cache: false, contentType: false, processData: false, data: $objFormData, type: 'post',
        success: function($objPhpScriptResponse){
            $('#divSalesImportResults').html($objPhpScriptResponse.strResult);
            $('#btnSalesImportCancel').val('cerrar');
            $('#fleImportFile').val('');
            $('#divWorkingBackground').fadeOut('fast');
        }
    });
}
