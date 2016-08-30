<!DOCTYPE html>
<html lang="en"  style="margin: 0; padding: 0; ">
<head>
    <?php require_once("../../inc/sheet.inc");?>
    <script type="text/javascript" src="../../lib/datepicker.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/datepicker.css">
    <script>
        $(document).ready(function()
        {

            //$('input.datepicker').Zebra_DatePicker();

        });
    </script>
</head>
<body style="margin: 0; padding: 0; ">
    <div class="MainTitle">Diseño formulario</div>
    <div class="MainContainer">

        <!-- Offset -->
        <div class="SubTitle">Titulo de 2 componentes</div>
        <div class="row">

            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-offset-2-4 col-lg-1-4 col-md-offset-2-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text2">
                    <label for="text2">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-offset-1-2 col-lg-1-2 col-md-offset-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-offset-3-4 col-lg-1-4 col-md-offset-3-4 col-md-1-4 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text2">
                    <label for="text2">ejemplo 1</label>
                </div>
            </div>

        </div>

        <!-- Table -->
        <div class="SubTitle">Titulo de tabla</div>
        <div class="row">

            <div class="col-lg-1-1 col-md-1-1 col-sm-1-1 col-xs-1-1 tblContainer">
                <table>
                    <caption>This is my caption</caption>
                    <thead>

                    <tr>
                        <th>Enc 1</th>
                        <th>Enc 2</th>
                        <th>Enc 3</th>
                        <th>Enc 4</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr class="green">
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr class="blue">
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr class="red">
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr class="yellow">
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    <tr>
                        <td>Val 1</td>
                        <td>Val 2</td>
                        <td>Val 3</td>
                        <td>Val 4</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Radio -->
        <div class="SubTitle">Checkboxes</div>
        <div class="row">

            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                <div class="divInputRadio">
                    <input type="radio" id="rad">
                    <label for="rad">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-2 col-md-1-2 col-sm-1-2 col-xs-1-1">
                <div class="divInputCheck">
                    <input type="checkbox" id="che">
                    <label for="che">ejemplo 1</label>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="ButtonContainer">
            <button class="btn btnBrandRed">Click me</button>
            <input class="btn btnOverBlue" type="button" value="Click me">
            <button class="btn btnBrandBlue">Click me</button>
            <input class="btn btnBackgroundBlack" type="button" value="Click me">
            <button class="btn btnBlueGray">Click me</button>
            <input class="btn btnOverBlueGray" type="button" value="Click me">
            <button class="btn btnAlternativeGray">Click me</button>

            <input class="btn btnLetterGray" type="button" value="Click me">
            <button class="btn btnBackground">Click me</button>
            <input class="btn btnOverYellow" type="button" value="Click me">
            <button class="btn btnAlternativeBlue">Click me</button>
            <input class="btn btnOnlineGreen" type="button" value="Click me">
            <button class="btn btnOverGray">Click me</button>
        </div>

        <!-- TEXT -->
        <div class="SubTitle">Titulo de 5 componentes</div>
        <div class="row">

            <div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text2">
                    <label for="text2">ejemplo 1</label>
                </div>

            </div>
            <div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text3">
                    <label for="text3">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text4">
                    <label for="text4">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-1-5 col-sm-1-2 col-xs-1-1">
                <div class="divInputText">
                    <input type="text" id="text5">
                    <label for="text5">ejemplo 1</label>
                </div>
            </div>

        </div>

        <!-- TEXT -->
        <div class="SubTitle">Titulo de 2 componentes</div>
        <div class="row">

            <div class="col-lg-1-2 col-md-1-2">
                <div class="divInputText">
                    <input type="text" id="text1">
                    <label for="text1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-2 col-md-1-2">
                <div class="divInputText">
                    <input type="text" id="text2">
                    <label for="text2">ejemplo 1</label>
                </div>
            </div>

        </div>

        <!-- SELECT -->
        <div class="SubTitle">Titulo de select's</div>
        <div class="row">

            <div class="col-lg-1-2 col-md-1-2">
                <div class="divSelect">
                    <select id="cbo1"><option>Opcion 1</option><option>Opcion 2</option><option>Opcion 3</option></select>
                    <label for="cbo1">ejemplo 1</label>
                </div>
            </div>
            <div class="col-lg-1-2 col-md-1-2">
                <div class="divSelect">
                    <select id="cbo2"><option>Opcion 1</option><option>Opcion 2</option><option>Opcion 3</option></select>
                    <label for="cbo2">ejemplo 1</label>
                </div>
            </div>
        </div>

        <!-- DATE -->
        <div class="SubTitle">Titulo de datepicker's</div>
        <div class="row">

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputDate">
                    <input type="date" id="dte1">
                    <label for="dte1">ejemplo 1</label>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputDate">
                    <input type="date" id="dte1">
                    <label for="dte1">ejemplo 1</label>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputDate">
                    <input type="date" id="dte1">
                    <label for="dte1">ejemplo 1</label>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputDate">
                    <input type="date" id="dte1">
                    <label for="dte1">ejemplo 1</label>
                </div>
            </div>

        </div>

        <!-- TEXTAREA -->
        <div class="SubTitle">Titulo de textareas</div>
        <div class="row">

            <!-- 4 -->
            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputTextArea">
                    <label for="textarea1">Este es mi text area</label>
                    <textarea id="textarea1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputTextArea">
                    <label for="textarea2">Este es mi text area</label>
                    <textarea id="textarea2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputTextArea">
                    <label for="textarea3">Este es mi text area</label>
                    <textarea id="textarea3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-4 col-md-1-4">
                <div class="divInputTextArea">
                    <label for="textarea4">Este es mi text area</label>
                    <textarea id="textarea4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <!-- 3 -->
            <div class="col-lg-1-3 col-md-1-3">
                <div class="divInputTextArea">
                    <label for="textarea5">Este es mi text area</label>
                    <textarea id="textarea5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-3 col-md-1-3">
                <div class="divInputTextArea">
                    <label for="textarea6">Este es mi text area</label>
                    <textarea id="textarea6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-3 col-md-1-3">
                <div class="divInputTextArea">
                    <label for="textarea7">Este es mi text area</label>
                    <textarea id="textarea7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-lg-1-2 col-md-1-2">
                <div class="divInputTextArea">
                    <label for="textarea8">Este es mi text area</label>
                    <textarea id="textarea8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="col-lg-1-2 col-md-1-2">
                <div class="divInputTextArea">
                    <label for="textarea9">Este es mi text area</label>
                    <textarea id="textarea9">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <!-- 1 -->
            <div class="col-lg-1-1 col-md-1-1">
                <div class="divInputTextArea">
                    <label for="textarea10">Este es mi text area</label>
                    <textarea id="textarea10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

        </div>

        <!-- BRENDA -->
        <div class="SubTitle">New Grid</div>
        <div class="row">
            <div class="col-xs-1-1 col-sm-2-2 col-md-4-5 col-lg-4-5">
                <div class="col-lg-1-4 col-md-1-4">
                    <div class="divInputDate">
                        <input type="date" id="dte1">
                        <label for="dte1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>

                <div class="col-xs-1-1 col-sm-1-2 col-md-1-4 col-md-1-4">
                    <div class="divInputText">
                        <input type="text" id="text1">
                        <label for="text1">ejemplo 1</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-1-1 col-md-1-1 col-md-1-5 col-md-1-5">
                <div class="col-xs-1-1 col-sm-1-1 col-md-1-1 col-lg-1-1">

                    <div class="divInputTextArea">
                        <label for="textarea1">Este es mi text area</label>
                        <textarea id="textarea1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                    </div>

                </div>
            </div>

        </div>





        <br style="clear: both;" />
    </div>
</body>
</html>