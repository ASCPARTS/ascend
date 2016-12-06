<?php
/*Pedidos Pendientes de Surtir por Vendedor*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'Pedidos Pendientes de Surtir por Vendedor';
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
        //##### Input vendedor
        $strSql="select intId as strValue, strName as strDisplay from tblUser where intRoll=4 ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','userGray','intSeller','Vendedor',0,false,0,false,$strSql));





        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>$strTitle,'btnXLS'=>$btnXLS,'btnPDF'=>$btnPDF,'btnTXT'=>$btnTXT);

        $intSeller = trim($_REQUEST['intSeller']);
        $intApproved = $_REQUEST['intApproved'];
       

        $strSql = "select D.strKeyNumber, P.strDescription, DSQ.decUnitPrice, D.intCreationDate, D.intAuthorizationDate, 
        DD.intPromiseDate, catW.strCode, catW.strDescription as almacen, catD.strDescription as documento, D.intAuthorized, U.strName as usuario, C.strKeyNumber as codCliente, C.strRegisteredName as cliente, 
        DSD.intQuantity ascantPend, P.strPartNumber, F.strName as familia, G.strName as grupo ";
        $strSql .= "from tblDocument D ";
        $strSql .= "LEFT JOIN tblDocumentDetail DD ON DD.intDocument = D.intId ";
        $strSql .= "LEFT JOIN tblProduct P ON P.intId = DD.intProduct ";
        $strSql .= "LEFT JOIN tblDocumentSubdetail DSD ON DSD.intDocumentDetail=DD.intId ";
        $strSql .= "LEFT JOIN tblDocumentSubdetailQuotation DSQ ON DSQ.intDocumentSubdetail =DSD.intId ";
        $strSql .= "LEFT JOIN catWarehouse catW ON catW.intId=DSD.intWarehouse ";
        $strSql .= "LEFT JOIN catDocumentStatus catD ON catD.intId=DSD.intDocumentStatus ";
        $strSql .= "LEFT JOIN tblUser U ON U.intId = D.intCreator ";
        $strSql .= "LEFT JOIN catDepartment catDP ON catD.intId=U.intRoll ";
        $strSql .= "LEFT JOIN tblCustomer C ON C.intId=D.intCustomer ";
        $strSql .= "LEFT JOIN tblFamily F ON F.intId=P.intFamily ";
        $strSql .= "LEFT JOIN tblGroup G ON G.intId=P.intGroup ";
        $strSql .= "WHERE DD.strStatus='A' and DSD.strStatus='P' ";
        if($intSeller!=-1){
            $strSql .="AND U.intId = " . $intSeller . " ";
        }

        $strSql .= "ORDER BY D.strKeyNumber ;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table id="tableReport" style="position: relative; display: block; width: calc(100% - 10px); height: calc(100% - 4px); margin: 0 auto 0 auto;">';
        $strReport .= '<thead id="theadReport" style="display: block; position: relative; margin: 0 0 0 0; padding: 0 20px 0 0; overflow-x: hidden; overflow-y: hidden; border:0 !important">';
        $strReport .= '<tr>';
        $strReport .= '<th>Documento</th>';
        $strReport .= '<th>Descripcion</th>';
        $strReport .= '<th>Precio Unitario</th>';
        $strReport .= '<th>Fecha de Creación</th>';
        $strReport .= '<th>Fecha de Autorización</th>';
        $strReport .= '<th>Fecha Promesa</th>';
        $strReport .= '<th>Codigo Almacen</th>';
        $strReport .= '<th>Almacen</th>';
        $strReport .= '<th>Tipo de Documento</th>';
        $strReport .= '<th>Autorizado</th>';
        $strReport .= '<th>Nombre del Vendedor</th>';
        $strReport .= '<th>Número de Cliente</th>';
        $strReport .= '<th>Razon Social del Cliente</th>';
        $strReport .= '<th>Cantidad Pendiente</th>';
        $strReport .= '<th>Número de Parte</th>';
        $strReport .= '<th>Familia</th>';
        $strReport .= '<th>Grupo</th>';
        $strReport .= '</thead>';
        $strReport .= '<tbody id="tbodyReport" onscroll="scrollHeader();" style="position: relative; display: block; overflow-x: auto; overflow-y: auto; height: calc(100% - 30px); margin: 0 0 0 0; padding: 4px 20px 0 0; border:0 !important">';
        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['strKeyNumber'] . '</td>';
            $strReport .= '<td>' . $arrData['strDescription'] . '</td>';
            $strReport .= '<td>' . $arrData['decUnitPrice'] . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intCreationDate'],DTF_11) . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intAuthorizationDate'],DTF_11) . '</td>';
            $strReport .= '<td>' . $objAscend->formatDateTime($arrData['intPromiseDate'],DTF_11) . '</td>';
            $strReport .= '<td>' . $arrData['strCode'] . '</td>';
            $strReport .= '<td>' . $arrData['warehouse'] . '</td>';
            $strReport .= '<td>' . $arrData['documento'] . '</td>';
            $strReport .= '<td>' . ( $arrData['intAuthorized'] == 0 ? 'N' : 'S' ) . '</td>';
            $strReport .= '<td>' . $arrData['user'] . '</td>';
            $strReport .= '<td>' . $arrData['keyCustomer'] . '</td>';
            $strReport .= '<td>' . $arrData['customer'] . '</td>';
            $strReport .= '<td>' . $arrData['quantity'] . '</td>';
            $strReport .= '<td>' . $arrData['strPartNumber'] . '</td>';
            $strReport .= '<td>' . $arrData['family'] . '</td>';
            $strReport .= '<td>' . $arrData['nameGroup'] . '</td>';
            $strReport .= '</tr>';
        }
        $strReport .= '</tbody>';
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);