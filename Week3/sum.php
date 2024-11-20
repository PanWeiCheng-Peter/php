<!DOCTYPE html>
<html>

<head>
    <?php

    $startnumber = 1;
    $endnumber = 10;

    $sum = 0;
    for ($i = $startnumber; $i <= $endnumber; $i++) {
        $sum += $i;
    }

    echo "The Sum from " . $startnumber . " to " . $endnumber . " natural number is " . $sum;
    ?>
    
</head>

</html>