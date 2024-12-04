<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    // Set session variables
    $_SESSION["Username"] = "admin";
    $_SESSION["password"] = "1234";
    echo "Session variables are set.";
    ?>

</body>

</html>