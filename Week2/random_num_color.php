<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: greenyellow;
        }

        .text1 {
            color: blueviolet;
            font-size: large;
            font-weight: bold;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .text2 {
            color: blueviolet;
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <?php
    $num1 = rand();
    $num2 = rand();
    if ($num1 > $num2) {
        echo "<p class=text1>" . ($num1) . "</p>";
        echo "<p class=text2>" . ($num2) . "</p>";
    } else {
        echo "<p class=text1>" . ($num2) . "</p>";
        echo "<p class=text2>" . ($num1) . "</p>";
    }
    ?>
</body>

</html>