<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Update Customer - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navigation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="customer_listing.php">Customer Listing</a></li>
                    <li class="nav-item"><a class="nav-link" href="product_listing.php">Product Listing</a></li>
                    <li class="nav-item"><a class="nav-link" href="customer_create.php">Create Customer</a></li>
                    <li class="nav-item"><a class="nav-link" href="product_create.php">Create Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="log_out.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>Update Customer Details</h1>
        </div>

        <?php
        include 'config/database.php';

        $user_name = isset($_GET['id']) ? $_GET['id'] : die('<div class="alert alert-danger">ERROR: Record ID not found.</div>');

        try {
            $query = "SELECT * FROM customers WHERE user_name = ? LIMIT 1";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $user_name);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                die('<div class="alert alert-danger">User not found.</div>');
            }

            $stored_password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $dateofbirth = $row['dateofbirth'];
            $registrationdate = $row['registrationdate'];
            $accountstatus = $row['accountstatus'];
        } catch (PDOException $exception) {
            die('<div class="alert alert-danger">ERROR: ' . $exception->getMessage() . '</div>');
        }

        if ($_POST) {
            try {
                $entered_old_password = trim($_POST['old_password'] ?? '');
                $new_password = trim($_POST['new_password'] ?? '');
                $confirm_password = trim($_POST['confirm_password'] ?? '');
                $firstname = htmlspecialchars(strip_tags(trim($_POST['firstname'] ?? '')));
                $lastname = htmlspecialchars(strip_tags(trim($_POST['lastname'] ?? '')));
                $gender = $_POST['gender'] ?? '';
                $dateofbirth = $_POST['dateofbirth'] ?? '';
                $registrationdate = $_POST['registrationdate'] ?? '';
                $accountstatus = $_POST['accountstatus'] ?? '';

                $update_password = false;

                if (!empty($new_password) || !empty($confirm_password)) {
                    if (empty($entered_old_password)) {
                        echo "<div class='alert alert-danger'>To change your password, enter your current password.</div>";
                    } elseif ($entered_old_password !== $stored_password) {
                        echo "<div class='alert alert-danger'>Old password is incorrect.</div>";
                    } elseif ($new_password !== $confirm_password) {
                        echo "<div class='alert alert-danger'>New password and confirm password do not match.</div>";
                    } elseif ($stored_password === $new_password) {
                        echo "<div class='alert alert-danger'>New password cannot be the same as old password.</div>";
                    } else {
                        $update_password = true;
                    }
                }

                if ($update_password) {
                    $query = "UPDATE customers 
                              SET password=:password, firstname=:firstname, lastname=:lastname, gender=:gender, 
                                  dateofbirth=:dateofbirth, registrationdate=:registrationdate, accountstatus=:accountstatus 
                              WHERE user_name = :user_name";
                } else {
                    $query = "UPDATE customers 
                              SET firstname=:firstname, lastname=:lastname, gender=:gender, 
                                  dateofbirth=:dateofbirth, registrationdate=:registrationdate, accountstatus=:accountstatus 
                              WHERE user_name = :user_name";
                }

                $stmt = $con->prepare($query);

                if ($update_password) {
                    $stmt->bindParam(':password', $new_password);
                }

                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':dateofbirth', $dateofbirth);
                $stmt->bindParam(':registrationdate', $registrationdate);
                $stmt->bindParam(':accountstatus', $accountstatus);
                $stmt->bindParam(':user_name', $user_name);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Record updated successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Unable to update record.</div>";
                }
            } catch (PDOException $exception) {
                die('<div class="alert alert-danger">ERROR: ' . $exception->getMessage() . '</div>');
            }
        }
        ?>

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
                    <td><input type='text' name='firstname' value="<?php echo htmlspecialchars($firstname); ?>" class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type='text' name='lastname' value="<?php echo htmlspecialchars($lastname); ?>" class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><select name='gender' class='form-control'>
                            <option value='Male' <?php echo ($gender == 'Male') ? "selected" : ""; ?>>Male</option>
                            <option value='Female' <?php echo ($gender == 'Female') ? "selected" : ""; ?>>Female</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type='text' name='dateofbirth' value="<?php echo htmlspecialchars($dateofbirth); ?>" class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Registration Date</td>
                    <td><input type='text' name='registrationdate' value="<?php echo htmlspecialchars($registrationdate); ?>" class='form-control' required /></td>
                </tr>
                <tr>
                    <td>Account Status</td>
                    <td><select name='accountstatus' class='form-control'>
                            <option value='Active' <?php echo ($accountstatus == 'Active') ? "selected" : ""; ?>>Active</option>
                            <option value='Non-Active' <?php echo ($accountstatus == 'Non-Active') ? "selected" : ""; ?>>Non-Active</option>
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='customer_listing.php' class='btn btn-danger'>Back</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>