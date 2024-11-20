<!DOCTYPE html>
<html>

<body>
    <?php
    define("Username", "PanWeiCheng");
    define("UserPassword", "23BSECVR000");
    $InputUsername = "PanWeiCheng";
    $InputPassword = "23BSECVR000";
    if($InputUsername == Username && $InputPassword == UserPassword){
        echo "Login successful!";
    }
    else if($InputUsername != Username ){
        echo "Invalid username ";
    } 
    else if ($InputUsername == Username && $InputPassword != UserPassword) {
        echo "Invalid password ";
    }
    ?>
</body>

</html>