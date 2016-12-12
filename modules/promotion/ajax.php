<?php
require_once ('../../inc/include.config.php');
require_once('../../'. LIB_PATH .'class.ascend.php');
$objAscend = new clsAscend();


switch ($strProcess) {

    case 'promotion':
        $jsnPhpScriptResponse = array('promotionList'=>'');
        $intDateFrom = $_REQUEST['intDateFrom'];
        $intDateTo = $_REQUEST['intDateTo'];
        $strStatus = $_REQUEST['strStatus'];
        $strSql="";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta ='<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .='<table>';
        $strRespuesta .='<thead>';
        $strRespuesta .='<tr>';
        $strRespuesta .='<th>Promoción</th>';
        $strRespuesta .='<th>Fecha Inicio</th>';
        $strRespuesta .='<th>Fecha Fin</th>';
        $strRespuesta .='<th>Descuento</th>';
        $strRespuesta .='<th>Estatus</th>';
        $strRespuesta .='<th>Edición</th>';
        $strRespuesta .='<th>Cancelar</th>';
        $strRespuesta .='</tr>';
        $strRespuesta .='</thead>';
        $strRespuesta .='<tbody>';
        foreach($rstData as $arrData) {
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td>';
            $strRespuesta .= '<button class="btn btnOverYellow" onclick="getModal("modalEditar","closeEditar")">Editar / Ver</button>';
            $strRespuesta .= '</td>';
            $strRespuesta .= '<td>';
            $strRespuesta .= '<button class="btn btnBrandRed">Cancelar</button>';
            $strRespuesta .= '</td>';
            $strRespuesta .= '</tr>';
        }
        $strRespuesta .='</tbody>';
        $strRespuesta .='</table>';
        $strRespuesta .='<</div>>';
        break;



    case 'product':
        $jsnPhpScriptResponse = array('productList'=>'');
        $strSql = "select P.strSKU, P.strPartNumber, P.strDescription, F.strName as family, B.strName as brand, G.strName as nameGroup
        from tblProduct P
        left join tblFamily F ON F.intId=P.intId
        left join tblBrand B ON B.intId=P.intBrand
        left join tblGroup G ON G.intId=P.intGroup
        where P.strStatus='A';";
        $rstData = $objAscend->dbQuery($strSql);
        $strRespuesta = '<div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">';
        $strRespuesta .= '<table>';
        $strRespuesta .= '<thead>';
        $strRespuesta .= '<tr>';
        $strRespuesta .= '<th>SKU</th>';
        $strRespuesta .= '<th>Núm. Parte</th>';
        $strRespuesta .= '<th>Descripción</th>';
        $strRespuesta .= '<th>Familia</th>';
        $strRespuesta .= '<th>Marca</th>';
        $strRespuesta .= '<th>Grupo</th>';
        $strRespuesta .= '<th>Editar / Ver</th>';
        $strRespuesta .= '<th>Cancelar / Eliminar</th>';
        $strRespuesta .= '</tr>';
        $strRespuesta .= '</thead>';
        $strRespuesta .= '<tbody>';
        foreach($rstData as $arrData) {
            $strRespuesta .= '<tr>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td></td>';
            $strRespuesta .= '<td>';
            $strRespuesta .= '<button class="btn btnOverYellow" onclick="getModal("modalEditar","closeEditar")">Editar / Ver</button>';
            $strRespuesta .= '</td>';
            $strRespuesta .= '<td>';
            $strRespuesta .= '<button class="btn btnBrandRed">Cancelar</button>';
            $strRespuesta .= '</td>';
            $strRespuesta .= '</tr>';
        }
        $strRespuesta .= '</tbody>';
        $strRespuesta .= '</table>';
        $strRespuesta .= '</div>';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '';
        $strRespuesta .= '</div>';
        $jsnPhpScriptResponse['productList'] = $strRespuesta;
        unset($rstData);
        break;
};
echo json_encode($jsnPhpScriptResponse);
?>