function init()
{
    openCity(event, 'London');

}

function openCity(evt, cityName) 
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
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function getModalTab(idModal, idSpan, contentTab, tagTab)
{
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