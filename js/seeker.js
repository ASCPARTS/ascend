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

console.log("=====VARIABLES GLOBALES=======");
console.log(processSearch);

console.log(typeSearch);
console.log(pageSearch);
console.log(parametersSearch);
console.log(recordsPerPageSearch);

console.log(stockValue);
console.log(priceValue);
console.log(brandsValues);
console.log(groupsValues);
console.log("=============================");

var inputSearch;


function init()
{
    console.log("Init()");
    
    $('#search').keyup( function() 
    {
        
       console.log("Ejecuta busqueda predecible");
       $('#searchResult').empty();
       
        if( this.value.length > 2 )
        {
            //console.log("presiona mas de 2");
            //$('<div class="dropdown-content col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1"><ul class="autocomplete"><li class="title_list"><a href="13">EXTERNAL COMPONENTS</a></li><li class="item_list"><a href="44">734280-001 HP-COMPAQ HARD DRIVE HARDWARE KIT</a></li><li class="title_list"><a href="13">INTERNAL COMPONENTS <div class="look_more">VER MAS...</div></a></li><li class="item_list"><a href="44">003E77251 XEROX HANDLE CAM B2</a></li><li class="item_list"><a href="44">003K13893 XEROX HANDLE ASSY</a></li><li class="item_list"><a href="44">821665-001 HP HARD DRIVE HARDWARE KIT</a></li><li class="item_list"><a href="44">Q6651-60068 HP HARD DISK DRIVE ASSEMBLY INCLUDES HOLDER AND SCREWS</a></li><li class="title_list"><a href="13">GROUPS</a></li><li class="item_list"><a href="13">EXTERNAL COMPONENTS</a></li><li class="item_list"><a href="13">INTERNAL COMPONENTS</a></li></ul></div>').appendTo( "#searchResult" );
        }

    });

    stringBrandsValues = '['+brandsValues.toString()+']';
    stringGroupsValues = '['+groupsValues.toString()+']';

    $.ajax({
        url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
            console.log("Antes de enviar");
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Errores [INICIO]");
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            console.log("Errores [FIN]");
        },
        success:function(data)
        {
           console.log("Exito init");
           //console.log(data)
           $('#products').html(data.htmlProduct);
           $('#pagination').html(data.htmlPagination);
           $('#filters').html(data.htmlLateralBar);
           //console.log(data);

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
        url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
            console.log("Antes de enviar");
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Errores [INICIO]");
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            console.log("Errores [FIN]");
        },
        success:function(data)
        {
           console.log("Exito inOutBrand");
           //console.log(data)
           $('#products').html(data.htmlProduct);
           $('#pagination').html(data.htmlPagination);
           $('#filters').html(data.htmlLateralBar);
           //console.log(data);

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
        url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
            console.log("Antes de enviar");
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Errores [INICIO]");
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            console.log("Errores [FIN]");
        },
        success:function(data)
        {
           console.log("Exito inOutGroup");
           //console.log(data)
           $('#products').html(data.htmlProduct);
           $('#pagination').html(data.htmlPagination);
           $('#filters').html(data.htmlLateralBar);
           //console.log(data);

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
        url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
            console.log("Antes de enviar");
            $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Errores [INICIO]");
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            console.log("Errores [FIN]");
        },
        success:function(data)
        {
           console.log("Exito inOutStock");
           //console.log(data)
           $('#products').html(data.htmlProduct);
           $('#pagination').html(data.htmlPagination);
           $('#filters').html(data.htmlLateralBar);
           //console.log(data);

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
            url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
                console.log("Antes de enviar");
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Errores [INICIO]");
                console.log(xhr.status);
                console.log(thrownError);
                console.log(xhr.responseText);
                console.log("Errores [FIN]");
            },
            success:function(data)
            {
               console.log("Exito onChangeRangePrice");
               //console.log(data)
               $('#products').html(data.htmlProduct);
               $('#pagination').html(data.htmlPagination);
               $('#filters').html(data.htmlLateralBar);
               //console.log(data);

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
            url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
                console.log("Antes de enviar");
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Errores [INICIO]");
                console.log(xhr.status);
                console.log(thrownError);
                console.log(xhr.responseText);
                console.log("Errores [FIN]");
            },
            success:function(data)
            {
               console.log("Exito onChangePage");
               //console.log(data)
               $('#products').html(data.htmlProduct);
               $('#pagination').html(data.htmlPagination);
               $('#filters').html(data.htmlLateralBar);
               //console.log(data);

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
            url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
                console.log("Antes de enviar");
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Errores [INICIO]");
                console.log(xhr.status);
                console.log(thrownError);
                console.log(xhr.responseText);
                console.log("Errores [FIN]");
            },
            success:function(data)
            {
               console.log("Exito onChangeRecords ");
               //console.log(data)
               $('#products').html(data.htmlProduct);
               $('#pagination').html(data.htmlPagination);
               $('#filters').html(data.htmlLateralBar);
               //console.log(data);

            }
        });
    }

}

function inputString(){
    //typeSearch cambia
    //jsnParametrs lleva la cadena
    //Lo demas inicializa

    var inputSearch = $('#search').val();
    console.log("input busqueda---->");
    console.log(inputSearch);

    //Busqueda mediante el input
    console.log("SIZE INPUT---->"+inputSearch.length);
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
        console.log("parametersSearch---->");
        console.log(parametersSearch);


        //Ejecutar la busqueda
        stringBrandsValues = '['+brandsValues.toString()+']';
        stringGroupsValues = '['+groupsValues.toString()+']';

        $.ajax({
            url: 'http://localhost/ascend/modules/searchascend/ajax.php',
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
                console.log("Antes de enviar");
                $('#products').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Errores [INICIO]");
                console.log(xhr.status);
                console.log(thrownError);
                console.log(xhr.responseText);
                console.log("Errores [FIN]");
            },
            success:function(data)
            {
               console.log("Exito");
               console.log(data)
               $('#products').html(data.htmlProduct);
               $('#pagination').html(data.htmlPagination);
               $('#filters').html(data.htmlLateralBar);
               console.log(data);

            }
        });

    }
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
        url: 'http://localhost/ascend/modules/searchascend/ajax.php',
        type: 'POST',
        dataType: 'json',
        data:
        {
            'strProcess' : 'productInfo',
            'intId' : idCard,
        },
        beforeSend: function (data)
        {
            console.log("Antes de enviar");
            console.log(data);
            $('#modalTest').html('<img id="loading_gif" src="../../img/catalog/loading.gif">');
            
        },
        error: function (xhr, ajaxOptions, thrownError) 
        {
            console.log("Errores [INICIO]");
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            console.log("Errores [FIN]");
        },
        success:function(data)
        {

           $('#modalTest').empty();
           console.log("Exito");
           console.log(data);
           //$('#contectTabs').html(data);
           $('<ul class="tab"><li><a href="#" id="tabDetails" class="tablinks" onclick="openTab(event, \'contectDetails\')">Detalles</a></li><li><a href="#" id="tabReplacements" class="tablinks" onclick="openTab(event, \'contectReplacements\')">Remplazos</a></li><li><a href="#" id="tabCompatible" class="tablinks" onclick="openTab(event, \'contectCompatible\')">Compatible</a></li><li><a href="#" id="tabStocks" class="tablinks" onclick="openTab(event, \'contectStocks\')">Existencias</a></li></ul>').appendTo("#modalTest");

           $(data).appendTo("#modalTest");

           $('#ca-container').contentcarousel();


           //console.log(data);

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

