<div id="divMenuMain">
    <table id="tblMenu" >
        <tr>
            <td id="tdMenu">
                <div id="divMenuHeader"></div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('1')">Catálogos</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_1">
                        <div class="divMenuOption">Clientes</div>
                        <div class="divMenuOption">Proveedores</div>
                        <div class="divMenuOption">Productos</div>
                        <div class="divMenuOption">Bancos</div>
                        <div class="divMenuOption">Almacenes</div>
                        <div class="divMenuOption">Aduanas</div>
                        <div class="divMenuOption">Impuestos</div>
                        <div class="divMenuOption">Familias</div>
                        <div class="divMenuOption">Marcas</div>
                        <div class="divMenuOption">Modelos</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('2')">Administración</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_2">
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_1')">Bancos</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_1">
                                <div class="divMenuOption">Bancos</div>
                                <div class="divMenuOption">Retiros</div>
                                <div class="divMenuOption">Cheques</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                                <div class="divMenuOption">Conciliación Bancaria</div>
                            </div>
                        </div>
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_2')">CXC</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_2">
                                <div class="divMenuOption">Notas de Crédito</div>
                                <div class="divMenuOption">Cobros</div>
                                <div class="divMenuOption">Anticipos</div>
                                <div class="divMenuOption">Aplicación de Anticipos</div>
                                <div class="divMenuOption">Facturas</div>
                                <div class="divMenuOption">Pedidos</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                            </div>
                        </div>
                        <div class="divMenuSubCategory">
                            <div class="divSubCategory" onclick="openSubCategory('2','2_3')">CXP</div>
                            <div class="divSubCategoryContainer" id="divSubCategoryContainer_2_3">
                                <div class="divMenuOption">Notas de Cargo</div>
                                <div class="divMenuOption">Pagos</div>
                                <div class="divMenuOption">Anticipos</div>
                                <div class="divMenuOption">Aplicación de Anticipos</div>
                                <div class="divMenuOption">Programación de Pagos</div>
                                <div class="divMenuOption">Estados de Cuenta</div>
                                <div class="divMenuOption">Cierre Mensual</div>
                            </div>
                        </div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('3')">Ventas</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_3">
                        <div class="divMenuOption">Cotizar Producto</div>
                        <div class="divMenuOption">Realizar Pedido</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('4')">Compras</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_4">
                        <div class="divMenuOption">Responder</div>
                        <div class="divMenuOption">Elaborar Orden</div>
                        <div class="divMenuOption">Registrar</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('5')">Tráfico</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_5">
                        <div class="divMenuOption">Recepción de Productos</div>
                        <div class="divMenuOption">Pagos y Pedimentos</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('6')">Almacén</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_6">
                        <div class="divMenuOption">Recepción de Productos</div>
                        <div class="divMenuOption">Organización de Productos</div>
                        <div class="divMenuOption">Surtido de Pedidos</div>
                        <div class="divMenuOption">Facturar</div>
                        <div class="divMenuOption">Traspaso de Productos</div>
                        <div class="divMenuOption">Producción</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('7')">Garantías</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_7">
                        <div class="divMenuOption">RMA Cliente</div>
                        <div class="divMenuOption">RMA Proveedor</div>
                        <div class="divMenuOption">Reportes</div>
                    </div>
                </div>
                <div class="divMenuCategory">
                    <div class="divCategory" onclick="openCategory('8')">Maketing</div>
                    <div class="divCategoryContainer" id="divCategoryContainer_8">
                        <div class="divMenuOption">Opción 1</div>
                        <div class="divMenuOption">Opción 2</div>
                        <div class="divMenuOption">Opción 3</div>
                    </div>
                </div>
            </td>
            <td id="tdMenuClear" onclick="closeMenu();">&nbsp;</td>
        </tr>
    </table>
</div>
<script>
    $arrMenu = {
        'Categories':Array('1','2','3','4','5','6','7','8'),
        '1':Array(),
        '2':Array('2_1','2_2','2_3'),
        '3':Array(),
        '4':Array(),
        '5':Array(),
        '6':Array(),
        '7':Array(),
        '8':Array()
    };
</script>
<script src="js/menu.js"></script>