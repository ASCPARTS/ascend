//var processSearch = 'searchProduct'

//var productSearch_type = 'initialSearch';
var productSearch_strType = '';
var productSearch_intPage = 1;

var productSearch_jsnParameters = '{}';
var productSearch_intRecordsPerPage = 10;

var productSearch_intStock = 0;
var productSearch_strPriceRange = 'ALL';
var productSearch_jsnBrand = "[]";
var productSearch_jsnGroup = "[]";


var inputSearch;


function productSearch_modal()
{
    $('#getModal-title').empty();
    $('#getModal-content').empty();

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

            //fill
            $('#getModal-content').html(data.jsnModal);
        }
    });
}

function productSearch_search()
{
    strProductParameter = $('#strProductParameter').val();
    //productSearch_jsnParameters = { 'strNeedle' : strProductParameter};
    productSearch_jsnParameters = '{ "strNeedle" : "' + strProductParameter + '" }';
    $.ajax({
        url: '../productSearch/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'search',
            
            'strType' : productSearch_strType = '',
            'intPage' : productSearch_intPage,
            'intRecordsPerPage' : productSearch_intRecordsPerPage,

            'intStock' : productSearch_intStock,
            'strPriceRange' : productSearch_strPriceRange,

            'jsnBrand' : productSearch_jsnBrand,
            'jsnGroup' : productSearch_jsnGroup,

            'jsnParameters' : productSearch_jsnParameters
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
