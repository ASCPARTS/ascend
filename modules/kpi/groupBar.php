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
                width: 500,
                height: 600,
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