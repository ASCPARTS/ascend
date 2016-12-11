<?php
require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
//TITULO DE LA GRAFICA
$strTitle='COTIZACIONES VS VENTAS';
//MEDIDAS DE LA GRAFICA
$intWidth='300';
$intHeight='400';
$strSql="select strSKU, decPrice from tblProduct where strStatus ='A' ORDER BY decPrice;";
$rstData = $objAscend->dbQuery($strSql);
$strValues = "['SKU','Precio']";
//CICLO PARA RECORRRER LA CONSULTA
foreach($rstData as $arrData){
    $strValues .= ",['" . $arrData['strSKU'] . "', " . $arrData['decPrice'] . "]";
}

?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([<?php echo $strValues; ?>]);

            var options = {
                title: '<?php echo $strTitle; ?>',
                width: '<?php echo $strWidth; ?>',
                height: '<?php echo $intHeight; ?>',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>
</html>