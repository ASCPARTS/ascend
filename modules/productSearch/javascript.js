
function productSearch_modal()
{
    $.ajax({
        url: '../productSearch/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'modal'
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorking').hide();
            $('#getModal').show();
            $('#getModal_content').empty();
            
            //fill
            $('#getModal_content').html(data.jsnCustomerForm);
        }
    });
}

function getCustomerSearch()
{
    strCustomerParameter = $('#strCustomerParameter').val();
    $.ajax({
        url: '../customer/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getCustomerSearch',
            'strCustomerParameter' : strCustomerParameter
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorking').hide();
            $('#divCustomerList').empty();

            //fill
            $('#divCustomerList').html(data.jsnCustomerList);
        }
    });
}

function selectCustomerSearch(intCustomer)
{
    $.ajax({
        url: '../customer/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'selectCustomerSearch',
            'intCustomer' : intCustomer
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorking').hide();

            //fill
            objCustomer = data.jsnCustomer;
            $('#getModal').hide();
            $('#getModal-title').empty();
            $('#getModal-content').empty();
            console.log(strCustomerSelectChainSwitch);
            switch( strCustomerSelectChainSwitch )
            {
                case 'document_new':
                    fnDocument_setClientToNewDocument();
                    $jsnDocument.strCurrentAction = 'newDocument';
                    $jsnDocument.intDocumentId = 0;
                    $jsnDocument.arrDocumentDetail = {};
                    $jsnDocument.arrCustomer = data.jsnCustomer;
                    break;
            }
        }
    });
}
