<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div id="divForm">
    <div id="divFilter">

    </div>
    <div id="divFormSubmit">
        <input type="button" onclick="evalform();">
    </div>
</div>
<div id="divReport">

</div>

<script>
    $(document).ready(function(){
        $.ajax(
            url: <?php echo $_REQUEST['intReportId']; ?>.php
            
        )

        $('#divFilter').html('');
        foreach element in json response ....
            cargar variables locales
            $('#divFilter').append($jsnPhpScriptResponse.htmlform);
    })

    function evalform(){

    }
</script>

</body>
</html>

