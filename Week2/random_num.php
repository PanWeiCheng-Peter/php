<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: grey;
        }
        .text1 {
            color: green;
            font-style: italic;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .text2 {
            color: blue;
            font-style: italic;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .text3 {
            color: red;
            font-weight: bold;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .text4 {
            color:black;
            font-style: italic;
            font-weight: bold;
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <?php
    $num1=rand(100,200);
    $num2=rand(100,200);
    echo "<p class=text1>".($num1)."</p>";
    echo "<p class=text2>".($num2)."</p>";
    echo "<p class=text3>".($num1+$num2)."</p>";
    echo "<p class=text4>".($num1*$num2)."</p>";
    ?>

</body>

</html>