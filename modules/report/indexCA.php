<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>

</head>
<body>
<div class="MainTitle">Caracteristicas De Articulos</div>
<div class="MainContainer">
    <div class="SubTitle">Ingresa los Siguientes Filtros</div>

    <form name="filter" method="post">
    <div class="row" >
        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divInputText barCodeGray">
                <input type="text" name="SKU">
                <label>SKU</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divSelect groupYellow ">
                <select id="cbo1" name="family">
                   <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <label for="cbo1">Familia</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divSelect groupYellow ">
                <select id="cbo1" name="brand">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <label for="cbo1">Marca</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divSelect groupYellow ">
                <select id="cbo1" name="group">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <label for="cbo1">Grupo</label>
            </div>
        </div>

        <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4 col-lg-1-5">
            <div class="divSelect groupYellow ">
                <select id="cbo1" name="class">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <label for="cbo1">Clase</label>
            </div>
        </div>
        </div>
        <div class="ButtonContainer">
            <input type="submit" class="btnOnlineGreen btn" value="GENERAR">
        </div>
    </form>

    <?php
    $strSKU = $_REQUEST['SKU'];
    $intFamily = $_REQUEST['family'];
    $intBrand = $_REQUEST['brand'];
    $intGroup = $_REQUEST['group'];
    $intClass = $_REQUEST['class'];

    echo $strSKU;
    echo $intBrand;
    echo $intClass;
    echo $intFamily;
    echo $intGroup;
    ?>


    <div class="row">
        <div class="col-sm-1-1 col-lg-1-1 col-md-1-1 tblContainer">
            <table>
                <thead>
                <tr>
                    <th>SKU</th>
                    <th>Numer de Parte</th>
                    <th>Descripcion</th>
                    <th>Familia</th>
                    <th>Marca</th>
                    <th>Grupo</th>
                    <th>Clase</th>
                    <th>Condicion</th>
                    <th>Almacen</th>
                    <th>Existencias</th>
                    <th>Minimo</th>
                    <th>Maximo</th>
                    <th>Precio</th>
                    <th>Lista</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>'.$product["SKU"].'</td>
                    <td>'.$product["NumeroParte"].'</td>
                    <td>'.$product["Descripcion"].'</td>
                    <td>'.$product["Familia"].'</td>
                    <td>'.$product["Marca"].'</td>
                    <td>'.$product["Grupo"].'</td>
                    <td>'.$product["Clase"].'</td>
                    <td>'.$product["strName"].'</td>
                    <td>'.$product["LocalidadAlmacen"].'</td>
                    <td>'.$product["Existencia"].'</td>
                    <td>'.$product["Min"].'</td>
                    <td>'.$product["Max"].'</td>
                    <td>'.$product["Precio"].'</td>
                    <td>'.$product["Lista"].'</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>


    <br style="clear: both;" />
</body>
</html>

