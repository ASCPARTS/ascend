function openMenu(){
    $('#divMenuMain').fadeIn('fast');
}

function closeMenu() {
    cleanMenu();
    $('#divMenuMain').fadeOut('fast');
}

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

$intCloseFlag = 0;

function openUserMenu(){
    $('#divTopMenuUserMain').slideDown('slow');
}

function closeUserMenu(){
    $('#divTopMenuUserMain').slideUp('fast');
}