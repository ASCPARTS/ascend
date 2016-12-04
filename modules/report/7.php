<?php
/*BackOrders por Artículos (Compras)*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'BackOrders por Artículos (Compras)';
$blnPaginated = true;
$blnFreezeHeader = true;
$btnXLS = true;
$btnPDF = true;
$btnTXT = false;
switch ($strProcess) {
    case 'Filter':
        $jsnPhpScriptResponse = array('strTitle'=>$strTitle,'arrFilters'=>array(),'blnPaginated'=>$blnPaginated,'blnFreezeHeader'=>$blnFreezeHeader);

        //##### FUnction buildFilter
        //$strType: 'numeric' || 'select'
        //$strIcon: catalogo imagenes || ''
        //$strName: id del input
        //$strLabel: etiqueta para el input
        //$intMaxLength: longitud maxima || 0=no aplica || 0=ilimitado
        //$blnNegative: si el campo es numerico true=admite negativos || false=no admite negativos
        //$intDecimalPlaces: si el campo es numerico 0=no admite decimales || X=numero de decimales
        //$blnRequired: campo requerido: true=requerido || false=opcional
        //$strSql: sentencia sql para llenar campo tipo select
        //#####

        //##### Input Folio Pedido
        array_push($jsnPhpScriptResponse['arrFilters'],
        buildFilter('numeric','searchGray','strFolio','Folio','',false,0,false,''));
        //##### Input vendedor
        $strSql="select intId as strValue, strName as strDisplay from tblUser where strRoll='VTA' and strStatus='A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','userGray','intSeller','Vendedor',0,false,0,false,$strSql));
        //##### Input Autorizado
        $strSql="SELECT '1' AS strValue,'Si' AS strDisplay UNION SELECT '0' AS strValue,'No' AS strDisplay;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','referenceGray','intApproved','Autorizado',0,false,0,false,$strSql));
        //##### Input Date
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow','strDate_From','Fecha (de)',0,false,0,false,''));
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow ','strDate_To','Fecha (hasta)',0,false,0,false,''));




        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>$strTitle,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $strFolio = trim($_REQUEST['strFolio']);
        $intSeller = $_REQUEST['intSeller'];
        $intApproved = $_REQUEST['intApproved'];
        $strDate_From = $_REQUEST['strDate_From'];
        $strDate_To = $_REQUEST['strDate_To'];
        
        $strSql = "SELECT D.strKeyNumber, D.intAuthorized, D.strStatus, D.strKeyNumber, 
        C.strCommercialName, catC.strName as claseCliente, P.strSKU, P.strDescription, 
        catP.strName as claseSKU, DSDQ.intQuantity, DSDQ.decUnitPrice, DSDQ.decAmount, 
        D.intCreationDate,D.intAuthorizationDate, DD.intPromiseDate ";
        $strSql .= "FROM tblDocument D  ";
        $strSql .= "LEFT JOIN tblCustomer C ON C.intId = D.intCustomer ";
        $strSql .= "LEFT JOIN catClass catC ON catC.intId = C.intClass ";
        $strSql .= "LEFT JOIN tblDocumentDetail DD ON DD.intDocument = D.intId ";
        $strSql .= "LEFT JOIN tblProduct P ON P.intId = DD.intProduct ";
        $strSql .= "LEFT JOIN catClass catP ON catC.intId = P.intClass ";
        $strSql .= "LEFT JOIN tblDocumentSubdetail DSD ON DSD.intId = DD.intId ";
        $strSql .= "LEFT JOIN tblDocumentSubdetailQuotation DSDQ ON DSDQ.intDocumentSubdetail = DSD.intId ";
        $strSql .= "LEFT JOIN tblInvoiceDocumentDetail IDD ON IDD.intDocumentDetail = DD.intDocument ";
        $strSql .= "LEFT JOIN tblUser U ON U.intId = D.intCreator ";
        $strSql .= "where DSD.intDocumentStatus = (select intId from catDocumentStatus where strDescription='Pedido') and D.intCreationDate >= '$strDate_From' and D.intCreationDate <= '$strDate_To' ";
        if($strFolio!=''){
            $strSql .="AND D.strKeyNumber = " . $strFolio . " ";
        }
        if($intSeller!=-1){
            $strSql .="AND D.intCreator = " . $intSeller . " ";
        }
        if($intApproved!=-1){
            $strSql .="AND D.intAuthorized = " . $intApproved . " ";
        }
        $strSql .= "ORDER BY D.strKeyNumber;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>Documento</th>';
        $strReport .= '<th>Autorizado</th>';
        $strReport .= '<th>Estatus</th>';
        $strReport .= '<th>Razón Social</th>';
        $strReport .= '<th>Clase de Cliente</th>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>Cantidad</th>';
        $strReport .= '<th>Precio</th>';
        $strReport .= '<th>Total</th>';
        $strReport .= '<th>Fecha de Creación</th>';
        $strReport .= '<th>Fecha de Autorización</th>';
        $strReport .= '<th>Fecha Promesa</th>';
        $strReport .= '</thead>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['strKeyNumber'] . '</td>';
            $strReport .= '<td>' . ( $arrData['intAuthorized'] == 0 ? 'N' : 'S' ) . '</td>';
            $strReport .= '<td>' . $arrData['strStatus'] . '</td>';
            $strReport .= '<td>' . $arrData['strCommercialName'] . '</td>';
            $strReport .= '<td>' . $arrData['claseCliente'] . '</td>';
            $strReport .= '<td>' . $arrData['strSKU'] . '</td>';
            $strReport .= '<td>' . $arrData['strDescription'] . '</td>';
            $strReport .= '<td>' . $arrData['claseSKU'] . '</td>';
            $strReport .= '<td>' . $arrData['intQuantity'] . '</td>';
            $strReport .= '<td>' . $arrData['decUnitPrice'] . '</td>';
            $strReport .= '<td>' . $arrData['decAmount'] . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intCreationDate'],DTF_11) . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intAuthorizationDate'],DTF_11) . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intPromiseDate'],DTF_11) . '</td>';
           $strReport .= '</tr>';
        }
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);