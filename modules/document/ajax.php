<?php
    require_once('../../inc/include.config.php');
    require_once('../../'.LIB_PATH .'class.ascend.php');
    //require_once('class.searchAscend.php');

    $objAscend = new clsAscend();
    //$objSearchAscend = new clsSearchAscend();

    $strProcess = $_REQUEST['strProcess'];
    $rstQuery = array();
    $jsnPhpScriptResponse = array();

    #parametros para balanceador de busquedas
    $strType = "";
    $intPage = 1;
    $jsnParameters = array();
    $intRecordsPerPage = 10;
    $sqlProduct = "";
    $strWhereProduct = "";
    $objPagination = array();

    $arrPriceRange = array();

    switch ($strProcess)
    {
        #
        #detailed information of products
        case 'getDocumentList':
            $intId = $_REQUEST['intId'];
            $jsnPhpScriptResponse["jsnDocumentList"] = '';

            #Document
            $sqlDocument =
            "SELECT D.intId, D.strKeyNumber, D.intCustomer, C.strRFC AS strCustomerRFC, D.intCreator, CR.strName AS strCreator, D.decAmount, D.decTotal, D.intAuthorized, D.intApprovedBy, APR.strName AS strApprovedBy, D.intAuthorizationDate, D.strStatus, ( SELECT COUNT( * ) FROM tblDocumentDetail WHERE intDocument = D.intId ) AS intItems "
            ."FROM tblDocument D "
            ."LEFT JOIN tblCustomer C ON C.intId = D.intCustomer "
            ."LEFT JOIN tblUser CR ON CR.intId = D.intCreator "
            ."LEFT JOIN tblUser APR ON APR.intId = D.intApprovedBy "
            ."WHERE D.strStatus = 'A' "
            ."ORDER BY D.intCreationDate ASC; ";

            $rstDocument = $objAscend->dbQuery($sqlDocument);
            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<div class="SubTitle">Lista de Documentos</div>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<div class="ButtonContainer">';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<button class="btn btnBrandBlue" onclick="fnDocument_newDocument();">Nuevo</button>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</div>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<table>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<thead>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<tr>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<th>Folio</th> <th>Cliente</th> <th>Creador</th> <th>No. Partidas</th> <th>Monto</th> <th>Total</th> <th>Aprobado?</th> <th>Autorizo</th> <th></th> ';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</tr>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</thead>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<tbody>';
            foreach( $rstDocument as $arrDocument )
            {
                $jsnPhpScriptResponse["jsnDocumentList"] .= '<tr>';
                $jsnPhpScriptResponse["jsnDocumentList"] .= '<td>' . $arrDocument["strKeyNumber"] . '</td> <td>' . $arrDocument["strCustomerRFC"] . '</td> <td><a href="javascript: alert(\'' . $arrDocument["intCreator"] . '\')">' . $arrDocument["strCreator"] . '</a></td> <td>' . $arrDocument["intItems"] . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decAmount"])  . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decTotal"])  . '</td> <td>' . ( $arrDocument["intAuthorized"] ? 'Aprobado' : 'No Aprobado' ) . '</td> <td><a href="javascript: alert(\'' . $arrDocument["intApprovedBy"] . '\')">' . $arrDocument["strApprovedBy"] . '</a></td> <td><button class="btn btnBrandBlue" onclick="fnDocument_getDocumentDetailList(\'' . $arrDocument["intId"] . '\')">Revisar...</button></td> ';
                $jsnPhpScriptResponse["jsnDocumentList"] .= '</tr>';
            }
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</tbody>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</table>';

            break;

        case 'newDocument':
            $intDocumentId = $_REQUEST['intDocumentId'];
            $jsnPhpScriptResponse["jsnDocumentDetail"] = '';

            #Customer
            $sqlCustomer =
            "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus "
            ."FROM tblCustomer C "
            ."LEFT JOIN tblDocument O ON C.intId = O.intCustomer "
            ."LEFT JOIN catClass CL ON C.intClass = CL.intId "
            ."LEFT JOIN catZone Z ON C.intZone = Z.intId "
            ."WHERE O.intId = $intDocumentId ; ";
            $rstCustomer = $objAscend->dbQuery($sqlCustomer);
            $objCustomer = $rstCustomer[0];


            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Datos de cliente</div>';
			$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<table>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Clave de cliente</th> <th>Razon social</th> <th>Cliente clase</th> <th>Zona</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td> - </td> <td> - </td> <td> - </td> <td> - </td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="4" class="text-right">';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandRed" onclick="fnDocument_cancelDocument();">Cancelar</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnOnlineGreen" onclick="fnDocument_selectNewCustomer();">Seleccionar Cliente</button>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
			$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
        break;

        case 'getDocumentDetailList':
            $intDocumentId = $_REQUEST['intDocumentId'];
            $jsnPhpScriptResponse["jsnDocumentDetail"] = '';

            #Customer
            $sqlCustomer =
                "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus "
                ."FROM tblCustomer C "
                ."LEFT JOIN tblDocument O ON C.intId = O.intCustomer "
                ."LEFT JOIN catClass CL ON C.intClass = CL.intId "
                ."LEFT JOIN catZone Z ON C.intZone = Z.intId "
                ."WHERE O.intId = $intDocumentId ; ";

            $rstCustomer = $objAscend->dbQuery($sqlCustomer);
            $objCustomer = $rstCustomer[0];
            $jsnPhpScriptResponse["objCustomer"] = $objCustomer;
            #DocumentDetail
            $sqlDocumentDetail =
                "SELECT OD.intId, OD.intDocument, OD.intNumber, OD.intProduct, P.strSKU, P.strPartNumber, OD.intQuantity, OD.decUnitPrice, OD.decAmount, OD.intPromiseDate, OD.strStatus "
                ."FROM tblDocumentDetail OD "
                ."LEFT JOIN tblProduct P ON OD.intProduct = P.intId "
                ."WHERE OD.intDocument = $intDocumentId "
                ."ORDER BY OD.intNumber ASC; ";
            $rstDocumentDetail = $objAscend->dbQuery($sqlDocumentDetail);
            $jsnPhpScriptResponse["arrDocumentDetail"] = $rstDocumentDetail;

            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Datos de cliente</div>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<table>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<thead>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Numero de Referencia</th> <th>Razon social</th> <th>Cliente clase</th> <th>Zona</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $objCustomer["strReferenceNumber"] . '</td> <td>' . $objCustomer["strRegisteredName"] . '</td> <td>' . $objCustomer["strClass"] . '</td> <td>' . $objCustomer["strZoneKey"] . ' / ' . $objCustomer["strZone"] . '</td>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';

            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Partidas</div>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormItems">';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<table>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>#</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Numero de parte</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Cantidad</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Precio unitario</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Subtotal</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Fecha promesa</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Detalle</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Modificar</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody id="tbodyDocumentDetail">';
                        foreach( $rstDocumentDetail as $arrDocumentDetail )
                        {
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intNumber"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["strPartNumber"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intQuantity"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decUnitPrice"]) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decAmount"]) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatDateTime($arrDocumentDetail["intPromiseDate"], DTF_1) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right"> <button class="btn btnOverBlueGray" onclick="fnDocument_getDocumentDetailInformation(\'' . $arrDocumentDetail["intId"] . '\');"> Detalle</button> </td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right"> <button class="btn btnOverYellow"   onclick="modificar(\'' . $arrDocumentDetail["intPromiseDate"] . '\');">Modificar </button> </td>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                        }
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="6" class="text-right">';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandRed" onclick="fnDocument_cancelDocument();">Cancelar</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandBlue">Agregar Partida</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnOnlineGreen">Actualizar Documento</button>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';



            break;

        case 'getDocumentDetailInformation':
            $intDocumentId = $_REQUEST['intDocumentDetail'];
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] = '';

            #Customer
            $sqlDocumentDetail =
            "SELECT "
            ."DOCDET.intDocument, DOC.strKeyNumber, ( SELECT strRegisteredName FROM tblCustomer WHERE intID = DOC.intCustomer ) AS strCustomer, DOCDET.intId AS intDocumentDetail, DOCDET.intNumber, "
            ."DOCDET.intProduct, PRO.strSKU, PRO.strPartNumber, "
            ."( SELECT strName FROM tblFamily WHERE intId = PRO.intFamily ) AS strFamily, "
            ."( SELECT strName FROM tblBrand WHERE intId = PRO.intBrand ) AS strBrand, "
            ."( SELECT strName FROM tblGroup WHERE intId = PRO.intGroup ) AS strGroup, "
            ."( SELECT strName FROM catCondition WHERE intId = PRO.intCondition ) AS strCondition, "
            ."( SELECT strName FROM catClass WHERE intId = PRO.intClass ) AS strClass, "
            ."( SELECT strDescription FROM catUnit WHERE intId = PRO.intUnit ) AS strUnit, "
            ."( SELECT strDescription FROM catProductType WHERE intId = PRO.intType ) AS strType, "
            ."DOCDET.intQuantity, "
            ."DOCDET.decUnitPrice, DOCDET.decAmount, DOCDET.intPromiseDate, DOCDET.strStatus "
            ."FROM tblDocumentDetail DOCDET "
            ."LEFT JOIN tblDocument DOC ON DOCDET.intDocument = DOC.intId "
            ."LEFT JOIN tblProduct PRO ON DOCDET.intProduct = PRO.intId "
            ."WHERE DOCDET.intId = $intDocumentId; ; ";
            //echo $sqlDocumentDetail . "<br><br>";
            $rstDocumentDetail = $objAscend->dbQuery($sqlDocumentDetail);
            $objDocumentDetail = $rstDocumentDetail[0];

            $jsnPhpScriptResponse["jsnDocumentDetailInformationTitle"] = 'Detalle de la Partida <b>' . $objDocumentDetail["intNumber"] . '</b> del Documento con Folio <b>' . $objDocumentDetail["strKeyNumber"] . '</b>';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<table style="margin-bottom: 4px;">';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<th style="text-align: center;">No. Partida</th> <th style="text-align: center;">Folio del documento</th> <th>Cliente</th> <th style="text-align: center;">SKU</th> <th style="text-align: center;">Numero de Parte</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tbody>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<td style="text-align: center;">' . $objDocumentDetail["intNumber"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strKeyNumber"] . '</td> <td>' . $objDocumentDetail["strCustomer"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strSKU"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strPartNumber"] . '</td>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</div>';

            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<table style="margin-bottom: 4px;">';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<th style="text-align: center;">Familia</th> <th style="text-align: center;">Marca</th> <th style="text-align: center;">Grupo</th> <th style="text-align: center;">Condicion</th> <th style="text-align: center;">Clase</th> <th style="text-align: center;">Unidad</th> <th style="text-align: center;">Tipo</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tbody>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<td style="text-align: center;">' . $objDocumentDetail["strFamily"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strBrand"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strGroup"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strCondition"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strClass"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strUnit"] . '</td> <td style="text-align: center;">' . $objDocumentDetail["strType"] . '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</div>';

            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<table style="margin-bottom: 4px;">';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<th style="text-align: right;">Cantidad</th> <th style="text-align: right;">Precio Unitario</th> <th style="text-align: right;">$ Sumatoria</th> <th style="text-align: right;">Fecha Promesa</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tbody>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<td style="text-align: right;">' . $objDocumentDetail["intQuantity"] . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($objDocumentDetail["decUnitPrice"]) . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($objDocumentDetail["decAmount"]) . '</td> <td style="text-align: right;">' . $objAscend->formatDateTime($objDocumentDetail["intPromiseDate"], DTF_1) . '</td> ';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</div>';
            //$jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<hr/>';
        break;

        case 'setClientToNewDocument':
            $objCustomer = $_REQUEST['objCustomer'];
            $jsnPhpScriptResponse["jsnDocumentDetail"] = '';
            //$objAscend->printArray($objCustomer);

            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Datos de cliente</div>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<table>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Numero Referencia</th> <th>Razon social</th> <th>Clase</th> <th>Zona</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td> ' . $objCustomer["strReferenceNumber"] . ' </td> <td> ' . $objCustomer["strRegisteredName"] . ' </td> <td> ' . $objCustomer["strClass"] . ' </td> <td> ' . $objCustomer["strZone"] . ' </td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';

            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Partidas</div>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormItems">';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<table>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>#</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Numero de parte</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Cantidad</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Precio unitario</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Subtotal</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Fecha promesa</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody id="tbodyDocumentDetail">';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="6" class="text-right">';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandRed" onclick="fnDocument_cancelDocument();">Cancelar</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandBlue">Agregar Partida</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnOnlineGreen" disabled=disabled>Generar Documento</button>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
        break;

    };

    unset($objAscend);
    echo json_encode($jsnPhpScriptResponse);
?>