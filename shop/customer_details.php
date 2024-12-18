<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Product</h1>
        </div>

        <!-- PHP read one record will be here -->
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT username, password, firstname, lastname, gender, dateofbirth, registerdate, accountstatus";
            $stmt = $con->prepare($query);

            // this refer to the first question mark
            $stmt->bindParam(1, $id);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $username = $row['username'];
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

        <!-- HTML read one record table will be here -->
        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Username</td>
                <td><?php echo $username;  ?></td>
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
                    <a href='index.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>
        </table>

    </div> <!-- end .container -->

</body>

</html>