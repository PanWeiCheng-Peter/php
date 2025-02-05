<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
    <!-- Latest compiled and minified Bootstrap CSS →-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navigation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="customer_listing.php">Customer Listing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_listing.php">Product Listing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer_create.php">Create Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product_create.php">Create Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="log_out.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<body>
    <!-- container →-->
    <div class="container">
        <div class="page-header">
            <h1>Update Customer Details</h1>
        </div>

        <?php
        //include database connection
        include 'config/database.php';

        // isset() is a PHP function used to verify if a value is there or not
        $user_name = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT * FROM customers WHERE user_name = ? LIMIT 1";
            $stmt = $con->prepare($query);

            // this is the first question mark
            $stmt->bindParam(1, $user_name);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            $password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $dateofbirth = $row['dateofbirth'];
            $registrationdate = $row['registrationdate'];
            $accountstatus = $row['accountstatus'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <?php
        include 'config/database.php';
        // check if form was submitted
        if ($_POST) {
            try {
                $query = " SELECT password FROM customers WHERE user_name = ? LIMIT 1";
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $user_name);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $currentPassword = $row['password'];
                echo $password;

                // posted values
                $old_password = $_POST['old_password'] ?? '';
                $new_password = $_POST['new_password'] ?? '';
                $confirm_password = $_POST['confirm_password'] ?? '';

                if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
                    if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
                        if ($old_password == $current_password) {
                            if ($new_password == $confirm_password) {
                                $currentPassword = password_hash($new_password, PASSWORD_DEFAULT);
                            } else {
                                echo "<div class='alert alert-danger'>New password and confirm password do not match.</div>";
                                $password = $password;
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Old password is incorrect.</div>";
                            $password = $password;
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Please fill all password fields to change the password.</div>";
                        $password = $password;
                    }
                } else {
                    // No password change, keep the existing password
                    $password = $password;
                }

                $firstname = ($_POST['firstname']);
                $lastname = ($_POST['lastname']);
                $gender = ($_POST['gender']);
                $dateofbirth = ($_POST['dateofbirth']);
                $registrationdate = ($_POST['registrationdate']);
                $accountstatus = ($_POST['accountstatus']);

                $query = "UPDATE customers
                        SET password=:password, firstname=:firstname, lastname=:lastname,
                        gender=:gender, dateofbirth=:dateofbirth, registrationdate=:registrationdate, accountstatus=:accountstatus
                        WHERE user_name = :user_name";
                // prepare query for excecution
                $stmt = $con->prepare($query);
                // posted values
                $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
                $lastname = htmlspecialchars(strip_tags($_POST['lastname']));
                $gender = htmlspecialchars(strip_tags($_POST['gender']));
                $dateofbirth = htmlspecialchars(strip_tags($_POST['dateofbirth']));
                $registrationdate = htmlspecialchars(strip_tags($_POST['registrationdate']));
                $accountstatus = htmlspecialchars(strip_tags($_POST['accountstatus']));

                // bind the parameters
                $stmt->bindParam(':user_name', $user_name);
                $stmt->bindParam(':password', $currentPassword);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':dateofbirth', $dateofbirth);
                $stmt->bindParam(':registrationdate', $registrationdate);
                $stmt->bindParam(':accountstatus', $accountstatus);


                $stmt->bindParam(':user_name', $user_name);
                // Execute the query
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Record was updated.</div>";
                } else {
                    $currentPassword = $row['password'];
                }

                // show errors
            } catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }

        ?>

        <!--we have our html form here where new record information can be updated-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$user_name}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Old Password</td>
                    <td><input type='password' name='old_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type='password' name='new_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type='password' name='confirm_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type='text' name='firstname' value="<?php echo $firstname;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type='text' name='lastname' value="<?php echo $lastname;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type='text' name='gender' value="<?php echo $gender;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td><input type='text' name='dateofbirth' value="<?php echo $dateofbirth;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Registration Date</td>
                    <td><input type='text' name='registrationdate' value="<?php echo $registrationdate;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Account Status</td>
                    <td><input type='text' name='accountstatus' value="<?php echo $accountstatus;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='customer_listing.php' class='btn btn-danger'>Back to customer list</a>
                    </td>
                </tr>
            </table>
        </form>



    </div>
    <!-- end .container -->
</body>

</html>