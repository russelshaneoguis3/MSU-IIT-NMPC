<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Regenerate a new session ID and initialize a new session
session_start();
session_regenerate_id(true);

// Redirect to the login page
header("Location: ../index.php");
exit();
?>