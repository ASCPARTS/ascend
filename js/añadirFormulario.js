/**
 * Created by Brenn on 13/08/2016.
 */
$(document).ready(function(){

    $("#add").click(function() {

        /* Opción 1 */
        var n = $('tr:last td', $("#mitabla")).length;

        for(var i = 0; i <n; i++){

            var tds = '<tr>';
            tds += '<td><input type="text" placeholder="Proveedor" class="proveedor"></td>';
            tds += '<td><input type="date" placeholder="Fecha" class="fecha"></td>';
            tds += '<td><input type="text" placeholder="Tiempo de Llegada" class="tiempo"></td>';
            tds += '<td><input type="text" placeholder="Costo" class="costo"></td>';
            tds += '</tr>';

            tds += '<tr>';
            tds += '<td><input type="text" placeholder="Precio 1" class="precio"></td>';
            tds += '<td><input type="text" placeholder="Precio 2" class="precio"></td>';
            tds += '<td><input type="text" placeholder="Precio 3" class="precio"></td>';
            tds += '<td><input type="text" placeholder="Precio de Venta" class="precioVenta" ></td>';
            tds +='<td><div class="labelCloseFormulario" onclick="myFunction()">&#10006</div></div></td>';
            tds += '</tr>';
            tds += '<tr>';
            tds += '<td colspan="4">';
            tds +='<div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>';
            tds += '<td>';
            tds +='</tr>';


        }

        $("#mitabla").append(tds);
    });
});

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
