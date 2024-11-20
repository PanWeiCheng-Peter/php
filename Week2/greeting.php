<!DOCTYPE html>
<html>
    <body>
        <?php
        $time = rand(0,23);

        if ($time > 4 && $time < 12) {
            echo "Good Morning!";
        }
        else if ($time > 11 && $time < 18) {
            echo "Good Afternoon!";
        }
        else if ($time > 17 && $time < 22) {
            echo "Good evening!";
        }
        else {
            echo "Good night!";
        }
        echo $time;
        ?>
    </body>

</html>