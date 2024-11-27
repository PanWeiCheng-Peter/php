<!DOCTYPE HTML>
<html>

<body>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <?php
    if (isset($_POST)) {
        if ($_POST["name"] == "") {
            echo "Enter your name";
        }
    }
    ?>
    <?php
    if (isset($_POST)) {
        if ($_POST["email"] == "") {
            echo "Enter your email";
        }
    }
    ?>

</body>

</html>