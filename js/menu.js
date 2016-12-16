$intCurrentCategory = '';
$intCurrentSubCategory = '';

function openMenuMain(){
    $('#divMenuMain').css('width','100%');
}

function closeMenuMain() {
    $('#divcleanmenu').css('width', '80%');
    if($intCurrentSubCategory!=''){
        $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
        $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
        $('#divMenuMain_' + $intCurrentSubCategory).css('border-right','0');
        $intCurrentSubCategory = '';
    }
    $('#divMenuMain').css('width','0');
    if($intCurrentCategory!=''){
        $('#divMenuCategory_' + $intCurrentCategory).removeClass('divMenuCategorySelected');
        $('#divMenuMain_' + $intCurrentCategory).css('width','0');
        $('#divMenuMain_' + $intCurrentCategory).css('border-right','0');
        $intCurrentCategory = '';
    }
}

function openMenu($intLevel,$intMenu){
    $('#divcleanmenu').css('width', 'calc(' + parseInt(100 - (20 * $intLevel)) + '% - ' + parseInt(1 * $intLevel) + 'px)');
    switch($intLevel){
        case 2:
            if($intCurrentSubCategory!=''){
                $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
                $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
                $('#divMenuMain_' + $intCurrentSubCategory).css('border-right','0');
                $intCurrentSubCategory = '';
            }
            if($intCurrentCategory!=''){
                $('#divMenuCategory_' + $intCurrentCategory).removeClass('divMenuCategorySelected');
                $('#divMenuMain_' + $intCurrentCategory).css('width','0');
                $('#divMenuMain_' + $intCurrentCategory).css('border-right','0');
            }
            $intCurrentCategory = $intMenu;
            $('#divMenuCategory_' + $intMenu).addClass('divMenuCategorySelected');
            $('#divMenuMain_' + $intMenu).css('width', 'calc(20% - 1px)');
            $('#divMenuMain_' + $intMenu).css('border-right', '1px #1E202C solid');
            break;
        case 3:
            if($intCurrentSubCategory!=''){
                $('#divMenuSubCategory_' + $intCurrentSubCategory).removeClass('divMenuSubCategorySelected');
                $('#divMenuMain_' + $intCurrentSubCategory).css('width','0');
                $('#divMenuMain_' + $intCurrentSubCategory).css('border-right','0');
            }
            $intCurrentSubCategory = $intMenu;
            $('#divMenuSubCategory_' + $intMenu).addClass('divMenuSubCategorySelected');
            $('#divMenuMain_' + $intMenu).css('width', 'calc(20% - 1px)');
            $('#divMenuMain_' + $intMenu).css('border-right', '1px #1E202C solid');
            break;
    }
}

function openUserMenu(){
    $('#divTopMenuUserMain').slideDown('slow');
}

function closeUserMenu(){
    $('#divTopMenuUserMain').slideUp('fast');
}

function logout(){
    $('body').fadeOut('slow',function(){
        window.location = 'http://localhost/ascend/';
    });
}