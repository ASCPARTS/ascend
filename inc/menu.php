<div id="divMenuMain">
<?php
/*
$conMySql = mysqli_connect('localhost','root','','db_ascend');
mysqli_query($conMySql, "SET NAMES 'utf8'");
$arrMenu = array();
$strSql = "SELECT * FROM tblMenu WHERE intParent = 0 ORDER BY intOrder;";
$rstLevel0 = mysqli_query($conMySql, $strSql);
$strDivs0 = '<div id="divMenuCategory_0" class="divMenuLevel0">'  . "\r\n" . '<div class="divMenuPadding divMenuLogo"></div>' . "\r\n";
$strDivs1 = '';
$strDivs2 = '';
while($arrLevel0=mysqli_fetch_assoc($rstLevel0)){
    $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel0['intId'] . " ORDER BY intOrder;";
    $rstLevel1 = mysqli_query($conMySql, $strSql);
    if(mysqli_num_rows($rstLevel1)!=0){
        $strDivs0 .= '<div id="divMenuCategory_' . $arrLevel0['intId'] . '" onclick="openMenu(2,' . $arrLevel0['intId'] . ');" class="divMenuCategory"><div class="divMenuLabel">' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
        $strDivs1 .= '<div id="divMenuMain_' . $arrLevel0['intId'] . '" class="divMenuLevel1">'  . "\r\n" . '<div class="divMenuPadding"></div>' . "\r\n";
    }else{
        $strDivs0 .= '<div id="divMenuOption_' . $arrLevel0['intId'] . '" onclick="handleTab(\'' . $arrLevel0['intId'] . '\',\'' . $arrLevel0['strName'] . '\',\'' . $arrLevel0['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel0['strName'] . '</div></div>' . "\r\n";
    }
    while($arrLevel1=mysqli_fetch_assoc($rstLevel1)){
        $strSql = "SELECT * FROM tblMenu WHERE intParent = " . $arrLevel1['intId'] . " ORDER BY intOrder;";
        $rstLevel2 = mysqli_query($conMySql, $strSql);
        if(mysqli_num_rows($rstLevel2)!=0){
            $strDivs1 .= '<div id="divMenuSubCategory_' . $arrLevel1['intId'] . '" onclick="openMenu(3,' . $arrLevel1['intId'] . ');" class="divMenuSubCategory"><div class="divMenuLabel">' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
            $strDivs2 .= '<div id="divMenuMain_' . $arrLevel1['intId'] . '" class="divMenuLevel2">'  . "\r\n" . '<div class="divMenuPadding"></div>' . "\r\n";
        }else{
            $strDivs1 .= '<div id="divMenuOption_' . $arrLevel1['intId'] . '" onclick="handleTab(\'' . $arrLevel1['intId'] . '\',\'' . $arrLevel1['strName'] . '\',\'' . $arrLevel1['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel1['strName'] . '</div></div>' . "\r\n";
        }
        while($arrLevel2=mysqli_fetch_assoc($rstLevel2)){
            $strDivs2 .= '<div id="divMenuOption_' . $arrLevel2['intId'] . '" onclick="handleTab(\'' . $arrLevel2['intId'] . '\',\'' . $arrLevel2['strName'] . '\',\'' . $arrLevel2['strUrl'] . '\');" class="divMenuOption"><div class="divMenuLabel">' . $arrLevel2['strName'] . '</div></div>' . "\r\n";
        }
        unset($arrLevel2);
        if(mysqli_num_rows($rstLevel2)!=0) {
            $strDivs2 .= "</div>" . "\r\n";
        }
        mysqli_free_result($rstLevel2);
        unset($rstLevel2);
    }
    unset($arrLevel1);
    if(mysqli_num_rows($rstLevel1)!=0) {
        $strDivs1 .= "</div>" . "\r\n";
    }
    mysqli_free_result($rstLevel1);
    unset($rstLevel1);
}
unset($arrLevel0);
$strDivs0 .= "</div>" . "\r\n";
mysqli_free_result($rstLevel0);
unset($rstLevel0);
mysqli_close($conMySql);
unset($conMySql);
echo $strDivs0;
echo $strDivs1;
echo $strDivs2;
*/
?>
    <!-- #### MENU HARDCODE ##### -->
    <div id="divMenuCategory_0" class="divMenuLevel0">
        <div class="divMenuPadding divMenuLogo"></div>
        <div id="divMenuCategory_1" onclick="openMenu(2,1);" class="divMenuCategory"><div class="divMenuLabel">Catálogos</div></div>
        <div id="divMenuCategory_12" onclick="openMenu(2,12);" class="divMenuCategory"><div class="divMenuLabel">Administración</div></div>
        <div id="divMenuCategory_38" onclick="openMenu(2,38);" class="divMenuCategory"><div class="divMenuLabel">Ventas</div></div>
        <div id="divMenuCategory_42" onclick="openMenu(2,42);" class="divMenuCategory"><div class="divMenuLabel">Compras</div></div>
        <div id="divMenuCategory_47" onclick="openMenu(2,47);" class="divMenuCategory"><div class="divMenuLabel">Tráfico</div></div>
        <div id="divMenuCategory_50" onclick="openMenu(2,50);" class="divMenuCategory"><div class="divMenuLabel">Almacén</div></div>
        <div id="divMenuCategory_58" onclick="openMenu(2,58);" class="divMenuCategory"><div class="divMenuLabel">Garantías</div></div>
        <div id="divMenuCategory_62" onclick="openMenu(2,62);" class="divMenuCategory"><div class="divMenuLabel">Marketing</div></div>
        <div id="divMenuOption_66" onclick="handleTab('66','Opción sin Categoria','');" class="divMenuOption"><div class="divMenuLabel">Opción sin Categoria</div></div>
    </div>
    <div id="divMenuMain_1" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_2" onclick="handleTab('2','Clientes','');" class="divMenuOption"><div class="divMenuLabel">Clientes</div></div>
        <div id="divMenuOption_3" onclick="handleTab('3','Proveedores','');" class="divMenuOption"><div class="divMenuLabel">Proveedores</div></div>
        <div id="divMenuOption_4" onclick="handleTab('4','Productos','modules/order/quotationOrder.php');" class="divMenuOption"><div class="divMenuLabel">Productos</div></div>
        <div id="divMenuOption_5" onclick="handleTab('5','Bancos','');" class="divMenuOption"><div class="divMenuLabel">Bancos</div></div>
        <div id="divMenuOption_6" onclick="handleTab('6','Almacenes','');" class="divMenuOption"><div class="divMenuLabel">Almacenes</div></div>
        <div id="divMenuOption_7" onclick="handleTab('7','Aduanas','');" class="divMenuOption"><div class="divMenuLabel">Aduanas</div></div>
        <div id="divMenuOption_8" onclick="handleTab('8','Impuestos','');" class="divMenuOption"><div class="divMenuLabel">Impuestos</div></div>
        <div id="divMenuOption_9" onclick="handleTab('9','Familias','');" class="divMenuOption"><div class="divMenuLabel">Familias</div></div>
        <div id="divMenuOption_10" onclick="handleTab('10','Marcas','');" class="divMenuOption"><div class="divMenuLabel">Marcas</div></div>
        <div id="divMenuOption_11" onclick="handleTab('11','Modelos','');" class="divMenuOption"><div class="divMenuLabel">Modelos</div></div>
    </div>
    <div id="divMenuMain_12" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuSubCategory_13" onclick="openMenu(3,13);" class="divMenuSubCategory"><div class="divMenuLabel">Bancos</div></div>
        <div id="divMenuSubCategory_20" onclick="openMenu(3,20);" class="divMenuSubCategory"><div class="divMenuLabel">CXC</div></div>
        <div id="divMenuSubCategory_29" onclick="openMenu(3,29);" class="divMenuSubCategory"><div class="divMenuLabel">CXP</div></div>
        <div id="divMenuOption_37" onclick="handleTab('37','Reportes','');" class="divMenuOption"><div class="divMenuLabel">Reportes</div></div>
    </div>
    <div id="divMenuMain_38" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_39" onclick="handleTab('39','Cotizar Producto','');" class="divMenuOption"><div class="divMenuLabel">Cotizar Producto</div></div>
        <div id="divMenuOption_40" onclick="handleTab('40','Realizar Pedido','');" class="divMenuOption"><div class="divMenuLabel">Realizar Pedido</div></div>
        <div id="divMenuOption_41" onclick="handleTab('41','Reportes','');" class="divMenuOption"><div class="divMenuLabel">Reportes</div></div>
    </div>
    <div id="divMenuMain_42" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_43" onclick="handleTab('43','Responder','');" class="divMenuOption"><div class="divMenuLabel">Responder</div></div>
        <div id="divMenuOption_44" onclick="handleTab('44','Elaborar Orden','');" class="divMenuOption"><div class="divMenuLabel">Elaborar Orden</div></div>
        <div id="divMenuOption_45" onclick="handleTab('45','Registrar','');" class="divMenuOption"><div class="divMenuLabel">Registrar</div></div>
        <div id="divMenuOption_46" onclick="handleTab('46','Reportes','');" class="divMenuOption"><div class="divMenuLabel">Reportes</div></div>
    </div>
    <div id="divMenuMain_47" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_48" onclick="handleTab('48','Recepción de Productos','');" class="divMenuOption"><div class="divMenuLabel">Recepción de Productos</div></div>
        <div id="divMenuOption_49" onclick="handleTab('49','Pagos y Pedimentos','');" class="divMenuOption"><div class="divMenuLabel">Pagos y Pedimentos</div></div>
    </div>
    <div id="divMenuMain_50" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_51" onclick="handleTab('51','Recepción de Productos','');" class="divMenuOption"><div class="divMenuLabel">Recepción de Productos</div></div>
        <div id="divMenuOption_52" onclick="handleTab('52','Organización de Productos','');" class="divMenuOption"><div class="divMenuLabel">Organización de Productos</div></div>
        <div id="divMenuOption_53" onclick="handleTab('53','Surtido de Pedidos','');" class="divMenuOption"><div class="divMenuLabel">Surtido de Pedidos</div></div>
        <div id="divMenuOption_54" onclick="handleTab('54','Facturar','');" class="divMenuOption"><div class="divMenuLabel">Facturar</div></div>
        <div id="divMenuOption_55" onclick="handleTab('55','Traspaso de Productos','');" class="divMenuOption"><div class="divMenuLabel">Traspaso de Productos</div></div>
        <div id="divMenuOption_56" onclick="handleTab('56','Producción','');" class="divMenuOption"><div class="divMenuLabel">Producción</div></div>
        <div id="divMenuOption_57" onclick="handleTab('57','Reportes','');" class="divMenuOption"><div class="divMenuLabel">Reportes</div></div>
    </div>
    <div id="divMenuMain_58" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_59" onclick="handleTab('59','RMA Cliente','');" class="divMenuOption"><div class="divMenuLabel">RMA Cliente</div></div>
        <div id="divMenuOption_60" onclick="handleTab('60','RMA Proveedor','');" class="divMenuOption"><div class="divMenuLabel">RMA Proveedor</div></div>
        <div id="divMenuOption_61" onclick="handleTab('61','Reportes','');" class="divMenuOption"><div class="divMenuLabel">Reportes</div></div>
    </div>
    <div id="divMenuMain_62" class="divMenuLevel1">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_63" onclick="handleTab('63','Opción 1','');" class="divMenuOption"><div class="divMenuLabel">Opción 1</div></div>
        <div id="divMenuOption_64" onclick="handleTab('64','Opción 2','');" class="divMenuOption"><div class="divMenuLabel">Opción 2</div></div>
        <div id="divMenuOption_65" onclick="handleTab('65','Opción 3','');" class="divMenuOption"><div class="divMenuLabel">Opción 3</div></div>
    </div>
    <div id="divMenuMain_13" class="divMenuLevel2">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_14" onclick="handleTab('14','Bancos','');" class="divMenuOption"><div class="divMenuLabel">Bancos</div></div>
        <div id="divMenuOption_15" onclick="handleTab('15','Retiros','');" class="divMenuOption"><div class="divMenuLabel">Retiros</div></div>
        <div id="divMenuOption_16" onclick="handleTab('16','Cheques','');" class="divMenuOption"><div class="divMenuLabel">Cheques</div></div>
        <div id="divMenuOption_17" onclick="handleTab('17','Estados de Cuenta','');" class="divMenuOption"><div class="divMenuLabel">Estados de Cuenta</div></div>
        <div id="divMenuOption_18" onclick="handleTab('18','Cierre Mensual','');" class="divMenuOption"><div class="divMenuLabel">Cierre Mensual</div></div>
        <div id="divMenuOption_19" onclick="handleTab('19','Conciliación Bancaria','');" class="divMenuOption"><div class="divMenuLabel">Conciliación Bancaria</div></div>
    </div>
    <div id="divMenuMain_20" class="divMenuLevel2">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_21" onclick="handleTab('21','Notas de Crédito','');" class="divMenuOption"><div class="divMenuLabel">Notas de Crédito</div></div>
        <div id="divMenuOption_22" onclick="handleTab('22','Cobros','');" class="divMenuOption"><div class="divMenuLabel">Cobros</div></div>
        <div id="divMenuOption_23" onclick="handleTab('23','Anticipos','');" class="divMenuOption"><div class="divMenuLabel">Anticipos</div></div>
        <div id="divMenuOption_24" onclick="handleTab('24','Aplicación de Anticipos','');" class="divMenuOption"><div class="divMenuLabel">Aplicación de Anticipos</div></div>
        <div id="divMenuOption_25" onclick="handleTab('25','Facturas','');" class="divMenuOption"><div class="divMenuLabel">Facturas</div></div>
        <div id="divMenuOption_26" onclick="handleTab('26','Pedidos','');" class="divMenuOption"><div class="divMenuLabel">Pedidos</div></div>
        <div id="divMenuOption_27" onclick="handleTab('27','Estados de Cuenta','');" class="divMenuOption"><div class="divMenuLabel">Estados de Cuenta</div></div>
        <div id="divMenuOption_28" onclick="handleTab('28','Cierre Mensual','');" class="divMenuOption"><div class="divMenuLabel">Cierre Mensual</div></div>
    </div>
    <div id="divMenuMain_29" class="divMenuLevel2">
        <div class="divMenuPadding"></div>
        <div id="divMenuOption_30" onclick="handleTab('30','Notas de Cargo','');" class="divMenuOption"><div class="divMenuLabel">Notas de Cargo</div></div>
        <div id="divMenuOption_31" onclick="handleTab('31','Pagos','');" class="divMenuOption"><div class="divMenuLabel">Pagos</div></div>
        <div id="divMenuOption_32" onclick="handleTab('32','Anticipos','');" class="divMenuOption"><div class="divMenuLabel">Anticipos</div></div>
        <div id="divMenuOption_33" onclick="handleTab('33','Aplicación de Anticipos','');" class="divMenuOption"><div class="divMenuLabel">Aplicación de Anticipos</div></div>
        <div id="divMenuOption_34" onclick="handleTab('34','Programación de Pagos','');" class="divMenuOption"><div class="divMenuLabel">Programación de Pagos</div></div>
        <div id="divMenuOption_35" onclick="handleTab('35','Estados de Cuenta','');" class="divMenuOption"><div class="divMenuLabel">Estados de Cuenta</div></div>
        <div id="divMenuOption_36" onclick="handleTab('36','Cierre Mensual','');" class="divMenuOption"><div class="divMenuLabel">Cierre Mensual</div></div>
    </div>
<!-- #### MENU HARDCODE ##### -->
    <div id="divcleanmenu" class="divMenuClear" onclick="closeMenuMain();">
</div>
<br style="clear: both" />
</div>