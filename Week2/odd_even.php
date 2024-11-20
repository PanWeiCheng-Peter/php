<!DOCTYPE html>
<html>
<style>
    body {
        background-color: grey;
    }
    .text1 {
        color: black;
        margin-bottom: 0px;
        margin-top: 0px;
    }
</style>
<body>
    <?php
    $num1 = rand(1, 100);
    if ($num1 % 2 == 0) {
        echo "<p class=text1>" . "Even" . ($num1) . "</p>";
    } 
    else {
        echo "<p class=text1>" . "Odd" . ($num1) . "</p>";
    }
    ?>
    
</body>
</html>