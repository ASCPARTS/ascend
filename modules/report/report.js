$('document').ready(function(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $strQueryString = "strProcess=Filter";
        $.ajax({
            url: $intIdReport + ".php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $jsnReportParameters = $jsnPhpScriptResponse;
                $('#divTitle').html($jsnReportParameters.strTitle + ' - (' + $intIdReport + ')');
                $('#divFormFilters').html('');
                if($jsnReportParameters.arrFilters.length!=0){
                    for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                        $('#divFormFilters').append($jsnReportParameters.arrFilters[$intIndex].html);
                        switch($jsnReportParameters.arrFilters[$intIndex].type){
                            case 'numeric':
                                if($jsnReportParameters.arrFilters[$intIndex].decimalPlaces!=''){
                                    $('#' + $jsnReportParameters.arrFilters[$intIndex].name).numeric({ decimal: ".", decimalPlaces: parseInt($jsnReportParameters.arrFilters[$intIndex].decimalPlaces), negative: $jsnReportParameters.arrFilters[$intIndex].negative });
                                }else{
                                    $('#' + $jsnReportParameters.arrFilters[$intIndex].name).numeric({ decimal: false, negative: $jsnReportParameters.arrFilters[$intIndex].negative });
                                }
                                break;
                            case 'textwithscore':
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).mask('009-00999');
                                break;
                            case 'date':
                                if($jsnReportParameters.arrFilters[$intIndex].name.substr($jsnReportParameters.arrFilters[$intIndex].name.length - 5,5)=='_From'){
                                    $('#' + $jsnReportParameters.arrFilters[$intIndex].name).datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#strDate_From').val().split('-').join(''))>parseInt($('#strDate_To').val().split('-').join(''))){$('#strDate_To').val($('#strDate_From').val());}}});
                 
                                }else{
                                    $('#' + $jsnReportParameters.arrFilters[$intIndex].name).datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#strDate_To').val().split('-').join(''))<parseInt($('#strDate_From').val().split('-').join(''))){$('#strDate_From').val($('#strDate_To').val());}}});
                                }
                                break;
                        }
                    }
                    $('#btnGetReport').show();
                    $('#divWorkingBackground').fadeOut('slow');
                }else{
                    $('#btnGetReport').click();
                    $('#btnShowFilters').hide();
                }
            }
        });
    });
});

function evalForm() {

    console.clear();

    $('#divWorkingBackground').fadeIn('slow',function(){
        $('#divFormErrMsg').html('');
        $('#divFormErrMsg').slideUp('fast');
        $blnGo=true;
        for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
            if($jsnReportParameters.arrFilters[$intIndex].required){
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
                    case 'textwithscore':
                        if(!evalTextWithScore($jsnReportParameters.arrFilters[$intIndex].name)){
                            $('#' + $jsnReportParameters.arrFilters[$intIndex].name).focus();
                            $blnGo = false;
                            $('#divFormErrMsg').html('El formato del campo ' + $jsnReportParameters.arrFilters[$intIndex].label + ' es incorrecto!');
                            $('#divFormErrMsg').slideDown('fast');
                            $('#divWorkingBackground').fadeOut('slow' );
                            $intIndex = $jsnReportParameters.arrFilters.length + 1;
                        }
                        break;
                }
            }
        }
        if($blnGo){
            $strQueryString = 'strProcess=Report';
            for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                if($jsnReportParameters.arrFilters[$intIndex].type=='date'){
                    $strQueryString += '&' + $jsnReportParameters.arrFilters[$intIndex].name + '=' + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().substr(0,4) + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().substr(5,2) + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().substr(8,2);
                    if($jsnReportParameters.arrFilters[$intIndex].name.substr($jsnReportParameters.arrFilters[$intIndex].name.length - 5,5)=='_From'){
                        $strQueryString += '000000';
                    }else{
                        $strQueryString += '999999';
                    }
                }else{
                    $strQueryString += '&' + $jsnReportParameters.arrFilters[$intIndex].name + '=' + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().trim();
                }
            }

            $.ajax({
                url: $intIdReport + ".php", data: $strQueryString, type: "POST", dataType: "json",
                success: function ($jsnPhpScriptResponse) {

                    $jsnReportResults = $jsnPhpScriptResponse;

                    if($jsnReportResults.btnXLS){
                        $('#btnXLS').show();
                    }
                    if($jsnReportResults.btnPDF){
                        $('#btnPDF').show();
                    }
                    if($jsnReportResults.btnTXT){
                        $('#btnTXT').show();
                    }

                    $('#divReportHeader').html('');
                    $('#divReportHeader').html($jsnReportResults.divReportHeader);

                    $('#divReportTable').html('');
                    $('#divReportTable').html($jsnReportResults.divReportTable);

                    $('#divForm').slideUp('fast',function(){
                        $('#divReportContainer').slideDown('fast',function(){
                            for($intColIndex=0;$intColIndex<parseInt($('#theadReport tr:nth-child(1) th').length - 1);$intColIndex++){
                                $intColumnWidth = 0;
                                $intColumnWidthHeader = $('#theadReport tr:first th:eq(' + $intColIndex + ')').outerWidth();
                                $intColumnWidthContent = $('#tbodyReport tr:first td:eq(' + $intColIndex + ')').outerWidth();
                                if($intColumnWidthHeader>=$intColumnWidthContent){
                                    $intColumnWidth = $intColumnWidthHeader;
                                }else{
                                    $intColumnWidth = $intColumnWidthContent;
                                }
                                $('#theadReport tr:first th:eq(' + $intColIndex + ')').css('width',$intColumnWidth + 'px');
                                $('#theadReport tr:first th:eq(' + $intColIndex + ')').css('min-width',$intColumnWidth + 'px');
                                $('#theadReport tr:first th:eq(' + $intColIndex + ')').css('max-width',$intColumnWidth + 'px');
                                $('#tbodyReport tr:first td:eq(' + $intColIndex + ')').css('width',$intColumnWidth + 'px')
                                $('#tbodyReport tr:first td:eq(' + $intColIndex + ')').css('min-width',$intColumnWidth + 'px');
                                $('#tbodyReport tr:first td:eq(' + $intColIndex + ')').css('max-width',$intColumnWidth + 'px');
                            }
                            if($('#divReportTable').get(0).scrollHeight>$('#divReportTable').height() && $('#divReportTable').get(0).scrollWidth>$('#divReportTable').width()){
                                $intNewWidth = parseInt($('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').outerWidth() + 3);
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('width',$intNewWidth + 'px');
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('min-width',$intNewWidth + 'px');
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('max-width',$intNewWidth + 'px');
                            }
                            /*
                            if(!($('#divReportTable').get(0).scrollHeight>$('#divReportTable').height()) && ($('#divReportTable').get(0).scrollWidth>$('#divReportTable').width())){
                                alert('ps entro');
                                $intNewWidth = parseInt($('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').outerWidth() + 1);
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('width',$intNewWidth + 'px');
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('min-width',$intNewWidth + 'px');
                                $('#theadReport tr:first th:eq(' + parseInt($('#theadReport tr:nth-child(1) th').length - 2) + ')').css('max-width',$intNewWidth + 'px');
                            }
                            */
                            $('#divWorkingBackground').fadeOut('slow');
                        });
                    });
                },
                error: function($objError){
                    alert('algo paso');
                    console.log($objError);
                    $('#divWorkingBackground').fadeOut('slow');
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

function evalTextWithScore($strInput){
    $blnReturn = true;
    if($('#' + $strInput).val().trim()==''){
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

function scrollHeader(){
    $('#divReportHeader').scrollLeft($('#divReportTable').scrollLeft());
}

