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
        echo "<p class=text1>" . "Even";
    } 
    else {
        echo "<p class=text1>" . "Odd";
    }
    echo $num1;
    ?>
    
</body>
</html>