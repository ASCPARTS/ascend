/**
 * Created by Brenn on 15/08/2016.
 */
function pestana(grupo_pesta, id_pesta){
    var pestanas = document.getElementById(grupo_pesta);
    var Tpestanas = pestanas.getElementsByTagName("div");
    for(var i=0; i<Tpestanas.length; i++) {
        Tpestanas[i].style.zindex="-1000";
        Tpestanas[i].style.visibility="hidden";
    }
    document.getElementById(id_pesta).style.zIndex="1000";
    document.getElementById(id_pesta).style.visibility="visible";
}