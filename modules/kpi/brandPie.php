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
                title: 'Ventas por Marca',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>


<body>
<div class="MainTitle">INDICADORES</div>
<div class="MainContainer">
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    <br style="clear: both;" />
</div>
</body>
</html>