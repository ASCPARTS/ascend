<?php
/*BackOrders para Seguimiento (Listado)*/

require_once ('../../inc/include.config.php');
ini_set("display_errors",0);
require_once('../../'. LIB_PATH .'class.ascend.php');

require_once('lib/report.php');

$objAscend = new clsAscend();
$strProcess = $_REQUEST['strProcess'];

$strTitle = 'BackOrders para Seguimiento (Listado)';
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
        $strSql="select intId as strValue, strName as strDisplay from tblUser where strRoll='VTA' and strStatus='A' ORDER BY 2;";
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('select','userGray','strName','Vendedor',0,false,0,false,$strSql));
        //##### Input Date
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow','strDate_From','Fecha (de)',0,false,0,false,''));
        array_push($jsnPhpScriptResponse['arrFilters'], buildFilter('date','calendarYellow ','strDate_To','Fecha (hasta)',0,false,0,false,''));

        break;

    case 'Report':
        $jsnPhpScriptResponse = array('strReport'=>'','btnXLS'=>false,'btnPDF'=>false,'btnTXT'=>true);

        $strName = trim($_REQUEST['strName']);
        $strDate_From = $_REQUEST['strDate_From'];
        $strDate_To = $_REQUEST['strDate_To'];

        $strSql = "select O.strKeyNumber, O.intAuthorized as Autorizado, O.intAuthorizationDate as FechaAutorizacion, O.strStatus, 
        C.strKeyNumber as NumeroCliente, C.strCommercialName as RazonSocial, CC.strName AS ClaseCliente, P.strSKU as SKU, 
        P.strDescription as Descripcion, cC.strName AS ClaseSKU, OD.intQuantity as Cantidad,
        ODQ.decUnitPrice as PrecioUnitario, ODQ.decTotal as Importe,  O.intCreationDate as FechaCreacion, OD.intPromiseDate as FechaPromesa ";
        $strSql .= "from tblOrder O ";
        $strSql .= "LEFT JOIN tblCustomer C ON C.intId = O.intCustomer ";
        $strSql .= "LEFT JOIN tblOrderDetail OD ON OD.intOrder= O.intId ";
        $strSql .= "LEFT JOIN tblProduct P ON P.intId= OD.intProduct ";
        $strSql .= "LEFT JOIN catClass cC ON cC.intId=P.intClass ";
        $strSql .= "LEFT JOIN catClass CC ON CC.intId=C.intClass ";
        $strSql .= "LEFT JOIN tblOrderDetailQuotation ODQ ON ODQ.intItem = OD.intId ";
        $strSql .= "WHERE O.intCreationDate >= '$strDate_From' and O.intCreationDate <= '$strDate_To' ";
        if($strName!=-1){
            $strSql .="AND C.intId = " . $strName . " ";
        }
        $strSql.= "ORDER BY O.strKeyNumber;";

        $rstData = $objAscend->dbQuery($strSql);

        $strReport = '<table>';
        $strReport .= '<thead>';
        $strReport .= '<tr>';
        $strReport .= '<th>Folio</th>';
        $strReport .= '<th>Autorizado</th>';
        $strReport .= '<th>Fecha de Autorización</th>';
        $strReport .= '<th>Estatus</th>';
        $strReport .= '<th>Número de Cliente</th>';
        $strReport .= '<th>Razón Social</th>';
        $strReport .= '<th>Clase del Cliente</th>';
        $strReport .= '<th>SKU</th>';
        $strReport .= '<th>Descripción</th>';
        $strReport .= '<th>Clase de SKU</th>';
        $strReport .= '<th>Cantidad</th>';
        $strReport .= '<th>Precio Unitario</th>';
        $strReport .= '<th>Importe</th>';
        $strReport .= '<th>Fecha de Creación</th>';
        $strReport .= '<th>Fecha Promesa</th>';
        $strReport .= '</tr>';
        $strReport .= '</thead>';

        foreach($rstData as $arrData){
            $strReport .= '<tr>';
            $strReport .= '<td>' . $arrData['strKeyNumber'] . '</td>';
            $strReport .= '<td>' . $arrData['Autorizado'] . '</td>';
            $strReport .= '<td>' . $arrData['FechaAutorizacion'] . '</td>';
            $strReport .= '<td>' . $arrData['strStatus'] . '</td>';
            $strReport .= '<td>' . $arrData['NumeroCliente'] . '</td>';
            $strReport .= '<td>' . $arrData['RazonSocial'] . '</td>';
            $strReport .= '<td>' . $arrData['ClaseCliente'] . '</td>';
            $strReport .= '<td>' . $arrData['SKU'] . '</td>';
            $strReport .= '<td>' . $arrData['Descripcion'] . '</td>';
            $strReport .= '<td>' . $arrData['ClaseSKU'] . '</td>';
            $strReport .= '<td>' . $arrData['Cantidad'] . '</td>';
            $strReport .= '<td>' . $arrData['PrecioUnitario'] . '</td>';
            $strReport .= '<td>' . $arrData['Importe'] . '</td>';
            $strReport .= '<td>' . $arrData['FechaCreacion'] . '</td>';
            $strReport .= '<td>' . $arrData['FechaPromesa'] . '</td>';
            $strReport .= '</tr>';
        }
        $strReport .= '</table>';

        //echo $strReport;

        $jsnPhpScriptResponse['strReport'] = $strReport;
        break;
};
echo json_encode($jsnPhpScriptResponse);