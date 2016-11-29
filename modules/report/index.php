<?php
ini_set("display_errors",1);

$intIdReport = $_REQUEST['intIdReport'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <style>
        .divWorkingBackground {
            z-index: 10000001;
            background-color: rgba(0,0,0,.6);
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            display: none;
        }

        .divWorking {
            text-align: center;
            background-color: #282828;
            margin: auto auto auto auto;
            position: absolute;
            width: 168px;
            height: 55px;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            line-height: 55px;
        }

        .imgWorking {
            vertical-align: baseline;
            border: 0;
        }

        #divFormErrMsg {
            text-transform: uppercase;
            text-align: center;
            font-size: 14pt;
            color:#C40000;
            border: 1px #C40000 solid;
            padding: 6px 6px 6px 6px;
            display: none;
        }

        .MCHeight{
            height: calc(100vh - 60px);
        }
    </style>
</head>
<body>
<div class="MainTitle" id="divTitle"></div>
<div class="MainContainer MCHeight">
    <div id="divForm">
        <div class="SubTitle">Ingresar filtros</div>
        <div id="divFormErrMsg"></div>
        <div id="divFormFilters" class="row"></div>
        <div id="divFormSubmit" class="ButtonContainer">
            <input type="button" class="btnOnlineGreen btn" value="Generar reporte" onclick="evalForm();">
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
        <div id="divReport" style="width: 100%; height: calc(100% - 35px); overflow-x: auto; overflow-y: auto; display: block; margin: 0 0 0 0; ">

        </div>
    </div>
    <br style="clear: both;" />
</div>
<div id="divWorkingBackground" class="divWorkingBackground">
    <div id="divWorking" class="divWorking">
        <img src="ajax-loader.gif" class="imgWorking"/>
    </div>
</div>
<script>
    $intIdReport = <?php echo $intIdReport; ?>;
    $jsnReportParameters = '';
    $jsnReportResults = '';
</script>
<script src="report.js"></script>
</body>
</html>

