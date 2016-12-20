$jsnDocument =
{
    strCurrentAction : '',
    intDocumentId : '',
    arrCustomer : {},
    arrDocumentDetail : {},
    arrWarehouseStock : {},
    intCurrentProduct : 0
};

function fnDocument_getMenu()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getMenu'
        },
        beforeSend: function (data)
        {
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
            $('#rowDocumentList').hide();
            $('#rowDocumentForm').hide();
            $('#rowDocumentMenu').show();

            $('#rowDocumentForm').empty();


            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.htmlMenu);

        }
    });
}

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
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
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
    productSearch_jsnAuxiliary = '{ "intDocumentId" : "' + $jsnDocument.intDocumentId + '" }';
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
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
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
    productSearch_jsnAuxiliary = '{ "intDocumentId" : "' + $jsnDocument.intDocumentId + '" }';
    $jsnDocument.arrDocumentDetail = {};
    objCustomer = Array;
    $jsnDocument.arrCustomer = Array;
}

function fnDocument_selectNewCustomer()
{
    strCustomerSelectChainSwitch = 'newDocument';
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
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);
            
            

        }
    });
}



function fnDocument_getDocumentDetailList(intDocumentId)
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getDocumentDetailList',
            'intDocumentId' : intDocumentId
        },
        beforeSend: function (data)
        {
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
            $('#rowDocumentForm').show();
            $('#rowDocumentList').hide();
            $('#rowDocumentForm').empty();

            //LLenar contenido de las secciones
            $('#rowDocumentForm').html(data.jsnDocumentDetail);

            $jsnDocument.intDocumentId = intDocumentId;
            productSearch_jsnAuxiliary = '{ "intDocumentId" : "' + $jsnDocument.intDocumentId + '" }';
            $jsnDocument.strCurrentAction = 'editDocument';
            productSearch_jsnAuxiliary = '{ "intDocumentId" : "' + $jsnDocument.intDocumentId + '" }';productSearch_jsnAuxiliary = '{ "intDocumentId" : "' + $jsnDocument.intDocumentId + '" }';
            objCustomer = data.objCustomer;
            $jsnDocument.arrCustomer = data.objCustomer;
            $jsnDocument.arrDocumentDetail = data.arrDocumentDetail;
            console.log($jsnDocument);
        }
    });
}

function fnDocument_getDocumentDetailInformation(intDocumentDetail)
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : 'getDocumentDetailInformation',
            'intDocumentDetail' : intDocumentDetail
        },
        beforeSend: function (data)
        {
            $('#divWorkingBackground').show();
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#divWorkingBackground').hide();
            $('#infoModal').show();

            $('#infoModal-title').html(data.jsnDocumentDetailInformationTitle);
            $('#infoModal-content').html(data.jsnDocumentDetailInformation);
        }
    });
}

function fnDocument_showDocumentSubdetailQuotation(intDocumentSubdetail)
{

    $.each($('.colDocumentSubdetailQuotation'), function( index, obj ) {
        $(obj).hide();
        if( $(obj).attr('id') == 'divDocumentSubdetailQuotation_' + intDocumentSubdetail )
        {
            $(obj).show();
        }
    });
    //$('#divDocumentSubdetailQuotation_' + intDocumentSubdetail).show();
}

function fnDocument_addDocumentDetail()
{
    console.log($jsnDocument.strCurrentAction);
    productSearch_modal();
}

function fnDocument_takeStock(intProduct, intWarehouse)
{
    required = parseInt($('#strRequired_' + intProduct).val());
    isValidNumber = true;
    if( required == '' || isNaN(required) )
    {
        isValidNumber = false;
        alert('El valor insertado: "' + required + '", no es un valor numerico.');
    }
    else
    {
        if(required > 0)
        {
            //$jsnDocument.intCurrentProduct = intProduct;
            for( whs = 0; whs < ($jsnDocument.arrWarehouseStock).length; whs++ )
            {
                if( $jsnDocument.arrWarehouseStock[whs].intId == intWarehouse)
                {
                    console.log('required: ' + required + 'whs: ' + $jsnDocument.arrWarehouseStock[whs].intStock)
                    if( required > $jsnDocument.arrWarehouseStock[whs].intStock )
                    {
                        taken = $jsnDocument.arrWarehouseStock[whs].intStock;
                        $jsnDocument.arrWarehouseStock[whs].intStock = 0;
                        $jsnDocument.arrWarehouseStock[whs].intTaken = parseInt($jsnDocument.arrWarehouseStock[whs].intTaken) +  parseInt(taken);
                        alert( 'Se tomaron solo ' + taken + ' unidades.' );
                    }
                    else
                    {
                        taken = required;
                        $jsnDocument.arrWarehouseStock[whs].intStock -= taken;
                        $jsnDocument.arrWarehouseStock[whs].intTaken = parseInt($jsnDocument.arrWarehouseStock[whs].intTaken) +  parseInt(taken);
                        alert( 'Se tomaron ' + taken + ' unidades.' );
                    }

                    console.log($jsnDocument.arrWarehouseStock[whs].intStock  + ' - ' + required);
                    fnDocument_updateWarehouseStock();
                }
            }
        }
        else
        {
            alert('El valor insertado debe ser mayor a 0');
        }
    }
}

