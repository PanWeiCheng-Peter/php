<?php
$InputUsername = "admin";
$InputPassword = "1234";
if (isset($_POST["username"])) {
    if (isset($_POST["password"])) {
        if ($_POST["username"] == $InputUsername) {
            if ($_POST["password"] == $InputPassword) {
                echo "<p>" . "Welcome " . ($_POST["username"]). "</p>";
            }else
            echo "<p>"."Please login again.". "</p>";}
        }
    }       
?>

<!DOCTYPE html>
<html>

<body>
    <p>Please enter your username and password.</p>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" name="submit" value="submit">
</body>

</html>