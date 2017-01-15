//VARIABLES GLOBALES Y PREDEFINIDAS
var processSearch = 'searchProduct'

var typeSearch = 'initialSearch';
var pageSearch = 1;
var parametersSearch = '{}';
var recordsPerPageSearch = 10;

var stockValue = 0;
var priceValue = 'ALL';
var brandsValues = [];
var groupsValues = [];


var inputSearch;


function init()
{
    $('#search').keyup( function() 
    {
       $('#searchResult').empty();
       
        if( this.value.length >= 2 )
        {
            var inputSearch = $('#search').val();
            $.ajax({
                url: 'modules/searchascend/ajax.php',
                type: 'post',
                dataType: 'json',
                data:
                {
                    'strProcess' : 'autocomplete',
                    'strNeedle' : inputSearch
                },
                beforeSend: function (data)
                {

                },
                error: function (xhr, ajaxOptions, thrownError) {

                },
                success:function(data)
                {
                    $('#searchResult').empty();

                    $(data.htmlList).appendTo( "#searchResult" );
                }
            });
        }else if ( this.value.length < 2 )
        {
            $('#searchResult').empty();
        }

    });

    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';
    
    $.ajax({
        url: '../../modules/searchascend/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : processSearch,

            'strType' : typeSearch,
            'intPage' : pageSearch,
            'jsnParameters' : parametersSearch, 
            'intRecordsPerPage' : recordsPerPageSearch,

            'intStock' : stockValue,
            'strPriceRange' : priceValue,
            'jsnBrand' : stringBrandsValues,
            'jsnGroup' : stringGroupsValues
        },
        beforeSend: function (data)
        {
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
           $('#products').html(data.htmlProduct);
           $('#pagination').html(data.htmlPagination);
           $('#filters').html(data.htmlLateralBar);
        }
    }); 
}

function inOutBrand(itemBrand){
    //Pagina inicializa en 1
    //Lo demas quedan igual
    pageSearch = 1;

    //Comprobar si el elemento existe
    if(jQuery.inArray(itemBrand, brandsValues)  !== -1 ){
        //Si existe entonces eliminarlo
        brandsValues.splice($.inArray(itemBrand, brandsValues),1);
    }else{
        //Si no existe añadirlo
        brandsValues.push(itemBrand);
    }

    //Ejecutar el cambio
    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';

    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : processSearch,

            'strType' : typeSearch,
            'intPage' : pageSearch,
            'jsnParameters' : parametersSearch, 
            'intRecordsPerPage' : recordsPerPageSearch,

            'intStock' : stockValue,
            'strPriceRange' : priceValue,
            'jsnBrand' : stringBrandsValues,
            'jsnGroup' : stringGroupsValues
        },
        beforeSend: function (data)
        {
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            //Limpiar input de busqueda
            $('#searchResult').empty();
            $("#search").val('');

            //LLenar contenido de las secciones
            $('#products').html(data.htmlProduct);
            $('#pagination').html(data.htmlPagination);
            $('#filters').html(data.htmlLateralBar);
        }
    });
}

function inOutGroup(itemGroup){
    //Pagina inicializa en 1
    //Lo demas quedan igual
    pageSearch = 1;

    //Comprobar si el elemento existe
    if(jQuery.inArray(itemGroup, groupsValues)  !== -1 ){
        //Si existe entonces eliminarlo
        groupsValues.splice($.inArray(itemGroup, groupsValues),1);
    }else{
        //Si no existe añadirlo
        groupsValues.push(itemGroup);
    }

    //Ejecutar el cambio
    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';

    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : processSearch,

            'strType' : typeSearch,
            'intPage' : pageSearch,
            'jsnParameters' : parametersSearch, 
            'intRecordsPerPage' : recordsPerPageSearch,

            'intStock' : stockValue,
            'strPriceRange' : priceValue,
            'jsnBrand' : stringBrandsValues,
            'jsnGroup' : stringGroupsValues
        },
        beforeSend: function (data)
        {
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#searchResult').empty();
            $("#search").val('');

            $('#products').html(data.htmlProduct);
            $('#pagination').html(data.htmlPagination);
            $('#filters').html(data.htmlLateralBar);
        }
    });

}

function inOutStock(){
    //Pagina inicializa en 1
    //Lo demas quesa igual
    pageSearch = 1;

    if(stockValue == 1){
        stockValue = 0;
    }else{
        stockValue = 1;
    }

    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';

    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : processSearch,

            'strType' : typeSearch,
            'intPage' : pageSearch,
            'jsnParameters' : parametersSearch, 
            'intRecordsPerPage' : recordsPerPageSearch,

            'intStock' : stockValue,
            'strPriceRange' : priceValue,
            'jsnBrand' : stringBrandsValues,
            'jsnGroup' : stringGroupsValues
        },
        beforeSend: function (data)
        {
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#searchResult').empty();
            $("#search").val('');

            $('#products').html(data.htmlProduct);
            $('#pagination').html(data.htmlPagination);
            $('#filters').html(data.htmlLateralBar);
        }
    });

}

