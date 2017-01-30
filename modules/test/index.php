<?php
require_once('../../inc/include.config.php');
require_once(  "../../" . LIB_PATH .  'class.ascend.php');
$objAscend = new clsAscend();
?>
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>

        <?php

        $result = $objAscend->dbQuery("SELECT * FROM tblProduct;");
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        ?>


        <?php require_once('../../' . INCLUDE_PATH . 'sheet.inc'); ?>
        <script src="javascript.js"></script>
        <script>
            $('document').ready(function(){
                getMenuItems();
            })
        </script>
    </body>
</html>
<?php
unset($objAscend);
?>