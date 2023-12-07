<?php
// Start or resume the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to donorsignup.html
header("Location: donorsignup.html");
exit();
?>
