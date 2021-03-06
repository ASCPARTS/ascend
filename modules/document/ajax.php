<?php
    require_once('../../inc/include.config.php');
    require_once('../../'.LIB_PATH .'class.ascend.php');
    //require_once('class.searchAscend.php');

    $objAscend = new clsAscend();
    //$objSearchAscend = new clsSearchAscend();

    $department = 1;

    $strProcess = $_REQUEST['strProcess'];
    $rstQuery = array();
    $jsnPhpScriptResponse = array("blnStatus" => true, "strMsg" => "");

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
        case 'getMenu':
            $htmlMenu = '';
            switch ($department)
            {
                case 1:
                    #ventas
                    //$htmlMenu .= ';<table
                break;
            }

            $jsnPhpScriptResponse["htmlMenu"] = $htmlMenu;
        break;

        case 'getDocumentList':
            $intId = $_REQUEST['intId'];
            $jsnPhpScriptResponse["jsnDocumentList"] = '';

            #Document
            $sqlDocument =
            "SELECT D.intId, D.strKeyNumber, D.intCustomer, C.strRFC AS strCustomerRFC, D.intCreator, CR.strName AS strCreator, D.decAmount, D.decTotal, D.intAuthorized, D.intApprovedBy, D.intAuthorizationDate, D.strStatus, ( SELECT COUNT( * ) FROM tblDocumentDetail WHERE intDocument = D.intId ) AS intItems "
            ."FROM tblDocument D "
            ."LEFT JOIN tblCustomer C ON C.intId = D.intCustomer "
            ."LEFT JOIN tblUser CR ON CR.intId = D.intCreator "
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
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<th>Folio</th> <th>Cliente</th> <th>Creador</th> <th class="text-center">No. Partidas</th> <th>Monto</th> <th>Total</th> <th></th> ';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</tr>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '</thead>';
            $jsnPhpScriptResponse["jsnDocumentList"] .= '<tbody>';
            foreach( $rstDocument as $arrDocument )
            {
                $jsnPhpScriptResponse["jsnDocumentList"] .= '<tr>';
                    $jsnPhpScriptResponse["jsnDocumentList"] .= '<td>' . $arrDocument["strKeyNumber"] . '</td> <td><a href="javascript: alert(\'' . $arrDocument["intCustomer"] . '\')">' . $arrDocument["strCustomerRFC"] . '</a></td> <td>' . $arrDocument["strCreator"] . '</td>  <td class="text-center">' . $arrDocument["intItems"] . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decAmount"])  . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decTotal"])  . '</td>   <td><button class="btn btnBrandBlue" onclick="fnDocument_getDocumentDetailList(\'' . $arrDocument["intId"] . '\')">Revisar...</button></td> ';
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
                "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus, ( SELECT DISTINCT intId FROM catWarehouse WHERE intZone = C.intZone ) AS intWarehouse "
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
                "SELECT OD.intId, OD.intDocument, OD.intNumber, OD.intProduct, P.strSKU, P.strPartNumber, OD.intQuantity, OD.decUnitPrice, OD.decAmount, OD.intPromiseDate, OD.strStatus, IFNULL( (SELECT strUrl FROM tblProductImage WHERE strStatus = 'A' AND strType = 'default' AND intProduct = P.intId), 'product/notfound.jpg')  AS strUrl "
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
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-center">#</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-center"></th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th>Numero de parte</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-center">Cantidad</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Precio unitario</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Subtotal</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-right">Fecha promesa</th>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<th class="text-center">Detalle</th>';

                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody id="tbodyDocumentDetail">';
                        foreach( $rstDocumentDetail as $arrDocumentDetail )
                        {
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-center">' . $arrDocumentDetail["intNumber"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-center"><img style="height:100px; max-width: 150px;" src="../../img/' . $arrDocumentDetail["strUrl"] . '"/></td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["strPartNumber"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-center">' . $arrDocumentDetail["intQuantity"] . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decUnitPrice"]) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decAmount"]) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatDateTime($arrDocumentDetail["intPromiseDate"], DTF_1) . '</td>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-center"> <button class="btn btnOverBlueGray" onclick="fnDocument_getDocumentDetailInformation(\'' . $arrDocumentDetail["intId"] . '\');"> Detalle</button> </td>';

                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                        }
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="8" class="text-right">';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandRed" onclick="fnDocument_cancelDocument();">Cancelar</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandBlue" onclick="fnDocument_addDocumentDetail();">Agregar Partida</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnOnlineGreen">Finalizar Documento</button>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';



            break;

        case 'getDocumentDetailInformation':
            $intDocumentDetaildId = $_REQUEST['intDocumentDetail'];
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
            ."WHERE DOCDET.intId = $intDocumentDetaildId; ; ";
            //echo $sqlDocumentDetail . "<br><br>";
            $rstDocumentDetail = $objAscend->dbQuery($sqlDocumentDetail);
            $objDocumentDetail = $rstDocumentDetail[0];


            $jsnPhpScriptResponse["jsnDocumentDetailInformationTitle"] = 'Detalle de la Partida <b> #' . $objDocumentDetail["intNumber"] . '</b> del Documento con Folio <b>' . $objDocumentDetail["strKeyNumber"] . '</b>';
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



            $sqlDocumentSubdetail = "SELECT SUBDET.intId, SUBDET.intDocumentDetail, SUBDET.intQuantity, SUBDET.intDocumentStatus, DOCSTA.strDescription AS strDocumentStatus, SUBDET.intWarehouse, WH.strDescription AS strWarehouse, SUBDET.strStatus "
                ."FROM tblDocumentSubdetail SUBDET "
                ."LEFT JOIN catDocumentStatus DOCSTA ON DOCSTA.intId = SUBDET.intDocumentStatus "
                ."LEFT JOIN catWarehouse WH ON WH.intId = SUBDET.intWarehouse "
                ."WHERE SUBDET.intDocumentDetail = $intDocumentDetaildId;";

            $rstDocumentSubdetail = $objAscend->dbQuery($sqlDocumentSubdetail);
            $objDocumentSubdetail = $rstDocumentSubdetail;

            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<table style="margin-bottom: 4px;">';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<thead>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<th style="text-align: center;" colspan="4">Situacion y desglose de la partida</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<th style="text-align: center;">No. Unidades</th> <th style="text-align: center;">Situacion</th> <th style="text-align: center;">Almacen</th> <th>Operaciones</th>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</thead>';
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tbody>';
                    $arrDocumentSubdetailInformation = "";
                    foreach( $objDocumentSubdetail as $arrDocumentSubdetail )
                    {
                        $sqlDocumentSubdetailQuotation = "SELECT SUBDQUO.intId, SUBDQUO.intDocumentSubDetail, SUBDQUO.intProvider, PRO.strBusinessName AS strProvider, SUBDQUO.intQuantity, SUBDQUO.decUnitPrice, SUBDQUO.decAmount, SUBDQUO.decTotal, SUBDQUO.intQuotationDate, SUBDQUO.strStatus "
                        ."FROM tblDocumentSubdetailQuotation SUBDQUO "
                        ."LEFT JOIN tblProvider PRO ON SUBDQUO.intProvider = PRO.intId "
                        ."WHERE SUBDQUO.intDocumentSubdetail = " . $arrDocumentSubdetail["intId"] . ";";

                        $rstDocumentSubdetailQuotation = $objAscend->dbQuery($sqlDocumentSubdetailQuotation);
                        $objDocumentSubdetailQuotation = $rstDocumentSubdetailQuotation;
                        $btnShowQuotations = ( count( $objDocumentSubdetailQuotation ) > 0? '<button class="btn btnOverBlueGray" onclick="fnDocument_showDocumentSubdetailQuotation(' . $arrDocumentSubdetail["intId"] . ');"> Cotizaciones</button>' : '');
                        $btnAuthorize = ( $arrDocumentSubdetail["intDocumentStatus"] == 5 ? '<button id="btnDocumentSubDetailApprove_' . $arrDocumentSubdetail["intId"] . '" class="btn btnOverBlueGray" onclick="fnDocument_documentSubdetailApprove(' . $arrDocumentSubdetail["intId"] . ');"> Aprobar</button>' : '');
                        $arrDocumentSubdetailInformation = "";
                        if(count( $objDocumentSubdetailQuotation ) > 0)
                        {
                            //--
                            $arrDocumentSubdetailInformation .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1 colDocumentSubdetailQuotation" id="divDocumentSubdetailQuotation_' . $arrDocumentSubdetail["intId"] . '" style="display:none;">';
                            $arrDocumentSubdetailInformation .= '<table style="margin-bottom: 4px;">';
                            $arrDocumentSubdetailInformation .= '<thead>';
                            $arrDocumentSubdetailInformation .= '<tr>';
                            $arrDocumentSubdetailInformation .= '<th style="text-align: center;">Proveedor</th> <th style="text-align: center;">Unidades</th> <th style="text-align: right;">Precio unitario</th> <th style="text-align: right;">Cantidad</th> <th style="text-align: right;">Total</th> <th style="text-align: right;">Fecha de cotizacion</th>';
                            $arrDocumentSubdetailInformation .= '</tr>';
                            $arrDocumentSubdetailInformation .= '</thead>';
                            $arrDocumentSubdetailInformation .= '<tbody>';

                            foreach( $objDocumentSubdetailQuotation as $arrDocumentSubdetailQuotation )
                            {
                                $arrDocumentSubdetailInformation .= '<tr>';
                                $arrDocumentSubdetailInformation .= '<td style="text-align: center;">' . $arrDocumentSubdetailQuotation["strProvider"] . '</td> <td style="text-align: center;">' . $arrDocumentSubdetailQuotation["intQuantity"] . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocumentSubdetailQuotation["decUnitPrice"]) . '</td> <td style="text-align: right;"> ' . $objAscend->formatMoney($arrDocumentSubdetailQuotation["decAmount"]) .  '</td> <td style="text-align: right;"> ' . $objAscend->formatMoney($arrDocumentSubdetailQuotation["decTotal"]) .  '</td> <td style="text-align: right;"> ' . $objAscend->formatDateTime($arrDocumentSubdetailQuotation["intQuotationDate"], DTF_1) .  '</td>';
                                $arrDocumentSubdetailInformation .= '</tr>';
                            }
                            $arrDocumentSubdetailInformation .= '</tbody>';
                            $arrDocumentSubdetailInformation .= '</table>';
                            $arrDocumentSubdetailInformation .= '</div>';
                            //--
                        }

                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<tr>';
                            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<td style="text-align: center;">' . $arrDocumentSubdetail["intQuantity"] . '</td> <td id="divDocumentStatus_' . $arrDocumentSubdetail["intId"] . '" style="text-align: center;">' . $arrDocumentSubdetail["strDocumentStatus"] . '</td> <td style="text-align: center;">' . ( $arrDocumentSubdetail["intWarehouse"] == null ? "N/A" : $arrDocumentSubdetail["strWarehouse"] ) . '</td> <td> ' . $btnShowQuotations . $btnAuthorize .  '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tr>';
                    }
                    $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</div>';

            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '<div class="row" id="divDocumentSubdetailInformation">';
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= $arrDocumentSubdetailInformation;
            $jsnPhpScriptResponse["jsnDocumentDetailInformation"] .= '</div>';
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
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnBrandBlue" onclick="fnDocument_addDocumentDetail();">Agregar Partida</button>';
                                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<button class="btn btnOnlineGreen">Generar Documento</button>';
                            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</td>';
                        $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
                    $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
        break;

        case 'addDocumentDetailInsert':
            /*'strProcess' : 'addDocumentDetailInsert',
                'strCurrentAction' : $jsnDocument.strCurrentAction,
                'intProduct' : intProduct,
                'intCustomer' : $jsnDocument.arrCustomer.intId,
                'intDocument' : $jsnDocument.intDocumentId,
                'strDocumentDetail' : strDocumentDetail*/
            $strCurrentAction = $_REQUEST["strCurrentAction"];
            $intDocument = $_REQUEST["intDocument"];
            $intProduct = $_REQUEST["intProduct"];
            $intCustomer = $_REQUEST["intCustomer"];

            $jsnPhpScriptResponse["strCurrentAction"] = $strCurrentAction;
            $jsnPhpScriptResponse["intDocument"] = $intDocument;
            $jsnPhpScriptResponse["intProduct"] = $intProduct;
            $jsnPhpScriptResponse["intProduintCustomerct"] = $intCustomer;

            $sqlCustomer =
            "SELECT C.intId, C.strRFC, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus, ( SELECT DISTINCT intId FROM catWarehouse WHERE intZone = C.intZone ) AS intWarehouse "
            ."FROM tblCustomer C "
            ."LEFT JOIN tblDocument O ON C.intId = O.intCustomer "
            ."LEFT JOIN catClass CL ON C.intClass = CL.intId "
            ."LEFT JOIN catZone Z ON C.intZone = Z.intId "
            ."WHERE O.intId = $intDocument ; ";

            $rstCustomer = $objAscend->dbQuery($sqlCustomer);
            $jsnPhpScriptResponse["arrCustomer"] = $rstCustomer[0];



            $jsnPhpScriptResponse["blnStatus"] = true;
            $jsnPhpScriptResponse["strMsg"] = "";
            $jsnDocumentDetailTemp = explode("|", $_REQUEST["strDocumentDetail"]);
            $jsnDocumentDetail = array();
            foreach ($jsnDocumentDetailTemp as $arrDocumentDetailTemp)
            {
                $jsnDocumentDetailTemp = explode("@@", $arrDocumentDetailTemp);
                $jsnDocumentDetail[] = array("intProduct" => $jsnDocumentDetailTemp[0], "intWarehouse" => $jsnDocumentDetailTemp[1], "intQuantity" => $jsnDocumentDetailTemp[2]);
            }


            $msgRevalidateStock = "";
            foreach($jsnDocumentDetail as $arrDocumentDetail)
            {
                $sqlRevalidateStock = "SELECT intStock "
                ."FROM tblWarehouseStock "
                ."WHERE intProduct = " . $arrDocumentDetail["intProduct"] . " AND intWarehouse = " . $arrDocumentDetail["intWarehouse"] . " AND intStock >= " . $arrDocumentDetail["intQuantity"] . ";";
                //echo "<br>" . $sqlRevalidateStock . "<br>";
                $rstRevalidateStock = $objAscend->dbQuery($sqlRevalidateStock);
                if( count($rstRevalidateStock) != 1 )
                {
                    $jsnPhpScriptResponse["blnStatus"] = false;
                    $jsnPhpScriptResponse["strMsg"] = "Otro usuario ya tomo el stock del almacen";
                    //$objAscend->printArray($rstRevalidateStock);
                }
            }


            #Generar Precio de producto
            $sqlPrice = "SELECT decPrice from tblProduct WHERE intId = 1;";
            $rstPrice = $objAscend->dbQuery($sqlPrice);
            if( count($rstPrice) != 1 )
            {
                $jsnPhpScriptResponse["blnStatus"] = false;
                $jsnPhpScriptResponse["strMsg"] = "No se pudo obtener la relacion de precio para el cliente.";
            }

            if( $rstPrice[0]["decPrice"] < 1 )
            {
                $jsnPhpScriptResponse["blnStatus"] = false;
                $jsnPhpScriptResponse["strMsg"] = "No se pudo obtener la relacion de precio para el cliente.";
            }
            $decPrice = $rstPrice[0]["decPrice"];



            ## --------------------------------------------------------------------------
            //$jsnPhpScriptResponse["blnStatus"] = false;
            if( $jsnPhpScriptResponse["blnStatus"] )
            {
                $sqlMaxDocumentDetail =
                "SELECT IFNULL(MAX(intNumber), 0) AS intMax "
                ."FROM tblDocumentDetail "
                ."WHERE intDocument = $intDocument; ";
                $rstMaxDocumentDetail = $objAscend->dbQuery($sqlMaxDocumentDetail);
                $intNumber = $rstMaxDocumentDetail[0]["intMax"] + 1;

                $intDocumentDetailQuantity = 0;
                foreach($jsnDocumentDetail as $arrDocumentDetail)
                {
                    $intDocumentDetailQuantity += $arrDocumentDetail["intQuantity"];
                }

                if( $strCurrentAction == 'newDocument' )
                {
                    $sqlKeyNumber = "SELECT strValue FROM tblParameter WHERE strField = 'strKeyNumber';";
                    $rstKeyNumber = $objAscend->dbQuery($sqlKeyNumber);
                    $strKeyNumber = $rstKeyNumber[0]["strValue"];
                    settype($strKeyNumber, "integer");
                    $strKeyNumber++;

                    $sqlDocumentInsert =
                    "INSERT INTO tblDocument( strKeynumber, intCustomer, intCreator, decAmount, decTotal,                                          intAuthorized, intApprovedBy, intAuthorizationDate, intCreationDate,        strStatus ) "
                    ."                VALUES( '" . $strKeyNumber . "', $intCustomer, 1,          $decPrice, " . ( $intDocumentDetailQuantity * $decPrice ) .", 0,             null,          00000000000000,       " . date("YmdHis") . ", 'A'       );";
                    //echo $sqlDocumentInsert . "<br><br>";
                    $rstDocumentInsert = $objAscend->dbInsert($sqlDocumentInsert);
                    //echo trim($sqlDocumentDetailInsert);
                    $intDocument = $objAscend->intLastInsertedId;
                    $jsnPhpScriptResponse["intDocument"] = $intDocument;

                    $sqlUpdateKeyNumber = "UPDATE tblParameter set strValue = '$strKeyNumber' WHERE strField = 'strKeyNumber';";
                    $rstUpdateKeyNumber = $objAscend->dbUpdate($sqlUpdateKeyNumber);
                }




                $sqlDocumentDetailInsert =
                "INSERT INTO tblDocumentDetail( intDocument,  intNumber,  intProduct,  intQuantity,                decUnitPrice, decAmount,                                         intPromiseDate,         strStatus ) "
                ."                      VALUES( $intDocument, $intNumber, $intProduct, $intDocumentDetailQuantity, $decPrice,    " . ( $intDocumentDetailQuantity * $decPrice ) .", " . date("YmdHis") . ", 'A'       );";
                $rstDocumentDetailInsert = $objAscend->dbInsert($sqlDocumentDetailInsert);

                $intDocumentDetail = $objAscend->intLastInsertedId;
                foreach($jsnDocumentDetail as $arrDocumentDetail)
                {
                    $sqlDocumentSubdetail =
                    "INSERT INTO tblDocumentSubdetail ( intDocumentDetail,  intQuantity,                               intDocumentStatus, intWarehouse,                               strStatus ) "
                    ."                          VALUES( $intDocumentDetail, " . $arrDocumentDetail["intQuantity"] . ", 5,                 " . $arrDocumentDetail["intWarehouse"] . ", 'A'       ) ";
                    $rstDocumentSubdetail = $objAscend->dbInsert($sqlDocumentSubdetail);

                    $sqlUpdateWarehouseStock =
                    "UPDATE tblWarehouseStock "
                    ."SET intStock = ( intStock - " . $arrDocumentDetail["intQuantity"] . ") "
                    ."WHERE intProduct = $intProduct AND intWarehouse = " . $arrDocumentDetail["intWarehouse"] . ";";
                    $rstUpdateWarehouseStock = $objAscend->dbUpdate($sqlUpdateWarehouseStock);
                }
            }
        break;
        
        case 'documentSubdetailApprove':
            $intDocumentSubdetail = $_REQUEST["intDocumentSubdetail"];

            $sqlDocumentSubdetailApprove =
            "UPDATE tblDocumentSubdetail "
            ."SET intDocumentStatus = 6 "
            ."WHERE intId = $intDocumentSubdetail;";
            $rstDocumentSubdetailApprove = $objAscend->dbUpdate($sqlDocumentSubdetailApprove);
            $jsnPhpScriptResponse["blnStatus"] = true;

        break;

        case 'getSupplyPending':
            $sqlSupplyPending =
            "SELECT DSD.intId, DSD.intDocumentDetail, DSD.intQuantity, DSD.intDocumentStatus, DSD.intWarehouse, WH.strDescription AS strWarehouse, DSD.strStatus, DD.intProduct, P.strSKU, P.strPartNumber, P.intFamily, F.strName AS strFamily, P.intBrand, B.strName AS strBrand, P.intGroup, G.strName AS strGroup, P.intCondition, CON.strName AS strCondition, P.intClass, CLA.strName AS strClass, P.intUnit, U.strDescription AS strUnit, P.intType, T.strDescription AS strType, DD.intPromiseDate "
            ."FROM tblDocumentSubdetail DSD "
            ."LEFT JOIN tblDocumentDetail DD ON DD.intId = DSD.intDocumentDetail "
            ."LEFT JOIN tblProduct P ON DD.intProduct = P.intId "
            ."LEFT JOIN tblFamily F ON F.intId = P.intFamily "
            ."LEFT JOIN tblBrand B ON B.intId = P.intBrand "
            ."LEFT JOIN tblGroup G ON G.intId = P.intGroup "
            ."LEFT JOIN catCondition CON ON CON.intId = P.intCondition "
            ."LEFT JOIN catClass CLA ON CLA.intId = P.intClass "
            ."LEFT JOIN catUnit U ON U.intId = P.intUnit "
            ."LEFT JOIN catProductType T ON T.intId = P.intType "
            ."LEFT JOIN catWarehouse WH ON WH.intId = DSD.intWarehouse "
            ."WHERE DSD.intDocumentStatus = 6 "
            ."ORDER BY DSD.intWarehouse ASC, DD.intPromiseDate ASC; ";
            $rstSupplyPending = $objAscend -> dbQuery($sqlSupplyPending);

            $jsnPhpScriptResponse["htmlSupplyPending"] = '';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<table><thead><tr>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<tr><th colspan="13" class="text-right">';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="row">';

            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">';
                $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="divSelect"><select id="cboTrackeEnterpriser"><option value="1">DHL</option><option value="2">Estafeta</option><option value="3">UPS</option></select><label style="float:right;" for="cboTrackeEnterpriser" >Metodo de Embarque</label></div>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';

            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="divInputText"><input id="strGuideNumber" type="text"><label for="strGuideNumber" style="float:right;" >Numero de Guia</label></div>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';

            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">';
                $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="divSelect"><select id="cboShipmentMethod"><option value="\'T\'">Terrestre</option><option value="\'M\'">Maritimo</option><option value="\'C\'">Aereo</option></select><label style="float:right;" >Metodo de Embarque</label></div>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';


            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="divInputText"><input id="strWeight" type="text"><label style="float:right;" for="strWeight">Peso(Kg)</label></div>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';

            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">';
                $jsnPhpScriptResponse["htmlSupplyPending"] .= '<button class="btn btnAlternativeGray"  onclick="fndocument_markSupplyDocumentDetail();">Marcar como surtido</button>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';

            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</div>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</th></tr>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<th class="text-center">Seleccionar</th> <th>Almacen</th> <th>SKU</th> <th> No. Parte</th><th class="text-center">Cantidad</th> <th>Familia</th> <th>Marca</th> <th>Grupo</th>  <th>Condicion</th> <th class="text-center">Clase</th> <th>Unidad</th> <th>Tipo</th>  <th>Fecha Promesa</th>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</tr></thead>';
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '<tbody>';
            foreach($rstSupplyPending as $obj)
            {
                $jsnPhpScriptResponse["htmlSupplyPending"] .= '<tr><td class="text-center"><input class="chbSupplyPending" value="' . $obj["intId"] . '" type="checkbox"/></td><td>' . $obj["strWarehouse"] . '</td> <td>' . $obj["strSKU"] . '</td> <td>' . $obj["strPartNumber"] . '</td> <td class="text-center">' . $obj["intQuantity"] . '<td>' . $obj["strFamily"] . '</td> <td>' . $obj["strBrand"] . '</td> <td>' . $obj["strGroup"] . '</td> <td>' . $obj["strCondition"] . '</td>  <td class="text-center">' . $obj["strClass"] . '</td> <td>' . $obj["strUnit"] . '</td> <td>' . $obj["strType"] . '</td>  <td>' . $objAscend->formatDateTime($obj["intPromiseDate"], DTF_1) . '</td></tr>';
            }
            $jsnPhpScriptResponse["htmlSupplyPending"] .= '</tbody</table>';

        break;

        case 'markSupplyDocumentDetail':
            $arrDocumentSubdetail = $_REQUEST["arrDocumentSubdetail"];
            $objDocumentSubdetail = explode("|", $arrDocumentSubdetail);
            $intrackeEnterpriser = $_REQUEST["intrackeEnterpriser"];
            $strGuideNumber = $_REQUEST["strGuideNumber"];
            $intShipmentMethod = $_REQUEST["intShipmentMethod"];
            $strWeight = $_REQUEST["strWeight"];
            foreach( $objDocumentSubdetail as $dsd )
            {
                $sqlUpdateDSD = "UPDATE tblDocumentSubdetail SET intDocumentStatus = 1 WHERE intId = $dsd;";
                $objAscend -> dbUpdate($sqlUpdateDSD);
            }
            $jsnPhpScriptResponse["blnStatus"] = true;

        break;

        case 'getPurchaseList':

            if( isset($_SESSION["intUserID"]) && $_SESSION["intUserID"] > 0 )
            {
                //$objAscend->printArray($_SESSION);
                $sqlPurchaserBrand = "SELECT intBrand, strAction "
                    ."FROM tblPurchaserBrand "
                    ."WHERE intUser = " . $_SESSION["intUserID"] . " AND strAction IN ('SCOM', 'NCOM') AND strStatus = 'A';";
                $rstPurchaserBrand = $objAscend -> dbQuery($sqlPurchaserBrand);


                $sqlPurchaserFamily = "SELECT intFamily, strAction "
                    ."FROM tblPurchaserFamily "
                    ."WHERE intUser = " . $_SESSION["intUserID"] . " AND strAction IN ('SCOM', 'NCOM') AND strStatus = 'A';";
                $rstPurchaserFamily = $objAscend -> dbQuery($sqlPurchaserFamily);


                $sqlPurchaserGroup = "SELECT intGroup, strAction "
                ."FROM tblPurchaserGroup "
                ."WHERE intUser = " . $_SESSION["intUserID"] . " AND strAction IN ('SCOM', 'NCOM') AND strStatus = 'A';";
                $rstPurchaserGroup = $objAscend -> dbQuery($sqlPurchaserGroup);

                if( count( $rstPurchaserBrand ) < 1 && count( $rstPurchaserFamily ) < 1 && count( $rstPurchaserGroup ) < 1 )
                {
                    $jsnPhpScriptResponse["blnStatus"] = false; $jsnPhpScriptResponse["blnMsg"] = "No se pudo recabar la relacion de privilegios del usuario.";
                }
                else
                {
                    $purchaseBrand = array();   $purchaseFamily = array();      $purchaseGroup = array();   $noPurchaseBrand = array(); $noPurchaseFamily = array();    $noPurchaseGroup = array();
                    $contPurchase = 0;  $contNoPurchase = 0;
                    $strPB = "";     $strPF = "";     $strPG = "";
                    $strNPB = "";    $strNPF = "";    $strNPG = "";

                    foreach( $rstPurchaserBrand as $arrPurchaserBrand )
                    {
                        if( $arrPurchaserBrand["strAction"] == "SCOM")  {   $purchaseBrand[]   = $arrPurchaserBrand["intBrand"];  }
                        if( $arrPurchaserBrand["strAction"] == "NCOM")  {   $noPurchaseBrand[] = $arrPurchaserBrand["intBrand"];  }
                    }

                    foreach( $rstPurchaserFamily as $arrPurchaserFamily )
                    {
                        if( $arrPurchaserFamily["strAction"] == "SCOM")  {   $purchaseFamily[]   = $arrPurchaserFamily["intFamily"];  }
                        if( $arrPurchaserFamily["strAction"] == "NCOM")  {   $noPurchaseFamily[] = $arrPurchaserFamily["intFamily"];  }
                    }

                    foreach( $rstPurchaserGroup as $arrPurchaserGroup )
                    {
                        if( $arrPurchaserGroup["strAction"] == "SCOM")  {   $purchaseGroup[]   = $arrPurchaserGroup["intGroup"];  }
                        if( $arrPurchaserGroup["strAction"] == "NCOM")  {   $noPurchaseGroup[] = $arrPurchaserGroup["intGroup"];  }
                    }


                    if( count($purchaseBrand) > 0 )
                    {
                        foreach( $purchaseBrand as $brand )     {   $strPB .= $brand . ", ";    }
                        $strPB = " P.intBrand IN ( " . substr($strPB, 0, ( strlen($strPB) - 2 )) . ") ";
                        $contPurchase++;
                    }

                    if( count($purchaseFamily) > 0 )
                    {
                        foreach( $purchaseFamily as $family )     {   $strPF .= $family . ", ";    }
                        $strPF = " P.intFamily IN ( " . substr($strPF, 0, ( strlen($strPF) - 2 )) . ") ";
                        $contPurchase++;
                    }

                    if( count($purchaseGroup) > 0 )
                    {
                        foreach( $purchaseGroup as $group )     {   $strPG .= $group . ", ";    }
                        $strPG = " P.intGroup IN ( " . substr($strPG, 0, ( strlen($strPG) - 2 )) . ") ";
                        $contPurchase++;
                    }


                    if( count($noPurchaseBrand) > 0 )
                    {
                        foreach( $noPurchaseBrand as $brand )     {   $strNPB .= $brand . ", ";    }
                        $strNPB = " P.intBrand NOT IN( " . substr($strNPB, 0, ( strlen($strNPB) - 2 )) . ") ";
                        $contNoPurchase++;
                    }

                    if( count($noPurchaseFamily) > 0 )
                    {
                        foreach( $noPurchaseFamily as $family )     {   $strNPF .= $family . ", ";    }
                        $strNPF = " P.intFamily NOT IN ( " . substr($strNPF, 0, ( strlen($strNPF) - 2 )) . ") ";
                        $contNoPurchase++;
                    }

                    if( count($noPurchaseGroup) > 0 )
                    {
                        foreach( $noPurchaseGroup as $group )     {   $strNPG .= $group . ", ";    }
                        $strNPG = " P.intGroup NOT IN ( " . substr($strNPG, 0, ( strlen($strNPG) - 2 )) . ") ";
                        $contNoPurchase++;
                    }




                    foreach( $rstPurchaserFamily as $arrPurchaserFamily )
                    {
                        if( $arrPurchaserFamily["strAction"] == "SCOM")  {   $purchaseFamily[] = $arrPurchaserFamily["intBrand"];  }
                        if( $arrPurchaserFamily["strAction"] == "NCOM")  {   $noPurchaseFamily[] = $arrPurchaserFamily["intBrand"];  }
                    }

                    foreach( $rstPurchaserGroup as $arrPurchaserGroup )
                    {
                        if( $arrPurchaserGroup["strAction"] == "SCOM")  {   $purchaseGroup[] = $arrPurchaserGroup["intBrand"];  }
                        if( $arrPurchaserGroup["strAction"] == "NCOM")  {   $noPurchaseGroup[] = $arrPurchaserGroup["intBrand"];  }
                    }

                    $andPurchaserPermissions = " AND (DSD.intDesignatedPurchaser = " . $_SESSION["intUserID"] . " ) AND ( "
                    . ( $contPurchase > 0 ?   "( " . ( count($purchaseBrand) ? $strPB : "" ) . " " . (  count($purchaseBrand) > 0 && count($purchaseFamily) > 0 ? " OR " : "" ) . " " . ( count($purchaseFamily) ? $strPF : "" ) . " " . (  count($purchaseGroup) > 0 && ( count($purchaseBrand) > 0 || count($purchaseFamily) > 0 ) ? " OR " : "" ) . " " . ( count($purchaseGroup) ? $strPG : "" ) . " )" : "")  . " "
                    . ( $contPurchase > 0 && $contNoPurchase > 0 ? " AND " : "" ) . " "
                    . ( $contNoPurchase > 0 ? "( " . ( count($noPurchaseBrand) ? $strNPB : "" ) . " " . (  count($noPurchaseBrand) > 0 && count($noPurchaseFamily) > 0 ? " AND " : "" ) . " " . ( count($noPurchaseFamily) > 0 ? $strNPF : "" ) . " " . (  count($noPurchaseGroup) > 0 && ( count($noPurchaseBrand) > 0 || count($noPurchaseFamily) > 0 ) ? " AND " : "" ) . " " . ( count($noPurchaseGroup) ? $strNPG : "" ) . " )" : "" ) . " )";
                    $andPurchaserPermissions = "";

                    $sqlDocumentSubdetail = "SELECT D.strKeyNumber, DD.intNumber, DSD.intId AS intDocumentSubdetail, DSD.intDocumentDetail, DSD.intQuantity, DSD.intDocumentStatus, DSD.intWarehouse, DSD.intDesignatedPurchaser, DSD.strStatus, "
                    ."DD.intProduct, P.strSKU, P.strPartNumber, P.strDescription, P.intCondition, P.intClass, P.intUnit, P.intType, P.intBrand, P.intFamily, P.intGroup, U.strName AS strSeller "
                    ."FROM tblDocumentSubdetail DSD "
                    ."LEFT JOIN tblDocumentDetail DD ON DD.intId = DSD.intDocumentDetail "
                    ."LEFT JOIN tblDocument D ON DD.intDocument = D.intId "
                    ."LEFT JOIN tblProduct P ON P.intId = DD.intProduct "
                    ."LEFT JOIN tblUser U ON U.intid = DSD.intRequestingSeller "
                    ."WHERE DSD.intDocumentStatus IN( 11, 12, 13) $andPurchaserPermissions;";
                    $rstDocumentSubdetail = $objAscend -> dbQuery($sqlDocumentSubdetail);

                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] = "";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= '<div class="row"><div class="col-lg-1-1 col-md-1-4 col-sm-1-2 col-xs-1-1" id="divDocumentSubdetail">';
                        $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= '<button class="btn btnOverYellow" onclick="fnDocument_showPurchaseOrderForm()">Generar Orden de Compra</button>';
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= '</div></div>';
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "<table>";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "<thead>";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "<tr> <th></th> <th>Documento</th> <th class='text-center'># Partida</th> <th>SKU</th> <th>Numero de parte</th> <th>Descripcion</th> <th>Unidades solicitadas</th> <th>Solicita</th> </tr>";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "</thead>";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "<tbody>";
                    foreach( $rstDocumentSubdetail as $subdetail )
                    {
                        $htmlButtons = "";
                        settype($subdetail["intDocumentStatus"], "integer");
                        switch( $subdetail["intDocumentStatus"] )
                        {
                            case 11:
                                $htmlButtons = '<button class="btn btnOverYellow" onclick="fnDocument_showPurchaseOrderForm(\'' . $subdetail["intDocumentSubdetail"] .'\')">Generar Orden de Compra</button>';
                            break;
                            case 12:
                                $htmlButtons = '<button class="btn btnAlternativeBlue" onclick="fnDocument_registerGuideNumber(\'' . $subdetail["intDocumentSubdetail"] .'\')">Registrar numero de guia</button>';
                            break;
                            case 13:
                                $htmlButtons = '<button class="btn btnOverGray" onclick="fnDocument_showSubdetailInformation(\'' . $subdetail["intDocumentSubdetail"] .'\')">Mostrar informacion de guia</button>';
                            break;
                        }

                        $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= '<tr> <td> <input type="checkbox"/> </td> <td class="text-center">' . $subdetail["strKeyNumber"] . '</td> <td>' . $subdetail["intNumber"] . '</td> <td>' . $subdetail["strSKU"] . '</td> <td>' . $subdetail["strPartNumber"] . '</td> <td>' . $subdetail["strDescription"] . '</td> <td class="text - center">' . $subdetail["intQuantity"] . '</td> <td>' . $subdetail["strSeller"] . '</td> </tr>';
                    }
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "</tbody>";
                    $jsnPhpScriptResponse["htmlDocumentSubdetail"] .= "</table>";
                }
            }
            else
            {
                $jsnPhpScriptResponse["blnStatus"] = false; $jsnPhpScriptResponse["blnMsg"] = "La sesion ha caducado.";
            }


        break;

        case 'showPurchaseOrderForm':
            $sqlWarehouse =
            "SELECT intId, strCode, strDescription, strLocation, intZone, strStatus "
            ."FROM catWarehouse "
            ."WHERE strStatus = 'A' AND intId < 10 "
            ."ORDER BY strCode; ";
            $rstWarehouse = $objAscend->dbQuery($sqlWarehouse);

            $jsnPhpScriptResponse["htmlForm"] = '';
            $jsnPhpScriptResponse["htmlForm"] .= '<div class="row">';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divSelectItem"><input type="text" id="intProvider" disabled><button>*</button><label for="intProvider">Proveedor</label></div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divSelect">';
                        $jsnPhpScriptResponse["htmlForm"] .= '<select id="intWarehouse">';
                            foreach($rstWarehouse as $warehouse)
                            {
                                $jsnPhpScriptResponse["htmlForm"] .= '<option value="' . $warehouse["intId"] . '">' . $warehouse["strDescription"] . '</option>';
                            }
                        $jsnPhpScriptResponse["htmlForm"] .= '</select>';
                        $jsnPhpScriptResponse["htmlForm"] .= '<label for="intWarehouse">Almacen</label>';
                    $jsnPhpScriptResponse["htmlForm"] .= '</div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divSelect">';
                        $jsnPhpScriptResponse["htmlForm"] .= '<select id="intShipmentWay">';
                            $jsnPhpScriptResponse["htmlForm"] .= '<option value="1">Terrestre</option><option value="2">Marino</option><option value="3">Aereo</option>';
                        $jsnPhpScriptResponse["htmlForm"] .= '</select>';
                        $jsnPhpScriptResponse["htmlForm"] .= '<label for="intWarehouse">Medio de embarque</label>';
                    $jsnPhpScriptResponse["htmlForm"] .= '</div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divInputText"><input type="text" id="intCost" value=""><label for="intCost">Precio de compra</label></div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divInputText"><input type="text" id="intPromiseDate" value=""><label for="intPromiseDate">Fecha compromiso</label></div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

                $jsnPhpScriptResponse["htmlForm"] .= '<div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">';
                    $jsnPhpScriptResponse["htmlForm"] .= '<div class="divSelect">';
                        $jsnPhpScriptResponse["htmlForm"] .= '<select id="intShippingTerm">';
                            $jsnPhpScriptResponse["htmlForm"] .= '<option value="1">Termino 1</option><option value="2">Termino 2</option><option value="3">Termino 2</option>';
                        $jsnPhpScriptResponse["htmlForm"] .= '</select>';
                        $jsnPhpScriptResponse["htmlForm"] .= '<label for="intShippingTerm">Terminos de envio</label>';
                    $jsnPhpScriptResponse["htmlForm"] .= '</div>';
                $jsnPhpScriptResponse["htmlForm"] .= '</div>';

            $jsnPhpScriptResponse["htmlForm"] .= '</div>';
        break;
    };

    unset($objAscend);
    echo json_encode($jsnPhpScriptResponse);
?>