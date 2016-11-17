<?php
/**
 * Created by PhpStorm.
 * User: gmorales
 * Date: 11/16/16
 * Time: 11:12 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../../lib/jquery-3.1.0.min.js"></script>
</head>
<body>

Lista de reportes ....

<br />

<div style="background-color: #3d8230; color: #000000" onclick="loadReport(1);">Reporte 1</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(2);">Reporte 2</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(3);">Reporte 3</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(4);">Reporte 4</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(5);">Reporte 5</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(6);">Reporte 6</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(7);">Reporte 7</div>
<div style="background-color: #3d8230; color: #000000" onclick="loadReport(8);">Reporte 8</div>


<div id="divFilter" style="display: none; background-color: #b38600">

</div>

<div id="divReport" style="display: none; background-color: #0d3859">

</div>

<div id="divWorking" style="display: none;  background-color: #00B8FE;">
    Working ...
</div>


<script>

    $jsnGridData = {
        "strSql":"",
        "strSqlOrder":"",
        "intSqlPage":1,
        "intSqlLimit":25,
        "intSqlNumberOfRecords":0,
        "intSqlNumberOfColumns":0,
        "intTableId":0,
        "strAjaxUrl":"ajax.php",
        "strAjaxProcess":"updateGrid",
        "arrFormField":"",
        "arrTableRelation":"",
        "intScrollPosition":0,
        "arrRelation":"",
        "arrFields":"",
    };


    function loadReport($intReportId){
        switch($intReportId){
            case 1:
                $jsnGridData.strSql = "SELECT * FROM algunlado WHERE ";
                $jsnGridData.arrFields = "";
                break;
            case 2:

                break;
            case 3:

                break;
            case 4:

                break;
            case 5:

                break;
            case 6:

                break;
            case 7:

                break;
            case 8:

                break;
        }
        loadFilter();
    }

    function loadFilter(){
        $('#divFilter').html('');
        $strFilter = '<input type="button" value="load Report" onclick="getReport();">';
        $('#divFilter').html($strFilter);
        $('#divFilter').show();
    }

    function getReport(){
        $('#divFilter').hide();
        $('#divReport').html();
        $('#divReport').append('regresa algo');
        $('#divReport').show();
    }


</script>


</body>
</html>
