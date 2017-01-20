<?php
require_once('../../inc/include.config.php');
ini_set("display_errors",1);
require_once('class.php');
$objCatalog = new classCatalog();
$objCatalog->intCatalogId = $_REQUEST['intCatalogId'];
$objCatalog->buildCatalogData();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php require_once('../../' . INCLUDE_PATH . '/sheet.inc');?>
        <link rel="stylesheet" type="text/css" href="css.css?v=<?php echo date('Ymdhis') ;?>">
    </head>
    <body>
    <div class="MainTitle" id="divTitle">Catálogo de <?php echo $objCatalog->strCatalogTitle; ?></div>
    <div class="MainContainer">
        <div class="ButtonContainer">
            <?php if($objCatalog->intExcelImport==1){ ?><input type="button" class="btnOnlineGreen btn" value="importar xls" style="" onclick="importExcel(<?php echo $objCatalog->intCatalogId; ?>);"><?php } ?>
            <?php if($objCatalog->intExcelExport==1){ ?><input type="button" class="btnOnlineGreen btn" value="exportar xls" style="" onclick="exportExcel(<?php echo $objCatalog->intCatalogId; ?>);"><?php } ?>
            <?php if($objCatalog->intPDFExport==1){ ?><input type="button" class="btnBrandRed btn" value="exportar pdf" style="" onclick="exportPdf(<?php echo $objCatalog->intCatalogId; ?>);"><?php } ?>
            <?php if($objCatalog->intImageImport==1){ ?><input type="button" class="btnAlternativeBlue btn" value="importar imágenes" style="" onclick="importImage(<?php echo $objCatalog->intCatalogId; ?>);"><?php } ?>
            <input type="button" class="btnBrandBlue btn" value="nuevo registro" style="" onclick="newRecord(-1);">
        </div>
        <br style="clear: both;" />
        <div class="divCatalogContainer">
            <div class="divCatalogHeader">
                <table class="tableCatalogHeader"><tr class="trCatalogHeader"><?php echo $objCatalog->strCatalogHeader; ?></tr></table>
            </div>
            <div class="divCatalogFilter">
                <table clasS="tableCatalogFilter"><tr class="trCatalogFilter"><?php echo $objCatalog->strCatalogFilter; ?></tr></table>
            </div>
            <div style="background-color: #3d8230">
                <table >

                </table>
            </div>
            <div style="background-color: #3d8230">pagination</div>
        </div>
    </div>


    <?php require_once('../../' . INCLUDE_PATH . '/include.working.php');?>
    <script src="javascript.js?v=<?php echo date('Ymdhis') ;?>"></script>
    </body>
</html>
<?php
unset($objCatalog);
?>