<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Orden de Cotización</div>
<div class="MainContainer">

    <div class="row">
    <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
        <div class="divInputText userYellow">
            <input type="text" id="text1">
            <label for="text1">Cliente</label>
        </div>
    </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText providerYellow">
                <input type="text" id="text1">
                <label for="text1">grupo de cliente</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText priceGray">
                <input type="text" id="text1">
                <label for="text1">precio referencia</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText coinYellow">
                <input type="text" id="text1">
                <label for="text1">tipo de cambio</label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>Informacion del cliente</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><span>Nombre del cliente: Gael Manzanares</span></td>
                    <td><span>Domicilio: Pino 4567 Col. Fresno</span></td>
                </tr>
                <tr>
                    <td><span>condicion de pago: Contado</span></td>
                    <td><span><span>RFC: GAGV-890501-R26</span></td>
                </tr>
                <tr>
                    <td><span><span>Telefono: 33 33 56 78 98</span></td>
                    <td><span><span>E-mail: gael@gmail.com</span></td>
                </tr>
                <tr>
                    <td><span>condicion de pago: Contado</span></td>
                    <td><span><span>RFC: GAGV-890501-R26</span></td>
                </tr>
                <tr>
                    <td><span><span>Telefono: 33 33 56 78 98</span></td>
                    <td><span><span>E-mail: gael@gmail.com</span></td>
                </tr>
                <tr>
                    <td><span>Nombre del cliente: Gael Manzanares</span></td>
                    <td><span>Domicilio: Pino 4567 Col. Fresno</span></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="SubTitle">Informacion de SKU</div>
    <div class="row">

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText barCodeYellow">
                <input type="text" id="text1">
                <label for="text1">sku</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divSelect ">
                <select id="cbo1">
                    <option>	MOBILES             	</option>
                    <option>	PROJECTORS          	</option>
                    <option>	COPIERS             	</option>
                    <option>	PRINTERS            	</option>
                    <option>	LAPTOPS             	</option>
                    <option>	SERVERS             	</option>
                    <option>	DESKTOPS            	</option>
                    <option>	ACCESORIES          	</option>
                </select>
                <label for="cbo1">familia</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divSelect">
                <select id="cbo1">
                    <option>	CONCEPTRONIC	</option>
                    <option>	STP	</option>
                    <option>	ACER	</option>
                    <option>	APPLE	</option>
                    <option>	COMPAQ	</option>
                    <option>	DELL	</option>
                    <option>	605	</option>
                    <option>	FUJITSU	</option>
                    <option>	GATEWAY	</option>
                    <option>	608	</option>
                    <option>	MINOLTA	</option>
                    <option>	610	</option>
                    <option>	611	</option>
                    <option>	612	</option>
                    <option>	EPSON	</option>
                    <option>	NEC	</option>
                    <option>	MITAC	</option>
                    <option>	HP	</option>
                    <option>	IBM	</option>
                    <option>	LEXMARK	</option>
                    <option>	PALM	</option>
                    <option>	TOSHIBA	</option>
                    <option>	PANASONIC	</option>
                    <option>	OKIDATA	</option>
                    <option>	623	</option>
                    <option>	XEROX	</option>
                    <option>	637	</option>
                </select>
                <label for="cbo1">marca</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divSelect">
                <select id="cbo1">
                    <option>	HDD INT             	</option>
                    <option>	COMPUTER BAGS       	</option>
                    <option>	HDD EXT             	</option>
                    <option>	ELECTRONIC COMPONENT	</option>
                    <option>	PRINTERS            	</option>
                    <option>	PLOTTERS            	</option>
                    <option>	CORDS               	</option>
                    <option>	MEMORY              	</option>
                    <option>	POWER BANK          	</option>
                    <option>	POWER SUPPLY        	</option>
                    <option>	MARKETING           	</option>
                    <option>	COVERS              	</option>
                    <option>	MOTHERBOARDS        	</option>
                    <option>	DIGITIZERS          	</option>
                    <option>	TRANSFER            	</option>
                    <option>	MOTOR               	</option>
                    <option>	DISPLAYS            	</option>
                    <option>	DUPLEXERS           	</option>
                    <option>	EXTERNAL COMPONENTS 	</option>
                    <option>	INTERNAL COMPONENTS 	</option>
                    <option>	FANS                	</option>
                    <option>	ROLLERS             	</option>
                    <option>	CARTHRIDGE PARTS    	</option>
                    <option>	TRAYS AND ACCESORIES	</option>
                    <option>	AC ADAPTERS         	</option>
                    <option>	BATTERIES           	</option>
                    <option>	CARTHRIDGES         	</option>
                    <option>	FUSING ASSEMBLY     	</option>
                    <option>	MAINTENANCE KITS    	</option>
                    <option>	GENERAL PARTS       	</option>
                    <option>	MAINTENANCE KIT PART	</option>
                    <option>	FUSING ASSY PARTS   	</option>
                    <option>	KEYBOARDS           	</option>

                </select>
                <label for="cbo1">modelo</label>
            </div>
        </div>
    </div>
        <div class="row">

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText barCodeYellow">
                <input type="text" id="text1">
                <label for="text1">No. parte</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText calculatorYellow">
                <input type="text" id="text1">
                <label for="text1">cantidad</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputText storeYellow">
                <input type="text" id="text1">
                <label for="text1">no. almacen</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
            <div class="divInputDate calendarYellow">
                <input type="date" id="text1">
                <label for="text1">fecha promesa</label>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-1-1 col-sm-1-1 col-md-1-1 col-lg-1-1">
            <div class="divInputTextArea">
                <label for="textarea1">Descripcion de sku</label>
                <textarea id="textarea1"></textarea>
            </div>

        </div>
        </div>

    <div class="ButtonContainer">
        <input type="button" class="btnOnlineGreen btn" value="Aceptar">
        <input type="button" class="btnBrandRed btn" value="Cancelar">
    </div>

    <br style="clear: both;" />
</div>

</body>
</html>