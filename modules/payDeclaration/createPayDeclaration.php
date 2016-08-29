<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
	<div class="MainTitle">CREAR PEDIMENTO</div>
	<div class="MainContainer">
        <div class="SubTitle">Datos Generales</div>
		<div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="idFolio" value="3600-6002208">
                    <label for="idFolio">Folio pedimento</label>
                </div>
            </div>
            <div class="col-md-4"> 
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="idFecha">
                    <label for="idFecha">Fecha</label>
                </div>
            </div>
        </div>
    <div class="SubTitle">Pedimento 1</div>
        <div class="row">
            <div class="col-md-4">
                <div class="divSelect">
                    <select id="idProveedor">
                        <option>IMPACT</option>
                        <option>CHINA ETERNAL CET</option>
                        <option>LASER PROS</option>
                        <option>ASC USA</option>
                        <option>FEDCO BATTERIES</option>
                        <option>SIGNAL AND POWER</option>
                    </select>
                    <label for="idProveedor">Proveedor</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Folio Factura</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Guía</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">DTA</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">CNT</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">PREV</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">IVA</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Advalorem</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Otro</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputTextAuto">
                    <input type="text" id="text1">
                    <label for="text1">IVA</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Descuento</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputTextAuto">
                    <input type="text" id="text1">
                    <label for="text1">IVA</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Honorarios</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputTextAuto">
                    <input type="text" id="text1">
                    <label for="text1">IVA</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">T.C.</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputTextAuto">
                    <input type="text" id="text1">
                    <label for="text1">A.A AMERICANA MX</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">V. FACTURA USD</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">% VALOR TOTAL FACTURAS vs  VALOR FACTURA</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">TOTAL CUADRO DE IMPUESTOS</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">VALOR A.A+PED  MX</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">VALOR A.A+PED USD</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Flete (usd) PEDIMENTO</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Flete (usd) FACTURA</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">STATUS F.F/ VF</label>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">GASTOS A.A + PED (SIN IVA)</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">% INC X GASTOS</label>
                </div>
            </div>
            <div class="col-md-4">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">VAL TOTAL PDTO EN CEDIS</label>
                </div>
            </div>
            <div class="col-md-4">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">% PUESTO EN CEDIS / VALOR FACT</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ref imp</label>
                </div>
            </div>
            <div class="col-md-3">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Impuestos</label>
                </div>
            </div>
            <div class="col-md-3">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ref flet</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Fletes Importación</label>
                </div>
            </div>
            <div class="col-md-3">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">Porcentaje %</label>
                </div>
            </div>
            <div class="col-md-3">
               <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">flete usd/ v fact</label>
                </div>
            </div>
        </div>
        <br style="clear: both;" />
	</div>

</body>
</html>