function onChangeRangePrice(rangePriceValue){
    //Pagina inicializa en 1
    //Lo demas queda igual
    pageSearch = 1;

    if(priceValue != rangePriceValue)
    {
        priceValue = rangePriceValue;

        stringBrandsValues = '['+brandsValues.toString()+']';
        stringGroupsValues = '['+groupsValues.toString()+']';

        $.ajax({
            url: '/modules/searchascend/ajax.php',
            type: 'post',
            dataType: 'json',
            data:
            {
                'strProcess' : processSearch,

                'strType' : typeSearch,
                'intPage' : pageSearch,
                'jsnParameters' : parametersSearch, 
                'intRecordsPerPage' : recordsPerPageSearch,

                'intStock' : stockValue,
                'strPriceRange' : priceValue,
                'jsnBrand' : stringBrandsValues,
                'jsnGroup' : stringGroupsValues
            },
            beforeSend: function (data)
            {
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {

            },
            success:function(data)
            {
                $('#searchResult').empty();
                $("#search").val('');

                $('#products').html(data.htmlProduct);
                $('#pagination').html(data.htmlPagination);
                $('#filters').html(data.htmlLateralBar);
            }
        });
    }
}

function onChangePage(pageValue){
    //Todo queda igual
    if(pageSearch != pageValue)
    {
        pageSearch = pageValue;

        stringBrandsValues = '['+brandsValues.toString()+']';
        stringGroupsValues = '['+groupsValues.toString()+']';

        $.ajax({
            url: '/modules/searchascend/ajax.php',
            type: 'post',
            dataType: 'json',
            data:
            {
                'strProcess' : processSearch,

                'strType' : typeSearch,
                'intPage' : pageSearch,
                'jsnParameters' : parametersSearch, 
                'intRecordsPerPage' : recordsPerPageSearch,

                'intStock' : stockValue,
                'strPriceRange' : priceValue,
                'jsnBrand' : stringBrandsValues,
                'jsnGroup' : stringGroupsValues
            },
            beforeSend: function (data)
            {
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {

            },
            success:function(data)
            {
                $('#searchResult').empty();
                $("#search").val('');
                
                $('#products').html(data.htmlProduct);
                $('#pagination').html(data.htmlPagination);
                $('#filters').html(data.htmlLateralBar);
            }
        });
    }

}

function onChangeRecords(recordsValue){
    //Pagina inicializa en 1
    //Lo demas queda igual
    pageSearch = 1;

    if(recordsPerPageSearch != recordsValue)
    {
        recordsPerPageSearch = recordsValue;

        stringBrandsValues = '['+brandsValues.toString()+']';
        stringGroupsValues = '['+groupsValues.toString()+']';

        $.ajax({
            url: '/modules/searchascend/ajax.php',
            type: 'post',
            dataType: 'json',
            data:
            {
                'strProcess' : processSearch,

                'strType' : typeSearch,
                'intPage' : pageSearch,
                'jsnParameters' : parametersSearch, 
                'intRecordsPerPage' : recordsPerPageSearch,

                'intStock' : stockValue,
                'strPriceRange' : priceValue,
                'jsnBrand' : stringBrandsValues,
                'jsnGroup' : stringGroupsValues
            },
            beforeSend: function (data)
            {
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {

            },
            success:function(data)
            {

                $('#searchResult').empty();
                $("#search").val('');
                
                $('#products').html(data.htmlProduct);
                $('#pagination').html(data.htmlPagination);
                $('#filters').html(data.htmlLateralBar);

            }
        });
    }

}

function inputString(){
    //typeSearch cambia
    //jsnParametrs lleva la cadena
    //Lo demas inicializa

    var inputSearch = $('#search').val();

    //Busqueda mediante el input
    if(inputSearch.length > 0)
    {
        //Inicializar variables
        pageSearch = 1;
        recordsPerPageSearch = 10;

        stockValue = 0;
        priceValue = 'ALL';
        brandsValues = [];
        groupsValues = [];

        //Modificar las necesarias
        typeSearch = 'customSearch';
        parametersSearch = '{"strNeedle":"'+inputSearch+'"}';


        //Ejecutar la busqueda
        stringBrandsValues = '['+brandsValues.toString()+']';
        stringGroupsValues = '['+groupsValues.toString()+']';

        $.ajax({
            url: '/modules/searchascend/ajax.php',
            type: 'post',
            dataType: 'json',
            data:
            {
                'strProcess' : processSearch,

                'strType' : typeSearch,
                'intPage' : pageSearch,
                'jsnParameters' : parametersSearch, 
                'intRecordsPerPage' : recordsPerPageSearch,

                'intStock' : stockValue,
                'strPriceRange' : priceValue,
                'jsnBrand' : stringBrandsValues,
                'jsnGroup' : stringGroupsValues
            },
            beforeSend: function (data)
            {
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {

            },
            success:function(data)
            {
                //Limpiar input de busqueda
               $('#searchResult').empty();
               $("#search").val('');

               //LLenar contenido de las secciones
               $('#products').html(data.htmlProduct);
               $('#pagination').html(data.htmlPagination);
               $('#filters').html(data.htmlLateralBar);

            }
        });

    }
}

function searchId(idProduct){

    //var inputSearch = $('#search').val();

    var idModal = 'modalProduct';
    var idSpan = 'closeProduct'; 
    var contentTab = 'contectDetails'; 
    var tagTab = 'tabDetails';

    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'POST',
        dataType: 'json',
        data:
        {
            'strProcess' : 'productInfo',
            'intId' : idProduct,
        },
        beforeSend: function (data)
        {

            $('#modalTest').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
    
        },
        error: function (xhr, ajaxOptions, thrownError) 
        {

        },
        success:function(data)
        {

           $('#modalTest').empty();

           $('<ul class="tab"><li><a href="#" id="tabDetails" class="tablinks" onclick="openTab(event, \'contectDetails\')">Detalles</a></li><li><a href="#" id="tabReplacements" class="tablinks" onclick="openTab(event, \'contectReplacements\')">Remplazos</a></li><li><a href="#" id="tabCompatible" class="tablinks" onclick="openTab(event, \'contectCompatible\')">Compatible</a></li><li><a href="#" id="tabStocks" class="tablinks" onclick="openTab(event, \'contectStocks\')">Existencias</a></li></ul>').appendTo("#modalTest");

           $(data.htmlResult).appendTo("#modalTest");

           $('#ca-container').contentcarousel();

            // Get the modal
            var modal = document.getElementById(idModal);

            // Get the <span> element that closes the modal
            var span = document.getElementById(idSpan);

            // When the user clicks the button, open the modal
            //btn.onclick = function() {
                modal.style.display = "block";
            //}

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

             var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) 
            {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) 
            {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(contentTab).style.display = "block";
            document.getElementById(tagTab).className += " active";

            $('#searchResult').empty();
        }

    }); 
}

function searchGroup(GroupValue){
  
    //Inicializar variables
    pageSearch = 1;
    stockValue = 0;
    priceValue = 'ALL';
    brandsValues = [];
    groupsValues = [];

    //Modificar las necesarias
    typeSearch = 'searchByGroup';
    parametersSearch = '{"intGroup":"'+GroupValue+'"}';


    //Ejecutar la busqueda
    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';

    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'post',
        dataType: 'json',
        data:
        {
            'strProcess' : processSearch,

            'strType' : typeSearch,
            'intPage' : pageSearch,
            'jsnParameters' : parametersSearch, 
            'intRecordsPerPage' : recordsPerPageSearch,

            'intStock' : stockValue,
            'strPriceRange' : priceValue,
            'jsnBrand' : stringBrandsValues,
            'jsnGroup' : stringGroupsValues
        },
        beforeSend: function (data)
        {
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {

        },
        success:function(data)
        {
            $('#searchResult').empty();
            $("#search").val('');

            $('#products').html(data.htmlProduct);
            $('#pagination').html(data.htmlPagination);
            $('#filters').html(data.htmlLateralBar);

            $('#searchResult').empty();
        }
    });    
}

function openTab(evt, tabName) 
{
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) 
    {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) 
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function getModalTab(idModal, idSpan, contentTab, tagTab, idCard)
{
    
    $.ajax({
        url: '/modules/searchascend/ajax.php',
        type: 'POST',
        dataType: 'json',
        data:
        {
            'strProcess' : 'productInfo',
            'intId' : idCard,
        },
        beforeSend: function (data)
        {
            $('#modalTest').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');  
        },
        error: function (xhr, ajaxOptions, thrownError) 
        {

        },
        success:function(data)
        {

           $('#modalTest').empty();

           $('<ul class="tab"><li><a href="#" id="tabDetails" class="tablinks" onclick="openTab(event, \'contectDetails\')">Detalles</a></li><li><a href="#" id="tabReplacements" class="tablinks" onclick="openTab(event, \'contectReplacements\')">Remplazos</a></li><li><a href="#" id="tabCompatible" class="tablinks" onclick="openTab(event, \'contectCompatible\')">Compatible</a></li><li><a href="#" id="tabStocks" class="tablinks" onclick="openTab(event, \'contectStocks\')">Existencias</a></li></ul>').appendTo("#modalTest");

           $(data.htmlResult).appendTo("#modalTest");

           $('#ca-container').contentcarousel();

            // Get the button that opens the modal
            //var btn = document.getElementById(idBtn);

            // Get the modal
            var modal = document.getElementById(idModal);

            // Get the <span> element that closes the modal
            var span = document.getElementById(idSpan);

            // When the user clicks the button, open the modal
            //btn.onclick = function() {
                modal.style.display = "block";
            //}

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

             var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) 
            {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) 
            {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(contentTab).style.display = "block";
            document.getElementById(tagTab).className += " active";


        }

    }); 
}

