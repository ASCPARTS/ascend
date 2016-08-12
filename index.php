<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>:: AscenD ::</title>

    <style>
        body {
            font-family: Arial;
            font-size: 9pt;
            background-color: #050409;
            margin: 0 0 0 0;
        }

        .footer {
            height: 50px;
            line-height: 50px;
            background-color: #1766A1;
            text-align: center;
            font-size: 11pt;
            color: #F1F1F1;
            font-weight: bold;
            bottom: 0;
            position: fixed;
            width: 100%;
            text-shadow: 0 1px 0 #03528D;
        }

        .tblLogin {
            height: 100vh;
            width: 100vw;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tblLogin tr {
            height: 100vh;
        }

        .tblLogin tr td {
            text-align: center;
        }

        .divLoginMain {
            display: inline-block;
            background-color: #D2CFD8;
            padding: 25px 25px 25px 25px;
            margin: 40px auto 0 auto;
            box-shadow: 0 1px 0 #FFFFFF;
        }

        input {
            border:0;
            background-color: #F1F1F1;
            color: #050409;
            width: 300px;
            height: 40px;
            margin: 0 0 10px 0;
            font-size: 14pt;
            padding: 0 10px 0 10px;
            outline: none;
            -webkit-box-shadow: 0 1px 0 #FFFFFF;
            -moz-box-shadow: 0 1px 0 #FFFFFF;
            box-shadow: 0 1px 0 #FFFFFF;
        }

        input[type=button] {
            border:0;
            background-color: #00B8FE;
            color: #050409;
            width: 320px;
            height: 40px;
            font-size: 14pt;
            padding: 0 10px 0 10px;
            margin: 0 0 0 0;
            outline: none;
            cursor: pointer;
            border: 4px #00B8FE solid;
            border-bottom: 4px #00A4EA solid;
            -webkit-box-shadow: 0 1px 0 #00A4EA;
            -moz-box-shadow: 0 1px 0 #00A4EA;
            box-shadow: 0 1px 0 #00A4EA;
            text-shadow: 0 1px 0 #F1F1F1;
        }

        input[type=button]:hover {
            border: 4px #00A4EA solid;
            -webkit-box-shadow: 0 1px 0 #00A4EA;
            -moz-box-shadow: 0 1px 0 #00A4EA;
            box-shadow: 0 1px 0 #00A4EA;
        }
    </style>


</head>
<body>
<table class="tblLogin">
    <tr>
        <td style="width: 55vw; vertical-align: middle;">
            <img src="logo_colors-01.png" style="width: 50vw">
        </td>
        <td style="width: 45vw; vertical-align: top; text-align: right; padding-right: 30px">
            <div class="divLoginMain">
                <input type="text" placeholder="cuenta" value=""><br>
                <input type="password" placeholder="contraseña" value=""><br>
                <input type="button" value="ingresar">
            </div>
            <br /><br /><br /><br />
            <img src="logo_white-01.png" style="width: 10vw">
        </td>
    </tr>
</table>

<div class="footer">
    Asesores en Sistemas de Computo y Comunicaciones, S.A. de C.V.
</div>

</body>
</html>