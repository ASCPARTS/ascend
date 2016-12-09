<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("../../inc/sheet.inc");?>
	<script type="text/javascript" src="javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
    <div class="MainTitle">Documento</div>
    <div class="MainContainer">

        <div class="row" id="rowDocumentList">
        	<div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1" id="divDocumentList">
				
            </div>
        </div>

        <div class="row" id="rowDocumentForm">
			
        </div>
        
        <br style="clear: both;" />
    </div>

        <!--ROW DEL MODAL COMPATIBLES [INICIO]-->

        <!--ROW DEL MODAL COMPATIBLES [FIN]-->


        <!--JAVASCRIPT DEL CARRUCEL INICIO-->
			<script type="text/javascript" src="../../lib/jquery-1.6.2.min.js"></script>
			<script type="text/javascript" src="../../lib/jquery.easing.1.3.js"></script>
			<!-- the jScrollPane script -->
			<script type="text/javascript" src="../../lib/jquery.mousewheel.js"></script>
			<script type="text/javascript" src="../../lib/jquery.contentcarousel.js"></script>
			<script type="text/javascript">
				fnDocument_init();
			</script>
		<!--JAVASCRIPT DEL CARRUCEL FIN-->

	<?php require_once("../../inc/include.working.php");?>
	<?php require_once("../../inc/include.modal.php");?>
</body>
<script type="text/javascript" src="../../js/modal.js"></script>
</html>