<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="MainTitle">Cotizaciones Pendientes</div>
<div class="MainContainer">
    <div class="row">
        <table border="1px soli gray" width="100%">
            <tr>
                <td>Folio</td>
                <td>SKU</td>
                <td>Cantidad</td>
                <td>Existencia</td>
                <td>Faltantes</td>

            </tr>
            <tr>
                <td>1467</td>
                <td>34567</td>
                <td>10</td>
                <td>2</td>
                <td>8</td>
                <td><input type="button" value="Cotizar" id="myBtn" class="colorGreen"></td>
            </tr>
            <tr>
                <td>1689</td>
                <td>59826</td>
                <td>9</td>
                <td>0</td>
                <td>9</td>
                <td><td><input type="button" value="Cotizar" id="myBtn" class="colorGreen"></td></td>
            </tr>
            <tr>
                <td>1698</td>
                <td>15037</td>
                <td>13</td>
                <td>1</td>
                <td>12</td>
                <td><td><input type="button" value="Cotizar" id="myBtn" class="colorGreen"></td></td>
            </tr>
        </table>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">×</span>
            <p>Some text in the Modal..</p>
        </div>

    </div>


    <br style="clear: both;" />
</div>
<script type="text/javascript" src="../../js/modal.js"></script>
</body>
</html>