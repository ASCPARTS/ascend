<?php
ini_set("display_errors",1);

$intIdReport = $_REQUEST['intIdReport'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div id="divForm" style="background-color: #b38600">
    <div id="divFilter" STYLE="background-color: #00B8FE">
        FILTROS
    </div>
    <div id="divFormSubmit">
        <input type="button" onclick="evalForm();">
    </div>
</div>
<div id="divReport">

</div>

<script>

    $jsnReport = '';

    $('document').ready(function(){
        $strQueryString = "strProcess=Filter";

        //console.log("<?php echo $intIdReport; ?>.php?" + $strQueryString);

        $.ajax({
            url: "<?php echo $intIdReport; ?>.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $jsnReport = $jsnPhpScriptResponse;
                $('#divFilter').html('');
                for($intIndex=0;$intIndex<$jsnPhpScriptResponse.arrFilters.length;$intIndex++){
                    $('#divFilter').append($jsnPhpScriptResponse.arrFilters[$intIndex].html);
                }
            }
        });
    });

    function evalForm() {
        bandera = true;
        for($intIndex=0;$intIndex<$jsnReport.arrFilters.length;$intIndex++){
            if($jsnReport.arrFilters[$intIndex].required=='required'){
                console.log($jsnReport.arrFilters[$intIndex].name);
                if(!evalRequired($jsnReport.arrFilters[$intIndex].name)){
                    $('#' + $jsnReport.arrFilters[$intIndex].name).focus();
                    alert('ponle algo');
                    $intIndex = $jsnReport.arrFilters.length + 1;
                    bandera = false;
                }
            }
        }
        if bandera==true .....



    }

    function evalRequired($strInput){
        if($('#' + $strInput).val()==''){
            return false;
        }else{
            return true;
        }
    }

    function evalNumeric(){

    }

    function evalEMail(){

    }


</script>

</body>
</html>

