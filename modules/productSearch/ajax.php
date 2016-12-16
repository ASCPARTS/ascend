<?php
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');
//require_once('class.searchAscend.php');

$objAscend = new clsAscend();
//$objSearchAscend = new clsSearchAscend();

$strProcess = $_REQUEST['strProcess'];
$rstQuery = array();
$jsnPhpScriptResponse = array();


switch ($strProcess)
{
    case 'modal':
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="row">';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2" id="divParameter">';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="divInputText searchGray"><input type="text" id="strCustomerParameter"><label for="strCustomerParameter">Datos del cliente</label></div>';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '</div>';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2" id="divParameter">';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<button class="btn btnBrandBlue" type="button" id="btnSearch" onclick="getCustomerSearch();">Buscar</button>';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '</div>';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '</div>';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="row">';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divCustomerList">';
        $jsnPhpScriptResponse["jsnCustomerForm"] .= '</div>';
        break;

    case 'getCustomerSearch':
        $strCustomerParameter = $_POST['strCustomerParameter'];
        $arrParameter = explode(" ", strtoupper(trim($strCustomerParameter)));

        $likeRFC = "";
        foreach( $arrParameter as $strParameter)
        {
            $likeRFC .= " C.strRFC LIKE '%" . $strParameter . "%' OR ";
            $likeReferenceNumber .= " C.strReferenceNumber LIKE '%" . $strParameter . "%' OR ";
            $likeRegisteredName .= " C.strRegisteredName LIKE '%" . $strParameter . "%' OR ";
            $likeCommercialName .= " C.strCommercialName LIKE '%" . $strParameter . "%' OR ";
        }
        $likeRFC = substr($likeRFC, 0, strlen($likeRFC) - 3);
        $likeReferenceNumber = substr($likeReferenceNumber, 0, strlen($likeReferenceNumber) - 3);
        $likeRegisteredName = substr($likeRegisteredName, 0, strlen($likeRegisteredName) - 3);
        $likeCommercialName = substr($likeCommercialName, 0, strlen($likeCommercialName) - 3);

        #Document
        $sqlCustomer =
            "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strName AS strZone "
            ."FROM tblCustomer C "
            ."LEFT JOIN catClass CL ON CL.intId = C.intClass "
            ."LEFT JOIN catClass Z ON Z.intId = C.intZone "
            ."WHERE C.strStatus = 'A' AND "
            ."( "
            ."( $likeRFC ) OR "
            ."( $likeReferenceNumber ) OR "
            ."( $likeRegisteredName ) OR "
            ."( $likeCommercialName ) "
            .") "
            ."ORDER BY C.strRegisteredName;";
        //echo "<br>" . $sqlCustomer . "<br>";
        $rstCustomer = $objAscend->dbQuery($sqlCustomer);

        $jsnPhpScriptResponse["jsnCustomerList"] .= '<table>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '<thead>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '<tr>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '<th>Razon Social</th> <th>RFC</th> <th>Numero Referencia</th> <th>Razon Comercial</th> <th>Clase</th> <th>Zona</th> <th>Seleccionar</th>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '</tr>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '</thead>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '<tbody>';
        foreach( $rstCustomer as $arrCustomer )
        {
            $jsnPhpScriptResponse["jsnCustomerList"] .= '<tr>';
            $jsnPhpScriptResponse["jsnCustomerList"] .= '<td>' . $arrCustomer["strRegisteredName"] . '</td> <td>' . $arrCustomer["strRFC"] . '</td> <td>' . $arrCustomer["strReferenceNumber"] . '</td>  <td>' . $arrCustomer["strCommercialName"] . '</td> <td>' . $arrCustomer["strClass"] . '</td> <td>' . $arrCustomer["strZone"] . '</td> <td> <button class="btn btnBrandRed" onclick="selectCustomerSearch(\'' . $arrCustomer["intId"] . '\')">Seleccionar</button> </td>';
            $jsnPhpScriptResponse["jsnCustomerList"] .= '</tr>';
        }
        $jsnPhpScriptResponse["jsnCustomerList"] .= '</tbody>';
        $jsnPhpScriptResponse["jsnCustomerList"] .= '</table>';
        break;

    case 'selectCustomerSearch':
        $intCustomerId = $_POST['intCustomer'];
        #Document
        $sqlCustomer =
            "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strName AS strZone "
            ."FROM tblCustomer C "
            ."LEFT JOIN catClass CL ON CL.intId = C.intClass "
            ."LEFT JOIN catClass Z ON Z.intId = C.intZone "
            ."WHERE C.intId = $intCustomerId AND C.strStatus = 'A';";

        $rstCustomer = $objAscend->dbQuery($sqlCustomer);

        $jsnPhpScriptResponse["jsnCustomer"] = $rstCustomer[0];

        break;

};

unset($objAscend);
echo json_encode($jsnPhpScriptResponse);
?>