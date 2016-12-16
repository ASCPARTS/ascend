function filterGrid(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divGridHeader').html('');
        $('#divGridTable').html('');

        $strQueryString = "strProcess=filterGrid";
        $( ":input" ).each(function(){
            if($(this)[0].type=='text' || $(this)[0].type=='select-one'){
                $strQueryString += "&" + $(this)[0].id + "=" + $(this).val();
            }
        });
        $.ajax({
            url: "ajax.php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $('#divGridHeader').html($jsnPhpScriptResponse.gridHeader);
                $('#divGridTable').html($jsnPhpScriptResponse.gridTable);
                gridColumns();
                $('#divWorkingBackground').fadeOut('slow');
            },
            error: function ($objError) {
                console.log($objError);
                $('#divWorkingBackground').fadeOut('slow');
            }
        });
    });
}

function gridColumns(){
    for($intColIndex=0;$intColIndex<parseInt($('#theadGrid tr:nth-child(1) th').length - 1);$intColIndex++){
        $intColumnWidth = 0;
        $intColumnWidthHeader = $('#theadGrid tr:first th:eq(' + $intColIndex + ')').outerWidth();
        $intColumnWidthContent = $('#tbodyGrid tr:first td:eq(' + $intColIndex + ')').outerWidth();
        if($intColumnWidthHeader>=$intColumnWidthContent){
            $intColumnWidth = $intColumnWidthHeader;
        }else{
            $intColumnWidth = $intColumnWidthContent;
        }
        $('#theadGrid tr:first th:eq(' + $intColIndex + ')').css('width',$intColumnWidth + 'px');
        $('#theadGrid tr:first th:eq(' + $intColIndex + ')').css('min-width',$intColumnWidth + 'px');
        $('#theadGrid tr:first th:eq(' + $intColIndex + ')').css('max-width',$intColumnWidth + 'px');
        $('#tbodyGrid tr:first td:eq(' + $intColIndex + ')').css('width',$intColumnWidth + 'px')
        $('#tbodyGrid tr:first td:eq(' + $intColIndex + ')').css('min-width',$intColumnWidth + 'px');
        $('#tbodyGrid tr:first td:eq(' + $intColIndex + ')').css('max-width',$intColumnWidth + 'px');
    }
    if($('#divGridTable').get(0).scrollHeight>$('#divGridTable').height() && $('#divGridTable').get(0).scrollWidth>$('#divGridTable').width()){
        $intNewWidth = parseInt($('#theadGrid tr:first th:eq(' + parseInt($('#theadGrid tr:nth-child(1) th').length - 2) + ')').outerWidth() + 3);
        $('#theadGrid tr:first th:eq(' + parseInt($('#theadGrid tr:nth-child(1) th').length - 2) + ')').css('width',$intNewWidth + 'px');
        $('#theadGrid tr:first th:eq(' + parseInt($('#theadGrid tr:nth-child(1) th').length - 2) + ')').css('min-width',$intNewWidth + 'px');
        $('#theadGrid tr:first th:eq(' + parseInt($('#theadGrid tr:nth-child(1) th').length - 2) + ')').css('max-width',$intNewWidth + 'px');
    }
}

function scrollGridHeader(){
    $('#divGridHeader').scrollLeft($('#divGridTable').scrollLeft());
}
