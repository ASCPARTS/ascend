$intCurrentCategory = '';
$intCurrentSubCategory = '';

function openMenuMain(){
    $('#divMenuMain').css('width','100%');
}

function closeMenuMain() {
    $('#divcleanmenu').css('width', '85%');
    if($intCurrentSubCategory!=''){
        $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
        $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
        $intCurrentSubCategory = '';
    }
    $('#divMenuMain').css('width','0');
    if($intCurrentCategory!=''){
        $('#divMenuCategory_' + $intCurrentCategory).removeClass('divMenuCategorySelected');
        $('#divMenuMain_' + $intCurrentCategory).css('width','0');
        $intCurrentCategory = '';
    }
}

function openMenu($intLevel,$intMenu){
    $('#divcleanmenu').css('width', parseInt(100 - (15 * $intLevel)) + '%');
    switch($intLevel){
        case 2:
            if($intCurrentSubCategory!=''){
                $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
                $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
                $intCurrentSubCategory = '';
            }
            if($intCurrentCategory!=''){
                $('#divMenuCategory_' + $intCurrentCategory).removeClass('divMenuCategorySelected');
                $('#divMenuMain_' + $intCurrentCategory).css('width','0');
            }
            $intCurrentCategory = $intMenu;
            $('#divMenuCategory_' + $intMenu).addClass('divMenuCategorySelected');
            $('#divMenuMain_' + $intMenu).css('width', '15%');
            break;
        case 3:
            if($intCurrentSubCategory!=''){
                $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
                $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
            }
            $intCurrentSubCategory = $intMenu;
            $('#divMenuSubCategory_' + $intMenu).addClass('divMenuSubCategorySelected');
            $('#divMenuMain_' + $intMenu).css('width', '15%');
            break;
    }
}

function openUserMenu(){
    $('#divTopMenuUserMain').slideDown('slow');
}

function closeUserMenu(){
    $('#divTopMenuUserMain').slideUp('fast');
}