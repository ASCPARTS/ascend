<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();


$strSql="select strSKU, decPrice from tblProduct where strStatus ='A' ORDER BY decPrice;";
$rstData = $objAscend->dbQuery($strSql);
$strValues = "['SKU','Precio']";
foreach($rstData as $arrData){
    $strValues .= ",['" . $arrData['strSKU'] . "', '" . $arrData['decPrice'] . "']";
}
?>

<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">


    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);
    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([<?php echo $strValues; ?>]);

        var options = {
            title: 'LOS MUÑECOS DE LUIS',
            width: 900,
            legend: { position: 'none' },
            chart: { title: 'LOS MUÑECOS DE LUIS',
                subtitle: 'QUE NO HACEN NADA MAS QUE JODER' },
            bars: 'vertical', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Precios'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
</script>


<body>
<div class="MainTitle">Facturar</div>
<div class="MainContainer">
    <div class="MainContainer">
        <div id="top_x_div" style="width: 100%; height: 100%;"></div>
    </div>
    <br style="clear: both;" />
</div>
</body>
</html>
