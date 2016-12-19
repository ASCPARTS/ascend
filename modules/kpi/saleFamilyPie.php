<?php
require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();
//TITULO DE LA GRAFICA
$strTitle='Ventas por Familia';
//MEDIDAS DE LA GRAFICA
$intWidth='300';
$intHeight='400';
//CICLO PARA RECORRRER LA CONSULTA
$strSql="SELECT intId, strName FROM tblFamily WHERE strStatus='A';";
$rstFamily = $objAscend->dbQuery($strSql);
$strValues = "['Familia','Venta']";
//CICLO PARA RECORRRER LA CONSULTA
foreach($rstFamily as $arrFamily){
    $strSql="SELECT SUM(DD.decAmount) as decTotal
        FROM tblInvoice I
        LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
        LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
        LEFT JOIN tblDocument D ON D.intId=DD.intDocument
        LEFT JOIN tblProduct P ON P.intId = DD.intProduct
        LEFT JOIN tblFamily F ON F.intId=P.intFamily
        WHERE I.strStatus='A' 
        AND F.intId = ".$arrFamily['intId']."
        AND I.intCreationDate >= 20160000000000 
        AND I.intCreationDate <= 20169999999999;";
    $rstTotal=$objAscend->dbQuery($strSql);
    foreach ($rstTotal as $arrTotal){
        $strValues .= ",['" . $arrFamily['strName'] . "', '" . $arrTotal['decTotal'] . "']";
    }
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