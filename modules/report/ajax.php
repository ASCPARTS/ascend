<?php
/**
 * Created by PhpStorm.
 * User: gmorales
 * Date: 11/16/16
 * Time: 11:32 AM
 */

//recibe query armado

//abres conexion .....


$strSql = $_REQUEST['strSql'];
$strSql = "SELECT SKU, DESCRIPCION, PERROS, GATOS FROM alguna tabla WHERE status = 'A' AND marca = 'HP'";
$strSql = "SELECT SKU, EXISTENCIA FROM alguna tabla WHERE marca = 'OKIDATA'";
$strSql = "SELECT SKU, EXISTENCIA FROM alguna tabla WHERE marca = 'OKIDATA' AND Almacen = 'CDMX'";

//$rstReport = mysqli_query($objCon, $strSql);




echo "<tr><td>valor</td><td>valor</td></tr><tr><td>valor</td><td>valor</td></tr><tr><td>valor</td><td>valor</td></tr><tr><td>valor</td><td>valor</td></tr><tr><td>valor</td><td>valor</td></tr>";

?>