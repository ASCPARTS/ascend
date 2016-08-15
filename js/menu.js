function openMenu(){
    $('#divMenuMain').fadeIn('fast');
}

function closeMenu() {
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
    $('#divCategoryContainer_' + $strCategory).slideDown('fast');
}

function openSubCategory($strCategory,$strSubCategory){
    for($intSubIndex=0;$intSubIndex<$arrMenu[$strCategory].length;$intSubIndex++){
        $('#divSubCategoryContainer_' + $arrMenu[$strCategory][$intSubIndex]).slideUp('fast');
    }
    $('#divSubCategoryContainer_' + $strSubCategory).slideDown('fast');
}

