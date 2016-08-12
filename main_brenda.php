<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>



























        body {
            font-family: Arial;
            font-size: 10pt;
            background-color: #D8D8D8;
            margin: 0 0 0 0;
        }

        input[type=text]{
            font-size: 12pt;
            background-color: #F1F1F1;
            border: 1px #1E202C solid;
            outline: none;
            color: #1E202C;
            padding: 3px 5px 3px 31px;
            background-image: url('pixel_1E202C.png'), url('input_img.png');
            background-repeat: repeat-y, no-repeat;
            background-position: 26px, 0;
        }

        input[type=button] {
            font-size: 12pt;
            padding: 3px 12px 3px 12px;
            outline: none;
            cursor: pointer;
            font-weight: normal;
            background-color: #D8D8D8;
            border-left: 0px #1E202C solid;
            border-top: 0px #1E202C solid;
            border-right: 0px #1E202C solid;
            border-bottom: 0px #1E202C solid;
            color: #1E202C;
        }

        input[type=button]:hover{
            background-color: #D2CFD8;
        }

        .colorblue {
            box-shadow: 0 4px 0 #00B8FE;
        }

        .colordarkblue {
            box-shadow: 0 4px 0 #1766A1;
        }

        .coloryellow {
            box-shadow: 0 4px 0 #FFC000;
        }

        .colorgreen {
            box-shadow: 0 4px 0 #55B844;
        }

        .colorred {
            box-shadow: 0 4px 0 #EB1414;
        }

        .colordarkgrey {
            box-shadow: 0 4px 0 #323544;
        }

        .tabMain{
            display: inline-block;
            width: 100%;
            vertical-align: top;
            margin-bottom: 2px;
            background-color: #323544;
            color: #F1F1F1;
            text-shadow: 0 1px 0 #00000;
        }

        .tabMain .labelContent {
            position: inherit;
            display: inline-block;
            width: calc(100% - 23px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
        }

        .tabMain .labelContentSelected {
            position: inherit;
            display: inline-block;
            width: calc(100% - 23px);
            vertical-align: top;
            padding: 4px 2px 4px 2px;
            cursor: pointer;
            background-color: #F1F1F1;
            color:#323544;
            font-weight: bold;
        }

        .tabMain .labelClose {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #323544;
        }

        .tabMain .labelClose:hover {
            color:#F1F1F1;
        }

        .tabMain .labelCloseSelected {
            position: inherit;
            display: inline-block;
            width: 15px;
            padding: 4px 2px 4px 2px;
            text-align: center;
            cursor: pointer;
            color: #F1F1F1;
            background-color: #F1F1F1;
        }

        .tabMain .labelCloseSelected:hover {
            color:#323544;
        }

        .altMenuLeft {
            cursor:pointer;
            display: block;
            height: 50px;
            width: 50px;
            float: left;
            border-right: 2px #D8D8D8 solid;
        }

        .altMenuRight {
            cursor:pointer;
            display: block;
            height: 50px;
            width: 50px;
            float: right;
            border-left: 2px #D8D8D8 solid;
        }

    </style>

    <script src="jquery-3.1.0.min.js"></script>
</head>
<body>
<table style="width: 100vw; height: 100vh; border: 0; border-spacing: 2px; border-collapse: separate;  ">
    <tbody>
    <tr style="height: 50px">
        <td colspan="3" style="background-color: #050409; padding: 0 0 0 0">
            <div class="altMenuLeft" onclick="openMenu();" style="background-image: url('menu32.png'); background-repeat: no-repeat; background-position: center center"></div>
            <div class="altMenuRight" style="width: 200px !important;"></div>
            <div class="altMenuRight"></div>
            <div class="altMenuRight"></div>
            <div class="altMenuRight"></div>
            <div class="altMenuRight"></div>
        </td>
    </tr>
    <tr style="calc(100% - 50px)">
        <td style="background-color: #00B8FE; padding: 0 0 0 0;" width="152">
            <div style="width: calc(100% - 4px); height: 100%; overflow-x: hidden; overflow-y: auto; padding: 2px 2px 2px 2px;">
                <div class="tabMain" title="Organización de Productos"><label class="labelContent">Organización de pr...</label><label class="labelClose">&#10006</label></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContentSelected">Organización</div><div class="labelCloseSelected">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
                <div class="tabMain" title="Organización"><div class="labelContent">Organización</div><div class="labelClose">&#10006</div></div>
            </div>
        </td>
        <td style="padding: 0 0 0 0" width="*">
            <div style="width: calc(100% - 10px); height: 100%; overflow-x: auto; overflow-y: auto; background-color: #F1F1F1; padding: 5px 5px 5px 5px; ">
                <div style="font-size: 15pt; font-weight: bold; color:#1766A1; border-bottom: 1px #1766A1 solid; margin-bottom: 8px; ">Catálogo de Productos</div>
                <input type="text" placeholder="valor">
                <br />
                <div style="margin: 5px 0 5px 0; ;height: 1px; background-color: #D8D8D8;"></div>
                <br /><br />
                <input type="button" value="alguna acción" class="colorblue">
                <br /><br />
                <input type="button" value="alguna acción" class="coloryellow">
                <br /><br />
                <input type="button" value="alguna acción" class="colorgreen">
                <br /><br />
                <input type="button" value="alguna acción" class="colordarkblue">
                <br /><br />
                <input type="button" value="alguna acción" class="colorred">
                <br /><br />
                <input type="button" value="alguna acción" class="colordarkgrey">
            </div>
        </td>
        <td style="background-color: #1766A1; padding: 0 0 0 0;" width="200"></td>
    </tr>
    </tbody>
</table>

<div id="divMenuMain" style="position: fixed; top: 0; bottom: 0; left: 0; right: 0; display: none; ">
    <table style="width: 100%; height: 100%; border-spacing: 0; border-collapse: collapse;" >
        <tr>
            <td width="300" style="background-color: #D8D8D8">Menu<br />Menu<br />Menu<br />Menu<br />Menu<br /></td>
            <td width="*" style="background-color: rgba(0,0,0,.7)" onclick="closeMenu();">$nbsp;</td>
        </tr>
    </table>
</div>

<script>
    function openMenu(){
        $('#divMenuMain').fadeIn('fast');
    }

    function closeMenu() {
        $('#divMenuMain').fadeOut('fast');
    }
</script>

</body>
</html>