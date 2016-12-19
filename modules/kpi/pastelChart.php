<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
require_once("../../inc/sheet.inc");

$strSql="select strSKU, decPrice from tblProduct where strStatus ='A' ORDER BY decPrice;";
$rstData = $objAscend->dbQuery($strSql);
$strValues = "['SKU','Precio']";
foreach($rstData as $arrData){
    $strValues .= ",['" . $arrData['strSKU'] . "', '" . $arrData['decPrice'] . "']";
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--Table and divs that hold the pie charts-->
<table class="columns">
    <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="top_x_div" style="border: 1px solid #ccc"></div></td>
    </tr>
</table>

<script type="text/javascript">
// Load Charts and the corechart package.
google.charts.load('current', {'packages':['corechart','bar']});

// Draw the pie chart for Sarah's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawSarahChart);

// Draw the pie chart for the Anthony's pizza when Charts is loaded.
google.charts.setOnLoadCallback(drawAnthonyChart);

google.charts.setOnLoadCallback(drawStuff('top_x_div'));

// Callback that draws the pie chart for Sarah's pizza.
function drawSarahChart() {

// Create the data table for Sarah's pizza.
var data = new google.visualization.DataTable();
data.addColumn('string', 'SKU');
data.addColumn('number', 'precio');
data.addRows([
['Mushrooms', 1],
['Onions', 1],
['Olives', 2],
['Zucchini', 2],
['Pepperoni', 1]
]);

// Set options for Sarah's pie chart.
var options = {title:'How Much Pizza Sarah Ate Last Night',
width:400,
height:300};

// Instantiate and draw the chart for Sarah's pizza.
var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
chart.draw(data, options);
}

// Callback that draws the pie chart for Anthony's pizza.
function drawAnthonyChart() {

    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        { calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation" },
        2]);

    var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 400,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("Anthony_chart_div"));
    chart.draw(view, options);
}


</script>