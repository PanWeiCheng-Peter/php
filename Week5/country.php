<?php
if (isset($_GET["country"])){
    echo "Your country is " . $_GET["country"] . "<br>";
}
if (isset($_GET["day"])) {
    echo "" . $_GET["day"] . "<br>";
}
if (isset($_GET["month"])) {
    echo "" . $_GET["month"] . "<br>";
}
if (isset($_GET["year"])) {
    echo "" . $_GET["year"] . "<br>";
}
if (isset($_GET["gender"])) {
    echo "" . $_GET["gender"] . "<br>";
}
if (isset($_GET["year"])) {
    echo "Age:" . 2024-$_GET["year"] . "<br>";
}
?>
<!DOCTYPE html>
<html>

<body>
    <h1>Country</h1>
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
        <label for="day">Day</label>
        <select name="day" id="day">
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value=" . $i . ">" . $i . "</option>";
            }
            ?>
        </select>
        <label for="month">Month</label>
        <select name="month" id="month">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value=" . $i . ">" . $i . "</option>";
            }
            ?>
        </select>
        <label for="year">Year</label>
        <select name="year" id="year">
            <?php
            for ($i = 2000; $i <= 2024; $i++) {
                echo "<option value=" . $i . ">" . $i . "</option>";
            }
            ?>
        </select>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>