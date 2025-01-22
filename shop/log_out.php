<?php

session_start();
// remove all session variables
session_unset();
// destroy the session 
session_destroy();

echo "All session variables are now removed, and the session is destroyed.";

echo "<a href='login.php' class='btn btn-primary m-b-1em'>Log out</a>";
