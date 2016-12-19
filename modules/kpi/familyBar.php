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
                ['Familias', 'Ventas'],
                ["SERVERS", 50000],
                ["LAPTOPS", 31000],
                ["MOBILES", 12000],
                ["DESKTOPS", 10000],
                ["PRINTERS", 3000]
            ]);

            var options = {
                title: 'Ventas por Familia',
                width: 500,
                height: 600,
                legend: { position: 'none' },
                chart: { title: 'Ventas por Familia',
                    subtitle: 'Año 2016' },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'top', label: 'Ventas'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "60%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>

    <body>
    <div class="MainTitle">INDICADORES</div>

        <div class="MainContainer">
            <div id="top_x_div" style="width: 100%; height: 100%;"></div>

        </div>
    </body>
</html>