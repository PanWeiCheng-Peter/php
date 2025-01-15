<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <img class="mb-4" src="logo.png" alt="" width="72"
                height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <label for="floatingInput">Email address</label>
                <input name="user_name" type="Email/Username" class="form-control" id="floatingInput" placeholder="Email/Username">
            </div>
            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input name="password" type="Password" class="form-control" id="floatingPassword" placeholder="Password">
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" style="background-color: #ff5733; color: white;">Sign in</button>
        </form>
</body>

<?php

if ($_POST) {

    include 'config/database.php';
    try {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $errors = [];
        if (empty($user_name)) {
            $errors[] = "User Name is required.";
        }
        if (empty($password)) {
            $errors[] = "Password is required.";
        }

        if (!empty($errors)) {
            echo "<div class='alert alert-danger'><ul>";
            foreach ($errors as $error) {
                echo "<li>{$error}</li>";
            }
            echo "</ul></div>";
        } else {

            $query = "SELECT * FROM customers WHERE user_name=:user_name";
            $stmt = $con->prepare($query);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['password'] = $row['password'];

                header("Location: product_listing.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Invalid username or password.</div>";
            }
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="Email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="Password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<html>