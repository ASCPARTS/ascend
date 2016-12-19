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
                ['Grupos', 'Ventas'],
                ["AC ADAPTADORES", 50000],
                ["FUSORES", 31000],
                ["BATERIAS", 12000],
                ["DISPLAY", 10000],
                ["KEYBOARDS", 3000],
                ["HDD", 25000]
            ]);

            var options = {
                title: 'Ventas por Grupo',
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