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
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
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
                width: 900,
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
            <div id="top_x_div" style="width: 100%; height: 100%;"></div>
        <br style="clear: both;" />
        </div>
    </body>
</html>