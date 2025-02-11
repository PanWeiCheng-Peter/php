<?php
session_start();

if (!isset($_SESSION['userlogin']) || $_SESSION['userlogin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <div class="container">
        <div class="page-header">
            <h1>Insert Customer Details</h1>
        </div>

        <?php
        if ($_POST) {
            include 'config/database.php';
            try {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $gender = $_POST['gender'];
                $dateofbirth = $_POST['dateofbirth'];
                $registrationdate = $_POST['registrationdate'];
                $accountstatus = $_POST['accountstatus'];

                $errors = [];
                if (empty($user_name)) {
                    $errors[] = "User Name is required.";
                }
                if (empty($password)) {
                    $errors[] = "Password is required.";
                }
                if (empty($firstname)) {
                    $errors[] = "First Name is required.";
                }
                if (empty($lastname)) {
                    $errors[] = "Last Name is required.";
                }
                if (empty($gender)) {
                    $errors[] = "Gender is required.";
                }
                if (empty($dateofbirth)) {
                    $errors[] = "Date of Birth is required.";
                }
                if (empty($registrationdate)) {
                    $errors[] = "Date of Birth is required.";
                }
                if (empty($accountstatus)) {
                    $errors[] = "Account Status is required.";
                }

                // If there are errors, display them
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    // Insert query

                    // insert query
                    $query = "INSERT INTO customers SET user_name=:user_name, password=:password, firstname=:firstname, lastname=:lastname, gender=:gender, dateofbirth=:dateofbirth, 
                    registrationdate=:registrationdate accountstatus=:accountstatus, created=:created";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    $stmt->bindParam(':user_name', $user_name);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':dateofbirth', $dateofbirth);
                    $stmt->bindParam(':registrationdate', $registrationdate);
                    $stmt->bindParam(':accountstatus', $accountstatus);


                    // specify when this record was inserted to the database
                    $created = date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Customer Details was saved.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
                }
            }
            // show error
            catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>


        <!-- html form here where the product information will be entered -->
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>User Name</td>
                    <td><input type='text' name='user_name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><textarea name='password' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <td><input type='text' name='firstname' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><input type='text' name='lastname' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type='text' name='gender' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type='date' name='dateofbirth' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Registration Date</td>
                    <td><input type='date' name='registrationdate' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Account Status</td>
                    <td><input type='text' name='accountstatus' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='customer_listing.php' class='btn btn-danger'>Back to read Customer Details.</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>