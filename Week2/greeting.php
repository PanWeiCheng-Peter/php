<!DOCTYPE html>
<html>
    <body>
        <?php
        $time = rand(0,23);

        if ($time > 4 && $time < 12) {
            echo "Good Morning!" . ($time) . "</p>";
        }
        else if ($time > 11 && $time < 18) {
            echo "Good Afternoon!" . ($time) . "</p>";
        }
        else if ($time > 17 && $time < 22) {
            echo "Good evening!" . ($time) . "</p>";
        }
        else {
            echo "Good night!" . ($time) . "</p>";
        }
        ?>
    </body>

</html>