$jsnDocument =
{
    strCurrentAction : '',
    intDocumentId : '',
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
            $('#divDocumentList').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divDocumentList').empty();

            //LLenar contenido de las secciones
            $('#divDocumentList').html(data.jsnDocumentList);
        }
    });
}

function fnDocument_newDocument()
{
    $jsnDocument.strCurre = 'newDocument';
    $jsnDocument.intDocumentId = 0;
    $jsnDocument.arrDocumentDetail = {};

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
            $('#rowDocumentForm').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);
            alert($jsnDocumentLife.intDocumentId)
        }
    });
}

function fnDocument_getDocumentDetail(intDocumentId)
{
    $jsnDocument.strCurre = 'editDocument';
    $jsnDocument.intDocumentId = intDocumentId;

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
            $('#rowDocumentForm').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);
            alert($jsnDocumentLife.intDocumentId)
        }
    });
}