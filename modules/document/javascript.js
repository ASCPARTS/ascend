$jsnDocument =
{
    strCurrentAction : '',
    intDocumentId : '',
    arrCustomer : {},
    arrDocumentDetail : {}
};

function fnDocument_init()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getDocumentList'
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorking').hide();
            $('#divDocumentList').empty();

            //LLenar contenido de las secciones
            $('#divDocumentList').html(data.jsnDocumentList);
        }
    });
}

function fnDocument_newDocument()
{
    $jsnDocument.strCurrentAction = 'newDocument';
    $jsnDocument.intDocumentId = 0;
    $jsnDocument.arrDocumentDetail = {};
    objCustomer = Array;
    $jsnDocument.arrCustomer = Array;
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'newDocument'
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorking').hide();
            $('#rowDocumentList').hide();
            $('#rowDocumentForm').show();

            $('#rowDocumentForm').empty();


            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);

        }
    });
}

function fnDocument_cancelDocument()
{
    $('#rowDocumentForm').empty();
    $('#rowDocumentForm').hide();
    $('#rowDocumentList').show();
    $jsnDocument.strCurrentAction = ''
    $jsnDocument.intDocumentId = 0;
    $jsnDocument.arrDocumentDetail = {};
    objCustomer = Array;
    $jsnDocument.arrCustomer = Array;
}

function fnDocument_selectNewCustomer()
{
    strCustomerSelectChainSwitch = 'document_new';
    initCustomerSearch();
}

function fnDocument_setClientToNewDocument()
{
    $jsnDocument.arrCustomer = objCustomer;
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'setClientToNewDocument',
            'objCustomer' : objCustomer
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorking').hide();
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);
            
            

        }
    });
}



function fnDocument_getDocumentDetail(intDocumentId)
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getDocumentDetail',
            'intDocumentId' : intDocumentId
        },
        beforeSend: function (data)
        {
            $('#divWorking').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorking').hide();
            $('#rowDocumentForm').show();
            $('#rowDocumentList').hide();
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);

            $jsnDocument.intDocumentId = intDocumentId;
            $jsnDocument.strCurrentAction = 'editDocument';
            $jsnDocument.intDocumentId = intDocumentId;
            objCustomer = data.objCustomer;
            $jsnDocument.arrCustomer = data.objCustomer;
            $jsnDocument.arrDocumentDetail = data.arrDocumentDetail;
            console.log($jsnDocument);
        }
    });
}
