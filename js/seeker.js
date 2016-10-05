//

function init()
{
    console.log("Seeker.js");
    
    $('#search').keyup( function() 
    {
        
       console.log("presiona");
       $('#searchResult').empty();
       
        if( this.value.length > 2 )
        {

            console.log("presiona mas de 2");
            $('<div class="dropdown-content col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1"><ul class="autocomplete"><li class="title_list"><a href="13">EXTERNAL COMPONENTS</a></li><li class="item_list"><a href="44">734280-001 HP-COMPAQ HARD DRIVE HARDWARE KIT</a></li><li class="title_list"><a href="13">INTERNAL COMPONENTS <div class="look_more">VER MAS...</div></a></li><li class="item_list"><a href="44">003E77251 XEROX HANDLE CAM B2</a></li><li class="item_list"><a href="44">003K13893 XEROX HANDLE ASSY</a></li><li class="item_list"><a href="44">821665-001 HP HARD DRIVE HARDWARE KIT</a></li><li class="item_list"><a href="44">Q6651-60068 HP HARD DISK DRIVE ASSEMBLY INCLUDES HOLDER AND SCREWS</a></li><li class="title_list"><a href="13">GROUPS</a></li><li class="item_list"><a href="13">EXTERNAL COMPONENTS</a></li><li class="item_list"><a href="13">INTERNAL COMPONENTS</a></li></ul></div>').appendTo( "#searchResult" );
            
        }

    });

    $.ajax({
        url: 'http://localhost/ascend/modules/searchascend/ajax.php?strProcess=initialSearch',
        type: 'GET',
        dataType: 'html',
        beforeSend: function (data)
        {
            console.log("Antes de enviar");
        },
        success:function(data)
        {
           console.log("Exito");
           $('#contect').html(data);
           //console.log(data);
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
        url: 'http://localhost/ascend/modules/searchascend/ajax.php?strProcess=productInfo&intId=1',
        type: 'GET',
        dataType: 'html',
        beforeSend: function (data)
        {
            console.log("Antes de enviar");
        },
        success:function(data)
        {
           console.log("Exito");
           $('#contectTabs').html(data);
           //console.log(data);
        }
    });

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
    }/**
     * Created by Brenn on 29/08/2016.
     */
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

