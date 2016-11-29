$('document').ready(function(){
    $('#divWorkingBackground').fadeIn('slow',function(){
        $strQueryString = "strProcess=Filter";
        $.ajax({
            url: $intIdReport + ".php", data: $strQueryString, type: "POST", dataType: "json",
            success: function ($jsnPhpScriptResponse) {
                $jsnReportParameters = $jsnPhpScriptResponse;
                $('#divTitle').html($jsnReportParameters.strTitle);
                $('#divFormFilters').html('');
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
                        case 'date':
                            if($jsnReportParameters.arrFilters[$intIndex].name.substr($jsnReportParameters.arrFilters[$intIndex].name.length - 5,5)=='_From'){
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#strDate_From').val().split('-').join(''))>parseInt($('#strDate_To').val().split('-').join(''))){$('#strDate_To').val($('#strDate_From').val());}}});
                            }else{
                                $('#' + $jsnReportParameters.arrFilters[$intIndex].name).datepicker({inline: false, language: 'es', firstDay: 1, toggleSelected: false, autoClose: true, onSelect: function(){if(parseInt($('#strDate_To').val().split('-').join(''))<parseInt($('#strDate_From').val().split('-').join(''))){$('#strDate_From').val($('#strDate_To').val());}}});
                            }
                            break;
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
                    case 'algo':

                        break;
                }
            }
        }
        if($blnGo){
            $strQueryString = 'strProcess=Report';
            for($intIndex=0;$intIndex<$jsnReportParameters.arrFilters.length;$intIndex++){
                if($jsnReportParameters.arrFilters[$intIndex].type='date'){
                    $strQueryString += '&' + $jsnReportParameters.arrFilters[$intIndex].name + '=' + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().trim();
                }else{
                    $strQueryString += '&' + $jsnReportParameters.arrFilters[$intIndex].name + '=' + $('#' + $jsnReportParameters.arrFilters[$intIndex].name).val().trim();
                }
            }
            $.ajax({
                url: $intIdReport + ".php", data: $strQueryString, type: "POST", dataType: "json",
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