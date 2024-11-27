<!DOCTYPE HTML>
<html>

<head>
    <style>
        .redtext {
            color: red;
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
</head>
<body>

    Welcome <?php echo $_POST["name"]; ?><br>
    <?php
    if ($_POST["name"] == "") {
        echo "<p class=redtext>" . "Please enter your name." . "</p>";
    } ?>
    Your Email: <?php echo $_POST["email"]; ?><br>
    <?php
    if ($_POST["email"] == "") {
        echo "<p class=redtext>" . "Please enter your email." . "</p>";
    }
    ?>
    Your Age: <?php echo $_POST["age"]; ?><br>
    <?php
    if ($_POST["age"] == "") {
        echo "<p class=redtext>" . "Please enter your age." . "</p>";
    }
    ?>

</body>

</html>