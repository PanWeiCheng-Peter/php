<?php
session_start(userlogin);

// remove all session variables
session_unset(userlogin);

// destroy the session 
session_destroy(userlogin);

echo "All session variables are now removed, and the session is destroyed."
