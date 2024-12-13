<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Expire the session cookie
    setcookie(session_name("user"), '', time() - 3600, '/');

header("Location :signin.html")

?>