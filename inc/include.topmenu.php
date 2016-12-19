<div class="divTopMenuLogo"></div>
<div class="divTopMenu divTopMenuLeft imageTopMenu imageTopMenuMenu" onclick="openMenuMain();"></div>
<?php
$strTopMenu = '';
$strSql = "SELECT * FROM tblMenu WHERE intId IN (SELECT intMenu FROM tblProfileMenu WHERE intProfile IN (SELECT intProfile FROM tblUserProfile WHERE intUser = " . $_SESSION['intUserID'] . ")) AND intStatus = 1 AND strLocation = 'T' ORDER BY intOrder;";
$rstTopMenu = $classAscend->dbQuery($strSql);
foreach ($rstTopMenu as $arrTopMenu){
    $strTopMenu .= '<div class="divTopMenu divTopMenuLeft imageTopMenu" style="background-image: url(\'' . $arrTopMenu['strIcon'] . '\');" title="' . $arrTopMenu['strName'] . '" onclick="';
    if($arrTopMenu['intEmbedded']==1) {
        $strTopMenu .= 'handleTab(\'' . $arrTopMenu['intId'] . '\',\'' . $arrTopMenu['strName'] . '\',\'' . $arrTopMenu['strUrl'] . '\');';
    }else{
        $strTopMenu .= 'window.open(\'' . $arrTopMenu['strUrl'] . '\',\'_blank\'); closeUserMenu();';
    }
    $strTopMenu .= '"></div>' . "\r\n";
}
unset($arrTopMenu);
unset($rstTopMenu);
echo $strTopMenu;
?>
<div class="divTopMenuUser" style="background-image: url('<?php echo $_SESSION['strUserImage'];?>')" onclick="openUserMenu();"><?php echo $_SESSION['strUserName'];?></div>
<div id="divTopMenuUserMain">
    <table id="tableTopMenuUserMain">
        <tr>
            <td rowspan="3" onclick="closeUserMenu();"></td>
            <td width="204" height="50" onclick="closeUserMenu();"></td>
        </tr>
        <tr>
            <td id="tdTopMenuUser" width="252" height="1">
                <?php
                $strUserMenu = '';
                $strSql = "SELECT * FROM tblMenu WHERE intId IN (SELECT intMenu FROM tblProfileMenu WHERE intProfile IN (SELECT intProfile FROM tblUserProfile WHERE intUser = " . $_SESSION['intUserID'] . ")) AND intStatus = 1 AND strLocation = 'U' ORDER BY intOrder;";
                $rstUserMenu = $classAscend->dbQuery($strSql);
                foreach ($rstUserMenu as $arrUserMenu){
                    $strUserMenu .= '<div class="divTopMenuUserOption" style="background-image: url(\'' . USER_MENU_ICON_PATH . $arrUserMenu['strIcon'] . '\');" onclick="';
                    if($arrUserMenu['intEmbedded']==1){
                        $strUserMenu .= 'handleTab(\'' . $arrUserMenu['intId'] . '\',\'' . $arrUserMenu['strName'] . '\',\'' . $arrUserMenu['strUrl'] . '\');';
                    }else{
                        $strUserMenu .= 'window.open(\'' . $arrUserMenu['strUrl'] . '\',\'_blank\'); closeUserMenu();';
                    }
                    $strUserMenu .= '">' . $arrUserMenu['strName'] . '</div>' . "\r\n";
                }
                unset($arrUserMenu);
                unset($rstUserMenu);
                echo $strUserMenu;
                ?>
                <br />
                <div class="divTopMenuUserOption" style="background-image: url('img/usermenu/logout.png');" onclick="logout();">Cerrar Sesión</div>
            </td>
        </tr>
        <tr><td width="204" height="*" onclick="closeUserMenu();"></td></tr>
    </table>
</div>