<?php
ini_set("display_errors",1);

$intIdReport = $_REQUEST['intIdReport'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <link rel="stylesheet" type="text/css" href="report.css">
</head>
<body>
<div class="MainTitle" id="divTitle"></div>
<div class="MainContainer MCHeight">
    <div id="divForm">
        <div class="SubTitle">Ingresar filtros</div>
        <div id="divFormErrMsg"></div>
        <div id="divFormFilters" class="row"></div>
        <div id="divFormSubmit" class="ButtonContainer">
            <input id="btnGetReport" type="button" class="btnOnlineGreen btn" value="Generar reporte" style="display: none;" onclick="evalForm();">
        </div>
    </div>
    <div id="divReportContainer" style="display: none; height: 100%;">
        <div id="divFormSubmit" class="ButtonContainer" style="margin-bottom: 0 !important; ">
            <input type="button" id="btnXLS" class="btnOnlineGreen btn" value="XLS" style="display: none" onclick="reportXLS();">
            <input type="button" id="btnPDF" class="btnBrandRed btn" value="PDF" style="display: none" onclick="reportPDF();">
            <input type="button" id="btnTXT" class="btnOverGray btn" value="TXT" style="display: none" onclick="reportTXT();">
            <input type="button" id="btnTXT" class="btnBrandBlue btn" value="Printer" onclick="reportPrinter();">
            <input type="button" id="btnShowFilters" class="btnAlternativeBlue btn" value="Mostrar Filtros" onclick="showFilters();">
        </div>
        <br style="clear: both;" />
        <div id="divMainReport" class="divMainReport">
            <div id="divReportHeader" class="divReport divReportHeader">

            </div>
            <div id="divReportTable" class="divReport divReportTable" onscroll="scrollHeader();">

            </div>
        </div>
    </div>

</div>
<?php require_once("../../inc/include.working.php");?>
<script>
    $intIdReport = <?php echo $intIdReport; ?>;
    $jsnReportParameters = '';
    $jsnReportResults = '';
</script>
<script src="report.js?v=<?php echo date('Ymdhis') ;?>"></script>
</body>
</html>

