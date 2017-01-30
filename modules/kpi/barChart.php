<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();

//TITULO DE LA GRAFICA
$strTitle='SKU';
//SUBTITULO DE LA GRAFICA
$strSubTitle='Precios mes pasado';
//MEDIDAS DE LA GRAFICA
$intWidth='300';
$intHeight='400';
//ORIENTACION QUE TENDRA LA GRAFICA
$strBar='vertical';
//ETIQUETE DE LA GRAFICA
$strLabel='Hola Brenda';
//POSICION DE LA ETIQUETA
$strSide='top';
//CONSULTA PARA RELLENAR LA GRAFICA
$strSql="select strSKU, decPrice from tblProduct where strStatus ='A' ORDER BY decPrice;";
$rstData = $objAscend->dbQuery($strSql);
$strValues = "['SKU','Precio']";
//CICLO PARA RECORRRER LA CONSULTA
foreach($rstData as $arrData){
    $strValues .= ",['" . $arrData['strSKU'] . "', '" . $arrData['decPrice'] . "']";
}
?>

<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    //se indica que  tipo de estructura tendra bar=barra
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([<?php echo $strValues; ?>]);

        var options = {
            title: '<?php echo $strTitle; ?>',
            width: '<?php echo $strWidth; ?>',
            height: '<?php echo $intHeight; ?>',
            legend: { position: 'none' },
            chart: {
                title:'<?php echo $strTitle; ?>',
                subtitle: '<?php echo $strSubTitle; ?>' },
            bars: '<?php echo $strBar; ?>', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: '<?php echo $strSide; ?>', label: '<?php echo $strLabel; ?>'} // Top x-axis.
                }
            },
            bar: { groupWidth: "10%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
</script>


<body>
<div class="MainTitle">INDICADORES</div>
<div class="MainContainer">
    <div class="MainContainer">
        <div id="top_x_div" style="width: 100%; height: 100%;"></div>
    </div>
    <br style="clear: both;" />
</div>
</body>
</html>