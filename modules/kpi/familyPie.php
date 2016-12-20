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
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Familias', 'Ventas'],
                ["SERVERS", 50000],
                ["LAPTOPS", 31000],
                ["MOBILES", 12000],
                ["DESKTOPS", 10000],
                ["PRINTERS", 3000]
            ]);

            var options = {
                title: 'Ventas por Familia',
                is3D: true,
                width: 500,
                height: 600
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>


<body>
<div class="MainTitle">INDICADORES</div>
<div class="MainContainer">
    <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
    <br style="clear: both;" />
</div>
</body>
</html>