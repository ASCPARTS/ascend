<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
</head>
<body>
<div class="MainTitle">Orden de Cotización</div>
<div class="MainContainer">
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-2 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">folio</label>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-2 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">fecha</label>
            </div>
        </div>
    <div class="col-lg-4 col-md-4 col-sm-2 col-xs-1">
        <div class="divInputText">
            <input type="text" id="text1">
            <label for="text1">numero de vendedor</label>
        </div>
    </div>
        <div class="col-lg-4 col-md-4 col-sm-2 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">numero de cliente</label>
            </div>
        </div>



    </div>
    <div class="row">

        <div class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">cliente</label>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <select class="divSelect">
                    <option>Cliente Frecuente</option>
                    <option>Cliente Distinguido</option>
                    <option>Cliente Excelente</option>
                </select>
                <label for="text1">grupo de cliente</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">sku</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">numero de parte</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">cantidad</label>
            </div>
        </div>


    </div>
    <div class="row">


        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <select class="divSelect">
                    <option>MOBILES</option>
                    <option>PROJECTORS</option>
                    <option>COPIERS</option>
                    <option>PRINTERS</option>
                    <option>LAPTOPS</option>
                    <option>SERVERS</option>
                    <option>DESKTOPS</option>
                    <option>ACCESORIES</option>
                </select>
                <label for="text1">familia</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <select class="divSelect">
                    <option>CONCEPTRONIC</option>
                    <option>STP</option>
                    <option>ACER</option>
                    <option>APPLE</option>
                    <option>COMPAQ</option>
                    <option>DELL</option>
                    <option>FUJITSU</option>
                    <option>GATEWAY</option>
                    <option>MINOLTA</option>
                    <option>EPSON</option>
                    <option>NEC</option>
                    <option>MITAC</option>
                    <option>HP</option>
                    <option>IBM</option>
                    <option>LEXMARK</option>
                    <option>PALM</option>
                    <option>TOSHIBA</option>
                    <option>PANASONIC</option>
                    <option> OKIDATA</option>
                    <option>XEROX</option>

                </select>
                <label for="text1">marca</label>
            </div>
        </div>

          <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <select class="divSelect">
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
                <label for="text1">grupo</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <select class="divSelect">
                    <option>Original</option>
                    <option>Generico</option>
                    <option>refurbished</option>
                </select>
                <label for="text1">condicion</label>
            </div>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-1">
            <div class="divInputTextArea">
                <label for="textarea10">Descripcion</label>
                <textarea id="textarea10"></textarea>
            </div>
        </div>



    </div>

    <div class="row">


        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">numero de almacen</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">moneda</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">tipo de cambio</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">precio referencia</label>
            </div>
        </div>
        <div  class="col-lg-5 col-md-5 col-sm-3 col-xs-1">
            <div class="divInputText">
                <input type="text" id="text1">
                <label for="text1">fecha promesa</label>
            </div>
        </div>


    </div>



    <br style="clear: both;" />
</div>

</body>
</html>