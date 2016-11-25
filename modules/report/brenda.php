<?php
require_once("../../inc/sheet.inc");
require_once('../../inc/include.config.php');
require_once('../../'.LIB_PATH .'class.ascend.php');


$objAscend = new clsAscend();
$row;


$sqlResult = 'SELECT intId, strName FROM tblFamily';
$rstQuery = $objAscend->dbQuery($sqlResult);

echo $rstQuery;

?>
<body>
<div class="MainTitle">Caracteristicas De Articulos</div>
<div class="MainContainer">



<div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divSelect groupYellow ">
                <select id="cbo1" name="family">
                    <?php foreach ($rstQuery as $row) {
                        echo '<option value="'.$row['intId'].'">'.$row['strName'].'</option>';
                    }?>
                </select>
                <label for="cbo1">Familia</label>
            </div>
        </div>

    </div>
<br style="clear: both;" />
</body>


'<option value="'.$row['intId'].'">'.$row['strName'].'</option>';
