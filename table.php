<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="lib/jquery-3.1.0.min.js"></script>
    <style>
        table{
            border: 0;
            border-spacing: 0;
            border-collapse: collapse;
            font-size: 9pt;
        }
        table thead tr th {
            background-color: #1766A1;
            color: #F1F1F1;
            padding: 4px;
            white-space: nowrap;
            border: 1px #323544 solid;
            width: 150px;
            min-width: 150px;
            border-bottom: 0;
        }
        table tbody tr td {
            padding: 4px;
            line-height: 1.42857143;
            vertical-align: top;
            border: 1px solid #323544;
            width: 150px;
            min-width: 150px;
        }
        table  tbody  tr:nth-of-type(odd) {
            background-color: #F1F1F1;
        }
        table  tbody  tr:hover {
            background-color: #abbed3;
        }

    </style>
    <script>
        function scrollHeader(){
            $('#divHeader').scrollLeft($('#divTable').scrollLeft());
        }

        $(document).ready(function(){
            if($('#divTable').get(0).scrollHeight>$('#divTable').height() && $('#divTable').get(0).scrollWidth>$('#divTable').width()){
                $intNewWidth = parseInt($('#thLast').width() + 20);
                $('#thLast').css('width',$intNewWidth + 'px');
                $('#thLast').css('min-width',$intNewWidth + 'px');
            }

            if(!($('#divTable').get(0).scrollHeight>$('#divTable').height()) && ($('#divTable').get(0).scrollWidth>$('#divTable').width())){
                $intNewWidth = parseInt($('#thLast').width() + 1);
                $('#thLast').css('width',$intNewWidth + 'px');
                $('#thLast').css('min-width',$intNewWidth + 'px');

            }
        })

    </script>
</head>
<body>
<div id="divHeader" style="overflow-y: hidden; overflow-x: hidden; display: block; margin-bottom: 1px;">
    <table>
        <thead>
        <tr>
            <th>Col1</th>
            <th>Col2</th>
            <th>Col3</th>
            <th>Col4</th>
            <th>Col5</th>
            <th>Col6</th>
            <th>Col7</th>
            <th>Col8</th>
            <th>Col9</th>
            <th>Col10</th>
            <th>Col11</th>
            <th>Col12</th>
            <th id="thLast">Col13</th>
        </tr>
        </thead>
    </table>
</div>
<div id="divTable" style="height: 600px; overflow-y: auto; overflow-x: auto; display: block;" onscroll="scrollHeader();">
    <table>
        <tbody>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
            <td>Col3</td>
            <td>Col4</td>
            <td>Col5</td>
            <td>Col6</td>
            <td>Col7</td>
            <td>Col8</td>
            <td>Col9</td>
            <td>Col10</td>
            <td>Col11</td>
            <td>Col12</td>
            <td>Col13</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
