<!DOCTYPE HTML>
<html>

<body>

    Welcome <?php echo $_POST["name"]; ?><br>
    Your Email: <?php echo $_POST["email"]; ?><br>
    Your Age: <?php echo $_POST["age"]; ?><br>
    <?php print_r($_POST); ?>
    <?php
    error_reporting(E_ALL & ~E_NOTICE);

    if (isset($_POST['nameField_Name']) and isset($_POST['nameField_EMail']) and isset($_POST['nameField_Message']) and isset($_POST['nameSubmit'])) {
        // Form Submited  
        if ($_POST['nameField_Name']) {
            $phpVarNameField = ($_POST['nameField_Name']);
        } else {
            $errormsgNameField = "Name field is required, Please enter your Name.";
        }

        if ($_POST['nameField_EMail']) {
            $phpVarEMailField = ($_POST['nameField_EMail']);
        } else {
            $errormsgEMailField = "E-Mail field is required, Please enter your E-Mail ID.";
        }

        if ($_POST['nameField_Message']) {
            $phpVarMessageField = ($_POST['nameField_Message']);
        } else {
            $errormsgMessageField = "Message field is required, Please enter your Message.";
        }
    }
    ?>
</body>

</html>