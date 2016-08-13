/**
 * Created by Brenn on 13/08/2016.
 */
$(document).ready(function(){

    $("#add").click(function() {

        /* Opción 1 */
        var n = $('tr:last td', $("#mitabla")).length;


        for(var i = 0; i <n; i++){

            var tds ='<tr>';
            tds +='<td><input type="text" placeholder="Proveedor" class="proveedor"></td>';
            tds +='<td><input type="text" placeholder="Fecha" class="fecha"></td>';
            tds +='<td><input type="text" placeholder="Tiempo de Llegada" class="tiempo"></td>';
            tds +='<td><input type="text" placeholder="Costo" class="costo"></td>';
            tds +='</tr>';
            tds += '<tr>';
            tds +='<td><input type="text" placeholder="Precio 1" class="precio"></td>';
            tds +='<td><input type="text" placeholder="Precio 2" class="precio"></td>';
            tds +='<td><input type="text" placeholder="Precio 3" class="precio"></td>';
            tds +='<td><input type="text" placeholder="Precio de Venta" class="precioVenta" ></td>';
            tds +='</tr>';
            tds +='<tr>';
            tds +='<div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>';
            tds +='</tr>';

        }

        $("#mitabla").append(tds);
    });
});
