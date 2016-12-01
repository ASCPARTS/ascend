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
            "SELECT D.intId, D.strKeyNumber, D.intCustomer, C.strKeyNumber AS strCustomerKeyNumber, D.intCreator, CR.strName AS strCreator, D.decAmount, D.decTotal, D.intAuthorized, D.intApprovedBy, APR.strName AS strApprovedBy, D.intAuthorizationDate, D.strStatus, ( SELECT COUNT( * ) FROM tblDocumentDetail WHERE intDocument = D.intId ) AS intItems "
            ."FROM tblDocument D "
            ."LEFT JOIN tblCustomer C ON C.intId = D.intCustomer "
            ."LEFT JOIN tblUser CR ON CR.intId = D.intCreator "
            ."LEFT JOIN tblUser APR ON APR.intId = D.intApprovedBy "
            ."WHERE D.strStatus = 'A' "
            ."ORDER BY D.intCreationDate ASC; ";
            //echo $sqlDocument . "<br><br>";
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
                $jsnPhpScriptResponse["jsnDocumentList"] .= '<td>' . $arrDocument["strKeyNumber"] . '</td> <td>' . $arrDocument["strCustomerKeyNumber"] . '</td> <td><a href="javascript: alert(\'' . $arrDocument["intCreator"] . '\')">' . $arrDocument["strCreator"] . '</a></td> <td>' . $arrDocument["intItems"] . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decAmount"])  . '</td> <td style="text-align: right;">' . $objAscend->formatMoney($arrDocument["decTotal"])  . '</td> <td>' . ( $arrDocument["intAuthorized"] ? 'Aprobado' : 'No Aprobado' ) . '</td> <td><a href="javascript: alert(\'' . $arrDocument["intApprovedBy"] . '\')">' . $arrDocument["strApprovedBy"] . '</a></td> <td><button class="btn btnBrandBlue" onclick="fnDocument_getDocumentDetail(\'' . $arrDocument["intId"] . '\')">Revisar...</button></td> ';
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
            "SELECT C.intId, C.strKeyNumber, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus "
            ."FROM tblCustomer C "
            ."LEFT JOIN tblDocument O ON C.intId = O.intCustomer "
            ."LEFT JOIN catClass CL ON C.intClass = CL.intId "
            ."LEFT JOIN catZone Z ON C.intZone = Z.intId "
            ."WHERE O.intId = $intDocumentId ; ";
            $rstCustomer = $objAscend->dbQuery($sqlCustomer);
            $objCustomer = $rstCustomer[0];

            #DocumentDetail
            $sqlDocumentDetail =
            "SELECT OD.intId, OD.intDocument, OD.intNumber, OD.intProduct, P.strSKU, P.strPartNumber, OD.intQuantity, OD.decUnitPrice, OD.decAmount, OD.intPromiseDate, OD.strStatus "
            ."FROM tblDocumentDetail OD "
            ."LEFT JOIN tblProduct P ON OD.intProduct = P.intId "
            ."WHERE OD.intDocument = $intDocumentId "
            ."ORDER BY OD.intNumber ASC; ";
            $rstDocumentDetail = $objAscend->dbQuery($sqlDocumentDetail);


            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Datos de cliente</div>';
			$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2">';
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Clave de cliente:</strong> ' . $objCustomer["strKeyNumber"] . ' <br/>';
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Razon social:</strong> ' . $objCustomer["strRegisteredName"] . ' <br/>';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2">';
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Cliente clase:</strong> ' . $objCustomer["strClass"] . ' <br/>';
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Zona:</strong> ' . $objCustomer["strZoneKey"] . ' / ' . $objCustomer["strZone"] . ' <br/>';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-3-4 col-md-3-4 col-sm-3-4 col-xs-3-4"></div>';
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
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody>';
            foreach( $rstDocumentDetail as $arrDocumentDetail )
            {
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intNumber"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["strPartNumber"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intQuantity"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decUnitPrice"]) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decAmount"]) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatDateTime($arrDocumentDetail["intPromiseDate"], DTF_1) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
            }
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="6" class="text-right"> <button class="btn btnOnlineGreen">Agregar Partida</button> </td>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
					$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
				$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
			$jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';



        break;

        case 'getDocumentDetail':
            $intDocumentId = $_REQUEST['intDocumentId'];
            $jsnPhpScriptResponse["jsnDocumentDetail"] = '';

            #Customer
            $sqlCustomer =
                "SELECT C.intId, C.strKeyNumber, C.strReferenceNumber, C.strRegisteredName, C.strCommercialName, C.intClass, CL.strName AS strClass, C.intZone, Z.strKey AS strZoneKey, Z.strDescription as strZone, C.strStatus "
                ."FROM tblCustomer C "
                ."LEFT JOIN tblDocument O ON C.intId = O.intCustomer "
                ."LEFT JOIN catClass CL ON C.intClass = CL.intId "
                ."LEFT JOIN catZone Z ON C.intZone = Z.intId "
                ."WHERE O.intId = $intDocumentId ; ";
            $rstCustomer = $objAscend->dbQuery($sqlCustomer);
            $objCustomer = $rstCustomer[0];

            #DocumentDetail
            $sqlDocumentDetail =
                "SELECT OD.intId, OD.intDocument, OD.intNumber, OD.intProduct, P.strSKU, P.strPartNumber, OD.intQuantity, OD.decUnitPrice, OD.decAmount, OD.intPromiseDate, OD.strStatus "
                ."FROM tblDocumentDetail OD "
                ."LEFT JOIN tblProduct P ON OD.intProduct = P.intId "
                ."WHERE OD.intDocument = $intDocumentId "
                ."ORDER BY OD.intNumber ASC; ";
            $rstDocumentDetail = $objAscend->dbQuery($sqlDocumentDetail);


            //$objAscend->printArray($rstDocument);
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="SubTitle">Datos de cliente</div>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentFormCustomer">';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2">';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Clave de cliente:</strong> ' . $objCustomer["strKeyNumber"] . ' <br/>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Razon social:</strong> ' . $objCustomer["strRegisteredName"] . ' <br/>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-2">';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Cliente clase:</strong> ' . $objCustomer["strClass"] . ' <br/>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<strong>Zona:</strong> ' . $objCustomer["strZoneKey"] . ' / ' . $objCustomer["strZone"] . ' <br/>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<div class="col-lg-3-4 col-md-3-4 col-sm-3-4 col-xs-3-4"></div>';
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
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tbody>';
            foreach( $rstDocumentDetail as $arrDocumentDetail )
            {
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intNumber"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["strPartNumber"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td>' . $arrDocumentDetail["intQuantity"] . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decUnitPrice"]) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatMoney($arrDocumentDetail["decAmount"]) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td class="text-right">' . $objAscend->formatDateTime($arrDocumentDetail["intPromiseDate"], DTF_1) . '</td>';
                $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
            }
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<tr>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '<td colspan="6" class="text-right"> <button class="btn btnOnlineGreen">Agregar Partida</button> </td>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tr>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</tbody>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</table>';
            $jsnPhpScriptResponse["jsnDocumentDetail"] .= '</div>';



            break;


    };

    unset($objAscend);
    echo json_encode($jsnPhpScriptResponse);
?>