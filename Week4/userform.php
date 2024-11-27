<!DOCTYPE HTML>
<html>
<head>
    <style>
        .redtext {
            color: red;
        }
    </style>
</head>
<body>

    Welcome <?php echo $_POST["name"]; ?><br>
    Your Email: <?php echo $_POST["email"]; ?><br>
    Your Age: <?php echo $_POST["age"]; ?><br>
    <?php
    if ($_POST["name"] == "") {
        echo "<p class=redtext>" . "Please enter your name." . "</p>";
    }
    if ($_POST["email"] == "") {
        echo "<p class=redtext>" . "Please enter your email." . "</p>";
    }
    if ($_POST["age"] == "") {
        echo "<p class=redtext>" . "Please enter your age." . "</p>";
    }
    ?>

</body>

</html>