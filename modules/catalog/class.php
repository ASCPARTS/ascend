<?php
require_once('../../' . LIB_PATH . 'class.main.php');
class classCatalog extends classMain {

    public $intCatalogId;
    //##### Catalog Header #####
    public $strCatalog;
    public $strCatalogTitle;
    public $intExcelImport;
    public $intExcelExport;
    public $intPDFExport;
    public $intImageImport;
    //##### Catalog Field #####
    public $intNumberOfColumns;
    public $arrCatalogField = array();
    public $strCatalogHeader;
    public $strCatalogFilter;

    function buildCatalogData()
    {
        $strSql = "SELECT * FROM tblCatalog WHERE intId = " . $this->intCatalogId;
        $rstTable = $this->dbQuery($strSql);
        $this->strCatalog = $rstTable[0]['strCatalog'];
        $this->strCatalogTitle = $rstTable[0]['strDisplay'];
        $this->intExcelImport = $rstTable[0]['intExcelImport'];
        $this->intExcelExport = $rstTable[0]['intExcelExport'];
        $this->intPDFExport = $rstTable[0]['intPDFExport'];
        $this->intImageImport = $rstTable[0]['intImageImport'];
        unset($rstTable);

        $strSql = "SELECT * FROM dbASCParts.tblCatalogField WHERE intCatalog = 1 ORDER BY intOrder;";
        $rstField = $this->dbQuery($strSql);
        $this->intNumberOfColumns = count($rstField);
        $this->strCatalogHeader = '';
        $this->strCatalogFilter = '';

        foreach($rstField as $arrField){
            array_push($this->arrCatalogField,array(
                'intId' => $arrField['intId'],
                'strField' => $arrField['strField'],
                'intContentType' => $arrField['intContentType'],
                'intFieldType' => $arrField['intFieldType'],
                'intOrder' => $arrField['intOrder'],
                'strDisplay' => $arrField['strDisplay'],
                'intDisplay' => $arrField['intDisplay'],
                'strAlign' => $arrField['strAlign'],
                'intSort' => $arrField['intSort'],
                'intEdit' => $arrField['intEdit'],
                'intDuplicate' => $arrField['intDuplicate'],
                'intFilter' => $arrField['intFilter'],
                'intLength' => $arrField['intLength']
            ));
            if($arrField['intDisplay']==1){
                $this->strCatalogHeader .= '<td class="tdCatalogHeader">';
                if($arrField['intSort']==1){
                    $this->strCatalogHeader .= '<table class="tableSort">';
                    $this->strCatalogHeader .= '<tr class="trSort">';
                    $this->strCatalogHeader .= '<td rowspan="2" class="tdSortRowSpan">' . $arrField['strDisplay'] . '</td>';
                    $this->strCatalogHeader .= '<td class="tdSort" title="' . $arrField['strDisplay'] . ' ASC" onclick="gridSort(\'' . $arrField['strField'] . ' ASC\')">&#9650;</td>';
                    $this->strCatalogHeader .= '</tr>';
                    $this->strCatalogHeader .= '<tr class="trSort">';
                    $this->strCatalogHeader .= '<td class="tdSort" title="' . $arrField['strDisplay'] . ' DESC" onclick="gridSort(\'' . $arrField['strField'] . ' DESC\')">&#9660;</td>';
                    $this->strCatalogHeader .= '</tr>';
                    $this->strCatalogHeader .= '</table>';
                }else{
                    $this->strCatalogHeader .= '<label class="labelCatalogHeader">' . $arrField['strDisplay'] . '</label>';
                }
                $this->strCatalogHeader .= '</td>';

                $this->strCatalogFilter .= '<td class="tdCatalogFilter">';
                if($arrField['intFilter']==1){
                    switch($arrField['intContentType']){
                        case 0:
                            $this->strCatalogFilter .= '<input class="inputCatalogFilter" type="text" value="">';
                            break;
                        case 1:
                            $this->strCatalogFilter .= '<input class="inputCatalogFilter" type="text" value="">';
                            break;
                        case 2:
                            $this->strCatalogFilter .= '<select class="inputCatalogFilter">';
                            $this->strCatalogFilter .= '<option value="0,1" selected="selected">Todo</option>';
                            $this->strCatalogFilter .= '<option value="1">Activo</option>';
                            $this->strCatalogFilter .= '<option value="0">Inactivo</option>';
                            $this->strCatalogFilter .= '</select>';
                            break;
                    }
                }else{
                    $this->strCatalogFilter .= '&nbsp;';
                }
                $this->strCatalogFilter .= '</td>';
            }
        }
        unset($rstField);
    }
}
?>