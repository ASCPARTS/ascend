<!DOCTYPE html>
<html>
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Cámaras</div>
<div class="MainContainer" style="text-align: center; height: calc(100vh - 62px); display: block;">
    <input id="btn3001" type="button" class="btn btnBrandBlue" value="1 x 1" onclick="loadDivision(1);">
    <input id="btn3001" type="button" class="btn btnBrandBlue" value="2 x 2" onclick="loadDivision(2);">
    <input id="btn3001" type="button" class="btn btnBrandBlue" value="3 x 3" onclick="loadDivision(3);">
    <div style="width: 100%; height: 1px; background-color: #F1F1F1; margin: 6px; "></div>
    <div style="width: 100%; height: calc(100vh - 108px);">
        <table id="tblCams" style="width: 100%; height: 100%; border-spacing: 0; border-collapse: collapse; margin: 0 0 0 0; padding: 0 0 0 0;">
        </table>
    </div>
</div>
<script>
    function loadDivision($intOption){

        //http://201.163.99.82:3001/axis-cgi/mjpg/video.cgi?resolution=320x240

        $strTrToAppend = '';
        $('#tblCams').fadeOut('fast',function(){
            $('#tblCams tr').remove();
            for($intTr=1;$intTr<=$intOption;$intTr++){
                $strTrToAppend += '<tr>';
                for($intTd=1;$intTd<=$intOption;$intTd++) {
                    $strTrToAppend += '<td style="border:1px #050409 solid; width: calc(100% / ' + $intOption + '); height: calc(100% / ' + $intOption + ');">';
                    $strTrToAppend += '<iframe frameborder="no" scrolling="no" style="border: 0; width: 100%; height: 100%; margin: 0 0 0 0; padding: 0 0 0 0"></iframe>';
                    $strTrToAppend += '</td>';
                }
                $strTrToAppend += '</tr>';
            }
            $('#tblCams').append($strTrToAppend);
            $('#tblCams').fadeIn('fast');
        });
    }
</script>
</body>
</html>