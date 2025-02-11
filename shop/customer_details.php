<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
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

    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Customer Details:</h1>
        </div>

        <!-- PHP read one record will be here -->
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $user_name = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record user_name not found.');
        echo $user_name;

        //include database connection
        include 'config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT user_name, password, firstname, lastname, gender, dateofbirth, registrationdate, accountstatus FROM customers WHERE user_name = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            // this refer to the first question mark
            $stmt->bindParam(1, $user_name);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = ($row['gender'] == 1) ? 'Male' : 'Female';
            $dateofbirth = $row['dateofbirth'];
            $registrationdate = $row['registrationdate'];
            $accountstatus = ($row['accountstatus'] == 1) ? 'Active' : 'Non-active';
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <!-- HTML read one record table will be here -->
        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Username</td>
                <td><?php echo $user_name;  ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $password;  ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $firstname;  ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $lastname;  ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gender;  ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $dateofbirth;  ?></td>
            </tr>
            <tr>
                <td>Registration Date</td>
                <td><?php echo $registrationdate;  ?></td>
            </tr>
            <tr>
                <td>Account Status</td>
                <td><?php echo $accountstatus;  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='customer_listing.php' class='btn btn-danger'>Back to check other customers</a>
                </td>
            </tr>
        </table>

    </div> <!-- end .container -->

</body>

</html>