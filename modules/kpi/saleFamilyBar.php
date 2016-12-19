<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();

//TITULO DE LA GRAFICA
$strTitle='SKU';
//SUBTITULO DE LA GRAFICA
$strSubTitle='Ventas por Familia';
//MEDIDAS DE LA GRAFICA
$intWidth='300';
$intHeight='400';
//ORIENTACION QUE TENDRA LA GRAFICA
$strBar='vertical';
//ETIQUETE DE LA GRAFICA
$strLabel='2016';
//POSICION DE LA ETIQUETA
$strSide='top';
//CONSULTA PARA RELLENAR LA GRAFICA
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
        if($arrTotal['decTotal']>0){
            $strValues .= ",['" . $arrFamily['strName'] . "', '" . $arrTotal['decTotal'] . "']";
        }else{
            $strValues .= ",['" . $arrFamily['strName'] . "', '0']";
        }

    }
    
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
            bar: { groupWidth: "100%" }
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