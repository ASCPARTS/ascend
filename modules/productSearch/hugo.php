<?php
include_once("../../inc/include.config.php");
include_once("../../lib/class.ascend.php");


$objAscend = new clsAscend();

echo $objAscend->nextDocumentKeyNumber();

