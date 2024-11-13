<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: greenyellow;
        }

        .redtext {
            color: red;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .bluetext {
            color: blue;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .greytext {
            color: grey;
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
</head>

<body>

    <?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
    echo "<p class=redtext> My first PHP script!</p>";
    echo "<p class=bluetext>" . date(" d M Y ") . "</p>";
    echo "<p class=greytext>" . date(" h:i:s") . "</p>";
    ?>

</body>

</html>