<?php
if (isset($_GET["country"])) {
    echo "Your country is " . $_GET["country"] . "<br>";
}
?>
<!DOCTYPE html>
<html>

<body>
    <h1>Select your Country</h1>
    <p>Please select your country.</p>
    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="country">Choose your country</label>
        <select name="country" id="country">
            <option value="" Selected>Select Your Country</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Singapore">Singapore</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Thailand">Thailand</option>
            <option value="Brunei">Brunei</option>
            <option value="Vietnam">Vietnam</option>
            <option value="China">China</option>
            <option value="Japan">Japan</option>
            <option value="Korea">Korea</option>
            <option value="India">India</option>
        </select>
        <input type="submit">
    </form>
</body>

</html>