<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("../../inc/sheet.inc");?>
    <script type="text/javascript" src="../customer/customer.js"></script>
    <script type="text/javascript" src="../productSearch/javascript.js"></script>
	<script type="text/javascript" src="javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="../productSearch/stylesheet.css" />
</head>
<body>
    <div class="MainTitle">Documento</div>
    <div class="MainContainer">

        <div class="row" id="rowDocumentMenu">
            <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentMenu">

            </div>
        </div>

        <div class="row" id="rowDocumentList">
        	<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentList">
				
            </div>
        </div>

        <div class="row" id="rowDocumentForm">

        </div>

        <div class="row" id="rowSupplyPending">
            <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divSupplyPending">

            </div>
        </div>
        
        <br style="clear: both;" />
    </div>

	<?php require_once("../../inc/include.working.php");?>
	<?php require_once("../../inc/include.modal.php");?>

	<script type="text/javascript">
        $( document ).ready(function() {
            <?php

                if( isset($_REQUEST["intStatus"]))
                {
                    settype($_REQUEST["intStatus"], "integer");

                    switch ( $_REQUEST["intStatus"] )
                    {
                        case 1:
                            echo "fnDocument_init();";
                            break;
                        case 2:
                            echo "fnDocument_quotationList();";
                        break;
                        case 4:
                            echo "fnDocument_getSupplyPending();";
                        break;
                    }
                }
            ?>

        });

	</script>
</body>
</html>