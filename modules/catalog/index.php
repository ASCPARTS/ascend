<?php
require_once('../../inc/include.config.php');
require_once( '../../' . LIB_PATH .  'class.ascend.php');
$objAscend = new clsAscend();
$objAscend->intTableId = $_GET['intTableId'];
$objAscend->getTableData();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php //require_once(INCLUDE_PATH . 'html_head.php'); ?>
    </head>
    <body>


    <div class="divTitles">Catálogo de <?php echo $objAscend->strGridTitle; ?></div>
    <div class="divActions">
        <input id="btnInsertRecord" type="button" class="btn btnBrandBlue" value="insertar" onclick="showModal(0);">
        <?php //if($objAscend->intTableId!=19 && $objAscend->intTableId!=20)
        {?><input id="btnInsertRecord" type="button" class="btn btnOnlineGreen" value="importar registros" onclick="showImport();"><?php } ?>
        <?php //if($objAscend->intTableId==18 || $objAscend->intTableId==21)
        {?><input id="btnImportImages" type="button" class="btn btnBrandBlue" value="importar imágenes" onclick="showImagesImport();"><?php } ?>
    </div>
    <div class="divGrid" id="divGrid" style="height: calc( 100% - 200px )">
        <table class="tblGrid">
            <thead id="theadGrid" class="theadGrid"><?php echo $objAscend->strGridHeader; ?></thead>
            <tbody id="tbodyGrid" class="tbodyGrid"></tbody>
        </table>
    </div>
    <div id="divPagination" class="divPagination"></div>
    <div id="divModalBackground">
        <div id="divModalMain">
            <div id="divModalClose"><label id="lblModalClose" onclick="closeModal();">&#10006</label></div>
            <div id="divModalTitle"></div>
            <!-- ##### BEGIN: FORMULARIO A APLICAR ##### -->
            <div id="divModalForm"><?php echo $objAscend->strGridForm; ?></div>
            <!-- ##### END: FORMULARIO A APLICAR ##### -->
            <div id="divModalError"></div>
            <div id="divModalButtons">
                <input id="btnModalSubmitRecord" type="button" value="" onclick="submitRecord();" class="btn btnOnlineGreen">
                <input type="button" value="cancelar" onclick="closeModal();" class="btn btnBrandRed">
            </div>
            <div id="divModalWorking">
                <img src="../../img/catalog/wait_48.gif" />
            </div>
        </div>
    </div>
    <div id="divImportBackground">
        <div id="divImportMain">
            <div id="divImportClose"><label id="lblImportClose" onclick="closeImport();">&#10006</label></div>
            <div id="divImportTitle">Importar Catálogo de <?php echo $objAscend->strGridTitle; ?> desde Excel</div>
            <div id="divImportFile">
                Descargar Plantilla <a id="ancImportTemplate" href="" target="_blank"></a>
                <br /><br />
                <input class="form_input_text" type="file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="fleImportFile" onchange="validateExcelFile();">
            </div>
            <div id="divImportResults"></div>
            <div id="divImportButtons">
                <input type="button" value="cancelar" onclick="closeImport();" class="btn btnBrandRed">
            </div>
            <div id="divImportWorking">
                <img src="../../img/catalog/wait_48.gif" />
            </div>
        </div>
    </div>

    <div id="divImagesImportBackground" class="divImagesImportBackground">
        <div id="divImagesImportMain" class="divImagesImportMain">
            <div id="divImagesImportClose" class="divImagesImportClose"><label id="lblImagesImportClose" class="lblImagesImportClose" onclick="closeImagesImport();">&#10006</label></div>
            <div id="divImagesImportTitle" class="divImagesImportTitle">Importar Zip de Imágenes</div>
            <div id="divImagesImportFile" class="divImagesImportFile">
                Seleccionar archivo&nbsp;&nbsp;
                <input class="form_input_text" type="file" accept="application/zip" id="fleImportImages" onchange="importImages();">
            </div>
            <div id="divImagesImportResults" class="divImagesImportResults"></div>
            <div id="divImagesImportButtons" class="divImagesImportButtons">
                <input id="btnImagesImportCancel" type="button" value="cancelar" onclick="closeImagesImport();" class="btn btnBrandRed">
            </div>
            <div id="divImagesImportWorking">
                <img src="../../img/catalog/wait_48.gif" />
            </div>
        </div>
    </div>
    <?php require_once('../../' .INCLUDE_PATH . 'include.working.php') ?>
    <?php require_once('../../' .INCLUDE_PATH . 'sheet.inc') ?>
    <link rel="stylesheet" type="text/css" href="<?php echo 'stylesheet.css' ?>">
    
    <?php
    if($objAscend->strIncludeJS!=''){
        ?>
        <script src="<?php echo $objAscend->strIncludeJS; ?>?v=0.1"></script>
        <?php
    }
    ?>
    <script src="javascript.js?v=0.1"></script>
    <script>
        $('document').ready(function(){
            <?php
            $jsnForm = json_decode($objAscend->arrFormField, true);
            foreach($jsnForm as $objForm){
                if($objForm['strType']=='N'){
                    if($objForm['intLength']==0){
                        echo '$("#txt' . $objForm['strField'] . '").numeric({ decimal: false, negative: false });' . "\r\n";
                    }else{
                        echo '$("#txt' . $objForm['strField'] . '").numeric({ decimal: ".", decimalPlaces : ' . $objForm['strLength'] . ', negative: false });' . "\r\n";
                    }
                }
            }
            ?>
            $jsnGridData.intTableId = <?php echo $objAscend->intTableId; ?>;
            $jsnGridData.strSql = "<?php echo $objAscend->strGridSql; ?>";
            $jsnGridData.strSqlOrder = "<?php echo $objAscend->strGridSqlOrder; ?>";
            $jsnGridData.intSqlNumberOfColumns = "<?php echo $objAscend->intGridNumberOfColumns; ?>";
            $jsnGridData.arrFormField = <?php echo $objAscend->arrFormField; ?>;
            $jsnGridData.arrTableRelation = <?php echo $objAscend->arrTableRelation; ?>;
            $jsnGridData.strGridOption = "<?php echo $objAscend->strGridOption; ?>";
            gridUpdate();
        })
    </script>
    </body>
    </html>
<?php
unset($objAscend);
?>