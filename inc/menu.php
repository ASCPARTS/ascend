<?php
$conMySql = mysqli_connect('localhost','root','','db_ascend');
mysqli_query($conMySql, "SET NAMES 'utf8'");

$strSql = "SELECT * FROM tblMenu WHERE intParent = 0 ORDER BY intOrder;";
$rstLevel0 = mysqli_query($conMySql, $strSql);

while($arrLevel0=mysqli_fetch_assoc($rstLevel0)){
    
}
unset($arrLevel0);


mysqli_free_result($rstCategory);
unset($rstCategory);
?>


<div id="divMenuMain">

<?php

$strSql = "SELECT * FROM tblMenu WHERE intParent = 0 ORDER BY intOrder;";
$rstCategory = mysqli_query($conMySql, $strSql);
if(mysqli_num_rows($rstCategory)!=0){
    ?>
    <div class="divMenuLevel0">
    <?php
    while($arrCategory = mysqli_fetch_assoc($rstCategory)){
        ?>
        <div id="divMenuCategory_<?php echo $arrCategory['intId'] ?>" onclick="openMenu(1,<?php echo $arrCategory['intId'] ?>);" class="divMenuCategory"><div class="divMenuLabel"><?php echo $arrCategory['strName'] ?></div></div>
        <?php
    }
    unset($arrCategory);
    ?>
    </div>
    <?php
    mysqli_data_seek($rstCategory,0);
    while($arrCategory = mysqli_fetch_assoc($rstCategory)){
        $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrCategory['intId'] . " ORDER BY intOrder;";
        $rstMenuLevel1 = mysqli_query($conMySql,$strSql);
        if(mysqli_num_rows($rstMenuLevel1)!=0){
            ?>
    <div id="divMenuMain_<?php echo $arrCategory['intId']; ?>" class="divMenuLevel1">
            <?php
            while($arrMenuLevel1 = mysqli_fetch_assoc($rstMenuLevel1)){
                ?>
                <div id="divMenuOption_<?php echo $arrMenuLevel1['intId']; ?>" onclick="closeMenuMain();" class="divMenuOption"><div class="divMenuLabel"><?php echo $arrMenuLevel1['strName']; ?></div></div>
                <?php
            }
            unset($arrMenuLevel1);
            ?>
    </div>
            <?php
        }
    }
    unset($arrCategory);
}
mysqli_free_result($rstCategory);
unset($rstCategory);

mysqli_close($conMySql);
unset($conMySql);
?>


    <div id="divMenuMain2_2_1" class="divMenuLevel2">

    </div>
    <div id="divMenuMain2_2_2" class="divMenuLevel2">

    </div>
    <div id="divMenuMain2_2_3" class="divMenuLevel2">

    </div>
    <div id="divcleanmenu" class="divMenuClear" onclick="closeMenuMain();">
    </div>
    <br style="clear: both" />
</div>
<script>

    function abrirmenu(){
        $('#divcleanmenu').css('width','70%');
        $('#divMenuMain1').css('width','15%');
    }

    function abrirmenu2(){
        $('#divcleanmenu').css('width','55%');
        $('#divMenuMain2').css('width','15%');
    }

    function limpiarmenu(){
        $('#divMenuMain2').css('width','0');
        $('#divMenuMain1').css('width','0');
        $('#divcleanmenu').css('width','85%');
    }

    $arrMenu = {
        'Categories':Array('1','12','38','42','47','50','58','62','END'),
        '12':Array('2_1','2_2','2_3'),
        'END':''
    };
</script>