function fnDocument_updateWarehouseStock()
{
    console.log($jsnDocument.arrCustomer);
    console.log($jsnDocument.arrWarehouseStock);

    blnStockClienteWarehouse = false;
    blnStockTaken = false;

    for( whs = 0; whs < ($jsnDocument.arrWarehouseStock).length; whs++ )
    {
        console.log('f1');
        if( $jsnDocument.arrWarehouseStock[whs].intId == $jsnDocument.arrCustomer.intWarehouse && $jsnDocument.arrWarehouseStock[whs].intStock > 0 )
        {
            blnStockClienteWarehouse = true;
        }
    }

    tblStockrequired = '<table>';
    tblStockrequired += '<thead> <tr><th colspan="2">Stock tomado</th></tr> <tr> <th>Almacen</th> <th>Unidades</th> </tr></thead>';
    tblStockrequired += '<tbody>';
    for( whs = 0; whs < ($jsnDocument.arrWarehouseStock).length; whs++ )
    {
        console.log('f2');
        if( $jsnDocument.arrWarehouseStock[whs].intTaken >0)
        {
            tblStockrequired += '<tr> <td>' + $jsnDocument.arrWarehouseStock[whs].strDescription + '</td> <td>' + $jsnDocument.arrWarehouseStock[whs].intTaken + '</td> </tr>';
            blnStockTaken = true;
            console.log('taken');
        }
        tdContent = '';
        if( blnStockClienteWarehouse )
        {
            tdContent += $jsnDocument.arrWarehouseStock[whs].intStock;
            if( $jsnDocument.arrWarehouseStock[whs].intId == $jsnDocument.arrCustomer.intWarehouse && $jsnDocument.arrWarehouseStock[whs].intStock > 0 )
            {
                tdContent += ' <br> <button class="btn btnAlternativeBlue" onclick="fnDocument_takeStock(' + $jsnDocument.intCurrentProduct + ', ' + $jsnDocument.arrWarehouseStock[whs].intId + ');">Tomar</button>';
            }
        }
        else
        {
            tdContent += $jsnDocument.arrWarehouseStock[whs].intStock;
            if( $jsnDocument.arrWarehouseStock[whs].intId != $jsnDocument.arrCustomer.intWarehouse && $jsnDocument.arrWarehouseStock[whs].intStock > 0 )
            {
                tdContent += ' <br> <button class="btn btnAlternativeBlue" onclick="fnDocument_takeStock(' + $jsnDocument.intCurrentProduct + ', ' + $jsnDocument.arrWarehouseStock[whs].intId + ');">Tomar</button>';
            }
        }

        $('#tdWarehouseStock_' + $jsnDocument.arrWarehouseStock[whs].intId).empty();
        $('#tdWarehouseStock_' + $jsnDocument.arrWarehouseStock[whs].intId).html(tdContent);
    }

    tblStockrequired += '</tbody></table>';
    if( blnStockTaken )
    {
        $('#divStockRequired_' + $jsnDocument.intCurrentProduct).empty();
        $('#divStockRequired_' + $jsnDocument.intCurrentProduct).html(tblStockrequired);
    }
}

function fnDocument_addDocumentDetailInsert(intProduct)
{
    console.log($jsnDocument.arrWarehouseStock);
    console.log($jsnDocument.strCurrentAction);
    flagTaken = false;
    strDocumentDetail ='';
    for( whs = 0; whs < ($jsnDocument.arrWarehouseStock).length; whs++ )
    {
        console.log($jsnDocument.arrWarehouseStock[whs].intTaken);
        if( $jsnDocument.arrWarehouseStock[whs].intTaken > 0 )
        {
            flagTaken = true;
            strDocumentDetail = strDocumentDetail + intProduct + '@@' + $jsnDocument.arrWarehouseStock[whs].intId + '@@' +  $jsnDocument.arrWarehouseStock[whs].intTaken + '|';
        }
    }

    if( flagTaken )
    {
        strDocumentDetail = strDocumentDetail.substr(0, (strDocumentDetail.length - 1));
        console.log($jsnDocument.intDocumentId);
        console.log($jsnDocument.arrCustomer.intId);
        console.log(strDocumentDetail);
        console.log($jsnDocument);

        $.ajax({
            url: 'ajax.php',
            type: 'post',
            dataType: 'json',
            data:
            {
                'strProcess' : 'addDocumentDetailInsert',
                'strCurrentAction' : $jsnDocument.strCurrentAction,
                'intProduct' : intProduct,
                'intCustomer' : $jsnDocument.arrCustomer.intId,
                'intDocument' : $jsnDocument.intDocumentId,
                'strDocumentDetail' : strDocumentDetail
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
                if(data.blnStatus)
                {
                    if( data.strCurrentAction = 'editDocument' )
                    {
                        fnDocument_getDocumentDetailList(data.intDocument)
                        alert("Se agrego correctamente la partida");
                    }
                    else
                    {
                        fnDocument_init();
                        alert("Se agrego correctamente la partida y se genero el documento");
                    }


                    $('#getModal').hide();

                    // --

                    $jsnDocument.strCurrentAction = 'editDocument';
                    $jsnDocument.intProduct = data.intProduct;
                    $jsnDocument.intCustomer = data.intCustomer;
                    $jsnDocument.intDocumentId = data.intDocument;
                    $jsnDocument.arrCustomer = data.arrCustomer;
                }
                else
                {
                    alert(data.strMsg);
                }
                //fill

            }
        });
    }
}