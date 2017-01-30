<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
?>
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(familyBar);
    google.charts.setOnLoadCallback(branBar);
    google.charts.setOnLoadCallback(groupBar);

    function familyBar() {
        var data = new google.visualization.arrayToDataTable([
            ['Familias', 'Ventas'],
            ["SERVERS", 50000],
            ["LAPTOPS", 31000],
            ["MOBILES", 12000],
            ["DESKTOPS", 10000],
            ["PRINTERS", 3000]
        ]);

        var options = {
            title: 'Ventas por Familia',
            width:400,
            height:300,
            legend: { position: 'none' },
            chart: { title: 'Ventas por Familia',
                subtitle: 'Año 2016' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Ventas'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
    function branBar() {
        var data = new google.visualization.arrayToDataTable([
            ['Marcas', 'Ventas'],
            ["HP", 50000],
            ["XEROX", 31000],
            ["POWER PLUS", 12000],
            ["OKI DATA", 10000],
            ["CONCEPTRONIC", 3000],
            ["HYUNDAI", 25000],
            ["UNIVERSAL", 12500],
            ["ALCATEL", 11000],
            ["LG ELECTRONICS", 5000],
            ["SYMBOL", 8000],
            ["ZEBRA", 9000],
            ["SEAGATE", 7000],
            ["ACTECK", 5500],
            ["KINGSTON", 1000],
            ["SAMSUNG", 500],
            ["PALM ", 150]

        ]);

        var options = {
            title: 'Ventas por Familia',
            width:400,
            height:300,
            legend: { position: 'none' },
            chart: { title: 'Ventas por Marcas',
                subtitle: 'Año 2016' },
            bars: 'vertical', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Ventas'} // Top x-axis.
                }
            },
            bar: { groupWidth: "70%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
    function groupBar() {
        var data = new google.visualization.arrayToDataTable([
            ['Grupos', 'Ventas'],
            ["AC ADAPTADORES", 50000],
            ["FUSORES", 31000],
            ["BATERIAS", 12000],
            ["DISPLAY", 10000],
            ["KEYBOARDS", 3000],
            ["HDD", 25000]
        ]);

        var options = {
            title: 'Ventas por Familia',
            width:400,
            height:300,
            legend: { position: 'none' },
            chart: { title: 'Ventas por Marcas',
                subtitle: 'Año 2016' },
            bars: 'vertical', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Ventas'} // Top x-axis.
                }
            },
            bar: { groupWidth: "70%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
</script>

<body>
<div class="MainTitle">INDICADORES</div>

<div class="MainContainer">
    <table class="columns">
        <tr>
            <td><div id="top_x_div" style="border: 1px solid #ccc"></div></div></td>
            <td><div id="top_x_div" style="border: 1px solid #ccc"></div></div></td>
        </tr>
        <tr>
            <td><div id="top_x_div" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
    <br style="clear: both;" />
</div>
</body>
</html>