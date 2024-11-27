<?php
if (isset($_POST["name"])) {
    echo "Welcome " . $_POST["name"] . "<br>";
    if ($_POST["name"] == "") {
        echo "<p class=redtext>" . "Please enter your name." . "</p>";
    }
    echo " Your name: " . $_POST["email"] . "<br>";
    if ($_POST["email"] == "") {
        echo "<p class=redtext>" . "Please enter your email." . "</p>";
    }
    echo " Your Age: " . $_POST["age"] . "<br>";
    if ($_POST["age"] == "") {
        echo "<p class=redtext>" . "Please enter your age." . "</p>";
    }
    if ($_POST["age"] < 18 or $_POST["age"] > 100) {
        echo "<p class=redtext>" . "Your Age is Invaild." . "</p>";
    }
}
?>
<!DOCTYPE html>
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
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Age: <input type="text" name="age"><br>
        <input type="submit">
    </form>
</body>

</html>