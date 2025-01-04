<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Create Product</h1>
        </div>

        <!-- html form to create product will be here -->
        <!-- PHP insert code will be here -->
        <?php
        include 'config/database.php';

        // delete message prompt will be here

        // select all data
        $query = "SELECT product_cat_id, product_cat_name, product_cat_description FROM product_cat ORDER BY product_cat_id ASC";
        $stmt = $con->prepare($query);
        $stmt->execute();

        if ($_POST) {
            // include database connection
            include 'config/database.php';
            try {
                // posted values
                $name = $_POST['name'];
                $description = $_POST['description'];
                $manufacture_date = $_POST['manufacture_date'];
                $expired_date = $_POST['expired_date'];
                $price = $_POST['price'];
                $promotion_price = $_POST['promotion_price'];
                $product_cat_id = $_POST['product_cat_id'];
                $product_cat_name = $_POST['product_cat_name'];
                $product_cat_description = $_POST['product_cat_description'];

                // Validation
                $errors = [];
                if (empty($name)) {
                    $errors[] = "Name is required.";
                }
                if (empty($description)) {
                    $errors[] = "Description is required.";
                }
                if (empty($manufacture_date)) {
                    $errors[] = "Manufacture date is required.";
                }
                if (empty($expired_date)) {
                    $errors[] = "Expired date is required.";
                }
                if (empty($price)) {
                    $errors[] = "Price is required.";
                }
                if (empty($product_cat_id)) {
                    $errors[] = "Product category ID is required.";
                }
                if (empty($product_cat_name)) {
                    $errors[] = "Product category name is required.";
                }
                if (empty($product_cat_description)) {
                    $errors[] = "Product category description is required.";
                }
                // If there are errors, display them
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    // insert query
                    $query = "INSERT INTO products SET name=:name, description=:description, manufacture_date=:manufacture_date, expired_date=:expired_date, price=:price, promotion_price=:promotion_price, created=:created";
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    // bind the parameters
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':manufacture_date', $manufacture_date);
                    $stmt->bindParam(':expired_date', $expired_date);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':promotion_price', $promotion_price);

                    // specify when this record was inserted to the database
                    $created = date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Product was added.</div>";
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
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>
                <tr>
                    <td>Manufacture_date</td>
                    <td><input type='text' name='manufacture_date' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Expired Date</td>
                    <td><input type='text' name='expired_date' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Promotion Price</td>
                    <td><input type='text' name='promotion_price' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Product category </td>
                    <td><label for="category">
                            <?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // extract row
                                // this will make $row['firstname'] to just $firstname only
                                extract($row);
                                // creating new table row per record
                                echo "<tr>";
                                echo "<td>{$product_cat_id}</td>";
                                echo "<td>{$product_cat_name}</td>";
                                echo "<td>{$product_cat_description}</td>";
                            }
                            ?>
                    </td>

                </tr>
                <td></td>
                <td>
                    <input type='submit' value='Save' class='btn btn-primary' />
                    <a href='index.php' class='btn btn-danger'>Back to read products</a>
                </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>