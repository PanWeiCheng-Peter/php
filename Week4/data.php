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
}
?>
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

    <form action="welcome.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>

</body>

</html>