<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php

session_start();
// remove all session variables
session_unset();
// destroy the session 
session_destroy();

echo "All session variables are now removed, and the session is destroyed.   ";

echo "<a href='login.php' class='btn btn-primary m-b-1em'>Login</a>";
