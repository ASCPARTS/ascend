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
    </style>
</head>
<body>
<div class="MainTitle" id="divTitle"></div>
<div class="MainContainer">
    <div id="divForm">
        <div class="SubTitle">Ingresar filtros</div>
        <div id="divFormErrMsg"></div>
        <div id="divFormFilters" class="row"></div>
        <div id="divFormSubmit" class="ButtonContainer">
            <input type="button" class="btnOnlineGreen btn" value="Generar reporte" onclick="evalForm();">
        </div>
    </div>
    <div id="divReportContainer" style="display: none">
        <div id="divFormSubmit" class="ButtonContainer">
            <input type="button" id="btnXLS" class="btnOnlineGreen btn" value="XLS" style="display: none" onclick="reportXLS();">
            <input type="button" id="btnPDF" class="btnBrandRed btn" value="PDF" style="display: none" onclick="reportPDF();">
            <input type="button" id="btnTXT" class="btnOverGray btn" value="TXT" style="display: none" onclick="reportTXT();">
            <input type="button" id="btnTXT" class="btnBrandBlue btn" value="Printer" onclick="reportPrinter();">
            <input type="button" id="btnShowFilters" class="btnAlternativeBlue btn" value="Mostrar Filtros" onclick="showFilters();">
        </div>
        <div id="divReport"></div>
    </div>
    <br style="clear: both;" />
</div>
<div id="divWorkingBackground" class="divWorkingBackground">
    <div id="divWorking" class="divWorking">
        <img src="ajax-loader.gif" class="imgWorking"/>
    </div>
</div>
<script>

    $jsnReportParameters = '';
    $jsnReportResults = '';

    
    $('document').ready(function(){
        $('#divWorkingBackground').fadeIn('slow',function(){
            $strQueryString = "strProcess=Filter";
            $.ajax({
                url: "<?php echo $intIdReport; ?>.php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {
                    $jsnReportParameters = $jsnPhpScriptResponse;
                    $('#divTitle').html($jsnReportParameters.strTitle);
                    $('#divFormFilters').html('');
                    for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                        $('#divFormFilters').append($jsnReportParameters.arrFilters[$intIndex].html);
                        if($jsnReportParameters.arrFilters[$intIndex].type=='numeric'){
                            if($jsnReportParameters.arrFilters[$intIndex].decimalPlaces!=''){
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).numeric({ decimal: ".", decimalPlaces: parseInt($jsnReportParameters.arrFilters[$intIndex].decimalPlaces), negative: false });
                            }else{
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).numeric({ decimal: false, negative: false });
                            }
                        }
                    }
                    $('#divWorkingBackground').fadeOut('slow');
                }
            });
        });
    });

    function evalForm() {
        $('#divWorkingBackground').fadeIn('slow',function(){
            $('#divFormErrMsg').html('');
            $('#divFormErrMsg').slideUp('fast');
            $blnGo=true;
            for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                if($jsnReportParameters.arrFilters[$intIndex].required=='required'){
                    if(!evalRequired($jsnReportParameters.arrFilters[$intIndex].name,$jsnReportParameters.arrFilters[$intIndex].type)){
                        $('#' + $jsnReportParameters.arrFilters[$intIndex].name).focus();
                        $blnGo = false;
                        $('#divFormErrMsg').html('El campo ' + $jsnReportParameters.arrFilters[$intIndex].label + ' es requerido!');
                        $('#divFormErrMsg').slideDown('fast');
                        $('#divWorkingBackground').fadeOut('slow' );
                        $intIndex = $jsnReportParameters.arrFilters.length + 1;
                    }
                }
            }
            if($blnGo){
                for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                    switch($jsnReportParameters.arrFilters[$intIndex].type){
                        case 'email':
                            if(!evalEmail($jsnReportParameters.arrFilters[$intIndex].name)){
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).focus();
                                $blnGo = false;
                                $('#divFormErrMsg').html('El campo ' + $jsnReportParameters.arrFilters[$intIndex].label + ' tiene un formato incorrecto!');
                                $('#divFormErrMsg').slideDown('fast');
                                $('#divWorkingBackground').fadeOut('slow');
                                $intIndex = $jsnReportParameters.arrFilters.length + 1;
                            }
                            break;
                    }
                }
            }
            if($blnGo){
                $strQueryString = 'strProcess=Report';
                for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                    $strQueryString += '&' + $jsnReportParameters.arrFilters[$intIndex].name + '=' + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().trim();
                }
                $.ajax({
                    url: "<?php echo $intIdReport; ?>.php", data: $strQueryString, type: "POST", dataType: "json",
                    success: function ($jsnPhpScriptResponse) {
                        $jsnReportResults = $jsnPhpScriptResponse;
                        $('#divReport').html($jsnReportResults.strReport);
                        if($jsnReportResults.btnXLS){
                            $('#btnXLS').show();
                        }
                        if($jsnReportResults.btnPDF){
                            $('#btnPDF').show();
                        }
                        if($jsnReportResults.btnTXT){
                            $('#btnTXT').show();
                        }

                        $('#divForm').slideUp('fast',function(){
                            $('#divReportContainer').slideDown('fast',function(){
                                $('#divWorkingBackground').fadeOut('slow');
                            });
                        });
                    }
                });
            }
        });

    }

    function evalRequired($strInput,$strInputType){
        $blnReturn = true;
        if($strInputType=='select'){
            if($('#' + $strInput).val()=='-1'){
                $blnReturn = false;
            }
        }else{
            if($('#' + $strInput).val().trim()==''){
                $blnReturn = false;
            }
        }
        return $blnReturn;
    }

    function evalEmail($strInput){
        $blnReturn = true;
        $strEMExp=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
        if(!$strEMExp.exec($('#' + $strInput).val().trim())){
            $blnReturn = false;
        }
        return $blnReturn;
    }

    function showFilters(){
        $('#divReportContainer').slideUp('fast',function(){
            $('#divForm').slideDown('fast');
        });
    }

    function reportXLS(){

    }

    function reportPDF(){

    }

    function reportTXT(){

    }

    function reportPrinter(){

    }

</script>

</body>
</html>

