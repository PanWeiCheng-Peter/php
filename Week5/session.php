<?php
session_start();
?>

<!DOCTYPE html>
<html>

<body>
    <?php
    $_SESSION["username"] = "admin";
    $_SESSION["password"] = "1234";

    echo "Session variables are set.";
    echo "<a href='counter.php'>Login</a>";
    ?>
</body>

</html>