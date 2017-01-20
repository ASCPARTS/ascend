$arrTabs = Array();
$intCurrentTab = "";

function handleTab($intTab, $strName, $strUrl){
    $strDivToAppend = "";
    $strIframeToAppend = "";
    if($arrTabs.indexOf($intTab)==-1){
        $arrTabs.push($intTab);
        $('#labelTab_' + $intCurrentTab).removeClass('labelTabSelected');
        $('#iframeSheet_' + $intCurrentTab).hide();
        $strDivToAppend = '<div id="divTab_' + $intTab + '" class="divTab"><label id="labelTab_' + $intTab + '" class="labelTab" onclick="handleTab(\'' + $intTab + '\')" title="' + $strName + '">' + $strName + '</label><label class="labelTabClose" onclick="closeTab(\'' + $intTab + '\')">&#10005</label></div>';
        $('#divTabContainer').append($strDivToAppend);
        $strIframeToAppend = '<iframe id="iframeSheet_' + $intTab + '" class="iframeSheet" src="' + $strUrl + '"></iframe>';
        $('#divSheetContainer').append($strIframeToAppend);
        $intCurrentTab = $intTab;
        $('#labelTab_' + $intTab).addClass('labelTabSelected');
    }else{
        if($intCurrentTab!=$intTab){
            $('#labelTab_' + $intCurrentTab).removeClass('labelTabSelected');
            $('#iframeSheet_' + $intCurrentTab).hide();
            $intCurrentTab = $intTab;
            $('#labelTab_' + $intTab).addClass('labelTabSelected');
            $('#iframeSheet_' + $intTab).show();
        }
    }
    closeMenuMain();
}

function closeTab($intTab){
    $('#divTab_' + $intTab).remove();
    $('#iframeSheet_' + $intTab).remove();
    if($intCurrentTab==$intTab){
        if($arrTabs.indexOf($intTab)!=0){
            handleTab($arrTabs[$arrTabs.indexOf($intTab) - 1]);
        }else{
            if(typeof $arrTabs[$arrTabs.indexOf($intTab) + 1]!='undefined'){
                handleTab($arrTabs[$arrTabs.indexOf($intTab) + 1]);
            }else{
                $intCurrentTab = "";
            }
        }
    }
    $arrTabs.splice($arrTabs.indexOf($intTab),1);
}