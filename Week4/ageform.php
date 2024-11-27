<!DOCTYPE html>
<html>

<body>

    Welcome <?php echo $_POST["name"]; ?><br>
    Your Email: <?php echo $_POST["email"]; ?><br>
    Your Age: <?php echo $_POST["age"]; ?><br>

    <?php
    if ($_POST["name"] == "") {
        echo "<p>" . "Please enter your name." . "</p>";
    }
    if ($_POST["email"] == "") {
        echo "<p>" . "Please enter your email." . "</p>";
    }
    if ($_POST["age"] == "") {
        echo "<p>" . "Please enter your age." . "</p>";
    }
    if ($_POST["age"] < 18 or $_POST["age"] > 100) {
        echo "<p>" . "Your Age is Invalid." . "</p>";
    }
    ?>

</body>

</html>