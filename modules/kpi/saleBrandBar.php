<?php

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();

//TITULO DE LA GRAFICA
$strTitle='';
//SUBTITULO DE LA GRAFICA
$strSubTitle='Ventas por Marca';
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
$strSql="SELECT intId, strName FROM tblBrand WHERE strStatus='A';";
$rstBrand = $objAscend->dbQuery($strSql);
$strValues = "['Marca','Venta']";
//CICLO PARA RECORRRER LA CONSULTA
foreach($rstBrand as $arrBrand){
    $strSql="SELECT SUM(DD.decAmount) as decTotal
        FROM tblInvoice I
        LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intInvoice=I.intId
        LEFT JOIN tblDocumentDetail DD ON DD.intId=IDD.intDocumentDetail
        LEFT JOIN tblDocument D ON D.intId=DD.intDocument
        LEFT JOIN tblProduct P ON P.intId = DD.intProduct
        LEFT JOIN tblBrand B ON B.intId=P.intBrand
        WHERE I.strStatus='A' 
        AND B.intId = ".$arrBrand['intId']."
        AND I.intCreationDate >= 20160000000000 
        AND I.intCreationDate <= 20169999999999;";
    $rstTotal=$objAscend->dbQuery($strSql);
    foreach ($rstTotal as $arrTotal){
        if($arrTotal['decTotal']>0){
            $strValues .= ",['" . $arrBrand['strName'] . "', '" . $arrTotal['decTotal'] . "']";
        }else{
            $strValues .= ",['" . $arrBrand['strName'] . "', '0']";
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