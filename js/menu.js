function openMenuMain(){
    $('#divMenuMain').css('width','100%');
}

function closeMenuMain() {
    limpiarmenu();
    $('#divMenuMain').css('width','0');
}

function openMenu($intLevel,$intMenu){
    switch ($intLevel){
        case 1:
            $('#divcleanmenu').css('width','70%');
            for($intIndex=0;$intIndex<$arrMenu.Categories.length;$intIndex++){
                $('#divMenuCategory_' + $arrMenu.Categories[$intIndex]).removeClass('divMenuCategorySelected');
                $('#divMenuMain_' + $arrMenu.Categories[$intIndex]).css('width','0');
                //if($arrMenu[$arrMenu.Categories[$intIndex]].length!=0){
                //    for($intSubIndex=0;$intSubIndex<$arrMenu[$arrMenu.Categories[$intIndex]].length;$intSubIndex++){
                //        $('#divSubCategoryContainer_' + $arrMenu[$arrMenu.Categories[$intIndex]][$intSubIndex]).slideUp('fast');
                //    }
                //}
            }
            $('#divMenuCategory_' + $intMenu).addClass('divMenuCategorySelected');
            $('#divMenuMain_' + $intMenu).css('width','15%');
            break;
        case 2:
            $('#divcleanmenu').css('width','55%');
            for($intSubIndex=0;$intSubIndex<$arrMenu[$strCategory].length;$intSubIndex++){
                $('#divSubCategoryContainer_' + $arrMenu[$strCategory][$intSubIndex]).slideUp('fast');
            }
            $('#divMenuSubCategory_1_' + $intMenu).addClass('divMenuSubCategorySelected');
            $('#divMenuMain' + $intLevel + '_' + $intMenu).css('width','15%');
    }


}

/*
function openCategory($strCategory){
    for($intIndex=0;$intIndex<$arrMenu.Categories.length;$intIndex++){
        $('#divCategoryContainer_' + $arrMenu.Categories[$intIndex]).slideUp('fast');
        if($arrMenu[$arrMenu.Categories[$intIndex]].length!=0){
            for($intSubIndex=0;$intSubIndex<$arrMenu[$arrMenu.Categories[$intIndex]].length;$intSubIndex++){
                $('#divSubCategoryContainer_' + $arrMenu[$arrMenu.Categories[$intIndex]][$intSubIndex]).slideUp('fast');
            }
        };
    }
    $('#divCategoryContainer_' + $strCategory).css('height', 'calc(100vh - ' + parseInt(parseInt($('#divMenuHeader').css('height').replace('px','').replace(' ','')) + 4 + ($arrMenu.Categories.length * 32) + 2) + 'px)');
    $('#divCategoryContainer_' + $strCategory).slideDown('fast');
}

function openSubCategory($strCategory,$strSubCategory){
    for($intSubIndex=0;$intSubIndex<$arrMenu[$strCategory].length;$intSubIndex++){
        $('#divSubCategoryContainer_' + $arrMenu[$strCategory][$intSubIndex]).slideUp('fast');
    }
    $('#divSubCategoryContainer_' + $strSubCategory).slideDown('fast');
}

function cleanMenu(){
    for($intIndex=0;$intIndex<$arrMenu.Categories.length;$intIndex++){
        $('#divCategoryContainer_' + $arrMenu.Categories[$intIndex]).slideUp('fast');
        if($arrMenu[$arrMenu.Categories[$intIndex]].length!=0){
            for($intSubIndex=0;$intSubIndex<$arrMenu[$arrMenu.Categories[$intIndex]].length;$intSubIndex++){
                $('#divSubCategoryContainer_' + $arrMenu[$arrMenu.Categories[$intIndex]][$intSubIndex]).slideUp('fast');
            }
        };
    }
}
*/
function openUserMenu(){
    $('#divTopMenuUserMain').slideDown('slow');
}

function closeUserMenu(){
    $('#divTopMenuUserMain').slideUp('fast');
}