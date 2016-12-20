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
var productSearch_jsnAuxiliary = "[]";


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
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorkingBackground').hide();
            $('#getModal').show();

            //fill
            $('#getModal-content').html(data.jsnModal);
        }
    });
}

function productSearch_firstSearch()
{
    strProductParameter = $('#strProductParameter').val();
    //productSearch_jsnParameters = { 'strNeedle' : strProductParameter};
    productSearch_jsnParameters = '{ "strNeedle" : "' + strProductParameter + '" }';
    productSearch_search();
}

function productSearch_search()
{
    console.log($jsnDocument.intDocumentId);
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

            'jsnParameters' : productSearch_jsnParameters,
            'jsnAuxiliary' : productSearch_jsnAuxiliary
        },
        beforeSend: function (data)
        {
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorkingBackground').hide();
            $('#divCustomerList').empty();

            //fill
            $('#divCustomerList').html(data.jsnCustomerList);
            $('#divProductList').html(data.htmlProduct);
            $('#divPagination').html(data.htmlPagination);
            //$jsnDocument.arrWarehouseStock = data.jsnWarehouseStock;
            console.log($jsnDocument.arrWarehouseStock);

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
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorkingBackground').hide();

            //fill
            objCustomer = data.jsnCustomer;
            $('#getModal').hide();
            $('#getModal-title').empty();
            $('#getModal-content').empty();
            console.log(strCustomerSelectChainSwitch);
            switch( strCustomerSelectChainSwitch )
            {
                case 'newDocument':
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

function productSearch_showStock(intProduct) {
    $jsnDocument.intCurrentProduct = intProduct;
    $('.trStock').each(function( index ) {
        $( this ).hide();
        console.log($(this).attr('id'));
        if( $( this ).attr('id') == 'trStock_' +  intProduct  )
        {
            $( this ).show();
        }
    });

    $.ajax({
        url: '../productSearch/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'showStock',
            'intProduct' : intProduct,
            'intDocument' : $jsnDocument.intDocumentId,
            'intCustomer' : $jsnDocument.arrCustomer.intId
        },
        beforeSend: function (data)
        {
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //showhide
            $('#divWorkingBackground').hide();

            //fill
            $('#trStock_' + intProduct).html(data.htmlProduct);
            $jsnDocument.arrWarehouseStock = data.jsnWarehouseStock;
            console.log($jsnDocument.arrWarehouseStock)
            fnDocument_updateWarehouseStock();
            console.log($jsnDocument.arrWarehouseStock)
        }
    });
}


function productSearch_pageChange(pageValue){
    productSearch_intPage = pageValue;
    productSearch_search();
}

function productSearch_recordsPerPageCange(recordPerPage)
{
    productSearch_intPage = 1;
    productSearch_intRecordsPerPage = recordPerPage;

    productSearch_search();
}