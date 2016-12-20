<?php
require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
//TITULO DE LA GRAFICA
$strTitle='COTIZACIONES VS VENTAS';
//TIPO DE GRAFICA
$strCurveType='function';
//POSICION DE LAS REFERENCIAS
$strPosition='bottom';
//MEDIDAS DE LA GRAFICA
$intWidth='300';
$intHeight='400';
//CONSULTA PARA RELLENAR LA GRAFICA
$strSql="select strText,intInt,intInt2 from tblBrenda;";
$rstData = $objAscend->dbQuery($strSql);
$strValues = "['Año','Cotizaciones','Ventas']";

foreach($rstData as $arrData){
    $strValues .= ",['" . $arrData['strText'] . "', " . $arrData['intInt'] . "," . $arrData['intInt2'] . "]";
}
?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([<?php echo $strValues; ?>]);

            var options = {
                title: '<?php echo $strTitle; ?>',
                width: '<?php echo $strWidth; ?>',
                height: '<?php echo $intHeight; ?>',
                curveType: '<?php echo $strCurveType; ?>',
                legend: { position: '<?php echo $strPosition; ?>' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>
</html>